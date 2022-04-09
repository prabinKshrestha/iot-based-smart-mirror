var slideIndex = 0;
showSlides();
function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}
async function showSlides() {
    var i;
    var slides = document.getElementsByClassName("daily-weather");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
        slides[i].style.opacity = 0;
    }
    slideIndex++;
    async function makeOpacity(){
        var o;
        var opacity;
        var opacityRate = 50;
        if (slideIndex > slides.length) {slideIndex = 1}
        slides[slideIndex-1].style.display = "block";
        for( o = 1; o<= opacityRate; o++){
            opacity = o/opacityRate;
            slides[slideIndex-1].style.opacity = opacity;
            await sleep(100);
        }
    }
    async function decOpacity(){
        var o;
        var opacity;
        var opacityRate = 50;
        slides[slideIndex-1].style.display = "block";
        for( o = opacityRate; o >= 1; o--){
            opacity = o/opacityRate;
            slides[slideIndex-1].style.opacity = opacity;
            await sleep(10);
        }
    }
    makeOpacity();
    await sleep(5000);
    decOpacity();
    setTimeout(showSlides, 500);
}
var slideIndexHeadline = 0;
showSlidesHeadline();

function showSlidesHeadline() {
  var i;
  var slidesHeadline = document.getElementsByClassName("headline-li");
  for (i = 0; i < slidesHeadline.length; i++) {
    slidesHeadline[i].style.display = "none"; 
  }
  slideIndexHeadline++;
  if (slideIndexHeadline > slidesHeadline.length) {slideIndexHeadline = 1} 
  slidesHeadline[slideIndex-1].style.display = "block"; 
  setTimeout(showSlidesHeadline, 15000); // Change image every 5 seconds
}