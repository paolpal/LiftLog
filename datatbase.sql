SET NAMES latin1;
SET FOREIGN_KEY_CHECKS = 0;
BEGIN;

CREATE DATABASE IF NOT EXISTS LiftLog;
COMMIT;
USE LiftLog;

DROP TABLE IF EXISTS Utente;
CREATE TABLE IF NOT EXISTS Utente(
username VARCHAR(50) NOT NULL,
pass CHAR(128) NOT NULL,
nome VARCHAR(50) NOT NULL,
cognome VARCHAR(50) NOT NULL,
dipendente BOOLEAN NOT NULL,
ruolo VARCHAR(50),
immagine VARCHAR(100),
PRIMARY KEY(username)
)ENGINE=InnoDB;

DROP TABLE IF EXISTS Esercizio;
CREATE TABLE IF NOT EXISTS Esercizio(
id INT NOT NULL AUTO_INCREMENT,
nome VARCHAR(150) NOT NULL,
immagine VARCHAR(100),
parte_del_corpo VARCHAR(50) NOT NULL,
descrizione VARCHAR(500) NOT NULL,
muscoli VARCHAR(200) NOT NULL,
PRIMARY KEY(id)
)ENGINE=InnoDB;

DROP TABLE IF EXISTS Scheda;
CREATE TABLE IF NOT EXISTS Scheda(
id INT NOT NULL AUTO_INCREMENT,
proprietario VARCHAR(50) NOT NULL,
data_assegnamento VARCHAR(100),
parte_del_corpo VARCHAR(50) NOT NULL,
PRIMARY KEY(id),
CONSTRAINT FK_scheda_utente FOREIGN KEY(proprietario)
	REFERENCES Utente(username)
)ENGINE=InnoDB;

DROP TABLE IF EXISTS Svolgimento;
CREATE TABLE IF NOT EXISTS Svolgimento(
esercizio INT NOT NULL,
scheda INT NOT NULL,
ripetizioni INT NOT NULL,
recupero INT NOT NULL,
PRIMARY KEY(esercizio, scheda),
CONSTRAINT FK_svolgimento_scheda FOREIGN KEY(scheda)
	REFERENCES Scheda(id),
CONSTRAINT FK_svolgimento_esercizio FOREIGN KEY(esercizio)
	REFERENCES Esercizio(id)
)ENGINE=InnoDB;

DROP TABLE IF EXISTS Turno;
CREATE TABLE IF NOT EXISTS Turno(
id INT NOT NULL AUTO_INCREMENT,
giorno INT NOT NULL, /*DAYOFWEEK: 1 - sunday, 2 - monday ...*/
ora VARCHAR(10) NOT NULL,
PRIMARY KEY(id)
)ENGINE=InnoDB;

DROP TABLE IF EXISTS Orario;
CREATE TABLE IF NOT EXISTS Orario(
dipendente VARCHAR(50) NOT NULL,
turno INT NOT NULL,
PRIMARY KEY(dipendente, turno),
CONSTRAINT FK_orario_utente FOREIGN KEY(dipendente)
	REFERENCES Utente(username),
CONSTRAINT FK_orario_turno FOREIGN KEY(turno)
	REFERENCES Turno(id)
)ENGINE=InnoDB;

INSERT INTO Esercizio
VALUES (NULL, "Sollevamenti posteriori ai cavi", "esercizi/dorso/sollevamenti_posteriori_ai_cavi.png", "dorso", "Consiste nel allungare delle cavi mediante l’uso della braccia, serve per allenare la parte alta del dorso", ""),
(NULL, "Rematore gomiti larghi", "esercizi/dorso/rematore_gomiti_larghi.png", "dorso", "Consiste nel sollevare e abbassare il bilanciere con una posizione leggermente inclinata verso l’avanti", ""),
(NULL, "Row su panca inclinata con bilanciere su panca inclinata", "esercizi/dorso/row_su_panca_inclinata_con_bilanciere_su_panca_inclinata.png", "dorso", "L’esecizio consiste nel sollevare un bilanciere trovandosi nella posizione a pancia in giù sulla panca inclinata", ""),
(NULL, "Trazioni alla sbarra presa larga", "esercizi/dorso/trazioni_alla_sbarra_presa_larga.png", "dorso", "Consiste nel sollevare e abbassare il proprio corpo con tenendosi attaccati a una sbarra", ""),
(NULL, "Hammer pull up su macchina di assistenza", "esercizi/dorso/hammer_pull_up_su_macchina_di_assistenza.png", "dorso", "L’esercizio consiste nello svolgere l’esercizio sopra una macchina di assistenza apposita", ""),
(NULL, "Over row presa rovesciata", "esercizi/dorso/over_row_presa_rovesciata.png", "dorso", "consiste nel fare la stessa cosa dell’esercizio numero 3 ma con la presa del bilanciere contraria", ""),
(NULL, "Crunch", "esercizi/addominali/crunch.png", "addominali", "Alzare e abbassare la parte superiore del corpo, distesi e con le ginocchia piegate in avanti e le braccia che toccano la testa", ""),
(NULL, "Spinta delle gambe su panca", "esercizi/addominali/spinta_delle_gambe_su_panca.png", "addominali", "Alzare le gambe una volta distesi sopra la panca son solo la schiena appoggiata a terra e le gambe rivolte verso l’alto", ""),
(NULL, "Abdominal crunch", "esercizi/addominali/abdominal_crunch.png", "addominali", "L’abdominal crunch è un macchinario che si può utilizzare in palestra e aiuta appunto negli esercizi di rinforzo degli addominali", ""),
(NULL, "Alzate laterali", "esercizi/addominali/alzate_laterali.png", "addominali", "Si alza e si abbassa il corpo senza mai toccare la terra, si svolge con le braccia attaccate a delle sbarre per allenare gli addominali", ""),
(NULL, "Crunch su panca", "esercizi/addominali/crunch_su_panca.png", "addominali", "Simile al primo esercizio con la sola differenza che la posizione da noi tenuta non prevede le ginocchia in avanti ma bloccate dalla panca", ""),
(NULL, "Alzate della gambe da terra", "esercizi/addominali/alzate_della_gambe_da_terra.png", "addominali", "Simile al secondo esercizio con la sola modifica che nonsi è sulla panca ma distesi per terra con le gambe alzate", ""),
(NULL, "Panca piana", "esercizi/pettorali/panca_piana.png", "pettorali", "La panca piana è uno degli esercizi fondamentali per il petto. Lo svolgimento prevede di stendersi sulla panca con la schiena inarcata, i piedi saldi sul pavimento e afferrare il bilanciere con una presa salda. Dopo la preparazione il bilanciere deve sfiorare il petto e tornare su.", ""),
(NULL, "Piegamenti", "esercizi/pettorali/piegamenti.png", "pettorali", "I piegamenti sulle braccia sono un ottimo esercizio a corpo libero per l’attivazione del pettorale. Bisogna stendersi per terra allargando le braccia alla larghezza delle spalle. Mantenendo la postura dritta, pieghiamo le braccia andando verso il basso, in modo da tirare il pettorale, e poi tornando verso l’alto.", ""),
(NULL, "Croci con manubri su panca piana", "esercizi/pettorali/croci_con_manubri_su_panca_piana.png", "pettorali", "Esistono croci di diverso tipo. Le croci con manubri sono molto tecniche. Con l’utilizzo di 2 manubri, ci si stende su una panca piana e alzando le braccia parallelamente al petto si aprono in modo lento e controllato finchè il petto non inizia a tirare.", ""),
(NULL, "Chest press", "esercizi/pettorali/chest_press.png", "pettorali", "La chest press prevede l’utilizzo di una macchina isotonica che possiede già la traiettoria predefinita del movimento. Basta sedersi sulla macchina, impugnare le maniglie, contrarre le scapole mandando il petto in fuori e spingere in avanti per strizzare il petto e tornare indietro finche non si sente tirare il petto.", ""),
(NULL, "Croci ai cavi", "esercizi/pettorali/croci_ai_cavi.png", "pettorali", "Le croci ai cavi allenano diverse fasce del petto. Prendendo i 2 cavi ci si mette con i piedi uno davanti all’altro e larghi quanto le spalle, schiena dritta, petto in fuori e si tirano i cavi davanti al petto con le braccia tese facendo toccare le mani e mantenendo la posizione per pochi secondi. Regolando l’altezza delle mani andremo a stimolare le 3 fasce del petto ovvero alta, centrale e bassa.", ""),
(NULL, "Panca piana al multipower", "esercizi/pettorali/panca_piana_al_multipower.png", "pettorali", "La panca piana al multipower è una semplice panca piana ma con l’aiuto del multipower ci permette di fare un movimento più lento e controllato in modo da imparare bene l’esercizio prima di farlo sulla panca libera. E’ un pò più sicura infatti in caso di emergenza si può subito appoggiare agli agganci.", ""),
(NULL, "Curl con manubri", "esercizi/bicipiti/curl_con_manubri.png", "bicipiti", "Il curl con manubri è l’esercizio standard per i bicipiti e si piò eseguire in molte varianti. Questa variante si esegue in piedi con un manubrio per mano. Mettendoci dritti e con le gambe leggermente aperte portiamo i manubri al petto flettendo il braccio e attivando il bicipite.", ""),
(NULL, "Curl alla panca scott", "esercizi/bicipiti/curl_alla_panca_scott.png", "bicipiti", "Il curl alla panca scott si può eseguire sia con i manubri che con un bilanciere. Ci si siede sulla panca mettendo le braccia sulla parte piatta, si afferrano, in questo caso i manubri, e si esegue un curl lento ma controllato senza esagerare nella parte di ritorno per evitare infortuni.", ""),
(NULL, "Curl seduto", "esercizi/bicipiti/curl_seduto.png", "bicipiti", "Il curl seduto è molto semplice come esercizio. Basta prendere un solo manubrio, sedersi su una panca, appoggiare la zona del braccio tra il tricipite e il gomito nella parte interna della gamba e muove il manubrio verso di se come un curl normale. Da eseguire con un braccio alla volta.", ""),
(NULL, "Curl ai cavi", "esercizi/bicipiti/curl_ai_cavi.png", "bicipiti", "Il curl ai cavi è il più tecnico tra i curl. Prendendo i 2 cavi si mettono le braccia a 90° circa all’altezza delle orecchie e parallele alle spalle si tirano i cavi verso la testa mantenendo la posizione delle braccia alla stessa altezza.", ""),
(NULL, "Curl alle corde", "esercizi/bicipiti/curl_alle_corde.png", "bicipiti", "Il curl alle corde (detto anche a martello) si esegue con una tirata dal basso verso l’alto delle corde in modo lento e controllato con una postura leggermente spostata in avanti, gambe larghe quanto le spalle e petto in fuori. ", ""),
(NULL, "Curl con bilanciere", "esercizi/bicipiti/curl_con_bilanciere.png", "bicipiti", "Il curl con bilanciere è un semplice curl, come quello con manubri, con l’unica differenza che si usa un bilanciere quindi è più pesante e non può essere svolto con un singolo braccio ma va svolto con entrambi. Mantenendo una postura eretta, si porta il bilanciere verso il petto.", ""),
(NULL, "Squat", "esercizi/gambe/squat.png", "gambe", "Lo squat è l’esercizio per eccellenza delle gambe stimolando glutei, femorali e quadricipiti. Ci si sistema il bilanciere sulle spalle cercando l’incastro giusto tra le spalle e le scapole. Una volta trovato l’incastro si allargano le gambe alla larghezza delle spalle e si scende in modo verticale.", ""),
(NULL, "Pressa a 45°", "esercizi/gambe/pressa_a_45°.png", "gambe", "La pressa a 45° è una macchina a carico diretto che ci permette di sviluppare molto i quadricipiti e i femorali in quanto la spinta è inclinata in alto. Basta sedersi sulla macchina, mettere i piedi sulla pressa e allargarli. Una volta preparati si da una spinta per sganciare la macchina spostando le maniglie di sicurezza e poi si può effettuare l’esercizio.", ""),
(NULL, "Adduttori", "esercizi/gambe/adduttori.png", "gambe", "I muscoli adduttori sono i muscoli presenti nella parte interna della gamba e per poterli allenare possiamo usare una macchina. Ci si siede sull’apposito sedile allargando le gambe,mettendole sui pedali e mantenendo la schiena dritta, chiudiamo le gambe in modo da mettere in funzione gli adduttori.", ""),
(NULL, "Leg extension", "esercizi/gambe/leg_extension.png", "gambe", "Questa macchina ci permette di isolare i quadricipiti in modo da allenare maggiormente solo quella parte di gamba. Sedendoci sulla macchina e mantenendo la postura dritta, si mettono i piedi sotto l’apposito cuscino e si alzano verso l’alto portando così le gambe in una posizione orizzontale. ", ""),
(NULL, "Abduttori", "esercizi/gambe/abduttori.png", "gambe", "Gli abduttori solo la parte esterna della gamba. L’esercizio è molto simile a quello degli adduttori con l’unica differenza che invece di chiudere le gambe qui si portano le gambe verso l’esterno in modo da mettere il funzione i muscoli abduttori. Per isolare ancora di più i muscoli si possono fare in posizione di squat.", ""),
(NULL, "Leg curl", "esercizi/gambe/leg_curl.png", "gambe", "Il leg curl permette di allenare i femorali con l’utilizzo di una macchina. Ci si sdraia a pancia in giù sulla panca mettendo i piedi sull’apposito cuscino. Una volta in posizione si flettono le gambe verso i glutei contraendo in questo modo i femorali e attivando glutei e un pò i polpacci.", ""),
(NULL, "Push down con barra a v", "esercizi/tricipiti/push_down_con_barra_a_v.png", "tricipiti", "Il push down con barra a v consiste nel spostare un peso regolabile mediante l’uso delle braccia che, attaccate ad un manubrio a forma di v, solleveranno e alzeranno i pesi", ""),
(NULL, "Estensioni inclinate con bilanciere", "esercizi/tricipiti/estensioni_inclinate_con_bilanciere.png", "tricipiti", "Consiste nel sollevare e abbassare il bacino, non permettendogli mai di toccare il terreno, per svolgere questo esercizio c’è bisogno di una zona con conca come quella raffigurata in foto", ""),
(NULL, "Estensioni tricipite con un braccio singolo manubrio", "esercizi/tricipiti/estensioni_tricipite_con_un_braccio_singolo_manubrio.png", "tricipiti", "Consiste nel estendere i muscoli dei tricipiti utilizzando un singolo manubrio con dei pesi attaccati e posizionarlo dietro la schiena, bisogna poi tenerlo per un periodo di tempo basato sulla propria esperienza.", ""),
(NULL, "Estensione tricipite al cavo", "esercizi/tricipiti/estensione_tricipite_al_cavo.png", "tricipiti", "Esercizio misto del 1° e del 3° esercizio, consiste nell’estendere il tricipite utilizzando un cavo, anch’esso collegato a dei pesi, il peso varia ovviamente in base all’esperienza di chi fa l’esercizio", ""),
(NULL, "Estensione tricipite manubrio", "esercizi/tricipiti/estensione_tricipite_manubrio.png", "tricipiti", "Esercizio simile al 3° esercizio con la sola modifica che al posto si un manubrio singolo di piccole dimensioni, si va ad utilizzare un manubrio di grande dimensioni, anche la durata di questo esercizio varia in base all’esperienza", ""),
(NULL, "Estensione manubrio in piedi", "esercizi/tricipiti/estensione_manubrio_in_piedi.png", "tricipiti", "Altro esercizio molto simile al 3°, consiste nell’estendere il tricipite utilizzando sempre un manubrio ma questa volta la posizione non sarà seduta, ma come dice il nome in piedi, la durata è sempre variabile", ""),
(NULL, "Alzate frontali con manubri alternate", "esercizi/spalle/alzate_frontali_con_manubri_alternate.png", "spalle", "Consiste nel alzare frontalmente i manubri, prima quello di destra e logicamente poi quello di sinistra", ""),
(NULL, "Alzate con manubri su panca", "esercizi/spalle/alzate_con_manubri_su_panca.png", "spalle", "Consiste nello sollevare e abbassare i manubri sedendosi sulla panca e mantenendo la schiena dritta", ""),
(NULL, "Alzate di spalle con bilanciere", "esercizi/spalle/alzate_di_spalle_con_bilanciere.png", "spalle", "Si afferra il bilanciere da in piedi mantenendo la schiena dritta e le gambe leggermente allargate", ""),
(NULL, "Alzate laterali", "esercizi/spalle/alzate_laterali.png", "spalle", "Consiste nel alzare lateralmente i manubri fino all’altezza delle spalle in modo continuo.", ""),
(NULL, "Alzate al mento con bilanciere", "esercizi/spalle/alzate_al_mento_con_bilanciere.png", "spalle", "Consiste nello sollevare e abbassare il bilanciere verso il mento mantenendo una postura dritta e rigida.", ""),
(NULL, "Shoulder press", "esercizi/spalle/shoulder_press.png", "spalle", "E’ una macchina la quale ci si siede afferrando le maniglie, buttando il petto in fuori si spinge verso l’alto.", "");

INSERT INTO Utente
VALUES ("admin", SHA2("admin",512),"Luciano", "Bonecchi", TRUE, "Proprietario", "dipendenti/luciano.jpg"),
("achille", SHA2("achille",512), "Achille", "Fontana", TRUE, "Personal Trainer", "dipendenti/achille.png"),
("arnold", SHA2("arnold",512), "Arnold", "Schwartzenegger", TRUE, "Body Building", "dipendenti/arnold.jpg"),
("diego", SHA2("diego",512), "Diego", "Girolami", TRUE, "Postural Trainer", "dipendenti/diego.jpg"),
("pietro", SHA2("pietro",512), "Pietro", "Arnoldi", TRUE, "Professional Coach", "dipendenti/pietro.png"),
("ivan", SHA2("ivan",512), "Ivan", "Drago", TRUE, "Istruttore Box", "dipendenti/ivan.jpg");