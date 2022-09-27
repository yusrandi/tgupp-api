@extends('layouts.base')
@section('title', 'Detail Rapat')

@section('css')


@endsection


@section('content')
<div class="main-container">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4>Detail Rapat</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('meet.index') }}">Data Rapat</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Detail Rapat</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            {{-- @livewire('wire-meet') --}}

            <div class="pd-20 card-box mb-30">
                <div class="clearfix mb-20">
                    <div class="pull-left">
                        <h4 class="text-blue h4">{{ $meet->name }}</h4>
                        <p class="font-14 ml-0">Mulai {{ $meet->begin.' Sampai '.$meet->end }}</p>
                    </div>
                </div>
                <div class="container text-center">
                    <p class="mb-3">
                        {!! QrCode::size(350)->generate($meet->barcode) !!}
                    </p>

                    <div class="font-14 ml-0">Tempat {{ $meet->place }}</div>
                    <div class="font-14 ml-0">{{ $meet->salary }}</div>
                    
                </div>
            </div>

            <div class="pd-20 card-box mb-30">
                <div class="clearfix mb-20">
                    <div class="pull-left">
                        <h4 class="text-blue h5">Hasil Rapat</h4>
                        <p class="font-14 ml-0">Mulai {{ $meet->begin.' Sampai '.$meet->end }}</p>
                    </div>
                </div>
                <div class="container">
                    
                    <div class="font-14 ml-0">Pimpinan : {{ $meet->meetResults->empty() ? '-' : $meet->meetResults->first()->leader}}</div>
                    <div class="font-14 ml-0">Notulen : {{ $meet->meetResults->empty() ? '-' : $meet->meetResults->first()->notulen}}</div>
                    
                </div>
            </div>
				
            <div class="pd-20 card-box mb-30">
                <div class="clearfix mb-20">
                    <div class="pull-left">
                        <h4 class="text-blue h5">Peserta Rapat</h4>
                        <p class="font-14 ml-0">Mulai {{ $meet->begin.' Sampai '.$meet->end }}</p>
                    </div>
                </div>
                <div class="container">
{{-- {{ $meet->meetAttendances }} --}}
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
                                @foreach ($meet->meetAttendances as $item)
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
				
    </div>

    
</div>
@endsection

@section('js')

    @include('utils.toastr')

    @stack('script')

@endsection
