<?php
	date_default_timezone_set("America/Sao_Paulo");
	setlocale(LC_ALL, 'pt_BR');

	function verificaBalanceamentoParentesis($entrada, $counter = 0){

		if($counter < 0){ //Se começar com um ")" ou vier um ")" antes do "(" está incorreto... FALSE imediato
			return FALSE;
		}
		if(strlen($entrada) == 0 ){ //Se a string nao tiver mais nada, valida a resposta
			if($counter == 0){ // Se o contador for igual a ZERO, o número de ")" é igual ao "(", CORRRETO
				return TRUE;
			}
			else{
				return FALSE;
			}
		}
		else{
			$entrada[0] == "(" ? $counter++ : null;
			$entrada[0] == ")" ? $counter-- : null;
			return verificaBalanceamentoParentesis(substr($entrada,1), $counter); //Recursiva...
		}
	}
?>

</<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Questao 1</title>
	</head>
	<body>
	<form name="frmQuestao1" method="post" action="questao1.php"> 
		<label>Insira a string: </label>
		<input type="text" name="Texto" id="idTexto" maxlength="100" size="70" required="required" value="((1+1)*2) + (10+2) + (((2-1)-1)*1)"> 
		<br/>
		<input type="submit" id="Enviar" name="Enviar" Value="Enviar" >
	</form>

	</body>
</html>

<?php
	if($_POST['Enviar']){

		echo PHP_EOL."QUESTAO 1 RESPOSTA: ".PHP_EOL;
		echo "<br/><br/>";

		$entrada = $_POST['Texto'];

		print_r(verificaBalanceamentoParentesis($entrada));

		//$entrada = "((1+1)*2) + (10+2) + (((2-1)-1)*1)";
		
	}

?>