jQuery("#user_logout").on('click',function(){
    jQuery.ajax({
        url: ajax_object.ajaxUrl,
        type: 'post',
        dataType: 'json',
        data: {'action': 'user_logout'},
        success: function(response) {

            window.location = ajax_object.siteUrl;
            console.log(ajax_object.siteUrl);
        }
    });
})