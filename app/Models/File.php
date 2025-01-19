<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_name',
        'unique_id',
        'department',
        'priority',
        'type',
        'status',
        'file_path',
        'tags',
        'user_id',
    ];
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function histories()
    {
        return $this->hasMany(FileHistory::class);
    }
}
