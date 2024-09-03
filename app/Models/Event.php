<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table = 'events';
    protected $fillable = ['photo', 'title', 'slug', 'content', 'author', 'status'];

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
}
