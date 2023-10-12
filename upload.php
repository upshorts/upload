<?php
if(isset($_POST["submit"])) {
    $targetDirectory = "uploads/";
    $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);

    if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        echo "The image " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

?>

<?php
$files = glob('uploads/*.{jpg,jpeg,png,gif}', GLOB_BRACE);
foreach ($files as $file) {
    echo '<img src="' . $file . '" alt="Uploaded Image">';
}
?>
