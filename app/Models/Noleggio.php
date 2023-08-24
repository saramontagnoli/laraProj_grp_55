<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Noleggio
{
    use HasFactory;

    //associazione alla tabella noleggio del database
    protected $table = 'noleggio';

    //definizione della primary key = codice_marca
    protected $primaryKey = 'codice_noleggio';
    public $timestamps = false;
}
