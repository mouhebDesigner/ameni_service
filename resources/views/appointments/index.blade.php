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
                                <a href="{{ url('appointment/'.$appointment->id.'/invoice_request') }}" class="btn btn-primary">Request Invoice</a>
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