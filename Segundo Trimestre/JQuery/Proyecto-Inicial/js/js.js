$(document).ready(function(){

    $("#consultar").after(
        


    )
    $("#consultar").click(function(ev){
        ev.preventDefault();
        var pais=$("#pais").val();

        var url="https://restcountries.eu/rest/v2/name/"

        if(pais!==""){
            url=encodeURI(url+pais);
            $.getJSON(url,function(data){
                alert(data.length);
            }); 

        }

    }).append("<span>")
});