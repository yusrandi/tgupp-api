@extends('layouts.base')
@section('title', 'Jabatan')

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
                            <h4>Data Jabatan</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Data Jabatan</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            @livewire('employment')

           
           
        
        <div class="footer-wrap pd-20 mb-20 card-box">
            DeskApp - Bootstrap 4 Admin Template By <a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a>
        </div>
    </div>
</div>
@endsection

@section('js')

    <script>
        
        window.addEventListener('openModal', event => {
            $("#form-modal").modal('show');

        });
        window.addEventListener('closeModal', event => {
            $("#form-modal").modal('hide');

        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#form-modal").on('hidden.bs.modal', function() {
                livewire.emit('forceCloseModal');
            });


        });
    </script>
    
    @stack('script')

    
@endsection
