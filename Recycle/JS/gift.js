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
