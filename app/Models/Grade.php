<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'libele'];
    public function emplois()
    {
        return $this->hasMany(Emploi::class, 'grade_id');
    }
}
