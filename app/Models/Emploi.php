<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emploi extends Model
{
    use HasFactory;
    protected $table = 'emplois';

    protected $fillable = ['titre', 'description', 'grade_id'];
    
    public function users()
    {
        return $this->hasMany(User::class, 'emploi_id');
    }
    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
}
