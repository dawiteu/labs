$(function(){

    // reply dans blog COMS: 

    $(".replytocom").on("click", function(){
        //alert('reply!');
        $("#addcomment").val( "@"+$(this).data('target')+" : ");
    }); 




    // resultats recherche Icones dans la DB. 
    let tab = []; 

    if($("#query")){
        $("#query").on("input", function(){
            let val = $("#query").val();
            
            if(val.length > 0 ){
                $("#results").html(""); 
                let res = tab.filter(item => item.indexOf(val) > -1); 
                //console.log(res);
                $("#counts").html(res.length);
                res.forEach(item => {
                    $("#results").append(`<div class='m-5 ico bg-red-300 w-max flex flex-col justify-center text-center selecticon' data='${item}'> <i style="font-size:4rem;" class="${item} bg-gray-200" title="${item}"></i></div>`); 
                });
            }
        });
    }

    if($("#results")){

        let childs = $("#results").children(); 

        childs.each(function (i, child){
            tab[i] = child.getAttribute('data'); 
        });

        console.log(tab); 
    
        $(".selecticon").on("click", function() {
            let newicon = $(this).attr('data');
            let conf=confirm(`Confirmez-vous le choix de cette icone? (${newicon}) `);
            if(conf){
                navigator.clipboard.writeText(newicon);
    
                let x = setTimeout(() => {
                    if(navigator.clipboard.writeText(newicon)){
                        clearTimeout(x);
                        window.close();
                    }
                }, 300);
            }
        });
    }

    if($("#setnewicon")){ 
        window.onfocus = function() { 
            navigator.clipboard.readText().then(function(text){
                console.log(text);
                let auth = ["fas", "far", "fab"]; 
                let parse = text.split(" "); 
                setTimeout(async() =>  {
                    if(parse){
                        if(auth.includes(parse[0])){
                            $("#setnewicon").val(text);
                            $("#displnewicon").attr('class', text);
                        }
                    }  
                }, 2000)

                
            });
        };
    };
});