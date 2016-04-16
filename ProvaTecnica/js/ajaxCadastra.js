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
function cadastraLogin(login,senha, nome){
	ajax=initAjax();
	if(ajax){
		url= "Controller/acCadLogin.php?login="+login+"&senha="+senha+"&nome="+nome;
		ajax.open('GET',url,true);
		ajax.onreadystatechange=function(){
		if(ajax.readyState == 4 ){//state 4 significa finalizado
			if(ajax.status == 200){
				//alert(ajax.responseText);
				if(ajax.responseText=="Cadastrado")
				{
					window.close();
				}else {alert(ajax.responseText);};
				$("#wrap").hide();
				$("#mask").hide();
			}
		}
	};
		ajax.send(null);
	}
}