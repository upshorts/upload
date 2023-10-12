<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES["video"])) {
    $uploadDirectory = "uploadvid/";
    if (!file_exists($uploadDirectory)) {
        mkdir($uploadDirectory, 0777, true);
    }

    $videoName = $_FILES["video"]["name"];
    $videoPath = $uploadDirectory . $videoName;

    // Check the video duration
    $ffmpegPath = '/path/to/ffmpeg';  // Replace with the actual path to the ffmpeg binary
    $command = "$ffmpegPath -i $videoPath 2>&1 | grep 'Duration'";
    exec($command, $output);
    
    if (count($output) > 0) {
        $durationString = $output[0];
        $durationArray = explode(" ", $durationString);
        $duration = trim($durationArray[1], ",");
        $durationInSeconds = timeToSeconds($duration);

        // Allow videos within 5 seconds of 30 seconds
        if (abs($durationInSeconds - 30) <= 5) {
            if (move_uploaded_file($_FILES["video"]["tmp_name"], $videoPath)) {
                echo "Video uploaded successfully!";
            } else {
                echo "Error uploading the video.";
            }
        } else {
            echo "Video duration must be approximately 30 seconds.";
        }
    } else {
        echo "Error checking the video duration.";
    }
}

function timeToSeconds($time) {
    list($hours, $minutes, $seconds) = explode(':', $time);
    return $hours * 3600 + $minutes * 60 + $seconds;
}

$videoFiles = glob("uploadvid/*.{mp4,webm}", GLOB_BRACE);
?>

<!-- ... rest of the HTML ... -->
