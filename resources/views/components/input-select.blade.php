@props(['model', 'options' => [], 'defaultOptions' => [], 'quizOptions' => []])
<select wire:model.defer='{{ $model }}' id="{{ $model }}" class="form-select @error($model) is-invalid @enderror" name="{{ $model }}" required>
    <option value="">-- Pilih {{ $slot }} --</option>
    {{-- Ini untuk dari database --}}
    @if ($options && $options->count() > 0)
        @foreach ($options as $option)
            <option value="{{ $option->id }}">{{ $option->name }}</option>
        @endforeach
    @elseif (!empty($defaultOptions))
    {{-- Ini Untuk Manual --}}
        @foreach ($defaultOptions as $option)
            <option value="{{ $option['value'] }}">
                {{ $option['label'] }}
            </option>
        @endforeach
        {{-- Ini untuk Quiz --}}
    @elseif (!empty($quizOptions))
        @foreach ($quizOptions as $quiz)
            <option value="{{ $quiz['value'] }}">{{ $quiz['label'] }}</option>
        @endforeach
    @else
        <option value="">{{ __('Tidak ada pilihan') }}</option>
    @endif
</select>
@error($model)
<small class="text-danger">{{ $message }}</small>
@enderror
