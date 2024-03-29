<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
        'image',
        'datedebut',
        'datedefin',
    ];

    public function promoteur()
    {
        return $this->belongsTo(User::class, 'promoteur_id');
    }

    public function activite()
    {
        return $this->belongsTo(Activite::class, 'activite_id');
    }
}
