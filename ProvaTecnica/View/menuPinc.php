<?php
	//session_start();
	if($_SESSION['logou']!='s'){
		header("location: ../index.php");
		exit;
	}
	//echo $n;
	

?>
<html>
<head>
<title>Menu Principal</title>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/btnLogOut.css">
<script>
 $(document).ready(function(){
	 
    $('.teste').click(function(){
        $('.teste2').slideToggle('fast');
        });
    });
</script>
</head>
<body>
<canvas id="c"></canvas>
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
<center>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="foto">
	<img src="../img/fail.png">
</div>
</center>
<ul class="navbar cf">
			<li><a href="../Model/mMenu.php"> Home</a> </li>
            <li><a href="#">Cadastros</a>
                <ul>
					<li><a href="../Model/cadCliente.php">Cadastro de Clientes</a></li>
					<li><a href="../Model/cadServ.php">Cadastro de Servi&ccedil;o</a></li>
                </ul>		
            </li>
            <li><a href="#">Pesquisas</a>
				<ul>
					<li><a href="../Model/pesqServ.php">Servi&ccedil;os Contratados</a></li>
				</ul>
			</li>
            <div class="logindiv">
				<div class="loginfoto">
					<a class="teste"><img class="imgLogin" src="../img/logo.png" width="40" height="40" id="jcrop"/></a>
				</div>	
				<div class="teste2">
					<li class="LogOut"><a href="../index.php">Log Out</a></li><Br><!-- É nesta parte do código que o botão log out é feito -->
				</div>
            </div>
            <div class="login">
                Bem Vindo! <?php echo $n; ?>
            </div>
		</ul>		
</body>
</html>