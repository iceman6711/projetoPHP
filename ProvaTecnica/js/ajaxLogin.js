function initAjax(){
		var xmlhttp;
				if(window.XMLHttpRequest)
				{//Firefox, Safari, Opera, etc.
					xmlhttp= new XMLHttpRequest();
				}else if(window.ActiveXobject){//internet Explorer
					try{xmlhttp=new ActiveXobject("Msxml2.XMLHTTP");//versoes mais antigas
					}
					catch(e)
					{
						try{xmlhttp= new ActiveXobject("Microsoft.XMLHTTP");}
						catch(e){}
					}
				}
				return xmlhttp;
}
function respostaServidor(){
	ajax=initAjax();
	var login=document.getElementById("Login").value;
	var senha=document.getElementById("senha").value;
	if(ajax){
		url= "Controller/acLogin.php?login="+login+"&senha="+senha;
		ajax.open('GET',url,true);
		ajax.onreadystatechange=function(){
		if(ajax.readyState == 4 ){//state 4 significa finalizado
			if(ajax.status == 200){
				//alert(ajax.responseText);
				if(ajax.responseText=="Login Autorizado")
				{
					window.location.replace("Model/mMenu.php");
				}else {alert(ajax.responseText); $("#SemConta").show("fast");};
				//$("#wrap").hide();
				//$("#mask").hide();
			}
		}
	};
		ajax.send(null);
	}
}