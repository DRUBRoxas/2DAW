$(document).ready(function(){
    //$("#provincias")
    var mun=$("#municipio")
    var select=$("#provincia")
    $.getJSON("https://www.el-tiempo.net/api/json/v1/provincias",
        function (data) {
            var select = $("#provincia")
            $.each(data, function (i, val) { 
                 $("<option>").val(val.CODPROV).text(val.NOMBRE_PROVINCIA).appendTo(select);
            });
        }
    );


    select.click(function (){
        var url="https://www.el-tiempo.net/api/json/v1/provincias/"
        url+=select.val()+"/municipios"
        $.getJSON(url,function(data){
            $("#municipio option").remove();
            $.each(data,function(i,val){
                $("<option>").val(val.CODIGOINE).text(val.NOMBRE).appendTo(mun);
            })
        })
    });
});