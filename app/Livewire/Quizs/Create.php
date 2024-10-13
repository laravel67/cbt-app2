<?php

namespace App\Livewire\Quizs;

use App\Models\Quiz;
use App\Models\Tier;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Kelola Soal')]
class Create extends Component
{
    public $tiers;
    public $questions = [];
    public $tier_id;
    public $pointsOptions = [
        5,10,15,25,30,35,40,45,50,55,60,65,70,75,80,85,90,95,100
    ];

    protected $rules = [
        'tier_id' => 'required',
        'questions.*.quiz_text' => 'required|string',
        'questions.*.options' => 'required|array|min:2',
        'questions.*.options.*' => 'required|string',
        'questions.*.correctAnswer' => 'required|integer',
        'questions.*.points' => 'required|integer', // Validasi bobot soal
    ];

    protected $validationAttributes = [
        'tier_id' => 'Tingkat Kuis',
        'questions.*.quiz_text' => 'Pertanyaan',
        'questions.*.options' => 'Pilihan',
        'questions.*.options.*' => 'Pilihan',
        'questions.*.correctAnswer' => 'Jawaban Benar',
        'questions.*.points' => 'Bobot Soal',
    ];

    protected $messages = [
        'required' => ':attribute wajib diisi.',
        'string' => ':attribute harus berupa teks.',
        'array' => ':attribute harus berupa array.',
        'min' => [
            'numeric' => ':attribute harus minimal :min.',
            'file' => ':attribute harus minimal :min kilobytes.',
            'string' => ':attribute harus minimal :min karakter.',
            'array' => ':attribute harus memiliki minimal :min item.',
        ],
        'integer' => ':attribute harus berupa angka.',
        'in' => ':attribute harus salah satu dari :values.',
    ];

    public function mount()
    {
        $this->tiers = Tier::all();
        $this->addQuiz(); // Initialize with one question
    }

    public function addOption($questionIndex)
    {
        if (count($this->questions[$questionIndex]['options']) < 4) {
            $this->questions[$questionIndex]['options'][] = '';
        }
        $this->checkShowAnswer($questionIndex);
    }

    public function addQuiz()
    {
        if (count($this->questions) < 10) {
            $this->questions[] = [
                'quiz_text' => '',
                'options' => [],
                'correctAnswer' => null,
                'points' => null,
                'isShowAnswer' => false,
            ];
        } else {
        }
    }    

    public function removeQuiz($index)
    {
        unset($this->questions[$index]);
        $this->questions = array_values($this->questions);
    }

    public function removeOption($questionIndex, $optionIndex)
    {
        unset($this->questions[$questionIndex]['options'][$optionIndex]);
        $this->questions[$questionIndex]['options'] = array_values($this->questions[$questionIndex]['options']);
        $this->checkShowAnswer($questionIndex);
    }

    private function checkShowAnswer($questionIndex)
    {
        $this->questions[$questionIndex]['isShowAnswer'] = count($this->questions[$questionIndex]['options']) > 0;
    }

    private function addAbjad()
    {
        return range('A', 'Z');
    }

    public function submit()
    {
        sleep(2);
        $validatedData = $this->validate();
        foreach ($validatedData['questions'] as $questionData) {
            $quiz = Quiz::create([
                'tier_id' => $validatedData['tier_id'],
                'quiz_text' => $questionData['quiz_text'],
                'correct_answer' => $questionData['correctAnswer'],
                'point' => $questionData['points']
            ]);

            foreach ($questionData['options'] as $optionText) {
                $quiz->answers()->create(['answer' => $optionText]);
            }
        }
        $this->resetForm();
        $message = "Kuis berhasil disimpan!";
        $route=route('quizIndex');
        $this->dispatch('success', ['message' => $message, 'route'=>$route]);
    }

    public function resetForm()
    {
        $this->questions = [];
        $this->tier_id = null;
    }

    public function render()
    {
        return view('pages.admin.quiz.create', [
            'tiers' => $this->tiers,
            'questions' => $this->questions,
            'pointsOptions' => $this->pointsOptions, // Kirim opsi bobot ke view
            'abjad' => $this->addAbjad(),
        ]);
    }
}
