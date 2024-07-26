<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('./portofolios.homes.home');
// });
// Route::get('/', function () {
//     return view('./admins.homes.home');
// });




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    ])->group(function () {
        Route::get('/dashboard', 'App\Http\Controllers\RouteController@lesdirections')->name('dashboard');
    });
Route::post('/posts/{post}/comments','App\Http\Controllers\CommentController@store')->name('comments.store');

Route::get('/Chat/{id}','App\Http\Controllers\RouteController@chat')->name('CHAT');
Route::post('/comments/{comment}/reply', 'App\Http\Controllers\CommentController@reply')->name('comments.reply');
// mettre la notif en vue
Route::put('/admin/notifications/read/{id}', 'App\Http\Controllers\RouteController@markAsRead')->name('admin.notifications.read');
// admin repondre mettre en vue notification
// routes/web.php
Route::post('/comments/{comment}/admin-reply', 'App\Http\Controllers\RouteController@adminReply')->name('comments.admin-reply');


// ADMIN DEBUT UserController
        Route::post('/check-email', 'App\Http\Controllers\UserController@checkEmail')->name('check-email');
    // ROUTES DEBUT
        Route::get('/home','App\Http\Controllers\RouteController@Home')->name('HomeAdmin');
        Route::get('/','App\Http\Controllers\RouteController@Portofolio')->name('Portofolio');
    // ROUTES FIN
    // ENVOYER UN MESSAGE A L'ADMIN DEBUT
        Route::post('/send-project', 'App\Http\Controllers\ContactController@sendProject')->name('send.project');
    // ENVOYER UN MESSAGE A L'ADMIN FIN
    Route::get('/api/visitors', 'App\Http\Controllers\RouteController@getVisitorData');


    // TYPE DE PARAMETRE DEBUT
        // CHEMIN DES PAGES DEBUT
            Route::get('TypeParametres', 'App\Http\Controllers\TypeParametreController@index')->name('T-TypeDeParametres');
            Route::get('admintypeparametreCorbeille', 'App\Http\Controllers\TypeParametreController@indexCorbeille')->name('TC-TypeDeParametres');
        //CHEMIN DES PAGE FIN
        //AUTRES FUNCTION DEBUT
            Route::get('DeleteAllTypeParametre', 'App\Http\Controllers\TypeParametreController@destroyTous')->name('D-All-TP');
            Route::get('CorbeilleAllTyTeparametre', 'App\Http\Controllers\TypeParametreController@corbeille_all')->name('C-All-TP');
            Route::get('RecupAllTypeParametre', 'App\Http\Controllers\TypeParametreController@recupTousCorbeille')->name('R-All-TP');

        //AUTRES FUNCTION FIN
        //FONCTIONS DEBUT
            Route::post('AjouterTypeParametre', 'App\Http\Controllers\TypeParametreController@store')->name('AjouterTypeParametre');
            Route::post('ModifierTypeParametre', 'App\Http\Controllers\TypeParametreController@update')->name('ModifierTypeParametre');
            Route::post('SupprimerTypeParametre', 'App\Http\Controllers\TypeParametreController@destroy')->name('SupprimerTypeParametre');
            Route::post('CorbeilleTypeParametre', 'App\Http\Controllers\TypeParametreController@corbeille')->name('CorbeilleTypeParametre');
            Route::post('RecupTypeParametre', 'App\Http\Controllers\TypeParametreController@recupUnCorbeille')->name('RecupTypeParametre');
        // FONCTION FIN
    // TYPE DE PARAMETRE FIN
    // HABILITATION DEBUT
        // CHEMIN DES PAGES DEBUT
            Route::get('Habilitations', 'App\Http\Controllers\HabilitationController@index')->name('H-Habilitations');
            Route::get('adminhabilitationCorbeille', 'App\Http\Controllers\HabilitationController@indexCorbeille')->name('HC-Habilitations');
        //CHEMIN DES PAGE FIN
        //AUTRES FUNCTION DEBUT
            Route::get('DeleteAllHabilitation', 'App\Http\Controllers\HabilitationController@destroyTous')->name('D-All-HU');
            Route::get('CorbeilleAllHabilitation', 'App\Http\Controllers\HabilitationController@corbeille_all')->name('C-All-HU');
            Route::get('RecupAllHabilitation', 'App\Http\Controllers\HabilitationController@recupTousCorbeille')->name('R-All-HU');
        //AUTRES FUNCTION FIN
        //FONCTIONS DEBUT
            Route::post('AjouterHabilitation', 'App\Http\Controllers\HabilitationController@store')->name('AjouterHabilitation');
            Route::post('ModifierHabilitation', 'App\Http\Controllers\HabilitationController@update')->name('ModifierHabilitation');
            Route::post('SupprimerHabilitation', 'App\Http\Controllers\HabilitationController@destroy')->name('SupprimerHabilitation');
            Route::post('CorbeilleHabilitation', 'App\Http\Controllers\HabilitationController@corbeille')->name('CorbeilleHabilitation');
            Route::post('RecupHabilitation', 'App\Http\Controllers\HabilitationController@recupUnCorbeille')->name('RecupHabilitation');
        // FONCTION FIN
    // HABILITATION FIN
    // PROFIL DEBUT
        // CHEMIN DES PAGES DEBUT
            Route::get('Profils', 'App\Http\Controllers\ProfilController@index')->name('P-Profils');
            Route::get('adminprofilCorbeille', 'App\Http\Controllers\ProfilController@indexCorbeille')->name('PC-Profils');
        //CHEMIN DES PAGE FIN
        //AUTRES FUNCTION DEBUT
            Route::get('DeleteAllProfil', 'App\Http\Controllers\ProfilController@destroyTous')->name('D-All-PU');
            Route::get('CorbeilleAllProfil', 'App\Http\Controllers\ProfilController@corbeille_all')->name('C-All-PU');
            Route::get('RecupAllProfil', 'App\Http\Controllers\ProfilController@recupTousCorbeille')->name('R-All-PU');
        //AUTRES FUNCTION FIN
        //FONCTIONS DEBUT
            Route::post('AjouterProfil', 'App\Http\Controllers\ProfilController@store')->name('AjouterProfil');
            Route::post('ModifierProfil', 'App\Http\Controllers\ProfilController@update')->name('ModifierProfil');
            Route::post('SupprimerProfil', 'App\Http\Controllers\ProfilController@destroy')->name('SupprimerProfil');
            Route::post('CorbeilleProfil', 'App\Http\Controllers\ProfilController@corbeille')->name('CorbeilleProfil');
            Route::post('RecupProfil', 'App\Http\Controllers\ProfilController@recupUnCorbeille')->name('RecupProfil');
        // FONCTION FIN
    // PROFIL FIN
    // PROFIL HABILITATION DEBUT
        // CHEMIN DES PAGES DEBUT
            Route::get('ProfilHabilitations', 'App\Http\Controllers\ProfilHabilitationController@index')->name('PH-ProfilHabilitations');
            Route::get('adminprofilhabilitationCorbeille', 'App\Http\Controllers\ProfilHabilitationController@indexCorbeille')->name('PHC-ProfilHabilitations');
        //CHEMIN DES PAGE FIN
        //AUTRES FUNCTION DEBUT
            Route::get('DeleteAllProfilHabilitation', 'App\Http\Controllers\ProfilHabilitationController@destroyTous')->name('D-All-PHU');
            Route::get('CorbeilleAllProfilHabilitation', 'App\Http\Controllers\ProfilHabilitationController@corbeille_all')->name('C-All-PHU');
            Route::get('RecupAllProfilHabilitation', 'App\Http\Controllers\ProfilHabilitationController@recupTousCorbeille')->name('R-All-PHU');
        //AUTRES FUNCTION FIN
        //FONCTIONS DEBUT
            Route::post('AjouterProfilHabilitation', 'App\Http\Controllers\ProfilHabilitationController@store')->name('AjouterProfilHabilitation');
            Route::post('ModifierProfilHabilitation', 'App\Http\Controllers\ProfilHabilitationController@update')->name('ModifierProfilHabilitation');
            Route::post('SupprimerProfilHabilitation', 'App\Http\Controllers\ProfilHabilitationController@destroy')->name('SupprimerProfilHabilitation');
            Route::post('CorbeilleProfilHabilitation', 'App\Http\Controllers\ProfilHabilitationController@corbeille')->name('CorbeilleProfilHabilitation');
            Route::post('RecupProfilHabilitation', 'App\Http\Controllers\ProfilHabilitationController@recupUnCorbeille')->name('RecupProfilHabilitation');
        // FONCTION FIN
    // PROFIL HABILITATION FIN
    // POST DEBUT
        // CHEMIN DES PAGES DEBUT
            Route::get('Posts', 'App\Http\Controllers\PostController@index')->name('PT-Posts');
            Route::get('adminpostCorbeille', 'App\Http\Controllers\PostController@indexCorbeille')->name('PTC-Posts');
        //CHEMIN DES PAGE FIN
        //AUTRES FUNCTION DEBUT
            Route::get('DeleteAllPost', 'App\Http\Controllers\PostController@destroyTous')->name('D-All-PT');
            Route::get('CorbeilleAllPost', 'App\Http\Controllers\PostController@corbeille_all')->name('C-All-PT');
            Route::get('RecupAllPost', 'App\Http\Controllers\PostController@recupTousCorbeille')->name('R-All-PT');
            Route::get('/chart-post', 'App\Http\Controllers\PostController@chartPost');

        //AUTRES FUNCTION FIN
        //FONCTIONS DEBUT
            Route::post('AjouterPost', 'App\Http\Controllers\PostController@store')->name('AjouterPost');
            Route::post('ModifierPost', 'App\Http\Controllers\PostController@update')->name('ModifierPost');
            Route::post('SupprimerPost', 'App\Http\Controllers\PostController@destroy')->name('SupprimerPost');
            Route::post('CorbeillePost', 'App\Http\Controllers\PostController@corbeille')->name('CorbeillePost');
            Route::post('RecupPost', 'App\Http\Controllers\PostController@recupUnCorbeille')->name('RecupPost');
        // FONCTION FIN
    // POST FIN
    //PARAMETRE DEBUT
        // CHEMIN DES PAGES DEBUT
            Route::get('Parametres', 'App\Http\Controllers\ParametreController@index')->name('P-Parametres');
            Route::get('ParametreCorbeille', 'App\Http\Controllers\ParametreController@indexCorbeille')->name('PC-Parametres');
        //CHEMIN DES PAGE FIN
        //AUTRES FUNCTION DEBUT
            Route::get('DeleteAllParametre', 'App\Http\Controllers\ParametreController@destroyTous')->name('D-All-P');
            Route::get('CorbeilleAllParametre', 'App\Http\Controllers\ParametreController@corbeille_all')->name('C-All-P');
            Route::get('RecupAllParametre', 'App\Http\Controllers\ParametreController@recupTousCorbeille')->name('R-All-P');

        //AUTRES FUNCTION FIN
        //FONCTIONS DEBUT
            Route::post('AjouterParametre', 'App\Http\Controllers\ParametreController@store')->name('AjouterParametre');
            Route::post('ModifierParametre', 'App\Http\Controllers\ParametreController@update')->name('ModifierParametre');
            Route::post('SupprimerParametre', 'App\Http\Controllers\ParametreController@destroy')->name('SupprimerParametre');
            Route::post('CorbeilleParametre', 'App\Http\Controllers\ParametreController@corbeille')->name('CorbeilleParametre');
            Route::post('RecupParametre', 'App\Http\Controllers\ParametreController@recupUnCorbeille')->name('RecupParametre');
        // FONCTION FIN
    //PARAMETRE FIN
    // Realisation DEBUT
        // CHEMIN DES PAGES DEBUT
            Route::get('Realisations', 'App\Http\Controllers\RealisationController@index')->name('R-Realisations');
            Route::get('RealisationCorbeille', 'App\Http\Controllers\RealisationController@indexCorbeille')->name('RC-Realisations');
        //CHEMIN DES PAGE FIN
        //AUTRES FUNCTION DEBUT
            Route::get('DeleteAllRealisation', 'App\Http\Controllers\RealisationController@destroyTous')->name('D-All-R');
            Route::get('CorbeilleAllRealisation', 'App\Http\Controllers\RealisationController@corbeilleAll')->name('C-All-R');
            Route::get('RecupAllRealisation', 'App\Http\Controllers\RealisationController@recupTousCorbeille')->name('R-All-R');
            Route::get('/fetch-chart-data', 'App\Http\Controllers\RealisationController@fetchChartData')->name('fetchChartData');



        //AUTRES FUNCTION FIN
        //FONCTIONS DEBUT
            Route::post('AjouterRealisation', 'App\Http\Controllers\RealisationController@store')->name('AjouterRealisation');
            Route::post('ModifierRealisation', 'App\Http\Controllers\RealisationController@update')->name('ModifierRealisation');
            Route::post('SupprimerRealisation', 'App\Http\Controllers\RealisationController@destroy')->name('SupprimerRealisation');
            Route::post('CorbeilleRealisation', 'App\Http\Controllers\RealisationController@corbeille')->name('CorbeilleRealisation');
            Route::post('RecupRealisation', 'App\Http\Controllers\RealisationController@recupUnCorbeille')->name('RecupRealisation');
        // FONCTION FIN
    // Realisation FIN
    // Realisation DEBUT
        // CHEMIN DES PAGES DEBUT
            Route::get('Accomplissements', 'App\Http\Controllers\CompetenceMaitriseController@index')->name('A-Accomplissements');
            Route::get('AccomplissementCorbeille', 'App\Http\Controllers\CompetenceMaitriseController@indexCorbeille')->name('AC-Accomplissements');
        //CHEMIN DES PAGE FIN
        //AUTRES FUNCTION DEBUT
            Route::get('DeleteAllAccomplissement', 'App\Http\Controllers\CompetenceMaitriseController@destroyTous')->name('D-All-A');
            Route::get('CorbeilleAllAccomplissement', 'App\Http\Controllers\CompetenceMaitriseController@corbeilleAll')->name('C-All-A');
            Route::get('RecupAllAccomplissement', 'App\Http\Controllers\CompetenceMaitriseController@recupTousCorbeille')->name('R-All-A');

        //AUTRES FUNCTION FIN
        //FONCTIONS DEBUT
            Route::post('AjouterAccomplissement', 'App\Http\Controllers\CompetenceMaitriseController@store')->name('AjouterAccomplissement');
            Route::get('/fetch/icons', 'App\Http\Controllers\CompetenceMaitriseController@fetchIcons')->name('fetch.icons');

            Route::post('ModifierAccomplissement', 'App\Http\Controllers\CompetenceMaitriseController@update')->name('ModifierAccomplissement');
            Route::post('SupprimerAccomplissement', 'App\Http\Controllers\CompetenceMaitriseController@destroy')->name('SupprimerAccomplissement');
            Route::post('CorbeilleAccomplissement', 'App\Http\Controllers\CompetenceMaitriseController@corbeille')->name('CorbeilleAccomplissement');
            Route::post('RecupAccomplissement', 'App\Http\Controllers\CompetenceMaitriseController@recupUnCorbeille')->name('RecupAccomplissement');
        // FONCTION FIN
    // Realisation FIN
    // ENTREPRISE DEBUT
        // CHEMIN DES PAGES DEBUT
            Route::get('Entreprises', 'App\Http\Controllers\EntrepriseController@index')->name('E-Entreprises');
            Route::get('EntrepriseCorbeille', 'App\Http\Controllers\EntrepriseController@indexCorbeille')->name('EC-Entreprises');
            Route::get('/entreprises/switch/{id}', 'App\Http\Controllers\EntrepriseController@switch')->name('CH-Status');

        //CHEMIN DES PAGE FIN
        //AUTRES FUNCTION DEBUT
            Route::get('DeleteAllEntreprise', 'App\Http\Controllers\EntrepriseController@destroyTous')->name('D-All-E');
            Route::get('CorbeilleAllEntreprise', 'App\Http\Controllers\EntrepriseController@corbeilleAll')->name('C-All-E');
            Route::get('RecupAllEntreprise', 'App\Http\Controllers\EntrepriseController@recupTousCorbeille')->name('R-All-E');

        //AUTRES FUNCTION FIN
        //FONCTIONS DEBUT
            Route::post('AjouterEntreprise', 'App\Http\Controllers\EntrepriseController@store')->name('AjouterEntreprise');
            Route::post('ModifierEntreprise', 'App\Http\Controllers\EntrepriseController@update')->name('ModifierEntreprise');
            Route::post('SupprimerEntreprise', 'App\Http\Controllers\EntrepriseController@destroy')->name('SupprimerEntreprise');
            Route::post('CorbeillEntrepriset', 'App\Http\Controllers\EntrepriseController@corbeille')->name('CorbeilleEntreprise');
            Route::post('RecupEntreprise', 'App\Http\Controllers\EntrepriseController@recupUnCorbeille')->name('RecupEntreprise');
        // FONCTION FIN
    // ENTREPRISE FIN
                Route::post('/update-theme', 'App\Http\Controllers\UserController@updateTheme')->name('theme.update');
                Route::get('/user-theme', 'App\Http\Controllers\UserController@getTheme')->name('theme.get');
    // PROJET DEBUT
        // CHEMIN DES PAGES DEBUT
            Route::get('Projets', 'App\Http\Controllers\ProjetController@index')->name('P-Projets');
            Route::get('ProjetCorbeille', 'App\Http\Controllers\ProjetController@indexCorbeille')->name('PC-Projets');
        //CHEMIN DES PAGE FIN
        //AUTRES FUNCTION DEBUT
            Route::get('DeleteAllProjet', 'App\Http\Controllers\ProjetController@destroyTous')->name('D-All-PJ');
            Route::get('CorbeilleAllProjet', 'App\Http\Controllers\ProjetController@corbeilleAll')->name('C-All-PJ');
            Route::get('RecupAllProjet', 'App\Http\Controllers\ProjetController@recupTousCorbeille')->name('R-All-PJ');

        //AUTRES FUNCTION FIN
        //FONCTIONS DEBUT
            Route::post('AjouterProjet', 'App\Http\Controllers\ProjetController@store')->name('AjouterProjet');
            Route::post('ModifierProjet', 'App\Http\Controllers\ProjetController@update')->name('ModifierProjet');
            Route::post('SupprimerProjet', 'App\Http\Controllers\ProjetController@destroy')->name('SupprimerProjet');
            Route::post('CorbeillProjet', 'App\Http\Controllers\ProjetController@corbeille')->name('CorbeilleProjet');
            Route::post('RecupProjet', 'App\Http\Controllers\ProjetController@recupUnCorbeille')->name('RecupProjet');
        // FONCTION FIN
    // PROJET FIN
    // TASK DEBUT
        // CHEMIN DES PAGES DEBUT
            Route::get('Tasks', 'App\Http\Controllers\TaskController@index')->name('TS-Tasks');
            // Route::get('HomeTask', 'App\Http\Controllers\TaskController@hometasks')->name('HT-HomeTasks');
            Route::get('TaskCorbeille', 'App\Http\Controllers\TaskController@indexCorbeille')->name('TSC-Tasks');
        //CHEMIN DES PAGE FIN
        //AUTRES FUNCTION DEBUT
            Route::get('DeleteAllTask', 'App\Http\Controllers\TaskController@destroyTous')->name('D-All-TS');
            Route::get('CorbeilleAllTask', 'App\Http\Controllers\TaskController@corbeilleAll')->name('C-All-TS');
            Route::get('RecupAllTask', 'App\Http\Controllers\TaskController@recupTousCorbeille')->name('R-All-TS');
            // routes/web.php ou routes/api.php
            Route::get('/tasks/events', 'App\Http\Controllers\TaskController@getEvents');
            Route::get('/tasks', 'App\Http\Controllers\TaskController@getTasks')->name('tasks.list');
            // Route::get('/statusData','App\Http\Controllers\TaskController@getStatusData');
            Route::get('/TacheTermine', 'App\Http\Controllers\TaskController@TacheTermine');
            Route::get('/TacheAttente', 'App\Http\Controllers\TaskController@TacheAttente');
            Route::get('/TacheReporte', 'App\Http\Controllers\TaskController@TacheReporte');
            Route::get('/TacheCours', 'App\Http\Controllers\TaskController@TacheCours');


            // / Route pour mettre à jour une tâche
            // Route::put('/tasks/{task}', 'App\Http\Controllers\TaskController@updateStatus')->name('tasks.update');
            // web.php (Route)
Route::put('/tasks/{id}', 'App\Http\Controllers\TaskController@updateStatus')->name('tasks.updateStatus');
Route::delete('/tasks/{task}', 'App\Http\Controllers\TaskController@destroyTask')->name('tasks.destroy');

        //AUTRES FUNCTION FIN
        //FONCTIONS DEBUT
            Route::post('AjouterTask', 'App\Http\Controllers\TaskController@store')->name('AjouterTask');
            Route::post('ModifierTask', 'App\Http\Controllers\TaskController@update')->name('ModifierTask');
            Route::post('SupprimerTask', 'App\Http\Controllers\TaskController@destroy')->name('SupprimerTask');
            Route::post('CorbeillTask', 'App\Http\Controllers\TaskController@corbeille')->name('CorbeilleTask');
            Route::post('RecupTask', 'App\Http\Controllers\TaskController@recupUnCorbeille')->name('RecupTask');
        // FONCTION FIN
    // TASK FIN
//  ADMIN FIN
