$(function(){



    // resultats recherche Icones dans la DB. 
    
    if($("#results")){
    let newicon; 
        $(".selecticon").on("dblclick", function() {
            newicon = $(this).attr('data');
            navigator.clipboard.writeText(newicon);

            if(navigator.clipboard.writeText(newicon)){
                window.close();
            }
        });
    }

    if($("#setnewicon")){ 
        window.onfocus = function() { 
            navigator.clipboard.readText().then(function(text){
                let auth = ["fas", "far", "fab"]; 
                let parse = text.split(" "); 

                if(parse){
                    if(auth.includes(parse[0])){
                        $("#setnewicon").val(text);
                        $("#displnewicon").attr('class', text);
                    }
                }  
            });
        };
    };
});