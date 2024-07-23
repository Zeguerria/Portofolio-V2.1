<section>
    <div class="serction-chart">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-6">
                    <div class="card ">
                            <div class="card-header border-0 bg-gradient-success">

                            <h3 class="card-title chartTitre">
                                <i class="far fa-calendar-alt"></i>
                                Calendar
                            </h3>
                            <!-- tools card -->
                            <div class="card-tools">
                                <!-- button with a dropdown -->
                                <div class="btn-group">
                                <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                                    <i class="fas fa-bars"></i>
                                </button>
                                <div class="dropdown-menu" role="menu">
                                    <a href="#" class="dropdown-item">Add new event</a>
                                    <a href="#" class="dropdown-item">Clear events</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item">View calendar</a>
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
                <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-6">
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
                        <div class="card card-success" data-aos="fade-up">
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
                                <canvas id="radarChart" width="30" height="30"></canvas>
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
