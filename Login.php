<!DOCTYPE>
<html>
    <head>  
	<?php
        session_start();
    ?>
    <meta charset="UTF-8">
    <title> Login </title>
    </head>
	
      <body>
	<form action="Logar.php" method="POST"><br>
	<legend>Usuário:</legend> 
	<!--Required é aquela valição bosta, mas funciona-->
    <input type="text" name="user" required>
    <br><br>
    <legend>Senha:</legend> 
    <input type="password" name="senha" required>
    <br><br>
    <input type="submit" value="login"><br>
	<h1 style="color:red">
    <?php
        if (isset($_SESSION['ErroLogin']))
        {
            echo $_SESSION['ErroLogin'];
            unset ($_SESSION['ErroLogin']);							
        }
    ?>
    </h1>
	
	</form>
</body>
</html>
