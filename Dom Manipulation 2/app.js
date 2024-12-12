let btn = document.getElementById('output');

btn.addEventListener('click', function(event){
    event.preventDefault();
    let element = document.getElementById('items');
    let total_items = element.options.length;
    let options = element.options;
    let output = '';
    for(let i = 0; i< total_items; i++){
        output += `${options[i].text} `;
    }

    alert(`There are ${total_items} items in drom down list and they are ${output} `);

})