<!DOCTYPE html>
<html lang="FR">

<head>
    <title>DEMANDE ATTESTATION</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
    <link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/png" href="{{asset('img/front/favicon-1.png')}}">
    <link rel="stylesheet" href="{{asset('preloader/preloader.css')}}">
    @toastr_css
    <!-- Font-icon css-->
</head>

<body class="app sidebar-mini">
    <div class="preloader" id="preloader">
        <div class="preloader"></div>
    </div>
    <!-- Navbar-->
    <header class="app-header" ><a class="app-header__logo" style="background-color: #078a36;" href="{{route('dashbord.index')}}">DEM A C</a>
        <!-- Sidebar toggle button-->
        <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
        <!-- Navbar Right Menu-->
        <ul class="app-nav">
            <!-- User Menu-->
            <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
                <ul class="dropdown-menu settings-menu dropdown-menu-right">
                    <li><a class="dropdown-item" href="{{route('logout')}}"><i class="fa fa-sign-out fa-lg "></i> Deconnexion</a></li>
                </ul>
            </li>
        </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar" ></div>
    <aside class="app-sidebar">
        <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="{{asset('img/avatar/avatar.jpg')}}" width="40%">
            <div>
                <p class="app-sidebar__user-name">{{auth()->user()->name}}</p>
                <p class="app-sidebar__user-designation">{{auth()->user()->telephone}}</p>
            </div>
        </div>
        <ul class="app-menu">
            <li ><a class="app-menu__item {{(request()->segment(1)== 'dashboard') ? 'active': ''}}" href="{{route('dashbord.index')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Tableau de bord</span></a></li>
            <li class="dropdown">
                <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="app-menu__icon fa fa-bell"></i><span class="app-menu__label">Demandes</a>
                <ul class="dropdown-menu settings-menu dropdown-menu-right">
                     <li ><a class="app-menu__item {{ (request()->segment(1)== 'nouveaux') ? 'active' : ''}}" href="{{route('admins.demande')}}"><i class="app-menu__icon fa fa-bell"></i><span class="app-menu__label">Nouveaux</span>@if($count_demande>0)<span class="badge badge-danger">{{$count_demande}}</span>@endif</a></li>
                     <li><a class="app-menu__item {{(request()->segment(1)== 'traiter') ? 'active': ''}}" href="{{route('admins.demande.liste')}}"><i class="app-menu__icon fa fa-user-circle-o"></i><span class="app-menu__label">Traités</span></a></li>
                </ul>
            </li>
            @if (Auth::user()->hasPermission('valider'))
            <li><a class="app-menu__item {{(request()->segment(1)== 'prevalidation') ? 'active': ''}}" href="{{route('admins.preValidation')}}"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Pre validation</span></a></li>
            @endif
            <li><a class="app-menu__item {{(request()->segment(1)== 'users') ? 'active': ''}}" href="{{route('admins.utilisateur')}}"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Gestion des utilisateurs</span></a></li>
        </ul>
    </aside>
    @yield('content')
    <!-- Essential javascripts for application to work-->
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{asset('js/plugins/pace.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/plugins/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="{{asset('js/plugins/chart.js')}}"></script>
    <script type="text/javascript">
        var data = {
            labels: ["January", "February", "March", "April", "May"],
            datasets: [{
                label: "My First dataset",
                fillColor: "rgba(220,220,220,0.2)",
                strokeColor: "rgba(220,220,220,1)",
                pointColor: "rgba(220,220,220,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: [65, 59, 80, 81, 56]
            }, {
                label: "My Second dataset",
                fillColor: "rgba(151,187,205,0.2)",
                strokeColor: "rgba(151,187,205,1)",
                pointColor: "rgba(151,187,205,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [28, 48, 40, 19, 86]
            }]
        };
        var pdata = [{
            value: 300,
            color: "#46BFBD",
            highlight: "#5AD3D1",
            label: "Complete"
        }, {
            value: 50,
            color: "#F7464A",
            highlight: "#FF5A5E",
            label: "In-Progress"
        }]

        var ctxl = $("#lineChartDemo").get(0).getContext("2d");
        var lineChart = new Chart(ctxl).Line(data);

        var ctxp = $("#pieChartDemo").get(0).getContext("2d");
        var pieChart = new Chart(ctxp).Pie(pdata);
    </script>
    <script type="text/javascript" src="{{asset('preloader/preloader.js')}}"></script>
    <!-- Google analytics script-->
    <script type="text/javascript">
        if (document.location.hostname == 'pratikborsadiya.in') {
            (function(i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function() {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
            ga('create', 'UA-72504830-1', 'auto');
            ga('send', 'pageview');
        }
    </script>
</body>

</html>
