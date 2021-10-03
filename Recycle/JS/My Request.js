// //prevent page refresh on submit
// $("#prevent").submit(function(e) {
//     e.preventDefault();
// });

// //api
// getRequests();
// var requests = [];
// async function getRequests() {
//     var apiResponse = await fetch("https://jsonplaceholder.typicode.com/posts/1/comments");
//     var finalResult = await apiResponse.json();
//     requests = finalResult;
//     display();
// }

// //display function
// function display() {
//     var cartoona = ``;
//     for (var i = 0; i < requests.length; i++) {
//         cartoona +=
//     `<tr>
//       <td>${requests[i].name}</td>
//       <td>${requests[i].id}</td>
//       <td>${requests[i].email}</td>
//       <td>sourcs</td>
//       <td><button class="btn btn-outline-danger deleteBtn">Delete</button></td>
//     </tr>`;
//     }
//     document.getElementById("tableBody").innerHTML = cartoona;
// }

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

//search function
function myFunction() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[1];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }
// function searchProduct (searchTerm){
//     var cartoona = ``;
//     for (var i=0; i<table.length; i++){
//         if (table[i].name.toLowerCase().includes(searchTerm.toLowerCase())){
//             cartoona += `
//             <tr role="row">
//             <td>'.$matrial_type.'</td>
//             <td>'.$Amount.'</td>
//             <td>'.$Date.'</td>
//             <td>'.$exchangeMatrial.'</td>
//             <td><form method="post" onclick="" action="SQLrequest/delete_Request.php"><input hidden="hidden" value="'.$Date.'" name="date"> <input type="submit" class="btn btn-outline-danger deleteBtn"  value="Delete"/> </form></td>     
//             </tr>`;
//         }
//     }
//     document.getElementById("tableBody").innerHTML = cartoona;
// }

//delete function
// $("table").on("click", ".deleteBtn", function() {
//     var rowsNumber = $("tr").length - $("tr.more").length;
//     $(this).parents("tr").remove();
//     if (rowsNumber !== $("tr").length - $("tr.more").length) {
//         $(".more").first().show().removeClass("more");
//     }
//     if ($(".more").length === 0) {
//         $(".view").addClass("disabled").text("View All");
//     }
// });


//validation
let typeValue = document.getElementById("typeInput");
let amountValue = document.getElementById("amountInput");
let dateValue = document.getElementById("dateInput");
let selectValue = document.getElementById("selectInput");

// type validation
function typeValidation (){
    typeRegex = /^[a-zA-Z ]+$/;
    if (typeRegex.test(typeValue.value)) {
        $("#typeAlert").css("display", "none");
    }
    else {
        $("#typeAlert").css("display", "block");
    }
}
$("#typeInput").blur(typeValidation);

// amount validation
function amountValidation() {
    if (amountValue.value > 100 || amountValue.value < 20 || amountValue.value == "") {
        $("#amountAlert").css("display", "block");
    }
    else {
        $("#amountAlert").css("display", "none");
    }
}
$("#amountInput").blur(amountValidation);

//show requests table
$(".see-all").click(function(){
    $(".requests-section").slideDown();
});

//hide requests table
$(".hide-all").click(function(){
    $(".requests-section").slideUp();
});

//add points
// amountValue = document.getElementById("amountInput");
let points = 0;
function calcPoints(){
    if (amountValue.value != "" && typeValue.value != "" && dateValue.value != "" && selectValue.value != "Choose"){
        if (amountValue.value >= 61 && amountValue.value <= 100){
            points += 10;
        }
        else if (amountValue.value >= 20 && amountValue.value <= 60) {
            points += 5;
        }
    }
    console.log(points);
}

//clear form after add
function clearForm(){
    typeValue.value = "";
    amountValue.value = "";
    dateValue.value = "";
    selectValue.value = "Choose";
}