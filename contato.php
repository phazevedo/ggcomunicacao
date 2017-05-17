<?php
	if (isset($_POST["submit"])) {
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$mensagem = $_POST['mensagem'];
		$human = intval($_POST['human']);
		$from = 'Teste'; 
		$to = 'vinnitog@gmail.com'; 
		$subject = 'Mensagem vinda do Teste ';
		
		$body = "From: $nome\n E-Mail: $email\n Message:\n $mensagem";
 
		// Checa se o nome foi inserido
		if (!$_POST['nome']) {
			$errName = 'Por favor, insira seu nome';
		}
		
		// Checa se o email inserido é valido
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Por favor, insira um email válido';
		}
		
		// Checa se a mensagem foi inserida
		if (!$_POST['mensagem']) {
			$errMessage = 'Por favor, escreva uma mensagem';
		}
 
// Se não houverem erros, enviar o email
if (!$errName && !$errEmail && !$errMessage) {
	if (mail ($to, $subject, $body, $from)) {
		$result='<div class="alert alert-success">Thank You! I will be in touch</div>';
	} else {
		$result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
	}
}
	}
?>