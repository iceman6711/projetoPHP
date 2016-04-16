<html>
<head>
	<title>Novo Login</title>
	<meta charset="UTF-8">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/ajaxCadastra.js"></script>
	<link rel="stylesheet" href="css/style2.css">
	<script>
		$("document").ready(function(){
			$("#btnCadastra").click(function(){
				var login = $("#novologin").val();
				var senha = $("#novasenha").val();
				var nome = $("#nomecompleto").val();
				if (login.length>0 && senha.length>0 && nome.length>0)
				{
					cadastraLogin(login,senha,nome);
				}else if(login.length==0 || senha.length==0){
					alert("Login ou senha estão vazios...");
				}else{
					alert("Nome vazio....");
					$("#nomecompleto").focus();
				}
			});
		});
	</script>
</head>
<body>
	<canvas id="c"></canvas>
<center>
	<div id="centrar">
	<form id="msform">
	<fieldset>
	    Cadastro de Novo login<br><Br>
		Login <input type="text" id="novologin" name="novasenha" placeholder="Digite o Login que deseja...." maxlength="100px" size="30"/><br>
		Senha <input type="password" id="novasenha" name="novasenha" placeholder="Digite sua senha..." maxlength="100px" size="30px"/><br>
		Nome Completo <input type="text" id="nomecompleto" placeholder="Digite seu nome...." maxlength="400px" size="50px"/><br>	
		<input type="button" class="action-button" id="btnCadastra" value="Cadastrar"/>
	</fieldset>
	</form>
	</div>
</center>
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
</html>