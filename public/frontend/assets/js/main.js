// Preloader ===============================
setTimeout(function(){
    $('.loader_bg').fadeToggle();
}, 1500);

// Testimonial Slider =======================
$(".owl-carousel").owlCarousel({
    autoplay: true,
    slideSpeed:1000,
    items : 2,
    loop: true,
    nav:true,
    navText:['<i class="fa fa-arrow-left"></i>','<i class="fa fa-arrow-right"></i>'],
    margin: 30,
    dots: true,
    responsive:{
        320:{
            items:1
        },
        767:{
            items:2
        },
        600:{
            items:2
        },
        1000:{
            items:2
        }
    }

});

// Back to top ===================================
var btn = $('#back_to_top_btn');

$(window).scroll(function() {
if ($(window).scrollTop() > 300) {
    btn.addClass('show');
} else {
    btn.removeClass('show');
}
});

btn.on('click', function(e) {
e.preventDefault();
$('html, body').animate({scrollTop:0}, '300');
});



// Modal
let closeBtn = document.querySelector(".close");
let modalBox = document.querySelector(".modal_box");

closeBtn.addEventListener("click", function(){
    modalBox.style.display = "none";
});

window.addEventListener('load', function(){
    setTimeout(
        function(){
            modalBox.style.display = "block";
        },
        3000
    )
});
