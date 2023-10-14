<?php
    if (isset($_POST['message']) && $_POST['message'] !== '') {
        $message = $_POST['message'] . "\n";
        file_put_contents('messages.txt', $message, FILE_APPEND | LOCK_EX);
    }
    header("Location: index.php");
    exit;
?>
