@extends('layouts.base')
@section('title', 'Hasil Rapat')

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
                            <h4>Form Hasil Rapat</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('meet.index') }}">Data Rapat</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Form Hasil Rapat</li>
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
                                <h4 class="text-blue h4">Form Hasil Rapat </h4>
                            </div>
                        </div>
                        <form action="{{ $meetResult ? route('meet-result.update', $meetResult) : route('meet-result.store') }}" method="POST">
                            @csrf

                            @if ($meetResult)
                                @method('PUT')                            
                            @endif
                            
                            <div class="form-group">
                                <label>Pemimpin Rapat</label>
                                <input name="leader" class="form-control" type="text" placeholder="Johnny Brown" value="{{ $meetResult ? $meetResult->leader : '' }}">
                                @error('leader')
                                  <small class="mt-2 text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Notulen Rapat</label>
                                <input name="notulen" class="form-control" type="text" placeholder="Johnny Brown" value="{{ $meetResult ? $meetResult->notulen : '' }}">
                                @error('notulen')
                                  <small class="mt-2 text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                          
        
                            <div class="form-group">
                                <label>Hasil Rapat</label>
                                <textarea name="result" class="form-control">
                                    {!! $meetResult ? strip_tags($meetResult->result) : '' !!}

                                    {{-- {!! Str::limit(strip_tags($item->detail), 150) !!} --}}
                                </textarea>
                                <small>max 255 caracter</small>

                                @error('result')
                                  <small class="mt-2 text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <input class="form-control " type="text" value="{{ $meet->id }}" name="meet_id" hidden>


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
