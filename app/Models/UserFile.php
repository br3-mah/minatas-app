<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFile extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'path',
        'user_id',
        'source'
    ];

    public function user(){
        $this->belongsTo(User::class);
    }
}