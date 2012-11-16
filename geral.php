<?php

function extenso($valor = 0, $maiusculas = false) {

	$singular = array("centavo", "real", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
	$plural = array("centavos", "reais", "mil", "milhões", "bilhões", "trilhões",
	"quatrilhões");
	
	$c = array("", "cem", "duzentos", "trezentos", "quatrocentos",
	"quinhentos", "seiscentos", "setecentos", "oitocentos", "novecentos");
	$d = array("", "dez", "vinte", "trinta", "quarenta", "cinquenta",
	"sessenta", "setenta", "oitenta", "noventa");
	$d10 = array("dez", "onze", "doze", "treze", "quatorze", "quinze",
	"dezesseis", "dezesete", "dezoito", "dezenove");
	$u = array("", "um", "dois", "três", "quatro", "cinco", "seis",
	"sete", "oito", "nove");
	
	$z = 0;
	$rt = "";
	
	$valor = number_format($valor, 2, ".", ".");
	$inteiro = explode(".", $valor);
	for($i=0;$i<count($inteiro);$i++)
	for($ii=strlen($inteiro[$i]);$ii<3;$ii++)
	$inteiro[$i] = "0".$inteiro[$i];
	
	$fim = count($inteiro) - ($inteiro[count($inteiro)-1] > 0 ? 1 : 2);
	for ($i=0;$i<count($inteiro);$i++) {
	$valor = $inteiro[$i];
	$rc = (($valor > 100) && ($valor < 200)) ? "cento" : $c[$valor[0]];
	$rd = ($valor[1] < 2) ? "" : $d[$valor[1]];
	$ru = ($valor > 0) ? (($valor[1] == 1) ? $d10[$valor[2]] : $u[$valor[2]]) : "";
	
	$r = $rc.(($rc && ($rd || $ru)) ? " e " : "").$rd.(($rd &&
	$ru) ? " e " : "").$ru;
	$t = count($inteiro)-1-$i;
	$r .= $r ? " ".($valor > 1 ? $plural[$t] : $singular[$t]) : "";
	if ($valor == "000")$z++; elseif ($z > 0) $z--;
	if (($t==1) && ($z>0) && ($inteiro[0] > 0)) $r .= (($z>1) ? " de " : "").$plural[$t];
	if ($r) $rt = $rt . ((($i > 0) && ($i <= $fim) &&
	($inteiro[0] > 0) && ($z < 1)) ? ( ($i < $fim) ? ", " : " e ") : " ") . $r;
	}
	
	if(!$maiusculas){
	return($rt ? $rt : "zero");
	} else {
	
	if ($rt) $rt=ereg_replace(" E "," e ",ucwords($rt));
	return (($rt) ? ($rt) : "Zero");
	}

}

function f5diautil($mes,$ano){
		
		return fdiautil($mes,$ano,5);
}

function fdiautil($mes,$ano,$dia){
	$i = 1;
		$du = 0;
		
		do{
			$data = mktime(0,0,0,$mes,$i,$ano);
			$diasemana = date("w",$data);
			if ($diasemana > 0 && $diasemana < ($dia + 1)){
				//01-Janeiro
				
				if (( $mes == 1 && $i == 1 ) || 
				    ( $mes == 4 && $i == 6 ) ||
				    ( $mes == 5 && $i == 1 ) ||
				    ( $mes == 6 && $i == 8 ) ||
				    ( $mes == 7 && $i == 9 ) ||
				    ( $mes == 9 && $i == 7 ) ||
				    ( $mes == 11 && $i == 2 ) ){
				   		
				}else{ 
					$du++;
				}	
			}
			$i = $i + 1;
		}while($du < 5);
		
		return $data;
}


function gerarNossoNumero($codigoBoleto){
	 $resultado = "80" . formata_numero($codigoBoleto,13,0);
	 $resultado = $resultado .digitoVerificador_nossonumero($resultado);
	 
	 return $resultado;
}

function digitoVerificador_nossonumero($numero) {
	$resto2 = modulo_11($numero, 9, 1);
     $digito = 11 - $resto2;
     if ($digito == 10 || $digito == 11) {
        $dv = 0;
     } else {
        $dv = $digito;
     }
	 return $dv;
}

function formata_numero($numero,$loop,$insert,$tipo = "geral") {
	if ($tipo == "geral") {
		$numero = str_replace(",","",$numero);
		while(strlen($numero)<$loop){
			$numero = $insert . $numero;
		}
	}
	if ($tipo == "valor") {
		/*
		retira as virgulas
		formata o numero
		preenche com zeros
		*/
		$numero = str_replace(",","",$numero);
		while(strlen($numero)<$loop){
			$numero = $insert . $numero;
		}
	}
	if ($tipo == "convenio") {
		while(strlen($numero)<$loop){
			$numero = $numero . $insert;
		}
	}
	return $numero;
}
function modulo_11($num, $base=9, $r=0)  {
    /**
     *   Autor:
     *           Pablo Costa <pablo@users.sourceforge.net>
     *
     *   Fun��o:
     *    Calculo do Modulo 11 para geracao do digito verificador 
     *    de boletos bancarios conforme documentos obtidos 
     *    da Febraban - www.febraban.org.br 
     *
     *   Entrada:
     *     $num: string num�rica para a qual se deseja calcularo digito verificador;
     *     $base: valor maximo de multiplicacao [2-$base]
     *     $r: quando especificado um devolve somente o resto
     *
     *   Sa�da:
     *     Retorna o Digito verificador.
     *
     *   Observa��es:
     *     - Script desenvolvido sem nenhum reaproveitamento de c�digo pr� existente.
     *     - Assume-se que a verifica��o do formato das vari�veis de entrada � feita antes da execu��o deste script.
     */                                        

    $soma = 0;
    $fator = 2;

    /* Separacao dos numeros */
    for ($i = strlen($num); $i > 0; $i--) {
        // pega cada numero isoladamente
        $numeros[$i] = substr($num,$i-1,1);
        // Efetua multiplicacao do numero pelo falor
        $parcial[$i] = $numeros[$i] * $fator;
        // Soma dos digitos
        $soma += $parcial[$i];
        if ($fator == $base) {
            // restaura fator de multiplicacao para 2 
            $fator = 1;
        }
        $fator++;
    }

    /* Calculo do modulo 11 */
    if ($r == 0) {
        $soma *= 10;
        $digito = $soma % 11;
        if ($digito == 10) {
            $digito = 0;
        }
        return $digito;
    } elseif ($r == 1){
        $resto = $soma % 11;
        return $resto;
    }
}


?>