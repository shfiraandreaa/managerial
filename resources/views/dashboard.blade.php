@extends('layouts.template')

@push('styles')
    
@endpush

@section('breadcrumb')
     <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
@endsection

@section('container')
    <div class="row">

      <div class="col-sm-6 col-lg-3">

        <div class="card">

          <div class="card-body">

            <div class="text-value-lg" id="city">12.124</div>

            <div id="weather">Widget title</div>

            <div class="progress progress-xs my-2">

              <div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            
            </div><small class="text-muted" id="weather-desc">Widget helper text</small>
          
          </div>
        
        </div>
      
      </div>

    </div>
@endsection

@push('scripts')
    <script>

      $(document).ready(function () {
        weather()
      });

      function weather() {
        $.ajax({
          type: "POST",
          url: "{{route('dashboard.weather')}}",
          data: {_token: "{{csrf_token()}}"},
          success: function (response) {
            $('#city').html(response.name + "(" + response.coord.lat + "," + response.coord.lon + ")");
            $('#weather').html(response.weather[0].main);
            $('#weather-desc').text(response.weather[0].description);
            console.log(response);
          }
        });
      }
    </script>
@endpush