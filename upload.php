<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_FILES["image"])) {
        $uploadDir = "uploads/";
        $title = $_POST["title"];

        // Get the file extension from the uploaded file
        $fileExtension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);

        // Generate a unique filename based on the provided title and the current timestamp
        $newFilename = $title . '_' . time() . '.' . $fileExtension;

        $uploadFile = $uploadDir . $newFilename;

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $uploadFile)) {
            // On successful upload, echo a success message and the success GIF
         
            echo '<img src="success.gif" alt="Success">';
        } else {
            // On unsuccessful upload, echo an error message and the error GIF
            echo "Error uploading image.";
            echo '<img src="error.gif" alt="Error">';
        }
    }
}
?>









