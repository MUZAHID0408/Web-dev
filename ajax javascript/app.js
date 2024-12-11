console.log("Hello world");

let fetchBtn = document.getElementById("fetchBtn");

fetchBtn.addEventListener('click', fetchBtnclicked);

function fetchBtnclicked(){
    const xhr = new XMLHttpRequest();

    xhr.onprogress = function(){
        console.log("On Progress please wait");
    }
    xhr.onerror = errorFunction;


    function errorFunction(){
        alert("AJAX request failed. Status code: "+ this.status+" "+ this.statusText);
    }
    xhr.onload = function(){
        console.log(this.responseText);
    }
    xhr.open('GET', 'muzahid.txt', true);
    xhr.send();
}