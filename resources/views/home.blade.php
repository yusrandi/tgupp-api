@extends('layouts.base')
@section('title', 'Dashboard')

@section('css')
    <!-- CSS Files -->

@endsection

@section('breadcrumb')
   
@endsection

@section('content')
<div class="main-container">
		<div class="pd-ltr-20">
			<div class="card-box pd-20 height-100-p mb-30">
				<div class="row align-items-center">
					<div class="col-md-4">
						<img src="{{ asset('assets/vendors/images/banner-img.png') }}" alt="">
					</div>
					<div class="col-md-8">
						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							Welcome back <div class="weight-600 font-30 text-blue">Johnny Brown!</div>
						</h4>
						<p class="font-18 max-width-600">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde hic non repellendus debitis iure, doloremque assumenda. Autem modi, corrupti, nobis ea iure fugiat, veniam non quaerat mollitia animi error corporis.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart"></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0">{{ $jabatan }}</div>
								<div class="weight-600 font-14">Jabatan</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart2"></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0">{{ $pegawai }}</div>
								<div class="weight-600 font-14">Pegawai</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart3"></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0">{{ $admin }}</div>
								<div class="weight-600 font-14">Admin</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart4"></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0">{{ $rapat }}</div>
								<div class="weight-600 font-14">Rapat</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="card-box mb-30 pd-20">
				<div class="pull-left">
					<h4 class="text-blue h4">Tabel Rapat</h4>
					<p class="mb-30">Data semua jadwal rapat</p>
				</div>
				<div class="pull-right">
					<a  href="{{ route('meet.create') }}" class="btn btn-primary btn-sm scroll-click collapsed" ><i class="fa fa-plus"></i> Tambah Data</a>
				</div>

				<div class="pb-20">
					<table class="table stripe hover nowrap" id="example">
						<thead>
							<tr>
								<th>#</th>
								<th>Nama Rapat</th>
								<th>Mulai Rapat</th>
								<th>Akhir Rapat</th>
								<th>Tempat</th>
								<th>Salary</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($data as $item)
								<tr>
									<td>{{ $loop->iteration }}</td>
									<td>{{ $item->name }}</td>
									<td>{{ $item->begin }}</td>
									<td>{{ $item->end }}</td>
									<td>{{ $item->place }}</td>
									<td>{{ $item->salary }}</td>
									<td>
										<a class="dropdown-item" href="{{ route('meet.show', $item) }}" ><i class="dw dw-eye"></i> View</a>

									</td>
									
								</tr>
							@endforeach
							
						</tbody>
					</table>
				</div>
			</div>
			@include('layouts.footer')
		</div>
	</div>
@endsection

@section('js')
    
@endsection
