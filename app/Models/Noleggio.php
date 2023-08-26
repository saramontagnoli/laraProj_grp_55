<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noleggio extends Model
{
    use HasFactory;

    //associazione alla tabella noleggio del database
    protected $table = 'noleggio';

    //definizione della primary key = codice_marca
    protected $primaryKey = 'codice_noleggio';
    public $timestamps = false;

    protected $fillable =
        [
            'data_inizio',
            'data_fine',
            'auto_ref',
            'utente_ref',
        ];
}
