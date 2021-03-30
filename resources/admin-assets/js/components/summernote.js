require("summernote");

$(".summernote").summernote({
    height: 200,
    minHeight: 200,
    //maxHeight: 400,
    lineHeight: 1,
    disableResizeEditor: false,
    callbacks: {
        onImageUpload: function (files) {
            var editor = this;
            var upload_url = $(editor).data('imageurl');

            if (!upload_url)
            {
                alert('Использование изображений для этой страницы не реализовано. Скорее всего так должно быть');
                return '';
            }

            $.each(files, function (file_i, file) {
                data = new FormData();
                data.append("image", file);
                $.ajax({
                    data: data,
                    type: 'POST',
                    beforeSend: function (myXhr) {
                        myXhr.progress = (e) => {
                            console.log(e);
                        };
                    },
                    url: upload_url,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        $(editor).summernote('pasteHTML', response);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.error(textStatus + " " + errorThrown);
                    }
                });
            });
        }
    }
});
