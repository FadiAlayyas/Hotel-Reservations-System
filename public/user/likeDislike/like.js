$(".like").on('click', function() {

    var like_status = $(this).attr('data_like');
    var post_id = $(this).attr('data_post_id');
    post_id=post_id.slice(0,-2);


    $.ajax({
        type: 'GET',
        url: url,
        data: {
            like_status: like_status,
            post_id: post_id,
        },

        success: function(data) {
            if(data.is_like==1)
           {
                 $('*[data_post_id="'+post_id+'_l"]').removeClass('btn-secondary').addClass('btn-success');
                 $('*[data_post_id="'+post_id+'_d"]').removeClass('btn-danger').addClass('btn-secondary');

                 //تغير الرقم
                 var like_count=$('*[data_post_id="'+post_id+'_l"]').find('.like_count').text();
                 var new_like_count=parseInt(like_count)+1;
                 $('*[data_post_id="'+post_id+'_l"]').find('.like_count').text(new_like_count);
           }
           if(data.is_like==2)
           {
            $('*[data_post_id="'+post_id+'_l"]').removeClass('btn-secondary').addClass('btn-success');
            $('*[data_post_id="'+post_id+'_d"]').removeClass('btn-danger').addClass('btn-secondary');

            //تغير الرقم
            var like_count=$('*[data_post_id="'+post_id+'_l"]').find('.like_count').text();
            var new_like_count=parseInt(like_count)+1;
            $('*[data_post_id="'+post_id+'_l"]').find('.like_count').text(new_like_count);

            var dislike_count=$('*[data_post_id="'+post_id+'_d"]').find('.dislike_count').text();
            var new_dislike_count=parseInt(dislike_count)-1;
            $('*[data_post_id="'+post_id+'_d"]').find('.dislike_count').text(new_dislike_count);

           }
          if(data.is_like==0)
          {
                 $('*[data_post_id="'+post_id+'_l"]').removeClass('btn-success').addClass('btn-secondary');

                 var like_count=$('*[data_post_id="'+post_id+'_l"]').find('.like_count').text();
                 var new_like_count=parseInt(like_count)-1;
                 $('*[data_post_id="'+post_id+'_l"]').find('.like_count').text(new_like_count);
           }
        }

    })

});


$(".dislike").on('click', function() {

    var like_status = $(this).attr('data_like');
    var post_id = $(this).attr('data_post_id');
    post_id=post_id.slice(0,-2);


    $.ajax({
        type: 'GET',
        url: urll,
        data: {
            like_status: like_status,
            post_id: post_id,
        },

        success: function(data) {
            if(data.is_dislike==1)
           {
                 $('*[data_post_id="'+post_id+'_d"]').removeClass('btn-secondary').addClass('btn-danger');
                 $('*[data_post_id="'+post_id+'_l"]').removeClass('btn-success').addClass('btn-secondary');

                 var dislike_count=$('*[data_post_id="'+post_id+'_d"]').find('.dislike_count').text();
                 var new_dislike_count=parseInt(dislike_count)+1;
                 $('*[data_post_id="'+post_id+'_d"]').find('.dislike_count').text(new_dislike_count);
           }
           if(data.is_dislike==2)
           {
                 $('*[data_post_id="'+post_id+'_d"]').removeClass('btn-secondary').addClass('btn-danger');
                 $('*[data_post_id="'+post_id+'_l"]').removeClass('btn-success').addClass('btn-secondary');

                 var dislike_count=$('*[data_post_id="'+post_id+'_d"]').find('.dislike_count').text();
                 var new_dislike_count=parseInt(dislike_count)+1;
                 $('*[data_post_id="'+post_id+'_d"]').find('.dislike_count').text(new_dislike_count);

                 var like_count=$('*[data_post_id="'+post_id+'_l"]').find('.like_count').text();
                 var new_like_count=parseInt(like_count)-1;
                 $('*[data_post_id="'+post_id+'_l"]').find('.like_count').text(new_like_count);
           }
          if(data.is_dislike==0)
          {
                 $('*[data_post_id="'+post_id+'_d"]').removeClass('btn-danger').addClass('btn-secondary');

                 var dislike_count=$('*[data_post_id="'+post_id+'_d"]').find('.dislike_count').text();
                 var new_dislike_count=parseInt(dislike_count)-1;
                 $('*[data_post_id="'+post_id+'_d"]').find('.dislike_count').text(new_dislike_count);
           }
        }

    })

});
