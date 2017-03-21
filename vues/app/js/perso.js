$(document).ready(function(){
  $(".open-modal").click(function(){
    $('#modal').fadeIn('slow');
  });
  $("#close-modal").click(function(){
    $('#modal').fadeOut('slow');
  });

  (function() {
    $(function() {
      var collapseMyMenu, expandMyMenu, hideMenuTexts, showMenuTexts;
      expandMyMenu = function() {
        return $("nav.sidebar").removeClass("sidebar-menu-collapsed").addClass("sidebar-menu-expanded");
      };
      collapseMyMenu = function() {
        return $("nav.sidebar").removeClass("sidebar-menu-expanded").addClass("sidebar-menu-collapsed");
      };
      showMenuTexts = function() {
        return $("nav.sidebar ul a span.expanded-element").show();
      };
      hideMenuTexts = function() {
        return $("nav.sidebar ul a span.expanded-element").hide();
      };
      return $("#justify-icon").click(function(e) {
        if ($(this).parent("nav.sidebar").hasClass("sidebar-menu-collapsed")) {
          
          expandMyMenu();
          $('#header').css("width", "100%").css('width', '-=56px');
          showMenuTexts();
          $(this).css({
            color: "#FFF"
          });
        } else if ($(this).parent("nav.sidebar").hasClass("sidebar-menu-expanded")) {
          collapseMyMenu();
          $('#header').css("width", "100%").css('width', '+=56px');
          hideMenuTexts();
          
          $(this).css({
            color: "#FFF"
          });
        }
        return false;
      });
    });
  }).call(this);

  $('#change-pass-button').click(function(){
    $('.form-change-pass').show();
    $('.form-change-pass').animate({opacity: 1},300);
  });
  $('#close-pass-modal').click(function(){
    $('.form-change-pass').animate({opacity: 0},300);
    $('.form-change-pass').hide().delay(400);
  });
});