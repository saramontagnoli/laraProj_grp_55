<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

/*
 * Model per la definizione delle AUTO
 */
class Auto extends Model {

    //associazione alla tabella auto del database
    protected $table = 'auto';

    //definizione della primary key = codice_auto
    protected $primaryKey = 'codice_auto';
    public $timestamps = false;
}
