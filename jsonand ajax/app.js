
var pageCounter = 1;
var animalContainar = document.getElementById("animal-info");
var btn = document.getElementById("btn");

btn.addEventListener("click", function () {
    var ourRequest = new XMLHttpRequest();
    ourRequest.open('GET', 'https://learnwebcode.github.io/json-example/animals-' + pageCounter + '.json');

    ourRequest.onload = function () {
        var ourData = JSON.parse(ourRequest.responseText);
        renderAnimal(ourData);
    };

    ourRequest.send();
    pageCounter++;

    if (pageCounter > 3) {
        btn.classList.add("hide-me");
    }
});

function renderAnimal(data) {
    var readData = "";

    for (i = 0; i < data.length; i++) {
        readData += "<p>" + data[i].name + " is a " + data[i].species + " that likes to eat ";

        for (ii = 0; ii < data[i].foods.likes.length; ii++) {
            if (ii == 0) {
                readData += data[i].foods.likes[ii];
            } else {
                readData += " and " + data[i].foods.likes[ii];
            }
        }

        readData += " and dislikes ";

        for (ii = 0; ii < data[i].foods.dislikes.length; ii++) {
            if (ii == 0) {
                readData += data[i].foods.dislikes[ii];
            } else {
                readData += " and " + data[i].foods.dislikes[ii];
            }
        }

        readData += ".</p>";
    }

    animalContainar.insertAdjacentHTML('beforeend', readData);
}
