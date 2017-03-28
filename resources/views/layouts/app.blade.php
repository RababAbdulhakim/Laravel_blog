<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.css" rel="stylesheet">
        <style>
            body {
                font-family: 'Lato';
            }

            .fa-btn {
                margin-right: 6px;
            }
            td ,th {
                text-align: left !important;
            }
            .custom-search-form{
                margin-bottom: 54px;
                margin-top: 20px;
            }
            .panel-group a{
                text-decoration: none;
                color: #000;
            }
            .panel ,.panel-default ,.panel-default,.panel-heading {
                background-color: #fff !important;
                border-color: #fff !important;
            }
            .accordion{
                margin-bottom: 30px;
            }
            #logo{
                color: #fff;
                font-size: 35px;
            }
            .readmore {
                color: #ffffff;
                background-color: #37d980;
                border-color: #37d980;
                border-radius:0;
                margin-bottom:10px
            }

            h1, h2, h3, h4, h5, h6 {
                clear: both;
                font-weight: normal; }

            ol, ul {
                list-style: none; }

            .navbar-static-top{
                position: fixed;
                width: 100%;
                text-align: center;
                font-size: 72px;
                height: 72px;
                background: #335C7D;
                color: #fff;
                font-family: 'PT Sans', sans-serif;
                transition: all 0.60s ease;

            }
            .sticky {
                position: fixed;
                font-size: 24px;
                line-height: 48px;
                height: 48px; 
                width: 100%;
                background: #efc47D;
                text-align: left;
                padding-left: 20px;
                transition: all 0.60s ease;

            }
            .sidebar{

                /*    position: fixed;
                        margin-top: 62px;*/


            }
            header nav ul li a {
                line-height: 150px;
                margin-left: 20px;
                color: #fff!important;
                font-weight: 700;
                font-size: 18px;
            }
            header nav a:hover {
                color: white; }


            .footer {
                background-color: #335C7D;
                min-height: 30px;
                width: 100%;
                margin-top: 20px;
                margin-bottom: 5px;
            }
            .copyright {
                color: #fff;
                line-height: 30px;
                min-height: 30px;
                padding: 7px 0;
            }
            .design {
                color: #fff;
                line-height: 30px;
                min-height: 30px;
                padding: 7px 0;
                text-align: right;
            }
            .design a {
                color: #fff;
            }

        </style>
    </head>

    <body id="app-layout">
        <header>
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
                        <a class="navbar-brand" id="logo" href="{{ url('/') }}">
                            Laravel Blog
                        </a>
                    </div>

                    <div class="collapse navbar-collapse container clearfix" id="app-navbar-collapse">
                        <!-- Left Side Of Navbar -->
                        <ul class="nav navbar-nav">
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ route('users.index') }}">Users</a></li>
                            <li><a href="{{ route('roles.index') }}">Roles</a></li>
                            <li><a href="{{ route('posts.index') }}">Posts</a></li>
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                            @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                            @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
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
        </header>
        <div class="container">
            @yield('content')</div>
    </body>
    <footer>
        <div class="footer">

            <div class="container">

                <div class="row">

                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

                        <div class="copyright">

                            © 2015, Laravel, All rights reserved

                        </div>

                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

                        <div class="design">

                            <a href="#">Laravel Blog </a> |  <a target="_blank" href="#">Web Design & Development by Laravel</a>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </footer>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/extensions/export/bootstrap-table-export.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/TableExport/3.2.14/js/tableexport.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Base64/1.0.0/base64.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sprintf/1.0.3/sprintf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script>
$('#ajaxContent').load('/', function () {

    $('.pagination a').on('click', function (event) {

        event.preventDefault();

        if ($(this).attr('href') != '#') {

            $("html, body").animate({scrollTop: 0}, "fast");

            loadPaginatedSelected($(this).attr('href'));

        }

    });

});

function loadPaginatedSelected(url)

{

    $('#ajaxContent').load(url, function () {

        $('.pagination a').on('click', function (event) {

            event.preventDefault();

            if ($(this).attr('href') != '#') {

                $("html, body").animate({scrollTop: 0}, "fast");

                loadPaginatedSelected($(this).attr('href'));

            }

        });

    });

}

$('.srt').click(function () {
    var ty = $(this).data('val');
    var ny = $(this).html();
    $('.ppy').html(ny + ' <span class="caret"></span>');
    if (ty == 'title') {
        $('#search_field').attr('placeholder', 'search_posts_by_title');
    } else if (ty == 'Category') {
        $('#search_field').attr('placeholder', 'search_posts_by_Category');
    }
});
$(window).scroll(function () {
    if ($(this).scrollTop() > 1) {
        $('.navbar-static-top').addClass("sticky");
    }
    else {
        $('.navbar-static-top').removeClass("sticky");
    }
});
    </script>

    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
