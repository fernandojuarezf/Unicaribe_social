$(document).ready(function(){
	//global vars
	//controles
	var form = $("#form");
	var nombre = $("#nombre");
	var apaterno = $("#apaterno");
	var amaterno = $("#amaterno");
	var telcasa = $("#telcasa");
	var telcel = $("#telcel");
	var correo = $("#correo");
	
	//span


	
	//On blur
	nombre.blur(validar_nombre);
	apaterno.blur(validar_apaterno);
	amaterno.blur(validar_amaterno);
	telcasa.blur(validar_telcasa);
	telcel.blur(validar_telcel);
	correo.blur(validar_correo);
	

	//On key press
	nombre.keyup(validar_nombre);
	apaterno.keyup(validar_apaterno);
	amaterno.keyup(validar_amaterno);
	telcasa.keyup(validar_telcasa);
	telcel.keyup(validar_telcel);
	correo.keyup(validar_correo);

	
	//On Submitting
	form.submit(function(){
		if(validar_nombre() & validar_apaterno() & validar_amaterno() & validar_telcasa() & validar_telcel() & validar_correo() )
			return true
		else
			return false;
			
			
	});
	
	//validation functions
	function validar_correo(){
		//testing regular expression
		var a = $("#correo").val();
		var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;
		//if it's valid email
		if(filter.test(a)){
			correo.removeClass("error");
			return true;
		}
		//if it's NOT valid
		else{
			correo.addClass("error");
			return false;
		}
	}
	


	function validar_apaterno(){
		//if it's NOT valid
		if(apaterno.val().length < 4 & !apaterno.val.match(/^[a-zA-Z]+$/)){
			alert("No se admiten numeros");
			return false;
		}
		//if it's valid
		else{
			apaterno.removeClass("error");

			return true;
		}
	}
	
	function validar_amaterno(){
		//if it's NOT valid
		if(amaterno.val().length < 4 & !amaterno.val.match(/^[a-zA-Z]+$/)){
			amaterno.addClass("error");

			return false;
		}
		//if it's valid
		else{
			amaterno.removeClass("error");

			return true;
		}
	}
	
	function validar_nombre(){
		
		
		
		if(nombre.value=="")
			alert("Ingresa un nombre");
		//if it's NOT valid
		if(nombre.val().length < 4 && !nombre.val.match(/^[a-zA-Z]+$/)){
			nombre.addClass("error");

			return false;
		}
		//if it's valid
		else{
			nombre.removeClass("error");
			return true;
		}
	}
	
		function validar_telcasa(){
		//if it's NOT valid
		if(telcasa.val().length < 7 & !telcasa.val.match([0-9])){
			telcasa.addClass("error");

			return false;
		}
		//if it's valid
		else{
			telcasa.removeClass("error");

			return true;
		}
	}
	
		function validar_telcel(){
		//if it's NOT valid
		if(telcel.val().length < 7 & !telcel.val.match([0-9])){
			telcel.addClass("error");

			return false;
		}
		//if it's valid
		else{
			telcel.removeClass("error");

			return true;
		}
	}

	
});