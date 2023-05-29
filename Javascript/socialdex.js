fetch("http://localhost/hw1/get_pokemonTile.php").then(onresp);
function onresp(response){
    if(response.ok){
        response.json().then(onjson);
    }
}
function onjson(body){
    console.log(body);
    const pokemon = document.getElementById('Pokemon');
    for (const pokemon of body) {
        const img = document.createElement('img');
        img.src = pokemon.img;
        const image = document.createElement('div');   
        image.id = 'image';
        image.appendChild(img);
        const name = document.createElement('span');
        name.innerHTML = pokemon.name;
        const type1 = document.createElement('span');
        type1.innerHTML = pokemon.type_1;
        type1.id = pokemon.type_1;
        const seen = document.createElement('div');
        seen.appendChild(name);
        seen.appendChild(type1);
        if(pokemon.type_2){
            const type2 = document.createElement('span');
            type2.innerHTML = pokemon.type_2;
            type2.id = pokemon.type_2;
            seen.appendChild(type2);
        }
        
    }
}