Update();
function Update(){
    fetch("http://localhost/hw1/get_ProfileInfo.php").then(onResponse);
}


function onResponse(response){
    if(response.ok){
        response.json().then(onJSON);
    }
    else{
        console.error("Info non trovate");
    }
}

function onJSON(body){
    console.log(body);
    const nome = document.createElement('span');
    nome.innerHTML ="Nome : "+body[0]['nome'];
    const cognome = document.createElement('span');
    cognome.innerHTML ="Cognome : "+body[0]['cognome'];
    const email = document.createElement('span');
    email.innerHTML ="Email : "+body[0]['email'];
    const telefono = document.createElement('span');
    telefono.innerHTML ="Telefono : "+body[0]['telefono'];
    const username = document.createElement('span');
    username.innerHTML ="Username : "+body[0]['username'];
    const info = document.createElement('div');
    info.id = 'info';
    info.appendChild(username);
    info.appendChild(nome);
    info.appendChild(cognome);
    info.appendChild(email);
    info.appendChild(telefono);
    const title = document.createElement('span');
    title.innerHTML = "CHANGE PROFILE PIC";
    const button = document.createElement('input');
    button.type = 'file';
    button.name = 'Media';
    button.addEventListener('change', ChangeProfilePic);
    const image = document.createElement('img');
    if (body[0]['propic'] != null) {
        image.src = body[0]['propic'];    
    }
    else{
        image.src = "Images/Index/pokeball_retro.png";
    }
    const picture = document.createElement('div');
    picture.id = 'picture';
    picture.appendChild(image);

    picture.appendChild(button);
    const profile = document.querySelector('#profile');
    profile.innerHTML = "";
    profile.appendChild(picture);
    profile.appendChild(info);
}

function ChangeProfilePic(event){
    const data = new FormData();
    const file = event.currentTarget.files[0];
    data.append('Propic',file);
    fetch("http://localhost/hw1/post_Propic.php",{method:'post', body: data}).then(onPropicResponse);
}

function onPropicResponse(response){
    if(response.ok){
        response.text().then(onPropicJSON);
    }
    else{
        console.error("Errore durante il caricamento dell'immagine");
    }
}

function onPropicJSON(data){
    console.log(data)
    Update();
}