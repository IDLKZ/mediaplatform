$(document).ready(function () {
    ClassicEditor
        .create( document.querySelector( '#editor' ),{
            height:500
        } )


    //Select2
    $(".select2").select2({
        multiple:true,
        tags:true,
        "language": {
            "noResults": function(){
                return "Введите преиущество и нажмите Enter";
            }
        },
    });
    $(".select-multi").select2({
        "language": {
            "noResults": function(){
                return "Введите преиущество и нажмите Enter";
            }
        },
    });


})
