
    <div class="row">
        <div class="col-xl-8 mb-30">
            <div class="card-box height-100-p pd-20">
                <h2 class="h4 mb-20">Detail Rapat</h2>
                <form action="" autocomplete="off">
                    <div class="form-group">
                        <label>Nama Rapat</label>
                        <input wire:model="name" class="form-control" type="text" placeholder="Johnny Brown">
                        @error('name')
                          <small class="mt-2 text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Date and time {{ $begin }}</label>
                        <input wire:ignore class="form-control datetimepicker" placeholder="Choose Date anf time" type="text" id="haha">
                    </div>

                    <div class="form-group">
                        <label>Salary Jabatan</label>
                        <input wire:model="salary" class="form-control input-currency" type="text" type-currency="IDR" placeholder="Rp" name="salary">
                        @error('salary')
                            <small class="mt-2 text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    
                </form>
            </div>
        </div>
        <div class="col-xl-4 mb-30">
            <div class="card-box height-100-p pd-20">
                <h2 class="h4 mb-20">Rapat QRcode</h2>

                @if ($name)
                <p>
                    @php
                    echo DNS2D::getBarcodeHTML($name, 'QRCODE');
                    echo $name;
                    @endphp
                </p>
                @endif
                
                
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button wire:click="save" type="button" class="btn btn-primary">Submit Form</button>
            </div>

            
        </div>

        
    </div>
   

@push('script')

<script>
    $(document).ready(function() {
        $(".datetimepicker").datepicker({
                timepicker:!0,
                language:"en",
                autoClose:!0,
                dateFormat:"dd/mm/yyyy"
        }).on('dp.change', function (e) {  
            alert('hahhahaha');
            console.log(e);
        });

       

    });
            

</script>
<script>
    //  $('#appointmentDate').datetimepicker({
    //         // format: 'L',
    //         format: 'YYYY/MM/DD HH:mm'
    //     });


        // $('#haha').on("dp.change", function(e) {
        //     alert('hahhaha');
        //     // let date = $(this).data('appointmentdate');
        //     // eval(date).set('tgl_perlakuan', $('#appointmentDateInput').val());

        // });
</script>

@endpush