var util = {
    request: function(options){

        return $.ajax({
            url: `http://localhost/teste-desenvolvimento-criar/executa.php?action=${options.action}`,
            method: 'GET',
            dataType: "json",
        }).done(function(data){
            return data
        })
    
    }

}