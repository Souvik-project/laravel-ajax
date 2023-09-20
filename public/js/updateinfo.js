jQuery(document).ready(function ($) {
    // Update Button Click Event
    jQuery(document).on('click', '.btn-update', function () {
        var infoId = $(this).data('id');
        jQuery('#updateFormModalLabel').text('Update Info');
        jQuery('#btn-save-update').val('update');
		jQuery('#updateForm').trigger("reset");
        jQuery('#info_id_update').val(infoId);

        // Fetch the user data via AJAX and populate the form fields
        $.ajax({
            type: 'GET',
            url: 'info/' + infoId + '/edit', // Use the 'edit' route for updating a specific user
            dataType: 'json',
            success: function (data) {
                jQuery('#update_name').val(data.name);
                jQuery('#update_email').val(data.email);
                jQuery('#update_phone').val(data.phone);

                // You can populate other fields as needed
                jQuery('#updateFormModal').modal('show');
            },
            error: function (data) {
                console.log(data);
            }
        });
    });

    // Update Form Submission
    $("#btn-save-update").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = {
            name: jQuery('#update_name').val(),
            email: jQuery('#update_email').val(),
            phone: jQuery('#update_phone').val(),
            // Include other fields as needed
        };
        var state = jQuery('#btn-save-update').val();
        var infoId = jQuery('#info_id_update').val();
        var ajaxUrl = "info/" + infoId; // Use the correct URL for updating
        var requestType = 'PUT'; // Use the PUT method for updating

        $.ajax({
            type: requestType,
            url: ajaxUrl,
            data: formData,
            dataType: 'json',
            success: function (data) {
                // Handle the success response, update the UI, etc.
                $('#updateFormModal').modal('hide');

                // You may want to update the corresponding row in the table with the new data
            },
            error: function (data) {
                console.log(data);
                // Handle errors or display error messages
            }
        });
    });
});
