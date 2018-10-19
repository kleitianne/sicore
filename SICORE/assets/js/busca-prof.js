$("#botao-prof").click(function(e){
    e.preventDefault();
    var base_url = $("#base_url").val();
    var nome = $("#nome").val();
    var matricula = $("#matricula").val();
    var categoria = $("#categoria").val();

    var dadosjson = JSON.stringify({"nome": nome, "matricula":matricula,"categoria":categoria });
	$.ajax({
			headers: { 
				"Authorization" : "JWT "+sessionStorage.getItem("token")
			},
			url: "https://suap.ifrn.edu.br/api/v2/rh/servidores/?limit=20",
			contentType: 'application/json',
			dataType: 'json',
        	data:dadosjson,
			type: 'GET',
			success: function (data){
                for (i=0; i<data.results.length; i++){
                	
                	if (data.results[i].campus =="ZN" && data.results[i].categoria == "docente") {
                		window.location.href = base_url + "usuario/salvarLogin/" + data.results[i].categoria +"/"+ data.results[i].matricula + "/" + data.results[i].nome;

                	}

				}
			}
	});
		
		
});
