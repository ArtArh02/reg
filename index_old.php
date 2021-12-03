<?php
    session_start();
	if (empty($_SESSION['login']) or empty($_SESSION['id']))	{
		readfile('regauthpage.html');
		exit();
	}
?>
<html>
  <header>
    <meta charset='utf8'></meta>
    <title>Welcome!</title>
    <link href="mainpagestyle.css" rel="stylesheet" type="text/css">
  </header>
  <body>
	<div id='main'>
		<div id="header">
			<div id="logo"><p>Здесь будет логотип!</p></div>
			<div id="controlpanel">
				<?php 
					echo "<p>Вы вошли на сайт, как ".$_SESSION['login']."<br><a  href='exit.php'>Выход</a></p>"
				?>
			</div>
		</div>
		<div id="content">
			<p>Контент для зарегистрированных пользователей.</p>
		</div>
		<div id="footer">
			<p>@ИУ4-12Б Архипов Артём.</p>
		</div>
	</div>
  </body>
</html>
