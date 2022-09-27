
    <div class="row">
        <div class="col-xl-8 mb-30">
            <div class="card-box height-100-p pd-20">
                <h2 class="h4 mb-20">Detail Identitas</h2>
                <form action="" autocomplete="off">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input wire:model="fullname" class="form-control" type="text" placeholder="Johnny Brown">
                        @error('fullname')
                          <small class="mt-2 text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group ">
                        <label >level Jabatan</label>
                        <select class="custom-select col-12" wire:model="employment_id">
                            <option selected="">Choose...</option>
                            @foreach ($employments as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('employment_id')
                          <small class="mt-2 text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group ">
                        <label >level Hak Akses</label>
                        <select class="custom-select col-12" wire:model="role_id">
                            <option selected="">Choose...</option>
                            @foreach ($roles as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('role_id')
                            <small class="mt-2 text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Email Pengguna</label>
                        <input wire:model="email" class="form-control" type="email" placeholder="Johnny@jonu.jon" autocomplete="off">
                        @error('email')
                            <small class="mt-2 text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Paasword</label>
                        <input wire:model="password" type="password" class="form-control" placeholder="Password" autocomplete="off">
                        @error('password')
                          <small class="mt-2 text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    
                </form>
            </div>
        </div>
        <div class="col-xl-4 mb-30">
            <div class="card-box height-100-p pd-20">
                <h2 class="h4 mb-20">Foto Pengguna</h2>
                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" class="form-control-file form-control height-auto" wire:model="image">
                </div>
                @error('image')
                        <p><small class="mt-2 text-danger">{{ $message }}</small></p>
                @enderror
               <p>
                    @if ($image)
                        <img src="{{ $image->temporaryUrl() }}" style="max-height: 200px; max-width: 100%;">
                    @endif
               </p>

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button wire:click="save" type="button" class="btn btn-primary">Submit Form</button>
            </div>

            
        </div>

        
    </div>
   

@push('script')

@endpush