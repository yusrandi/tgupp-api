@extends('layouts.base')
@section('title', 'Laporan Rapat')

@section('css')

@endsection


@section('content')
    <div class="main-container">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4>Laporan Rapat</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Laporan Rapat</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            {{-- @livewire('wire-meet') --}}

            <!-- Simple Datatable start -->


            <!-- Checkbox select Datatable start -->

            <div class="card-box pd-10 mb-30">


                <form action="{{ url('report-meet') }}" method="post" class="pd-20">

                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-12 col-md-6">
                            <input class="form-control datetimepicker-range"
                                placeholder="filter berdasarkan tanggal mulai rapat" type="text" name="date">

                        </div>

                        <button name="submitbutton" value="filter" type="submit"
                            class="btn btn-primary col-sm-12 col-md-2 mr-2"><i class="fa fa-search"></i>
                            submit </button>
                        <button name="submitbutton" value="excel" type="submit"
                            class="btn btn-success col-sm-12 col-md-2"><i class="fa fa-file-excel-o"></i>
                            export </button>


                    </div>
                </form>
            </div>

            <div class="card-box mb-30 pd-20">

                <div class="pull-left">
                    <h4 class="text-blue h4">Tabel Rapat</h4>
                    <p class="mb-30">Data semua jadwal rapat</p>
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
                                <th>Pimpinan</th>
                                <th>Notulen</th>
                                <th>Peserta</th>

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
                                    <td>{{ $item->meetResults->isEmpty() ? '-' : $item->meetResults->first()->leader }}</td>
                                    <td>{{ $item->meetResults->isEmpty() ? '-' : $item->meetResults->first()->notulen }}</td>
                                    <td>{{ $item->meetAttendances->isEmpty() ? '-' : $item->meetAttendances->count() . ' Orang' }}</td>


                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Checkbox select Datatable End -->


        </div>


    </div>
@endsection

@section('js')

    @include('utils.toastr')

    @stack('script')



    <script>
        $(document).ready(function() {
            $(".datetimepicker-range").datepicker({
                language: "en",
                autoClose: !0,
                dateFormat: "yyyy/mm/dd"
            }).on('dp.change', function(e) {
                alert('hahhahaha');
                console.log(e);
            });
        });
    </script>


@endsection
