$(document).ready(function() {
  // Menu Navigation
  $('.btn-menu').click(function () {
    $('.nav').addClass('visible');
  })
  $('.btn-close').click(function () {
    $('.nav').removeClass('visible')
  })

  // Slider
  $('.navicon.left').click(function(event) {
    var currentImage =  $('.image-slider img.active');
    var prevImage = currentImage.prev();
    if (prevImage.length) {
        currentImage.removeClass('active').css('z-index', -10);
        prevImage.addClass('active').css('z-index',10)
    }
  })

  $('.navicon.right').click(function(event) {
    var currentImage =  $('.image-slider img.active');
    var nextImage = currentImage.next();
    if (nextImage.length) {
        currentImage.removeClass('active').css('z-index', -10);
        nextImage.addClass('active').css('z-index',10)
    }
  })

  // Dropdown
  $('.dropdown').on("mouseover", function() {
      $('.dropdown-content').addClass('visible')
  }).on("mouseout", function() {
    $('.dropdown-content').removeClass('visible')
  })


  // Tab Navigation
  // - On page load
  $('.form-content').hide()
  $('.auth-form-tab span:first').addClass("active").show()
  $('.form-content:first').show()


  // - On Tab click
  $('.auth-form-tab span').on("click", function(){
    $('.auth-form-tab span').removeClass("active")
    $(this).addClass("active")
    var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
    $(activeTab).fadeIn();    return false;
  })
})