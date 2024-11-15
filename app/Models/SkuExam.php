<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkuExam extends Model
{
    use HasFactory;

    protected $table = 'sku_exams';
    protected $fillable = ['user_id', 'no_sku', 'file', 'deskripsi', 'status', 'catatan_pembina', 'nama_pembina'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
