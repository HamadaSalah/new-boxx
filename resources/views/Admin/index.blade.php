@extends('Admin.master')
@section('content')
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6" style="padding-top: 20px">
            <div class="card card-stats">
              <div class="card-header card-header-success card-header-icon">
                <div class="card-icon green">
                    <i class="nc-icon nc-layers-3"></i>
                </div>
                <p class="card-category" style="font-weight:bold"> Collection</p>
                <h3 class="card-title">{{Collections()}}
                </h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <a href="{{route('admin.collections.index')}}">See All Collection</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6"  style="padding-top: 20px">
            <div class="card card-stats">
              <div class="card-header card-header-success card-header-icon">
                <div class="card-icon yellow">
                    <i class="nc-icon nc-grid-45"></i>
                </div>
                <p class="card-category" style="font-weight:bold"> Products</p>
                <h3 class="card-title">{{Products()}}
                </h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <a href="{{route('admin.products.index')}}">See All Products</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6" style="padding-top: 20px">
            <div class="card card-stats">
              <div class="card-header card-header-success card-header-icon">
                <div class="card-icon cayan" >
                    <i class="nc-icon nc-app"></i>
                </div>
                <p class="card-category" style="font-weight:bold"> Boxes</p>
                <h3 class="card-title">{{Boxes()}}
                </h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <a href="{{route('admin.boxes.index')}}">See All Boxes</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6" style="padding-top: 20px">
            <div class="card card-stats">
              <div class="card-header card-header-success card-header-icon">
                <div class="card-icon paruple" >
                    <i class="nc-icon nc-bullet-list-67"></i>
                </div>
                <p class="card-category" style="font-weight:bold"> Categories</p>
                <h3 class="card-title">{{Cats()}}
                </h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <a href="{{route('admin.category.index')}}">See All Categories</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6" style="padding-top: 20px">
            <div class="card card-stats">
              <div class="card-header card-header-success card-header-icon">
                <div class="card-icon blue" >
                    <i class="nc-icon nc-globe-2"></i>
                </div>
                <p class="card-category" style="font-weight:bold"> Brand</p>
                <h3 class="card-title">{{Brands()}}
                </h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <a href="{{route('admin.brand.index')}}">See All Brand</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6" style="padding-top: 20px">
            <div class="card card-stats">
              <div class="card-header card-header-success card-header-icon">
                <div class="card-icon red" >
                    <i class="nc-icon nc-cart-simple"></i>
                </div>
                <p class="card-category" style="font-weight:bold"> Orders</p>
                <h3 class="card-title">{{Orders()}}
                </h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <a href="{{route('admin.orders.index')}}">See All Orders</a>
                </div>
              </div>
            </div>
          </div>
          <div id="container" style="width: 75%;">
            <canvas id="canvas"></canvas>
            </div>

    </div>
    @if (auth()->user()->unreadNotifications->count()>0)
    <audio controls autoplay style="opacity: 0; display: contents;">
     <source src="{{asset('noty/noty.wav')}}" type="audio/wav"  >
     Your browser does not support the audio element.
     </audio>
    @endif

@push('custom-scripts')
<script src="http://www.chartjs.org/dist/2.7.3/Chart.bundle.js"></script>
<script src="http://www.chartjs.org/samples/latest/utils.js"></script>
<script>
        var chartdata = {
    type: 'bar',
    data: {
    labels: <?php echo json_encode(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Augt', 'Sep', 'Oct', 'Nov', 'Dec']); ?>,
    // labels: month,
    datasets: [
    {
    label: 'this year',
    backgroundColor: '#26B99A',
    borderWidth: 1,
    data: {{mothly()}}
    }
    ]
    },


    options: {
        animations: {
      y: {
        easing: 'easeInOutElastic',
        from: (ctx) => {
          if (ctx.type === 'data') {
            if (ctx.mode === 'default' && !ctx.dropped) {
              ctx.dropped = true;
              return 0;
            }
          }
        }
      }
    },

    scales: {
    yAxes: [{
    ticks: {
    beginAtZero:true
    }
    }]
    }
    }
    }
    var ctx = document.getElementById('canvas').getContext('2d');
    new Chart(ctx, chartdata);
    </script>

</script>

@endpush
@endsection
