<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentDiscussion extends Model
{
    use HasFactory;
    protected $table = 'comment_discussions';
    protected $fillable = ['user_id', 'discussion_id', 'content'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
