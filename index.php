<?php
include_once ('./function.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./main.css">
</head>
<body>
    <main>
        <button class="nav-button" onclick="window.location.href='form.php?id=1'">Opinia o zajęciach</button>
        <button class="nav-button" onclick="window.location.href='form.php?id=2'">Opinia o egzaminie</button>
        <button class="nav-button" onclick="window.location.href='form.php?id=3'">Opinia o szkole</button>
        <?php
        if (!empty($_SESSION['success_message'])) {
            echo "<p style='color: green;'>" . htmlspecialchars($_SESSION['success_message']) . "</p>";
            unset($_SESSION['success_message']);
        }
        ?>
    </main>
</body>
</html>