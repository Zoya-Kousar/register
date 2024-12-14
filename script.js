$(document).ready(function() {
    $('#registrationForm').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            url: 'process.php',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                window.location.href = 'display.php';
            },
            error: function() {
                alert('There was an error processing your request.');
            }
        });
    });
});
