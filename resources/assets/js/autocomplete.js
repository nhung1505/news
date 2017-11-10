
jQuery(document).ready(function($) {
        $("#q").autocomplete({
           source :function (request , response) {
               $.ajax({
                   url: "/albums/search/album_list_song/"+ $('#album_id').val(),
                   dataType: "json",
                   data:{
                       term : request.term
                   },
                   success:function (data) {
                      response(data);
                   }
               });
           },
            select : function (event, ui) {
                $('#song_id').val(ui.item.id);
            }
        });
    });

