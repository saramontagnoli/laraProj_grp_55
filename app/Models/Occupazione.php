<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/*
 * Model per la definzione delle AUTO NOLEGGIATE
 */
class Occupazione extends Model
{
    use HasFactory;

    //associazione alla tabella noleggio del database
    protected $table = 'occupazione';

    //definizione della primary key = codice_noleggio
    protected $primaryKey = 'codice_occupazione';
    public $timestamps = false;

    protected $fillable =
        [
            'codice_occupazione',
            'dnome_occupazione'
        ];

}
