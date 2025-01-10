<?php 
    if (!$_GET || !is_string($_GET['page'])) header("Location: index.php?page=home");
    if (is_string($_GET['page'])) $page = $_GET['page'];
    else $page = "home";
?>
<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fonts/fonts.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="./images/favicon.ico">
    <title>Studi-Guide<?php echo ' - '.ucfirst($page) ?></title>
    <script src="scripts/application.js"></script>
</head>


<body>
    <header>
        <a href="index.php?page=home"><img id="logo" src="./images/logo.svg" alt="Logo"></a>
        <nav id="mainNav">
            <a class="<?php echo $page == 'home' ? 'active' : '' ?>" href="index.php?page=home">Home</a>
            <a class="<?php echo $page == 'studiplaner' ? 'active' : '' ?>" href="index.php?page=studiplaner">Studi-Planer</a>
            <div class="dropdown<?php echo $page == 'module' || $page == 'studieninteressierte' || $page == 'studentenleben' || $page == 'ersties' ? ' active' : '' ?>">
                <span tabindex="0">Studieren</span>
                <div class="dropdown-content">
                    <a class="<?php echo $page == 'studentenleben' ? 'active' : '' ?>" href="index.php?page=studentenleben">Studentenleben</a>
                    <a class="<?php echo $page == 'ersties' ? 'active' : '' ?>" href="index.php?page=ersties">Ersties</a>
                    <a class="<?php echo $page == 'studieninteressierte' ? 'active' : '' ?>" href="index.php?page=studieninteressierte">Studieninteressierte</a>
                    <a class="<?php echo $page == 'module' ? 'active' : '' ?>" href="index.php?page=module">Modulinformationen</a>
                </div>
            </div>
            <a class="<?php echo $page == 'anleitungen' ? 'active' : '' ?>" href="index.php?page=anleitungen">Anleitungen</a>
            <a class="<?php echo $page == 'forum' ? 'active' : '' ?>" href="index.php?page=forum">Forum</a>
            <div class="dropdown">
                <span tabindex="0">
                    <svg width="25px" xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><title>Einstellungen</title><path d="M262.29 192.31a64 64 0 1057.4 57.4 64.13 64.13 0 00-57.4-57.4zM416.39 256a154.34 154.34 0 01-1.53 20.79l45.21 35.46a10.81 10.81 0 012.45 13.75l-42.77 74a10.81 10.81 0 01-13.14 4.59l-44.9-18.08a16.11 16.11 0 00-15.17 1.75A164.48 164.48 0 01325 400.8a15.94 15.94 0 00-8.82 12.14l-6.73 47.89a11.08 11.08 0 01-10.68 9.17h-85.54a11.11 11.11 0 01-10.69-8.87l-6.72-47.82a16.07 16.07 0 00-9-12.22 155.3 155.3 0 01-21.46-12.57 16 16 0 00-15.11-1.71l-44.89 18.07a10.81 10.81 0 01-13.14-4.58l-42.77-74a10.8 10.8 0 012.45-13.75l38.21-30a16.05 16.05 0 006-14.08c-.36-4.17-.58-8.33-.58-12.5s.21-8.27.58-12.35a16 16 0 00-6.07-13.94l-38.19-30A10.81 10.81 0 0149.48 186l42.77-74a10.81 10.81 0 0113.14-4.59l44.9 18.08a16.11 16.11 0 0015.17-1.75A164.48 164.48 0 01187 111.2a15.94 15.94 0 008.82-12.14l6.73-47.89A11.08 11.08 0 01213.23 42h85.54a11.11 11.11 0 0110.69 8.87l6.72 47.82a16.07 16.07 0 009 12.22 155.3 155.3 0 0121.46 12.57 16 16 0 0015.11 1.71l44.89-18.07a10.81 10.81 0 0113.14 4.58l42.77 74a10.8 10.8 0 01-2.45 13.75l-38.21 30a16.05 16.05 0 00-6.05 14.08c.33 4.14.55 8.3.55 12.47z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
                </span>
                <div class="dropdown-content">
                    <a href="javascript:void(0)" onclick="setFont('large')" style="cursor: pointer;">Große Schrift</a>
                    <a href="javascript:void(0)" onclick="setFont('normal')" style="cursor: pointer;">Kleine Schrift</a>
                    <a href="javascript:void(0)" onclick="setFontFamily('opendyslexic')" style="cursor: pointer;">Legasthenie Font</a>
                    <a href="javascript:void(0)" onclick="setFontFamily('opensans')" style="cursor: pointer;">Normaler Font</a>
                </div>
            </div>
        </nav>
        <a href="javascript:void(0);" id="mobileNavTrigger" class="icon" onclick="mobileNavTrigger()">
            <svg width="40px" xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><title>Mobile Navigation</title><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M80 160h352M80 256h352M80 352h352"/></svg>
        </a>
    </header>


    <main>
        <?php if ($page != 'home' && $page != 'forum-erstellen'): ?>
            <div id="breadcrumb">
                <span>Home / <?php echo (($page == 'studentenleben' || $page == 'ersties' || $page == 'studieninteressierte' || $page == 'module' ? 'Studenten / ' : '').ucfirst($page))?></span>
            </div>
        <?php endif;?>

        

        <!-- Seiten im Unterordner /pages einbinden -->
        <?php
        if (isset($page)) include_once 'pages/' . $page . '.html';
        ?>
    </main>

    <footer>
        <p style="margin-top:0px">©2022 Studi-Guide</p><br>
        <nav id="footerNav">
            <a class="<?php echo $page == 'kontakt' ? 'active' : '' ?>" href="index.php?page=kontakt">Kontakt</a>
            <a class="<?php echo $page == 'datenschutz' ? 'active' : '' ?>" href="index.php?page=datenschutz">Datenschutz</a>
            <a class="<?php echo $page == 'impressum' ? 'active' : '' ?>" href="index.php?page=impressum">Impressum</a>
        </nav>
    </footer>

    <script src='./scripts/accessibility-dialog.js'></script>
</body>

</html>