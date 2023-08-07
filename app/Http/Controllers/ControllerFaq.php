<?php

namespace App\Http\Controllers;

use App\Models\CatalogFaq;
use Illuminate\Support\Facades\Log;


class ControllerFaq extends Controller
{
    protected $_listFaq;

    public function __construct() {
        $this->_listFaq = new CatalogFaq();
    }

    public function showFaq()
    {
        $data = $this->_listFaq->getFaq();

        return view('faq', compact('data'));
    }
}
