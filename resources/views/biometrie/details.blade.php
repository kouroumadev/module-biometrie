@extends('app')
@section('content')
 {{-- @include('header') --}}


 <div class="row justify-content-center">
    <div class="col-md-10 shadow-lg p-3 mb-5 bg-white rounded">

        <div class="page-header">
            <div class="row">
                <div class="col-10">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="title">
                                <h4>GESTION DES DEMANDES POUR LA BIOMÉTRIE</h4>
                            </div>
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('back') }}">Accueil</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ url()->previous() }}">Biométrie</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Détails</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-2">

                    <div>
                        <p>DECONNEXION</p>
                        <a href="{{ route('logout') }}" class="btn btn-block">
                            <div class="card-box height-100-p widget-style1 bg-danger shadow-lg" style="width: 50%">
                                <div class="d-flex flex-wrap align-items-center">

                                    <div class="progress-data">
                                        <i class="icon-copy fa fa-power-off fa-2x text-white"
                                            aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>

        </div>

        <div class="pd-20 card-box">
            {{-- <h5 class="h4 text-blue mb-20">Nav Pills Tabs</h5> --}}
            <div class="tab">
                <ul class="nav nav-tabs customtab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active text-success text-uppercase" data-toggle="tab" href="#home5" role="tab" aria-selected="true">Infos Employeur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-success text-uppercase" data-toggle="tab" href="#profile5" role="tab" aria-selected="false">Infos Dossier</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="home5" role="tabpanel">
                        <div class="pd-20">
                            <div class="profile-info">
                                <div class="row">
                                    <ul class="col-md-6">
                                        <li>
                                            <span>Raison Sociale:</span> {{ $data[0]->raison_sociale }}
                                        </li>
                                        <li>
                                            <span>N° Employeur:</span> {{ $data[0]->no_employeur }}
                                        </li>
                                        <li>
                                            <span>Adresse Mail:</span> {{ $data[0]->email }}
                                        </li>
                                        <li>
                                            <span>Nombre D'employés:</span> {{ $data[0]->effectif_total }}
                                        </li>
                                        <li>
                                            <span>Téléphone:</span> {{ $data[0]->telephone }}
                                        </li>
                                        <li>
                                            <span>Adresse:</span> {{ $data[0]->adresse }}
                                        </li>
                                    </ul>
                                    <ul class="col-md-6">
                                        <li>
                                            <span>Catégorie:</span> {{ $data[0]->categorie }}
                                        </li>
                                        <li>
                                            <span>Date Création:</span> {{ $data[0]->date_creation }}
                                        </li>
                                        <li>
                                            <span>Date Immatriculation:</span> {{ $data[0]->date_imm }}
                                        </li>
                                        <li>
                                            <span>Début d'activité:</span> {{ $data[0]->debut_activite }}
                                        </li>
                                        <li>
                                            <span>N° Agrement:</span> {{ $data[0]->no_agrement }}
                                        </li>
                                        <li>
                                            <span>N° Compte:</span> {{ $data[0]->no_compte }}
                                        </li>

                                    </ul>

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="profile5" role="tabpanel">
                        <div class="pd-20">
                            <div class="profile-info">
                                <div class="row">
                                    <ul class="col-md-6">
                                        <li>
                                            <span>N° Dossier:</span> 776656567
                                        </li>
                                        <li>
                                            <span>Etat Dossier:</span> recu lorem
                                        </li>

                                    </ul>
                                    <ul class="col-md-6">
                                        <li>
                                            <span>Date de reception du dossier:</span> 7667675675
                                        </li>
                                        <li>
                                            <span>Date de validation d'éligibilité(DIRGA):</span> 9798786675
                                        </li>


                                    </ul>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@endsection
