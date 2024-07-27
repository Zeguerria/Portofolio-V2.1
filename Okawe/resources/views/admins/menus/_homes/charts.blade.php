<section>
    <div class="serction-chart">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-6">
                    <div data-aos="fade-up" data-aos-duration="1500">
                        <div class="card ">
                            <div class="card-header border-0 bg-gradient-success">

                            <h3 class="card-title ">
                                <i class="far fa-calendar-alt msicons"></i>
                                <span class="chartTitre">
                                    Calendrier
                                </span>

                            </h3>
                            <!-- tools card -->
                            <div class="card-tools">
                                <!-- button with a dropdown -->
                                <div class="btn-group">
                                <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                                    <i class="fas fa-bars"></i>
                                </button>
                                <div class="dropdown-menu" role="menu">
                                    <a href="#" class="dropdown-item" data-bs-toggle="tooltip" title="Ajouter" data-placement="bottom" data-toggle="modal" data-target="#modal-default">Ajouter une tache</a>
                                    {{-- <a href="#" class="dropdown-item">Clear events</a> --}}
                                    <div class="dropdown-divider"></div>
                                    <a href="{{route('C-All-TS')}}" class="dropdown-item">Supprimer toutes taches</a>
                                </div>
                                </div>
                                <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                                </button>
                            </div>
                            <!-- /. tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body pt-1">
                            <!--The calendar -->
                            <div id="calendar" style="width: 100%"></div>
                            </div>
                            <!-- /.card-body -->
                        </div>

                    </div>

                    {{-- <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                                To Do List
                            </h3>

                            <div class="card-tools">
                                <ul class="pagination pagination-sm">
                                <li class="page-item"><a href="#" class="page-link">&laquo;</a></li>
                                <li class="page-item"><a href="#" class="page-link">1</a></li>
                                <li class="page-item"><a href="#" class="page-link">2</a></li>
                                <li class="page-item"><a href="#" class="page-link">3</a></li>
                                <li class="page-item"><a href="#" class="page-link">&raquo;</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <ul class="todo-list" data-widget="todo-list">
                                <li>
                                <!-- drag handle -->
                                <span class="handle">
                                    <i class="fas fa-ellipsis-v"></i>
                                    <i class="fas fa-ellipsis-v"></i>
                                </span>
                                <!-- checkbox -->
                                <div  class="icheck-primary d-inline ml-2">
                                    <input type="checkbox" value="" name="todo1" id="todoCheck1">
                                    <label for="todoCheck1"></label>
                                </div>
                                <!-- todo text -->
                                <span class="text">Design a nice theme</span>
                                <!-- Emphasis label -->
                                <small class="badge badge-danger"><i class="far fa-clock"></i> 2 mins</small>
                                <!-- General tools such as edit or delete-->
                                <div class="tools">
                                    <i class="fas fa-edit"></i>
                                    <i class="fas fa-trash-o"></i>
                                </div>
                                </li>
                                <li>
                                <span class="handle">
                                    <i class="fas fa-ellipsis-v"></i>
                                    <i class="fas fa-ellipsis-v"></i>
                                </span>
                                <div  class="icheck-primary d-inline ml-2">
                                    <input type="checkbox" value="" name="todo2" id="todoCheck2" checked>
                                    <label for="todoCheck2"></label>
                                </div>
                                <span class="text">Make the theme responsive</span>
                                <small class="badge badge-info"><i class="far fa-clock"></i> 4 hours</small>
                                <div class="tools">
                                    <i class="fas fa-edit"></i>
                                    <i class="fas fa-trash-o"></i>
                                </div>
                                </li>
                                <li>
                                <span class="handle">
                                    <i class="fas fa-ellipsis-v"></i>
                                    <i class="fas fa-ellipsis-v"></i>
                                </span>
                                <div  class="icheck-primary d-inline ml-2">
                                    <input type="checkbox" value="" name="todo3" id="todoCheck3">
                                    <label for="todoCheck3"></label>
                                </div>
                                <span class="text">Let theme shine like a star</span>
                                <small class="badge badge-warning"><i class="far fa-clock"></i> 1 day</small>
                                <div class="tools">
                                    <i class="fas fa-edit"></i>
                                    <i class="fas fa-trash-o"></i>
                                </div>
                                </li>
                                <li>
                                <span class="handle">
                                    <i class="fas fa-ellipsis-v"></i>
                                    <i class="fas fa-ellipsis-v"></i>
                                </span>
                                <div  class="icheck-primary d-inline ml-2">
                                    <input type="checkbox" value="" name="todo4" id="todoCheck4">
                                    <label for="todoCheck4"></label>
                                </div>
                                <span class="text">Let theme shine like a star</span>
                                <small class="badge badge-success"><i class="far fa-clock"></i> 3 days</small>
                                <div class="tools">
                                    <i class="fas fa-edit"></i>
                                    <i class="fas fa-trash-o"></i>
                                </div>
                                </li>
                                <li>
                                <span class="handle">
                                    <i class="fas fa-ellipsis-v"></i>
                                    <i class="fas fa-ellipsis-v"></i>
                                </span>
                                <div  class="icheck-primary d-inline ml-2">
                                    <input type="checkbox" value="" name="todo5" id="todoCheck5">
                                    <label for="todoCheck5"></label>
                                </div>
                                <span class="text">Check your messages and notifications</span>
                                <small class="badge badge-primary"><i class="far fa-clock"></i> 1 week</small>
                                <div class="tools">
                                    <i class="fas fa-edit"></i>
                                    <i class="fas fa-trash-o"></i>
                                </div>
                                </li>
                                <li>
                                <span class="handle">
                                    <i class="fas fa-ellipsis-v"></i>
                                    <i class="fas fa-ellipsis-v"></i>
                                </span>
                                <div  class="icheck-primary d-inline ml-2">
                                    <input type="checkbox" value="" name="todo6" id="todoCheck6">
                                    <label for="todoCheck6"></label>
                                </div>
                                <span class="text">Let theme shine like a star</span>
                                <small class="badge badge-secondary"><i class="far fa-clock"></i> 1 month</small>
                                <div class="tools">
                                    <i class="fas fa-edit"></i>
                                    <i class="fas fa-trash-o"></i>
                                </div>
                                </li>
                            </ul>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                          <button type="button" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Add item</button>
                        </div>
                    </div> --}}
                    <div class="card" data-aos="flip-down" data-aos-duration="1500">
                        <div class="card-header moncard">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                               Taches à faire
                            </h3>

                            <div class="card-tools">
                                <ul class="pagination pagination-sm" id="pagination">
                                    <!-- Pagination links will be added here -->
                                </ul>
                            </div>
                        </div>
                        <div class="card-body ">
                            <ul class="todo-list" id="todo-list" data-widget="todo-list">
                                <!-- Task items will be added here -->
                            </ul>
                        </div>
                        <div class="card-footer clearfix moncard">
                            <button type="button" class="btn btn-success float-right nav-link-heart mesliens" id="add-task" data-bs-toggle="tooltip" title="Ajouter" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus msicons"></i> Tache</button>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-12" >
                        <div>
                            <div class="meswidget mb-2 pt-2">
                                <div class="container-fluid">
                                    <div class="row ">
                                        <div class="col-12 col-sm-12 col-md-12 col-ml-6 col-lg-6">
                                            <div class="small-box bg-danger" data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine">
                                                <!-- Loading (remove the following to stop the loading)-->
                                                <div class="overlay dark">
                                                    <a href="#" class="attenteAjours">
                                                        <i class="fas fa-3x fa-sync-alt msicons"></i>
                                                    </a>
                                                </div>
                                                <!-- end loading -->
                                                <div class="inner">
                                                    <h3 id="TacheAttente"><sup style="font-size: 20px">%</sup></h3> <!-- Espace réservé pour le pourcentage -->
                                                    <p>Tâches en attente</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="ion ion-stop"></i>
                                                </div>
                                                <a href="#" class="small-box-footer">
                                                    More info <i class="fas fa-arrow-circle-right"></i>
                                                </a>
                                            </div>



                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 col-ml-6 col-lg-6">
                                            <div class="small-box bg-warning" data-aos="fade-left" data-aos-offset="300" data-aos-easing="ease-in-sine">
                                                <!-- Loading (remove the following to stop the loading)-->
                                                <div class="overlay dark">
                                                    <a href="#" class="reporteAjours">
                                                        <i class="fas fa-3x fa-sync-alt msicons"></i>
                                                    </a>
                                                </div>
                                                <!-- end loading -->
                                                <div class="inner">
                                                    <h3 id="TacheReporte"><sup style="font-size: 20px">%</sup></h3> <!-- Espace réservé pour le pourcentage -->
                                                    <p>Tâches Reporté</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="ion ion-pause"></i>
                                                </div>
                                                <a href="#" class="small-box-footer">
                                                    More info <i class="fas fa-arrow-circle-right"></i>
                                                </a>
                                            </div>



                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 col-ml-6 col-lg-6">
                                            <div class="small-box bg-primary" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="1500">
                                                <!-- Loading (remove the following to stop the loading)-->
                                                <div class="overlay dark">
                                                    <a href="#" class="coursAjours">
                                                        <i class="fas fa-3x fa-sync-alt msicons"></i>
                                                    </a>
                                                </div>
                                                <!-- end loading -->
                                                <div class="inner">
                                                    <h3 id="TacheCours"><sup style="font-size: 20px">%</sup></h3> <!-- Espace réservé pour le pourcentage -->
                                                    <p>Tâches en cours</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="ion ion-play"></i>
                                                </div>
                                                <a href="#" class="small-box-footer">
                                                    More info <i class="fas fa-arrow-circle-right"></i>
                                                </a>
                                            </div>



                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 col-ml-6 col-lg-6">
                                            <div class="small-box bg-success" data-aos="fade-down"data-aos-easing="linear" data-aos-duration="1500">
                                                <!-- Loading (remove the following to stop the loading)-->
                                                <div class="overlay dark">
                                                    <a href="#" class="termeneAjours">
                                                        <i class="fas fa-3x fa-sync-alt msicons"></i>
                                                    </a>
                                                </div>
                                                <!-- end loading -->
                                                <div class="inner">
                                                    <h3 id="task-percentage"><sup style="font-size: 20px">%</sup></h3> <!-- Espace réservé pour le pourcentage -->
                                                    <p>Tâches accomplies</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="ion ion-checkmark-round"></i>
                                                </div>
                                                <a href="#" class="small-box-footer">
                                                    More info <i class="fas fa-arrow-circle-right"></i>
                                                </a>
                                            </div>



                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-6">
                    <div data-aos="fade-down" data-aos-duration="1500">
                        <div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title chartTitreG">Block Stat</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool nav-link-heart" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool nav-link-heart" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="accordion">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                                <h4 class="card-title w-100">
                                                    <a class="d-block w-100 chartTitre" data-toggle="collapse" href="#collapseOne">
                                                        {{-- Réalisations équipe & Personnelle --}}
                                                        Posts Tendance des utilisateurs
                                                    </a>
                                                </h4>
                                        </div>
                                        <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                            <div class="card-body">
                                            <canvas id="donutChart" width="400" height="400"></canvas>

                                                {{-- <canvas id="stackedBarChart" width="400" height="200"></canvas> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-info">
                                    <div class="card-header">
                                        <h4 class="card-title w-100">
                                        <a class="d-block w-100 chartTitre" data-toggle="collapse" href="#collapseTwo">
                                            {{-- Posts Tendance des utilisateurs --}}
                                            Réalisations équipe & Personnelle

                                        </a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <canvas id="stackedBarChart" width="400" height="200"></canvas>

                                            {{-- <canvas id="donutChart" width="400" height="400"></canvas> --}}
                                        </div>
                                    </div>
                                    </div>
                                    <div class="card card-light">
                                    <div class="card-header">
                                        <h4 class="card-title w-100">
                                        <a class="d-block w-100 chartTitre" data-toggle="collapse" href="#collapseThree">
                                           Visiteurs Par mois
                                        </a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="chart-container">
                                                <canvas id="visitorChart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- Réalisations stackedBarChart DEBUT --}}
                        {{-- <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-12">
                            <div class="card card-warning" data-aos="zoom-in-down">
                                <div class="card-header">
                                <h3 class="card-title ti">Réalisations</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool nav-link-heart" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool nav-link-heart" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                    </button>
                                </div>
                                </div>
                                <div class="card-body">
                                    <div class="chart">

                                        <canvas id="stackedBarChart" width="400" height="200"></canvas>
                                    </div>

                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div> --}}
                    {{--  Réalisations stackedBarChart FIN --}}
                    {{-- TYPE ARCHIVE (ENTRANT/SORTANT) PAR MOIS DEBUT --}}
                        {{-- <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-12">
                            <div class="card card-primary" data-aos="zoom-out-right">
                                <div class="card-header">
                                <h3 class="card-title ti">Type d'archive par Mois</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool nav-link-heart" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool nav-link-heart" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                    </button>
                                </div>
                                </div>
                                <div class="card-body">
                                    <div class="chart">
                                        <canvas id="stackedBarChart" ></canvas>
                                    </div>
                                </div>

                            </div>

                        </div> --}}
                    {{-- TYPE ARCHIVE (ENTRANT/SORTANT) PAR MOIS FIN --}}
                    <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-12">
                        <div class="card card-success" data-aos="flip-up"  data-aos-duration="3000">
                            <div class="card-header">
                            <h3 class="card-title chartTitre">Maitrises & Compétences</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool nav-link-heart" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool nav-link-heart" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                                </button>
                            </div>
                            </div>
                            <div class="card-body">
                            <div class="chart">
                                <canvas id="radarChart" width="300" height="300"></canvas>
                            </div>
                            </div>
                            <!-- /.card-body -->
                        </div>

                    </div>



                </div>
                <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-6">
                    {{-- RADRAR MAITRISES ET COMPETENCES DEBUT --}}
                        {{-- <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-12">
                            <div class="card card-success" data-aos="fade-up">
                                <div class="card-header">
                                <h3 class="card-title ti">Maitrises & Compétences</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool nav-link-heart" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool nav-link-heart" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                    </button>
                                </div>
                                </div>
                                <div class="card-body">
                                <div class="chart">
                                    <canvas id="radarChart" width="30" height="30"></canvas>
                                </div>
                                </div>
                                <!-- /.card-body -->
                            </div>

                        </div> --}}
                    {{-- RADRAR MAITRISES ET COMPETENCES DEBUT --}}
                </div>






            </div>
            <div class="row">

                {{-- <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-6">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Total d'archive par Direction</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool nav-link-heart" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool nav-link-heart" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <form id="filterForm">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-12 col-sm-12 col-md-12 col-ml-5 col-lg-5">
                                                <!-- Sélection de la période -->
                                                <div class="form-group">
                                                    <!-- Sélection de la période -->
                                                    <label for="interval">Période :</label>
                                                    <select name="interval" id="interval" class="form-control">
                                                        <option value="jour">Jour</option>
                                                        <option value="semaine">Semaine</option>
                                                        <option value="mois">Mois</option>
                                                        <option value="trimestre">Trimestre</option>
                                                        <option value="annee">Année</option>
                                                    </select>
                                                </div>
                                            </div>
                                        <div class="col-12 col-sm-12 col-md-12 col-ml-5 col-lg-5">
                                            <!-- Sélection du type de poste -->
                                            <div class="form-group">
                                                <!-- Sélection du type de poste -->
                                                <label for="type">Type de poste :</label>
                                                <select name="type" id="type" class="form-control">
                                                    <option value="public">Public</option>
                                                    <option value="prive">Privé</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 col-ml-2 col-lg-2">
                                            <!-- Bouton de soumission -->
                                            <div class="style" style="padding-top: 30px;">
                                                <button type="submit" class="btn btn-primary ">Filtrer</button>

                                            </div>
                                        </div>
                                        </div>
                                    </div>





                                </form>
                                <canvas id="archivesParPosteChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div> --}}



            </div>
        </div>
    </div>



</section>




