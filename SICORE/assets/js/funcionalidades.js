$(document).ready(function(){
	$.ajax({
			headers: { 
				"Authorization" : "JWT "+sessionStorage.getItem("token")
			},
			url: "https://suap.ifrn.edu.br/api/v2/minhas-informacoes/meus-dados/",
			contentType: 'application/json',
			dataType: 'json',
			type: 'GET',
			success: function (data) {
				$(".usuario-foto").append("<img class='img-circle' src='https://suap.ifrn.edu.br"+ data.url_foto_75x100+"' />");
				$(".usuario-nome_usual").html(data.nome_usual);
                $(".usuario-tipo_vinculo").html(data.tipo_vinculo);
                $("#usuario-matricula").html(data.matricula);
			},
			error: function(data){
				alert("Impossível recuperar dados. Você deve fazer login!");
				window.location.href = "pages/login";
			}
	});
		
		
});

$("#botao-sair").click(function(e){
	sessionStorage.removeItem("token");
	window.location.href = "pages/login";
});



 
