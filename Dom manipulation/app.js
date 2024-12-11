let btn = document.getElementById('print_btn');
btn.addEventListener('click', function(event){
    event.preventDefault();
    let firstName = document.getElementById('firstName').value;
    let lastName = document.getElementById('lastName').value;

    document.getElementById('output').innerText = `Full name: ${firstName} ${lastName}`; 
})