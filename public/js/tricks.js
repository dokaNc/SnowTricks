$(document).ready(function () {
    $(document).on('click', '[id^="deleteMedia_"]', function (event) {
        sweetAlert('confirm', "Are you sure you want to delete this ?", { url: $(this).data('url'), elementId: $(this)[0].id })
    });

    $(document).on('click', '[id^="deleteMediaVideo_"]', function (event) {
        sweetAlert('confirm', "Are you sure you want to delete this ?", { url: $(this).data('url'), elementId: $(this)[0].id })
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
                    if (result.value) {
                        if(dataUrl.url) {
                            ajaxDeleteElement(dataUrl.url, dataUrl.elementId);
                        } else {
                            ajaxDeleteElement(dataUrl, null);
                        }
                    }
                });
                break;
        }
    }

    function ajaxDeleteElement(dataUrl, elementId) {
        $.ajax({
            type: 'GET',
            url: dataUrl,
            success: function (data) {
                if(dataUrl && elementId) {
                    if(elementId.includes('deleteMediaVideo_')) {
                        elementId = '#mediavideo_' + elementId.replace(/\D+/, '');
                    } else {
                        elementId = '#media_' + elementId.replace(/\D+/, '');
                    }
                    $(elementId).remove();
                }
                if (data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Deleted!',
                    });
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