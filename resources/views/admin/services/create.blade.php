@extends('admin.layouts.master')


@section('content')
<div class="wrapper">
        @include('admin.includes.header')
        @include('admin.includes.aside')
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    Ajouter un service 
                </h1>
            </section>
            <section class="content">
                <div class="row">
                <div class="col-md-12">
                
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Formulaire d'ajout</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ url('admin/services') }}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="catalogue_id">Catalogue</label>
                                    <select name="catalogue_id" id="catalogue_id" class="form-control">
                                        <option value="" selected disbaled>Choisir catalogue</option>
                                        @foreach(App\Models\Catalogue::all() as $catalogue)
                                            <option value="{{ $catalogue->id }}" @if(old('catalogue_id') == $catalogue->id) selected @endif>{{ $catalogue->nom }}</option>
                                        @endforeach
                                    </select>
                                    @error('mode')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="mode">Mode</label>
                                    <select name="mode" id="mode" class="form-control">
                                        <option value="" selected disbaled>Choisir mode</option>
                                        <option value="interne">Interne</option>
                                        <option value="externe">Externe</option>
                                    </select>
                                    @error('mode')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="unité">Unité</label>
                                    <select name="unité" id="unité" class="form-control">
                                        <option value="" selected disbaled>Choisir unité</option>
                                        <option value="metre">Interne</option>
                                        <option value="place">Place</option>
                                        <option value="panne">Panne</option>
                                        <option value="consulter">Consulter</option>
                                    </select>
                                    @error('unité')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="titre">Titre de service</label>
                                    <input type="text" class="form-control" name="titre" value="{{ old('titre') }}" id="titre" placeholder="Saisir titre de module">
                                    @error('titre')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="prix">Prix de service</label>
                                    <input type="text" class="form-control" name="prix" value="{{ old('prix') }}" id="prix" placeholder="Saisir prix de module">
                                    @error('prix')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                    <input type="checkbox" class="form-control" value="oui" name="voiture"  id="prix">
                                    <label for="prix">Voiture</label>

                                <div class="form-group">
                                    <label for="description">Description de service</label>
                                    <textarea class="form-control" name="description" value="{{ old('description') }}" id="description" placeholder="Saisir description"></textarea>
                                    @error('description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="image">Image de service</label>
                                    <input type="file" class="form-control" name="image" value="{{ old('image') }}" id="image" placeholder="Saisir image de module">
                                    @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                            <button type="reset" class="btn btn-info">Annuler</button>
                            </div>
                        </form>
                        </div>
                </div>
                  
                </div>
            </section>
        </div>
   


@endsection