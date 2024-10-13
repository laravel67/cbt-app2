@props(['text'=>'', 'load'=> '', 'class'=> ''])
<button type="submit" class="btn btn-success me-2 {{ $class }}">
    <span wire:loading.remove wire:target="submit">{{ $text }}</span>
    <div class="spinner-border spinner-border-sm text-info ms-2" wire:loading wire:target="submit" role="status">
        <span class="visually-hidden">{{ $load }}</span>
    </div>
    <span wire:loading wire:target="submit">{{ $load }}</span>
</button>  