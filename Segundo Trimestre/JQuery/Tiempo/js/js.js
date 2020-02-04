$(document).ready(function(){
    function settings(accion){
        var settings = {
        
            "async": true,
            "crossDomain": true,
            "url": "https://opendata.aemet.es/opendata/"+accion+"?api_key="+apikey,
            "method": "GET",
            "headers": {
              "cache-control": "no-cache"
            }
          }
          return settings;
    }
    var apikey="eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJhbmFsb3Blem1vcmVubzEyQGdtYWlsLmNvbSIsImp0aSI6ImY2MDRhZTNiLTAwMjUtNGE5Ny1iMWZkLTY3OGE1NGMzZGI0NiIsImlzcyI6IkFFTUVUIiwiaWF0IjoxNTc5MjY1MTA1LCJ1c2VySWQiOiJmNjA0YWUzYi0wMDI1LTRhOTctYjFmZC02NzhhNTRjM2RiNDYiLCJyb2xlIjoiIn0.0O7LKkA_gDzlO_CVWYEwkNxDfpnANtIEfFFQOGZDENA";
    var accion="/api/valores/climatologicos/inventarioestaciones/todasestaciones/";
    var provincias={};
    $.ajax(settings(accion))
        .done(function(response) {
            var patata = response;
            console.log(patata);
            if(response.descripcion==="exito"){
                $.ajax({
                    url:response.datos,
                    dataType:"json"
                })
                .done(function(data){
                    console.log(data);
                    $.each(data, function (index, value) { 
                         if(! provincias[value.provincia])
                            provincias[value.provincia]={};
                        provincias[value.provincia][value.nombre]=value;
                    });
                    $.each(provincias,function(ind,val){
                        $("<option>").val(ind).text(ind).appendTo($("#prov"));
                    })
                    $("#prov").on("click",function(){
                        $("#mun option").remove();
                        $.each(provincias[$(this).val()],function(ind,valor){
                            $("<option>").val(ind).text(ind).appendTo($("#mun"));
                        });
                        
                    })
                })
            } else {
                alert("asdfasd");
            }
        })
    
      
    //   $.ajax(settings)
    //    .done(function (response) {
    //     console.log(response);
    //   });
})