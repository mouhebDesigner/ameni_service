<div class="row">
   
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
            <h3>{{ App\Models\Plumber::count() }}</h3>

            <p>The plumbers</p>
            </div>
            <div class="icon">
            <i class="ion ion-bag"></i>
            </div>
            <a href="{{ url('admin/plumbers') }}" class="small-box-footer">See more<i class="fas fa-arrow-circle-right"></i></a>
        </div>
        <div class="small-box bg-info">
            <div class="inner">
            <h3>{{ App\Models\Service::count() }}</h3>

            <p>The services</p>
            </div>
            <div class="icon">
            <i class="ion ion-bag"></i>
            </div>
            <a href="{{ url('admin/services') }}" class="small-box-footer">See more<i class="fas fa-arrow-circle-right"></i></a>
        </div>
        <div class="small-box bg-info">
            <div class="inner">
            <h3>{{ App\Models\Appointment::count() }}</h3>

            <p>The appointments</p>
            </div>
            <div class="icon">
            <i class="ion ion-bag"></i>
            </div>
            <a href="{{ url('admin/appointments') }}" class="small-box-footer">See more<i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    
    

    
    <!-- ./col -->
</div>