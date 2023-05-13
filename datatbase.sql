/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=1 */;

SET NAMES latin1;
SET FOREIGN_KEY_CHECKS = 0;
BEGIN;

CREATE DATABASE IF NOT EXISTS LiftLog;
COMMIT;
USE LiftLog;

DROP TABLE IF EXISTS Utente;
CREATE TABLE IF NOT EXISTS Utente(
id INT NOT NULL AUTO_INCREMENT,
username VARCHAR(50) NOT NULL,
`password` CHAR(128) NOT NULL,
nome VARCHAR(50) NOT NULL,
cognome VARCHAR(50) NOT NULL,
dipendente BOOLEAN NOT NULL,
ruolo VARCHAR(50),
immagine VARCHAR(100),
PRIMARY KEY(id),
UNIQUE KEY username_UNIQUE (username)
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
utente INT NOT NULL,
data_assegnamento VARCHAR(100),
PRIMARY KEY(id),
CONSTRAINT FK_scheda_utente FOREIGN KEY(utente)
	REFERENCES Utente(id)
	ON DELETE CASCADE
)ENGINE=InnoDB;

DROP TABLE IF EXISTS Svolgimento;
CREATE TABLE IF NOT EXISTS Svolgimento(
id INT NOT NULL AUTO_INCREMENT,
esercizio INT NOT NULL,
scheda INT NOT NULL,
serie INT NOT NULL,
ripetizioni INT NOT NULL,
recupero INT NOT NULL,
PRIMARY KEY(id),
CONSTRAINT FK_svolgimento_scheda FOREIGN KEY(scheda)
	REFERENCES Scheda(id)
	ON DELETE CASCADE,
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
VALUES (NULL, "Sollevamenti posteriori ai cavi", "esercizi/dorso/sollevamenti_posteriori_ai_cavi.png", "Dorso", "Consiste nel allungare delle cavi mediante l&rsquo;uso della braccia, serve per allenare la parte alta del dorso.", ""),
(NULL, "Rematore gomiti larghi", "esercizi/dorso/rematore_gomiti_larghi.png", "Dorso", "Consiste nel sollevare e abbassare il bilanciere con una posizione leggermente inclinata verso l&rsquo;avanti.", ""),
(NULL, "Row su panca inclinata con bilanciere", "esercizi/dorso/row_su_panca_inclinata_con_bilanciere_su_panca_inclinata.png", "Dorso", "L&rsquo;esecizio consiste nel sollevare un bilanciere trovandosi nella posizione a pancia in gi&ugrave; sulla panca inclinata.", ""),
(NULL, "Trazioni alla sbarra presa larga", "esercizi/dorso/trazioni_alla_sbarra_presa_larga.png", "Dorso", "Consiste nel sollevare e abbassare il proprio corpo con tenendosi attaccati a una sbarra.", ""),
(NULL, "Hammer pull up su macchina di assistenza", "esercizi/dorso/hammer_pull_up_su_macchina_di_assistenza.png", "Dorso", "L&rsquo;esercizio consiste nello svolgere l&rsquo;esercizio sopra una macchina di assistenza apposita.", ""),
(NULL, "Over row presa rovesciata", "esercizi/dorso/over_row_presa_rovesciata.png", "Dorso", "consiste nel fare la stessa cosa dell&rsquo;esercizio numero 3 ma con la presa del bilanciere contraria.", ""),
(NULL, "Crunch", "esercizi/addominali/crunch.png", "Addominali", "Alzare e abbassare la parte superiore del corpo, distesi e con le ginocchia piegate in avanti e le braccia che toccano la testa.", ""),
(NULL, "Spinta delle gambe su panca", "esercizi/addominali/spinta_delle_gambe_su_panca.png", "Addominali", "Alzare le gambe una volta distesi sopra la panca son solo la schiena appoggiata a terra e le gambe rivolte verso l&rsquo;alto.", ""),
(NULL, "Abdominal crunch", "esercizi/addominali/abdominal_crunch.png", "Addominali", "L&rsquo;abdominal crunch &egrave; un macchinario che si pu&ograve; utilizzare in palestra e aiuta appunto negli esercizi di rinforzo degli addominali.", ""),
(NULL, "Alzate laterali", "esercizi/addominali/alzate_laterali.png", "Addominali", "Si alza e si abbassa il corpo senza mai toccare la terra, si svolge con le braccia attaccate a delle sbarre per allenare gli addominali.", ""),
(NULL, "Crunch su panca", "esercizi/addominali/crunch_su_panca.png", "Addominali", "Simile al primo esercizio con la sola differenza che la posizione da noi tenuta non prevede le ginocchia in avanti ma bloccate dalla panca.", ""),
(NULL, "Alzate della gambe da terra", "esercizi/addominali/alzate_della_gambe_da_terra.png", "Addominali", "Simile al secondo esercizio con la sola modifica che nonsi &egrave; sulla panca ma distesi per terra con le gambe alzate.", ""),
(NULL, "Panca piana", "esercizi/pettorali/panca_piana.png", "Pettorali", "La panca piana &egrave; uno degli esercizi fondamentali per il petto. Lo svolgimento prevede di stendersi sulla panca con la schiena inarcata, i piedi saldi sul pavimento e afferrare il bilanciere con una presa salda. Dopo la preparazione il bilanciere deve sfiorare il petto e tornare su.", ""),
(NULL, "Piegamenti", "esercizi/pettorali/piegamenti.png", "Pettorali", "I piegamenti sulle braccia sono un ottimo esercizio a corpo libero per l&rsquo;attivazione del pettorale. Bisogna stendersi per terra allargando le braccia alla larghezza delle spalle. Mantenendo la postura dritta, pieghiamo le braccia andando verso il basso, in modo da tirare il pettorale, e poi tornando verso l&rsquo;alto.", ""),
(NULL, "Croci con manubri su panca piana", "esercizi/pettorali/croci_con_manubri_su_panca_piana.png", "Pettorali", "Esistono croci di diverso tipo. Le croci con manubri sono molto tecniche. Con l&rsquo;utilizzo di 2 manubri, ci si stende su una panca piana e alzando le braccia parallelamente al petto si aprono in modo lento e controllato finch&egrave; il petto non inizia a tirare.", ""),
(NULL, "Chest press", "esercizi/pettorali/chest_press.png", "Pettorali", "La chest press prevede l&rsquo;utilizzo di una macchina isotonica che possiede gi&agrave; la traiettoria predefinita del movimento. Basta sedersi sulla macchina, impugnare le maniglie, contrarre le scapole mandando il petto in fuori e spingere in avanti per strizzare il petto e tornare indietro finche non si sente tirare il petto.", ""),
(NULL, "Croci ai cavi", "esercizi/pettorali/croci_ai_cavi.png", "Pettorali", "Le croci ai cavi allenano diverse fasce del petto. Prendendo i 2 cavi ci si mette con i piedi uno davanti all&rsquo;altro e larghi quanto le spalle, schiena dritta, petto in fuori e si tirano i cavi davanti al petto con le braccia tese facendo toccare le mani e mantenendo la posizione per pochi secondi. Regolando l&rsquo;altezza delle mani andremo a stimolare le 3 fasce del petto ovvero alta, centrale e bassa.", ""),
(NULL, "Panca piana al multipower", "esercizi/pettorali/panca_piana_al_multipower.png", "Pettorali", "La panca piana al multipower &egrave; una semplice panca piana ma con l&rsquo;aiuto del multipower ci permette di fare un movimento pi&ugrave; lento e controllato in modo da imparare bene l&rsquo;esercizio prima di farlo sulla panca libera. E&rsquo; un p&ograve; pi&ugrave; sicura infatti in caso di emergenza si pu&ograve; subito appoggiare agli agganci.", ""),
(NULL, "Curl con manubri", "esercizi/bicipiti/curl_con_manubri.png", "Bicipiti", "Il curl con manubri &egrave; l&rsquo;esercizio standard per i bicipiti e si pi&ograve; eseguire in molte varianti. Questa variante si esegue in piedi con un manubrio per mano. Mettendoci dritti e con le gambe leggermente aperte portiamo i manubri al petto flettendo il braccio e attivando il bicipite.", ""),
(NULL, "Curl alla panca scott", "esercizi/bicipiti/curl_alla_panca_scott.png", "Bicipiti", "Il curl alla panca scott si pu&ograve; eseguire sia con i manubri che con un bilanciere. Ci si siede sulla panca mettendo le braccia sulla parte piatta, si afferrano, in questo caso i manubri, e si esegue un curl lento ma controllato senza esagerare nella parte di ritorno per evitare infortuni.", ""),
(NULL, "Curl seduto", "esercizi/bicipiti/curl_seduto.png", "Bicipiti", "Il curl seduto &egrave; molto semplice come esercizio. Basta prendere un solo manubrio, sedersi su una panca, appoggiare la zona del braccio tra il tricipite e il gomito nella parte interna della gamba e muove il manubrio verso di se come un curl normale. Da eseguire con un braccio alla volta.", ""),
(NULL, "Curl ai cavi", "esercizi/bicipiti/curl_ai_cavi.png", "Bicipiti", "Il curl ai cavi &egrave; il pi&ugrave; tecnico tra i curl. Prendendo i 2 cavi si mettono le braccia a 90&deg; circa all&rsquo;altezza delle orecchie e parallele alle spalle si tirano i cavi verso la testa mantenendo la posizione delle braccia alla stessa altezza.", ""),
(NULL, "Curl alle corde", "esercizi/bicipiti/curl_alle_corde.png", "Bicipiti", "Il curl alle corde (detto anche a martello) si esegue con una tirata dal basso verso l&rsquo;alto delle corde in modo lento e controllato con una postura leggermente spostata in avanti, gambe larghe quanto le spalle e petto in fuori.&nbsp;", ""),
(NULL, "Curl con bilanciere", "esercizi/bicipiti/curl_con_bilanciere.png", "Bicipiti", "Il curl con bilanciere &egrave; un semplice curl, come quello con manubri, con l&rsquo;unica differenza che si usa un bilanciere quindi &egrave; pi&ugrave; pesante e non pu&ograve; essere svolto con un singolo braccio ma va svolto con entrambi. Mantenendo una postura eretta, si porta il bilanciere verso il petto.", ""),
(NULL, "Squat", "esercizi/gambe/squat.png", "Gambe", "Lo squat &egrave; l&rsquo;esercizio per eccellenza delle gambe stimolando glutei, femorali e quadricipiti. Ci si sistema il bilanciere sulle spalle cercando l&rsquo;incastro giusto tra le spalle e le scapole. Una volta trovato l&rsquo;incastro si allargano le gambe alla larghezza delle spalle e si scende in modo verticale.", ""),
(NULL, "Pressa a 45&deg;", "esercizi/gambe/pressa_a_45.png", "Gambe", "La pressa a 45&deg; &egrave; una macchina a carico diretto che ci permette di sviluppare molto i quadricipiti e i femorali in quanto la spinta &egrave; inclinata in alto. Basta sedersi sulla macchina, mettere i piedi sulla pressa e allargarli. Una volta preparati si da una spinta per sganciare la macchina spostando le maniglie di sicurezza e poi si pu&ograve; effettuare l&rsquo;esercizio.", ""),
(NULL, "Adduttori", "esercizi/gambe/adduttori.png", "Gambe", "I muscoli adduttori sono i muscoli presenti nella parte interna della gamba e per poterli allenare possiamo usare una macchina. Ci si siede sull&rsquo;apposito sedile allargando le gambe,mettendole sui pedali e mantenendo la schiena dritta, chiudiamo le gambe in modo da mettere in funzione gli adduttori.", ""),
(NULL, "Leg extension", "esercizi/gambe/leg_extension.png", "Gambe", "Questa macchina ci permette di isolare i quadricipiti in modo da allenare maggiormente solo quella parte di gamba. Sedendoci sulla macchina e mantenendo la postura dritta, si mettono i piedi sotto l&rsquo;apposito cuscino e si alzano verso l&rsquo;alto portando cos&igrave; le gambe in una posizione orizzontale.&nbsp;.", ""),
(NULL, "Abduttori", "esercizi/gambe/abduttori.png", "Gambe", "Gli abduttori solo la parte esterna della gamba. L&rsquo;esercizio &egrave; molto simile a quello degli adduttori con l&rsquo;unica differenza che invece di chiudere le gambe qui si portano le gambe verso l&rsquo;esterno in modo da mettere il funzione i muscoli abduttori. Per isolare ancora di pi&ugrave; i muscoli si possono fare in posizione di squat.", ""),
(NULL, "Leg curl", "esercizi/gambe/leg_curl.png", "Gambe", "Il leg curl permette di allenare i femorali con l&rsquo;utilizzo di una macchina. Ci si sdraia a pancia in gi&ugrave; sulla panca mettendo i piedi sull&rsquo;apposito cuscino. Una volta in posizione si flettono le gambe verso i glutei contraendo in questo modo i femorali e attivando glutei e un p&ograve; i polpacci.", ""),
(NULL, "Push down con barra a v", "esercizi/tricipiti/push_down_con_barra_a_v.png", "Tricipiti", "Il push down con barra a v consiste nel spostare un peso regolabile mediante l&rsquo;uso delle braccia che, attaccate ad un manubrio a forma di v, solleveranno e alzeranno i pesi.", ""),
(NULL, "Estensioni inclinate con bilanciere", "esercizi/tricipiti/estensioni_inclinate_con_bilanciere.png", "Tricipiti", "Consiste nel sollevare e abbassare il bacino, non permettendogli mai di toccare il terreno, per svolgere questo esercizio c&rsquo;&egrave; bisogno di una zona con conca come quella raffigurata in foto.", ""),
(NULL, "Estensioni tricipite con un braccio singolo manubrio", "esercizi/tricipiti/estensioni_tricipite_con_un_braccio_singolo_manubrio.png", "Tricipiti", "Consiste nel estendere i muscoli dei tricipiti utilizzando un singolo manubrio con dei pesi attaccati e posizionarlo dietro la schiena, bisogna poi tenerlo per un periodo di tempo basato sulla propria esperienza.", ""),
(NULL, "Estensione tricipite al cavo", "esercizi/tricipiti/estensione_tricipite_al_cavo.png", "Tricipiti", "Esercizio misto del 1&deg;&nbsp; e del&nbsp; 3&deg; esercizio, consiste nell&rsquo;estendere il tricipite utilizzando un cavo, anch&rsquo;esso collegato a dei pesi, il peso varia ovviamente in base all&rsquo;esperienza di chi fa l&rsquo;esercizio.", ""),
(NULL, "Estensione tricipite manubrio", "esercizi/tricipiti/estensione_tricipite_manubrio.png", "Tricipiti", "Esercizio simile al 3&deg; esercizio con la sola modifica che al posto si un manubrio singolo di piccole dimensioni, si va ad utilizzare un manubrio di grande dimensioni, anche la durata di questo esercizio varia in base all&rsquo;esperienza.", ""),
(NULL, "Estensione manubrio in piedi", "esercizi/tricipiti/estensione_manubrio_in_piedi.png", "Tricipiti", "Altro esercizio molto simile al 3&deg;, consiste nell&rsquo;estendere il tricipite utilizzando sempre un manubrio ma questa volta la posizione non sar&agrave; seduta, ma come dice il nome in piedi, la durata &egrave; sempre variabile.", ""),
(NULL, "Alzate frontali con manubri alternate", "esercizi/spalle/alzate_frontali_con_manubri_alternate.png", "Spalle", "Consiste nel alzare frontalmente i manubri, prima quello di destra e logicamente poi quello di sinistra.", ""),
(NULL, "Alzate con manubri su panca", "esercizi/spalle/alzate_con_manubri_su_panca.png", "Spalle", "Consiste nello sollevare e abbassare i manubri sedendosi sulla panca e mantenendo la schiena dritta.", ""),
(NULL, "Alzate di spalle con bilanciere", "esercizi/spalle/alzate_di_spalle_con_bilanciere.png", "Spalle", "Si afferra il bilanciere da in piedi mantenendo la schiena dritta e le gambe leggermente allargate.", ""),
(NULL, "Alzate laterali", "esercizi/spalle/alzate_laterali.png", "Spalle", "Consiste nel alzare lateralmente i manubri fino all&rsquo;altezza delle spalle in modo continuo.", ""),
(NULL, "Alzate al mento con bilanciere", "esercizi/spalle/alzate_al_mento_con_bilanciere.png", "Spalle", "Consiste nello sollevare e abbassare il bilanciere verso il mento mantenendo una postura dritta e rigida.", ""),
(NULL, "Shoulder press", "esercizi/spalle/shoulder_press.png", "Spalle", "E&rsquo; una macchina la quale ci si siede afferrando le maniglie, buttando il petto in fuori si spinge verso l&rsquo;alto.", "");

INSERT INTO Utente
VALUES (NULL, "admin", SHA2("admin",512),"Luciano", "Bonecchi", TRUE, "Proprietario", "dipendenti/luciano.jpg"),
(NULL, "achille", SHA2("achille",512), "Achille", "Fontana", TRUE, "Personal Trainer", "dipendenti/achille.png"),
(NULL, "arnold", SHA2("arnold",512), "Arnold", "Schwartzenegger", TRUE, "Body Building", "dipendenti/arnold.jpg"),
(NULL, "diego", SHA2("diego",512), "Diego", "Girolami", TRUE, "Postural Trainer", "dipendenti/diego.jpg"),
(NULL, "pietro", SHA2("pietro",512), "Pietro", "Arnoldi", TRUE, "Professional Coach", "dipendenti/pietro.png"),
(NULL, "ivan", SHA2("ivan",512), "Ivan", "Drago", TRUE, "Istruttore Box", "dipendenti/ivan.jpg");