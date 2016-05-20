<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="token" content="csrf_token()">

    <title>Vehicle Management</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" >
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset("assets/css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/custom.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/sweetalert.css")}}">

    <link rel="stylesheet" href="{{asset("assets/css/pick-a-color-1.2.3.min.css")}}">

    <style type="text/css">

        .pick-a-color-markup {
            margin:20px 0px;
        }

        /*.container {*/
            /*margin: 0px 5px;*/
            /*width: 50%;*/
        /*}*/

    </style>


</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    <i class="fa fa-car"></i>
                    Vehicle Management
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">

                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                             Welcome    {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
    @if(Session::has("success"))
   <div class="alert alert-success">{{Session::get("success")}}</div>
    @endif

    @if(Session::has("failure"))
    <div class="alert alert-success">{{Session::get("failure")}}</div>
    @endif

    </div>

    @yield('content')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" ></script>
    <script src="{{asset("assets/js/bootstrap.min.js")}}" ></script>
    <script src="{{asset("assets/js/sweetalert.min.js")}}" ></script>
    {{--<script src="{{asset("assets/js/deleter.js")}}" ></script>--}}

    @include('sweet::alert')

    <script src="{{asset("assets/js/tinycolor-0.9.15.min.js")}}"></script>
    <script src="{{asset("assets/js/pick-a-color-1.2.3.min.js")}}"></script>

    <script type="text/javascript">

        $(document).ready(function () {

            $(".pick-a-color").pickAColor();
        });

    </script>


    <!--=========================SCRIPT FOR DELETION CONFIRMATION===================-->
    <script>
        $(".delete-form").on("submit", function(){
            return confirm("Are You Sure You want to delete this Vehicle");
        });
    </script>

</body>
</html>
