<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParticipantAnswer extends Model
{
    use HasFactory;
    protected $table = 'participant_answer';
    protected $fillable = ['quiz_id', 'quiz_participant_id', 'question_id', 'answer', 'is_correct'];
}
