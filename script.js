document.addEventListener('DOMContentLoaded', function () {
    const ballLink = document.getElementById('ball-link');

    ballLink.addEventListener('click', function (e) {
        e.preventDefault(); // Prevent the default link behavior
        const pageURL = ballLink.getAttribute('href');
        window.location.href = pageURL; // Redirect to the specified URL
    });
});
