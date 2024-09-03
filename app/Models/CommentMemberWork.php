<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentMemberWork extends Model
{
    use HasFactory;

    protected $table = 'comment_member_works';
    protected $fillable = ['user_id', 'member_work_id', 'content'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function memberWork() {
        return $this->belongsTo(MemberWork::class, 'member_work_id');
    }
}
