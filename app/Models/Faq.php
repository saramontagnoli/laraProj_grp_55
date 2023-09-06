<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/*
 * Model per la definizione delle F.A.Q.
 */
class Faq extends Model {

    //associazione alla tabella faq
    protected $table = 'faq';

    //definizione della primary key = codice_faq
    protected $primaryKey = 'codice_faq';
    public $timestamps = false;
    protected $fillable = [
        'domanda',
        'risposta'
    ];
}
