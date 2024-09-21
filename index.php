<?php

require_once('config.php');

$items = (new mysqli(HOST, USER, PASS, DB))
    ->query("SELECT * FROM `servers`")
    ->fetch_all(MYSQLI_ASSOC);

?>
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

            <?php foreach ($items as $i => $item) { ?>
                <li><a href="#server-<?= str_pad($i, 2, '0', STR_PAD_LEFT) ?>"><?= $item["domain"] ?></a><?= $item["menu_comment"] ? ' <span class="remark">' . $item["menu_comment"] . '</span>' : '' ?></li>
            <?php } ?>

            </ol>
        </div>

        <?php foreach ($items as $i => $item) { ?>
        <div class="server-item" id="server-<?= str_pad($i, 2, '0', STR_PAD_LEFT) ?>">
            <h2><?= $item["domain"] ?></h2>
            <?= $item["item_comment"] ? '<p>' . $item["item_comment"] . '</p>' : '' ?>
            <div class="motd">
                <pre>
<?= htmlspecialchars($item["motd"]) ?>
                </pre>
            </div>
        </div>
        <?php } ?>

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
