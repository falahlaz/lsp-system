<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>LSP SYSTEM &mdash; @yield('title')</title>

	<!-- General CSS Files -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

	@yield('style')

	<!-- Template CSS -->
	<link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/all.css') }}">
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
						<div class="d-sm-none d-lg-inline-block">Hi, {{ $data['user']->username }}</div></a>
						<div class="dropdown-menu dropdown-menu-right">
							<div class="dropdown-title">Logged in 5 min ago</div>
							<a href="" class="dropdown-item has-icon">

							<a href="" class="dropdown-item has-icon">
								<i class="far fa-user"></i> Profile
							</a>
							<div class="dropdown-divider"></div>
							<a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger">
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
						<li class="nav-item @yield('activedashboard')">
                            <a href="{{ route('admin.dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
						</li>
						@if($data['user']->id_position == 1)
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
                            <a href="{{ route('admin.exam.question.index') }}" class="nav-link"><i class="fas fa-pen"></i> <span>Ujian Tertulis</span></a>
						</li>
						@endif
						<li class="menu-header">Peserta</li>
						@if($data['user']->id_position == 1)
						<li class="nav-item @yield('activeapl01')">
                            <a href="{{ route('admin.form.apl01') }}" class="nav-link"><i class="fas fa-file"></i> <span>Form APL-01</span></a>
						</li>
						@endif
						<li class="nav-item @yield('activeapl02')">
                            <a href="{{ route('admin.form.apl02') }}" class="nav-link"><i class="fas fa-copy"></i> <span>Form APL-02</span></a>
						</li>
						@if($data['user']->id_position == 1)
						<li class="nav-item @yield('activeujian')">
                            <a href="{{ route('admin.form.recap') }}" class="nav-link"><i class="fas fa-archive"></i> <span>Rekap Hasil Ujian</span></a>
						</li>
						{{-- <li class="menu-header">Users</li>
						<li class="nav-item @yield('activeusers')">
                            <a href="{{ route('admin.user.index') }}" class="nav-link"><i class="far fa-user"></i> <span>Users</span></a>
						</li> --}}
						@endif
					</ul>
				</aside>
			</div>

			<!-- Main Content -->
            <div class="main-content">
                @yield('content')
            </div>
			<footer class="main-footer">
				<div class="footer-left">
					Copyright &copy; 2020 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
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

	<script src="{{ asset('/assets/js/stisla.js')}}"></script>

	<script src="{{ asset('/assets/js/scripts.js')}}"></script>
	<script src="{{ asset('/assets/js/custom.js')}}"></script>

	@yield('script')
</body>
</html>
