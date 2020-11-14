$(document).ready(function () {
    //URLS
    let url = {
        "teacher_exam":"/teacher/examination",
        "teacher_video":"/ajax/videos",
        "teacher_type":"/ajax/getType",
        "admin-course.create":"/admin/admin-course",
        "author_search":"/ajax/searchAuthor",
        "video_search":"/ajax/searchVideo",
        "course_search":"/ajax/searchCourse",
        "admin_type":"/ajax/getTypes",
        "admin_quiz.create":"/admin-quiz/create",
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
    
    $('.material-video').select2({
        placeholder: 'Видео',
        ajax: {
            url: url["video_search"],
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results:  $.map(data, function (item) {
                        return {
                            text: item.title,
                            id: item.id
                        }
                    })
                };
            },

            cache: true

        }

    });
    $('.course_admin').select2({
        placeholder: 'Курсы',
        ajax: {
            url: url["course_search"],
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results:  $.map(data, function (item) {
                        return {
                            text: item.title,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    });

    $(".course_admin").on("change",function () {
        let course_id = $(this).val();
        $(".video_admin").empty();
        if(course_id){
            $.ajax({
                type: "POST",
                url: "/ajax/searchCourseVideo",
                data: {"_token":$('meta[name="csrf-token"]').attr('content'),"course_id":course_id},
                success: function (response) {
                    if(response.length > 0){
                        for (let i=0;i<response.length; i++){
                            $(".video_admin").append($("<option></option>")
                                .attr("value", response[i]["id"])
                                .text(response[i]["title"]));
                        }

                    }
                },
            })}
    });

    $("#exam_type2").on("change",function () {
        $("#examination_select").empty().append("<option>Не выбрано</option>");
       getType2();
    })
    if ($("#exam_type2").val() == "test" || $("#exam_type2").val() == "review" ){
        getType2();
    }


    function getType2(){
        let type = $("#exam_type2").val();
        if(type){
            $.ajax({
                type: "POST",
                url: url["admin_type"],
                data: {"_token":$('meta[name="csrf-token"]').attr('content'),"type":type},
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
    }
});
