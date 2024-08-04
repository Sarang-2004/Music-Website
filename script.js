document.addEventListener('DOMContentLoaded', function() {
    // Get the "Sign In" link element
    var signInLink = document.querySelector('a[href="login.php"]');

    // Add a click event listener to the "Sign In" link
    signInLink.addEventListener('click', function(event) {
        // Prevent the default action of the link
        event.preventDefault();

        // Display an alert message
        alert('Sign in functionality will be implemented soon.');
    });
});
