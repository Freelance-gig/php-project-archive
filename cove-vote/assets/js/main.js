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

  // Search Feature
  homeSearch()
  formSearch()
})

// Search by name function
function homeSearch () {
  $("#home-search-button").click(function ( ) {
    var homeInputValue = $("#home-search").val();
    if (homeInputValue !== "") {
        window.location.href= `./election-list.php?search_q=${homeInputValue}`
    }
  })
}

// Search by polling unit and location function
function formSearch () {
  $("#form-search-button").click(function() {
    var location = $("#location").val();
    var polling_unit= $("#polling_unit").val();
    if (location !== "" && polling_unit !== "") {
      window.location.href= `./election-list.php?location=${location}&polling_unit=${polling_unit}`
    }
  })
}