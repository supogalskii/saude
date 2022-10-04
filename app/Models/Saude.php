<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saude extends Model
{
    use HasFactory;

    function calcula_idade($nascimento) {
        $nascimento=explode('-',$nascimento); //Cria um array com os campos da data de nascimento
        $data=date('d/m/Y'); $data=explode('/',$data); //Cria um array com os campos da data atual
        $anos=$data[2]-$nascimento[0]; //ano atual - ano de nascimento
        if($nascimento[1] > $data[1]) return $anos-1; //Se o mês de nascimento for maior que o mês atual, diminui um ano
        if($nascimento[1] == $data[1])
        { //se o mês de nascimento for igual ao mês atual, precisamos ver os dias
            if($nascimento[3] <= $data[0]) {
                return $anos;
            }
            else {
                return $anos-1;
            }
        }
        return $anos;
    }

    function calcula_imc($peso, $altura) {
        return round($peso / ($altura * $altura));
    }

    function classificacao_imc($imc) {
        if ($imc < 18.5) {
            return "Abaixo do peso";
        } elseif ($imc < 25) {
            return "Peso normal";
        } elseif ($imc < 30) {
            return "Acima do peso (sobrepeso)";
        } elseif ($imc < 35) {
            return "Obesidade I";
        } elseif ($imc < 40) {
            return "Obesidade II";
        } else {
            return "Obsidade III";
        }
    }

    function classificacao_sono($idade, $horas) {
        if ($idade <= 0.03) {
            if ($horas >= 14 && $horas <=17) {
                return "Horas de sono suficientes";
            } else {
                return "Horas de sono insuficientes";
            }
        } elseif ($idade >= 0.04 && $idade <= 0.11) {
            if ($horas >= 12 && $horas <= 15) {
                return "Horas de sono suficientes";
            } else {
                return "Horas de sono insuficientes";
            }
        } elseif ($idade >= 1 && $idade <= 2) {
            if ($horas >= 11 && $horas <= 14) {
                return "Horas de sono suficientes";
            } else {
                return "Horas de sono insuficientes";
            }
        } elseif ($idade >= 3 && $idade <= 5) {
            if ($horas >= 10 && $horas <= 13) {
                return "Horas de sono suficientes";
            } else {
                return "Horas de sono insuficientes";
            }
        } elseif ($idade >= 6 && $idade <= 13) {
            if ($horas >= 9 && $horas <= 11) {
                return "Horas de sono suficientes";
            } else {
                return "Horas de sono insuficientes";
            }
        } elseif ($idade >= 14 && $idade <= 17) {
            if ($horas >= 8 && $horas <= 10) {
                return "Horas de sono suficientes";
            } else {
                return "Horas de sono insuficientes";
            }
        } elseif ($idade >= 18 && $idade <= 64) {
            if ($horas >= 7 && $horas <= 9) {
                return "Horas de sono suficientes";
            } else {
                return "Horas de sono insuficientes";
            }
        } elseif ($idade >= 65) {
            if ($horas >= 7 && $horas <= 8) {
                return "Horas de sono suficientes";
            } else {
                return "Horas de sono insuficientes";
            }
        }
    }

    public function imc() {
        $valores["nome"] = $_GET["nome"];
        $valores["idade"] = $this->calcula_idade($_GET["datanascimento"]);
        $valores["peso"] = $_GET["peso"];
        $valores["altura"] = $_GET["altura"];
        $valores["imc"] = $this->calcula_imc($valores["peso"],$valores["altura"]);
        $valores["classificacaoimc"] = $this->classificacao_imc($valores["imc"]);
        return $valores;
    }

    public function sono() {
        $valores["nome"] = $_GET["nome"];
        $valores["idade"] = $_GET["idade"];
        $valores["horas"] = $_GET["horas"];
        $valores["classificacaosono"] = $this->classificacao_sono($_GET["idade"], $_GET["horas"]);
        return $valores;
    }
}