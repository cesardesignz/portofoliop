<?php
	/*******************************************************************************|
	|   Project Type: PHP/HTML
	|	Project Name: Cesar'z Design'z 												|
	|   File Name: Tutophp.php														|
	|   Description: ERROR 404 NOT FOUND															|
	|-------------------------------------------------------------------------------|
	|               C O P Y R I G H T												|
	|-------------------------------------------------------------------------------|
	|        Copyright (c) 2012 by César Silva A.K.A tHc     All rights reserved.	|
	|-------------------------------------------------------------------------------|
	|               A U T H O R   I D E N T I T Y									|
	|-------------------------------------------------------------------------------|
	| Initials   Name                 Contact                       Company			|
	| --------   ------------------   ---------------------------   ----------------|
	| CS         César Silva       contacto@cesarzdesignz.com        Gamming4Fun	|
	|-------------------------------------------------------------------------------|
	| Date         Ver   Author  Description										|
	| 03-05-12     1.0    CS     Starting Code...									|
	|*******************************************************************************|
	/* ========================= Configuraçao ================================== */
	define("kContactEmail","contacto@cesarzdesignz.com");
	require_once ("includes/vars.php");
	require_once ("mysql.php");
	/* ========================= Fim Configuraçao ============================== */
?>
      <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
      <html xmlns="http://www.w3.org/1999/xhtml" lang="pt" xml:lang="pt">
<head>
<link href="style.css" rel="stylesheet" type="text/css"/>
<link href="imagens/favicon.ico" rel="icon" type="image/x-icon"/>
<?php print "$head"; ?>

</head>

<body>
<body bgcolor="#090909" />
<!-- BARRA BOTOES---------------------------------------------------------------------->
<div id="barrabotoes"  alt="menu">
<a href="tutophp.php" title="Ir para o site!"><input class="input_Design" value="Tutorial PHP" type="button">&nbsp;&nbsp;
<a href="" title=""><input id="nav_discussion" class="input_Design " value="  ???? " type="button">&nbsp;&nbsp;
<a href="" title=""><input id="nav_members" class="input_Design " value="  ????  " type="button"></a>&nbsp;&nbsp;
<a href="" title=""><input id="nav_app_calendar" class="input_Design " value="  ????  " type="button">&nbsp;&nbsp;
<a href="" title=""><input id="nav_app_upload" class="input_Design " value=" ????  " type="button">&nbsp;&nbsp;
</div>
<br /> 
<table id="colunacentral" cellspacing="0" cellpadding="10" align="center">
<tbody>
<td>
<div id="noc" style="position:center;">
<marquee id="noc-marquee">
<?php  
echo 'Bienvenu Sur Notre Site ! ! Nous sommes le '. $jour . '/' .$mois . '/'  .$annee .  ' et il est '      .$heure.    'h' .$minute ;
  ?>
</marquee>
</div><p><p><p><p></p>
<div id="links2">
<center>
<font color="white"><div class="box-header-title"> POR DEFINIR </div><ul><li>


<a href="pages.php?page=9">???</a></li>

<div class="divider2"></div><li>

<a href="pages.php?page=7">????</a></li></ul>
<div class="box-header-title-mini"> ?????</div>
<div id="blog-content">
<div id="blog-loading" style="text-align: center; min-height: 112px;">
<?php  
echo 'Bonjour ! Nous sommes le '. $jour . '/' .$mois . '/'  .$annee .  ' et il est'       .$heure.             'h' .$minute;
  ?>
<br><br><p></p></div></div>
<div class="box-header-title-mini"> ????? </div>
<ul>
<li class="link">
<a href="http://www.sa-mp.com">?????</a>
</li>
<div class="divider2"></div>
<li class="link">
<a href="http://www.gtaforums.com/">?????</a>
</li>
<div class="divider2"></div>
<li class="link">
<a href="http://www.rockstargames.com/">????</a></li></ul></div></center>
<div id="caixacentral1">

<font color="black"/>
<b>Tutorial Bases PHP</b>
<p>
<center><image src="imagens/php.png" /></center>
<b><center><h2>verificar capitulo google docs/foto+tipos de aspas php com banerzinho </h2></center></b>


<image src="imagens/new.png" width="759px;" align="center" />
<p>

<div class="info1php" style=" height:88px;"><image src="imagens/info.png" align="left" /><p><i>Existem outras balizas para usar o PHP como <font color="red">
< ?  ? >, <% %></font>,etc não fique espantado se ver outro tipo de balizas PHP,mas a forma mais correcta é a &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; que vamos usar ao longo deste tutorial.</div></i>
<table id="nav" style="height: 90px; border-collapse:collapse;text-align:left;margin:17px auto 0;direction:ltr">
<tbody>
<tr valign="top">
<td class="b navend">
</td>
<td class="cur">
1
</td>
<td>
<a class="fl" href="tutophp2.php">
2
</a>
</td>
<td>
3
</a>
</td>
<td>
<a class="fl" href="">
</td>
<td>
<a class="fl" href="">

5
</a>
</td>
<td>
<a class="fl" href="">

6
</a>
</td>
<td>
<a class="fl" href="">

7
</a>
</td>
<td>
<a class="fl" href="">
8
</a>
</td>
<td>
<a class="fl" href="">
9
</a>
</td>
<td>
<a class="fl" href="div#divider2">
10
</a>
</td>
<td class="b navend">
<a id="pnnext" class="pn" style="text-decoration:none;text-align:left" href="">

</a>
</td>
</tr>
</tbody>
</table>

</div>		

		
</font>	
</div>
</tbody>
</body>

</html>