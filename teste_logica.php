<?php

class Troco {
    private $notas = [100, 50, 20, 10, 5, 2, 1, 0.5, 0.25, 0.1, 0.01];

    public function getQtdeNotas(float $valor): array {
        $resultado = [];
        foreach ($this->notas as $index=>$nota) {
            $quantidade = intval($valor / $nota);
            $resultado[strval($nota)] = $quantidade;
            $valor -= $quantidade * $nota;
            $valor = round($valor, 2);
        }
        return $resultado;
    }
}

$troco = new Troco();
$valor = 289.99;
$resultado = $troco->getQtdeNotas($valor);

echo "<pre>";
print_r($resultado);

/* 
###### OUTPUT ######

Array
(
    [100] => 2
    [50] => 1
    [20] => 1
    [10] => 1
    [5] => 1
    [2] => 2
    [1] => 0
    [0.5] => 1
    [0.25] => 1
    [0.1] => 2
    [0.01] => 4
)

*/
?>