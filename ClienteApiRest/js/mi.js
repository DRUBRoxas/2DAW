$(document).ready(function(){
    $.ajax({
        url:'/2019-2020/2DAW/PruebaApi/public/index.php/api/plantas',
        success: function (datos) {
            var html=`<table class="table">
                    <tr>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Localizacion</th>
                    <th>Imagen</th>
                    <th>Color</th>
                    <th>Acciones</th>
                    </tr>`
            $.each(datos, function(indice,valor) {
                html+="<tr>"
                $.each(valor,function(clave,dato){
                    html+="<td>"+dato+"</td>";
                })
                html+="<td><button id='borrar/' "+valor['id']+" class='btn btn-primary'>Borrar</button></td></tr>"
            })

            $("#arellenar").append(html);
            $("#arellenar").append("</table><br><button id='crear' data-toggle='modal' data-target='#contact-modal' "+
                "class='btn btn primary'>Crear Planta </button>");
        }
    })
})