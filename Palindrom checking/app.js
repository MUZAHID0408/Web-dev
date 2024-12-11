let btn = document.getElementById('clickMe');
btn.addEventListener('click', function(event){
    event.preventDefault();
    let text = document.getElementById('text').value;
    let reverseText = text.split('').reverse().join('');
    if(reverseText === text){
        document.getElementById('output').innerText = text + " is a palindrome text";
        return;
    }
    document.getElementById('output').innerText = text + " is not a palindrome text";
    return;
});
