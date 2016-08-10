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
                    $('.situation').html(data);
               });
           }
        });
    });
}