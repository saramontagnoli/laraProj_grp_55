<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

/*
 * Model per la definizione delle MARCHE
 */
class Marca extends Model {

    //associazione alla tabella marca del database
    protected $table = 'marca';

    //definizione della primary key = codice_marca
    protected $primaryKey = 'codice_marca';
    public $timestamps = false;
}
