$(document).ready(function () {
    let test_exam = "http://mediaportal.kz/student/passExam";

    if(window.location.href.indexOf(test_exam) !=1 ){
        // function disableF5(e) { if ((e.which || e.keyCode) == 116 || (e.which || e.keyCode) == 82 || (e.which || e.keyCode) == 123 || (e.which || e.keyCode) == 85) e.preventDefault(); };
        // $(document).on("keydown", disableF5);
        // document.addEventListener('contextmenu', event => event.preventDefault());
        // $(document).on("keydown",function (e) {
        //     console.log(e.keyCode)
        // });
        $('input:radio:checked').prop('checked', false);
        if($('input:radio:checked').length < 10){
            $("#checkResult").fadeOut();
        }
        $(".questionCheck").on("change",function () {
            console.log($('input:radio:checked').length)
            if($('input:radio:checked').length==10){
               $("#checkResult").fadeIn();
           }
            else{
                $("#checkResult").fadeOut();
            }
        })
        $("#checkResult").click(function () {
            if($('input:radio:checked').length<10){
                alert("Завершите тест, ответив на все вопросы!")
                return false
            }
            else{
                return true;
            }
        })
    }

    ClassicEditor
        .create( document.querySelector( '#editor' ),{
            height:500
        } )

    $(".editor").each(function () {
        let id = $(this).attr('id');
        console.log(id);
        ClassicEditor
            .create( document.querySelector( '#'+id ),{
                height:500
            } )
    });

})
