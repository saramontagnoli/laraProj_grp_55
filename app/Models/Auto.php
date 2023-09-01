<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/*
 * Model per la definizione delle AUTO
 */
class Auto extends Model {

    use HasFactory;
    protected $primaryKey = 'codice_auto';
    protected $table = 'auto';

    //associazione alla tabella auto del database


    //definizione della primary key = codice_auto
    public $timestamps = false;
    public function noleggio()
    {
        return $this->hasMany(Noleggio::class, 'auto_ref', 'codice_auto');
    }
}
