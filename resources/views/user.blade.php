@extends('layouts.base')
@section('title', 'User')

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
                            <h4>Data Pengguna</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Data Pengguna</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            @livewire('wire-user')
        
    </div>
</div>
@endsection

@section('js')

    
    @stack('script')

    
@endsection
