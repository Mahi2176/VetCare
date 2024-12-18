// overlay menu
function openNav() {
    document.getElementById("myNav").classList.toggle("menu_width");
    document.querySelector(".custom_menu-btn").classList.toggle("menu_btn-style");
}


// display current year

function displayYear() {
    var d = new Date();
    var currentYear = d.getFullYear();

    document.querySelector("#displayDate").innerHTML = currentYear;
}
displayYear();

// client section owl carousel
$(".owl-carousel").owlCarousel({
    loop: true,
    margin: 0,
    navText: [],
    dots: false,
    autoplay: true,
    autoplayHoverPause: true,
    navText: ['<span class="fa fa-arrow-left "></span>', '<span class="fa fa-arrow-right"></span>'],
    responsive: {
        0: {
            items: 1
        },
        991: {
            items: 2
        }
    }
});

/** google_map js **/

function myMap() {
    var mapProp = {
        center: new google.maps.LatLng(15.8194623,74.4974411),
        zoom: 18,
    };
    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
}



//poppup
// // Get the popup and the button to open it
// var popup = document.getElementById("popup");
// var openButton = document.getElementById("open-popup");

// // Get the close button inside the popup
// var closeButton = document.getElementById("close-popup");

// // When the user clicks the open button, display the popup
// openButton.addEventListener("click", function() {
//     popup.style.display = "block";
// });

// // When the user clicks on the close button, hide the popup
// closeButton.addEventListener("click", function() {
//     popup.style.display = "none";
// });

// // When the user clicks anywhere outside of the popup, close it
// window.addEventListener("click", function(event) {
//     if (event.target == popup) {
//         popup.style.display = "none";
//     }
// });
