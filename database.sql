DROP DATABASE IF EXISTS CONCESSIONARIA;

CREATE DATABASE CONCESSIONARIA;
USE CONCESSIONARIA;



insert into veicolis(titolo, immagine, prezzo, descrizione, id) values
("Bmw Serie 1", "https://immagini.alvolante.it/sites/default/files/styles/anteprima_640/public/news_galleria/2019/05/bmw-serie-1-2019_02.jpg?itok=cIeqWgFw","30000","La BMW Serie 1 è caratterizzata da un corpo vettura lungo circa 4 metri e 30 centimetri, dimensioni che assicurano una buona abitabilità ai passeggeri posteriori. L’abitacolo della BMW Serie 1 si caratterizza per la presenza di una plancia curata ed orientata verso il guidatore. La gamma di motori disponibili per BMW Serie 1 prevede i benzina e i diesel.","000"),
("Audi Q3 Sportback","https://cdn.drivek.it/configurator-imgs/cars/it/800/AUDI/Q3-SPORTBACK/38737_SUV-5-PORTE/q3-sportback-2019.jpg","50000","Suv-coupé di taglia media, si ispira nelle forme alla più grande Q8, in particolare nell’andamento del montante posteriore e del lunotto, sormontato da un vistoso spoiler.  L’abitacolo è raffinato e tecnologico, in particolare nella plancia: di serie il cruscotto digitale di 10,3 pollici.", "001"),
("Audi A5","https://cdn.drivek.it/configurator-imgs/cars/it/800/AUDI/A5/38925_BERLINA-5-PORTE/audi-a5-sportback-19-front-side.jpg","60000","L’Audi A5 si è aggiornata senza stravolgere le forme e le proporzioni del modello precedente: la coda filante nasconde un bagagliaio più capiente. Notevole la piacevolezza di guida: complice il peso ridotto, l’auto è ancora più maneggevole e segue fedelmente le traiettorie impostate ; validi sia il velocissimo cambio robotizzato a doppia frizione S tronic a sette marce sia il classico tiptronic a otto rapporti.", "002"),
("Fiat Panda","https://www.ansa.it/webimages/img_620x438/2020/10/26/b2396822f2b62ba2a5410e13b801f460.jpg","10000","Ha una linea da piccola multispazio, con volumi squadrati e profili tondeggianti che le danno un aspetto “muscoloso”; utili i profili laterali in plastica che proteggono la vernice dai piccoli urti. Nata per la città, dove trae vantaggio dalla lunghezza di appena 365 cm, dalla buona visibilità e dallo sterzo particolarmente leggero da azionare, la Fiat Panda è abbastanza a suo agio anche nei percorsi extraurbani.", "003"),
("Alfa Romeo Giulia","https://www.motorionline.com/wp-content/uploads/2019/11/alfa-romeo-giulia-2020-prova-interni-motori-allestimenti-consumi-prezzo-03.jpg","35000","Si può ben dire che l’Alfa Romeo Giulia sia la berlina della rinascita della casa milanese: ha linee grintose ma eleganti e un abitacolo piuttosto ben fatto, moderno e ospitale. Ma più di tutto ha una meccanica raffinata, premessa ideale per una guida precisa e coinvolgente.", "004"),
("Audi RSQ8","https://www.motorionline.com/wp-content/uploads/2020/08/Audi-RS-Q8-Tuning-ABT-RSQ8-R-13-1024x683.jpg","120000","L’Audi RS Q8 è la versione più sportiva della gamma Q8 e può contare sul V8 4.0 TFSI biturbo, accoppiato a un cambio automatico tiptronic a 8 rapporti, in grado di erogare ben 600 CV. Gli interni dell’Audi RS Q8 sono lussuosi e tecnologici. A dominare la plancia troviamo i due ampli schermi del sistema MMI.", "005"),
("Yamaha Adventure","http://www.moto-ontheroad.it/cms/wp-content/uploads/2018/09/Yamaha-Tenere-700-World-Raid-9-1070x798.jpg","13000","Realizzata pensando all’offroad serio, il nuovo telaio a doppia culla in acciaio ha la parte inferiore imbullonata per facilitare la sostituzione in caso di necessità ed ha un interasse molto contenuto che ne aumenta l’agilità.", "006"),
("BMW GS 1200","https://www.motociclismo.it/files/galleries/1/6/3/16373/B_1c0cc77fd51386c5e369aa4b28c687dc.jpg","18000", "Rinnovata a inizio 2013 con l’esordio di un motore raffreddato ad aria e liquido, l’endurona BMW continua a essere una delle moto più vendute in Italia. Grande nelle dimensioni ma sempre ben bilanciata, il peso importante si fa sentire solo a moto ferma, perchè in movimento diventa facile da guidare, grazie anche al baricentro basso.", "007"),
("Piaggio Vespa 50","https://www.motociclismo.it/files/galleries/1/8/4/18432/B_11-vespa-primavera-red-.jpg","6000","La Vespa è da sempre un’icona di stile, ha soddisfatto molte generazione e continuerà a farlo ancora per molto. Comoda, semplice e agile, adatta a tutti gli stili di vita, e a tutti i tipi di strada.", "008"),
("Honda SH 300","https://img2.stcrm.it/images/7099084/HOR_STD/1000x/sh300i-scooter-2017-002.jpg", "5000","Il nuovo Honda SH 300 i è uno scooter elegante, versatile e dai consumi contenuti che ti accompagna con stile e sicurezza durante tutti i tuoi spostamenti, sia in città, sia nei tratti extraurbani.", "009");

select * from preferiti;
select * from users;
select * from veicolis;

UPDATE users SET impiegato = '1' WHERE username = '';

/*
CREATE TABLE USERS(
ID INTEGER PRIMARY KEY AUTO_INCREMENT,
USERNAME VARCHAR(255) NOT NULL UNIQUE,
PASSWORD VARCHAR(255) NOT NULL,
EMAIL VARCHAR(255) NOT NULL UNIQUE,
NOME VARCHAR(255) NOT NULL,
COGNOME VARCHAR(255) NOT NULL
)Engine='InnoDB';


CREATE TABLE VEICOLI(
ID INTEGER PRIMARY KEY , 
TITOLO VARCHAR(255) NOT NULL,
PREZZO INTEGER,
DESCRIZIONE NVARCHAR(4000),
IMMAGINE NVARCHAR(4000)
)Engine='InnoDB';


CREATE TABLE PREFERITI(
UTENTE integer,
VEICOLO INTEGER NOT NULL,
INDEX IDX_UTENTE(UTENTE),
INDEX IDX_VEICOLO(VEICOLO),
FOREIGN KEY(UTENTE) REFERENCES USERS(ID) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY(VEICOLO) REFERENCES VEICOLI(ID) ON DELETE CASCADE ON UPDATE CASCADE
)Engine='InnoDB';

*/

