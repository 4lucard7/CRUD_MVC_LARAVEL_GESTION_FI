<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class inscription extends Model
{
    protected $table = 'inscription';
    protected $fillable = [
        'formation_id',
        'nom_apprenant',
        'email',
        'date_inscription',
    ];

    protected $casts = [
        'date_inscription' => 'date',
    ];

    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }
}
