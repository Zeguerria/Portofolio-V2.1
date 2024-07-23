{{-- ME CONTACTER  DEBUT --}}
<div>
    <section class="gy-4" id="contact">
          <div class="container-fluid">
            <div class="wrapper">

                <div class="inner" >
                    <div data-aos="fade-down-right" data-aos-offset="300" data-aos-easing="ease-in-sine">
                        <div class="image-holder pr-4  mesImages">
                            <img src="{{asset('portofolios/images/cafe.jpg')}}" alt="">
                        </div>
                    </div>

                    <form action="{{ route('send.project') }}" method="POST" style="background-color: #eae4e4;">
                        @csrf
                        <div data-aos="fade-up"
                        data-aos-anchor-placement="center-bottom">
                            <h3>Souhaitez-vous partager un Projet avec Moi ?</h3>

                        </div>
                        <div data-aos="fade-left" data-aos-anchor="#example-anchor" data-aos-offset="500" data-aos-duration="500">
                            <h5 class="text-center">Et si nous discutions autour d'un caffé ?</h5>
                        </div>
                        <div class="container-fluid">
                            <div data-aos="fade-left" data-aos-anchor="#example-anchor" data-aos-offset="500" data-aos-duration="500">
                                <div class="row pt-2">
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 pt-2">
                                        <input type="text" name="nom" class="form-control" placeholder="Nom" required style=" background: linear-gradient(90deg, #E5E3E2, #F6F7F9, #E5E3E2);">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 pt-2">
                                        <input type="text" name="prenom" class="form-control" placeholder="Prénom" required style=" background: linear-gradient(90deg, #E5E3E2, #F6F7F9, #E5E3E2);">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 pt-2">
                                        <input type="email" name="email" class="form-control" placeholder="Mail" required style=" background: linear-gradient(90deg, #E5E3E2, #F6F7F9, #E5E3E2);">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 pt-2">
                                        <input type="tel" name="phone" class="form-control" placeholder="Phone" required style=" background: linear-gradient(90deg, #E5E3E2, #F6F7F9, #E5E3E2);">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 pt-2" style=" background: linear-gradient(90deg, #E5E3E2, #F6F7F9, #E5E3E2);">
                                        <textarea name="message" placeholder="Message" class="form-control" style="height: 130px;" required ></textarea>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-12  pt-2">
                                        <button type="submit" >Envoyer
                                            <i class="zmdi zmdi-long-arrow-right"></i>
                                        </button>

                                    </div>


                                </div>
                            </div>


                        </div>



                    </form>

                </div>
            </div>

          </div>
      </section>
</div>
{{-- ME CONTACTER FIN --}}
