@extends('layouts.base')
@section('title', 'Rapat')

@section('css')
    <!-- CSS Files -->

    <!-- CSS -->
	{{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/styles/core.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/styles/icon-font.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/datatables/css/responsive.bootstrap4.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/styles/style.css') }}"> --}}

    <!-- switchery css -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/switchery/switchery.min.css') }}">

@endsection


@section('content')
<div class="main-container">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4>Data Rapat</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Data Rapat</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            {{-- @livewire('wire-meet') --}}

            <!-- Simple Datatable start -->
				
				
				<!-- Checkbox select Datatable start -->
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
									<th>Status</th>
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
                                        <td>

									    <input  type="checkbox" {{ $item->status == 1 ? 'checked' : '' }} {{ $item->status == 1 ? 'disabled' : '' }} class="switch-btn" data-color="#0099ff" data-id="{{ $item->id }}">
                                            
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                    <i class="dw dw-more"></i>
                                                </a>

                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                    <a class="dropdown-item" href="{{ route('meet.show', $item) }}" ><i class="dw dw-eye"></i> View</a>
                                                    <a class="dropdown-item" href="{{ route('meet-attendance.index', $item) }}" ><i class="dw dw-agenda1"></i> Peserta Rapat</a>

                                                    @if ($item->status != 1)
                                                        <a class="dropdown-item" href="{{ route('meet-result.index', $item) }}" ><i class="dw dw-list"></i> Hasil Rapat</a>
                                                        <a class="dropdown-item" href="{{ route('meet.edit', $item) }}"><i class="dw dw-edit2"></i> Edit</a>
                                                    @endif
                                                    

                                                    <a class="dropdown-item delete" id="delete" href="#" data-id="{{ $item->id }}"><i class="dw dw-delete-3"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                        
                                    </tr>
                                @endforeach
                                
							</tbody>
						</table>
					</div>
				</div>
				<!-- Checkbox select Datatable End -->

                
    </div>

    <div class="modal fade bs-example-modal-lg" id="bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">QRcode Rapat</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body text-center">
                    <p>
                        {!! QrCode::size(350)->generate('hahahhaha') !!}
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

    @include('utils.toastr')

    @stack('script')

    <!-- switchery js -->
	<script src="{{ asset('assets/src/plugins/switchery/switchery.min.js') }}"></script>
	{{-- <script src="{{ asset('assets/vendors/scripts/advanced-components.js') }}"></script> --}}


    <script>
        $(document).ready(function() {
            $('.delete').click(function() {

                // alert('hahahha');
                var data = $(this).attr('data-id');
                // swal({
                //         title: "Anda yakin?",
                //         text: "Anda akan menghapus data ini!",
                //         icon: "warning",
                //         buttons: true,
                //         dangerMode: true,
                //     })
                //     .then((willDelete) => {
                //         if (willDelete) {
                //             window.location = "penyakits/delete/" + data;
                //         } else {
                //             swal("Your data is safe!");
                //         }
                //     });

                Swal.fire({
                    title: 'Are you sure ?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "meet/delete/";
                    }
                });
      
      
            });

            $('.switch-btn').each(function() {
			    new Switchery($(this)[0], $(this).data());
		    });

            $('.switch-btn').change(function() {

                var data = $(this).attr("data-id");
                var isChecked = $(this).is(":checked");

                Swal.fire({
                    title: 'Are you sure ?',
                    text: "apakah rapat telah selesai ? "+data,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, selesai!',
                    cancelButtonText:'belum'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "meet/status/" + data;
                    }else{
                        window.location = "meet";


                    }
                });
		    });

            
        });
    </script>

    <!-- js -->
	{{-- <script src="{{ asset('assets/vendors/scripts/core.js') }}"></script>
	<script src="{{ asset('assets/vendors/scripts/script.min.js') }}"></script>
	<script src="{{ asset('assets/vendors/scripts/process.js') }}"></script>
	<script src="{{ asset('assets/vendors/scripts/layout-settings.js') }}"></script>
	<script src="{{ asset('assets/src/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('assets/src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('assets/src/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
	<script src="{{ asset('assets/src/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script> --}}
    <!-- Datatable Setting js -->
	{{-- <script src="{{ asset('assets/vendors/scripts/datatable-setting.js') }}"></script> --}}


    
@endsection
