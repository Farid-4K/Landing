$(document).ready(function () {
    $('form').submit(function (event) {
        event.preventDefault();
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
                $(".loader").removeClass("hidden");
            },
            success: function (result) {
                M.toast({html: result});
                $(".loader").addClass("hidden");
            },
            error: function (result) {
                let data = result.responseJSON.message;
                let error = result.responseJSON.errors;
                if (data !== undefined){
                    M.toast({html: data});
                    M.toast({html: error[Object.keys(error)[0]]});
                }
                $(".loader").addClass("hidden");
            },
        });
    });
});

function ajaxStart(url, method, data) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: method,
        url: url,
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            $(".loader").removeClass("hidden");
        },
        success: function (result) {
            M.toast({html: result});
            $(".loader").addClass("hidden");
        },
        error: function () {
            $(".loader").addClass("hidden");
        },
    });
}

