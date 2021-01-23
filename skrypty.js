$(document).ready(function(){
 $("button#schemat").click(function(){
   uzyskaj_kalendarium();
 });

});

function uzyskaj_kalendarium() {
  $.ajax({
    type: "POST",
    url: "generator.php",
    dataType: "html",
    data: {
      "miesiac": $("input#miesiac").val(),
      "rok": $("input#rok").val(),
      "funkcja": "drukuj_kalendarium"
    },
    success: function(dane){
      console.log(dane);
      $("span#wyniki").html(dane);
    },
    beforeSend: function(){},
    complete: function(){},
    error: function(xhr){
      console.log(xhr.responseText);
    }
  });
};

function edytuj_dzien(tydzien,dzien) {
  $.ajax({
    type: "POST",
    url: "generator.php",
    dataType: "html",
    data: {
      "id_dnia": (dzien),
      "id_tygodnia": (tydzien),
      "funkcja": "drukuj_edytor"
    },
    success:function(dane){
      $("span#edycja_dnia").html(dane);
    },
    beforeSend:function(){},
    complete:function(){},
    error:function(xhr){
      console.log(xhr.responseText);
    }
  });
};
