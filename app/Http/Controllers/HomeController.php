<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct() {
        $this->middleware('auth');                                      // Besoin de login pour afficher la page
    }

    /** /home/ affiche la liste des questionnaires appartenant à l'usagé */
    public function index() {
        $questionnaires = auth()->user()->questionnaires;               // Obtient les questionnaires appartenant à l'usagé logé
        return view('home', compact('questionnaires'));                 // home.blade.php
    }
}
