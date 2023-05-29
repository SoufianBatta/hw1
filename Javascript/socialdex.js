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
        name.innerHTML ="Name : "+ pokemon.name;
        const type1 = document.createElement('span');
        type1.innerHTML = pokemon.type_1;
        type1.id = "Type 1 : " +pokemon.type_1;
        const seen = document.createElement('div');
        seen.id = 'seen';
        seen.appendChild(name);
        seen.appendChild(type1);
        if(pokemon.type_2){
            const type2 = document.createElement('span');
            type2.innerHTML ="Type 2 : " +pokemon.type_2;
            type2.id = pokemon.type_2;
            seen.appendChild(type2);
        }
        const hp = document.createElement('span');
        const attack = document.createElement('span');
        const defense = document.createElement('span');
        const sp_attack = document.createElement('span');
        const sp_defense = document.createElement('span');
        const speed = document.createElement('span');
        const height = document.createElement('span');
        const weight = document.createElement('span');
        const captured = document.createElement('div');
        captured.id = 'captured';
        if (pokemon.catturato === 0){
            captured.classList.add('hidden');
        }
        hp.innerHTML ="HP : " + pokemon.hp;
        attack.innerHTML = "Attack : " + pokemon.attack;
        defense.innerHTML = "Defense : " + pokemon.defense;
        sp_attack.innerHTML = "Special Attack : " + pokemon.special_attack;
        sp_defense.innerHTML = "Special Protection : " + pokemon.special_defense;
        speed.innerHTML = "Speed : " + pokemon.speed;
        height.innerHTML = "Height : " + pokemon.height;
        weight.innerHTML = "Weight : " + pokemon.weight;
    }
}