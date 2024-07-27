
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/dgcpt/favicon.ico')}}">

    {{-- Animation Scroll --}}
    {{-- <link href="{{asset('atres/aos/dist/aos.css')}}" rel="stylesheet"> --}}

    <title>ADMIN-OKAWE ->@yield('titre')</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <style>
        /* Custom Calendar Styles */
        #calendar {
            max-width: 100%;
            margin: 0 auto;
            /* background-color: #ffffff; */
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }

        .fc-toolbar {
            border-radius: 8px 8px 0 0;
            padding: 10px;
        }
        .fc-button {
            background-color: #28a745;
            border: none;
            border-radius: 4px;
            color: white;
            margin: 0 5px;
            transition: background-color 0.3s;
            flex: 1 1 auto;
            text-align: center;
        }
        .fc-button:hover {
            background-color: #218838;
        }
        .fc-button-primary {
            background-color: #28a745;
        }
        .fc-button-primary:hover {
            background-color: #218838;
        }
        .fc-title {
            color: #ffffff;
            font-size: 14px;
        }
        .fc-event {
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: rgb(253, 8, 8);
            padding: 2px 5px;
        }
        .fc-daygrid-event {
            background-color: #ff1100;
            border: none;
            border-radius: 4px;
            color: white;
        }
        .fc-daygrid-day {
            border: 1px solid #ddd;
        }
        .fc-col-header-cell {
            background-color: #28a745;
            color: white;
            border-radius: 4px 4px 0 0;
        }
        @media (max-width: 768px) {
            .fc-toolbar {
                flex-direction: column;
            }
            .fc-button {
                flex: 1 1 100%;
                margin: 5px 0;
            }
        }
    </style>

    {{-- <link rel="stylesheet" href="{{ asset('admins/plugins/fontawesome-free/css/all.min.css') }}"> --}}
    <!-- FullCalendar -->
    {{-- <link rel="stylesheet" href="{{ asset('admins/plugins/fullcalendar/main.css') }}"> --}}
    <!-- AdminLTE style -->
    {{-- <link rel="stylesheet" href="{{ asset('admins/dist/css/adminlte.min.css') }}"> --}}




        <style>
                .tit{
                    color :#000000;
                    font-family: 'Segoe UI','Open Sans', 'Helvetica Neue', sans-serif;
                    font-weight: 600; /* Medium */
                }
                .ti{
                    color :#0F0F0F;
                    font-family: 'Segoe UI','Open Sans', 'Helvetica Neue';
                    font-weight: 300; /* Medium */
                }
                .t{
                    color :#d1c7c7;
                    font-family: 'Segoe UI','Open Sans', 'Helvetica Neue';
                    font-weight: 300; /* Medium */
                }

                .titre-grandiant{
                    /* background : linear-gradient(90deg, #60528A, #7B2974, #D097BF,#FCF2E9); */
                    background : linear-gradient(90deg,#000000,#111);
                    -webkit-background-clip: text;
                    background-clip: text;
                    color : transparent ;
                    /* animation: textGradient 3s ease infinite; */
                }
                .serch{
                    background : linear-gradient(90deg,#F0F0F0,#E9E9E9);

                }
                .moncard{
                    /* background : linear-gradient(90deg, #010217,#1A0B42, #010217,#010217); */
                    background : linear-gradient(90deg, #F0F0F0, #E9E9E9);
                    /* background : linear-gradient(90deg, #F9F9F9, #DEDEDE,#F9F9F9,#DEDEDE); */
                    /* background : linear-gradient(90deg, #22184C,#D097BF,#7B2974, #3C1D60, #01010C); */
                }





                /* Annimation de battement de coeur */
                .nav-link-heart {
                    position: relative;
                    display: inline-block;
                }
                .nav-link-heart {
                    position: relative;
                    display: inline-block;
                    transition: transform 0.3s ease; /* Ajoutez cette ligne pour une transition fluide */
                }
                .nav-link-heart:hover {
                    transform: scale(1.1); /* Ajustez cette valeur selon vos besoins */
                }

                @keyframes heartbeat {
                    0% {
                        transform: scale(1);
                    }
                    50% {
                        transform: scale(1.1);
                    }
                    100% {
                        transform: scale(1);
                    }
                }





            /* Ajoutez les styles pour l'animation des étapes */
            .modal-step {
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }

            /* Ajoutez les styles pour l'étape active */
            .modal-step.active {
                transform: translateX(0);
                box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            }

            /* Ajoutez les styles pour les étapes précédentes et suivantes */
            .modal-step.previous,
            .modal-step.next {
                transform: translateX(-100%);
                box-shadow: 0px 0px 0px rgba(0, 0, 0, 0); /* Pour supprimer l'ombre */
            }

            /* Ajoutez les styles pour masquer les étapes précédentes et suivantes */
            .modal-step.hidden {
                display: none;
            }
            /* .pause-animation {
                /*£******* Propriétés pour arrêter l'animation *
                animation-play-state: paused !important;
                -webkit-animation-play-state: paused !important;
                -moz-animation-play-state: paused !important;
                -o-animation-play-state: paused !important;
            } */
             /* CSS pour personnaliser les événements du calendrier */
            .fc-event-content {
                display: flex;
                flex-direction: column;
                align-items: center;
                background:linear-gradient(90deg,#F0F0F0,#E9E9E9); /* Fond blanc pour les événements */
                border: 1px solid #ccc; /* Bordure gris clair */
                border-radius: 5px; /* Coins arrondis */
                padding: 10px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                cursor: pointer;
                transition: background-color 0.3s, box-shadow 0.3s;
            }
            .fc-event-content:hover {
                background-color: #f0f0f0;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            }

            .fc-event-title {
                font-size: 0.9em;
                font-weight: bold;
                /* color:#000; */
            }





/* CSS pour rendre le calendrier réactif */
#calendar {
    width: 100%;
    height: auto; /* Ajuste automatiquement la hauteur */
}

@media (max-width: 768px) {
    .fc-event-content {
        padding: 8px;
    }
    .fc-event-title {
        font-size: 0.8em;
    }
    .fc-event-status {
        font-size: 0.7em;
    }
}







        </style>
        {{-- MON CSS DEBUT  --}}
    <style>
        /* SIMPLE CSS DEBUT*/
            .checkbox-disabled {
                cursor: not-allowed;
            }
            .edit-disabled {
                display: none;
            }
            .text-line-through {
                text-decoration: line-through;
            }
        /* SIMPLE CSS FIN*/



        /* CLAIR DEBUT */
        body{
            overflow-x: hidden;
        }

            body.light-mode {
                background-color: #ffffff;
                color: #000000;
            }
            body.light-mode .main-header{
                background-image : url({{asset('glbal/theme/t7.jpg')}});
                background-size : cover;
                background-repeat: no-repeat;
                filter : grayscale(20%);
            }

            body.light-mode #icon{
                color: #000;

            }
            body.light-mode #monicon{
                color: #000;
                font-size: 16px;
                font-family : 'Arial';
            }
            body.light-mode .repondre{
                color: #000000;
                font-weight: 600;
            }
            body.light-mode .message{
                color: #000;
                font-family : 'Times New Roman';
            }
            body.light-mode .main-sidebar{
                background-image: url({{asset('glbal/theme/t7c.jpg')}}) ;
                background-position: center;
                background-size: cover;
                background-repeat: no-repeat;
            }
            body.light-mode .application{
                color : #ff0000;
                font-weight: 600;
                font-size: 1.2em;
                font-family: "Vivaldi";
                /* font-family: "ElMessiri-SemiBold", sans-serif; */
            }
            body.light-mode .application_suite{
                color : #000;
                font-weight: 900;
                font-family: "Bradley Hand ITC";

            }
            body.light-mode #user{
                color : #000;
                font-weight: 900;
                font-family: "Times New Roman', Times, serif";

            }
            body.light-mode .larecherche{
                background-color :#fff;

            }
            body.light-mode .mesliens{
                color: #000000;
                font-size: 20px;
                font-family : 'Times New Roman', Times, serif;
            }
            body.light-mode .msicons{
                color: #000000;
            }
            body.light-mode .liens{
                color: #000000;
                font-family : 'Times New Roman', Times, serif;
            }
            body.light-mode .mestitres{
                color : #000000;
            }
            body.light-mode .moncard{
                /* background : linear-gradient(90deg, #010217,#1A0B42, #010217,#010217); */
                background : linear-gradient(90deg, #F0F0F0, #E9E9E9);
                /* background : linear-gradient(90deg, #F9F9F9, #DEDEDE,#F9F9F9,#DEDEDE); */
                /* background : linear-gradient(90deg, #22184C,#D097BF,#7B2974, #3C1D60, #01010C); */
            }
            body.light-mode .comming{
                color : #ff0000;
            }
            body.light-mode #calendar {
                background-color: #ffffff;
            }
            body.light-mode .fc-toolbar {
                background-color: #ffffff;
                color: #000;
            }
            body.light-mode .chartTitre{
                color : #000;
                font-family: 18px;

            }
            body.light-mode .chartTitreG{
                color : #000;
                font-family: 20;

            }
            body.light-mode .fc-event-status {
                font-size: 0.8em;
                color: #0b0b0b; /* Couleur du texte pour le statut */
            }
            body.light-mode .fc-event-attente {
                background: #b72f3b; /* Rouge clair pour 'attente' */
                border-color: #b72f3b;
            }
            body.light-mode .fc-event-title {
                color:#000;
            }
            body.light-mode .fc-event-cours {
                background: #fff3cd; /* Jaune clair pour 'cours' */
                border-color: #ffeeba;
            }
            body.light-mode .fc-event-ternime {
                background: #03f13b; /* Vert clair pour 'terminé' */
                border-color: #1df850;
            }
            body.light-mode .fc-event-reporte {
                background: #3d6ef7; /* Bleu clair pour 'reporté' */
                border-color: #b8daff;
            }
            body.light-mode .lescard {
                background-image : url({{asset('glbal/theme/t7.jpg')}});
                background-size : cover;
                background-repeat: no-repeat;
                filter : grayscale(20%);

            }
        /* CLAIR FIN */

        /* Sombre Debut */
            body.dark-mode .lescard {
                background-image : url({{asset('glbal/theme/t7d.jpg')}});
                background-size : cover;
                background-repeat: no-repeat;

            }
            body.dark-mode .fc-event-reporte {
                background: #0143fa; /* Bleu clair pour 'reporté' */
                border-color: #80bcfc;
            }
            body.dark-mode .fc-event-ternime {
                background: #019e26; /* Vert clair pour 'terminé' */
                border-color: #028220;
            }
            body.dark-mode .fc-event-cours {
                background: rgb(145, 111, 2); /* Jaune clair pour 'cours' */
                border-color: rgb(255, 192, 4);
            }
            body.dark-mode .fc-event-title {
                color: #0F056B;
            }
            body.dark-mode .fc-event-attente {
                background: #b40000; /* Rouge clair pour 'attente' */
                border-color: #b40000;
            }
            body.dark-mode .fc-event-status {
                font-size: 0.8em;
                color: #00f2ff; /* Couleur du texte pour le statut */
            }
            body.dark-mode .chartTitre{
                color : #fff;
                font-family: 18px;
            }
            body.dark-mode .chartTitreG{
                color : #fff;
                font-family: 20px;
            }
            body.dark-mode .fc-toolbar {
                background-color: #1a1a1a;
                color: white;
            }
            body.dark-mode .#calendar {
                background-color: #000000;
            }
            body.dark-mode .comming{
                color : #0066ff;
            }
            body.dark-mode .moncard{
                /* background : linear-gradient(90deg, #010217,#1A0B42, #010217,#010217); */
                background : linear-gradient(90deg, #454d55, #000);
                /* background : linear-gradient(90deg, #F9F9F9, #DEDEDE,#F9F9F9,#DEDEDE); */
                /* background : linear-gradient(90deg, #22184C,#D097BF,#7B2974, #3C1D60, #01010C); */
            }
            body.dark-mode .mestitres{
                color : #ffff;
            }
            body.dark-mode .liens{
                color: #fff;
                font-family : 'Times New Roman', Times, serif;
            }
            body.dark-mode .msicons{
                color: #fff;
            }
            body.dark-mode .mesliens{
                color: #fff;
                font-size: 20px;
                font-family : 'Times New Roman', Times, serif;
            }
            body.dark-mode .larecherche{
                background-color :#949292;

            }
            body.dark-mode .larecherche:hover{
                background-color :#0066ff;

            }
            body.dark-mode #user{
                color : #fff;
                font-weight: 900;
                font-family: "Times New Roman', Times, serif";

            }
            body.dark-mode .application{
                color : #0066ff;
                font-weight: 600;
                font-size: 1.2em;
                font-family: "Vivaldi";
            }
            body.dark-mode .application_suite{
                color : #fff;
                font-family: "Bradley Hand ITC";

            }
            body.dark-mode .main-sidebar{
                background-image: url({{asset('glbal/theme/t7dc.jpg')}}) ;
                background-position: center;
                background-size: cover;
                background-repeat: no-repeat;
            }
            body.dark-mode .message{
                color: #fff;
                font-family : 'Times New Roman', Times, serif;
            }
            body.dark-mode .repondre{
                color: #0066ff;
                font-weight: 600;
            }
            body.dark-mode {
                background-color: #1a1a1a;
                color: #cccccc;
            }
            body.dark-mode #icon{
                color: #f5e609;

            }
            body.dark-mode #monicon{
                color: #fff;
                font-size: 16px;
                font-family : 'Arial';
            }
            body.dark-mode .main-header{
                background-image : url({{asset('glbal/theme/t7d.jpg')}});
                background-size : cover;
                background-repeat: no-repeat;
                /* filter : grayscale(20%); */
            }

    </style>
    {{-- MON CSS FIN  --}}
        <!-- BS Stepper -->
        <link rel="stylesheet" href="{{asset("admins/plugins/bs-stepper/css/bs-stepper.min.css")}}">
    {{-- btn debt  --}}
        {{-- <link rel="stylesheet" href="{{asset('atres/btn/btn12/css/ionicons.min.css')}}"> --}}
		<link rel="stylesheet" href="{{asset('portofolios/bootstrap-buttons-12/css/style.css')}}" />
    {{-- btn fn  --}}
    {{-- slect debt  --}}
         <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('admins/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('admins/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    {{-- slct fn  --}}
    {{-- tblea debt  --}}
    <link rel="stylesheet" href="{{asset('admins/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admins/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admins/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

    {{-- tblea fn  --}}

    <!-- Google Font: Source Sans Pro -->
    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> --}}
    <!-- Font Awesome -->
    {{-- <link rel="stylesheet" href="{{asset('admins/plugins/fontawesome-free/css/all.min.css')}}"> --}}
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('admins/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('admins/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('admins/plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('admins/dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('admins/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('admins/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('admins/plugins/summernote/summernote-bs4.min.css')}}">
    <style>

    </style>
<link rel="stylesheet" href="{{asset('atres/aos-master/dist/aos.css')}}" />

<link rel="stylesheet" href="{{asset('admins/fontfamily.css')}}">
		<link rel="stylesheet" href="{{asset('admins/ionicon.css')}}">
        <link rel="stylesheet" href="{{ asset('fontawsome/fontawesome-free-5.15.4-web/css/all.min.css') }}">


</head>
@yield('header')
<body data-user-theme="{{ Auth::user()->theme ?? '' }}" class="hold-transition sidebar-mini layout-fixed" >
<div class="wrapper">

  <!-- Preloader -->
  {{-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> --}}

  <!-- Navbar -->

    @include('admins.menus._menus.navigation')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('admins.menus._menus.navmenu')

    <!-- Content Wrapper. Contains page content -->
    @yield('corps')
    <!-- /.content-wrapper -->
    @include('admins.menus._menus.footer')

    @include('admins.menus._menus.modal')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

 <script src="{{asset('admins/dist/js/bundle.js')}}"></script>
 <script src="{{asset('admins/dist/js/bdlmn.js')}}"></script>
<script src="{{asset('admins/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('admins/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('admins/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('admins/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('admins/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('admins/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('admins/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('admins/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('admins/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('admins/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('admins/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('admins/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('admins/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admins/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{asset('admins/dist/js/demo.js')}}"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('admins/ist/js/pages/dashboard.js')}}"></script>
{{-- tablea debt  --}}
<script src="{{asset('admins/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('admins/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('admins/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<!-- DataTables  & Plugins -->
    <script src="{{asset('admins/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admins/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admins/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admins/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admins/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('admins/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admins/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('admins/plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('admins/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('admins/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('admins/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('admins/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    <!-- Bootstrap Switch -->
    <script src="{{asset('admins/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
    <!-- BS-Stepper -->
    <script src="{{asset('admins/plugins/bs-stepper/js/bs-stepper.min.js')}}"></script>
    <!-- ChartJS -->
    <script src="{{asset('admins/plugins/chart.js/Chart.min.js')}}"></script>
    <!-- FullCalendar -->
<link rel="stylesheet" href="{{ asset('admins/plugins/fullcalendar/main.css') }}">
<script src="{{ asset('admins/plugins/fullcalendar/main.js') }}"></script>

{{-- CALENDRIER DEBUT --}}
    <script>
        $(document).ready(function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                themeSystem: 'bootstrap',
                events: function(info, successCallback, failureCallback) {
                    $.ajax({
                        url: '/tasks/events',
                        method: 'GET',
                        success: function(data) {
                            successCallback(data);
                        },
                        error: function() {
                            failureCallback('Erreur lors de la récupération des événements');
                        }
                    });
                },
                editable: true,
                selectable: true,
                eventClick: function(info) {
                    $('#modalTitle').text(info.event.title);
                    $('#modalDescription').text(info.event.extendedProps.description || 'Aucune description');
                    $('#modalStatus').text(info.event.extendedProps.status);
                    $('#modalStartDate').text(info.event.startStr);
                    $('#modalEndDate').text(info.event.endStr || 'Non défini');
                    $('#modalProject').text(info.event.extendedProps.projectName || 'Aucun projet');
                    $('#modalEffectuant').text(info.event.extendedProps.effectuant || 'Aucun Effectuant');

                    var myModal = new bootstrap.Modal(document.getElementById('taskModal'));
                    myModal.show();
                },
                eventContent: function(arg) {
                    var title = document.createElement('div');
                    title.className = 'fc-event-title';
                    title.innerText = arg.event.title;

                    var status = document.createElement('div');
                    status.className = 'fc-event-status';
                    status.innerText = arg.event.extendedProps.status;

                    var container = document.createElement('div');
                    container.className = 'fc-event-content';
                    container.appendChild(title);
                    container.appendChild(status);

                    return { domNodes: [container] };
                },
                eventClassNames: function(arg) {
                    return [
                        'fc-event-' + (arg.event.extendedProps.status || 'default')
                    ];
                }
            });
            calendar.render();
        });
    </script>
{{-- CALENDRIER FIN --}}




    {{-- GSAP DEBUT --}}
        <script src="{{asset('glbal/gsap/gsap.min.js')}}"></script>
        <script>
            // Animation à l'ouverture de la modal
            $('.animated-modal').on('show.bs.modal', function (e) {
                console.log("Opening modal...");

                // Sélectionne la boîte de dialogue de la modal
                var modal = $(this).find('.modal-dialog');
                // Crée un élément de fond pour la modal
                var backdrop = $('<div class="modal-backdrop fade"></div>');
                // Ajoute l'élément de fond au corps du document
                $('body').append(backdrop);

                // Initialise les propriétés CSS de la modal avec GSAP
                gsap.set(modal, { opacity: 0, scale: 0.5, rotationY: 90, x: 200, transformOrigin: "50% 50%" });
                gsap.set(backdrop, { opacity: 0 });

                // Crée une timeline pour l'animation
                gsap.timeline()
                    // Anime le fond de la modal
                    .to(backdrop, { duration: 0.5, opacity: 0.5, ease: 'power2.out' })
                    // Anime l'apparition de la modal
                    .to(modal, { duration: 0.7, opacity: 1, scale: 1.2, rotationY: 0, x: 0, ease: 'back.out(1.7)' })
                    // Réduit légèrement l'échelle de la modal pour un effet de rebondissement
                    .to(modal, { duration: 0.3, scale: 1, ease: 'elastic.out(1, 0.3)' }, "-=0.2")
                    // Ajoute une ombre à la modal pour plus de profondeur
                    .to(modal, { duration: 0.5, boxShadow: '0 0 20px rgba(0,0,0,0.5)', ease: 'power2.out' }, "-=0.5");
            });

            // Animation à la fermeture de la modal
            $('.animated-modal').on('hide.bs.modal', function (e) {
                console.log("Closing modal...");

                // Sélectionne la boîte de dialogue de la modal
                var modal = $(this).find('.modal-dialog');
                // Sélectionne l'élément de fond
                var backdrop = $('.modal-backdrop');

                // Crée une timeline pour l'animation de fermeture
                gsap.timeline()
                    // Anime la disparition de la modal
                    .to(modal, { duration: 0.5, opacity: 0, scale: 0.5, rotationY: -90, x: 200, ease: 'power2.in' })
                    // Anime la disparition du fond de la modal
                    .to(backdrop, { duration: 0.5, opacity: 0, ease: 'power2.in' }, "-=0.5")
                    // Réinitialise les propriétés de la modal après la fermeture
                    .set(modal, { scale: 1, rotationY: 0, x: 0 })
                    // Retire le fond de la modal après une courte pause
                    .set(backdrop, { display: 'none' });
            });
        </script>
    {{-- GSAP FIN --}}


    {{-- atres btn debt  --}}
        {{-- btn12 debt  --}}
        {{-- <script src="{{asset('atres/btn/btn12/js/jquery.min.js')}}"></script>
        <script src="{{asset('atres/btn/btn12/js/popper.js')}}"></script> --}}
        {{-- <script src="{{asset('atres/btn/btn12/js/bootstrap.min.js')}}"></script> --}}
        {{-- <script src="{{asset('atres/btn/btn12/js/main.js')}}"></script> --}}
        {{-- btn 12 fn  --}}


    {{-- atres btn fn  --}}
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
    {{-- tblea fn  --}}
    {{-- slect debt  --}}
        <!-- Select2 -->
        <script src="{{asset('admins/plugins/select2/js/select2.full.min.js')}}"></script>
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
        {{-- <script src="{{asset('atres/dist/aos.js')}}"></script> --}}
        <script src="{{asset('atres/aos-master/dist/aos.js')}}"></script>

        <script>
            $(function () {
                // Initialiser bsCustomFileInput si nécessaire
                bsCustomFileInput.init();

                // Cacher les éléments avec la classe 'mprofil' au chargement de la page
                $('.mprofil').hide();

                // Gérer le clic sur l'élément avec l'ID 'profil'
                $('#profil').on('click', function (){
                    $(".mprofil").fadeToggle();
                });

                // Cacher les éléments avec la classe 'sumenu' au chargement de la page
                $('.sumenu').hide();

                // Gérer le clic sur les éléments avec les ID 'A' et 'T'
                $('#A, #T').on('click', function (){
                    $(".sumenu").fadeToggle();
                });

                // Initialiser AOS
                AOS.init();
            });
        </script>
        {{-- <script>
            $(document).ready(function() {
                // Sélectionnez tous les éléments GIF par leur classe
                var gifs = $(".classe_de_vos_elements_gif");

                // Ajoutez la classe pause-animation à chaque GIF après 50 secondes
                setTimeout(function() {
                    gifs.addClass("pause-animation");
                }, 5000); // 5 secondes en millisecondes
            });
        </script> --}}
        <script>
            $(function () {
              /* ChartJS
               * -------
               * Here we will create a few charts using ChartJS
               */

              //--------------
              //- AREA CHART -
              //--------------

              // Get context with jQuery - using jQuery's .get() method.
              var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

              var areaChartData = {
                labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [
                  {
                    label               : 'Digital Goods',
                    backgroundColor     : 'rgba(60,141,188,0.9)',
                    borderColor         : 'rgba(60,141,188,0.8)',
                    pointRadius          : false,
                    pointColor          : '#3b8bba',
                    pointStrokeColor    : 'rgba(60,141,188,1)',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data                : [28, 48, 40, 19, 86, 27, 90]
                  },
                  {
                    label               : 'Electronics',
                    backgroundColor     : 'rgba(210, 214, 222, 1)',
                    borderColor         : 'rgba(210, 214, 222, 1)',
                    pointRadius         : false,
                    pointColor          : 'rgba(210, 214, 222, 1)',
                    pointStrokeColor    : '#c1c7d1',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data                : [65, 59, 80, 81, 56, 55, 40]
                  },
                ]
              }

              var areaChartOptions = {
                maintainAspectRatio : false,
                responsive : true,
                legend: {
                  display: false
                },
                scales: {
                  xAxes: [{
                    gridLines : {
                      display : false,
                    }
                  }],
                  yAxes: [{
                    gridLines : {
                      display : false,
                    }
                  }]
                }
              }

              // This will get the first returned node in the jQuery collection.
              new Chart(areaChartCanvas, {
                type: 'line',
                data: areaChartData,
                options: areaChartOptions
              })

              //-------------
              //- LINE CHART -
              //--------------
              var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
              var lineChartOptions = $.extend(true, {}, areaChartOptions)
              var lineChartData = $.extend(true, {}, areaChartData)
              lineChartData.datasets[0].fill = false;
              lineChartData.datasets[1].fill = false;
              lineChartOptions.datasetFill = false

              var lineChart = new Chart(lineChartCanvas, {
                type: 'line',
                data: lineChartData,
                options: lineChartOptions
              })

              //-------------
              //- DONUT CHART -
              //-------------
              // Get context with jQuery - using jQuery's .get() method.
              var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
              var donutData        = {
                labels: [
                    'Chrome',
                    'IE',
                    'FireFox',
                    'Safari',
                    'Opera',
                    'Navigator',
                ],
                datasets: [
                  {
                    data: [700,500,400,600,300,100],
                    backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                  }
                ]
              }
              var donutOptions     = {
                maintainAspectRatio : false,
                responsive : true,
              }
              //Create pie or douhnut chart
              // You can switch between pie and douhnut using the method below.
              new Chart(donutChartCanvas, {
                type: 'doughnut',
                data: donutData,
                options: donutOptions
              })

              //-------------
              //- PIE CHART -
              //-------------
              // Get context with jQuery - using jQuery's .get() method.
              var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
              var pieData        = donutData;
              var pieOptions     = {
                maintainAspectRatio : false,
                responsive : true,
              }
              //Create pie or douhnut chart
              // You can switch between pie and douhnut using the method below.
              new Chart(pieChartCanvas, {
                type: 'pie',
                data: pieData,
                options: pieOptions
              })

              //-------------
              //- BAR CHART -
              //-------------
              var barChartCanvas = $('#barChart').get(0).getContext('2d')
              var barChartData = $.extend(true, {}, areaChartData)
              var temp0 = areaChartData.datasets[0]
              var temp1 = areaChartData.datasets[1]
              barChartData.datasets[0] = temp1
              barChartData.datasets[1] = temp0

              var barChartOptions = {
                responsive              : true,
                maintainAspectRatio     : false,
                datasetFill             : false
              }

              new Chart(barChartCanvas, {
                type: 'bar',
                data: barChartData,
                options: barChartOptions
              })

              //---------------------
              //- STACKED BAR CHART -
              //---------------------
              var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
              var stackedBarChartData = $.extend(true, {}, barChartData)

              var stackedBarChartOptions = {
                responsive              : true,
                maintainAspectRatio     : false,
                scales: {
                  xAxes: [{
                    stacked: true,
                  }],
                  yAxes: [{
                    stacked: true
                  }]
                }
              }

              new Chart(stackedBarChartCanvas, {
                type: 'bar',
                data: stackedBarChartData,
                options: stackedBarChartOptions
              })
            })
          </script>
        {{-- <script>
            var archives = {!! json_encode($archives) !!};
            var ctx = document.getElementById('archivesChart').getContext('2d');
            var chartData = {
                labels: [], // Les mois
                datasets: [] // Les données pour chaque catégorie
            };

            // Préparer les données pour le graphique
            archives.forEach(function(archive) {
                if (!chartData.labels.includes(archive.month)) {
                    chartData.labels.push(archive.month);
                }

                if (typeof chartData.datasets[archive.categorie_id] === 'undefined') {
                    chartData.datasets[archive.categorie_id] = {
                        label: 'Catégorie ' + archive.categorie_id,
                        data: [],
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    };
                }

                chartData.datasets[archive.categorie_id].data.push(archive.total);
            });

            var archivesChart = new Chart(ctx, {
                type: 'bar',
                data: chartData,
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        </script> --}}



        {{-- <script>
            // Récupérer les données depuis PHP
            var postes = {!! json_encode($data['postes']) !!};
            var frequencies = {!! json_encode($data['frequencies']) !!};

            // Fonction pour mettre à jour le graphique en fonction de la période sélectionnée
            function updateChart(period) {
                // Mettre à jour le graphique avec les nouvelles données
                // Vous devrez implémenter cette partie en fonction du graphique utilisé
                // Par exemple, si vous utilisez Chart.js, vous devrez appeler les fonctions nécessaires pour mettre à jour les données du graphique
                // Assurez-vous d'avoir défini une variable pour le graphique, par exemple myChart
                var ctx = document.getElementById('archivesByPosteChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: postes,
                        datasets: [{
                            label: 'Fréquences d\'archives par poste',
                            data: frequencies,
                            backgroundColor: 'rgba(54, 162, 235, 0.5)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
                // Voici un exemple hypothétique pour la mise à jour du graphique avec Chart.js
                myChart.data.datasets[0].data = frequencies[period];
                myChart.update();
            }

            // Lorsque la période sélectionnée change, mettre à jour le graphique
            document.getElementById('selectPeriod').addEventListener('change', function() {
                var selectedPeriod = this.value;
                updateChart(selectedPeriod);
            });
        </script> --}}
        <!-- Graphique -->
{{-- <script>
    // Récupérer les données depuis PHP
    var postes = {!! json_encode($data['postes']) !!};
    var frequencies = {!! json_encode($data['frequencies']) !!};

    // Créer le graphique
    var ctx = document.getElementById('posteFrequencyChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: postes,
            datasets: [{
                label: 'Fréquence des archives par poste',
                data: frequencies,
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script> --}}
    <script>
            // Attend que le document soit prêt
        $(document).ready(function() {
            // Récupère les valeurs sélectionnées dans le formulaire après la soumission
            $('#filterForm').submit(function(event) {
                event.preventDefault(); // Empêche la soumission par défaut du formulaire

                // Récupère la valeur sélectionnée pour la période
                var interval = $('#interval').val();

                // Met à jour la sélection dans le champ select pour la période
                $('#interval').val(interval);

                // Récupère la valeur sélectionnée pour le type de poste
                var type = $('#type').val();

                // Met à jour la sélection dans le champ select pour le type de poste
                $('#type').val(type);

                // Soumet le formulaire
                $(this).unbind('submit').submit();
            });
        });
        // nous passons en laravel cette fois ci , j'ai deux script, un pour gerer mon theme, l'autre pour gerer mon chart radar maintant j'aimerai que lorsque nous somme en ligth les couleur des variables soit noir et en dark blanc : je t'envois les scripts


    </script>
{{-- DARK DEBUT --}}
{{-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleButton = document.getElementById('mode-toggle');
        const icon = document.getElementById('icon');
        const logo = document.getElementById('logo');

        function updateLogos(theme) {
            if (theme === 'dark-mode') {
                logo.src = '/glbal/theme/lnb.png';
            } else {
                logo.src = '/glbal/theme/lnn.png';
            }
        }

        fetch('/user-theme')
            .then(response => response.json())
            .then(data => {
                const userTheme = data.theme;
                document.body.classList.add(userTheme);
                updateLogos(userTheme);

                if (userTheme === 'dark-mode') {
                    icon.classList.add('fa-sun');
                    icon.classList.remove('fa-moon');
                } else {
                    icon.classList.add('fa-moon');
                    icon.classList.remove('fa-sun');
                }
            })
            .catch(error => console.error('Erreur lors de la récupération du thème de l\'utilisateur', error));

        toggleButton.addEventListener('click', function () {
            console.log('Bouton cliqué');
            let newTheme;

            if (document.body.classList.contains('light-mode')) {
                document.body.classList.replace('light-mode', 'dark-mode');
                newTheme = 'dark-mode';
            } else {
                document.body.classList.replace('dark-mode', 'light-mode');
                newTheme = 'light-mode';
            }

            updateLogos(newTheme);

            if (newTheme === 'dark-mode') {
                icon.classList.add('fa-sun');
                icon.classList.remove('fa-moon');
            } else {
                icon.classList.add('fa-moon');
                icon.classList.remove('fa-sun');
            }

            localStorage.setItem('theme', newTheme);

            console.log('Envoi du nouveau thème au serveur:', newTheme);

            fetch('/update-theme', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ theme: newTheme })
            }).then(response => response.json())
            .then(data => {
                console.log('Réponse du serveur:', data);
                if (data.status === 'success') {
                    console.log('Thème mis à jour avec succès.');
                } else {
                    console.error('Erreur lors de la mise à jour du thème:', data.message);
                }
            })
            .catch(error => console.error('Erreur lors de la mise à jour du thème', error));
        });
    });
</script> --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleButton = document.getElementById('mode-toggle');
        const icon = document.getElementById('icon');
        const logo = document.getElementById('logo');

        function updateLogos(theme) {
            if (theme === 'dark-mode') {
                logo.src = '/glbal/theme/lnb.png';
            } else {
                logo.src = '/glbal/theme/lnn.png';
            }
        }

        fetch('/user-theme')
            .then(response => response.json())
            .then(data => {
                const userTheme = data.theme;
                document.body.classList.add(userTheme);
                updateLogos(userTheme);

                if (userTheme === 'dark-mode') {
                    icon.classList.add('fa-sun');
                    icon.classList.remove('fa-moon');
                } else {
                    icon.classList.add('fa-moon');
                    icon.classList.remove('fa-sun');
                }
            })
            .catch(error => console.error('Erreur lors de la récupération du thème de l\'utilisateur', error));

        toggleButton.addEventListener('click', function () {
            console.log('Bouton cliqué');
            let newTheme;

            if (document.body.classList.contains('light-mode')) {
                document.body.classList.replace('light-mode', 'dark-mode');
                newTheme = 'dark-mode';
            } else {
                document.body.classList.replace('dark-mode', 'light-mode');
                newTheme = 'light-mode';
            }

            updateLogos(newTheme);

            if (newTheme === 'dark-mode') {
                icon.classList.add('fa-sun');
                icon.classList.remove('fa-moon');
            } else {
                icon.classList.add('fa-moon');
                icon.classList.remove('fa-sun');
            }

            localStorage.setItem('theme', newTheme);

            console.log('Envoi du nouveau thème au serveur:', newTheme);

            fetch('/update-theme', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ theme: newTheme })
            }).then(response => response.json())
            .then(data => {
                console.log('Réponse du serveur:', data);
                if (data.status === 'success') {
                    console.log('Thème mis à jour avec succès.');
                    // Rafraîchir le graphique après la mise à jour du thème
                    refreshChart();
                } else {
                    console.error('Erreur lors de la mise à jour du thème:', data.message);
                }
            })
            .catch(error => console.error('Erreur lors de la mise à jour du thème', error));
        });
    });
</script>
{{-- DARK FIN --}}

{{-- SCRIPT RADAR DEBUT --}}
    {{-- <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            var ctx = document.getElementById('radarChart').getContext('2d');

            // Collecter toutes les compétences et maîtrises dans un seul tableau
            var allData = [];
            var labels = [];
            var dataCompetences = [];
            var dataMaitrises = [];

            // Ajout des compétences
            @foreach ($competences as $competence)
                allData.push({
                    type: 'competence',
                    nom: '{{ $competence->nom }}',
                    level: {{ $competence->level }}
                });
            @endforeach

            // Ajout des maîtrises
            @foreach ($maitrises as $maitrise)
                allData.push({
                    type: 'maitrise',
                    nom: '{{ $maitrise->nom }}',
                    level: {{ $maitrise->level }}
                });
            @endforeach

            // Création des labels et données uniques
            allData.forEach(function(item) {
                if (!labels.includes(item.nom)) {
                    labels.push(item.nom);
                }
            });

            labels.forEach(function(label) {
                var competence = allData.find(function(item) {
                    return item.nom === label && item.type === 'competence';
                });
                var maitrise = allData.find(function(item) {
                    return item.nom === label && item.type === 'maitrise';
                });

                dataCompetences.push(competence ? competence.level : 0);
                dataMaitrises.push(maitrise ? maitrise.level : 0);
            });

            var radarChart = new Chart(ctx, {
                type: 'radar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Niveaux de compétence',
                        data: dataCompetences,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }, {
                        label: 'Niveaux de maîtrise',
                        data: dataMaitrises,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        r: {
                            ticks: {
                                beginAtZero: true,
                                max: 100
                            },
                            pointLabels: {
                                callback: function(value) {
                                    return value;
                                }
                            }
                        }
                    }
                }
            });

            // Ajouter des classes CSS aux labels et ticks après la création du graphique
            radarChart.update();

            // Utiliser un délai pour s'assurer que le DOM est prêt
            setTimeout(() => {
                var labels = document.querySelectorAll("#radarChart + div canvas");
                labels.forEach((label) => {
                    label.classList.add('mas');
                });

                var ticks = document.querySelectorAll("#radarChart + div canvas");
                ticks.forEach((tick) => {
                    tick.classList.add('menus');
                });
            }, 1000);
        });
    </script> --}}
{{-- SCRIPT RADAR FIN --}}
{{-- HEURES ET DATES DEBUT --}}
    <script>
        // Fonction pour formater l'heure sur 24 heures
        function formatTime(date) {
            const hour = String(date.getHours()).padStart(2, '0'); // Ajoute un zéro devant si nécessaire
            const minute = String(date.getMinutes()).padStart(2, '0');
            const second = String(date.getSeconds()).padStart(2, '0');
            return `${hour}:${minute}:${second}`;
        }

        // Fonction pour formater la date
        function formatDate(date) {
            const day = String(date.getDate()).padStart(2, '0'); // Ajoute un zéro devant si nécessaire
            const month = String(date.getMonth() + 1).padStart(2, '0'); // Les mois commencent à 0, donc on ajoute 1
            const year = date.getFullYear();
            return `${day}/${month}/${year}`;
        }

        // Obtenir la date et l'heure actuelles avec le décalage horaire du Gabon (UTC+1)
        function getCurrentDateTimeInGabon() {
            const currentTime = new Date();
            const utcOffset = currentTime.getTimezoneOffset() / 60; // Convertir le décalage horaire en heures
            const gabonTime = new Date(currentTime.getTime() + (utcOffset + 1) * 60 * 60 * 1000); // Ajouter l'offset du Gabon (1 heure)
            return gabonTime;
        }

        // Fonction pour mettre à jour la date et l'heure toutes les secondes
        function updateDateTime() {
            const gabonDateTime = getCurrentDateTimeInGabon();
            document.getElementById('currentDateTime').textContent = `Date et heure : ${formatDate(gabonDateTime)} ${formatTime(gabonDateTime)}`;
        }

        // Mettre à jour la date et l'heure initiales
        updateDateTime();

        // Mettre à jour la date et l'heure toutes les secondes
        setInterval(updateDateTime, 1000);
    </script>
{{-- HEURES ET DATES FIN --}}











@include('sweetalert::alert')
<script src="{{ mix('js/app.js') }}"></script>
@yield('footer')

</body>
</html>
