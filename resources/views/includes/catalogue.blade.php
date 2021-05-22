<div class="feature wow fadeInUp" id="catalogue" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-header text-center">
                    <h2 class="">Catalogues</h2>
                </div>
            </div>    
        </div>
        <div class="row align-items-center">
            @foreach(App\Models\Catalogue::all() as $catalogue)
            <div class="col-lg-4 col-md-12 catalogue">
                <div class="feature-item">
                    <div class="feature-icon">
                        <img src="{{ asset('storage/'.$catalogue->image) }}" alt="">
                    </div>
                    <div class="feature-text">
                        <h3>{{ $catalogue->nom }}</h3>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>