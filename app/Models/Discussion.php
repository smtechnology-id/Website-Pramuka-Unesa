<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    use HasFactory;
    protected $table = 'discussions';
    protected $fillable = [
        'user_id',
        'content',
        'file',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
