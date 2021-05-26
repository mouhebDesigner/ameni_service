@extends('layouts.master')

@section('content')

    @include('includes.header')
    <div class="page-header" style="margin-top: 0px;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Make appointment</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="contact wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
        <div class="container">
            @if(session('success'))
                <div class="section-header text-center alert-done">
                    <h4>{{ session('success') }}</h4>
                </div>
            @endif
            <div class="section-header text-center">
                <h4>List of my appointment request</h4>
            </div>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Service</th>
                            <th scope="col">date</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($appointments as $appointment)
                        <tr>
                            <th scope="row">{{ $appointment->id }}</th>
                            <td>{{ $appointment->service->titre }}</td>
                            <td>{{ $appointment->date }}</td>
                            <td>
                                @if($appointment->invoice->requested == "1")
                                    @if($appointment->invoice->accept == "0")
                                    <p>
                                        Invoice requested <i class="fa fa-check"></i>
                                    </p>
                                    @else
                                        <a href="#" onclick="window.print()">
                                            Show invoice
                                        </a>
                                        <div class="d-print-block">
                                            <p>showed</p>
                                        </div>
                                    @endif
                                @else 

                                    <a href="{{ url('appointment/'.$appointment->invoice->id.'/invoice_request') }}" class="btn btn-primary">Request Invoice</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
   
@endsection