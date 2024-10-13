<div>
    <h1>Edit Soal</h1>
    <form wire:submit.prevent="submit">
        <div class="row">
            <div class="col-sm-6">
                <x-input-select model="tierId" :options="$tiers">
                    {{ __('Tingkat Kuis') }}
                </x-input-select>
                @error('tierId') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md-12 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ __('Pertanyaan') }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="mb-3" wire:ignore>
                                    <label class="form-label">{{ __('Pertanyaan') }}</label>
                                    <x-editor-ck model="quiz_text"></x-editor-ck>
                                </div>        
                            </div>

                            <div class="col-md-5">
                                <x-btn-action model="addOption" color="secondary mb-2">
                                    <i class="bx bx-plus-circle"></i>
                                    {{ __('Jawaban') }} 
                                </x-btn-action>

                                @foreach($options as $optionIndex => $option)
                                    <div class="input-group mb-2">
                                        <span class="input-group-text fw-bolder">
                                            {{ $abjad[$optionIndex] ?? '' }}
                                        </span>

                                        <input type="text" class="form-control 
                                            @error('options.' . $optionIndex) is-invalid @enderror"
                                            wire:model.lazy="options.{{ $optionIndex }}" placeholder="Masukkan pilihan jawaban">
                                        <x-btn-action model="removeOption({{ $optionIndex }})" color="danger">
                                            <i class="bx bx-trash me-1"></i>
                                        </x-btn-action>
                                    </div>
                                @endforeach
                                @error('options.*') <span class="text-danger">{{ $message }}</span> @enderror

                                <hr>
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Jawaban Benar') }}</label>
                                    <select class="form-select" wire:model.defer="correct_answer" required>
                                        <option value="" selected>{{ __('Pilih jawaban yang benar') }}</option>
                                        @foreach($options as $index => $option)
                                            <option value="{{ $option }}">{{ $abjad[$index] ?? '' }}. {{ $option }}</option>
                                        @endforeach
                                    </select>
                                    @error('correct_answer') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>                                
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Bobot Soal') }}</label>
                                    <select class="form-select" wire:model.lazy="point" required>
                                        <option value="" selected>{{ __('Pilih bobot soal') }}</option>
                                        @for ($i = 5; $i <= 100; $i +=5)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                    @error('points') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row my-5">
            <div class="col-md-12 text-end">
                <x-btn-action href="{{ route('quizDetail', $tierId) }}" color="secondary">
                      {{ __('Kembali') }}
                </x-btn-action>
                <x-submit text="Update" load="Menyimpan..." />
            </div>
        </div>
    </form>
</div>
