$(document).ready(function () {
    //URLS
    let url = {
        "teacher_exam":"/teacher/examination",
        "teacher_video":"/ajax/videos",
        "teacher_type":"/ajax/getType",
        "admin-course.create":"/admin/admin-course",
        "author_search":"/ajax/searchAuthor",
    };

    //Init Teacher Examination
    if(window.location.href.indexOf(url["teacher_exam"]) != -1){
        if($("#courses").val()){
            $.ajax({
                type: "POST",
                url: url["teacher_video"],
                data: {"_token":$('meta[name="csrf-token"]').attr('content'),"course_id":$("#courses").val()},
                success: function (response) {
                    if(response.length > 0){
                        for (let i=0;i<response.length; i++){
                            if($("#video_select").val() != response[i]["id"]){
                                $("#video_select").append($("<option></option>")
                                    .attr("value", response[i]["id"])
                                    .text(response[i]["title"]));
                            }

                        }

                    }
                },
                error:function(error){console.log(error)},
                dataType: "json"
            });
        }
       if($("#exam_type").val()){
           $.ajax({
               type: "POST",
               url: url["teacher_type"],
               data: {"_token":$('meta[name="csrf-token"]').attr('content'),"type":$("#exam_type").val()},
               success: function (response) {
                   let data = response.data;
                   if(response["data"].length > 0){
                       $("#examination_select").attr("name",response.type);
                       for (let i=0;i<data.length; i++){
                           if($("#examination_select").val() != response[i]["id"]) {
                               $("#examination_select").append($("<option></option>")
                                   .attr("value", data[i]["id"])
                                   .text(data[i]["title"]));
                           }
                       }

                   }
               },
               error:function(error){console.log(error)},
               dataType: "json"
           });
       }
    }
    //End of Init
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


    //Search Teacher for Course
    if(window.location.href.indexOf(url["admin-course.create"]) != -1){
        $('.course_author').select2({
            placeholder: 'Автор курса',
            ajax: {
                url: url["author_search"],
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results:  $.map(data, function (item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                },

                cache: true

            }

        });

    }



});
