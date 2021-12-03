<?php session_start(); ?>
<html>
  <header>
    <meta charset='utf8'></meta>
    <title>Welcome!</title>
    <link href="mainpagestyle.css" rel="stylesheet" type="text/css">
  </header>
  <body>
        <div id='main'>
		<div id="header">
			<div id="logo"><p>Логотип супер крутого магазина!</p></div>
			<div id="controlpanel">
                <?php 
                    if (empty($_SESSION['login']) or empty($_SESSION['id'])) {
                        echo "<p>Вы не авторизированны на сатйе.<br><a  href='regauthpage.html'>Авторизация</a></p>";
                    } else {
                        echo "<p>Вы вошли на сайт, как ".$_SESSION['login']."<br><a  href='exit.php'>Выход</a></p>";
                    }
                ?>
			</div>
		</div>
		<div id="content">
			<p>Здесь будут товары</p>
		</div>
		<div id="footer">
			<p>@ИУ4-12Б Архипов Артём.</p>
		</div>
	</div>
  </body>
</html>