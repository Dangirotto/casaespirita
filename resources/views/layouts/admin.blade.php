
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Portal Espírita - Admin</title>
    <!-- Bootstrap core CSS-->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    {{--<link href="/css/dataTables.bootstrap4.css" rel="stylesheet">--}}
    <!-- Custom styles for this template-->
    <link href="/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/chat.css">
    {{-- Ícones para a página --}}
    <link rel="icon" href="/Ico_INEA.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="/Ico_INEA.ico" type="image/x-icon" />
    {{--WYSIWYG Editor for textareas--}}
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
    {{-- Ícones para a página --}}
    <link rel="icon" href="../images/Portal.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="../images/Portal.ico" type="image/x-icon" />
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="/">Portal Espírita - Ir para página</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Início">
                <a class="nav-link" href="/admin">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">Início</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Artigos/Notícias">
                <a class="nav-link" href="{{route('admin.artigos.index')}}">
                    <i class="fa fa-fw fa-file"></i>
                    <span class="nav-link-text">Artigos/Notícias</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Videos">
                <a class="nav-link" href="{{route('admin.videos.index')}}">
                    <i class="fa fa-fw fa-video-camera"></i>
                    <span class="nav-link-text">Videos</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Doutrina">
                <a class="nav-link" href="{{route('admin.doutrinas.index')}}">
                    <i class="fa fa-fw fa-sun-o"></i>
                    <span class="nav-link-text">Doutrina</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Livros">
                <a class="nav-link" href="#">
                    <i class="fa fa-fw fa-book"></i>
                    <span class="nav-link-text">Livros</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Casas/Estudos">
                <a class="nav-link" href="#">
                    <i class="fa fa-fw fa-edit"></i>
                    <span class="nav-link-text">Casas/Estudos</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Meu calendário">
                <a class="nav-link" href="{{route('admin.calendario.index')}}">
                    <i class="fa fa-fw fa-calendar"></i>
                    <span class="nav-link-text">Meu calendário</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Atendimento Fraterno">
                <a class="nav-link" href="{{route('admin.atendimento.index')}}">
                    <i class="fa fa-fw fa-users"></i>
                    <span class="nav-link-text">Atendimento Fraterno</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Mensagens">
                <a class="nav-link" href="{{route('admin.contato.index')}}">
                    <i class="fa fa-fw fa-envelope"></i>
                    <span class="nav-link-text">Mensagens</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Usuários">
                <a class="nav-link" href="{{route('admin.usuarios.index')}}">
                    <i class="fa fa-fw fa-user"></i>
                    <span class="nav-link-text">Usuários</span>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            {{--<li class="nav-item dropdown">--}}
            {{--<a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
            {{--<i class="fa fa-fw fa-envelope"></i>--}}
            {{--<span class="d-lg-none">Messages--}}
            {{--<span class="badge badge-pill badge-primary">12 New</span>--}}
            {{--</span>--}}
            {{--<span class="indicator text-primary d-none d-lg-block">--}}
            {{--<i class="fa fa-fw fa-circle"></i>--}}
            {{--</span>--}}
            {{--</a>--}}
            {{--<div class="dropdown-menu" aria-labelledby="messagesDropdown">--}}
            {{--<h6 class="dropdown-header">New Messages:</h6>--}}
            {{--<div class="dropdown-divider"></div>--}}
            {{--<a class="dropdown-item" href="#">--}}
            {{--<strong>David Miller</strong>--}}
            {{--<span class="small float-right text-muted">11:21 AM</span>--}}
            {{--<div class="dropdown-message small">Hey there! This new version of SB Admin is pretty awesome! These messages clip off when they reach the end of the box so they don't overflow over to the sides!</div>--}}
            {{--</a>--}}
            {{--<div class="dropdown-divider"></div>--}}
            {{--<a class="dropdown-item" href="#">--}}
            {{--<strong>Jane Smith</strong>--}}
            {{--<span class="small float-right text-muted">11:21 AM</span>--}}
            {{--<div class="dropdown-message small">I was wondering if you could meet for an appointment at 3:00 instead of 4:00. Thanks!</div>--}}
            {{--</a>--}}
            {{--<div class="dropdown-divider"></div>--}}
            {{--<a class="dropdown-item" href="#">--}}
            {{--<strong>John Doe</strong>--}}
            {{--<span class="small float-right text-muted">11:21 AM</span>--}}
            {{--<div class="dropdown-message small">I've sent the final files over to you for review. When you're able to sign off of them let me know and we can discuss distribution.</div>--}}
            {{--</a>--}}
            {{--<div class="dropdown-divider"></div>--}}
            {{--<a class="dropdown-item small" href="#">View all messages</a>--}}
            {{--</div>--}}
            {{--</li>--}}
            {{--<li class="nav-item dropdown">--}}
            {{--<a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
            {{--<i class="fa fa-fw fa-bell"></i>--}}
            {{--<span class="d-lg-none">Alerts--}}
            {{--<span class="badge badge-pill badge-warning">6 New</span>--}}
            {{--</span>--}}
            {{--<span class="indicator text-warning d-none d-lg-block">--}}
            {{--<i class="fa fa-fw fa-circle"></i>--}}
            {{--</span>--}}
            {{--</a>--}}
            {{--<div class="dropdown-menu" aria-labelledby="alertsDropdown">--}}
            {{--<h6 class="dropdown-header">New Alerts:</h6>--}}
            {{--<div class="dropdown-divider"></div>--}}
            {{--<a class="dropdown-item" href="#">--}}
            {{--<span class="text-success">--}}
            {{--<strong>--}}
            {{--<i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>--}}
            {{--</span>--}}
            {{--<span class="small float-right text-muted">11:21 AM</span>--}}
            {{--<div class="dropdown-message small">This is an automated server response message. All systems are online.</div>--}}
            {{--</a>--}}
            {{--<div class="dropdown-divider"></div>--}}
            {{--<a class="dropdown-item" href="#">--}}
            {{--<span class="text-danger">--}}
            {{--<strong>--}}
            {{--<i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>--}}
            {{--</span>--}}
            {{--<span class="small float-right text-muted">11:21 AM</span>--}}
            {{--<div class="dropdown-message small">This is an automated server response message. All systems are online.</div>--}}
            {{--</a>--}}
            {{--<div class="dropdown-divider"></div>--}}
            {{--<a class="dropdown-item" href="#">--}}
            {{--<span class="text-success">--}}
            {{--<strong>--}}
            {{--<i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>--}}
            {{--</span>--}}
            {{--<span class="small float-right text-muted">11:21 AM</span>--}}
            {{--<div class="dropdown-message small">This is an automated server response message. All systems are online.</div>--}}
            {{--</a>--}}
            {{--<div class="dropdown-divider"></div>--}}
            {{--<a class="dropdown-item small" href="#">View all alerts</a>--}}
            {{--</div>--}}
            {{--</li>--}}
            {{--<li class="nav-item">--}}
            {{--<form class="form-inline my-2 my-lg-0 mr-lg-2">--}}
            {{--<div class="input-group">--}}
            {{--<input class="form-control" type="text" placeholder="Search for...">--}}
            {{--<span class="input-group-append">--}}
            {{--<button class="btn btn-primary" type="button">--}}
            {{--<i class="fa fa-search"></i>--}}
            {{--</button>--}}
            {{--</span>--}}
            {{--</div>--}}
            {{--</form>--}}
            {{--</li>--}}
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-fw fa-sign-out"></i>Logout</a>
            </li>
        </ul>
    </div>
</nav>
<div class="content-wrapper">

    @yield('content')

    <footer class="sticky-footer">
        <div class="container">
            <div class="text-center">
                <small>Copyright © Portal Espírita 2018</small>
            </div>
        </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Fazer logout?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Tem certeza que deseja fazer logout?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="{{ url('/logout') }}">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="/js/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    {{--<script src="/js/Chart.min.js"></script>--}}
    {{--<script src="/js/jquery.dataTables"></script>--}}
    {{--<script src="/js/dataTables.bootstrap4"></script>--}}
<!-- Custom scripts for all pages-->
    <script src="/js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    {{--<script src="/js/sb-admin-datatables.min.js"></script>--}}
    {{--<script src="/js/sb-admin-charts.min.js"></script>--}}
    @yield('scripts')
</div>
</body>

</html>
