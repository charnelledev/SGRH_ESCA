<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoriqueEmploye extends Model
{
    protected $fillable = [
        'employe_id',
        'emploi_id',
        'date_debut',
        'date_fin',
    ];

    public function employe()
    {
        return $this->belongsTo(User::class, 'employe_id');
    }

    public function emploi()
    {
        return $this->belongsTo(Emploi::class, 'emploi_id');
    }
}
