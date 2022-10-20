<?php

namespace SRC;

class Funcoes
{
    /*

    Desenvolva uma função que receba como parâmetro o ano e retorne o século ao qual este ano faz parte. O primeiro século começa no ano 1 e termina no ano 100, o segundo século começa no ano 101 e termina no 200.

	Exemplos para teste:

	Ano 1905 = século 20
	Ano 1700 = século 17

     * */
    public function SeculoAno(int $ano): int {
        if($ano % 100 == 0){
            return intval($ano/100);
        }
        else{
            return intval($ano/100) + 1;
        }
    }
    
	
	
	
	
	
	
	
	/*

    Desenvolva uma função que receba como parâmetro um número inteiro e retorne o numero primo imediatamente anterior ao número recebido

    Exemplo para teste:

    Numero = 10 resposta = 7
    Número = 29 resposta = 23

     * */
    public function PrimoAnterior(int $numero): int {
        if($numero <= 0){
            return 0;
        }
        for($i = $numero-1; $i > 0; $i--){
            $flag = true;
            for($j = 2; $j <= intval($i/2); $j++){
                if($i%$j == 0){
                    $flag = false;
                    break;
                }
            }
            if(!$flag){
                continue;
            }
            return $i;
        }
    }










    /*

    Desenvolva uma função que receba como parâmetro um array multidimensional de números inteiros e retorne como resposta o segundo maior número.

    Exemplo para teste:

	Array multidimensional = array (
	array(25,22,18),
	array(10,15,13),
	array(24,5,2),
	array(80,17,15)
	);

	resposta = 25

     * */
    public function SegundoMaior(array $arr): int {
        $maior = null;
        $segundo = null;
        foreach ($arr as $arr1) {
            foreach ($arr1 as $key=>$value) {
                if($maior == null){
                    $maior = $value;
                }
                elseif($segundo == null){
                    $segundo = $value;
                }
                else{
                    if($value > $segundo){
                        if($value < $maior){
                            $segundo = $value;
                        }
                        else{
                            $segundo = $maior;
                            $maior = $value;
                        }
                    }
                }
            }
        }
        return $segundo;
    }
	
	
	
	
	
	

    /*
   Desenvolva uma função que receba como parâmetro um array de números inteiros e responda com TRUE or FALSE se é possível obter uma sequencia crescente removendo apenas um elemento do array.

	Exemplos para teste 

	Obs.:-  É Importante  realizar todos os testes abaixo para garantir o funcionamento correto.
         -  Sequencias com apenas um elemento são consideradas crescentes

    [1, 3, 2, 1]  false
    [1, 3, 2]  true
    [1, 2, 1, 2]  false
    [3, 6, 5, 8, 10, 20, 15] false
    [1, 1, 2, 3, 4, 4] false
    [1, 4, 10, 4, 2] false
    [10, 1, 2, 3, 4, 5] true
    [1, 1, 1, 2, 3] false
    [0, -2, 5, 6] true
    [1, 2, 3, 4, 5, 3, 5, 6] false
    [40, 50, 60, 10, 20, 30] false
    [1, 1] true
    [1, 2, 5, 3, 5] true
    [1, 2, 5, 5, 5] false
    [10, 1, 2, 3, 4, 5, 6, 1] false
    [1, 2, 3, 4, 3, 6] true
    [1, 2, 3, 4, 99, 5, 6] true
    [123, -17, -5, 1, 2, 3, 12, 43, 45] true
    [3, 5, 67, 98, 3] true

     * */
    
	public function SequenciaCrescente(array $arr): bool {
        if(sizeof($arr) <= 2){
            return true;
        }
        foreach ($arr as $key=>$value) {
            $seq = $arr;
            unset($seq[$key]);
            $seqOrd = array_unique($seq);
            asort($seqOrd);
            if($seq === $seqOrd){
                return true;
            } 
                
        }
        return false;
    }
}

$teste = new Funcoes();
echo $teste->SeculoAno(1907);
echo "\n";
echo $teste->SeculoAno(1700);
echo "\n";
echo $teste->PrimoAnterior(10);
echo "\n";
echo $teste->PrimoAnterior(29);
echo "\n";
echo $teste->PrimoAnterior(23);

$multidimensional = array (
    array(25,22,18),
    array(10,15,13),
    array(24,5,2),
    array(80,17,15)
);

echo "\n";
echo $teste->SegundoMaior($multidimensional);

$sequencias = array(
    array(1, 3, 2, 1),
    array(1, 3, 2),
    array(1, 2, 1, 2),
    array(3, 6, 5, 8, 10, 20, 15),
    array(1, 1, 2, 3, 4, 4),
    array(1, 4, 10, 4, 2),
    array(10, 1, 2, 3, 4, 5),
    array(1, 1, 1, 2, 3),
    array(0, -2, 5, 6),
    array(1, 2, 3, 4, 5, 3, 5, 6),
    array(40, 50, 60, 10, 20, 30),
    array(1, 1),
    array(1, 2, 5, 3, 5),
    array(1, 2, 5, 5, 5),
    array(10, 1, 2, 3, 4, 5, 6, 1),
    array(1, 2, 3, 4, 3, 6),
    array(1, 2, 3, 4, 99, 5, 6),
    array(123, -17, -5, 1, 2, 3, 12, 43, 45),
    array(3, 5, 67, 98, 3)
);

foreach ($sequencias as $arr1) {
    echo "<br>";
    echo $teste->SequenciaCrescente($arr1) ? 'true' : 'false';
    //$teste->SequenciaCrescente($arr1);
}