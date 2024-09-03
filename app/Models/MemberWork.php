<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberWork extends Model
{
    use HasFactory;
    protected $table = 'member_works';
    protected $fillable = [
        'user_id',
        'photo',
        'title',
        'slug',
        'content',
        'status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
