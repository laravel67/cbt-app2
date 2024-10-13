@props(['model' => '', 'index' => ''])
<div wire:ignore>
    <input id="{{ $model }}" type="hidden" name="{{ $model }}" wire:model.defer="{{ $model }}" required>
    <trix-editor input="{{ $model }}" class="trix-content" id="trix-editor-{{ $index }}"></trix-editor>
</div>

@push('js')
    <script>
        document.addEventListener('trix-change', function(event) {
            const editorId = event.target.getAttribute('id');
            const inputId = event.target.getAttribute('input');
            @this.set(inputId, event.target.value);
        });
    </script>
    @livewireScripts
@endpush