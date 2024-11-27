import sys
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
    except:
        return
    sock.settimeout(None)
    fcntl.fcntl(sock, fcntl.F_SETFL, os.O_NONBLOCK)

    sock.send('USER {0} localhost localhost {0}'.format('ilr').encode() + b'\r\n')
    sock.send('NICK {}'.format('ilr').encode() + b'\r\n')

    isRecvBegin = False
    recvs = []

    while True:
        try:
            data = sock.recv(4096)
        except socket.error as e:
            err = e.args[0]
            if err == errno.EAGAIN or err == errno.EWOULDBLOCK:
                time.sleep(2)
                if isRecvBegin:
                    break
                else:
                    continue
            else:
                sys.exit(1)
        else:
            if not isRecvBegin:
               isRecvBegin = True
            recvs.append(data.decode('utf-8'))

    sock.close()
    return ''.join(recvs)

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
        print(ircServer, ircPort)
        
        motd = getMotd(ircServer, ircPort)
        
        print(motd)

        if (motd):
            cursor.execute("""UPDATE `servers` SET `motd` = %s, `updated_at` = %s WHERE `id` = %s""",(motd, time.time(), server[0]))
            db.commit()

db.close()
