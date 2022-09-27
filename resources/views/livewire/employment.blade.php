<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue h4">Tabel Jabatan</h4>
            <p class="mb-30">Level jabatan berdasarkan kategori</p>
        </div>
        <div class="pull-right">
            <button wire:click="create" class="btn btn-primary btn-sm scroll-click collapsed" ><i class="fa fa-plus"></i> Tambah Data</button>
        </div>
        <table class="table nowrap">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Jabatan</th>
                    <th>Salary Jabatan</th>
                    <th class="datatable-nosort text-right">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->salary }}</td>
                    
                   
                    
                    <td class="text-right">
                        <a wire:click="selectedItem({{ $item->id }},'update')" href="#" class="mr-3"><i class="dw dw-edit2 "></i> Edit</a>
                        <a wire:click="$emit('triggerDelete',{{ $item->id }})" href="#"><i class="dw dw-delete-3"></i> Delete</a>

                    </td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
   
    <div class="modal fade bs-example-modal-lg" id="form-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">

            @livewire('employment-form')
            
        </div>
    </div>
</div>

@push('script')
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {

        @this.on('triggerDelete', id => {
            Swal.fire({
                title: 'Are You Sure?',
                html: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
            }).then((result) => {
                if (result.value) {
                    @this.call('delete',id)
                }
            });
        });
    })
</script>
@endpush