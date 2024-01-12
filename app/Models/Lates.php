<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lates extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = ['student_id', 'date_time_late', 'information', 'bukti'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'student_id');
    }
}

