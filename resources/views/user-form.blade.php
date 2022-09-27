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
                            <h4>Form Pengguna</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Data Pengguna</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Form Pengguna</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            @livewire('wire-user-form', ['user' => $user])
        
    </div>
</div>
@endsection

@section('js')

    
    @stack('script')

    
@endsection
