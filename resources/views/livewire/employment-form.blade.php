<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="myLargeModalLabel">Form Jabatan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    </div>
    <div class="modal-body">
        <form action="">
            <div class="form-group">
                <label>Nama Jabatan</label>
                <input wire:model="name" class="form-control" type="text" placeholder="Johnny Brown" name="name">
                @error('name')
                    <small class="mt-2 text-danger">{{ $message }}</small>
                @enderror
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
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button wire:click="save" type="button" class="btn btn-primary">Submit Form</button>
    </div>
</div>