<?php
require_once('config.php');

$items = (new mysqli(HOST, USER, PASS, DB))
    ->query("SELECT * FROM `servers` ORDER BY `domain` ASC")
    ->fetch_all(MYSQLI_ASSOC);

$updatedAt = max(array_column($items, 'updated_at'));
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
                background: #ffffff;
                padding: 3% 20px;
            }
            a {
                color: #000000;
            }
            a:hover, #topcontrol:hover {
                text-decoration-thickness: 2px;
                font-weight: bold;
            }
            pre {
                white-space: pre-wrap;
            }
            .motd {
                max-width: 97%;
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
                margin-bottom: 30px;
            }
            #topcontrol {
                background: #ffffff;
                border-radius: 10px;
                width: 100px;
                position: fixed;
                bottom: 50px;
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
            .updated-at {
                color: #999999;
                text-align: right;
            }
            .icon {
                font-size: xx-large;
                margin-right: 7px;
                vertical-align: middle;
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
            <h1>Работающие ИРЦ-серверы Руснета</h1>
            <p><strong>Важно!</strong><br>Этот список не претендует на полноту.<br>Есть и другие серверы.</p>
            <p>Нижеперечисленные серверы наиболее легко доступны для подключения из России:</p>
            <ol>

            <?php foreach ($items as $i => $item) { ?>
                <?php if ($item["motd"]) { ?>
                <li><a href="#server-<?= str_pad($i, 2, '0', STR_PAD_LEFT) ?>"><?= $item["domain"] ?></a><?= $item["menu_comment"] ? ' <span class="remark">' . $item["menu_comment"] . '</span>' : '' ?></li>
                <?php } ?>
            <?php } ?>

            </ol>
        </div>

        <?php foreach ($items as $i => $item) { ?>
            <?php if ($item["motd"]) { ?>
            <div class="server-item" id="server-<?= str_pad($i, 2, '0', STR_PAD_LEFT) ?>">
                <h2><?= $item["domain"] ?></h2>
                <?= $item["item_comment"] ? '<p>' . $item["item_comment"] . '</p>' : '' ?>
                <div class="motd">
                    <pre>
<?= htmlspecialchars(preg_replace('/:' . $item["domain"] . ' \d{3} ilr /', '', $item["motd"])) ?>
                    </pre>
                    <div class="updated-at">Обновлено <?= date("d.m.Y", $item["updated_at"]) ?></div>
                </div>
            </div>
            <?php } ?>
        <?php } ?>

        <p class="updated">Страница обновлена <?= date("d.m.Y", $updatedAt) ?></p>
        <p>
            <span class="icon">&#9993;</span><a href="mailto:melloist@yandex.ru">Связаться</a><br>
            <span class="icon">&#9998;</span><a href="https://github.com/muromizm/irclist.ru" rel="nofollow">Гитхаб</a>
        </p>
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
