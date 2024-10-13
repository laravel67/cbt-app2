
<div class="container mb-5">
    <h1>Kuis Tingkat: {{ $tierName }}</h1>
    <div class="card-header d-flex align-items-center">
        <x-btn-action href="{{ route('quizIndex') }}" color="secondary me-1">kembali</x-btn-action>
    </div>
    @forelse ($quizzes as $index => $quiz)
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 mb-xl-0">
                        <x-badge color="dark">{{ 'No. '. $index + 1 }}</x-badge>
                        <x-badge color="secondary">{{'Bobot '. $quiz->point }}</x-badge>
                        <x-badge href="{{ route('quizEdit', $quiz->id) }}" color="warning">
                            {{ __('ubah soal') }}
                        </x-badge>
                        <article class="p-2">
                            {!! $quiz->quiz_text !!}
                        </article>
                    </div>
                    <div class="col-lg-6">
                        <div class="demo-inline-spacing">
                            <ul class="list-group">
                                @php
                                    $optionIndex = 0;
                                @endphp
                                @foreach ($answers[$quiz->id] as $answer)
                                    <li class="list-group-item d-flex text-start align-items-center">
                                        <span class="badge bg-primary me-2">
                                            {{ chr(65 + $optionIndex++) }} 
                                        </span>
                                        {{ $answer->answer }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
    <x-blank-page/>
    @endforelse
</div>
