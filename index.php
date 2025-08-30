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
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        <title>Работающие ИРЦ-серверы Руснета</title>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@300;400;500;600&display=swap');
            
            :root {
                --bg-primary: #0f1419;
                --bg-secondary: #1a1f29;
                --bg-card: #232936;
                --bg-terminal: #0d1117;
                --text-primary: #e6edf3;
                --text-secondary: #7d8590;
                --text-accent: #58a6ff;
                --text-success: #3fb950;
                --text-warning: #d29922;
                --text-danger: #f85149;
                --border-primary: #30363d;
                --border-accent: #21262d;
                --shadow-primary: 0 16px 32px rgba(1, 4, 9, 0.85);
                --shadow-glow: 0 0 20px rgba(88, 166, 255, 0.15);
                --gradient-bg: linear-gradient(135deg, #0f1419 0%, #1a1f29 100%);
            }

            * {
                box-sizing: border-box;
            }

            html {
                scroll-behavior: smooth;
            }

            body {
                font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
                background: var(--bg-primary);
                background-image: 
                    /* Retro grid pattern */
                    linear-gradient(rgba(88, 166, 255, 0.03) 1px, transparent 1px),
                    linear-gradient(90deg, rgba(88, 166, 255, 0.03) 1px, transparent 1px),
                    /* Diagonal lines like old CRT */
                    repeating-linear-gradient(
                        45deg,
                        transparent,
                        transparent 2px,
                        rgba(63, 185, 80, 0.015) 2px,
                        rgba(63, 185, 80, 0.015) 4px
                    ),
                    /* Retro computer dots pattern */
                    radial-gradient(circle at 25% 25%, rgba(88, 166, 255, 0.08) 0%, transparent 50%),
                    radial-gradient(circle at 75% 75%, rgba(255, 20, 147, 0.06) 0%, transparent 50%),
                    radial-gradient(circle at 50% 10%, rgba(0, 255, 127, 0.04) 0%, transparent 60%),
                    radial-gradient(circle at 10% 80%, rgba(255, 215, 0, 0.05) 0%, transparent 40%),
                    /* Base gradient */
                    var(--gradient-bg);
                background-size: 
                    50px 50px,
                    50px 50px,
                    20px 20px,
                    800px 800px,
                    600px 600px,
                    700px 700px,
                    500px 500px,
                    100% 100%;
                color: var(--text-primary);
                margin: 0;
                padding: 0;
                line-height: 1.6;
                min-height: 100vh;
                position: relative;
            }

            /* Add retro scanlines effect */
            body::before {
                content: '';
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: repeating-linear-gradient(
                    0deg,
                    transparent,
                    transparent 2px,
                    rgba(88, 166, 255, 0.008) 2px,
                    rgba(88, 166, 255, 0.008) 4px
                );
                pointer-events: none;
                z-index: 1;
            }

            /* Add subtle retro color shifting animation */
            body::after {
                content: '';
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: 
                    radial-gradient(circle at var(--mouse-x, 50%) var(--mouse-y, 50%), 
                        rgba(255, 20, 147, 0.02) 0%, 
                        transparent 50%);
                pointer-events: none;
                z-index: 1;
                animation: retro-shift 8s ease-in-out infinite;
            }

            @keyframes retro-shift {
                0%, 100% { 
                    background: radial-gradient(circle at 20% 30%, rgba(255, 20, 147, 0.03) 0%, transparent 50%);
                }
                25% { 
                    background: radial-gradient(circle at 80% 20%, rgba(0, 255, 127, 0.025) 0%, transparent 50%);
                }
                50% { 
                    background: radial-gradient(circle at 70% 80%, rgba(255, 215, 0, 0.02) 0%, transparent 50%);
                }
                75% { 
                    background: radial-gradient(circle at 30% 70%, rgba(88, 166, 255, 0.03) 0%, transparent 50%);
                }
            }

            .container {
                max-width: 1200px;
                margin: 0 auto;
                padding: 40px 20px;
                position: relative;
                z-index: 2;
            }

            h1 {
                font-family: 'JetBrains Mono', monospace;
                color: var(--text-accent);
                text-align: center;
                font-size: 2.5rem;
                font-weight: 600;
                margin: 0 0 3rem 0;
                position: relative;
                text-shadow: 0 0 30px rgba(88, 166, 255, 0.3);
            }

            h1::before {
                content: '# ';
                color: var(--text-success);
            }

            h2 {
                font-family: 'JetBrains Mono', monospace;
                color: var(--text-accent);
                font-size: 1.4rem;
                font-weight: 500;
                margin: 0 0 1rem 0;
                display: flex;
                align-items: center;
                gap: 10px;
            }

            h2 span {
                color: var(--text-secondary);
                font-weight: 400;
            }

            p {
                font-size: 1rem;
                margin: 1rem 0;
                color: var(--text-secondary);
                line-height: 1.7;
            }

            strong {
                color: var(--text-primary);
                font-weight: 600;
            }

            a {
                color: var(--text-accent);
                text-decoration: none;
                transition: all 0.2s ease;
                position: relative;
            }

            a:hover {
                color: #79c0ff;
                text-shadow: 0 0 8px rgba(88, 166, 255, 0.4);
            }

            ol {
                background: var(--bg-card);
                border: 1px solid var(--border-primary);
                border-radius: 12px;
                padding: 2rem;
                margin: 2rem 0;
                box-shadow: var(--shadow-primary);
                backdrop-filter: blur(10px);
            }

            ol li {
                font-family: 'JetBrains Mono', monospace;
                margin: 0.8rem 0;
                padding: 0.8rem 0;
                border-bottom: 1px solid var(--border-accent);
                transition: all 0.2s ease;
                border-radius: 6px;
            }

            ol li:last-child {
                border-bottom: none;
            }

            ol li:hover {
                background: rgba(88, 166, 255, 0.05);
                padding-left: 1rem;
                transform: translateX(4px);
            }

            pre {
                font-family: 'JetBrains Mono', monospace;
                white-space: pre-wrap;
                line-height: 1.5;
                margin: 0;
                font-size: 0.9rem;
            }

            .motd {
                background: var(--bg-terminal);
                border: 1px solid var(--border-primary);
                border-radius: 8px;
                padding: 1.5rem;
                margin: 1.5rem 0;
                box-shadow: inset 0 2px 8px rgba(0, 0, 0, 0.3);
                position: relative;
                overflow: hidden;
            }

            .motd::before {
                content: '';
                position: absolute;
                top: 0;
                left: -100%;
                width: 100%;
                height: 2px;
                background: linear-gradient(90deg, 
                    transparent 0%, 
                    var(--text-accent) 50%, 
                    transparent 100%);
                animation: terminal-scan 3s ease-in-out infinite;
            }

            @keyframes terminal-scan {
                0% { left: -100%; }
                50% { left: 100%; }
                100% { left: 100%; }
            }

            .server-item {
                background: var(--bg-card);
                border: 1px solid var(--border-primary);
                border-radius: 16px;
                padding: 2rem;
                margin: 2rem 0;
                transition: all 0.3s ease;
                position: relative;
                box-shadow: var(--shadow-primary);
                backdrop-filter: blur(10px);
            }

            .server-item:hover {
                border-color: var(--text-accent);
                box-shadow: var(--shadow-glow), var(--shadow-primary);
                transform: translateY(-4px);
            }

            .server-item::before {
                content: 'IRC SERVER';
                position: absolute;
                top: -8px;
                left: 20px;
                background: var(--bg-primary);
                color: var(--text-accent);
                padding: 4px 12px;
                font-size: 0.75rem;
                font-weight: 500;
                border-radius: 12px;
                border: 1px solid var(--border-primary);
                font-family: 'Inter', sans-serif;
                text-transform: uppercase;
                letter-spacing: 0.5px;
            }

            .status-indicator {
                display: inline-block;
                width: 8px;
                height: 8px;
                border-radius: 50%;
                margin-right: 8px;
                animation: pulse 2s infinite;
                box-shadow: 0 0 6px currentColor;
            }

            @keyframes pulse {
                0%, 100% { opacity: 1; transform: scale(1); }
                50% { opacity: 0.7; transform: scale(1.1); }
            }

            .updated {
                text-align: center;
                margin: 3rem 0 2rem 0;
                padding: 1.5rem;
                background: var(--bg-card);
                border: 1px solid var(--border-primary);
                border-radius: 12px;
                color: var(--text-secondary);
                box-shadow: var(--shadow-primary);
            }

            .updated-at {
                color: var(--text-secondary);
                text-align: right;
                font-size: 0.85rem;
                margin-top: 1rem;
                padding-top: 1rem;
                border-top: 1px solid var(--border-accent);
                font-family: 'JetBrains Mono', monospace;
            }

            .green {
                color: var(--text-success);
            }

            .yellow {
                color: var(--text-warning);
            }

            .red {
                color: var(--text-danger);
            }

            .remark {
                color: var(--text-secondary);
                font-style: italic;
                font-size: 0.9rem;
            }

            .contact-section {
                background: var(--bg-card);
                border: 1px solid var(--border-primary);
                border-radius: 16px;
                padding: 2rem;
                margin: 3rem 0;
                text-align: center;
                box-shadow: var(--shadow-primary);
            }

            .contact-section p {
                margin: 1rem 0;
                font-size: 1.1rem;
            }

            .icon {
                font-size: 1.5rem;
                margin-right: 12px;
                vertical-align: middle;
                color: var(--text-accent);
            }

            #topcontrol {
                background: var(--bg-card);
                border: 1px solid var(--border-primary);
                border-radius: 50%;
                width: 60px;
                height: 60px;
                position: fixed;
                bottom: 30px;
                right: 30px;
                opacity: 0;
                cursor: pointer;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                transition: all 0.3s ease;
                box-shadow: var(--shadow-primary);
                z-index: 1000;
                backdrop-filter: blur(10px);
            }

            #topcontrol:hover {
                background: var(--text-accent);
                color: var(--bg-primary);
                transform: translateY(-4px);
                box-shadow: var(--shadow-glow), var(--shadow-primary);
            }

            .arrow {
                font-size: 1.5rem;
                margin: 0;
                font-weight: bold;
            }

            /* Responsive Design */
            @media (max-width: 1024px) {
                .container {
                    padding: 20px 15px;
                }

                h1 {
                    font-size: 1.8rem;
                }

                h2 {
                    font-size: 1.2rem;
                }

                .server-item {
                    padding: 1.5rem;
                    margin: 1.5rem 0;
                }

                ol {
                    padding: 1.5rem;
                }

                .motd {
                    padding: 1rem;
                }

                #topcontrol {
                    width: 120px;
                    height: 120px;
                    bottom: 30px;
                    right: 30px;
                    border-width: 2px;
                    box-shadow: 0 8px 32px rgba(88, 166, 255, 0.3);
                }

                .arrow {
                    font-size: 3rem;
                    font-weight: bold;
                }
            }

            /* Extra styles for very small screens */
            @media (max-width: 480px) {
                #topcontrol {
                    width: 100px;
                    height: 100px;
                    bottom: 25px;
                    right: 25px;
                }

                .arrow {
                    font-size: 2.5rem;
                }
            }

            /* Terminal-like styling for monospace content */
            .server-list h1,
            .server-item h2,
            ol li,
            pre,
            .updated-at {
                font-family: 'JetBrains Mono', monospace;
            }

            /* Subtle animations */
            .server-item,
            ol li,
            .motd {
                animation: fadeInUp 0.6s ease-out forwards;
            }

            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            /* Improve readability */
            .server-list {
                animation: fadeIn 0.8s ease-out;
            }

            @keyframes fadeIn {
                from { opacity: 0; }
                to { opacity: 1; }
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
        <noscript>
            <div>
                <img src="https://mc.yandex.ru/watch/98308638" style="position:absolute; left:-9999px;" alt="">
            </div>
        </noscript>
        <div class="container">
            <div class="server-list">
                <h1>Работающие ИРЦ-серверы Руснета</h1>
            <p><strong>Важно!</strong><br>Этот список не претендует на полноту.<br>Есть и другие серверы.</p>
            <p>Нижеперечисленные серверы наиболее легко доступны для подключения из России:</p>
            <ol>

            <?php foreach ($items as $i => $item) { ?>
                <?php if ($item["motd"]) { ?>
                <li>
                    <a href="#server-<?= str_pad($i, 2, '0', STR_PAD_LEFT) ?>">
                        <?= $item["domain"] ?>
                    </a>
                    <?= $item["menu_comment"] ? ' <span class="remark">' . $item["menu_comment"] . '</span>' : '' ?>
                </li>
                <?php } ?>
            <?php } ?>

            </ol>
            </div>

        <?php foreach ($items as $i => $item) { ?>
            <?php if ($item["motd"]) {
                if (date('Ymd') === date('Ymd', $item["updated_at"])) {
                    $color = "green";
                } elseif (time() - $item["updated_at"] < 260000) {
                    $color = "yellow";
                } else {
                    $color = "red";
                }
            ?>
            <div class="server-item" id="server-<?= str_pad($i, 2, '0', STR_PAD_LEFT) ?>">
                <h2><span class="status-indicator <?= $color ?>"></span><?= $item["domain"] ?><span>:<?= $item["port"] ?></span></h2>
                <?= $item["item_comment"] ? '<p>' . $item["item_comment"] . '</p>' : '' ?>
                <div class="motd">
                    <pre>
<?= htmlspecialchars(preg_replace('/:' . $item["domain"] . ' \d{3} ilr /', '', $item["motd"])) ?>
                    </pre>
                    <div class="updated-at <?= $color ?>">Этот ответ сервера получен автоматически <?= date("d.m.Y", $item["updated_at"]) ?></div>
                </div>
            </div>
            <?php } ?>
        <?php } ?>

            <p class="updated">Страница обновлена <?= date("d.m.Y", $updatedAt) ?></p>
            
            <div class="contact-section">
                <p>
                    <span class="icon">&#9993;</span><a href="mailto:melloist@yandex.ru">Связаться</a>
                </p>
                <p>
                    <span class="icon">&#9998;</span><a href="https://github.com/muromizm/irclist.ru" rel="nofollow">Гитхаб</a>
                </p>
            </div>
        </div>
        <div id="topcontrol" title="Наверх">
            <p class="arrow">&uarr;</p>
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
