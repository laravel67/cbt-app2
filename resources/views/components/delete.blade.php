@props(['model' => ''])

<button class="btn btn-danger" wire:click="delete({{ $model }})">
    <i class="bx bx-trash"></i>
</button>