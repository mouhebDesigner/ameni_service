@extends('admin.layouts.master')


@section('content')
<div class="wrapper">
        @include('admin.includes.header')
        @include('admin.includes.aside')
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    Affect plumber to appointment of : {{ App\Models\Appointment::find($appointment_id)->name }}
                </h1>
            </section>
            <section class="content">
                <div class="row">
                <div class="col-md-12">
                
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ url('admin/affect_plumber') }}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nom">plumbers</label>
                                    <input type="hidden" value="{{ $appointment_id }}" name="appointment_id">
                                    <select name="plumber_id"  id="" class="form-control">
                                        <option value="" selected disbaled>Choose plumber</option>
                                        @foreach($plumbers as $plumber)
                                            <option value="{{ $plumber->id }}">{{ $plumber->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('plumber_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button type="reset" class="btn btn-info">Cancel</button>
                            </div>
                        </form>
                        </div>
                </div>
                  
                </div>
            </section>
        </div>
   


@endsection