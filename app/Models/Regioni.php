<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/*
 * Model per la definzione delle AUTO NOLEGGIATE
 */
class Regioni extends Model
{
    use HasFactory;

    //associazione alla tabella noleggio del database
    protected $table = 'regioni';

    //definizione della primary key = codice_noleggio
    protected $primaryKey = 'id';
    public $timestamps = false;
}
