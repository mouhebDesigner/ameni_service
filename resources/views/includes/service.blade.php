<div class="service" id="service">
    <div class="container">
        <div class="section-header text-center">
            <p>Our services</p>
            <h2>We offre services</h2>
        </div>
        <div class="row">
            @foreach(App\Models\Service::all() as $service)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item">
                    <div class="service-img">
                        <img src="{{ asset('storage/'.$service->image) }}" alt="Image">
                        <div class="service-overlay">
                            <p> 
                                {{ $service->description }}
                            </p>    
                        </div>
                    </div>
                    <div class="service-text">
                        <h3>{{ $service->titre }}</h3>
                        <a class="btn" href="{{ url('service/'.$service->id.'/appointment') }}" >
                            Request appointment
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>