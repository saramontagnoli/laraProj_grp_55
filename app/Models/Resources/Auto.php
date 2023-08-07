<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

/*
 * Model per la definizione delle F.A.Q.
 */
class Auto extends Model {

    //associazione alla tabella faq
    protected $table = 'auto';

    //definizione della primary key = codice_faq
    protected $primaryKey = 'codice_auto';
    public $timestamps = false;
}
