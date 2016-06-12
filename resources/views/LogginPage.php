<html>
	<head>
		<link rel="stylesheet" href="css/styles.css" type="text/css">
		<title>Вход</title>
		<meta charset="utf-8">
                <link rel="shortcut icon" href="images/favicon.png">
	</head>
	<body>
		<div id="login">
                    <form id="loginForm" action="Dashboard" method="post">
				<img src="images/php.png" style="width:80%;height:200px;background-color:white;">
				<input type="text" name="username" placeholder="Въведете факултетен номер" required="required" />
				<input type="password" name="password" placeholder="Въведете парола" required="required" />
                                <input type="hidden" name="_token" value="<?=csrf_token();?>">
                                <?php 
                                if(isset($isLogginDetailsOK) && $isLogginDetailsOK==false)
                                {
                                ?>
                                <div class="loginError">Грешни потребителски детайли!</div>
                                <?php
                                }
                                ?>
				<input class="buttonBlue" type="submit" value="Вход" />
                    </form>
		</div>     
	</body>      
</html>