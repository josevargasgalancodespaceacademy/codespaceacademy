function enviar_sorteo_becas_videogames() {
  var url = "../assets/php/forms/promotion_entries.php";
  if ($('#check-sorteo-videogames').is(':checked')) {
    $.ajax({
      type: "POST",
      url: url,
      data: $("#promotion_entries_videogames").serialize()
    }).done(function (respuesta) {
      var postData = $("#promotion_entries_videogames").serializeArray().reduce(function (obj, item) {
        obj[item.name] = item.name;
        return obj;
      }, {});
      var originalData = $("#promotion_entries_videogames").serializeArray().reduce(function (obj, item) {
        obj[item.name] = item.value;
        return obj;
      }, {});
      if (respuesta == "\nOK") {
        $('#modal-sorteo').modal('show');
      }
      else {
        var data = JSON.parse(respuesta);
        $('#promotion_entries_videogames .mensajerror').css('display', 'inline-block');
        for (var key in postData) {
          for (var key2 in data) {
            if (postData[key] == key2) {
              if (key == "date_of_birth") {
                $('#videogames_' + key).addClass("errorbox");
                break
              }
              else {
                $('##videogames_' + key).addClass("errorbox");
                $('##videogames_' + key).attr("placeholder", data[key]);
                $('##videogames_' + key).val("");
                replaceValueTimeout('#' + key, originalData[key]);
                break
              }
            }
            else {
              if (key == "date_of_birth") {
                $('##videogames_' + key).removeClass("errorbox");
                $('#' + key).attr("placeholder", "");
              }
              else {
                $('##videogames_' + key).off('focus');
                $('##videogames_' + key).removeClass("errorbox");
                $('##videogames_' + key).attr("placeholder", "");
              }
            }
          }
        }
      }
    })
  } else {
    swal("Acepta las condiciones legales", "", "error");
  }
}


function enviar_sorteo_becas_web() {
  var url = "../assets/php/forms/promotion_entries.php";
  if ($('#check-sorteo-web').is(':checked')) {
    $.ajax({
      type: "POST",
      url: url,
      data: $("#promotion_entries_web").serialize()
    }).done(function (respuesta) {
      var postData = $("#promotion_entries_web").serializeArray().reduce(function (obj, item) {
        obj[item.name] = item.name;
        return obj;
      }, {});
      var originalData = $("#promotion_entries_web").serializeArray().reduce(function (obj, item) {
        obj[item.name] = item.value;
        return obj;
      }, {});
      if (respuesta == "\nOK") {
        $('#modal-sorteo').modal('show');
      }
      else {
        var data = JSON.parse(respuesta);
        $('#promotion_entries_web .mensajerror').css('display', 'inline-block');
        for (var key in postData) {
          for (var key2 in data) {
            if (postData[key] == key2) {
              if (key == "date_of_birth") {
                $('#web_' + key).addClass("errorbox");
                break
              }
              else {
                $('#web_' + key).addClass("errorbox");
                $('#web_' + key).attr("placeholder", data[key]);
                $('#web_' + key).val("");
                replaceValueTimeout('#' + key, originalData[key]);
                break
              }
            }
            else {
              if (key == "date_of_birth") {
                $('#web_' + key).removeClass("errorbox");
                $('#web_' + key).attr("placeholder", "");
              }
              else {
                $('#web_' + key).off('focus');
                $('#web_' + key).removeClass("errorbox");
                $('#web_' + key).attr("placeholder", "");
              }
            }
          }
        }
      }
    })
  } else {
    swal("Acepta las condiciones legales", "", "error");
  }
}