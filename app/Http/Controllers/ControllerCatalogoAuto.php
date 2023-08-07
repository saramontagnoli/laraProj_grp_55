<?php

namespace App\Http\Controllers;

use App\Models\CatalogoAuto;
use Illuminate\Support\Facades\Log;


class ControllerCatalogoAuto extends Controller
{
    protected $_catalogModel;

    public function __construct() {
        $this->_catalogModel = new CatalogoAuto();
    }

    public function showCatalogoAuto()
    {
        $data = $this->_catalogModel->getCatalogoAuto();

        return view('catalogoauto', compact('data'));
    }

    public function showCatalogoAutoSpec($codice_auto)
    {
        $data = $this->_catalogModel->getAutoSpec($codice_auto);
        return view('autosingola', compact('data'));
    }

}
