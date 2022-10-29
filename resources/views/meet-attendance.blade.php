@extends('layouts.base')
@section('title', 'Peserta Rapat')

@section('css')
    <!-- CSS Files -->

@endsection


@section('content')
<div class="main-container">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4>Form Peserta Rapat</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('meet.index') }}">Data Rapat</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Form Peserta Rapat</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Bootstrap Switchery Start -->
                <div class="col-md-12 col-sm-12 mb-30">
                    <div class="pd-20 card-box height-100-p">
                        <div class="clearfix mb-30">
                            <div class="pull-left">
                                <h4 class="text-blue h4">Peserta Rapat {{ $meet->name }}</h4>
                                <p class="font-14 ml-0">Mulai {{ $meet->begin.' Sampai '.$meet->end }}</p>
                            </div>
                        </div>

                        <div class="pb-20">
                            <table class="table stripe hover nowrap" id="example">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Waktu</th>
                                        <th>Nama Pegawai</th>
                                        <th>Status</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->time }}</td>
                                            <td>{{ $item->user->fullname }}</td>
                                            <td>{{ $item->status }}</td>    
                                        </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
                <!-- Bootstrap Switchery End -->
                <!-- Bootstrap Tags Input Start -->
                {{-- <div class="col-md-4 col-sm-12 mb-30">
                    <div class="pd-20 card-box height-100-p">
                        <div class="clearfix mb-30">
                            <div class="pull-left">
                                <h4 class="text-blue h4">Form Peserta Rapat</h4>
                            </div>
                        </div>
                       
                        <form action="{{ route('meet-attendance.store') }}" method="POST">
                            @csrf
                            <div class="form-group ">
                                <label >Pilih Pegawai</label>
                                <select class="custom-select col-12" name="user_id">
                                    <option selected="">Choose...</option>
                                    @foreach ($users as $item)
                                        <option value="{{ $item->id }}">{{ $item->fullname }}</option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                  <small class="mt-2 text-danger">{{ $message }}</small>
                                @enderror
                            </div>
    
                            <div class="form-group">
                                <label>Waktu</label>
                                <input name="time" class="form-control datetimepicker" placeholder="waktu kehadiran" type="text">
                                @error('time')
                                  <small class="mt-2 text-danger">{{ $message }}</small>
                                @enderror
                            </div>
    
                            <input name="meet_id" class="form-control" placeholder="waktu rapat dimulai" type="text" hidden value="{{  $meet->id }}">
    
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit Form</button>
    
                           
                        </form>
                    </div>
                </div> --}}
                <!-- Bootstrap Tags Input End -->
            </div>
            {{-- @livewire('wire-meet-form', ['meet' => $meet]) --}}
        
    </div>
</div>
@endsection

@section('js')

    @include('utils.toastr')
   
    <script>
        $(document).ready(function() {
            // $(".datetimepicker").datepicker({
            //         timepicker:!0,
            //         startDate: new Date(),
            //         language:"en",
            //         autoClose:!0,
            //         dateFormat:"dd/mm/yyyy"

            // }).on('dp.change', function (e) {  
            //     // alert('hahhahaha');
            //     console.log(e);
            // });
        });
    </script>
    
    @stack('script')

    
@endsection
