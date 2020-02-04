$(document).ready(function () {
    $("#tabla1").DataTable();
    $("#tabla2").DataTable({
        paging: false,
        columns:[
            {title:"Pais"},
            {title:"Idioma"},
            {title:"Habitantes"},
            {title:"Extensión"},
        ]
    });

});