function getData(url,div){
    $.blockUI({ 
    message: $('#preloader_image'),  
    fadeIn: 1000, 
        onBlock: function() {   
            $.ajax({
            url: url,
            type: 'POST',
            data: null,
            datatype: 'json',
            contentType: 'application/json; charset=utf-8',
                success: function (data) {
                    $(div).replaceWith(data);
                    $.unblockUI();
                },  
                        
                error: function (request, status, err) {
                    alert(status);
                    alert(err);
                }
            }); 
        }
    });
}