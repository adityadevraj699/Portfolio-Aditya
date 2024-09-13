$(document).ready(function() {
    $("#contactForm").validate({
        rules: {
            name: {
                required: true,
                minlength: 2
            },
            email: {
                required: true,
                email: true
            },
            subject: {
                required: true,
                minlength: 2
            },
            message: {
                required: true,
                minlength: 5
            }
        },
        messages: {
            name: {
                required: "Please enter your name",
                minlength: "Your name must consist of at least 2 characters"
            },
            email: {
                required: "Please enter your email address",
                email: "Please enter a valid email address"
            },
            subject: {
                required: "Please enter a subject",
                minlength: "Subject must be at least 2 characters long"
            },
            message: {
                required: "Please enter your message",
                minlength: "Your message must be at least 5 characters long"
            }
        },
        submitHandler: function(form) {
            $(form).ajaxSubmit({
                url: 'contact_process.php',
                type: 'post',
                success: function(response) {
                    $('#success').modal('show'); // Show success modal
                    $(form).resetForm(); // Reset form fields
                },
                error: function(xhr, status, error) {
                    console.error("Error:", status, error);
                    $('#error').modal('show'); // Show error modal
                }
            });
        }
    });
});
