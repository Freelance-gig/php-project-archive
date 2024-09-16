const menuBtn = document.querySelector('.btn-menu');
const closeBtn = document.querySelector('.btn-close');
const menu = document.querySelector('.menu');

menuBtn.addEventListener('click', () => {
    menu.classList.add('visible');
});
  
closeBtn.addEventListener('click', () => {
    menu.classList.remove('visible');
});

// https://www.youtube.com/watch?v=xG8W2rU-AgE

$(document).ready(function() {
    $('.content:first').show()
    $('.tab-nav li:first').addClass('active')


    $('.tab-nav li').click(function(event) {
        index = $(this).index();
        $('.tab-nav li').removeClass('active'); 
        $(this).addClass('active')
        $('.content').hide()
        $('.content').eq(index).show()

    })

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
})