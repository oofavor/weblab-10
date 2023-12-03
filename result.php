<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Глушков - Lab 10 (Variant 4)</title>
    <link rel="stylesheet" href="styles.css" />
    <?php include("util.php") ?>
</head>

<body>
    <header class="header">
        <div>
            <h1>Глушков Андрей</h1>
            <p>Group: 221-362</p>
            <p>Lab: 10 (Variant 4)</p>
        </div>
        <img class="header-logo" src="static/img/logo.png" alt="University Logo" />
    </header>

    <main>
        <?php
        if (isset($_POST['inputText']) && $_POST['inputText']) {
            echo '<div class="src_text">' . $_POST['inputText'] . '</div>';
            test_it(iconv("utf-8", "cp1251", $_POST['inputText']));
        } else
            echo '<div class="src_error">Нет текста для анализа</div>';
        ?>
    </main>

    <footer class="footer-container">
        <div class="footer-icon-container">
            <a class="footer-social-icon" href="https://github.com/oofavor">
                <img src="static/icon/social-github.svg" alt="github" />
            </a>
            <a class="footer-social-icon" href="#">
                <img src="static/icon/social-reddit.svg" alt="reddit" />
            </a>
            <a class="footer-social-icon" href="#">
                <img src="static/icon/social-twitter.svg" alt="twitter" />
            </a>
            <a class="footer-social-icon" href="#">
                <img src="static/icon/social-facebook.svg" alt="facebook" />
            </a>
        </div>
        <div>
            Phone:
            <a href="tel:+79999999999" class="footer-link">+79999999999</a>
            | Email:
            <a href="mailto:favorxog@gmail.com" class="footer-link">favorxog@gmail.com</a>
        </div>
        <div>© 2023 Andrey Glushkov | All Rights Reserved</div>
    </footer>
</body>

</html>