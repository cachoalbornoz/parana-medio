<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>@yield('title')</title>
		<link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />

        <!--- <link rel="stylesheet" href="{{ public_path('bootstrap-4.3.1/dist/css/bootstrap.min.css') }}"> -->


		<style>

			@page { margin: 0px 0px; }

            body {
                margin-top: 2.5cm;
                margin-left: 2cm;
                margin-right: 2cm;
                margin-bottom: 2cm;
				font-size: 8;
				font-family: sans-serif;
            }

            header {
				line-height: 0.6cm;
                position: fixed;
                top: 0.7cm;
                left: 2cm;
                right: 2cm;
                height: 4cm;
            }

            footer {
                position: fixed;
                bottom: 0cm;
                left: 2cm;
                right: 2cm;
                height: 2cm;
            }

			footer .page:after {
				content: counter(page);
			}

			.page-break {
				page-break-after: always;
			}

		</style>


	</head>
	<body>

		@include('base.header-pdf')

		@yield('content')

		@include('base.footer-pdf')

	</body>
</html>
