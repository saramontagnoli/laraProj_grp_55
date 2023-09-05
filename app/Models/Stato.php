<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/*
 * Model per la definzione delle AUTO NOLEGGIATE
 */
class Stato extends Model
{
    use HasFactory;

    //associazione alla tabella noleggio del database
    protected $table = 'stato';

    //definizione della primary key = codice_noleggio
    protected $primaryKey = 'codice_stato';
    public $timestamps = false;
}
