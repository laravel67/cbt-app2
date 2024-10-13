@props(['type' => 'text', 'model' => '', 'ph' => ''])
<div class="mb-3 @if ($type == 'password') form-password-toggle @endif">
    @if ($type == 'password')
        <div class="d-flex justify-content-between">
            <label class="form-label text-capitalize" for="{{ $model }}">
                {{ $slot }}
            </label>
        </div>
    @endif
    <div class="@if ($type == 'password') input-group input-group-merge @endif">
        @if ($type != 'password')
            <label for="{{ $model }}" class="form-label text-capitalize">{{ $slot }}</label>
        @endif
        <input 
            type="{{ $type }}"
            class="form-control @error($model) is-invalid @enderror @if($type != 'password' && ! $errors->has($model) && $attributes['value']) is-valid @endif"
            id="{{ $model }}" 
            wire:model.lazy="{{ $model }}" 
            name="{{ $model }}" 
            placeholder="{{ $ph }}" 
        />
        @if ($type == 'password')
            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
        @endif
        @if ($type != 'password')
            @error($model)
                <span class="text-danger">{{ $message }}</span>
            @enderror
        @endif
    </div>
    @if ($type == 'password')
        @error($model)
            <span class="text-danger">{{ $message }}</span>
        @enderror           
    @endif
</div>
