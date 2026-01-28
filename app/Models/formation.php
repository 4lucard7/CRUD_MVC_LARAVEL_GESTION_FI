<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class formation extends Model
{
    protected $table = 'formation';

    protected $fillable = [
        'title',
        'description',
        'duree',
    ];

    public function inscription()
    {
        return $this->hasMany(inscription::class, 'formation_id');
    }
}
