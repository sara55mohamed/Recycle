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


//get governorates
let governorates = [];
async function getGovernorates() {
    let apiResponce = await fetch("http://localhost/Recycle/citiesAPI/governorates.json");
    let finalResult = await apiResponce.json();
    governorates = finalResult[2].data;
    // console.log(governorates);
    displayCity();
}
getGovernorates();


//get cities
let cities = [];
async function getCities() {
    let apiResponce = await fetch("http://localhost/Recycle/citiesAPI/cities.json");
    let finalResult = await apiResponce.json();
    cities = finalResult[2].data;
    // console.log(cities);
}
getCities();


//add cities options
function displayCity() {
    let cartoona = ``;
    for (let i = 0; i < governorates.length; i++) {
        cartoona +=
            `<option value="${governorates[i].governorate_name_en}">${governorates[i].governorate_name_en}</option>`;
    }
    $("#inputState").append(cartoona);
    displayArea();
}


//add cities options
function displayArea() {
    let selectedCity = document.getElementById("inputState");
    let selectedCityValue;
    let cityId;
    $("#inputState").change(function () {
        selectedCityValue = selectedCity.value;
        switch(selectedCityValue){
            case "Cairo":
                cityId = 1;
                break;
            case "Giza":
                cityId = 2;
                break;
            case "Alexandria":
                cityId = 3;
                break;
            case "Dakahlia":
                cityId = 4;
                break;
            case "Red Sea":
                cityId = 5;
                break;
            case "Beheira":
                cityId = 6;
                break;
            case "Fayoum":
                cityId = 7;
                break;
            case "Gharbiya":
                cityId = 8;
                break;
            case "Ismailia":
                cityId = 9;
                break;
            case "Menofia":
                cityId = 10;
                break;
            case "Minya":
                cityId = 11;
                break;
            case "Qaliubiya":
                cityId = 12;
                break;
            case "New Valley":
                cityId = 13;
                break;
            case "Suez":
                cityId = 14;
                break;
            case "Aswan":
                cityId = 15;
                break;
            case "Assiut":
                cityId = 16;
                break;
            case "Beni Suef":
                cityId = 17;
                break;
            case "Port Said":
                cityId = 18;
                break;
            case "Damietta":
                cityId = 19;
                break;
            case "Sharkia":
                cityId = 20;
                break;
            case "South Sinai":
                cityId = 21;
                break;
            case "Kafr Al sheikh":
                cityId = 22;
                break;
            case "Matrouh":
                cityId = 23;
                break;
            case "Luxor":
                cityId = 24;
                break;
            case "Qena":
                cityId = 25;
                break;
            case "North Sinai":
                cityId = 26;
                break;
            case "Sohag":
                cityId = 27;
                break;
        }
        let cartoona = ``;
        for (let i = 0; i < cities.length; i++) {
            if (cities[i].governorate_id == cityId) {
                cartoona +=
                    `<option>${cities[i].city_name_en}</option>`;
            }
        }
        document.getElementById("output").innerHTML = cartoona;
        $("#output").prepend("<option selected disabled>Area</option>");
    });
}

/**upload a photo */
window.addEventListener('load', function () {
    document.querySelector('input[type="file"]').addEventListener('change', function () {
        if (this.files && this.files[0]) {
            var img = document.querySelector('myimg');  // $('img')[0]
            myimg.src = URL.createObjectURL(this.files[0]); // set src to blob url
            img.onload = imageIsLoaded;
        }
    });
});