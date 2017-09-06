function enviar_curriculum(){
        var url ="../assets/php/forms/curriculums.php";
        $.ajax({                        
          url: url,
          type: 'POST',

          data: new FormData($('#curriculums')[0]),

          cache: false,
          contentType: false,
          processData: false,

          // Custom XMLHttpRequest
          xhr: function() {
              var myXhr = $.ajaxSettings.xhr();
              if (myXhr.upload) {
                  myXhr.upload.addEventListener('progress', function(e) {
                      if (e.lengthComputable) {
                          $('progress').attr({
                              value: e.loaded,
                              max: e.total,
                          });
                      }
                  } , false);
              }
              return myXhr;
          },                
          });
        }