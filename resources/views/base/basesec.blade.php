<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" type="image/png" href="{{ asset('/public/images/frontend/favicon.png') }}">

    <meta name="Keywords"
        content="secretaria, produccion, creditos, mipyme, desarrollo, economico, registro, gobierno,entre rios, financiacion" />
    <meta name="description" content="Sistema de registro de emprendimientos productivos" />

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="{{ asset('/public/font-awesome-5.9.0/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('/public/bootstrap-4.3.1/dist/css/bootstrap.min.css') }}">

    @if (Auth::user())

        <link rel="stylesheet" href="{{ asset('/public/DataTables/datatables.min.css') }}">
        <link rel="stylesheet"
            href="{{ asset('/public/DataTables/DataTables-1.10.20/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet"
            href="{{ asset('/public/DataTables/FixedHeader-3.1.6/css/fixedHeader.bootstrap.min.css') }}">

        <link rel="stylesheet" href="{{ asset('/public/select2/dist/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/public/file-input/css/fileinput.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/public/toastr/toastr.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/public/ymzAlert/ymz_box.css') }}">

        <link rel="stylesheet" href="{{ asset('/public/css/style.css') }}">

    @else

        {!! htmlScriptTagJsApi() !!}

        <link rel="stylesheet" href="{{ asset('/public/css/styleFront.css') }}">

    @endif

    @yield('stylesheet')

</head>

<body>

    <div class="container-fluid">

        @include('base.headersec')

        @include('flash::message')

        @yield('breadcrumb')

        @yield('content')

        @include('base.footer')

    </div>


    <!-- jQuery 3.4.1 -->
    <script src="{{ asset('/public/js/jquery-3.4.1.min.js') }}"></script>

    <!-- Bootstrap 4.3.1 -->
    <script src="{{ asset('/public/bootstrap-4.3.1/js/dist/popper.min.js') }}"></script>
    <script src="{{ asset('/public/bootstrap-4.3.1/js/dist/util.js') }}"></script>
    <script src="{{ asset('/public/bootstrap-4.3.1/dist/js/bootstrap.min.js') }}"></script>

    @if (Auth::user())

        <!-- DataTable / DataTable Buttons / DataTable Fixed Header / DataTable Moment -->
        <script src="{{ asset('/public/DataTables/datatables.min.js') }}"></script>
        <script src="{{ asset('/public/DataTables/Buttons-1.6.1/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('/public/DataTables/Buttons-1.6.1/js/buttons.flash.min.js') }}"></script>
        <script src="{{ asset('/public/DataTables/JSZip-2.5.0/jszip.min.js') }}"></script>
        <script src="{{ asset('/public/DataTables/pdfmake-0.1.36/pdfmake.min.js') }}"></script>
        <script src="{{ asset('/public/DataTables/pdfmake-0.1.36/vfs_fonts.js') }}"></script>
        <script src="{{ asset('/public/DataTables/Buttons-1.6.1/js/buttons.print.min.js') }}"></script>
        <script src="{{ asset('/public/DataTables/Buttons-1.6.1/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('/public/DataTables/FixedHeader-3.1.6/js/dataTables.fixedHeader.min.js') }}"></script>
        <script src="{{ asset('/public/DataTables/moment.min.js') }}"></script>
        <script src="{{ asset('/public/DataTables/datetime.js') }}"></script>

        <script src="{{ asset('/public/select2/dist/js/select2.min.js') }}"> </script>

        <script src="{{ asset('/public/toastr/toastr.min.js') }}"> </script>
        <script src="{{ asset('/public/ymzAlert/ymz_box.min.js') }}"> </script>

        <script src="{{ asset('/public/jquery-tabledit-1.2.3/mindmup-editabletable.js') }}"> </script>

    @endif

    <script src="{{ asset('/public/file-input/js/fileinput.min.js') }}"> </script>
    <script src="{{ asset('/public/file-input/js/locales/es.js') }}"> </script>
    <script src="{{ asset('/public/js/scripts.js') }}"> </script>

    @yield('js')

    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}";
            switch(type){
            case 'info':
            toastr.info("{{ Session::get('message') }}", "{{ Session::get('title') }}");
            break;
        
            case 'warning':
            toastr.warning("{{ Session::get('message') }}", "{{ Session::get('title') }}");
            break;
        
            case 'success':
            toastr.success("{{ Session::get('message') }}", "{{ Session::get('title') }}");
            break;
        
            case 'error':
            toastr.error("{{ Session::get('message') }}", "{{ Session::get('title') }}");
            break;
            }
        @endif
    </script>

</body>

</html>
