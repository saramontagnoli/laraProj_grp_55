<?php

namespace App\Http\Controllers;

class UserController extends Controller {

    public function index() {
        return view('user');
    }

    public function profilo() {
        return view('profilo');
    }

}
