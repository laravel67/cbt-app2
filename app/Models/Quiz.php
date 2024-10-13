<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $fillable = ['tier_id', 'quiz_text', 'correct_answer', 'point'];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function tier()
    {
        return $this->belongsTo(Tier::class);
    }
}
