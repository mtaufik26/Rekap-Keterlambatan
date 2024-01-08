<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    // protected $table = "siswa";
    // protected $primaryKey = "id"; 
    protected $fillable = [ 
        'nis', 'nama', 'rombel_id', 'rayon_id'
    ];

    public function rayon() 
    {
        return $this->belongsTo(Rayon::class);
    }

    public function rombel() 
    {
        return $this->belongsTo(Rombels::class);
    }
}
