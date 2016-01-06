<?php
date_default_timezone_set("America/Sao_Paulo");
setlocale(LC_ALL, 'pt_BR')
?>

</<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Questao 4</title>
	</head>
	<body>
	<form name="frmQuestao4" method="post" action="questao4.php"> 
		<label>Insira a Hora: </label>
		<input type="text" name="hora" id="id_hora" value="<?=date('h:i:s A')?>" maxlength="11" required="required" 
			placeholder="hr:min:seg am/pm ou AM/PM" pattern="^\d{1,2}:\d{2}:\d{2}\s(am|pm|AM|PM)?$"> 

			&nbsp;&nbsp; <label style="font-size:10px;">Formato: hora:minuto:seg am/pm ou AM/PM . Ex: 10:15:15 am </label>
		<br/>

		<input type="submit" id="Enviar" name="Enviar" Value="Enviar" >

	</form>

	</body>
</html>

<?php
	if($_POST['Enviar']){

		$tipo = substr($_POST['hora'], -2); // pego se é pm ou am		
		$tempo = $_POST['hora']; // variavel que recebe o restante digitado

		//list e explode para separar de acordo com o que preciso para validar
		list($hora, $minuto, $segundo) = explode(":", $tempo);

		// verifica o tipo para validar a zero hora
		if($tipo == 'AM' || $tipo == 'am'){

			if($hora == '00' && ( ($minuto >= '00' && $minuto <= '59') && ($segundo >= '00' && $segundo <= '59') ) ){
				echo "é meia noite"; exit;
			
			}elseif( ($hora > '00' && $hora < '12') &&  ( ($minuto >= '00' && $minuto <= '59') && ($segundo >= '00' && $segundo <= '59') ) ){
				
				echo "A Hora inserida foi: ".date('H:i:s', strtotime($hora.":".$minuto.":".$segundo)); exit;
			
			}else{
				echo "A Hora inserida para AM é inválida! Insira uma hora entre 00:00:00 AM e 11:59:59 AM"; exit;
			}

		}elseif($tipo == 'PM' || $tipo == 'pm'){

			if($hora == '12' && ( ($minuto >= '00' && $minuto <= '59') && ($segundo >= '00' && $segundo <= '59') ) ){				
				echo "A hora inserida é: ".date('H:i:s', strtotime($hora.":".$minuto.":".$segundo)); exit;

			}elseif( ($hora > '00' && $hora <= '12') &&  ( ($minuto >= '00' && $minuto <= '59') && ($segundo >= '00' && $segundo <= '59') ) ){
				echo "A Hora inserida foi: ".date('H:i:s', strtotime($hora.":".$minuto.":".$segundo)); die();

			}else{
				echo "A Hora inserida para PM é inválida! Insira uma hora entre 12:00:01 PM ou  01:00:00 e 11:59:59 PM"; exit;
			}
		}	
			


	}
?>