@props(['href' => null, 'model' => null, 'color' => 'success'])

<a 
    @if($href) 
        href="{{ $href }}" 
        wire:navigate 
    @elseif($model) 
        href="javascript:void(0);" 
        wire:click="{{ $model }}" 
    @endif
    class="badge btn-{{ $color }} text-white"
    {{ $attributes }}
>
    {{ $slot }}
</a>
