@extends('layouts.base')
@section('title', 'Laporan Honor')

@section('css')

@endsection


@section('content')
    <div class="main-container">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4>Laporan Honor</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Laporan Honor</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            {{-- @livewire('wire-meet') --}}

            <!-- Simple Datatable start -->


            <!-- Checkbox select Datatable start -->



            <div class="card-box pd-10 mb-30">


                <form action="{{ url('report-honor') }}" method="post" class="pd-20">

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
                    <h4 class="text-blue h4">Tabel Honor</h4>
                    <p class="mb-30">Data semua honor pegawai</p>
                </div>


                <div class="pb-20">

                    <table class="table stripe hover nowrap" id="example">
                        <thead>
                            <tr>
                                <th rowspan="2" class="text-center">#</th>
                                <th rowspan="2" class="text-center">NAMA LENGKAP</th>
                                <th rowspan="2" class="text-center">JABATAN</th>
                                <th rowspan="2" class="text-center">PENDIDIKAN</th>
                                <th colspan="3" class="text-center">JUMLAH YG DITERIMA</th>
                                <th rowspan="2" class="text-center">TANDA TANGAN</th>
                            </tr>
                            <tr>

                                <th class="text-center">NOMINAL</th>
                                <th  class="text-center">JUM. KEG.</th>
                                <th class="text-center">JUMLAH</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item['fullname'] }}</td>
                                    <td class="text-center">{{ $item['jabatan'] }}</td>
                                    <td class="text-center">{{ $item['title'] }}</td>
                                    <td class="text-right">{{ number_format($item['nominal']) }}</td>
                                    <td class="text-center">X {{ $item['qty'] }}</td>
                                    <td class="text-right">{{ number_format($item['salary']) }}</td>
                                    <td></td>
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
