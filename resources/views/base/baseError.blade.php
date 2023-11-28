<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('/public/images/frontend/favicon.ico') }}" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <meta name="Keywords"
        content="secretaria, produccion, creditos, mipyme, desarrollo, economico, registro, gobierno,entre rios, financiacion" />
    <meta name="description" content="Sistema de registro de emprendimientos productivos" />


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

    @endif

    <link rel="stylesheet" href="{{ asset('/public/css/style.css') }}">

    @yield('stylesheet')

    <script>
        window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token()]); ?>
    </script>

    {!! htmlScriptTagJsApi() !!}

</head>

<body>

    <div class="container-fluid">

        @include('base.header')

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
        <script src="{{ asset('/public/file-input/js/fileinput.min.js') }}"> </script>
        <script src="{{ asset('/public/toastr/toastr.min.js') }}"> </script>
        <script src="{{ asset('/public/ymzAlert/ymz_box.min.js') }}"> </script>

        <script src="{{ asset('/public/js/scripts.js') }}"> </script>

    @endif

    @yield('js')

</body>

</html>
