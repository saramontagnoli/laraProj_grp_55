<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/*
 * Model per la definizione delle AUTO
 */
class Auto extends Model {

    use HasFactory; //che cazzo è?

    //associazione alla tabella auto del database
    protected $table = 'auto';

    //definizione della primary key = codice_auto
    protected $primaryKey = 'codice_auto';
    public $timestamps = false;
    public function noleggio()
    {
        return $this->hasMany(Noleggio::class, 'auto_ref', 'codice_auto');
    }
}
