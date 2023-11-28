<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>@yield('title')</title>
		<link rel="icon" type="image/x-icon" href="{{ asset('/public/images/frontend/favicon.ico') }}" />
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

		<link rel="stylesheet" href="{{ asset('/public/font-awesome-5.9.0/css/all.min.css') }}">

        <link rel="stylesheet" href="{{ asset('/public/bootstrap-4.3.1/dist/css/bootstrap.min.css') }}">

        @yield('stylesheet')

        <!-- jQuery 3.4.1 -->
		<script src="{{ asset('/public/js/jquery-3.4.1.min.js') }}"></script>

		<!-- Bootstrap 4.3.1 -->
		<script src="{{ asset('/public/bootstrap-4.3.1/js/dist/popper.min.js') }}"></script>
		<script src="{{ asset('/public/bootstrap-4.3.1/js/dist/util.js') }}"></script>
        <script src="{{ asset('/public/bootstrap-4.3.1/dist/js/bootstrap.min.js') }}"></script>

        <style>

            .second-nav{
                top: 50px;
            }
            body {
                position: relative;
            }
        </style>

	</head>

	<body data-spy="scroll" data-offset="80" data-target=".navbar">

        @include('base.header')

        @yield('content')

	</body>
</html>
