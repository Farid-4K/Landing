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
         $(".loader").fadeIn(50);
      },
      success: function (result) {
         M.toast({html: result});
         $(".loader").fadeOut(50);
      },
      error: function (result) {
         let data = result.responseJSON.message;
         let error = result.responseJSON.errors;
         if (data !== undefined) {
            M.toast({html: error[Object.keys(error)[0]]});
         }
         $(".loader").fadeOut(50);
      },
   });
}