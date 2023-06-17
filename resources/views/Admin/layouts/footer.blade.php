</body>
<script src="{{ asset('assets/js/core/jquery.3.2.1.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/js/core/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/js/plugins/bootstrap-switch.js')}}"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<script src="{{ asset('assets/js/plugins/chartist.min.js')}}"></script>
{{-- <script src="{{ asset('assets/js/plugins/bootstrap-notify.js')}}"></script> --}}
<script src="{{ asset('assets/js/light-bootstrap-dashboard.js?v=2.0.0 ')}}" type="text/javascript"></script>
<script src="{{ asset('assets/js/demo.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        demo.initDashboardPageCharts();

        demo.showNotification();

    $('.alert-success').delay(500).fadeOut('slow');
    });
</script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.js"></script>
<script>
    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap4'
    });
</script>
<script>
    setTimeout(function() {
    $('.alert').animate({top: '-600px'});
    $('.alert').fadeOut('4000');
}, 3000); // <-- time in milliseconds

</script>
<script>

    $(".notifyLink").click(function(event){
        $('.notification').hide();
        $.ajax({
          url: '/admin/readAllNotification',
          type:"get",
          data:{
            "_token": "{{ csrf_token() }}",
          },
          success: AjaxSucceeded,
            error: AjaxFailed

         });
         function AjaxSucceeded(result) {
        $t.html('ADD TO CART <i class="far fa-check-circle"></i>');
            $('.notification').hide();
        }

        function AjaxFailed(result) {
            alert("Failed Hamada");
        }

    });
  </script>
<script>
    $(document).ready( function () {
    $('#myDTable').DataTable();
} );
</script>
@stack('custom-scripts')
@livewireScripts
</html>
