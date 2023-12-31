<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/*
 * Model per la definizione delle MARCHE
 */
class Marca extends Model {

    use HasFactory; //che cazzo è?

    //associazione alla tabella marca del database
    protected $table = 'marca';

    //definizione della primary key = codice_marca
    protected $primaryKey = 'codice_marca';
    public $timestamps = false;
}
