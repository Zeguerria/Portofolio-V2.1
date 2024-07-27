<div class="row">
    <div class="col-lg-3 col-6" >
        <!-- small box -->
        <div class="small-box bg-success" data-aos="zoom-in" data-aos-duration="1500">
            <div class="inner bg-light lescard">
                <h3 id="total_7">{{$RealisationTotal}}</h3>

                <p>Réalisations Total</p>
            </div>
            <div class="icon  ">
                <i class="ion ion-filing"></i>

            </div>
            <a href="{{route('R-Realisations')}}" class="small-box-footer">Voir plus&ensp;<i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning" data-aos="zoom-out" data-aos-duration="1500">
        <div class="inner bg-light lescard" >
            <h3 id="total_8">{{$CompTotal}}</h3>

            <p>Compétences et Réalisations Total</p>
        </div>
        <div class="icon">
            <i class="ion ion-ribbon-a"></i>
        </div>
        <a href="{{(route('A-Accomplissements'))}}" class="small-box-footer">Voir plus&ensp;<i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-primary " data-aos="zoom-in" data-aos-duration="1500">
        <div class="inner bg-light lescard" >
            <h3 id="total_9">{{$PostT}}</h3>

            <p>Posts Total</p>
        </div>
        <div class="icon">
            <i class="ion ion-chatbox-working"></i>
        </div>
        <a href="{{route('PT-Posts')}}" class="small-box-footer">Voir plus&ensp;<i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info" data-aos="zoom-out" data-aos-duration="1500">
        <div class="inner bg-light lescard" >
            <h3 id="total_10">{{$ProjetTotal}}</h3>

            <p>Projets Total</p>
        </div>
        <div class="icon">
            <i class="ion ion-pull-request"></i>
        </div>
        <a href="{{route('P-Projets')}}" class="small-box-footer">Voir plus&ensp; <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>
