<?php
/**
 * @var string $content
 * @var int $count
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/styles/main.css">
    <title>Akvanarium</title>
</head>
<body>
<div class="app">
    <div class="wrapper">
        <header class="header">
            <div class="logo">LOGO</div>
            <nav class="nav">
                <ul class="nav-list">
                    <li class="nav-item"><a class="nav-link"
                                            href="/">Main</a></li>
                    <li class="nav-item"><a class="nav-link"
                                            href="/product/catalog">Catalog</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="/basket">Basket</a>
                    </li>
                </ul>
            </nav>
            <div class="basket">Basket: <?= $count; ?></div>
        </header>
        <main>
            <?= $content; ?>
        </main>
    </div>
    <footer class="footer">I'm footer</footer>
</div>
</body>
</html>
