var beginJournal = function(url, token) {
    $('button.create-entry').on('click', function(e){
        var button = $(this);
        e.preventDefault();
        $.ajax({
           url: url,
           type: 'GET',
           success:function(response){
               button.fadeOut();
               setTimeout(function(){
                   $.get(response, function(data){
                       $('.form-content').html(data);
                       $('.form-content').toggleClass('hidden animated flipInX');
                   });
               }, 500);
           }
        });
    });
}

var postSubmission = function(ele, url, baseURL) {
    $(ele).on('submit', function(e){
        e.preventDefault();
        var fields = $(this).serialize();
        $.ajax({
           url: url,
           method: 'POST',
           data: fields,
           beforeSend: function(){
               $('.form-content').toggleClass('animated flipInX');
               $('.form-content').addClass('animated flipOutX');
               setTimeout(function(){
                   $('.form-content').addClass('hidden');
               }, 1000);
           },
           success: function(response){
               console.log(response);
               $.get(baseURL +'/'+ response, function(data){
                   $('.form-content').html(data);
                   $('.form-content').toggleClass('hidden animated flipInX');
               });
           },
            error: function(response) {
                console.log(response);
            }
        });
    });
}