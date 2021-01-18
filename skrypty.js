$(document).ready(function(){
 $("button#schemat").click(function(){
   uzyskaj_kalendarium();
 })
});

function uzyskaj_kalendarium() {
  $.ajax({
    type: "POST",
    url: "generator.php",
    dataType: "json",
    data: {
      "miesiac": $("input#miesiac").val(),
      "rok": $("input#rok").val(),
      "funkcja": "drukuj_kalendarium"
    },
    success: function(dane){
      console.log(dane);
      $("span").html(dane);
    },
    beforeSend: function(){},
    complete: function(){},
    error: function(xhr){
      console.log(xhr.responseText);
      $("span").html(xhr.responseText);
    }
  });
}
