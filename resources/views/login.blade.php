@extends('layouts.master')

@section('content')

    @include('includes.header')
    <div class="page-header" style="margin-top: 0px;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Page d'inscription</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="contact wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
        <div class="container">
            <div class="section-header text-center">
                <p>Créer un compte</p>
                <h4>Insérez vos coordonnés pour créer  votre compte</h4>
            </div>
            <div class="row">
                
                <div class="col-md-6 offset-md-3">
                    <div class="contact-form">
                        <div id="success"></div>
                        <form  action="{{ route('register') }}"  method='post'>
                            @csrf
                            <div class="control-group mb-2">
                                <input type="text" class="form-control" placeholder="Nom" name="nom">
                                @error('nom')
                                    <p class="help-block text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="control-group mb-2">
                                <input type="text" class="form-control" placeholder="Prénom" name="prenom">
                                @error('prenom')
                                    <p class="help-block text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="control-group mb-2">
                                <input type="text" class="form-control" placeholder="Email" name="email">
                                @error('email')
                                    <p class="help-block text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="control-group mb-2">
                                <input type="number" class="form-control" placeholder="Numéro de téléphone" name="phone_number">
                                @error('phone_number')
                                    <p class="help-block text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="control-group mb-2">
                                <input type="password" class="form-control" placeholder="Mot de passe"  name="password">
                                @error('password')
                                <p class="help-block text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="control-group mb-2">
                                <input type="password" class="form-control" placeholder="Confirmer mot de passe"  name="password_confirmation">
                            </div>  
                            <div class="d-flex justify-content-center">
                                <button class="btn" type="submit" id="sendMessageButton">Connecter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection