var beginJournal = function(url, token) {
    $('button.create-entry').on('click', function(e){
        var button = $(this);
        e.preventDefault();
        $.ajax({
           url: url,
           type: 'GET',
           success:function(response){
               button.fadeOut();
               $.get(response, function(data){
                    $('.form-content').html(data);
               });
           }
        });
    });
}

var postSubmission = function(ele, url) {
    $(ele).on('submit', function(e){
        e.preventDefault();
        var fields = $(this).serialize();
        $.ajax({
           url: url,
           method: 'POST',
           data: fields,
           success: function(response){
               console.log(response);
               $.get(response, function(data){
                   $('.form-content').html(data);
               });
           },
            error: function(response) {
                console.log(response);
            }
        });
    });
}