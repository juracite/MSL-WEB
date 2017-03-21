$(document).ready(function(){
  $(".open-modal").click(function(){
    $('#modal').fadeIn('slow');
  });
  $("#close-modal").click(function(){
    $('#modal').fadeOut('slow');
  });
});