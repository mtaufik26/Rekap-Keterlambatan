<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $fillable = [ 
        'name',
        'email',
        'email_verified_at',
        'password',
        'role',
        'remember_token'
    ];

    public function rayon()
    {
        return $this->hasMany(Rayon::class);
    }
}
