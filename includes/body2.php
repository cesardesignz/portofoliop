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
<div id="noc">
<marquee id="noc-marquee">
<?php  
echo 'Bienvenu Sur Mon Portofolio ! ! Nous sommes le '. $jour . '/' .$mois . '/'  .$annee .  ' et il est '      .$heure.    'h' .$minute
  ?>&nbsp; &nbsp; Besoin d'aide? <a href="#" value="eee">&nbsp;Cliquez Ici</a>
</marquee>
</div>
<p></font>



<div id="main_pane_left">
<div class="group">
<h2>Mes Competences</h2>
<ul>
    <section class="details row">
    <div class="span6">

<ul class="skills">
<li class="html5">HTML5</li>
<li class="css3">CSS & CSS3</li>
<li class="jquery">jQuery</li>
<li class="php">PHP 5.4 & MySQL</li>
<li class="laravelfw">Zend Framework Developper</li>
</ul>
</div>
</section>
</div>
</div>
<div id="main_pane_right">
    <div class="group2">
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






<!--<section class="quotes">
    <article>
        <p>Technique is just a means of arriving at a statement</p>
        <em>Jackson Pollock</em>
    </article>
    <article>
        <p>Perhaps a human language is possible in which the intent of meaning is actually beheld in three-dimensional space</p>
        <em>Terence Mckenna</em>
    </article>
    <article>
        <p>All the virgin eyes in the world are made of glass</p>
        <em>Mina Loy</em>
    </article>
    <article>
        <p>We are intensely aware of man as a machine and the body as a mechanism</p>
        <em>Oskar Schlemmer</em>
    </article>
    <article>
        <p>It is already too late, and it will go on being even later</p>
        <em>Alison Lurie</em>
    </article>
    <article>
        <p>Science cannot be stopped. Man will gather knowledge no matter what the consequences - and we cannot predict what they will be</p>
        <em>Linus Pauling</em>
    </article>
    <article>
        <p>No one can witness the fall of the ice palace. It takes place at night, after all the children are in bed.</p>
        <em>Tarjei Vesaas</em>
    </article>
    <article>
        <p>The biological object is made of time as much as it is made of space and matter</p>
        <em>Terence McKenna</em>
    </article>
    <article>
        <p>The union of the mathematician with the poet, fervor with measure, passion with correctness, this surely is the ideal</p>
        <em>William James</em>
    </article>
    <article>
        <p>Mind is a captive of the body</p>
        <em>Camille Paglia</em>
    </article>
    <article>
        <p>Your order is meaningless, my chaos is significant</p>
        <em>Nathaniel West via Amos Vogel</em>
    </article>
    <article>
        <p>Every thing existing on the physical plane is an exteriorization of thought, which must be balanced through the one who issued the thought, and in accordance with that one's responsibility, at the conjunction of time, condition, and place</p>
        <em>Harold W</em>
    </article>
    <article>
        <p>I wanted to be alone in quite an unusual, new way. The very opposite of what you are thinking: namely, without myselfâ€¦</p>
        <em>Pirandello</em>
    </article>
    <article>
        <p>I love forms beyond my own, and regret the borders between us</p>
        <em>Loren Eiseley</em>
    </article>
    <article>
        <p>The bedrock basic stratum of reality is irreality; the universe is irrational because it is built not on mere shifting sand - but on that which is not</p>
        <em>Philip K Dick</em>
    </article>
</section>  
	

<!------------------------------------------------------------------------------------------------------------------>


<!-------------------------------------------------------------------------------------------------------------------->


</div>
</div>
</div>

</table>


