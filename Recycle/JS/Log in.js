//loading screen
// $(document).ready(function () {
//     $("#loading").fadeOut(1000, function () {
//         $("body").css("overflow", "auto");
//         $("#loading").css("opacity", "0");
//         $("#loading").css("zIndex", "0");
//     });
// });


//side bar
let colorBoxWidth = $("#colorsBox").innerWidth();
$("#sideBar").css("left",`-${colorBoxWidth+1}px`);
$("#sideBarToggle").click(function () {
    let colorBoxWidth = $("#colorsBox").innerWidth();
    if($("#sideBar").css("left") == "0px"){
    $("#sideBar").animate({left:`-${colorBoxWidth}`} , 1000);
    }
    else{
    $("#sideBar").animate({left:`0px`} , 1000);
    }
});
let colorsBox = $(".color-item");
$(colorsBox).eq(0).click(function(){
    $("body").css("color","#181626")
});
$(colorsBox).eq(1).click(function(){
    $("body").css("color","#BA120E")
});
$(colorsBox).eq(2).click(function(){
    $("body").css("color","#555")
});
$(colorsBox).eq(3).click(function(){
    $("body").css("color","#027368")
});


//angle_up scroll
$(window).scroll(function () {
    let windowScroll = $(window).scrollTop();
    if (windowScroll > 400) {
        $("#angle").fadeIn(500);
    }
    else {
        $("#angle").fadeOut(500);
    }
});
$(".angle-up").click(function () {
    $("html,body").animate({ scrollTop: 0 }, 1000);
});


 //navbar links
 $(".navbar a[href^= '#']").click(function () {
   a = $(this).attr("href");
   offset = $(a).offset().top;
   $("html,body").animate({ scrollTop: offset }, 1000);
 });


function validate() {

  var text = document.getElementById("email").value;
  var password = document.getElementById("pwd").value;
  var regx = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  var z = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;

  if (regx.test(text) && z.test(password)) {

    document.getElementById("lbltext").innerHTML = "Good email";
    document.getElementById("lbltext").style.visibility = "hidden";
    document.getElementById("email").style.border = "1px solid gray";
    document.getElementById("lblt").innerHTML = "Good password";
    document.getElementById("lblt").style.visibility = "hidden";
    document.getElementById("pwd").style.border = "1px solid gray";
    window.location = "index.html";

  } else {
    document.getElementById("lbltext").innerHTML = "Failed email"
    document.getElementById("lbltext").style.visibility = "visible";
    document.getElementById("lbltext").style.color = "red";
    document.getElementById("email").style.border = "1px solid red";
    document.getElementById("lblt").innerHTML = "Please enter your correct password"
    document.getElementById("lblt").style.visibility = "visible";
    document.getElementById("lblt").style.color = "red";
    document.getElementById("pwd").style.border = "1px solid red";

  }
  /**Password 
  if(z.test(password)) {
      document.getElementById("lblt").innerHTML="Good password";
      document.getElementById("lblt").style.visibility="hidden";
      document.getElementById("pwd").style.border="1px solid gray"
      
  }
  else{
      document.getElementById("lblt").innerHTML="Please enter your correct password"
      document.getElementById("lblt").style.visibility="visible";  
      document.getElementById("lblt").style.color="red";
      document.getElementById("pwd").style.border="1px solid red";
  } */
}
