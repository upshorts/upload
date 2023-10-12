// Handle video upload
const videoInput = document.getElementById("videoInput");
const uploadButton = document.querySelector(".upload-button");

uploadButton.addEventListener("click", function () {
    videoInput.click();
});

videoInput.addEventListener("change", function () {
    const file = videoInput.files[0];
    if (file) {
        // You can use AJAX or any server-side language like PHP to handle the video upload
        // Here's a basic example with JavaScript for demonstration purposes:
        alert(`Video uploaded: ${file.name}`);
    }
});
