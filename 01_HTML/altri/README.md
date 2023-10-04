 Esercizi HTML
 =======
 
 01- [Fatturazione elettronica](https://github.com/SaraBonfitto/PWEB_23_24/blob/main/01_HTML/lezione/altri/01.html)
 -----------
Creare una form per l'inserimento di una fattura elettronica.
La form è così composta:
	1. Campo partita iva: deve supportare l'inserimento di min 9 max 11 numeri
	2. Codice univoco: è un campo composto da due lettere - due numeri - due numeri
	   esempio: `XX-12-22`
	   Usare l'attributo "pattern", cercare su Google come funziona. 
	   Servirà usare le regular expression (regEx)
	3. Codice fiscale: devono essere inseriti esattamente 16 caratteri alfanumerici. 
	   Usando l'attributo pattern si può anche definire una regEx per verificare che
	   i primi 6 valori siano cifre, il 7° e l'8° numeri e così via
	4. Un indirizzo email: 
			4.1 Usare il tipo di dato ritenuto più adeguato all'input 
			4.2 Modificare il codice per far si che, oltre a controllare che sia presente 
			il simbolo della chiocciola (che solitamente viene effettuato dal browser in 
			automatico quando viene usato l'appositodata type), 
			verificare che la stringa contenga un dominio (e.g. .it, .com, .net ecc)
	5.  Una data e una data di scadenza
	6.  Un pulsante invio e un pulsante cancellazione

Tutti i campi tranne la data di scadenza sono obbligatori


02- [Scacchiera](https://github.com/SaraBonfitto/PWEB_23_24/blob/main/01_HTML/lezione/altri/02.html)
-----------
Creare una scacchiera 8x8 che abbia i cartatteristici quadrati bianchi e 
neri alternati.
Per il momento (fino a quando non si farà la lezione su CSS) è necessario 
colorare gli sfondi usando gli attributi di HTML.
Valutare quale tipo di contenitore usare.
Non occorre mettere le pedine
