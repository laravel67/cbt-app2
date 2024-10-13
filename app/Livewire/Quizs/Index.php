<?php

namespace App\Livewire\Quizs;

use App\Models\Quiz;
use App\Models\Tier;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

#[Title('Kelola Soal')]
class Index extends Component
{
    use WithPagination;
    public $idTier;

    protected $listeners=[
        'deleteConfirmedQuiz'=> 'destroy'
    ];

    public function render()
    {
        $tiers=Tier::orderBy('id', 'desc')->paginate(5);
        return view('pages.quizs.index', compact('tiers'));
    }

    
    public function delete($id){
        $this->idTier=$id;
        $listenTo='deleteConfirmedQuiz';
        $this->dispatch('show-delete-confirmation', ['listento'=> $listenTo]);
    }

    public function destroy(){
        $quizs = Quiz::where('tier_id', $this->idTier)->with('answers')->get();
        if ($quizs->isNotEmpty()) {
            foreach ($quizs as $quiz) {
                $quiz->answers()->delete();
                $quiz->delete();
            }
            $message = "Kuis berhasil dihapus!";
            $route=route('quizIndex');
            $this->dispatch('success', ['message' => $message, 'route'=>$route]);
        }
    }
}
