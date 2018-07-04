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
         $(".loader").fadeIn(50);
      },
      success: function (result) {
         $(".loader").fadeOut(50);
         M.toast({html: result});
      },
      error: function (result) {
         $(".loader").fadeOut(50);
         let data = result.responseJSON.message;
         let error = result.responseJSON.errors;
         if (data !== undefined) {
            M.toast({html: error[Object.keys(error)[0]]});
         }
      },
   });
}