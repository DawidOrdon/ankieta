<?php
include_once ('./function.php');
if(!empty($_GET['id'])){
    $_SESSION['table']=$_GET['id'];
    $com="C".$_GET['id'];
}
$errors = isset($_SESSION['form_errors']) ? $_SESSION['form_errors'] : [];
$oldOpinion = isset($_SESSION['old_opinion']) ? $_SESSION['old_opinion'] : '';
unset($_SESSION['form_errors'], $_SESSION['old_opinion']);
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
    <button class="back-button" onclick="window.location.href='index.php'">Powrót do menu</button>
    <form method="post" action="save.php">
        <h2 style="text-align: center;">Prześlij opinię</h2>
        <?php if (!empty($errors)): ?>
            <div style="color: red;">
                <?php foreach ($errors as $error): ?>
                    <p><?php echo htmlspecialchars($error); ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <textarea name="opinion" placeholder="Wpisz swoją opinię (maks. 4096 znaków)" maxlength="4096" required><?php echo htmlspecialchars($oldOpinion); ?></textarea>
        <button type="submit">Wyślij</button>
    </form>
</main>
</body>
</html>