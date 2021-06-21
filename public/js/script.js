const article = document.querySelector("article#lista");

function principale(){
    article.innerHTML= "<section id='preferiti' class='tipo'><h2>I tuoi veicoli preferiti</h2><div class='show-case'></div></section>" + "<section id='veicoli' class='tipo' > <h2>Tutti i veicoli</h2><div class='show-case'></div></section>";
    fetch(PREF_ROUTE).then(onResponse).then(onJsonP);
    fetch(CONT_ROUTE).then(onResponse).then(onJSON);
}


function onResponse(response){
    return response.json();
}

function onText(promise){
    return promise.text();
}

function onText1(response){
    if(response==1){
        console.log('ok');
    }else{
        console.log('errore');
    }
    
    principale();
}

function onResponsePost(response){
    return response.text();
}



function onJSON(json){
    console.log(json);
    const veic = [];
    for(element of json){
        veic.push(element);
    }
    carica(veic);

}


principale();

let veicoli=0;

function carica(contenuto){

    for(let elemento of contenuto){
        if(elemento.id!==''){
            veicoli++;
        }
    }

    if(veicoli===0){
        document.querySelector("section#veicoli").classList.add("hide");
        document.querySelector("section#veicoli").classList.remove("show");
    } else{
        document.querySelector("section#veicoli").classList.remove("hide");
        document.querySelector("section#veicoli").classList.add("show");
    }

    for(let elemento of contenuto){
        let sezione= undefined;
        if(elemento.id!==''){
            sezione=document.querySelector("section#veicoli div.show-case");
        }
        create_slot(sezione,elemento,true);
    }
}



function create_slot(sezione,elemento,preferiti){
    if(preferiti===true){
        pref_='preferiti';
        img_="immagini/add.png";
    } else{
        pref_='rimuovi';
        img_="immagini/rem.png";
    }
    const slot=document.createElement("div");
    slot.classList.add("card");
    const immagine=document.createElement("img");
    immagine.src=elemento.immagine;
    immagine.classList.add("image");
    const about=document.createElement("div");
    const titolo=document.createElement("h3");
    titolo.textContent=elemento.titolo;
    const prezzo=document.createElement("p");
    prezzo.textContent="€ " + elemento.prezzo;
    const descrizione=document.createElement("p");
    descrizione.textContent=elemento.descrizione;
    descrizione.classList.add("hide");
    descrizione.classList.add("description");
    const plus=document.createElement("img");
    const info=document.createElement("img");
    plus.src=img_;
    plus.dataset.codice=elemento.id;
    info.src="immagini/details.png";
    info.dataset.codice=elemento.id;
    plus.classList.add(pref_);
    info.classList.add("info");
    about.appendChild(titolo);
    about.appendChild(prezzo);
    about.appendChild(descrizione);
    about.appendChild(plus);
    about.appendChild(info);
    slot.appendChild(immagine);
    slot.appendChild(about);
    slot.dataset.codice=elemento.id;
    sezione.appendChild(slot);

    const no_preferito=document.querySelectorAll("div.card div img.rimuovi");
    for(pulsante of no_preferito){
        pulsante.addEventListener("click",remPreferiti);
    }
    const preferito=document.querySelectorAll("div.card div img.preferiti");
    for(pulsante of preferito){
        pulsante.addEventListener("click",addPreferiti);
    }
    const info_button=document.querySelectorAll("div.card div img.info");
    for(button of info_button){
        button.addEventListener("click",visualizzaDettagli);
    }
} 



function onJsonP(json){
    if(json.length===0)
        document.querySelector("section#preferiti").classList.add("hide");
    else{
        for(element of json){
            create_slot(document.querySelector("section#preferiti div.show-case"), element, false);
        }
    }
}


function addPreferiti(event){
    
    const id=event.currentTarget.dataset.codice;

    const aggiun=new FormData();
    aggiun.append('id',id);
    fetch(ADD_ROUTE,{
        method:'post',
        body:aggiun,
        headers:{'X-CSRF-TOKEN':CSFR_TOKEN}
    }).then(onResponsePost).then(onText1);

}



function remPreferiti(event){
    const id=event.currentTarget.dataset.codice;

    const rimuovi=new FormData();
    rimuovi.append('id',id);
    fetch(REM_ROUTE,{
        method:'post',
        body:rimuovi,
        headers:{'X-CSRF-TOKEN':CSFR_TOKEN}
    }).then(onText1);

}




const preferiti=[];
const ricerca=[];

const info_button=document.querySelectorAll("div.card div img.info");
for(let button of info_button){
    button.addEventListener("click",visualizzaDettagli);
}


function visualizzaDettagli(event){
    const button=event.currentTarget;
    const descrizione = button.parentNode.querySelector("p.hide");
    if(descrizione !== null){
        descrizione.classList.add("show");
        descrizione.classList.remove("hide");
    }
    else{
        const descrizione=button.parentNode.querySelector("p.description");
        descrizione.classList.add("hide");
        descrizione.classList.remove("show");
    }
}



const barra_di_ricerca=document.querySelector("#search input");
barra_di_ricerca.addEventListener("keyup",ricercaElemento);


function ricercaElemento(){
    ricerca.splice(0,ricerca.length);
    const barra_di_ricerca=document.querySelector("#search input");
    const testo=barra_di_ricerca.value;
    if(testo!==""){
       mostraRicerca(testo);
    }else{
        principale();
    }
}

function mostraRicerca(text){
    article.innerHTML= "<section id='ricerca' class='tipo'><h2>Ricerca</h2><div class='show-case'></div></section>";
    fetch("ricerca/"+text).then(onResponse).then(RicercaJson);
}

function RicercaJson(json){
    if(json.length===0){
        article.innerHTML = "<section id='ricerca' class='tipo'><h2>Ricerca</h2></section>";
    }
    else{
        for(element of json){
            create_slot(document.querySelector("section#ricerca div.show-case"), element, true);
        }
    }
   
}


const bottoneNew=document.querySelector("#newC.button");
bottoneNew.addEventListener("click", modale);

function modale(){
    const mod=document.querySelector("section#modale");
    mod.classList.remove('hidden');

}

const closeModal=document.querySelector("section#modale #close_div");
closeModal.addEventListener("click", chiudiModale);

function chiudiModale(){
    const mod=document.querySelector("section#modale");
    mod.classList.add('hidden');
} 



const bottoneRem=document.querySelector("#remC.button");
bottoneRem.addEventListener("click", modaleR);

function modaleR(){
    const modR=document.querySelector("section#modaleRem");
    modR.classList.remove('hidden');

}

const closeModalR=document.querySelector("section#modaleRem #close_div");
closeModalR.addEventListener("click", chiudiModaleR);

function chiudiModaleR(){
    const modR=document.querySelector("section#modaleRem");
    modR.classList.add('hidden');

} 