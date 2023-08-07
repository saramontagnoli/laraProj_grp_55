<?php

namespace App\Models;

use App\Models\Resources\Faq;

class CatalogFaq {

    public function getFaq() {
        return faq::all();
    }

}
