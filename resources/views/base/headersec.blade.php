<div class="container">

    <div class="row pb-3">
        <div class="col-xs-4 col-md-3 col-lg-3 text-center">
            <img class=" img-fluid" src="{{ asset('images/frontend/cabecera.png')}}" alt="Desarrollo Económico" />
        </div>
        <div class="col-xs-8 col-md-9 col-lg-9 text-center">
        </div>
    </div>

    <nav id="navbar_top" class="navbar navbar-expand-lg navbar-dark bg-dark favenir pb-3">

        <a id="navbar_top-brand" class="navbar-brand d-none" href="#">
            <img src="{{ asset('images/frontend/logo_er.png')}}" alt="logo" style=" width:40px">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="{{ url('somos') }}" class="nav-link">
                        SOMOS
                    </a>
                </li>
            </ul>
        </div>
    </nav>

</div>