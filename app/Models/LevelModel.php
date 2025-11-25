<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LevelModel extends Model
{
    use HasFactory;

    // Tambahkan baris ini untuk menimpa konvensi default Laravel
    protected $table = 'm_level'; 
    
    // Pastikan primary key juga sudah benar jika bukan 'id'
    protected $primaryKey = 'level_id';
    protected $fillable = ['level_name'];
    
    public function user() : BelongsTo
    {
        return $this->belongsTo(UserModel::class);
    }
}
