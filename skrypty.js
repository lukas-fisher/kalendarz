$(document).ready(function(){
  $("button#schemat").click(function(){
    uzyskaj_kalendarium();
  });

  $("button#zaprojektuj").click(function(){
    kwerenda();
  });

});

function kwerenda() {
  $.ajax({
    type: "POST",
    url: "generator.php",
    dataType: "html",
    data: {
      "funkcja": "kwerenda"
    },
    success: function(dane){
      console.log(dane);
      $("div#kwerenda").html(dane);
    },
    beforeSend: function(){},
    complete: function(){},
    error: function(xhr){
      console.log(xhr.responseText);
    }
  });
};

function uzyskaj_kalendarium() {
  $.ajax({
    type: "POST",
    url: "generator.php",
    dataType: "html",
    data: {
      "miesiac": $("#miesiac").val(),
      "rok": $("#rok").val(),
      "funkcja": "drukuj_kalendarium"
    },
    success: function(dane){
      console.log(dane);
      $("div#roboczy").html(dane);
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
      $("div#edycja_dnia").html(dane);
    },
    beforeSend:function(){},
    complete:function(){},
    error:function(xhr){
      console.log(xhr.responseText);
    }
  });
};

function poza_zakresem() {
  $.ajax({
    type: "POST",
    url: "generator.php",
    dataType: "html",
    data: {
      "funkcja": "poza_zakresem"
    },
    success:function(dane){
      $("div#edycja_dnia").html(dane);
    },
    beforeSend:function(){},
    complete:function(){},
    error:function(xhr){
      console.log(xhr.responseText);
    }
  });
};

function ustal_schemat() {
  $.ajax({
    type: "POST",
    url: "generator.php",
    dataType: "html",
    data: {
      "funkcja": "kolory"
    },
    success:function(dane){
      $("div#edycja_dnia").html(dane);
    },
    beforeSend:function(){},
    complete:function(){},
    error:function(xhr){
      console.log(xhr.responseText);
    }
  });
};

function probka(numer) {
  $.ajax({
    type: "POST",
    url: "generator.php",
    dataType: "html",
    data: {
      "numer": (numer),
      "tlo": $("#tlo_"+numer).val(),,
      "obrys": $("#obrys_"+numer).val(),,
      "funkcja": "probka"
    },
    success:function(dane){
      $("div#probka").html(dane);
    },
    beforeSend:function(){},
    complete:function(){},
    error:function(xhr){
      console.log(xhr.responseText);
    }
  });
};
