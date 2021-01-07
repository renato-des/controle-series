<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Episodio extends Model
{

    protected $fillable = ['numero', 'assistido'];
    public $timestamps = false;

    public function temporada()
    {
        return $this->belongsTo(Temporada::class);
    }
}
