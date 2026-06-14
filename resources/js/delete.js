$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.delete').click(function () {
        const button = $(this);
        const deleteActionUrl = button.data('url');        
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger"
            }
        });
        swalWithBootstrapButtons.fire({
            title: "Are you sure?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: 'DELETE',
                    url: deleteActionUrl
                })
                    .done(function (data) {
                        swalWithBootstrapButtons.fire({
                            title: "Deleted!",
                            text: "The user has been deleted.",
                            icon: "success"
                        }).then(() => {
                            window.location.reload();
                        });
                    })
                    .fail(function (data) {
                        swalWithBootstrapButtons.fire({
                            title: "Error!",
                            text: data.responseJSON.message,
                            icon: data.responseJSON.status
                        });
                    });
            }
        });
    });
});