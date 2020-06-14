$(document).ready(function() {

 $('#livesearch').liveSearch({
    table : '#feature-list' // table selector
  });
 
 $(window).resize(function() {
  sizeLayerControl();
});

 $("#about-btn").click(function() {
  $("#aboutModal").modal("show");
  $(".navbar-collapse.in").collapse("hide");
  return false;
});

 $("#legend-btn").click(function() {
  $("#legendModal").modal("show");
  $(".navbar-collapse.in").collapse("hide");
  return false;
});

 $("#login-btn").click(function() {
  $("#loginModal").modal("show");
  $(".navbar-collapse.in").collapse("hide");
  return false;
});

 $("#list-btn").click(function() {
  animateSidebar();
  return false;
});

 $("#nav-btn").click(function() {
  $(".navbar-collapse").collapse("toggle");
  return false;
});

 $("#sidebar-toggle-btn").click(function() {
  animateSidebar();
  return false;
});

 $('#petunjukArah').click(function(e) {
  if (window.matchMedia('(max-width: 600px)').matches) {
    animateSidebar();
    return false;
  }
});

$("#tutup-pencarian").click(function(e) {
  if (window.matchMedia('(max-width: 600px)').matches) {
    animateSidebar();
    return false;
  }
});

function animateSidebar() {
  $("#sidebar").animate({
    width: "toggle"
  }, 350, function() {
    map.invalidateSize();
  });
}

function sizeLayerControl() {
  $(".leaflet-control-layers").css("max-height", $("#map").height() - 50);
}
})