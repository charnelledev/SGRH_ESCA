<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
    ];
    public function employes()
    {
        return $this->hasMany(user::class);
    }
    public function users()
    {
        return $this->hasMany(User::class, 'region_id');
    }
}
