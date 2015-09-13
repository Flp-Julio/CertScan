<?php
##Script de Verificação SSL
##Esse script aceita argumentos de 1 a 8 (Ex: -1,2,3,7)

$command = "echo '			   \033[01;37m[#######]  VERIFICAÇÃO DE CERTIFICADOS  [#######]\033[m'";
system($command);

$target = $argv[1];

if( count($argv) < 3 )
{
	um($target);dois($target);tres($target);quatro($target);cinco($target);seis($target);sete($target);
	exit;
}

$arguments = $argv[2];

$argumentsArray = explode(",", $arguments);

for($i=0; $i<count($argumentsArray); $i++){

	if($i==0)
		$argumentsArray[$i] = trim($argumentsArray[$i], "-");	
	
	switch($argumentsArray[$i]){
	case 1:
		um($target);
		break;
	case 2:
		dois($target);
		break;
	case 3:
		tres($target);
		break;
	case 4:
		quatro($target);
		break;
	case 5:
		cinco($target);
		break;
	case 6:
		seis($target);
		break;
	case 7:	
		sete($target);
		break;
	}
}

function um($target){
	$command = "echo '\033[01;33mVerificando TLS Renegotiation em \033[01;32m {$target}\033[01;33m ...\033[m'";
	system($command);
	$command = "sslscan {$target} | grep -i -E 'session renegotiation'";
	system($command,$dados);
}
function dois($target){
	$command = "echo '\033[01;33mVerificando Heartbleed em \033[01;32m {$target}\033[01;33m ...\033[m'";
	system($command);
	$command = "sslscan {$target} | grep -E 'vulnerable'";
	system($command,$dados);
}
function tres($target){
	$command = "echo '\033[01;33mBuscando versão obsoleta do protocolo SSL em \033[01;32m {$target}\033[01;33m ...\033[m'";
	system($command);
	$command = "sslscan {$target} | grep -E 'Accepted.*SSLv' | cut -d \" \" -f1,2,3 | uniq ";
	system($command,$dados);
}
function quatro($target){
	$command = "echo '\033[01;33mVerificando suporte a cifras RC4 em \033[01;32m {$target}\033[01;33m ...\033[m'";
	system($command);
	$command = "sslscan {$target} sslscan {$target} | grep -E 'TLS.*RC4' | cut -d \" \" -f1,4,5,6,8,9,10,11 | uniq | grep -v '^TLS' | grep -v '^SSL'";
	system($command,$dados);
}
function cinco($target){
	$command = "echo '\033[01;33mVerificando BEAST SSL/TLS Attack em \033[01;32m {$target}\033[01;33m ...\033[m'";
	system($command);
	$command = "sslscan {$target} | grep -E 'TLSv1.0.*CBC' | cut -d \" \" -f1,4,5,6,8,9,10,11 | uniq | grep -v '^TLS' | grep -v '^SSL'";
	system($command,$dados);
}

function seis($target){
	$command = "echo '\033[01;33mVerificando FREAK SSL Attack em \033[01;32m {$target}\033[01;33m ...\033[m'";
	system($command);
	$command = "sslscan {$target} | grep -E 'TLS.*EXP'  | cut -d \" \" -f1,4,5,6,8,9,10,11 | uniq | grep -v '^TLS' | grep -v '^SSL'";
	system($command,$dados);
}

function sete($target){
	$command = "echo '\033[01;33mVerificando assinatura do certificado em \033[01;32m {$target}\033[01;33m ...\033[m'";
	system($command);
	$command = "sslscan {$target} | grep -E 'RSA Key'";
	system($command,$dados).empty($dados[0]) ? exit() : NULL;
}

##Por Luiz F S Julio
##Esse script faz uso do SSLScan https://www.titania.com  -  http://sourceforge.net/projects/sslscan
?>
