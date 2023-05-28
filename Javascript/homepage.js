const poke = document.forms['poke'];
poke.addEventListener('submit', cercaPokemon);

function cercaPokemon(event){
    event.preventDefault();
    const input = poke.querySelector('input');
    if (input.value !== ''){
    input.value = input.value.toLowerCase();
    fetch("http://localhost/hw1/get_Pokemon.php?poke="+input.value).then(onresponse);
    }
}

function onresponse(response){
    if (response.ok) {
        response.json().then(onJSON);
    }
    else{
        console.error("Pokemon non Trovato");
    }
}

function onJSON(body){
    console.log(body);
    /*const div = document.querySelector('#Pokemon');
    const img = div.querySelector('img');
    console.log(body.sprites);
    img.src = body['sprites']['versions']['generation-v']['black-white']['animated']['front_shiny'];*/
}