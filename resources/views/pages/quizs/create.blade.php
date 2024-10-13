<form wire:submit.prevent="submit">
    <div class="row">
        <div class="col-md-4">
            <x-input-select model='tier_id' :options="$tiers">
                {{ __('Tingkat Kuis') }}
            </x-input-select>
        </div>
    </div>
    <div class="row my-3">
        @foreach($questions as $questionIndex => $question)
            <div class="col-md-12 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ __('Pertanyaan '. $questionIndex + 1) }}</h5>
                        <x-btn-actio model="removeQuiz({{ $questionIndex }})" color="danger btn-sm">{{ __('Hapus') }}</x-btn-actio>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Pertanyaan ') }}</label>
                                    <x-editor-trix :model="'questions.' . $questionIndex . '.quiz_text'" :index="$questionIndex"></x-editor-trix>
                                    @error('questions.' . $questionIndex . '.quiz_text') 
                                        <span class="text-danger">{{ $message }}</span> 
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-5">
                                <x-btn-action model="addOption({{ $questionIndex }})" color="secondary mb-2">
                                    <i class="bx bx-plus-circle"></i>
                                     {{ __('Jawaban') }} 
                                </x-btn-action>

                                @foreach($question['options'] as $optionIndex => $option)
                                    <div class="input-group mb-2">
                                        <span class="input-group-text fw-bolder">
                                            {{ $abjad[$optionIndex] ?? '' }}
                                        </span>

                                        <input type="text" class="form-control 
                                            @error('questions.' . $questionIndex . '.options.' . $optionIndex) is-invalid @enderror"
                                            wire:model.lazy="questions.{{ $questionIndex }}.options.{{ $optionIndex }}" placeholder="Masukkan pilihan jawaban" required>
                                        <x-btn-action model="removeOption({{ $questionIndex }}, {{ $optionIndex }})" color="danger">
                                            <i class="bx bx-trash me-1"></i>
                                        </x-btn-action>

                                    </div>
                                @endforeach
                                @error('questions.' . $questionIndex . '.options.*') <span class="text-danger">{{ $message }}</span> @enderror
        
                                @if ($question['isShowAnswer'])
                                <hr>
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('Jawaban Benar') }}</label>
                                        <select class="form-select" wire:model.defer="questions.{{ $questionIndex }}.correctAnswer" required>
                                            <option value="" selected>{{ __('Pilih jawaban yang benar') }}</option>
                                            @foreach($question['options'] as $index => $option)
                                                <option value="{{ $index }}">{{ $abjad[$index] ?? '' }}. {{ $option }}</option>
                                            @endforeach
                                        </select>
                                        @error('questions.' . $questionIndex . '.correctAnswer') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('Bobot Soal') }}</label>
                                        <select class="form-select" wire:model.defer="questions.{{ $questionIndex }}.points" required>
                                            <option value="" selected>{{ __('Pilih bobot soal') }}</option>
                                            @foreach($pointsOptions as $point)
                                                <option value="{{ $point }}">{{ $point }}</option>
                                            @endforeach
                                        </select>
                                        @error('questions.' . $questionIndex . '.points') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row my-5">
        <div class="col-md-12 text-end">
            <x-btn-action href="{{ route('quizIndex') }}" color="secondary">
                  {{ __('Kembali') }}
                </x-btn-action>
            <x-btn-action model="addQuiz" color="primary">
                <i class="bx bx-plus-circle"></i>
                {{ __('Tambah Pertanyaan') }}
            </x-btn-action>
            <x-submit text="Simpan" load="Menyimpan..." />
        </div>
    </div>
</form>
