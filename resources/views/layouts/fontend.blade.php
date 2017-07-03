<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{!! csrf_token() !!}"/>

    <title>@yield('title') | @lang("general.tieude")</title>

    @yield('header')
    <!-- Bootstrap -->
    <link href="{{ asset("css/bootstrap.min.css") }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset("css/font-awesome.min.css") }}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <!-- <link href="{{ asset("css/gentelella.min.css") }}" rel="stylesheet"> -->

    <link href="{{ asset("css/jquery.datetimepicker.min.css") }}" rel="stylesheet">

    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <!-- <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href= "{{ asset('fontend/css/style.css') }}">
    <link href="{{ asset("css/jquery.datetimepicker.min.css") }}" rel="stylesheet">

    @stack('stylesheets')

</head>

<body>
    @include('includes/fontend_topmenu')
    @include('includes/fontend_search')
    <div class="container body">
        <div class="main_container">
        @yield('content')
        </div>
    </div>
<script type="text/javascript">
(function(d,s,id){var z=d.createElement(s);z.type="text/javascript";z.id=id;z.async=true;z.src="//static.zotabox.com/1/2/12d0042224d138223d645298fd7b3215/widgets.js";var sz=d.getElementsByTagName(s)[0];sz.parentNode.insertBefore(z,sz)}(document,"script","zb-embed-code"));
</script>
</body>

<!-- jQuery -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset("js/bootstrap.min.js") }}"></script>
<!-- Custom Theme Scripts -->
<!-- <script src="{{ asset("js/gentelella.min.js") }}"></script> -->

<script src="{{ asset('js/jssor.slider.mini.js') }}" type="text/javascript"></script>

<script src ="{{ asset('js/jquery.datetimepicker.js') }}" type="text/javascript" ></script>

<script src="{{asset('js/jquery.validate.js')}}"></script>

<script src="{{ asset('vendors/moment/moment.js') }}"></script>

<script src="{{ asset('fontend/js/jquery-latest.js') }}"></script>
<script src="{{ asset('fontend/js/style1.js') }}"></script>
<!-- <script src="{{ asset('fontend/js/jssor.slider-23.0.0.mini.js') }}"></script> -->
<script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
</script>

@stack('scripts')

</body>
</html>