const X_IMG = 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/1083533/x.png';
const O_IMG = 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/1083533/circle.png';

getPokemon();
let Pokemon_id = null;
function getPokemon(){
    const choosen = Math.floor(Math.random() * 699) + 1;
    console.log(choosen);
    fetch("http://localhost/hw1/get_Pokemon.php?poke="+choosen).then(onResponse);
}

function onResponse(result){
    if(result.ok){
        result.json().then(onJson);
    }
    else{
        console.error('Errore nella generazione del Pokemon');
    }
}

function onJson(result){
    console.log(result);
    Pokemon_id = result.id;
    const div = document.createElement('div');
    const img = document.createElement('img');
    img.src = result.img;
    div.appendChild(img);
    const div_2 = document.createElement('div');
    const name = document.createElement('span');
    name.innerHTML = result.name;
    const type1 = document.createElement('span');
    type1.innerHTML = result.type_1;
    type1.id = result.type_1;
    div_2.appendChild(name);
    div_2.appendChild(type1);
    if(result.type_2){
        const type2 = document.createElement('span');
        type2.innerHTML = result.type_2;
        type2.id = result.type_2;
        div_2.appendChild(type2);
    }
    const Pokemon = document.querySelector('#Pokemon');
    const data = new FormData();
    data.append('Pokemon', Pokemon_id);
    fetch("http://localhost/hw1/post_incontro.php", {method: 'post', body: data}).then(onResponseincontro);
    Pokemon.appendChild(div);
    Pokemon.appendChild(div_2);
}

function onResponseincontro(resp){
    if(!resp.ok){
        console.error("Attenzione Pokemon Non Registrato");
    }
    else{
        resp.text().then(ontext);
    }
}
function ontext(body){
    console.log(body);
}

//FUNCTIONS
function PutX(event) {
     assingSpace(event.currentTarget, 'X');
    if (checkWinner() !== null)
    {
        DisplayResult();
    }else{
        PutO();
    }
}

function PutO(){
    if (freeboxes.length > 0) {
        const index = Math.floor(Math.random() * freeboxes.length)
        const choosenbox = freeboxes[index];
        assingSpace(choosenbox, 'O');
    }
    if (checkWinner() !== null || freeboxes.length === 0)
    {
        DisplayResult();
    }
}

function assingSpace(space,owner){
    const image = document.createElement('img');
    image.src = owner === 'X'? X_IMG : O_IMG;
    space.appendChild(image);
    space.removeEventListener('click', PutX);
    space.classList.remove('notchosen');

    takenboxes[space.id] = owner;
    const indextoremove = freeboxes.indexOf(space);
    freeboxes.splice(indextoremove,1);

}
//ADDING LISTENERS TO ALL BOXES
const allboxes = document.querySelectorAll('#grid div');
const freeboxes = [];
const takenboxes = {};
for (const box of allboxes) {
    box.addEventListener('click', PutX);
    freeboxes.push(box);
}
function checkbox(box1,box2,box3)
{
    if(takenboxes[box1] !== undefined && takenboxes[box1] === takenboxes[box2] && takenboxes[box1] === takenboxes[box3])
    {
       return takenboxes[box1];
    }
    return null;
}

function checkWinner()
{
    let rowwinner = checkbox('one','two','three') || checkbox('four','five','six') || checkbox('seven','eight','nine');
    let columnwinner = checkbox('one','four','seven') || checkbox('two','five','eight') || checkbox('three','six','nine');
    let diagonalwinner = checkbox('one','five','nine') || checkbox('three','seven','five');
    return rowwinner || columnwinner || diagonalwinner;
}

function DisplayResult(){
    
    const boxes = document.querySelectorAll('#grid div');
    for (const box of boxes) {
        box.removeEventListener('click',PutX);
        box.classList.remove('notchosen');
    }
    const div = document.createElement('div');
    div.id = 'finish';
    const span = document.createElement('span');
    const final = checkWinner();
    if (final === 'X'){
        span.innerHTML = "Complimenti hai catturato il Pokemon! ora potrai vedere tutti i suoi dati nel SocialDex";
        const data = new FormData();
        data.append('method','post');
        data.append('Pokemon', Pokemon_id);
        data.append('catturato', 1);
        fetch("http://localhost/hw1/post_incontro.php", {method: 'post', body: data}).then(onResponseincontro);
    }
    else if(final === 'O' || freeboxes.length === 0) {
        span.innerHTML = "Bella Sfida! la prossima volta potrai diventare il Vincitore!";
    }
    const button = document.createElement('button');
    button.innerHTML = 'Torna alla homepage';
    button.type = 'button';
    button.addEventListener('click', Homepage);
    div.appendChild(span);
    div.appendChild(button);
    const result = document.querySelector('#Result');
    result.innerHTML = "";
    result.appendChild(div);
}
function Homepage(){
    window.location = "homepage.php";
}
//GAME