<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/*
 * Model per la definizione dei MODELLI
 */
class Modello extends Model {

    use HasFactory; //che cazzo è?

    //associazione alla tabella modello del database
    protected $table = 'modello';

    //definizione della primary key = codice_modello
    protected $primaryKey = 'codice_modello';
    public $timestamps = false;
}
