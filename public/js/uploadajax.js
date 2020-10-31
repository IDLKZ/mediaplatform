$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

(function() {

    var bar = $('.bar');
    var percent = $('.percent');
    var status = $('#status');
    var route = $('#route');
    $('.uploadAjax').ajaxForm({
        beforeSend: function() {
            status.empty();
            var percentVal = '0%';
            bar.width(percentVal)
            percent.html(percentVal);
        },
        uploadProgress: function(event, position, total, percentComplete) {
            var percentVal = percentComplete + '%';
            bar.width(percentVal)
            percent.html(percentVal);
            $('#btn-submit').attr('disabled', 'disabled');
            $('#ajax-gif').css('display', 'block');
            //console.log(percentVal, position, total);
        },
        success: function() {
            var percentVal = '100%';
            bar.width(percentVal)
            percent.html(percentVal);
            status.html('<span class="alert alert-success">Видео успешно добавлено!</span>');
            $('#ajax-gif').fadeOut();
            setTimeout(function (xhr){
                // console.log(xhr.responseText)
                window.location.href = route[0].firstChild.data;
            }, 1000);
        },
        complete: function(xhr) {
            // status.html(xhr.responseText);

        }
    });

})();
