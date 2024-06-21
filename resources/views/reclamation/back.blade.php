@extends('app')
@section('content')
    @include('header')
    <div style="margin-top: 100px;">

        <div class="row m-auto">
            <div class="col-10 m-auto">
                <div class="row justify-content-center">
                    <div class="col-xl-4 mb-30">
                        <a href="{{ route('reclamation.dqe') }}" class="btn btn-block">
                            <div class="card-box height-100-p widget-style1 bg-success shadow">
                                <div class="d-flex flex-wrap align-items-center">
                                    <div class="widget-data text-white text-uppercase font-weight-bold text-left">
                                        GESTION DES RECLAMATIONS
                                    </div>
                                    <div class="progress-data">
                                        <i class="icon-copy fa fa-edit fa-3x text-white" aria-hidden="true"></i>
                                    </div>
                                    {{-- <small class="pl-1 text-white">Gestion de la situation des pensionnés</small> --}}
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-4 mb-30">
                        <a href="#" class="btn btn-block">
                            <div class="card-box height-100-p widget-style1 bg-success shadow-lg">
                                <div class="d-flex flex-wrap align-items-center">
                                    <div class="widget-data text-white text-uppercase font-weight-bold text-left">
                                        GESTION DES RENDEZ-VOUS
                                    </div>
                                    <div class="progress-data">
                                        <i class="icon-copy fa fa-calendar fa-3x text-white"></i>
                                    </div>
                                    {{-- <small class="pl-1 text-white">Gestion de la situation des pensionnés</small> --}}
                                </div>
                            </div>
                        </a>
                    </div>


                </div>

            </div>

        </div>

        <div class="card-box m-auto" style="font-size: 14px; width:70%">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <img src="{{ asset('logos/main-logo.png') }}" alt="img" width="400px" height="400px">
                </div>
                <div class="col-md-8">
                    <h6 class="font-20 mb-10 ">
                        Bienvenue sur la plateforme de prise de rendez-vous et de réclamation de la Caisse Nationale de
                        Sécurité Sociale:

                    </h6>
                    <p class="font-18 max-width-600">

                        Afin de vous assurer le meilleur accueil, la CNSS a mis à votre disposition une plateforme de
                        prise de rendez-vous et de réclamation en ligne sur le site <a
                            href="https://www.reclamations.cnssgn.com/index"
                            class="text-success">reclamations.cnssgn.com</a> .
                        Vous pouvez choisir et planifier votre rendez-vous ou faire une réclamation avec nos services, selon
                        vos
                        propres
                        disponibilités et préférences. </p>
                </div>

                {{-- <div class="modal-footer m-auto" style="border-top: none">
                    <a href="{{ route('rendezvous.prendre') }}" type="button" class="btn btn-success" data-dismiss="modal">
                        <i class="icon-copy fa fa-calendar"></i> Prise de rendez-vous</a>

                    <a href="{{ route('rendezvous.gestion') }}" type="button" class="btn btn-success" data-dismiss="modal"
                        style="margin-left:30px">
                        <i class="icon-copy fa fa-edit" aria-hidden="true"></i> Gérer mes
                        rendez-vous</a>

                    <a href="{{ route('reclamation.create') }}" type="button" class="btn btn-danger" data-dismiss="modal"
                        style="margin-left:30px">
                        Faire une Réclamation</a>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
