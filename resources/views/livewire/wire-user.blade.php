<div class="pd-20 card-box mb-30">
    <div class="clearfix">
        <div class="pull-left">
            <h4 class="text-blue h4">Tabel Pengguna</h4>
            <p class="mb-30">Data semua pengguna berdasarkan level</p>
        </div>
        <div class="pull-right">
            <a  href="{{ route('user.create') }}" class="btn btn-primary btn-sm scroll-click collapsed" ><i class="fa fa-plus"></i> Tambah Data</a>
        </div>
        <table class="table nowrap">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Foto Pengguna</th>
                    <th>Nama Lengkap</th>
                    <th>Email Pengguna</th>
                    <th>Gelar</th>
                    <th>Jabatan</th>
                    <th>Hak Akses</th>
                    <th class="datatable-nosort text-right">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    
                     <td>
                        @if ($item->image != null)
                            <img src="{{ url('storage/photos/' . $item->image) }}" width="70" alt="hahhaha">
                        @else
                            <img src="{{ asset('assets/vendors/images/photo1.jpg') }}" width="70" alt="nananna">
                        @endif
                     </td>
                    <td>{{ $item->fullname }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->title->name }}</td>
                    <td>{{ $item->employment->name }}</td>
                    <td>{{ $item->role->name }}</td>
                    
            
                    <td class="text-right">
                        <a wire:click="edit({{ $item->id }})" href="#" class="mr-3"><i class="dw dw-edit2 "></i> Edit</a>
                        @if (auth()->user()->id != $item->id)
                            <a wire:click="$emit('triggerDelete',{{ $item->id }})" href="#"><i class="dw dw-delete-3"></i> Delete</a>
                        @endif
                        

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