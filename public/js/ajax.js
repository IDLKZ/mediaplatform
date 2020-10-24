$(document).ready(function () {
    //URLS
    let url = {
      "teacher_video":"/teacher/ajax/videos",
        "teacher_type":"/teacher/ajax/getType"
    };



    //Teacher Ajax
   $("#courses").on("change",function () {
        $("#video_select").empty().append("<option>Не выбрано</option>")
       if(this.value){
           $.ajax({
               type: "POST",
               url: url["teacher_video"],
               data: {"_token":$('meta[name="csrf-token"]').attr('content'),"course_id":this.value},
               success: function (response) {
                   if(response.length > 0){
                        for (let i=0;i<response.length; i++){
                            $("#video_select").append($("<option></option>")
                                .attr("value", response[i]["id"])
                                .text(response[i]["title"]));
                        }

                   }
               },
               error:function(error){console.log(error)},
               dataType: "json"
           });
       }
   })
    //Trigger Course to Find  start

    $("#exam_type").on("change",function () {
        $("#examination_select").empty().append("<option>Не выбрано</option>");
        if(this.value){
            $.ajax({
                type: "POST",
                url: url["teacher_type"],
                data: {"_token":$('meta[name="csrf-token"]').attr('content'),"type":this.value},
                success: function (response) {
                    let data = response.data;
                    if(response["data"].length > 0){
                        $("#examination_select").attr("name",response.type);
                        for (let i=0;i<data.length; i++){
                            $("#examination_select").append($("<option></option>")
                                .attr("value", data[i]["id"])
                                .text(data[i]["title"]));
                        }

                    }
                },
                error:function(error){console.log(error)},
                dataType: "json"
            });
        }
    })
    //Trigger Course to Find  end






});
