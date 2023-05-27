const form = document.forms['signin'];
console.log(form);

form.addEventListener('submit',checknullvalues);

function checknullvalues(event){
    const labels = event.currentTarget.querySelectorAll('label');
    let OK = true;
    for (const label of labels) {
        if (label.querySelector('input').value === '') {
            const div =label.querySelector('div');
            div.classList.remove('hidden');
            event.preventDefault();
            OK = false;
        }
        else{
            const div =label.querySelector('div');
            div.classList.add('hidden');
        }
        
    }
    if (OK) {
        const hidden_input = document.createElement('input');
        hidden_input.type = 'hidden';
        hidden_input.name = 'fromForm';
        hidden_input.value = 'true';
        form.appendChild(hidden_input);
    }
}