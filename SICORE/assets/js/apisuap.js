$("#botao-login").click(function(e){
    e.preventDefault();
    
    var base_url = $("#base_url").val();
    var username = $("#login").val();
    var password = $("#senha").val();
    var nome_usual = $("#nome_usual").val();
    var matricula = $("#matricula").val();
    var tipo_vinculo = $("#tipo_vinculo").val();
    
    /*Estava faltado 3 coisas:*/

    //1) o JSON.stringfy envolvendo o JSON
    var dadosjson = JSON.stringify({"username": username, "password":password});
    var dados = JSON.stringify({"nome_usual": nome_usual, "matricula":matricula, "tipo_vinculo":tipo_vinculo});
    
    $.ajax({
        //2) A barra após a URL
        url: "https://suap.ifrn.edu.br/api/v2/autenticacao/token/",
        dataType: 'json',
        data:dadosjson,
        type: 'POST',
        contentType: 'application/json',
        success: function (data) {
            sessionStorage.setItem("token", data.token);
            $.ajax({
                headers: { 
                    "Authorization" : "JWT "+sessionStorage.getItem("token")
                },
                url: "https://suap.ifrn.edu.br/api/v2/minhas-informacoes/meus-dados/",
                contentType: 'application/json',
                dataType: 'json',
                type: 'GET',
                success: function (data) {
                    window.location.href = base_url + "usuario/salvarLogin/" + data.tipo_vinculo +"/"+data.matricula + "/" + data.nome_usual; 
                   
                },
                error: function(data){
                    alert("Impossível recuperar dados. Você deve fazer login!");
                    window.location.href = "pages/login";
                }
            });
        },
        error: function(data){
            alert("Impossível recuperar dados");
        }
    });

});