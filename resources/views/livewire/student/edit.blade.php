<form>
    <input type="hidden" name="studentid" id="studentid" wire:model="studentid">
    <div class="mb-3">
      <label for="name" class="form-label">Edit Student name</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Edit name..." wire:model="studentname">
      @error('name') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <button type="submit" class="btn btn-primary" wire:click.prevent="update()">Submit</button>
    <button type="button" class="btn btn-danger" wire:click="cancel">Cancel</button>
</form>