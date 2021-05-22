@extends('layouts.master')

@section('content')

    @include('includes.header')
    <div class="page-header" style="margin-top: 0px;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Page de connexion</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="contact wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
        <div class="container">
            <div class="section-header text-center">
                <p>Connectez-vous</p>
                <h4>Insérez vos coordonnés pour accéder a votre compte</h4>
            </div>
            <div class="row">
                
                <div class="col-md-6 offset-md-3">
                    <div class="contact-form">
                        <div id="success"></div>
                        <form  action="{{ route('login') }}" name="sentMessage" id="contactForm" novalidate="novalidate" method='post'>
                            @csrf
                            <div class="control-group mb-2">
                                <input type="text" class="form-control" placeholder="Email" required="required" data-validation-required-message="Please enter your email" name="email">
                                @error('email')
                                <p class="help-block text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="control-group mb-2">
                                <input type="password" class="form-control" placeholder="Mot de passe" required="required" data-validation-required-message="Please enter a subject" name="password">
                                @error('password')
                                <p class="help-block text-danger">{{ $message }}</p>
                                @enderror
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