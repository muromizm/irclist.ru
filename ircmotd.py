import socket
import fcntl, os
import errno
import config
import mysql.connector
import time

def getMotd(ircServer, ircPort):
    sock = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
    sock.settimeout(60)
    try:
        sock.connect((ircServer, int(ircPort)))
    except Exception as e:
        print(f"Ошибка подключения к {ircServer}:{ircPort}: {str(e)}")
        return None
    sock.settimeout(None)
    fcntl.fcntl(sock, fcntl.F_SETFL, os.O_NONBLOCK)

    sock.send('USER {0} localhost localhost {0}'.format('ilr').encode() + b'\r\n')
    sock.send('NICK {}'.format('ilr').encode() + b'\r\n')

    isRecvBegin = False
    recvs = []

    while True:
        try:
            data = sock.recv(8000)
            if not data:
                break
        except socket.error as e:
            err = e.args[0]
            if err == errno.EAGAIN or err == errno.EWOULDBLOCK:
                time.sleep(2)
                if isRecvBegin:
                    break
                else:
                    continue
            else:
                print(f"Ошибка при получении данных: {str(e)}")
                return None
        else:
            if not isRecvBegin:
               isRecvBegin = True
            recvs.append(data.decode('utf-8'))

    sock.close()
    ret = ''.join(recvs)
    return ret if len(ret) > 150 else None

db = mysql.connector.connect(
    user = config.dbUser,
    password = config.dbPass,
    host = config.dbHost,
    database = config.dbName
)

cursor = db.cursor()
cursor.execute("SELECT * FROM `servers`")
servers = cursor.fetchall()

for server in servers:
    ircServer = (server[1], server[2])[server[2] != None]
    ircPort = server[3]

    if ircServer != None and ircPort != None:
        try:
            motd = getMotd(ircServer, ircPort)
            if motd:
                cursor.execute("""UPDATE `servers` SET `motd` = %s, `updated_at` = %s WHERE `id` = %s""",
                             (motd, time.time(), server[0]))
                db.commit()
        except Exception as e:
            print(f"Ошибка при обработке сервера {ircServer}:{ircPort}: {str(e)}")

db.close()
