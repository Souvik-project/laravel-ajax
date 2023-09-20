$(document).ready(function($) {
    // Delete Button Click Event
    $(document).on('click', '.btn-delete', function() {
        var infoId = $(this).data('id');

        // Set the ID of the record to be deleted in a hidden field
        $('#delete-info-id').val(infoId);

        // Show the delete modal
        $('#deleteModal').modal('show');
    });

    // Confirm Delete Button Click Event
    $(document).on('click', '#btn-confirm-delete', function() {
        var infoId = $('#delete-info-id').val();

        // Send an AJAX request to delete the record
        $.ajax({
            type: 'DELETE',
            url: 'info/' + infoId, // Adjust the URL based on your route setup
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json',
            success: function(data) {
                // Handle the success response, e.g., remove the row from the table
                $('#info' + infoId).remove();

                // Hide the delete modal
                $('#deleteModal').modal('hide');
            },
            error: function(data) {
                console.log(data);
            }
        });
    });
});
