const form = document.forms['login'];
 form.addEventListener('submit',CheckValues);

 function CheckValues(event){
    let OK = true;
    const inputs = form.querySelectorAll('input');
    for (const input of inputs) {
        if (input.value === ''){
            OK = false;
            event.preventDefault();
        }
    }
 }