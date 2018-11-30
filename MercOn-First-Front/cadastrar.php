<!DOCTYPE html><html>  
  <head>
    <meta content="text/html;charset=utf-8" />
    <link rel="stylesheet" href="css/style.css" type="text/css">    
<link href="css/font.css" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> MercOn</title> 

    <script>
		function formatar(mascara, documento){
 		 var i = documento.value.length;
 		 var saida = mascara.substring(0,1);
 		 var texto = mascara.substring(i)
  
 		 if (texto.substring(0,1) != saida){
            documento.value += texto.substring(0,1);
  			}
  
		}
	</script>

  </head>

<div class="pagina">
    
  
    <!-- Cabeçalho -->
    <div class="cabecalho">
      <a href="index.php"><img src="img/logo.png" height="75" width="230"/></a>
    </div>
    
    <!-- Cadastro -->
    <div>
<div class="log">
	<form action="action_page.php" style="border:0px solid #ccc">
	<div class="container">

			<center><p id="title"><b>Cadastro</b></p></center>

			<input type="text" placeholder="NOME" name="nome" required>
			<input type="text" placeholder="SOBRENOME" name="sobrenome" required>
			<input type="text" placeholder="CPF" name="cpf" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)" required>
			<input type="text" placeholder="TELEFONE" name="tel" maxlength="12" OnKeyPress="formatar('## #########', this)" required>
			<input type="text" placeholder="ENDEREÇO" name="endereco" required>
			<input type="text" placeholder="COMPLEMENTO" name="comp" required>
			<input type="email" placeholder="E-MAIL" name="email" required>
			<input type="password" placeholder="SENHA" minlength="8" name="senha" required>
			<input type="password" placeholder="CONFIRMAR SENHA" minlength="8" name="confSenha" required>
			<input type="checkbox" checked="checked" name="lembrar" style="margin-bottom:15px"> Lembrar-me

			<p>Ao criar uma conta, você concorda com nossos <a href="#" style="color:dodgerblue">Termos e Privacidade</a>.</p>

		<div class="clearfix">
			<button type="submit" class="signupbtn">Cadastrar-se</button>
			<a href="index.php"><button type="button" class="cancelar">Cancel</button></a>
		</div>
	</div>
	</form>
		
		
	</div>	
	</div>


    <!-- Rodapé -->
    <div class="rodape">
		<center>
		<h5>ENTRE EM CONTATO</h5>
		<h4>(61) 8888-8888</h4>
     		<small>Todos os direitos reservados.</small>      
		</center>
   	</div>

</div>
  </body>  
</html>
