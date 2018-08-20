<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/template.css') }}" rel="stylesheet">
    <style>
        
    </style>
    @yield('style')
    
</head>
<body>
    <div >
        
    

    <div id="wrapper" class="toggled">
            <!-- -------------------------------- Sidebar  ---------------------------------------------------- -->
       
        <div id="sidebar-wrapper">

            <a href="#menu-toggle" class=" btn barr1" id="menu-toggle"><img src={{asset("images/nav1.png")}} ></a>

            
        
            <ul class="sidebar-nav">
                <h2 class="text-center sidebar-title">GDA</h2>
                <li class="sidebar-brand" >
                    <a href="#">
                        <img class="sidebar-admin-icon" src={{asset("images/admin.png")}}> 
                        <span>
                            @guest
                            @else
                                {{ Auth::user()->nom }} 
                            @endguest
                        </span>
                    </a>
                    <span >Administrateur</span>
                    
                </li>
                <li class="sidebar-line"></li>
                <li class="tableau">
                    <a href={{route("bordView")}}>Tableau de bord</a>
                </li>
                <li class="projet">
                    <a href={{route("projetsView")}}>
                        <span>Projets</span>
                        <span class="glyphicon glyphicon-triangle-bottom sidebar-dropmenu"></span>
                    </a>
                </li>
                <li class="modele">
                    <a href={{route("modelesView")}}>
                        <span>Models</span>
                        <span class="glyphicon glyphicon-triangle-bottom sidebar-dropmenu"></span>
                    </a>
                </li>
                <li class="document">
                    <a href={{route("documentsView")}}>
                        <span>Documents</span>
                        <span class="glyphicon glyphicon-triangle-bottom sidebar-dropmenu"></span>
                    </a>
                </li>
                <li class="client">
                    <a href={{route("clientsView")}}>
                        <span>Clients</span>
                        <span class="glyphicon glyphicon-triangle-bottom sidebar-dropmenu"></span>
                    </a>
                </li>
                <li class="paiment">
                    <a href={{route("paimentsView")}}>
                        <span>Paiements</span>
                        <span class="glyphicon glyphicon-triangle-bottom sidebar-dropmenu"></span>
                    </a>
                </li>
            </ul>
        </div>
            
            <!-- -------------------------------- Topbar  ---------------------------------------------------- -->


        <div class="topbar" >

            <div style="position:absolute; top:5px; right:80px;" id="done" >
                
            </div>
        
            <div class="text-right">
                @guest
                
                    <li><a href="{{ route('login') }}">Login</a></li>

                @else

                    <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->nom }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                @endguest

            </div>
        </div>

        <!-- <div  class="container">
                <div class="row">
                    <div class=" col-2">
                        <div class="stat">
                            <h5>Projets en cours</h5>
                            <h1 class="data">15</h1>
                        </div>
                        <div  class="stat-devider"></div>
                    </div>

                    <div class=" col-2">
                        <div class="stat">
                            <h5>Projets clôturés</h5>
                            <h1 class="data">08</h1>
                        </div>
                        <div class="stat-devider"></div>
                    </div>

                    <div class=" col-2">
                        <div class="stat">
                            <h5>Projets Annulés</h5>
                            <h1 class="data">01</h1>
                        </div>
                        <div class="stat-devider"></div>
                    </div>

                    <div class=" col-2">
                        <div class="stat">
                            <h5>Models de documents</h5>
                            <h1 class="data">17</h1>
                        </div>
                        <div class="stat-devider"></div>
                    </div>

                    <div class=" col-2">
                        <div class="stat">
                            <h5>Documents remplis</h5>
                            <h1 class="data">37</h1>
                        </div>
                        <div class="stat-devider"></div>
                    </div>

                    <div class=" col-2">
                        <div class="stat">
                            <h5>Projets en cours</h5>
                            <h1 class="data">21</h1>
                        </div>
                    </div>
                    <div class="clearfix clearfix-margin"></div>
                </div>
        </div> -->

        
            <a href="#menu-toggle" class="none btn barr2" ><img src={{asset("images/nav2.png")}} ></a>
                
                <div class="contanier" >
                    @yield('content')
                </div>


    </div>


</div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    {{-- <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script> --}}
    @yield('script')
    <script>

        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });

        $(".barr1").click(function(){

            $(".barr2").removeClass("none");
            $("#topH").css("padding-left","50px");
        });

        $(".barr2").click(function(){
            $("#menu-toggle").click();
            $(".barr2").addClass("none");
            $("#topH").css("padding-left","10px");
            
        });
        
        function done(){

            
            $("#done , modal-header").append('<div  class="alert alert-success" role="alert">l\'operation est terminé avec succes <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            setTimeout(() => {

                $("#done .close").click();
            },5000 );
        }

    </script>
</body>
</html>
