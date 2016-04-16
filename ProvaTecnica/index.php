<?php
 session_start();
 if($_SESSION['logou']=='s'){
	 session_destroy();
 };
?>
<html>
<head>
<meta charset="UTF-8">
<title> Login - Thiago Serrano</title>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/ajaxLogin.js"></script>
<!--<link rel="stylesheet" href="css/styleloading.css">-->
<link rel="stylesheet" href="css/style.css">
<script>
	$("document").ready(function(){
		$("#wrap").hide();
		$("#SemConta").hide();
		$("#mask").hide();
		$("#btnLogin").click(function(){
			var login = $("#Login").val();
			var senha = $("#senha").val();
			if(login.length>0 && senha.length>0)
			{
				$("#wrap").show("fast");
				var maskHeight = $(document).height();
				var maskWidth = $(window).width();
				$('#mask').css({'width':maskWidth,'height':maskHeight});
				//efeito de transição
				$('#mask').fadeIn(100);
				//$('#mask').fadeTo("slow",0.8);
				respostaServidor();
			}
			else if (login.length==0 || senha.length==0)
			{
				alert("O Login ou a Senha estão vazios!");
			};
		});
		$("#SemConta").click(function(){
			window.open("cadastrar.php");
		});
	});
</script>
</head>
<BODY ID="body">
<div class="mask" id="mask">
<div class="window" id="wrap">
<div class="wrap">
  <div class="bg">
    <div class="loading">
      <span class="title">loading</span>
      <span class="text">Loading</span>
    </div>
  </div>
</div>
</div>

</div>

</body>
<body>
<canvas id="c"></canvas>
<center>
<div id="pulaMuitaLinha"></div>
	
	<form name="login" id="msform" method="post">
	<fieldset>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bem Vindo!<br><br>
	Login &nbsp;<input type="text" name="Login" id="Login" value="" placeholder="Digite o Login....." required /><br>
	Senha <input type="password" name="senha" id="senha" value="" placeholder="Digite a Senha...." required /><br>
	<div id="SemConta">
		<a href="" id="Cadastrar"/>Cadastrar</a>
	</div>
	<input type="button" class="action-button" id="btnLogin" name="btnLogin" value="Logar!"/>
	</fieldset>
	</form>
	
</center>

<?php
include("loading.html");
?>
</body>

<script type="text/javascript">
var c = document.getElementById("c");
var ctx = c.getContext("2d");

//making the canvas full screen
c.height = window.innerHeight;
c.width = window.innerWidth;

//chinese characters - taken from the unicode charset
var chinese = "田由甲申甴电甶男甸甹町画甼甽甾甿畀畁畂畃畄畅畆畇畈畉畊畋界畍畎畏畐畑";
//converting the string into an array of single characters
chinese = chinese.split("");

var font_size = 10;
var columns = c.width/font_size; //number of columns for the rain
//an array of drops - one per column
var drops = [];
//x below is the x coordinate
//1 = y co-ordinate of the drop(same for every drop initially)
for(var x = 0; x < columns; x++)
	drops[x] = 1; 

//drawing the characters
function draw()
{
	//Black BG for the canvas
	//translucent BG to show trail
	ctx.fillStyle = "rgba(0, 0, 0, 0.05)";
	ctx.fillRect(0, 0, c.width, c.height);
	
	ctx.fillStyle = "#0F0"; //green text
	ctx.font = font_size + "px arial";
	//looping over drops
	for(var i = 0; i < drops.length; i++)
	{
		//a random chinese character to print
		var text = chinese[Math.floor(Math.random()*chinese.length)];
		//x = i*font_size, y = value of drops[i]*font_size
		ctx.fillText(text, i*font_size, drops[i]*font_size);
		
		//sending the drop back to the top randomly after it has crossed the screen
		//adding a randomness to the reset to make the drops scattered on the Y axis
		if(drops[i]*font_size > c.height && Math.random() > 0.975)
			drops[i] = 0;
		
		//incrementing Y coordinate
		drops[i]++;
	}
}

setInterval(draw, 33);
</script>
<html>