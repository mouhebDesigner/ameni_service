@extends('layouts.master')

@section('content')

    @include('includes.header')
    <div class="page-header" style="margin-top: 0px;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Register page</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="contact wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
        <div class="container">
            <div class="section-header text-center">
                <p>Send a request for the service {{  App\Models\Service::find($service_id)->titre}}</p>
                <h4>Enter your informations to send this request</h4>
            </div>
            <div class="row">
                
                <div class="col-md-6 offset-md-3">
                    <div class="contact-form">
                        <div id="success"></div>
                        <form  action="{{ url('appointment') }}"  method='post'>
                            @csrf
                            <input type="hidden" name="service_id" value="{{ $service_id }}">
                            <div class="control-group mb-2">
                                <input type="text" class="form-control" placeholder="Enter your name" name="name">
                                @error('name')
                                    <p class="help-block text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="control-group mb-2">
                                <input type="text" class="form-control" placeholder="Enter your email" name="email">
                                @error('email')
                                    <p class="help-block text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="control-group mb-2">
                                <input type="number" class="form-control" placeholder="Enter your phone number" name="phone_number">
                                @error('phone_number')
                                    <p class="help-block text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="control-group mb-2">
                                <input type="text" onclick="this.type= 'date';" class="form-control" placeholder="Enter date"  name="date">
                                @error('date')
                                <p class="help-block text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="control-group mb-2">
                                <input type="text" class="form-control" placeholder="Enter your password"  name="address">
                                @error('address')
                                <p class="help-block text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                          
                            <div class="d-flex justify-content-center">
                                <button class="btn" type="submit" id="sendMessageButton">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection