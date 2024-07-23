(function($) {

	"use strict";
    document.addEventListener('DOMContentLoaded', function() {
        const passwordField = document.getElementById('password');
        const loginButton = document.getElementById('login-button');
        const alertWindow = document.getElementById('alert-window');
        const alertMessage = document.getElementById('alert-message');

        function isPasswordValid() {
            return passwordField.value.length >= 8;
        }

        function validatePassword() {
            if (passwordField.value.length === 0) {
                loginButton.disabled = true;
                alertWindow.style.display = 'none';
            } else if (!isPasswordValid()) {
                loginButton.disabled = true;
                alertWindow.style.display = 'block';
                alertMessage.innerText = 'Le mot de passe doit comporter au moins 8 caractères.';
            } else {
                loginButton.disabled = false;
                alertWindow.style.display = 'none';
            }
        }

        // Validate password on input change
        passwordField.addEventListener('input', validatePassword);

        // Validate password on page load
        validatePassword();

        // Handle form submission
        loginButton.addEventListener('click', function() {
            if (isPasswordValid()) {
                const email = document.getElementById('email').value;
                const password = document.getElementById('password').value;

                // Clear previous error message
                alertWindow.style.display = 'none';
                alertMessage.innerText = '';

                // Simulate form submission and server response
                simulateLogin(email, password)
                    .then(isLoginSuccessful => {
                        if (isLoginSuccessful) {
                            // Redirect or handle successful login
                            window.location.href = '/home'; // Redirect to home page or dashboard
                        } else {
                            // Show error message if login fails
                            alertWindow.style.display = 'block';
                            alertMessage.innerText = 'Email ou mot de passe incorrect.';
                        }
                    });
            }
        });

        // Simulated login function
        function simulateLogin(email, password) {
            return new Promise((resolve) => {
                setTimeout(() => {
                    // Simulate successful login if email and password are both 'admin'
                    const isLoginSuccessful = email === 'admin@example.com' && password === 'password123';
                    resolve(isLoginSuccessful);
                }, 960); // Simulate network delay
            });
        }

        // Animation d'entrée pour le lien "Already have an account?"
        const alreadyAccount = document.getElementById('already-account');
        setTimeout(() => {
            alreadyAccount.style.opacity = '1';
            alreadyAccount.style.transition = 'opacity 0.5s';
        }, 500);
    });
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      });

})(jQuery);

