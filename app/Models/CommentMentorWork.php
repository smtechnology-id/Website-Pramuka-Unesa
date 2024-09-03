<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentMentorWork extends Model
{
    use HasFactory;

    protected $table = 'comment_mentor_works';
    protected $fillable = ['user_id', 'mentor_work_id', 'content'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function mentorWork() {
        return $this->belongsTo(MentorWork::class, 'mentor_work_id');
    }
}
