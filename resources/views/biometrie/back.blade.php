@extends('app')
@section('content')
{{-- @include('header') --}}






<div class="row justify-content-center">
    <div class="col-md-10 shadow-lg p-3 mb-5 bg-white rounded">
        {{-- <h2 class="text-center bg-success text-white p-2">GESTION DES RECLAMMATIONS</h2> --}}

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
                                    <li class="breadcrumb-item"><a
                                            href="{{ route('back') }}">Accueil</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Biométrie</li>
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
                        <a class="nav-link active text-warning text-uppercase font-weight-bold" data-toggle="tab" href="#home5" role="tab" aria-selected="true">Dossiers en attente de validation: 12</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-success text-uppercase font-weight-bold" data-toggle="tab" href="#profile5" role="tab" aria-selected="false">Dossiers validé(s): 55</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger text-uppercase font-weight-bold" data-toggle="tab" href="#profile15" role="tab" aria-selected="false">Dossiers réjété(s): 55</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="home5" role="tabpanel">
                        <div class="pd-20">
                            <div class="pb-20 shadow-lg p-3 mb-5 bg-white rounded">
                                <div class="pd-20">
                                    <h4 class="text-blue h4">Liste des dossiers non validés</h4>
                                </div>
                                <table class="data-table table stripe hover nowrap dataTable no-footer dtr-inline" id="DataTables_Table_0"
                                    role="grid" aria-describedby="DataTables_Table_0_info">
                                    <thead class="bg-success">
                                        <tr>
                                            {{-- <th class="table-plus text-white">N° Dossier</th> --}}
                                            <th class="table-plus text-white text-center">N° Immatriculation</th>
                                            <th class="text-white text-center">Raison Sociale</th>
                                            {{-- <th class="text-white">Date Naissance</th>
                                            <th class="text-white">Email</th>
                                            <th class="text-white">Adresse</th>
                                            <th class="text-white">Telephone</th> --}}
                                            {{-- <th class="text-white">Type</th> --}}
                                            {{-- <th class="text-white">Prestation</th> --}}
                                            {{-- <th class="text-white">Motif(s)</th>
                                            <th class="text-white">Details</th> --}}
                                            <th class="datatable-nosort text-white text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $d)
                                        <td class="font-weight-bold text-center">{{ $d->no_employeur }}</td>
                                        <td class="text-center">{{ $d->raison_sociale }}</td>
                                        <td class="text-center">

                                            <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal-procla-{{ $d->id }}" type="button">
                                                {{-- <span class="badge"> --}}
                                                    Traitement
                                                    <span class="spinner-grow text-danger spinner-grow-sm" role="status" aria-hidden="true">
                                                    </span>
                                                {{-- </span> --}}
                                            </a>
                                        </td>
                                        <div class="modal fade bs-example-modal-lg" id="modal-procla-{{ $d->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title text-center" id="myLargeModalLabel">Dossier N° 7876767778 | Reçu le 01/05/2024</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    </div>
                                                    <div class="modal-body">
                                                       {{-- <div class="row mt-2 m-2 justify-content-center">
                                                            <div class="col-md-6">
                                                                <span class="font-weight-bold">N° DOSSIER:</span>
                                                                <span class="float-right font-weight-bold">67676767</span> <br> <hr>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <span class="font-weight-bold">N° EMPLOYEUR:</span>
                                                                <span class="float-right font-weight-bold">{{ $d->no_employeur }}</span> <br> <hr>
                                                            </div>
                                                            <div class="col-md-12 bg-success p-1">
                                                                <h5 class="text-center text-white">Détails sur l'employeur</h5>
                                                            </div>

                                                       </div> --}}
                                                       <div class="profile-info">
                                                        <div class="row">
                                                            <div class="col-md-12 bg-success p-1">
                                                                <h5 class="text-center text-white">Infos Employeur</h5>
                                                            </div>
                                                            <ul class="col-md-8">
                                                                <li>
                                                                    <span>Raison Sociale:</span> {{ $d->raison_sociale }}
                                                                </li>
                                                                <li>
                                                                    <span>N° Employeur:</span> {{ $d->no_employeur }}
                                                                </li>
                                                                <li>
                                                                    <span>Adresse Mail:</span> {{ $d->email }}
                                                                </li>
                                                                <li>
                                                                    <span>Nombre D'employés:</span> {{ $d->effectif_total }}
                                                                </li>
                                                                <li>
                                                                    <span>Téléphone:</span> {{ $d->telephone }}
                                                                </li>
                                                                <li>
                                                                    <span>Adresse:</span> {{ $d->adresse }}
                                                                </li>
                                                            </ul>
                                                            <ul class="col-md-4">
                                                                <li>
                                                                    <span>Catégorie:</span> {{ $d->categorie }}
                                                                </li>
                                                                <li>
                                                                    <span>Date Création:</span> {{ $d->date_creation }}
                                                                </li>
                                                                <li>
                                                                    <span>Date Immatriculation:</span> {{ $d->date_imm }}
                                                                </li>
                                                                <li>
                                                                    <span>Début d'activité:</span> {{ $d->debut_activite }}
                                                                </li>
                                                                <li>
                                                                    <span>N° Agrement:</span> {{ $d->no_agrement }}
                                                                </li>
                                                                <li>
                                                                    <span>N° Compte:</span> {{ $d->no_compte }}
                                                                </li>

                                                            </ul>

                                                        </div>

                                                    </div>



                                                       <form action="#" method="post" id="bioDoneFrm">
                                                        @csrf
                                                        <div class="row m-2 ">
                                                                <div class="col-md-12 bg-success p-1">
                                                                    <h5 class="text-center text-white">Éligibilité du Dossier (DQE)</h5>
                                                                </div>
                                                                <div class="col-md-12 form-group mt-2">
                                                                    {{-- <label class="weight-600">Éligibilité du dossier</label> --}}
                                                                    <div class="custom-control custom-radio mb-5">
                                                                        <input type="radio" checked value="oui" id="customRadio1" name="customRadio" class="custom-control-input">
                                                                        <label class="custom-control-label" for="customRadio1">OUI Ce dossier est éligible pour la biometrie</label>
                                                                    </div>
                                                                    <div class="custom-control custom-radio mb-5">
                                                                        <input type="radio" value="non" id="customRadio2" name="customRadio" class="custom-control-input">
                                                                        <label class="custom-control-label" for="customRadio2">NON Ce dossier n'est pas éligible pour la biometrie</label>
                                                                    </div>

                                                                </div>
                                                                <div id="detailsDiv" class="col-md-12" style="display: none;">
                                                                    <label class="weight-600 text-danger">Détails sur la raison de la non Éligibilité de ce dossier (champs obligatoire !!)</label>
                                                                    <div class="form-group">
                                                                        <textarea required name="details" class="form-control"></textarea>
                                                                        <input type="hidden" name="reclamation_id" value="{{ $d->id }}">
                                                                    </div>
                                                                </div>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" id="validation_btn" class="btn btn-success">Valider le dossier</button>
                                                        {{-- <a href="{{ route('reclamation.home.done',$rec->id ) }}" class="btn btn-warning">Cloturer le dossier <i class="fa fa-print" aria-hidden="true"></i></a> --}}
                                                        {{-- <a href="#" class="btn btn-success">Voir la fiche de reclamation <i class="fa fa-print" aria-hidden="true"></i></a> --}}
                                                    </div>
                                                </form>
                                                </div>
                                            </div>
                                        </div>

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="profile5" role="tabpanel">
                        <div class="pd-20">
                            <div class="pb-20 shadow-lg p-3 mb-5 bg-white rounded">
                                <div class="pd-20">
                                    <h4 class="text-blue h4">Liste des dossiers validés</h4>
                                </div>
                                <table class="data-table table stripe hover nowrap dataTable no-footer dtr-inline" id="DataTables_Table_0"
                                    role="grid" aria-describedby="DataTables_Table_0_info">
                                    <thead class="bg-success">
                                        <tr>
                                            {{-- <th class="table-plus text-white">N° Dossier</th> --}}
                                            <th class="table-plus text-white text-center">N° Immatriculation</th>
                                            <th class="text-white text-center">Raison Sociale</th>
                                            {{-- <th class="text-white">Date Naissance</th>
                                            <th class="text-white">Email</th>
                                            <th class="text-white">Adresse</th>
                                            <th class="text-white">Telephone</th> --}}
                                            {{-- <th class="text-white">Type</th> --}}
                                            {{-- <th class="text-white">Prestation</th> --}}
                                            {{-- <th class="text-white">Motif(s)</th>
                                            <th class="text-white">Details</th> --}}
                                            <th class="datatable-nosort text-white text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $d)
                                        <td class="font-weight-bold text-center">{{ $d->no_employeur }}</td>
                                        <td class="text-center">{{ $d->raison_sociale }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('back.details', $d->id) }}" class="btn btn-success">
                                                {{-- <span class="badge"> --}}
                                                    Plus de détails <i class="fa fa-eye" aria-hidden="true"></i>
                                                    {{-- <span class="spinner-grow text-danger spinner-grow-sm" role="status" aria-hidden="true">
                                                    </span> --}}
                                                {{-- </span> --}}
                                            </a>

                                        </td>


                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="profile15" role="tabpanel">
                        <div class="pd-20">
                            <div class="pb-20 shadow-lg p-3 mb-5 bg-white rounded">
                                <div class="pd-20">
                                    <h4 class="text-blue h4">Liste des demandes traités</h4>
                                </div>
                                <table class="data-table table stripe hover nowrap dataTable no-footer dtr-inline" id="DataTables_Table_0"
                                    role="grid" aria-describedby="DataTables_Table_0_info">
                                    <thead class="bg-success">
                                        <tr>
                                            {{-- <th class="table-plus text-white">N° Dossier</th> --}}
                                            <th class="table-plus text-white text-center">N° Immatriculation</th>
                                            <th class="text-white text-center">Raison Sociale</th>
                                            {{-- <th class="text-white">Date Naissance</th>
                                            <th class="text-white">Email</th>
                                            <th class="text-white">Adresse</th>
                                            <th class="text-white">Telephone</th> --}}
                                            {{-- <th class="text-white">Type</th> --}}
                                            {{-- <th class="text-white">Prestation</th> --}}
                                            {{-- <th class="text-white">Motif(s)</th>
                                            <th class="text-white">Details</th> --}}
                                            <th class="datatable-nosort text-white text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                    </tbody>
                                </table>
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



<script>
    $(document).ready(function(){
        $("#submitBtnRecDone").click(function(){
            console.log('hheeelooo');
            $("#recDoneFrm").submit(); // Submit the form
        });

        $('input[type="radio"]').click(function(){
            var inputValue = $(this).attr("value");
            if(inputValue == 'oui'){
                $("#detailsDiv").hide();
                $("#validation_btn").text("Valider le dossier");
            } else {
                $("#detailsDiv").show();
                $("#validation_btn").text("Rejeter le dossier");

            }
            // console.log(inputValue);
            // var targetBox = $("." + inputValue);
            // $(".content-box").not(targetBox).hide(); // Hide all content boxes except the target
            // $(targetBox).show(); // Show the target content box
        });
    });
</script>







@endsection
