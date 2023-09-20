jQuery(document).ready(function($){
    //----- Open model CREATE -----//
    jQuery('#btn-add').click(function () {
        jQuery('#btn-save').val("add");
        jQuery('#myForm').trigger("reset");
        jQuery('#formModal').modal('show');
    });
    // CREATE
    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = {
            name: jQuery('#name').val(),
            email: jQuery('#email').val(),
			phone: jQuery('#phone').val(),
			password: jQuery('#password').val(),
        };
        var state = jQuery('#btn-save').val();
        var type = "POST";
        var info_id = jQuery('#info_id').val();
        var ajaxurl = 'info';
        $.ajax({
            type: type,
            url: ajaxurl,
            data: formData,
            dataType: 'json',
            success: function (data) {
                var info = '<tr id="info' + data.id + '"><td>' + data.id + '</td><td>' + data.name + '</td><td>' + data.email + '</td><td>' + data.phone + '</td><td>' + data.password + '</td>';
                if (state == "add") {
                    jQuery('#info-list').append(info);
                } else {
                    jQuery("#info" + info_id).replaceWith(info);
                }
                jQuery('#myForm').trigger("reset");
                jQuery('#formModal').modal('hide')
            },
            error: function (data) {
                console.log(data);
            }
        });
    });
});