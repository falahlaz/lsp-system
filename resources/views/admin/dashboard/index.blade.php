@extends('admin.app')
@section('title','Dashboard')
@section('activedashboard','active')
@section('content')
    <section class="section">
		<div class="section-header">
			<h1>Dashboard</h1>
			<div class="section-header-breadcrumb">
				<div class="breadcrumb-item"><a href="#">Dashboard</a></div>
			</div>
        </div>
        <div class="section-body">
			<div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card card-statistic-2">
                        <div class="card-icon shadow-primary bg-primary">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Jumlah TUK</h4>
                            </div>
                            <div class="card-body">
                                {{ $data['count_tuk'] }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card card-statistic-2">
                        <div class="card-icon shadow-primary bg-primary">
                            <i class="fas fa-user-friends"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Jumlah Asesor</h4>
                            </div>
                            <div class="card-body">
                                {{ $data['count_asesor'] }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card card-statistic-2">
                        <div class="card-icon shadow-primary bg-primary">
                            <i class="fas fa-edit"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Jumlah Peserta</h4>
                            </div>
                            <div class="card-body">
                                {{ $data['count_participant'] }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if($data['user']->id_position === 1)
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Skema Dengan Uji Terbanyak</h4>
                        <div class="card-header-action">
                            <a href="{{ route('admin.scheme.index') }}" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive table-invoice">
                            <table class="table table-striped">
                                <tr>
                                    <th>#</th>
                                    <th>Kode</th>
                                    <th>Skema</th>
                                    <th>Total Uji</th>
                                </tr>
                                @foreach ($data['scheme'] as $scheme)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="font-weight-600"><a href="{{ route('admin.scheme.edit', ['scheme' => $scheme->id_scheme]) }}">{{ $scheme->code }}</a></td>
                                    <td>{{ $scheme->name }}</td>
                                    <td>{{ $scheme->total }}</td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-md-4">
                <div class="card card-hero">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="far fa-question-circle"></i>
                        </div>
                        <h4>14</h4>
                        <div class="card-description">Customers need help</div>
                    </div>
                    <div class="card-body p-0">
                        <div class="tickets-list">
                            <a href="#" class="ticket-item">
                                <div class="ticket-title">
                                    <h4>My order hasn't arrived yet</h4>
                                </div>
                                <div class="ticket-info">
                                    <div>Laila Tazkiah</div>
                                    <div class="bullet"></div>
                                    <div class="text-primary">1 min ago</div>
                                </div>
                            </a>
                            <a href="#" class="ticket-item">
                                <div class="ticket-title">
                                    <h4>Please cancel my order</h4>
                                </div>
                                <div class="ticket-info">
                                    <div>Rizal Fakhri</div>
                                    <div class="bullet"></div>
                                    <div>2 hours ago</div>
                                </div>
                            </a>
                            <a href="#" class="ticket-item">
                                <div class="ticket-title">
                                    <h4>Do you see my mother?</h4>
                                </div>
                                <div class="ticket-info">
                                    <div>Syahdan Ubaidillah</div>
                                    <div class="bullet"></div>
                                    <div>6 hours ago</div>
                                </div>
                            </a>
                            <a href="features-tickets.html" class="ticket-item ticket-more">
                                View All <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
        @endif
    </div>
</section>
@endsection
