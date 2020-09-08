<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title>LSP SYSTEM &mdash; @yield('title')</title>

	<!-- General CSS Files -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<!-- CSS Libraries -->
	{{-- <link rel="stylesheet" href="../node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.1/css/select.bootstrap4.min.css">
    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> --}}

	<link rel="stylesheet" href="{{ asset('/assets/modules/select2/dist/css/select2.min.css') }}">
	{{-- <link rel="stylesheet" href="{{ url('../../../../node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
	<link rel="stylesheet" href="{{ url('../../../../node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}"> --}}


	<!-- Template CSS -->
	<link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
	{{-- <link rel="stylesheet" href="{{ url('../assets/css/all.css') }}"> --}}
</head>

<body>
	<div id="app">
		<div class="main-wrapper">
			<div class="navbar-bg"></div>
			<nav class="navbar navbar-expand-lg main-navbar">
				<form class="form-inline mr-auto">
					<ul class="navbar-nav mr-3">
						<li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
						<li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
					</ul>
				</form>
				<ul class="navbar-nav navbar-right">
					<li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
						<img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
						<div class="d-sm-none d-lg-inline-block">Hi, Ujang Maman</div></a>
						<div class="dropdown-menu dropdown-menu-right">
							<div class="dropdown-title">Logged in 5 min ago</div>
							<a href="features-profile.html" class="dropdown-item has-icon">
								<i class="far fa-user"></i> Profile
							</a>
							<div class="dropdown-divider"></div>
							<a href="#" class="dropdown-item has-icon text-danger">
								<i class="fas fa-sign-out-alt"></i> Logout
							</a>
						</div>
					</li>
				</ul>
			</nav>
			<div class="main-sidebar">
				<aside id="sidebar-wrapper">
					<div class="sidebar-brand">
						<a href="{{ route('admin.dashboard') }}">LSP System</a>
					</div>
					<div class="sidebar-brand sidebar-brand-sm">
						<a href="{{ route('admin.dashboard') }}">LSP</a>
					</div>
					<ul class="sidebar-menu">
						<li class="menu-header">Dashboard</li>
						<li class="nav-item">
                            <a href="{{ route('admin.dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
						</li>
						<li class="menu-header">Master</li>
						<li class="nav-item @yield('activeassessor')">
                            <a href="{{ route('admin.assessor.index') }}" class="nav-link "><i class="fas fa-users"></i> <span>Asesor</span></a>
						</li>
						<li class="nav-item @yield('activetuk')">
                            <a href="{{ route('admin.tuk.index') }}" class="nav-link"><i class="fas fa-map-marker-alt"></i> <span>TUK</span></a>
						</li>
						<li class="nav-item @yield('activescheme')">
                            <a href="{{ route('admin.scheme.index') }}" class="nav-link"><i class="fas fa-file-alt"></i> <span>Skema</span></a>
						</li>
						<li class="nav-item @yield('activeelement')">
                            <a href="{{ route('admin.element.index') }}" class="nav-link"><i class="fas fa-file-alt"></i> <span>Elemen</span></a>
						</li>
						<li class="nav-item @yield('activequestion')">
                            <a href="{{ route('admin.question.index') }}" class="nav-link"><i class="fas fa-pen"></i> <span>Ujian Tertulis</span></a>
                        </li>
						<li class="menu-header">Peserta</li>
						<li class="nav-item">
                            <a href="form-01.html" class="nav-link"><i class="fas fa-file"></i> <span>Form APL-01</span></a>
						</li>
						<li class="nav-item">
                            <a href="form-02.html" class="nav-link"><i class="fas fa-copy"></i> <span>Form APL-02</span></a>
						</li>
						<li class="nav-item @yield('activeujian')">
                            <a href="hasil-ujian.html" class="nav-link"><i class="fas fa-archive"></i> <span>Rekap Hasil Ujian</span></a>
						</li>
						<li class="menu-header">Users</li>
						<li class="nav-item @yield('activeusers')">
                            <a href="{{ route('admin.user.index') }}" class="nav-link"><i class="far fa-user"></i> <span>Users</span></a>
						</li>
					</ul>
				</aside>
			</div>

			<!-- Main Content -->
            <div class="main-content">
                @yield('content')
            </div>
			<footer class="main-footer">
				<div class="footer-left">
					Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
				</div>
				<div class="footer-right">
					2.3.0
				</div>
			</footer>
		</div>
	</div>

	<!-- General JS Scripts -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
	 {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.main.js"></script> --}}
  {{-- <script src="../node_modules/select2/dist/js/select2.full.min.js"></script> --}}

  <script src="{{ asset('/assets/modules/select2/dist/js/select2.full.min.js') }}"></script>

	<script src="{{ asset('/assets/js/stisla.js')}}"></script>

	<!-- JS Libraies -->
	{{-- <script src="{{ url('../../../node_modules/datatables/media/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{ url('../../../node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
	<script src="{{ url('../../../node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}"></script> --}}

	<!-- Template JS File -->
	{{-- <script src="{{ asset('../assets/js/all.js')}}"></script> --}}
	<script src="{{ asset('/assets/js/custom.js')}}"></script>

	<!-- Page Specific JS File -->
<script src="{{ asset('/assets/js/page/modules-datatables.js')}}"></script>
</body>
</html>
