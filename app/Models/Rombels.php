<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rombels extends Model
{
    use HasFactory;

    protected $tabel = "rombels";
    protected $primerykey = "id";
    protected $fillable = [ 
    'rombel'];

    public function siswa() 
    {
        return $this->hasMany(Siswa::class);
    }
}
