$('#chooseFile').bind('change', function () {
    var filename = $("#chooseFile").val();
    if (/^\s*$/.test(filename)) {
        $(".file-upload").removeClass('active');
        $("#noFile").text("No file chosen...");
    }
    else {
        $(".file-upload").addClass('active');
        $("#noFile").text(filename.replace("C:\\fakepath\\", ""));
    }
    });

    //
    //
    document.addEventListener('DOMContentLoaded', function() {
        const passwordField = document.getElementById('password');
        const confirmPasswordField = document.getElementById('password_confirmation');
        const registerButton = document.getElementById('register-button');
        const alertWindow = document.getElementById('alert-window');
        const alertMessage = document.getElementById('alert-message');

        let animationInterval = null;
        let moveRight = true;

        function isPasswordValid() {
            return passwordField.value.length >= 8 && confirmPasswordField.value.length >= 8;
        }

        function arePasswordsMatching() {
            return passwordField.value === confirmPasswordField.value;
        }

        function moveButton() {
            if (!animationInterval) {
                animationInterval = setInterval(() => {
                    const buttonWidth = registerButton.offsetWidth;
                    const containerWidth = registerButton.parentNode.offsetWidth;
                    const maxLeft = containerWidth - buttonWidth;

                    let currentLeft = parseInt(window.getComputedStyle(registerButton).left, 10);

                    if (isNaN(currentLeft)) {
                        currentLeft = containerWidth / 2 - buttonWidth / 2;
                    }

                    if (!isPasswordValid() || !arePasswordsMatching()) {
                        registerButton.disabled = true;
                        alertWindow.style.display = 'block';
                        if (!isPasswordValid()) {
                            alertMessage.innerText = 'Le mot de passe doit comporter au moins 8 caractères.';
                        } else if (!arePasswordsMatching()) {
                            alertMessage.innerText = 'Les mots de passe ne correspondent pas.';
                        }
                        if (moveRight) {
                            currentLeft += 20; // Increase the movement distance to make it faster
                            if (currentLeft >= maxLeft) {
                                currentLeft = maxLeft;
                                moveRight = false;
                            }
                        } else {
                            currentLeft -= 20; // Increase the movement distance to make it faster
                            if (currentLeft <= 0) {
                                currentLeft = 0;
                                moveRight = true;
                            }
                        }
                        registerButton.style.left = currentLeft + 'px';
                    } else {
                        clearInterval(animationInterval);
                        animationInterval = null;
                        registerButton.disabled = false;
                        alertWindow.style.display = 'none';
                        registerButton.style.left = 'calc(50% - 50px)';
                    }
                }, 100); // Decrease the interval time to make it faster
            }
        }

        registerButton.addEventListener('mouseenter', moveButton);
        registerButton.addEventListener('mouseleave', () => {
            if (!isPasswordValid() || !arePasswordsMatching()) {
                moveButton();
            } else {
                clearInterval(animationInterval);
                animationInterval = null;
                registerButton.style.left = 'calc(50% - 50px)';
            }
        });

        // l'entre du bouton login
        const alreadyAccount = document.getElementById('already-account');
        setTimeout(() => {
            alreadyAccount.classList.add('show-already-account');
        }, 500);
    });





    // trasiontion de page

    // Script pour gérer la navigation entre pages
    document.addEventListener('DOMContentLoaded', function() {
        const transitionLinks = document.querySelectorAll('.transition-link');
        const pages = document.querySelectorAll('.page');
        
        function switchPage(targetId) {
            pages.forEach(page => {
                if (page.id === targetId) {
                    page.classList.add('active');
                } else {
                    page.classList.remove('active');
                }
            });
        }
        
        transitionLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = e.target.getAttribute('data-target');
                switchPage(targetId);
            });
        });
    
        // Initial display of the login page
        switchPage('login-page');
    });
    
