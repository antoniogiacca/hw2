function controllo(event){ 
    if(form.password.value!==form.conf_password.value){
        alert("Le password sono diverse.");	
        event.preventDefault();
    }
    
    if(form.username.value.lenght == 0 || form.name.value.length == 0 || form.surname.value.length == 0 || form.email.value.length == 0 || form.password.value.length == 0){
        alert("Compilare tutti i campi.");
        event.preventDefault();
    }
    if(form.email.value.indexOf('@') == -1){
        alert("L'email non è valida");
        event.preventDefault();
    }

    if(form.password.value.length < 8){
        alert("La password deve essere almeno di 8 caratteri");
        event.preventDefault();
    }
}

function onJson(json){
    console.log(json);
    if(json.exists==true){
        alert("Username già utilizzato, cambiarlo.");
        console.log(form.try);
        form.try.disable=true;
    }else{
        form.try.disable=false;
    }
}

function onResponse(res){
    if (!res.ok) return null;
    return res.json();
}

function controllo_username(event){
    console.log(usr.value);
    const formData=new FormData();
    formData.append('username',usr.value);
	fetch(CONTROLLO_ROUTE ,{
        method:'post',
        body:formData,
        headers:{'X-CSRF-TOKEN':CSFR_TOKEN}
    }).then(onResponse).then(jsonUser);
}

function jsonUser(json){
    if(json.exists==true){
        alert("Username gia preso, scegline un altro");
        console.log(form.try);
        form.try.disable=true;
    }else{
        form.try.disable=false;
    }
}

const form = document.forms['nome_form'];
form.addEventListener('submit', controllo);

const usr=form.username;
usr.addEventListener('blur',controllo_username);