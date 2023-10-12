<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
  
    <div class="container">
        <h1>Image Upload</h1>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <div class="upload-btn-wrapper">
                <button class="btn">Upload an Image</button>
                <input type="file" name="image" id="image" accept="image/*" required>
            </div>
            <input type="text" name="title" placeholder="Enter Image Title" required>
            <button type="submit" class="upload-button" id="submit-button">Submit</button>
            <!-- Refresh button -->
            <button type="button" class="refresh-button" id="refresh-button">&#8634;</button>
        </form>
    </div>
    <div class="image-container">
        <?php
        // Fetch and display images and titles from the server directory
        $uploadDir = 'uploads/';
        $uploadedImages = glob($uploadDir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

        foreach ($uploadedImages as $image) {
            $title = basename($image);
            echo '<div class="image-box">';
            echo '<img src="' . $image . '" alt="' . $title . '" class="uploaded-image">';
            echo '<p class="image-title">' . $title . '</p>';
            echo '</div>';
        }
        ?>
    </div>

    <!-- Include the script.js file at the end of the body -->
    <script src="script.js"></script>
    <style>
        /* Style for the Refresh button */
        .refresh-button {
            font-size: 24px; /* Increase the font size to make it bigger */
            color: white;
            background-color: green;
            border: none;
            padding: 10px 20px; /* Adjust padding for button size */
            border-radius: 5px;
            cursor: pointer;
        }

        .refresh-button:hover {
            background-color: darkgreen; /* Change color on hover */
        }

        /* Responsive styles */
        @media screen and (max-width: 768px) {
            /* Styles for tablets and smaller screens */
            .container {
                font-size: 14px; /* Adjust font size for smaller screens */
            }

            .upload-button {
                padding: 8px 16px; /* Adjust button padding for smaller screens */
            }
        }

        @media screen and (max-width: 480px) {
            /* Styles for phones and smaller screens */
            .container {
                font-size: 12px; /* Adjust font size for smaller screens */
            }

            .upload-button {
                padding: 6px 12px; /* Adjust button padding for smaller screens */
            }
        }
    </style>
    <script>
        // Add a click event listener to the Refresh button
        document.getElementById('refresh-button').addEventListener('click', function() {
            // Refresh the page
            window.location.reload();
        });
    </script>
    <script>
        // Disable right-click on the entire document
        document.addEventListener('contextmenu', function(event) {
            event.preventDefault();
        });
    </script>
</body>
</html>
