function readURL(input) {
    if (input.files && input.files[0]) {

      var reader = new FileReader();

      reader.onload = function(e) {
        $('.image-upload-wrap').hide();

        $('.file-upload-image').attr('src', e.target.result);
        $('.file-upload-content').show();

        $('.image-title').html(input.files[0].name);
      };

      reader.readAsDataURL(input.files[0]);

    } else {
      removeUpload();
    }
  }

  function removeUpload() {
    $('.file-upload-input').replaceWith($('.file-upload-input').clone());
    $('.file-upload-content').hide();
    $('.image-upload-wrap').show();
  }
  $('.image-upload-wrap').bind('dragover', function () {
          $('.image-upload-wrap').addClass('image-dropping');
      });
      $('.image-upload-wrap').bind('dragleave', function () {
          $('.image-upload-wrap').removeClass('image-dropping');
  });


  function readURLS(input) {
    if (input.files && input.files[0]) {

      var reader = new FileReader();

      reader.onload = function(e) {
        $('.image-upload-wraps').hide();

        $('.file-upload-images').attr('src', e.target.result);
        $('.file-upload-contents').show();

        $('.image-title').html(input.files[0].name);
      };

      reader.readAsDataURL(input.files[0]);

    } else {
      removeUpload();
    }
  }


  function removeUploads() {
    $('.file-upload-inputs').replaceWith($('.file-upload-inputs').clone());
    $('.file-upload-contents').hide();
    $('.image-upload-wraps').show();
  }

  $('.image-upload-wraps').bind('dragover', function () {
  $('.image-upload-wraps').addClass('image-dropping');
  });
  $('.image-upload-wraps').bind('dragleave', function () {
    $('.image-upload-wraps').removeClass('image-dropping');
  });












/*

*/







