<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <link rel="canonical" href="https://irclist.ru">
        <meta name="description" content="Актуальный список работающих IRC-серверов сети RusNet.">
        <meta name="keywords" content="irc, rusnet, серверы, рабочие, ирц, руснет, rusnet irc servers, motd">
        <link rel="icon" type="image/x-icon" href="/favicon.ico">
        <title>Работающие ИРЦ-серверы Руснета</title>
        <style>
            html {
                scroll-behavior: smooth;
            }
            body {
                font-family: monospace;
                max-width: max-content;
                margin: auto;
                background: #ffffff;
                padding: 50px 0;
            }
            a {
                color: #000000;
            }
            a:hover, #topcontrol:hover {
                text-decoration-thickness: 2px;
                font-weight: bold;
            }
            .motd {
                color: white;
                background: #000000;
                display: inline-block;
                padding: 10px;
                border-radius: 10px;
            }
            .server-item {
                margin-top: 30px;
                padding-top: 1px;
            }
            .updated {
                margin-top: 50px;
            }
            #topcontrol {
                position: fixed;
                bottom: 10px;
                right: 20px;
                opacity: 0;
                cursor: pointer;
                text-align: center;
            }
            .arrow {
                font-size: xxx-large;
                margin: 0;
            }
            .remark {
                color: #999999;
            }
            @media screen and (max-width: 38rem) {
                #topcontrol {
                    display: none;
                }
            }
        </style>
    </head>
    <body>
        <script>
           (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
           m[i].l=1*new Date();
           for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
           k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
           (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");
        
           ym(98308638, "init", {
                clickmap:true,
                trackLinks:true,
                accurateTrackBounce:true
           });
        </script>
        <noscript><div><img src="https://mc.yandex.ru/watch/98308638" style="position:absolute; left:-9999px;" alt=""></div></noscript>
        <div class="server-list">
            <h1>Работающие ИРЦ-серверы Руснета:</h1>
            <ol>
                <li><a href="#server-01">irc.anarxi.st</a></li>
                <li><a href="#server-02">irc.newit-lan.ru</a></li>
                <li><a href="#server-03">irc.run.net</a> <span class="remark">(подключаться по IP: <strong>2.63.252.5</strong>)</span></li>
                <li><a href="#server-04">irc.tambov.ru</a></li>
                <li><a href="#server-05">irc.tomsk.net</a></li>
            </ol>
        </div>
        <div class="server-item" id="server-01">
            <h2>irc.anarxi.st</h2>
            <div class="motd">
                <pre>
- irc.anarxi.st Message of the Day - 
- 25/6/2014 15:03
- 
- IRC Network                                               irc.anarxi.st
- -----------------------------------------------------------------------
-        Welcome to irc.anarxi.st, located in Netherlands
-                 
-  [RULES]
-  Spam: Unsolicited advertisements will not be tolerated.
-  Content: We will not tolerate the distribution of illegal materials,
-  including software piracy or child pornography.
-  
-  We reserve the right to remove your access to this server at any time.
-  Any violation of the rules stated above will result in you being
-  banished from the island.
-  
-  No monitoring of private communications will ever occur on this
-  server. The administration of this server believes strongly in your
-  inalienable human right to privacy.
-  
-  [ADMINISTRATION]
-  IRC admin <ircadm@anarxi.st>
-  
-  We are not looking for IRC operators. Please do not ask.
- 
-  [SPONSORS]
-  anarxi.st team 
- -----------------------------------------------------------------------
- Codepages per ports are:        |    Русские кодовые таблицы по портам:
- -----------------------         |    ----------------------------------
-   6660: UTF-8               7770: UTF-8           9996: UTF-8 (SSL)
-   6666: UTF-8               7771: CP1251          9997: KOI8-R (SSL)
-   6667: KOI8-U              7772: CP866           9998: Translit (SSL)
-   6668: Translit            7773: ISO-8859-5      9999: CP1251 (SSL)
-   6669: CP1251              7774: MacCyrillic
-                             7775: Translit 
-   3128 extra port (CP1251) 
- -----------------------         |    ----------------------------------   
-  To change codepage on-the-fly: |      Сменить таблицу "на лету" можно:
-                  /quote codepage codepage-name
- -----------------------         |    ---------------------------------- 
- Network Services running:       |              В сети работают сервисы:
-               NickServ, MemoServ, ChanServ
- Start using them with:          |              Начните работу с ними с:
-                   /msg NickServ@*.RusNet help
-   (/msg MemoServ@*.RusNet help или /msg ChanServ@*.RusNet help)
-  [ADMINISTRATION]
-  IRC admin <ircadm@anarxi.st>
-  
-  We are not looking for IRC operators. Please do not ask.
- 
-  [SPONSORS]
-  anarxi.st team 
- -----------------------------------------------------------------------
- Codepages per ports are:        |    Русские кодовые таблицы по портам:
- -----------------------         |    ----------------------------------
-   6660: UTF-8               7770: UTF-8           9996: UTF-8 (SSL)
-   6666: UTF-8               7771: CP1251          9997: KOI8-R (SSL)
-   6667: KOI8-U              7772: CP866           9998: Translit (SSL)
-   6668: Translit            7773: ISO-8859-5      9999: CP1251 (SSL)
-   6669: CP1251              7774: MacCyrillic
-                             7775: Translit 
-   3128 extra port (CP1251) 
- -----------------------         |    ----------------------------------   
-  To change codepage on-the-fly: |      Сменить таблицу "на лету" можно:
-                  /quote codepage codepage-name
- -----------------------         |    ---------------------------------- 
- Network Services running:       |              В сети работают сервисы:
-               NickServ, MemoServ, ChanServ
- Start using them with:          |              Начните работу с ними с:
-                   /msg NickServ@*.RusNet help
-   (/msg MemoServ@*.RusNet help или /msg ChanServ@*.RusNet help)
- -----------------------         |   ----------------------------------
-   Net's official channels:      |      Официальные каналы сети:
- -----------------------             ----------------------------------
- #help - questions and problems  |    #help - вопросы и проблемы,
- #abuse - abuse and violations   |    #abuse - жалобы на нарушения
- #announces - chan announcements |    #announces - анонсы каналов
- 
- Ads are allowed only on         | Реклама каналов допустима только
- #announces, otherwise it will   | на канале #announces, в остальных
- be dealt with as with spam      | случаях она приравнивается к спаму.
- -----------------------------------------------------------------------
- This server supports SSL connections
- -----------------------------------------------------------------------
- Current Administrative contact:            IRC admin <ircadm@anarxi.st>
- irc.anarxi.st WEB server:                          http://irc.anarxi.st
- RusNet WEB server:                                   http://www.rus.net
- =======================================================================
End of MOTD command.
                </pre>
            </div>
        </div>
        <div class="server-item" id="server-02">
            <h2>irc.newit-lan.ru</h2>
            <div class="motd">
                <pre>
- irc.newit-lan.ru Message of the Day - 
- 19/5/2014 16:21
- =======================================================================
- RusNet IRC Network                                   *NewIT* IRC Server
- -----------------------------------------------------------------------
-            Codepages:                          Кодировки:
-  6667: koi8-r             6669: cp1251             6668: translit
-  7770: koi8-r             7771: cp1251             7773: iso-8859-5
-                                                    7774: macintosh
-  9997: koi8-r (ssl)       9999: cp1251 (ssl)       9998: translit (ssl)
-  
-  To change your codepage on-the-fly:      Сменить кодировку "на лету":
-    /quote charset charset-name       (Пример: /quote charset koi8-r)
- -----------------------------------------------------------------------
- There are Network Services runing:             В сети работают сервисы:
-                     NickServ, MemoServ, ChanServ
- Start using them with:                  Начните работу с ними с команд:
-                 /nickserv help (/quote nickserv help),
-                 /chanserv help (/quote chanserv help),
-                 /memoserv help (/quote memoserv help)
- -----------------------------------------------------------------------
-  RusNet rules:                                    Правила сети RusNet:
-                  http://www.rus-net.org/rules.html
- -----------------------------------------------------------------------
-                  Сайт сети: http://www.rus-net.org/
-               Форум сети: http://www.rus-net.org/forum/
- -----------------------------------------------------------------------
- Administrative contact:                 email: <logrus.newit@gmail.com>
- =======================================================================
- NO: WARS, FLOOD, SPAM!                    НЕТ: ВОЙНАМ, АТАКАМ, РЕКЛАМЕ!
- BE POLITE AND FRIENDLY!      -={*}=-       БУДЬТЕ ВЕЖЛИВЫ И ДРУЖЕЛЮБНЫ!
- =======================================================================
End of MOTD command.
                </pre>
            </div>
        </div>
        <div class="server-item" id="server-03">
            <h2>irc.run.net</h2>
            <p><strong>ВАЖНО!</strong> Домен run.net продан, подключаться по IP: <strong>2.63.252.53</strong></p>
            <div class="motd">
                <pre>
- irc.run.net Message of the Day - 
- 26/7/2011 22:42
- 
- SPB IRC Network                                             irc.run.net
- -----------------------------------------------------------------------
-        Welcome to irc.run.net, located in St-Peterburg, Russia
- 
-                 ___    __    __    __  _ _  _____  
-               / _  \/\ \ \/\ \ \/\ \ \/ _ \/__   \   
-              / /_/ / / / /  \/ /  \/ / _ \/  / /\/  
-             / /_  / /_/ / /\  / /\  / /_\/  / /  
-            /_/  \_\____/\_\ \/\_\ \/\___\   \/  
-                      RUSNet IRC Network  
- 
- 
-  [RULES]
-  Bots: We do not allow bots, but will not remove them unless they 
-  bother us.
-  
-  Spam: Unsolicited advertisements will not be tolerated.
-  Content: We will not tolerate the distribution of illegal materials,
-  including software piracy or child pornography.
-  
-  We reserve the right to remove your access to this server at any time.
-  Any violation of the rules stated above will result in you being
-  banished from the island.
-  
-  No monitoring of private communications will ever occur on this
-  server. The administration of this server believes strongly in your
-  inalienable human right to privacy.
-  
-  [ADMINISTRATION]
-  Silencio <silence (at) irc.run.net>
-  
-  We are not looking for IRC operators. Please do not ask.
- 
-  [WHO HELPS US]
-  *** RUNNet ***
-  Russian University Network http://www.runnet.ru
- 
-  *** DevExperts inc. ***
-  This project is sponsored by DevExperts inc. http://www.devexperts.com 
- 
-  *** Deware LLC ***
-  NetGuard Solutions inc. 
-  (Real Time Intrusion Prevention and Dynamic Filtering)
-  
- ----------------------------------------------------------------------- 
- Codepages per ports are:        |    Kodirovki po portam: 
- -----------------------         |    ---------------------------------- 
-   6660: UTF-8               7770: KOI8-R              7774: Macintosh 
-   6667: KOI8-U              7771: CP1251                  7775: ASCII 
-   6668: ASCII               7772: CP866                
-   6669: CP1251              7773: ISO-8859-5           
-   -----------------------------------------------------------------
-   9997: KOI8-R (SSL)        9998: Translit (SSL)    9999: CP1251(SSL)
- -----------------------         |    ----------------------------------    
-  To change codepage on-the-fly: |     Smenit' kodirovku na-letu: 
-                  /quote codepage codepage-name 
- -----------------------         |    ----------------------------------  
- Network Services running:       |         V seti rabotajut servisy: 
-                   NickServ, ChanServ, MemoServ
- Start using them with:          |     Dlya nachala naberite comandu:  
-                   /msg NickServ@*.RusNet help 
-   (/msg MemoServ@*.RusNet help or /msg ChanServ@*.RusNet help)  
- -----------------------         |    ----------------------------------  
- If you need help                |        Esli nuzhna pomosch:
-                           /join #help
-                           /join #abuse 
- -----------------------         |    ---------------------------------- 
- This server supports SSL on ports 9997(koi8), 9998(translit), 9999(win)
- ----------------------------------------------------------------------- 
- Current Administrative contact:       IRC admin <ircadm at irc.run.net> 
- irc.run.net WEB server:                             http://irc.run.net
- irc.run.net WEB-gate:                                http://irc.spb.ru 
- RusNet WEB server:                                  http://www.rus.net 
- =======================================================================
End of MOTD command.
                </pre>
            </div>
        </div>
        <div class="server-item" id="server-04">
            <h2>irc.tambov.ru</h2>
            <div class="motd">
                <pre>
- irc.tambov.ru Message of the Day - 
- 22/2/2013 15:51
- =======================================================================
- RusNet IRC Network                               Tambov IRC IPv6 Server
- -----------------------------------------------------------------------
- Now, the supported codepages are on the following ports:
- 
-   6667: KOI8-R           7770: UTF-8           7773: ISO-8859_5 
-   6668: Translit         7771: CP1251          7774: Macintosh 
-   6669: CP1251           7772: CP866           7775: Translit 
- 
- with SSL:
- 
-   9996: UTF-8      9997: KOI8-R      9998: Translit      9999: CP1251
- ----------------------------------------------------------------------
- IPv6: irc6.tambov.ru; ports are the same
- ----------------------------------------------------------------------
- Always remember that IRC is not a right, it is a _privilege_
- ----------------------------------------------------------------------
- Administrative contact:                        denis at tambov dot ru 
- ======================================================================
End of MOTD command.
                </pre>
            </div>
        </div>
        <div class="server-item" id="server-05">
            <h2>irc.tomsk.net</h2>
            <div class="motd">
                <pre>
- irc.tomsk.net Message of the Day - 
- 10/4/2024 4:36
- =======================================================================
- RusNet IRC Network | Tomsk IRC server | 
- =======================================================================
- Location:  Tomsk, Russia
- Admin contact:    Gnomus (pz@gnomus.ru)
- 
- Codepages per ports are (Русские кодовые таблицы по портам):
- 
-       6666: UTF-8
-       6667: KOI8-R
-       6668: Translit
-       6669: CP1251
- 
- Codepages per ports with SSL support:
-       9996: UTF-8
-       9997: KOI8-R
-       9998: Translit
-       9999: CP1251
- 
- To change your codepage on-the-fly (Сменить таблицу "на лету" можно):
-       /quote codepage codepage-name
- 
- There are Network Services running (В сети работают сервисы):
-       NickServ, MemoServ, ChanServ
- 
- Start using them with (Начните работу с ними с):
-       /msg NickServ@*.Rusnet help, /msg ChanServ@*.Rusnet help
- 
- Help Channels on the net (В сети есть каналы помощи):
-       /join #help - help channel (канал помощи)
-       /join #abuse - abuse channel (канал жалоб)
-       /join #announces - channel for announce channel
-                          (канал для анонсов каналов)
- 
- RusNet network Rules and FAQ (Правила сети RusNet и FAQ)
-       http://ircfaq.gnomus.ru http://www.rus-net.org/rules.html
- =======================================================================
- NO: CLONES, WARS, FLOOD, SPAM!   НЕТ: КЛОНАМ, ВОЙНАМ, АТАКАМ, РЕКЛАМЕ!
- =======================================================================
End of MOTD command.
                </pre>
            </div>
        </div>
        <p class="updated">Обновлено 16 сентября 2024 года. <a href="mailto:melloist@yandex.ru">Связаться</a>.</p>
        <div id="topcontrol" title="Наверх">
            <p class="arrow">&uarr;</p>
            <p>Наверх</p>
        </div>
        <script>
            (function (document) {
                const topbutton = document.getElementById("topcontrol");
                topbutton.onclick = function (e) {
                    window.scrollTo({ top: 0, behavior: "smooth" });
                };
        
                window.onscroll = function () {
                    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                        topbutton.style.opacity = "1";
                    } else {
                        topbutton.style.opacity = "0";
                    }
                };
            })(document);
        </script>
    </body>
</html>
