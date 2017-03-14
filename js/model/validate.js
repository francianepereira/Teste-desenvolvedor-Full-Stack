var validate = {
    url : "http://apilayer.net/api/check",
    format : "1",
    smtp : "1", 
    key: "188361e68a4aa131d3a9657d4af1aacb",    
    response: function (method,json,callback){
        //aciona mensagem a imagem de e-mail correto ou incorreto dentro do input de e-mail e guarda score do e-mail
        switch (method){
            case "e-mail":
                callback(json.format_valid, json.smtp_check, json.score);
                break;
            case "address":
                break;
            default :
        }
    },
    email: function (email, callback){
        var method = "e-mail";
        try {            
            $.ajax({
                url: 'http://apilayer.net/api/check?access_key=' + this.key + '&email=' + email,   
                dataType: 'jsonp',
                success: function(json) {
                    validate.response(method,json,callback);
                },
                error: function (jqXHR, textStatus, errorThrown) {                    
                }
            });            
        } catch (error) {
            console.log(error);
        }        
    }
};


