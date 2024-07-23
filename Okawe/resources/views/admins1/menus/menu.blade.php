<!--
=========================================================
* Argon Dashboard 2 - v2.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('admins/assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('admins/assets/img/favicon.png')}}">
    {{-- JQUERY DEBUT --}}
        <script type="text/javascript" src="{{asset('jquery/jquery.js')}}"></script>
    {{-- JQUERY FIN --}}

    {{-- MON CSS DEBUT --}}
        <style>
            /* Styles CSS */
            .sidenav {
                transition: transform 0.3s ease-in-out, height 0.3s ease-in-out; /* Transition pour la hauteur */
                transform: translateY(0);
                position: fixed;
                top: 0;
                left: 0;
                width: 250px;
                height: 100%;
                background-color: #fff;
                z-index: 1000;
                padding-top: 60px;
            }

            .sidenav.collapsed {
                height: 60px; /* Hauteur minimale lorsque le menu est rétracté */
            }

            .sidenav-header {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100%; /* Ajout de la hauteur pour centrer verticalement le contenu */
            }

            .menu-icon,
            .open-icon {
                display: none;
            }

            #toggleMenuButton.collapsed .menu-icon {
                display: inline;
            }

            #toggleMenuButton.collapsed .open-icon {
                display: none;
            }

            #toggleMenuButton.collapsed #menuText[data-state="open"] {
                display: none;
            }

            #toggleMenuButton.collapsed #menuText[data-state="close"] {
                display: inline;
            }

            #toggleMenuButton span {
                margin-left: 5px;
            }
        </style>
        {{-- DARK AND LIGHT MODE CSS --}}

    {{-- MON CSS DEBUT --}}
    {{-- DATA TABLE DE ADMIN LTE DEBUT --}}
    <link rel="stylesheet" href="{{('admins/ltes/css/data-table/bootstrap-table.css')}}">
    <link rel="stylesheet" href="{{('admins/ltes/css/data-table/bootstrap-editable.css')}}">
    {{-- DATA TABLE DE ADMIN LTE fin --}}


    <title>
        Zeguerria->@yield('titre')
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{asset('admins/assets/css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('admins/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{asset('admins/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-MJX6vj3CjB4WtSS5ElnBZgF80lL+IBuj5RXSylA/q1Cn1RMi8cTndjxAsZPc6klNPgELAtJ7g8uEg6bnh7Urmg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS Files -->
    <link id="pagestyle" href="{{asset('admins/assets/css/argon-dashboard.css?v=2.0.4')}}" rel="stylesheet" />
    @yield('header')
</head>

<body class="g-sidenav-show   bg-gray-100 ">
    <div class="min-height-300 bg-primary position-absolute w-100 " id="backgroundDiv"></div>
    {{-- MENUS DEBUT --}}
        @include('admins.menus._menus.menu')
    {{-- MENUS FIN --}}


    <main class="main-content position-relative border-radius-lg "  >
        <!-- Navbar -->
        {{-- HEADER DEBUT --}}
        <div >
            @include('admins.menus._menus.header')


        </div>
        {{-- HEADER FIN --}}
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            @yield('corps')

            {{-- FOOTERS DEBUT --}}
                @include('admins.menus._menus.footer')
            {{-- FOOTERS FIN --}}


        </div>
    </main>
    {{-- PARAMETRES DEBUT --}}
        @include('admins.menus._menus.parametre')
    {{-- PARAMETRES FIN --}}

    <!--   Core JS Files   -->
    <script src="{{asset('admins/assets/js/core/popper.min.js')}}"></script>
    <script src="{{asset('admins/assets/js/core/bootstrap.min.js')}}"></script>
    <script src="{{asset('admins/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('admins/assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
    <script src="{{asset('admins/assets/js/plugins/chartjs.min.js')}}"></script>
    <script>
        var ctx1 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
        gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
        new Chart(ctx1, {
        type: "line",
        data: {
            labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
            label: "Mobile apps",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#5e72e4",
            backgroundColor: gradientStroke1,
            borderWidth: 3,
            fill: true,
            data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
            maxBarThickness: 6

            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
            legend: {
                display: false,
            }
            },
            interaction: {
            intersect: false,
            mode: 'index',
            },
            scales: {
            y: {
                grid: {
                drawBorder: false,
                display: true,
                drawOnChartArea: true,
                drawTicks: false,
                borderDash: [5, 5]
                },
                ticks: {
                display: true,
                padding: 10,
                color: '#fbfbfb',
                font: {
                    size: 11,
                    family: "Open Sans",
                    style: 'normal',
                    lineHeight: 2
                },
                }
            },
            x: {
                grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false,
                borderDash: [5, 5]
                },
                ticks: {
                display: true,
                color: '#ccc',
                padding: 20,
                font: {
                    size: 11,
                    family: "Open Sans",
                    style: 'normal',
                    lineHeight: 2
                },
                }
            },
            },
        },
        });
    </script>
    <script>
        // Attendez que le document soit prêt
        $(document).ready(function() {
                            // Ajouter un gestionnaire d'événements au clic sur le profil
        $('#profil').on('click', function(e) {
            e.preventDefault(); // Empêche le comportement par défaut du lien
            $('.mprofil').toggle(); // Affiche ou masque le menu déroulant
        });
        });
        $('#logoutLink').on('click', function(e) {
                e.preventDefault(); // Empêcher le comportement par défaut du lien
                $('#logoutForm').submit(); // Soumettre le formulaire
            });
            var win = navigator.platform.indexOf('Win') > -1;
            if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
            }
    </script>
    {{-- DATA TABLE ADMIN DEBUT --}}
    <script src="{{asset('admins/ltes/js/data-table/bootstrap-table.js')}}"></script>
    <script src="{{asset('admins/ltes/js/data-table/tableExport.js')}}"></script>
    <script src="{{asset('admins/ltes/js/data-table/data-table-active.js')}}"></script>
    <script src="{{asset('admins/ltes/js/data-table/bootstrap-table-editable.js')}}"></script>
    <script src="{{asset('admins/ltes/js/data-table/bootstrap-editable.js')}}"></script>
    <script src="{{asset('admins/ltes/js/data-table/bootstrap-table-resizable.js')}}"></script>
    <script src="{{asset('admins/ltes/js/data-table/colResizable-1.5.source.js')}}"></script>
    <script src="{{asset('admins/ltes/js/data-table/bootstrap-table-export.js')}}"></script>
        <script>
            $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
            //Money Euro
            $('[data-mask]').inputmask()

            //Date picker
            $('#reservationdate').datetimepicker({
                format: 'L'
            });

            //Date and time picker
            $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

            //Date range picker
            $('#reservation').daterangepicker()
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                locale: {
                format: 'MM/DD/YYYY hh:mm A'
                }
            })
            //Date range as a button
            $('#daterange-btn').daterangepicker(
                {
                ranges   : {
                    'Today'       : [moment(), moment()],
                    'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                    'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate  : moment()
                },
                function (start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                }
            )

            //Timepicker
            $('#timepicker').datetimepicker({
                format: 'LT'
            })

            //Bootstrap Duallistbox
            $('.duallistbox').bootstrapDualListbox()

            //Colorpicker
            $('.my-colorpicker1').colorpicker()
            //color picker with addon
            $('.my-colorpicker2').colorpicker()

            $('.my-colorpicker2').on('colorpickerChange', function(event) {
                $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
            })

            $("input[data-bootstrap-switch]").each(function(){
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            })

            })
            // BS-Stepper Init
            document.addEventListener('DOMContentLoaded', function () {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
            })

            // DropzoneJS Demo Code Start
            Dropzone.autoDiscover = false

            // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
            var previewNode = document.querySelector("#template")
            previewNode.id = ""
            var previewTemplate = previewNode.parentNode.innerHTML
            previewNode.parentNode.removeChild(previewNode)

            var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
            url: "/target-url", // Set the url
            thumbnailWidth: 80,
            thumbnailHeight: 80,
            parallelUploads: 20,
            previewTemplate: previewTemplate,
            autoQueue: false, // Make sure the files aren't queued until manually added
            previewsContainer: "#previews", // Define the container to display the previews
            clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
            })

            myDropzone.on("addedfile", function(file) {
            // Hookup the start button
            file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
            })

            // Update the total progress bar
            myDropzone.on("totaluploadprogress", function(progress) {
            document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
            })

            myDropzone.on("sending", function(file) {
            // Show the total progress bar when upload starts
            document.querySelector("#total-progress").style.opacity = "1"
            // And disable the start button
            file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
            })

            // Hide the total progress bar when nothing's uploading anymore
            myDropzone.on("queuecomplete", function(progress) {
            document.querySelector("#total-progress").style.opacity = "0"
            })

            // Setup the buttons for all transfers
            // The "add files" button doesn't need to be setup because the config
            // `clickable` has already been specified.
            document.querySelector("#actions .start").onclick = function() {
            myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
            }
            document.querySelector("#actions .cancel").onclick = function() {
            myDropzone.removeAllFiles(true)
            }
            // DropzoneJS Demo Code End
        </script>
        <script>
            const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
            const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
        </script>
        <script>
            $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
            });
        </script>
    {{-- DATA TABLE ADMIN FIN --}}

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{asset('admins/assets/js/argon-dashboard.min.js?v=2.0.4')}}"></script>

    {{-- SCRIPT POUR GERER MON DARK AND LIGTH MODE DEBUT --}}
        {{-- <script>
            document.addEventListener('DOMContentLoaded', function() {
                const modeToggle = document.getElementById('modeToggle'); // Sélectionnez le bouton de basculement du mode
                const moonIcon = document.getElementById('moonIcon'); // Sélectionnez l'icône moon

                // Vérifiez si l'utilisateur a déjà choisi un mode sombre ou clair précédemment
                const isDarkMode = localStorage.getItem('darkMode') === 'true';
                if (isDarkMode) {
                    document.body.classList.add('dark-mode');
                    moonIcon.classList.remove('fa-moon');
                    moonIcon.classList.add('fa-sun');
                }

                // Ajoutez un gestionnaire d'événements au clic sur le bouton de basculement du mode
                modeToggle.addEventListener('click', function() {
                    const isDarkMode = document.body.classList.toggle('dark-mode'); // Basculer entre les modes sombre et clair

                    // Enregistrez l'état du mode choisi par l'utilisateur dans le stockage local
                    localStorage.setItem('darkMode', isDarkMode);

                    // Vérifiez quelle classe est actuellement appliquée à l'icône
                    if (moonIcon.classList.contains('fa-moon')) {
                        // Si l'icône est en mode sombre (moon), changez-la en mode clair (sun)
                        moonIcon.classList.remove('fa-moon');
                        moonIcon.classList.add('fa-sun');
                    } else {
                        // Sinon, l'icône est en mode clair (sun), changez-la en mode sombre (moon)
                        moonIcon.classList.remove('fa-sun');
                        moonIcon.classList.add('fa-moon');
                    }
                });
            });
        </script> --}}
        <!-- Script JavaScript -->
        {{-- <script>
            document.addEventListener('DOMContentLoaded', function() {
                const modeToggle = document.getElementById('modeToggle'); // Sélectionnez le bouton de basculement du mode
                const moonIcon = document.getElementById('moonIcon'); // Sélectionnez l'icône moon
                const backgroundDiv = document.getElementById('backgroundDiv'); // Sélectionnez le div contenant l'image de fond

                // Vérifiez si l'utilisateur a déjà choisi un mode sombre ou clair précédemment
                const isDarkMode = localStorage.getItem('darkMode') === 'true';
                if (isDarkMode) {
                    document.body.classList.add('dark-mode');
                    moonIcon.classList.remove('fa-moon');
                    moonIcon.classList.add('fa-sun');
                    backgroundDiv.style.backgroundImage = 'url({{ asset("admins/assets/img/t-1-dark.jpg") }})';
                } else {
                    backgroundDiv.style.backgroundImage = 'url({{ asset("admins/assets/img/t-1-light.jpg") }})';
                }

                // Ajoutez un gestionnaire d'événements au clic sur le bouton de basculement du mode
                modeToggle.addEventListener('click', function() {
                    const isDarkMode = document.body.classList.toggle('dark-mode'); // Basculer entre les modes sombre et clair

                    // Enregistrez l'état du mode choisi par l'utilisateur dans le stockage local
                    localStorage.setItem('darkMode', isDarkMode);

                    // Vérifiez quelle classe est actuellement appliquée à l'icône
                    if (moonIcon.classList.contains('fa-moon')) {
                        // Si l'icône est en mode sombre (moon), changez-la en mode clair (sun)
                        moonIcon.classList.remove('fa-moon');
                        moonIcon.classList.add('fa-sun');
                        backgroundDiv.style.backgroundImage = 'url({{ asset("glbal/theme/t-1-dark.jpg") }})';
                    } else {
                        // Sinon, l'icône est en mode clair (sun), changez-la en mode sombre (moon)
                        moonIcon.classList.remove('fa-sun');
                        moonIcon.classList.add('fa-moon');
                        backgroundDiv.style.backgroundImage = 'url({{ asset("glbal/theme/t-1-light.png") }})';
                    }
                });
            });
        </script> --}}


    {{-- SCRIPT POUR GERER MON DARK AND LIGTH MODE DEBUT --}}

    {{-- @include('sweetalert::alert') --}}

    @yield('footer')
</body>

</html>
