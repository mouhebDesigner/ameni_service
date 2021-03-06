@extends('admin.layouts.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
@section('content')
    <div class="wrapper">
        
        @include('admin.includes.header')
        @include('admin.includes.aside')
        <div class="content-wrapper" style="min-height: 257px">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">List of invoices</h1>
                        </div><!-- /.col -->
                       
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="container-fluid">
                @include('admin.includes.error-message')

                    <div class="row">
                        <div class="col-12">
                            
                            <!-- /.card -->

                            <div class="card">
                            <div class="card-header">
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="d-flex justify-content-between">
                                                <div id="example1_filter" class="dataTables_filter">
                                                    <label>
                                                        Search:
                                                        <input 
                                                        type="search" class="form-control form-control-sm" 
                                                        placeholder="" 
                                                        aria-controls="example1">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                                <thead>
                                                    <tr>
                                                        <th>Customer</th>
                                                        <th>Service</th>
                                                        <th>Actions</th>
                                                    </tr>

                                                </thead>
                                                <tbody>
                                                    @foreach($invoices as $invoice)
                                                        <tr>
                                                            <td>{{ $invoice->appointment->name }}</td>
                                                            <td>{{ $invoice->appointment->service->titre }}</td>
                                                            <td>
                                                                <div class="d-flex justify-content-around">
                                                                    @if($invoice->accept == 1)
                                                                        <button class="btn btn-success" disabled>
                                                                        Accept <i class="fa fa-check"></i> 
                                                                        </button>
                                                                    @else 

                                                                    <a class="btn btn-success" href="{{ url('admin/invoice/'.$invoice->id.'/accept') }}" onclick="return confirm('Do you want to accept this invoice')">
                                                                        Accept
                                                                    </a>
                                                                    @endif

                                                                    @if($invoice->accept == 0)
                                                                    <button class="btn btn-danger" disabled>
                                                                        Refuse <i class="fa fa-check"></i> 
                                                                        </button>
                                                                    @else 
                                                                    <a class="btn btn-danger" href="{{ url('admin/invoice/'.$invoice->id.'/refuse') }}" onclick="return confirm('Do you want to affect refuse this invoice')">
                                                                        Refuse 
                                                                    </a>
                                                                    @endif
                                                                    
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                    <th>Customer</th>
                                                        <th>Service</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                                {{ $invoices->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                        </div>
                </div>
            </div>
        </div>
                    
    </div>
@endsection

@section('script')

@endsection
