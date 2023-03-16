// Preloader ===============================
setTimeout(function(){
$('.loader_bg').fadeToggle();
}, 1500);

// sticky navbar
window.addEventListener("scroll", function(){
var navbar = document.querySelector(".navbar");
navbar.classList.toggle("sticky-navbar", window.scrollY > 51);
});

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
// var btn = $('#back_to_top_btn');

// $(window).scroll(function() {
// if ($(window).scrollTop() > 300) {
// btn.addClass('show');
// } else {
// btn.removeClass('show');
// }
// });

// btn.on('click', function(e) {
// e.preventDefault();
// $('html, body').animate({scrollTop:0}, '300');
// });


// counter ===================================

var a = 0;
$(window).scroll(function() {
let valueDisplays = document.querySelectorAll(".counter");

if(valueDisplays){

var oTop = $('.auto_counter').offset().top - window.innerHeight;
if (a == 0 && $(window).scrollTop() > oTop) {
let interval = 4000;
valueDisplays.forEach((valueDisplay) => {
let startValue = 0;
let endValue = parseInt(valueDisplay.getAttribute("data-count"));
let duration = Math.floor(interval / endValue);
let counter = setInterval(function () {
startValue += 1;
valueDisplay.textContent = startValue;
if (startValue == endValue) {
clearInterval(counter);
}
}, duration);
});
a = 1;
}
}

});


// Gallery View =================================
var gallaryClose = document.querySelector(".popup-image span");
document.querySelectorAll(".gallery_item i").forEach(image =>{
image.onclick = () => {
var img = image.parentNode.previousSibling.previousElementSibling;
document.querySelector(".popup-image").style.display = 'block';
document.querySelector(".popup-image img").src = img.getAttribute('src');
// console.log(eyeParent);
}
});

if(gallaryClose){
    gallaryClose.addEventListener("click", function(){
        document.querySelector(".popup-image").style.display = 'none';
    });
}




// Modal ===================================
let closeBtn = document.querySelector(".close");
let modalBox = document.querySelector(".modal_box");

if(closeBtn){
    closeBtn.addEventListener("click", function(){
        modalBox.style.display = "none";
    });
}

window.addEventListener('load', function(){
    setTimeout(
        function(){
            if(modalBox){
                modalBox.style.display = "block";
            }
        },
        30000
    )
});
