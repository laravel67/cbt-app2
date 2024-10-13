@props(['model' => ''])
<div wire:ignore>
    <textarea id="ck-editor-{{ $model }}" wire:model.defer="{{ $model }}" required></textarea>
    @push('js')
    <script src="https://unpkg.com/ckeditor4@4.20.1/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            const editor = CKEDITOR.replace('ck-editor-{{ $model }}');
            editor.on('change', function(e) {
                // Menggunakan model dinamis untuk mengatur data
                @this.set('{{ $model }}', e.editor.getData());
            });
        });
    </script>
    @endpush
</div>

<!-- Menampilkan pesan kesalahan jika ada -->
@error($model)
    <span class="text-danger">{{ $message }}</span>
@enderror
