Esercizi in aula
 =======

 
01- Creare la struttura di una pagina con Bootstrap
 -----------
	1. Creare un file index.html e inserire il doctype, il tag html, head, title e body
	2. Creare un file style.css
	3. Aprire la documentazione bootstrap al link [Bootstrap5](https://getbootstrap.com/docs/5.3/getting-started/introduction/)
	4. Seguire la guida «Quick start» per includere bootstrap nel proprio progetto
	5. Creare un div «container» usando gli stili di Bootstrap. Nota: le griglie devono sempre essere inserite in un container
	6. Creare una regola di stile nel file style.css usando il selettore div. Questa regola deve definire il colore di bordo del div (a piacere)
	7. Importare style.css in modo che venga rispettata la proprietà cascading e che venga sovrascritto lo stile originale
	8. Usare row e col in modo da ottenere una struttura come in questa 
	 ![immagine](https://github.com/SaraBonfitto/PWEB_23_24/blob/main/03_bootstrap/lezione/esercizi_in_aula/01/Immagine1.png)
	9. Individuare il numero di colonne e righe ritenuto più indicato per ogni componente
	10. Associare uno stile bootstrap ad ogni componente

 [Soluzione](https://github.com/SaraBonfitto/PWEB_23_24/blob/main/03_bootstrap/lezione/esercizi_in_aula/01/index.html)
 
02- Layout responsive
-----------
	1. Copiare il codice precedente e modificarlo per aggiungere un layout per dispositivi mobili, simile a ![questo](https://github.com/SaraBonfitto/PWEB_23_24/blob/main/03_bootstrap/lezione/esercizi_in_aula/02/Immagine2.png)
	2. Quando viene ridimensionata la finestra del browser, la visualizzazione deve essere modificata

 [Soluzione](https://github.com/SaraBonfitto/PWEB_23_24/blob/main/03_bootstrap/lezione/esercizi_in_aula/02/index.html)

03- Landing page
-----------
Realizzare una landing page come quella in ![figura](https://github.com/SaraBonfitto/PWEB_23_24/blob/main/03_bootstrap/lezione/esercizi_in_aula/03/esempio.png)
Per la realizzazione si possono usare queste [immagini](https://github.com/SaraBonfitto/PWEB_23_24/blob/main/03_bootstrap/lezione/esercizi_in_aula/03/images)

Step-by-step
	1. Recuperare l’esercizio 1 della lezione precedente (se è stato fatto) o scaricarlo da GitHub 
	2. Usare un editor per il codice come Visual Studio Code e aprire la cartella del progetto
	3. Usiamo l’immagine [logo.jpg](https://github.com/SaraBonfitto/PWEB_23_24/blob/main/03_bootstrap/lezione/esercizi_in_aula/03/images/logo.png)
       o un'immagine qualsiasi di dimensione 80x80px
	4. Creiamo una nuova riga per l’header
	5. Nella colonna di sinistra inseriamo la foto
	6. A destra il titolo dell’applicazione
	7. Se serve aggiungiamo padding o margin, e.g. pt-1  aggiunge padding top di 0.25 rem
	8. Cerchiamo sulla documentazione bootstrap i bottoni ritenuti più adeguati per login e registrazione e aggiungiamoli
	9. Creiamo una nuova riga con due colonne, la prima contenente il testo e la seconda l’![immagine](https://github.com/SaraBonfitto/PWEB_23_24/blob/main/03_bootstrap/lezione/esercizi_in_aula/03/images/sfondo.jpg)
	10. Dimensioniamo le colonne nel modo ritenuto più corretto
	11. Aggiungiamo un'ultima riga per il footer
	12. Cerchiamo sulla documentazione di bootstrap il footer ritenuto più consono alle nostre esigenze
	13. Inseriamo il codice nella nostra pagina e personalizziamo i collegamenti
	
  Nota: l'immagine potrebbe non essere responsive se non vengono usati i tag di bootstrap (vedi esercizio seguente)

 [Soluzione](https://github.com/SaraBonfitto/PWEB_23_24/blob/main/03_bootstrap/lezione/esercizi_in_aula/03/index.html)


04- Landing page con componenti bootstrap
-----------

Realizziamo ora una landing page usando solo i componenti proposti da bootstrap a partire da [questo codice](https://github.com/SaraBonfitto/PWEB_23_24/blob/main/03_bootstrap/lezione/esercizi_in_aula/04/base_partenza.html)
In questo caso l'immagine è responsive.
Il logo e il sottotitolo vanno aggiunti manualmente alla navbar. 
Per far sì che il testo vada a capo è necessario cambiare il modo in cui il link si dispone sulla pagina con				

a class="navbar-brand d-flex"
			
[Soluzione](https://github.com/SaraBonfitto/PWEB_23_24/blob/main/03_bootstrap/lezione/esercizi_in_aula/04/index.html)
