<?php
    $messages = file('messages.txt', FILE_IGNORE_NEW_LINES);
    foreach ($messages as $message) {
        echo '<div class="message">' . htmlspecialchars($message) . '</div>';
    }
?>
