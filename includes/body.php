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

<div id="espaco"></div>
<table id="colunacentral"  cellspacing="0" cellpadding="20" >
<tbody>
<div id="noc" style="position:center;">
<marquee id="noc-marquee">
<?php  
echo 'Bienvenu Sur Mon Portofolio ! ! Nous sommes le '. $jour . '/' .$mois . '/'  .$annee .  ' et il est '      .$heure.    'h' .$minute
  ?>&nbsp; &nbsp; Besoin d'aide? <a href="#" value="eee">&nbsp;Cliquez Ici</a>
</marquee>
</div>
<p></font>



</tbody>




	<div id="content">


<!------------------------------------------------------------------------------------------------------------------>
<div id="bottom">hiiii</div>
	<div class="portfolio_wrap">
	<span class="comment_tag">
	<a title="Le Bar A Tino" href="http://www.lebaratino.fr"></a>
	</span>
	<a title="Le Bar A Tino" href="http://www.lebaratino.fr">
	<img alt="lebaratino" src="imagens/tino.png">
	</a>
	<h2 title="Le Bar A Tino">
	<a title="lebaratino" href="http://www.lebaratino.fr"</a>Le Bar A Tino</a>
	</h2>
	<small>Posté le: Lundi, 24 Septembre, 2012</small>
	<h3>Languages Utilisés</h3>
	<ul>
	<li>
	<a rel="tag"  href="">PHP</a>
	</li>
	<li>
	<a rel="tag"  href="">XML</a>
	</li>
	<li>
	<a rel="tag"  href="">Flash CSS3</a>
	</li>
	<li>
	<a rel="tag" href="" >Javascript</a>
	</li>
	</ul>
	<div class="cat-title">
	<a title="" target="_blank" href="">
	<img alt="" src="imagens/boneco.gif">
	</a>
	</div>
	</div>
<!------------------------------------------------------------------------------------------------------------------>
<div class="portfolio_wrap">
<span class="comment_tag">
<a title="Radio Just4Fun" href=""></a>
</span>
<a title="Radio Just4Fun" href="">
<img alt="Radio" src="imagens/radio.png">
</a>
<h2 title="Radio Just4Fun">
<a title="Radio" href="">Radio Just4Fun</a>
</h2>
	<small>Posté le: Lundi,10 Septembre, 2012</small>
	<h3>Languages Utilisés</h3>
<ul>
<li>
<a rel="tag" href="">xHTML</a>
</li>
<li>
<a rel="tag" href="">CSS</a>
</li>
<li>
<a rel="tag" href="">JQuery</a>
</li>
<li>
<a rel="tag" href="">XHTML</a>
</li>
</ul>
<div class="cat-title">
<a title="" target="_blank" href="">
<img alt="" src="imagens/bonecodesign.gif">
</a>
</div>
</div>
<!-------------------------------------------------------------------------------------------------------------------->
<div class="portfolio_wrap">	
		
	<span class="comment_tag">
	<a title="" href=""></a>
	</span>
	<a title="" href="">
	<img alt="" src="http://www.branded07.com/wp-content/gallery/web-design/hdlive-thumb.jpg">
	</a>
	<h2 title="">
	<a title="" href="">CountDown Live Script</a>
	</h2>
	<small>Posté le: Mardi, 4, Septembre 2012</small>
	<h3>Languages Utilisés</h3>
	<ul>
	<li>
	<a rel="tag" href="http://www.branded07.com/tag/css/">JQuery</a>
	</li>
	<li>
	<a rel="tag" href="http://www.branded07.com/tag/javascript/">xHTML</a>
	</li>
	<li>
	<a rel="tag" href="http://www.branded07.com/tag/photoshop/">CSS</a>
	</li>
	<li>
	<a rel="tag" href="http://www.branded07.com/tag/xhtml/">Javascript</a>
	</li>
	</ul>
	<div class="cat-title">
	<a title="Visit Hull Digital Live 09 Website" target="_blank" href="http://www.hdlive09.co.uk">
	<img alt="" src="imagens/bonecodesign.gif">
	</a>
	</div>
	</div>

<!-------------------------------------------------------------------------------------------------------------------->

<div id="menu" >
<div class="box-header-title"> Rejoignez-Moi </div>
<ul class="socialicons">
<p>
<a href="#"><img src="imagens/facebook.png"   >&nbsp;</a>
<a href="#"><img src="imagens/twitter.png" > &nbsp;</a>
<a href="#"><img src="imagens/skype.png" > &nbsp;</a>
<a href="#"><img src="imagens/youtube.png" > &nbsp;</a>
<a href="#"><img src="imagens/steam.png"   >&nbsp;</a>
</a>
</ul>

<div class="box-header-title"><b>Heure Local</b></div>
<div id="blog-content">

<div id="relogio" style="text-align: center; min-height: 50px;">
<font size="2px"> (UTC+01:00) Madrid, Paris</font></br>
<script>
function startTime()
{
var today=new Date();
var h=today.getHours();
var m=today.getMinutes();
var s=today.getSeconds();
// add a zero in front of numbers<10
m=checkTime(m);
s=checkTime(s);
document.getElementById('txt').innerHTML=h+"<blink>:</blink>"+m+"<blink>:</blink>"+s;
t=setTimeout(function(){startTime()},500);
}

function checkTime(i)
{
if (i<10)
  {
  i="0" + i;
  }
return i;
}
</script>
<body onload="startTime()">
<div id="txt"></div>
<br>
<br>    
</div>
</div>

<div class="box-header-title"> ??? </div>
<ul>
<li class="link"><font color="white">
<a href="plus tard"><font color="white" font size="2.1em">Accueil</a>
</li>
<div class="divider2"></div>
<li class="link">
<a href="plus tard"><font color="white">Services</a>
</li>
<div class="divider2"></div>
<li class="link">
<a href="plus tard"><font color="white">Projets</a>
</li>
<div class="divider2"></div>
<li class="link">
<a href="plus tard"><font color="white">Contacts</a>
</li>
</ul>
<p><div class="box-header-title"> ????? </div></font>

<p>
<p>
<p>
<p>

	<p>
<p>
<p>
<p><p>
<p>
<p>
<p><p>
<p>
<p>
<p>

</div>
</div>
</font>
</div>
</div>
</div>

</table>


