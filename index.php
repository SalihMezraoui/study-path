<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fonts/fonts.css">
    <link rel="stylesheet" href="style.css">
    <title>Studi-Guide</title>
</head>

<body>
    <!-- Hello World ich bin David -->
    <header>
        <img id="logo" src="https://www.hochschule-trier.de/typo3conf/ext/hochschule_trier/Resources/Public/Images/Logos/Logo_Hochschule_Trier.svg" alt="Logo">
        <nav id="mainNav">
            <a class="<?php echo $_GET['page'] == 'home' ? 'active' : '' ?>" href="index.php?page=home">Home</a>
            <a class="<?php echo $_GET['page'] == 'studiplaner' ? 'active' : '' ?>" href="index.php?page=studiplaner">Studi-Planer</a>
            <a class="<?php echo $_GET['page'] == 'studieninteressierte' ? 'active' : '' ?>" href="index.php?page=studieninteressierte">Studieninteressierte</a>
            <a class="<?php echo $_GET['page'] == 'studenten' ? 'active' : '' ?>" href="index.php?page=studenten">Studenten</a>
            <a class="<?php echo $_GET['page'] == 'anleitungen' ? 'active' : '' ?>" href="index.php?page=anleitungen">Anleitungen</a>
            <a class="<?php echo $_GET['page'] == 'studentenleben' ? 'active' : '' ?>" href="index.php?page=studentenleben">Studentenleben</a>
        </nav>
    </header>


    <main>
        <!-- Seiten im Unterordner /pages einbinden -->
        <?php
        if ($_GET && is_string($_GET['page'])) include_once 'pages/' . $_GET['page'] . '.html';
        ?>
    </main>

    <footer>
        <nav id="footerNav">
            <a class="<?php echo $_GET['page'] == 'kontakt' ? 'active' : '' ?>" href="index.php?page=kontakt">Kontakt</a>
            <a class="<?php echo $_GET['page'] == 'datenschutz' ? 'active' : '' ?>" href="index.php?page=datenschutz">Datenschutz</a>
            <a class="<?php echo $_GET['page'] == 'impressum' ? 'active' : '' ?>" href="index.php?page=impressum">Impressum</a>
        </nav>
    </footer>
</body>

</html>