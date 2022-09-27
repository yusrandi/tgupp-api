@extends('layouts.base')
@section('title', 'Form User')

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
                            <h4>Form Rapat</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('meet.index') }}">Data Rapat</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Form Rapat</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Bootstrap Switchery Start -->
                <div class="col-md-6 col-sm-12 mb-30">
                    <div class="pd-20 card-box height-100-p">
                        <div class="clearfix mb-30">
                            <div class="pull-left">
                                <h4 class="text-blue h4">Form Rapat </h4>
                            </div>
                        </div>
                        <form action="{{ $status == 'edit' ? route('meet.update', $meet) : route('meet.store') }}" method="POST">
                            @csrf

                            @if ($status == 'edit')
                                @method('PUT')                            
                            @endif

                            <div class="form-group">
                                <label>Nama Rapat</label>
                                <input name="name" class="form-control" type="text" placeholder="Johnny Brown" value="{{ $meet->name }}">
                                @error('name')
                                  <small class="mt-2 text-danger">{{ $message }}</small>
                                @enderror
                            </div>
        
                            <div class="form-group">
                                <label>Waktu mulai </label>
                                <input name="begin" class="form-control datetimepicker" placeholder="waktu rapat dimulai" type="text" value="{{ $meet->begin }}">
                                @error('begin')
                                  <small class="mt-2 text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Waktu berkahir </label>
                                <input name="end" class="form-control datetimepicker" placeholder="waktu rapat berakhir" type="text" value="{{ $meet->end }}">
                                @error('end')
                                  <small class="mt-2 text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Tempat Rapat</label>
                                <input name="place" class="form-control" type="text" placeholder="alun-alun etc." value="{{ $meet->place }}">
                                @error('place')
                                  <small class="mt-2 text-danger">{{ $message }}</small>
                                @enderror
                            </div>
        
                            <div class="form-group">
                                <label>Salary Jabatan</label>
                                <input class="form-control input-currency" type="text" type-currency="IDR" placeholder="Rp" name="salary" value="{{ $meet->salary }}">
                                @error('salary')
                                    <small class="mt-2 text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <input class="form-control " type="text" name="barcode" value="{{ $id }}" name="barcode" hidden>


                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit Form</button>
                        </form>
                    </div>
                </div>
                <!-- Bootstrap Switchery End -->
                <!-- Bootstrap Tags Input Start -->
                <div class="col-md-6 col-sm-12 mb-30">
                    <div class="pd-20 card-box height-100-p">
                        <div class="clearfix mb-30">
                            <div class="pull-left">
                                <h4 class="text-blue h4">Rapat QRcode</h4>
                            </div>
                        </div>
                       
                        <p class="text-center">
                        
                            {{-- {!!  DNS2D::getBarcodeHTML($id, 'QRCODE') !!} --}}
                            {!! QrCode::size(350)->generate($id) !!}
                            {{-- {{ $id }} --}}

                            
                        </p>

                        
                       
                    </div>
                </div>
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
