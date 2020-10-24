$(document).ready(function () {
    //URLS
    let url = {
      "teacher_video":"/teacher/ajax/videos"
    };



    //Teacher Ajax
   $("#courses").on("change",function () {
       if(this.value){
           console.log($('meta[name="csrf-token"]').attr('content'));
           $.ajax({
               type: "POST",
               url: url["teacher_video"],
               data: {"course_id":this.value},
               success: function (response) { alert(response.data); },
               dataType: "json"
           });
       }
   })
});
