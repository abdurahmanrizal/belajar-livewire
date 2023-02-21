<form>
    <div class="mb-3">
      <label for="name" class="form-label">Student name</label>
      <input type="text" class="form-control" id="name" name="name" wire:model="name" placeholder="Input name...">
      @error('name') <span class="text-danger fw-bold" style="font-size:12px">{{ $message }}</span>@enderror
    </div>
    <button wire:click.prevent="store" wire:loading.attr="disabled" class="btn btn-success fw-bold shadow">Save</button>
    <div wire:loading>
        Processing...dulu
    </div>
</form>