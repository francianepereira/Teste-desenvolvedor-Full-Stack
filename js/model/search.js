var search = {
    submit: function (email,address,score,callback){
        try{
            $.ajax({
                url: 'inc/post_search.php',   
                //dataType: 'jsonp',
                type: 'POST',
                data: "address="+address+"&email="+email+"&score="+score+"",
                success: function(json) {
                    console.log(json);
                    callback(json);
                },
                error: function (jqXHR, textStatus, errorThrown) {                    
                }
            });            
        }catch (error){
            console.log(error);
        }
    }
};


