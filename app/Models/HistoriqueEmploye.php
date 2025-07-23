<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoriqueEmploye extends Model
{
    protected $fillable = [
        'employe_id',
        'emploi_id',
        'grade_id',
        'date_debut',
        'date_fin',
        'created_at',
        'updated_at',
    ];

    public function employe()
    {
        return $this->belongsTo(User::class, 'employe_id');
    }

    public function emploi()
    {
        return $this->belongsTo(Emploi::class, 'emploi_id');
    }
    public function region()
    {
        return $this->belongsTo(Region::class);
    }
    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }
}
