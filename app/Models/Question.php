<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $table = 'questions';
    protected $fillable = ['quiz_id', 'question', 'image', 'answer_a', 'answer_b', 'answer_c', 'answer_d', 'answer_e', 'correct_answer'];

    public function quiz() {
        return $this->belongsTo(Quiz::class);
    }
}
