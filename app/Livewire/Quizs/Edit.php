<?php

namespace App\Livewire\Quizs;

use App\Models\Quiz;
use App\Models\Tier;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Edit Soal')]
class Edit extends Component
{
    public $quizId;
    public $tierId; // Property for tier ID
    public $quiz_text;
    public $point;
    public $correct_answer;
    public $options = [];
    public $tiers;

    protected function rules()
    {
        return [
            'quizId' => 'required|integer|exists:quizzes,id',
            'tierId' => 'required|integer|exists:tiers,id',
            'quiz_text' => 'required|string',
            'options' => 'required|array|min:2',
            'options.*' => 'required|string',
            'correct_answer' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!in_array($value, $this->options)) {
                        $fail('Jawaban Benar harus salah satu dari pilihan.');
                    }
                },
            ],
            'point' => 'required|integer', // Update validation rule to `selectedPoints`
        ];
    }

    protected $validationAttributes = [
        'quizId' => 'ID Kuis',
        'tierId' => 'Tingkat Kuis',
        'quiz_text' => 'Pertanyaan',
        'options' => 'Pilihan',
        'options.*' => 'Pilihan',
        'correct_answer' => 'Jawaban Benar',
        'point' => 'Bobot Soal', // Update attribute name to `selectedPoints`
    ];

    protected $messages = [
        'required' => ':attribute wajib diisi.',
        'string' => ':attribute harus berupa teks.',
        'array' => ':attribute harus berupa array.',
        'min' => ':attribute harus memiliki minimal :min item.',
        'integer' => ':attribute harus berupa angka.',
        'in' => ':attribute harus salah satu dari :values.',
    ];

    public function mount($id)
    {
        $quiz = Quiz::with('answers')->findOrFail($id);
        $this->quizId = $quiz->id;
        $this->tierId = $quiz->tier_id;
        $this->quiz_text = $quiz->quiz_text;
        $this->correct_answer = $quiz->correct_answer;
        $this->options = $quiz->answers->pluck('answer')->toArray();
        $this->tiers = Tier::all();
        $this->point= $quiz->point; // Initialize selectedPoints
    }

    public function addOption()
    {
        if (count($this->options) < 4) {
            $this->options[] = '';
        }
    }

    public function removeOption($optionIndex)
    {
        unset($this->options[$optionIndex]);
        $this->options = array_values($this->options);
    }

    public function submit()
    {
        $this->point = (int) $this->point;
        sleep(2);
        $validatedData = $this->validate();
        $quiz = Quiz::findOrFail($this->quizId);
        // dd($validatedData);

        $quiz->update([
            'quiz_text' => $validatedData['quiz_text'],
            'tier_id' => $validatedData['tierId'],
            'correct_answer' => $validatedData['correct_answer'],
            'point' => $validatedData['point'],
        ]);

        $quiz->answers()->delete(); // Remove old answers
        foreach ($validatedData['options'] as $optionText) {
            $quiz->answers()->create(['answer' => $optionText]);
        }

        $message = "Kuis berhasil diubah!";
        $route=route('quizDetail', $this->tierId);
        $this->dispatch('success', ['message' => $message, 'route'=>$route]);
    }

    public function render()
    {
        return view('pages.quizs.edit', [
            'tiers' => $this->tiers,
            'abjad' => range('A', 'Z'),
        ]);
    }
}
