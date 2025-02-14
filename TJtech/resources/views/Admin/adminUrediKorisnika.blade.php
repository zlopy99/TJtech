
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TJ-tech</title>

        <!-- CSS -->

        <!-- google fonts -->
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="{{ asset('fontawesome-free-5.15.1-web/css/all.css') }}">

        <!-- files -->
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.theme.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/ionicons.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    </head>
    <body>

    <!-- Site Header -->
        <div class="site-header-bg"> 
            <div class="container">
                <div class="row"> 
                    <div class="col-sm-6">
                        <a href="{{route('adminProfile')}}"><img src="{{ asset('assets/images/logo.png') }}" alt="logo"></a>
                    </div>
                    <div class="col-sm-3 col-sm-offset-3 text-right">

                        <!--Košarica i User-->
                        <div class="admin-dropdown-user">
                            <span style="padding-right: 10px;">{{$LogiraniKorisnikPodaci->Ime_prezime}}</span><button><i class="fas fa-user btn btn-default user"></i></button><br>
                            <ul>
                                <li><a href="{{route('logout')}}">Logout</a></li>
                                <li><a href="{{route('adminUpravljanjeProizvodima')}}">Proizvodi</a></li>
                                <li><a href="{{route('korisniciAdmin')}}">Korisnici</a></li>
                            </ul>
                        </div>

                        <form id="form-data" class="input-group" method="post" data-route="{{ route('search.fetch') }}">
                            {{ csrf_field() }}
                            <input type="text" name="Naziv_proizvoda" id="Naziv_proizvoda" 
                                class="form-control" placeholder="Search..." autocomplete="off"> 
                            <span class="input-group-btn">
                                <button class="btn btn-default btn-robot" type="button">Pretraga</button>
                            </span>
                            <div id="countryList" class="dropdown-menu" style="display:block; position:absolute; background-color: transparent">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
         
    <!-- Header -->

        <section id="header" class="main-header">
            <div class="container">

                <div class="row">
                    <nav class="navbar navbar-default">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#site-nav-bar" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <div class="collapse navbar-collapse" id="site-nav-bar">
                            <ul class="nav navbar-nav">
                                <li><a href="{{route('adminProfile')}}">Početna</a></li>
                                <li><a href="{{route('OnamaAdmin')}}">O nama</a></li>
                                <li><a href="{{route('laptopiAdmin')}}"><b><i><u>Laptopi</u></i></b></a></li>
                                <li><a href="{{route('racunalaAdmin')}}"><b><i><u>Računala</u></i></b></a></li>
                                <li><a href="{{route('opremaAdmin')}}"><b><i><u>Oprema</u></i></b></a></li>
                                <li><a href="{{ asset('assets\TJ-tech, vizija.pdf') }}">Vizija</a></li>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </nav>
                </div>
            </div> <!-- /.container -->
        </section> <!-- /#header -->

    <!-- Proizvodi -->
    
    <section id="dodajKorisnika">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                @foreach($user as $korisnik)
                    <div class="trenutnoStanje">
                        <h1>Ime i prezime:</h1>
                        <h3>{{$korisnik->Ime_prezime}}<!--Ispiši trenutno ime--></h3>
                        <h1>Email:</h1>
                        <h3>{{$korisnik->Email}}<!--Ispiši trenutni email--></h3>
                        <h1>Lozinka:</h1>
                        <h3>{{$korisnik->Lozinka}}<!--Ispiši trenutnu lozinku--></h3>
                    </div>
               
                </div>
                <div class="col-sm-6">
                    <div class="promjenutoStanje">
                    <form action="{{route('promijeniKorisnickoIme')}}" method="POST">
                        @csrf
                            <h1>Novo korisničko ime:</h1>
                            <div class="ime">
                                <label for="ime1">
                                    <input type="hidden" name="id" value="{{$korisnik->korisnik_id}}">
                                    <input type="text" name="ime1">
                                </label>
                                <button id="izmjeniIme" class="btn btn-default btn-robot">Izmjeni</button>
                            </div>
                        </form>
                        <form action="{{route('promijeniImeKorisnika')}}" method="GET">
                        @csrf
                            <h1>Nova email adresa:</h1>
                            <div class="ime">
                                <label for="ime1">
                                    <input type="hidden" name="id" value="{{$korisnik->korisnik_id}}">
                                    <input type="text" name="ime1">
                                </label>
                                <button id="izmjeniIme" class="btn btn-default btn-robot">Izmjeni</button>
                            </div>
                        </form>
                        <form action="{{route('promijeniLozinku')}}" method="POST">
                        @csrf
                            <h1>Nova lozinka:</h1>
                            <div class="ime">
                                <label for="ime2">
                                    <input type="hidden" name="id2" value="{{$korisnik->korisnik_id}}">
                                    <input type="text" name="ime2">
                                </label>
                                <button id="izmjeniLozinku" class="btn btn-default btn-robot">Izmjeni</button>
                            </div>
                        </form>
                        <form action="{{route('ukloniKorisnika')}}" method="POST">
                            <input type="hidden" name="id3" value="{{$korisnik->korisnik_id}}">
                            <h1>Ukloni Korisnika:<span class="imeK"><button  id="ukloniKorisnika" class="btn btn-default btn-robot">Ukloni</button></span></h1>  
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Footer -->
        <section id="footer-widget" class="footer-widget">
            <div class="container header-bg">
                <div class="row">
                    <div class="col-sm-4">
                        <h3>Popularni proizvodi</h3>
                        <ul>
                        <li><a href="{{route('laptopiAdmin')}}#7">NOTEBOOK ACER ASPIRE 3</a></li>
                        <li><a href="{{route('racunalaAdmin')}}#5">RAČUNALO GAMER DIABLO 3600</a></li>
                        <li><a href="{{route('opremaAdmin')}}#22">GAMING STOLICA LC-POWER LC-GC-600BR</a></li>
                        <li><a href="{{route('opremaAdmin')}}#19">SLUŠALICE LOGITECH H650E</a></li>
                    </ul>
                    </div>
                    <div class="col-sm-4">
                        <h3>Programski jezici</h3>
                        <ul>
                            <li><i class="fab fa-js-square" style="font-size: 50px; padding-left: 5px; color: rgb(241, 241, 53);"></i><a href="adminOnama.html" style="padding-left: 20px;"> Java Script</a></li>
                            <li><i class="fab fa-php" style="font-size: 50px; padding-left: 5px; color: purple;"></i><a href="adminOnama.html" style="padding-left: 20px;">PHP</a></li>
                            <li><i class="fas fa-database" style="font-size: 50px; padding-left: 5px; color: #fabe12;"></i><a href="adminOnama.html" style="padding-left: 20px;">SQL Database</a></li>
                            <li><i class="fab fa-html5" style="font-size: 50px; padding-left: 5px; color: orangered;"></i><a href="adminOnama.html" style="padding-left: 20px;">HTML5</a></li>
                            <li><i class="fab fa-css3-alt" style="font-size: 50px; padding-left: 5px; color: blue;"></i><a href="adminOnama.html" style="padding-left: 20px;">CSS3</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4">
                        <h3>Korisne informacije</h3>
                        <ul>
                        <li><a href="{{route('OnamaAdmin')}}">O nama</a></li>
                        <li><a href="{{ asset('assets\TJ-tech, vizija.pdf') }}">Vizija</a></li>
                        <li><a href="{{route('adminProfile')}}">Početna</a></li>
                        <li><a href="{{route('laptopiAdmin')}}">Laptopi</a></li>
                        <li><a href="{{route('racunalaAdmin')}}">Računala</a></li>
                        <li><a href="{{route('opremaAdmin')}}">Oprema</a></li>
                        </ul> 
                    </div>
                </div>
            </div>
        </section>
        <footer class="footer text-center">
            <h3>Copyright &copy; 2021 My Website</h3>
        </footer>

    <!-- Scripts -->
        <script  src="{{ asset('assets/js/jquery-1.12.3.min.js') }}"></script>
        <script  src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script  src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
        <script  src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
        <script  src="{{ asset('assets/js/script.js') }}"></script>
    </body>