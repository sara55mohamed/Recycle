$(".deleteForm").submit(function (e) {
    e.preventDefault();
});

//get all users
// let allUsers = [];
// async function getUsers(id) {
//     let apiResponse = await fetch(`http://localhost/Recycle/getRequestAPI.php?id=${id}`);
//     let finalResult = await apiResponse.json();
//     allUsers = finalResult;
//     console.log(allUsers);
// }
// getUsers(18);


//get all requests
// let allRequests = [];
// async function getRequests () {
//     let apiResponse = await fetch (`http://localhost/Recycle/requestsAPI.php`);
//     let finalResult = await apiResponse.json();
//     allRequests = finalResult;
//     // displayMovies ();
//     console.log(allRequests);
// }
//getRequests();


//post api (sign up & settings)
/*document.querySelector('#regForm').addEventListener('submit', function (e) {
    // e.preventDefault();
    //  let form = document.querySelector('#regForm');
    //  const data = new URLSearchParams();
    //  for (const p of new FormData(form)){
    //      data.append(p[0], p[1]);
    //  }

    let data = new FormData();
    let customFile = document.querySelector('#customFile');
    let fileName = customFile.files[0];
    let inputFName = document.querySelector('#inputFName');
    let inputLName = document.querySelector('#inputLName');
    let inputEmail = document.querySelector('#inputEmail');
    // let inputEmail2 = document.querySelector('#inputEmail2');
    let inputPassword = document.querySelector('#inputPassword');
    let phoneNumber = document.querySelector('#phoneNumber');
    let inputAddress = document.querySelector('#inputAddress');
    let inputState = document.querySelector('#inputState');
    let output = document.querySelector('#output');
    data.append("image", fileName);
    data.append("first_name", inputFName.value);
    data.append("last_name", inputLName.value);
    data.append("email", inputEmail.value);
    // data.append("new_email", inputEmail2.value);
    data.append("password", inputPassword.value);
    data.append("address", phoneNumber.value);
    data.append("city", inputAddress.value);
    data.append("area", inputState.value);
    data.append("phone", output.value);

    fetch(`http://localhost/Recycle/postUserAPI.php`, {
        method: 'POST',
        body: data
    });
});*/



//post api (send request)
// let typeInput = document.querySelector('#typeInput');
// let amountInput = document.querySelector('#amountInput');
// let dateInput = document.querySelector('#dateInput');
// let selectInput = document.querySelector('#selectInput');
// let selectedValue;
// $("#selectInput").change(function () {
//     selectedValue = selectInput.value;
//     console.log(selectedValue);
// });
// document.querySelector('#regForm').addEventListener('submit', function (e) {
//     e.preventDefault();
//     let form = document.querySelector('#regForm');
//     const data = new URLSearchParams();
//     for (const p of new FormData(form)) {
//         data.append(p[0], p[1]);
//     }

//     // let data = new FormData();
//     // data.append("matrial_type", typeInput.value);
//     // data.append("amount", amountInput.value);
//     // data.append("date", dateInput.value);
//     // data.append("exchange_matrial", selectedValue);

//     fetch(`http://localhost/Recycle/postRequestAPI.php`, {
//         method: 'POST',
//         body: data
//     });
// });

// let ids = document.getElementsByClassName("hidden");
// for (let i = 0; i < ids.length; i++) {
//     let id = ids[i];
//     console.log(id.value);
// }

// function deleteID(id) {
//     let data = new FormData();
//     data.append('id', id);
//     console.log(id);
//     fetch(`http://localhost/Recycle/deleteRequestAPI.php`, {
//         method: 'POST',
//         body: data
//     });
// }
