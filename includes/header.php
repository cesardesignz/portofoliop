<?php 

/*******************************************************************************|
| Project Name: Cesar'z Design'z 												|
|    File Name: Index.php														|
|  Description: a meter															|
|-------------------------------------------------------------------------------|
|               C O P Y R I G H T												|
|------------------------------------------------------------------------------|
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

	require_once ("includes/vars.php");
	
	
/* ========================= Fim Configuraçao ============================== */
?>
	
<head>
<link href="style.css" rel="stylesheet" type="text/css"/>
<link href="imagens/favicon.ico" rel="icon" type="image/x-icon"/>



<script language="Javascript">
function OpenMailClient () {
window.location = "mailto:" + "c" + "e" + "s" + "a" + "r" + "d" + "@o" + "xyl" + "us." + "ro";
}

</script>
<?php  print "$head"; ?>	




<body>




<div id="header1">
			<div class="inner">
				
				<ul id="user_menu">  
					<li><a href="/account/signin">Login</a></li>
					<li class="last"><a href="/users/creer-compte-utilisateur.php">Register</a></li>
				</ul>


				<ul id="main_menu">
					
					<li><a href="index.php" class="home_lk">Accueil</a></li>
					<li><a href="services.php" class="browse_files_lk">Services</a></li>
					<li><a href="/faq/" class="help_faq_lk">Projets</a></li>
					<li><a href="./contact/" class="support_forum_lk">Contact</a></li>
<!--					<li><a href="/links" class="links_lk">Links</a></li>-->
					<li><a href="/contact" class="contact_us_lk">Fan Page</a></li>
				</ul>
			</div>
		</div>
		<!--[if !IE]>end header<![endif]-->
		
		<!--[if !IE]>start content<![endif]-->

<!--<a href="#" title="Ir para o site!"><input class="input_Design" value="Accueil" type="button"></a>&nbsp;&nbsp;
<a href="" title=""><input id="nav_discussion" class="input_Design " value="Services" type="button"></a>&nbsp;&nbsp;
<a href="" title=""><input id="nav_members" class="input_Design " value=" Projets  " type="button"></a>&nbsp;&nbsp;
<a href="" title=""><input id="nav_app_calendar" class="input_Design " value="  Contact  " type="button"></a>&nbsp;&nbsp;
<a href="" title=""><input id="nav_app_upload" class="input_Design " value=" ????  " type="button"></a>&nbsp;&nbsp;
-->
<!--<li id="search_bar">
<div class="ard"></div>
<form id="recherche" action="codigoweb/index.php" method="get">
<input id="champ_recherche" type="text" value="Procurar" accesskey="4" name="src">
<select id="section_recherche" name="c">
<option value="codigoweb">?????</option>
</select>
<input class="button_go_search" type="submit" value="Go">&nbsp;&nbsp;

</form>
</li>
</ul>
-->
