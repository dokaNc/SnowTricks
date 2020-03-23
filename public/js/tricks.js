$(document).ready(function () {
    $(document).on('click', '[id^="deleteMedia_"]', function () {
        sweetAlert('confirm', "Are you sure you want to delete this ?", $(this).data('url'))
    });

    $('.delete').on('click', function () {
        return confirm('Are you sure you want to delete this ?');
    });

    $('#image_name').on('change', function () {
        var filename = this.files[0].name;
        $('.custom-file-label').text(filename);
    });

    function sweetAlert(type, message, dataUrl = null) {
        switch (type) {
            case 'success' :
                Swal.fire({
                    title: message,
                    text: 'It\'s okay !',
                    icon: type,
                    button: false,
                    timer: 1000
                });
                break;
            case 'confirm' :
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    console.log(result);
                    if (result.value) {
                        ajaxDeleteElement(dataUrl);
                    }
                });
                break;
        }
    }

    function ajaxDeleteElement(dataUrl) {
        $.ajax({
            type: 'GET',
            url: dataUrl,
            success: function (data) {
                if (data === 'ok') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Deleted!',
                    });
                    $("#media").load(" #media");
                } else {
                    Swal.fire({
                        icon: 'danger',
                        title: 'An error has occurred!',
                    });
                }
            }
        })
    }
});