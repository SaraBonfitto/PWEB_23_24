 Esempi in aula
 =======

 01 - Agenda
 -----------
 Lo scopo di questo esercizio è di acquisire confidenza con lo sviluppo di applicazioni PHP.
 Uno script PHP produce come risultato finale una pagina HTML che sfrutta la presenza di un CSS.
 Per questo motivo, scrivendo uno script PHP, si deve garantire che la visualizzazione finale 
 sia conforme alla sintassi di HTML e che sfrutti in modo adeguato lo stile CSS.

 Nell'[esempio](https://github.com/SaraBonfitto/PWEB_23_24/blob/main/04_PHP/lezione/esempi_in_aula/01),
 prima di includere il [foglio di stile](https://github.com/SaraBonfitto/PWEB_23_24/blob/main/04_PHP/lezione/esempi_in_aula/01/stili/stile.css),
 la visualizzazione della tabella nel file `agenda.php` non è ideale, comme illustrato nell'![immagine](https://github.com/SaraBonfitto/PWEB_23_24/blob/main/04_PHP/lezione/esempi_in_aula/01/immagine.png)
 
 Per migliorare la visualizzazione viene incluso un foglio di stile che, sfruttando i selettori di tipo,
 associa un colore di sfondo ed un posizionamento per i vari elementi.
 
 Si ricorda che per visualizzare una pagina PHP in locale, occorre usare un server Web come Apache, 
 disponibile insieme a PHP e MySQL su XAMPP.
 
 02 - Tavola pitagorica
 Riprendendo l'[esercizio 5](https://github.com/SaraBonfitto/PWEB_23_24/tree/main/02_CSS/lezione/esercizi_in_aula#05--creazione-di-un-link)
 di CSS, in questo [esempio](https://github.com/SaraBonfitto/PWEB_23_24/blob/main/04_PHP/lezione/esempi_in_aula/02) 
 viene riproposta la versione HTML dell'esercizio e una nuova versione PHP.
 Si noti come la quantità di codice HTML da scrivere sia ridotta grazie all'uso di un ciclo for.
 
 03- Login e password
 -----------
 Partendo dall'[esercizio 6](https://github.com/SaraBonfitto/PWEB_23_24/tree/main/02_CSS/lezione/esercizi_in_aula#06--css-di-una-login)
 di CSS, si vuole attivare la form di login per ottenere due risultati diversi a seconda che l'utente inserisca
 le informazioni di login corrette o errate. 
Lo scopo dell'esercizio è scrivere un semplice script php che gestisca i dati passati da una form 
(attraverso il metodo GET/POST) e produca un risultato in formato HTML.

Per la realizzazione di questa semplice applicazione vogliamo:
* Includere pezzi di [pagine HTML](https://github.com/SaraBonfitto/PWEB_23_24/blob/main/04_PHP/lezione/esempi_in_aula/03/header.html)  o codice PHP messo a disposizione su un altro file
* Utilizzare un [foglio CSS](https://github.com/SaraBonfitto/PWEB_23_24/blob/main/04_PHP/lezione/esempi_in_aula/03/sito.css)  nella creazione della pagina. Attraverso uno script PHP non basta solo generare il codice HTML, bisogna anche includere le classi del CSS che servono alla formattazione del contenuto della pagina
* Verificare che le pagine HTML generate attraverso il codice PHP siano **ben formate**. Per far questo si apre la pagina in modalità "visualizza pagina sorgente" e si copia il contenuto in un motore disponibile su Web (e.g. [HTML validator](https://validator.w3.org/)) per controllare la validità delle pagine HTML. Questo diventerà molto importante quando verrà introdotto Javascript.  

[Soluzione](https://github.com/SaraBonfitto/PWEB_23_24/blob/main/04_PHP/lezione/esempi_in_aula/03/login.php) 

 04- Gestione form
 -----------
Partendo dall'[esercizio](https://github.com/SaraBonfitto/PWEB_23_24/blob/main/01_HTML/lezione/esercizi_in_aula/08/datiUtente.html)
scopo di questa modifica è considerare una form che richiede alcuni dati di un utente e produrre un 
applicativo web che: 

* Parta da una form che richiede alcune informazioni all'utente
* Verifichi l'input inserito dall'utente. 
	* Qualora le informazioni inserite siano corrette, allora restituisca la form iniziale con le informazioni inserite dall'utente. 
	* Qualora le informazioni fossero scorrette o mancanti, andrebbe indicato quale campo di input è sbagliato e per quale motivo.

Per la realizzazione di questa funzionalità si devono considerare tre strutture dati:
* Una variabile `status` che indichi la presenza di un errore 
* Un array `dati` che contenga i dati controllati dallo script php
* Un array `errore` che contenga il dettaglio degli errori identificati

In questo esercizio le tre strutture dati devono essere passate, attraverso il metodo GET, dallo script PHP alla pagina della form.
Vedremo nel prossimo esercizio che questo non è necessario quando si utilizzano le sessioni. 
[Soluzioni](https://github.com/SaraBonfitto/PWEB_23_24/blob/main/04_PHP/lezione/esempi_in_aula/04/datiUtente.php) 

 05- Uso delle sessioni
 -----------
 Partendo dall'[esercizio precedente]Partendo dall'[esercizio](https://github.com/SaraBonfitto/PWEB_23_24/blob/main/04_PHP/lezione/esercizi_in_aula/04/datiUtente.php),
 in questo esercizio si vuole costruire una applicazione Web che permetta di effettuare il login e
 che richieda delle informazioni aggiuntive all'utente. 
 Si vogliono quindi combinare i due esercizi precedenti facendo uso delle sessioni. 

Il vantaggio dell'utilizzo delle sessioni è che non è necessario passare l'input dell'utente
da una pagina all'altra ogni volta che serve, ma si può memorizzare nelle variabili di sessione. 
L'uso delle sessioni rende più semplice il mantenimento dello stato dell'applicazione Web, tuttavia,
non bisogna esagerare per evitare di "consumare" la memoria del server. 
Una singola connessione può richiedere poca memoria ma, la presenza di centinaia di migliaia di connessioni,
 può mettere in crisi il server.  

[Soluzioni](https://github.com/SaraBonfitto/PWEB_23_24/blob/main/04_PHP/lezione/esempi_in_aula/05/datiUtente.php) 

 06 - Semplice interazione con il database
 -----------
In questo esercizio si vuole ottenere la paginazione del risultato di una interrogazione su una tabella. 

Il codice di questo script non è ben strutturato. 
Lo scopo dello script è però quello di far vedere come la visualizzazione può dipendere da un parametro 
esterno e attraverso questo parametro si possa fare vedere un contenuto differente. 
Per eseguire questo script è necessario importare il [database](https://github.com/SaraBonfitto/PWEB_23_24/blob/main/04_PHP/lezione/esempi_in_aula/06/lez05-scriptGenitoriFigli.sql)
su un DBMS.

[Soluzione](https://github.com/SaraBonfitto/PWEB_23_24/blob/main/04_PHP/lezione/esempi_in_aula/06/paginazione.php) 

 06 - Interazione con una base di dati
 -----------
 Questi esercizio serve a prendere confidenza con l'uso di SQL nel contesto di un'applicazione PHP. 
 Nell'esercizio si parte da una strutturazione del codice e della pagina di vecchia concezione,
 come si può vedere dal [punto di partenza](https://github.com/SaraBonfitto/PWEB_23_24/blob/main/04_PHP/lezione/esempi_in_aula/07/punto_partenza) 
 
 Nella seconda parte dell'[esercizio](https://github.com/SaraBonfitto/PWEB_23_24/blob/main/04_PHP/lezione/esempi_in_aula/07/soluzioni) 
 si presentano le stesse funzionalità organizzate e realizzate in modo più professionale utilizzando:
 1- Bootstrap per la visualizzazione; 
 2- Funzioni per la realizzazione delle operazioni; 
 3- Inclusioni di codice, per modularizzare le pagine e ridurre la quantità di codice da scrivere. 
 
 Le pagine realizzate sono più facili da leggere e da mantenere e viene introdotta la visualizzazione
 di messaggi di feedback da inviare all'utente relativamente alle operazioni eseguite.  
Per eseguire questo script è necessario importare il [database](https://github.com/SaraBonfitto/PWEB_23_24/blob/main/04_PHP/lezione/esempi_in_aula/07/agenzia_viaggi.sql)
su un DBMS.

 Alcune funzionalità sono ancora da implementare,
 si possono realizzare sfruttando le pagine che sono state già sviluppate. 

[Soluzione](https://github.com/SaraBonfitto/PWEB_23_24/blob/main/04_PHP/lezione/esempi_in_aula/07) 
