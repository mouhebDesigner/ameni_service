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
                        @php 
                            $ids = "";
                        @endphp
                        @foreach($appointments as $key => $appointment)
                            @php 
                                if($key == 0){
                                    $ids .= $appointment->id;
                                }else {

                                    $ids .= '.'.$appointment->id;
                                }
                            @endphp
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
                                        <button value="{{ $appointment->id }}" id="showed{{ $appointment->id }}">
                                            Show invoice
                                        </button>
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
    @section('print')
            <h2 class="text-center invoice_title">Invoice</h2>
            @foreach($appointments as $appointment)
                <table class="table appointment_body appointment" id="invoice{{ $appointment->id }}">
                    <tr>
                        <th>#</th>
                        <th>Service</th>
                        <th>Plumber</th>
                        <th>Price</th>
                        <th>Date</th>
                    </tr>
                    <tr>
                        <td>{{ $appointment->id }}</td>
                        <td>{{ $appointment->service->titre }}</td>
                        <td>{{ $appointment->plumber->name }}</td>
                        <td>{{ $appointment->service->prix }}</td>
                        <td>{{ $appointment->created_at->diffForHumans() }}</td>
                    </tr>
                </table>
            @endforeach
    @endsection
   
@endsection


@section('script')
    <script>
        var ids = "<?php echo $ids; ?>";
        var ids_table = ids.split(".");

        ids_table.forEach((item, index) => {
            $('#showed'+item).click(function(){
                $('#invoice'+item).addClass("d-print-block");
                $(".appointment:not(#invoice"+item+")").removeClass("d-print-block");
                window.print();
            });
        });
    </script>

@endsection