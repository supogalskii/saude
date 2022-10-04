<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Saude;

class SaudeController extends Controller
{
    public function index() {
        return view('saude');
    }

    public function dadosimc() {
        return view('dadosimc');
    }

    public function imc() {
        $saude = new Saude();
        $resultadoimc = $saude->imc();
        return view('imc',compact('resultadoimc'));
    }

    public function dadossono() {
        return view('dadossono');
    }


    public function sono() {
        $saude = new Saude();
        $resultadosono = $saude->sono();
        return view('sono',compact('resultadosono'));
    }
}
