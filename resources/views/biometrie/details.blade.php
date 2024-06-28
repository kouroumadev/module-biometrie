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
                                            <span>Raison Socile:</span> {{ $data[0]->raison_sociale }}
                                        </li>
                                        <li>
                                            <span>N° Employeur:</span> {{ $data[0]->no_employeur }}
                                        </li>
                                        <li>
                                            <span>Adresse Mail:</span> {{ $data[0]->email }}
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
                            <form>
                                <ul class="profile-edit-list row">
                                    <li class="weight-500 col-md-6">
                                        <h4 class="text-blue h5 mb-20">Edit Your Personal Setting</h4>
                                        <div class="form-group">
                                            <label>Full Name</label>
                                            <input class="form-control form-control-lg" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control form-control-lg" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control form-control-lg" type="email">
                                        </div>
                                        <div class="form-group">
                                            <label>Date of birth</label>
                                            <input class="form-control form-control-lg date-picker" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <div class="d-flex">
                                                <div class="custom-control custom-radio mb-5 mr-20">
                                                    <input type="radio" id="customRadio4" name="customRadio" class="custom-control-input">
                                                    <label class="custom-control-label weight-400" for="customRadio4">Male</label>
                                                </div>
                                                <div class="custom-control custom-radio mb-5">
                                                    <input type="radio" id="customRadio5" name="customRadio" class="custom-control-input">
                                                    <label class="custom-control-label weight-400" for="customRadio5">Female</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Country</label>
                                            <select class="selectpicker form-control form-control-lg" data-style="btn-outline-secondary btn-lg" title="Not Chosen">
                                                <option>United States</option>
                                                <option>India</option>
                                                <option>United Kingdom</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>State/Province/Region</label>
                                            <input class="form-control form-control-lg" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>Postal Code</label>
                                            <input class="form-control form-control-lg" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input class="form-control form-control-lg" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Visa Card Number</label>
                                            <input class="form-control form-control-lg" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>Paypal ID</label>
                                            <input class="form-control form-control-lg" type="text">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox mb-5">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1-1">
                                                <label class="custom-control-label weight-400" for="customCheck1-1">I agree to receive notification emails</label>
                                            </div>
                                        </div>
                                        <div class="form-group mb-0">
                                            <input type="submit" class="btn btn-primary" value="Update Information">
                                        </div>
                                    </li>
                                    <li class="weight-500 col-md-6">
                                        <h4 class="text-blue h5 mb-20">Edit Social Media links</h4>
                                        <div class="form-group">
                                            <label>Facebook URL:</label>
                                            <input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
                                        </div>
                                        <div class="form-group">
                                            <label>Twitter URL:</label>
                                            <input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
                                        </div>
                                        <div class="form-group">
                                            <label>Linkedin URL:</label>
                                            <input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
                                        </div>
                                        <div class="form-group">
                                            <label>Instagram URL:</label>
                                            <input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
                                        </div>
                                        <div class="form-group">
                                            <label>Dribbble URL:</label>
                                            <input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
                                        </div>
                                        <div class="form-group">
                                            <label>Dropbox URL:</label>
                                            <input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
                                        </div>
                                        <div class="form-group">
                                            <label>Google-plus URL:</label>
                                            <input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
                                        </div>
                                        <div class="form-group">
                                            <label>Pinterest URL:</label>
                                            <input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
                                        </div>
                                        <div class="form-group">
                                            <label>Skype URL:</label>
                                            <input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
                                        </div>
                                        <div class="form-group">
                                            <label>Vine URL:</label>
                                            <input class="form-control form-control-lg" type="text" placeholder="Paste your link here">
                                        </div>
                                        <div class="form-group mb-0">
                                            <input type="submit" class="btn btn-primary" value="Save & Update">
                                        </div>
                                    </li>
                                </ul>
                            </form>
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
