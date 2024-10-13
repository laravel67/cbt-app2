<?php

namespace App\Livewire\Quizs;

use App\Models\Tier;
use Livewire\Component;

class Detail extends Component
{
    public $tierId;
    public $tierName;
    public $quizzes;
    public $answers = [];

    public function mount($id)
    {
        $this->tierId = $id;
        $tier = Tier::findOrFail($this->tierId);
        $this->tierName = $tier->name;
        $this->quizzes = $tier->quizzes;
        foreach ($this->quizzes as $quiz) {
            $this->answers[$quiz->id] = $quiz->answers;
        }
    }

    public function render()
    {
        return view('pages.quizs.detail', [
            'quizzes' => $this->quizzes,
            'tierName' => $this->tierName,
            'answers' => $this->answers,
        ]);
    }
}
