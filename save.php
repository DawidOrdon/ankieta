<?php
include_once ('./function.php');

if (!isset($db)) {
    die("Połączenie z bazą nie istnieje!");
}

$tableName = $_ENV['DBT'.$_SESSION['table']];
if (empty($tableName)) {
    die("Nazwa tabeli jest pusta!");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $opinion = trim(isset($_POST['opinion']) ? $_POST['opinion'] : '');

    $errors = [];
    if (empty($opinion)) {
        $errors[] = "Pole opinii nie może być puste.";
    } elseif (strlen($opinion) > 4096) {
        $errors[] = "Tekst opinii nie może przekraczać 4096 znaków.";
    }

    if (!empty($errors)) {
        $_SESSION['form_errors'] = $errors;
        $_SESSION['old_opinion'] = $opinion;
        header("Location: form.php");
        exit;
    }
    try {
        $stmt = $db->prepare("INSERT INTO ".$tableName." (`tresc`) VALUES (?)");
        $stmt->bind_param('s',$_POST['opinion']);
        $stmt->execute();

        $_SESSION['success_message'] = "Dziękuję za podzielenie się opinią!";
        header("Location: index.php");
        exit;
    } catch (PDOException $e) {
        $_SESSION['form_errors'] = ["Błąd zapisu do bazy: " . $e->getMessage()];
        $_SESSION['old_opinion'] = $opinion;
        header("Location: form.php");
        exit;
    }
} else {
    header("Location: form.php");
    exit;
}