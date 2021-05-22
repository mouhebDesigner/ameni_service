@extends('layouts.master')

@section('content')

    @include('includes.header')
    <div class="page-header" style="margin-top: 0px;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Page de commande</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="contact wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
        <div class="container">
            <div class="section-header text-center">
                <p>Commander service</p>
                <h4>Remplir la formulaire pour envoyer ton commande</h4>
            </div>
            <div class="row">
                
                <div class="col-md-6 offset-md-3">
                    <div class="contact-form">
                        <div id="success"></div>
                        
                        
                        <form  action="{{ url('commande') }}" name="sentMessage" id="contactForm" novalidate="novalidate" method='post'>
                            @csrf
                            <input type="hidden" name="service_id" value="{{ $service_id }}">
                            <div class="control-group mb-2">
                                <input type="text" class="form-control" placeholder="Espace" required="required" name="espace">
                                @error('espace')
                                <p class="help-block text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="control-group mb-2">
                                <input type="text" class="form-control" placeholder="Adresse" required="required" name="adresse">
                                @error('adresse')
                                <p class="help-block text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="control-group mb-2">
                                <input type="text" class="form-control" placeholder="Numéro étage" required="required" name="num_etage">
                                @error('num_etage')
                                <p class="help-block text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="control-group mb-2">
                                <input type="date" class="form-control" placeholder="Numéro étage" required="required" name="date">
                                @error('date')
                                <p class="help-block text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-center">
                                <button class="btn" type="submit" id="sendMessageButton">Commander</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection