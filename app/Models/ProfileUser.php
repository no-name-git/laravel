<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileUser extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'avatar',
        'city',
        'hobbi',
    ];

    public function user()
    {
        return $this->belongsTo(User::class); 
    }
}
