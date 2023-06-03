-- Progettazione Web 
DROP DATABASE if exists palumbo_585006; 
CREATE DATABASE palumbo_585006; 
USE palumbo_585006; 
-- MySQL dump 10.13  Distrib 5.6.20, for Win32 (x86)
--
-- Host: localhost    Database: palumbo_585006
-- ------------------------------------------------------
-- Server version	5.6.20

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `esercizio`
--

DROP TABLE IF EXISTS `esercizio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `esercizio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `immagine` varchar(100) DEFAULT NULL,
  `parte_del_corpo` varchar(50) NOT NULL,
  `descrizione` varchar(500) NOT NULL,
  `muscoli` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `esercizio`
--

LOCK TABLES `esercizio` WRITE;
/*!40000 ALTER TABLE `esercizio` DISABLE KEYS */;
INSERT INTO `esercizio` VALUES (1,'Sollevamenti posteriori ai cavi','esercizi/dorso/sollevamenti_posteriori_ai_cavi.png','Dorso','Consiste nel allungare delle cavi mediante l&rsquo;uso della braccia, serve per allenare la parte alta del dorso.',''),(2,'Rematore gomiti larghi','esercizi/dorso/rematore_gomiti_larghi.png','Dorso','Consiste nel sollevare e abbassare il bilanciere con una posizione leggermente inclinata verso l&rsquo;avanti.',''),(3,'Row su panca inclinata con bilanciere','esercizi/dorso/row_su_panca_inclinata_con_bilanciere_su_panca_inclinata.png','Dorso','L&rsquo;esecizio consiste nel sollevare un bilanciere trovandosi nella posizione a pancia in gi&ugrave; sulla panca inclinata.',''),(4,'Trazioni alla sbarra presa larga','esercizi/dorso/trazioni_alla_sbarra_presa_larga.png','Dorso','Consiste nel sollevare e abbassare il proprio corpo con tenendosi attaccati a una sbarra.',''),(5,'Hammer pull up su macchina di assistenza','esercizi/dorso/hammer_pull_up_su_macchina_di_assistenza.png','Dorso','L&rsquo;esercizio consiste nello svolgere l&rsquo;esercizio sopra una macchina di assistenza apposita.',''),(6,'Over row presa rovesciata','esercizi/dorso/over_row_presa_rovesciata.png','Dorso','consiste nel fare la stessa cosa dell&rsquo;esercizio numero 3 ma con la presa del bilanciere contraria.',''),(7,'Crunch','esercizi/addominali/crunch.png','Addominali','Alzare e abbassare la parte superiore del corpo, distesi e con le ginocchia piegate in avanti e le braccia che toccano la testa.',''),(8,'Spinta delle gambe su panca','esercizi/addominali/spinta_delle_gambe_su_panca.png','Addominali','Alzare le gambe una volta distesi sopra la panca son solo la schiena appoggiata a terra e le gambe rivolte verso l&rsquo;alto.',''),(9,'Abdominal crunch','esercizi/addominali/abdominal_crunch.png','Addominali','L&rsquo;abdominal crunch &egrave; un macchinario che si pu&ograve; utilizzare in palestra e aiuta appunto negli esercizi di rinforzo degli addominali.',''),(10,'Alzate laterali','esercizi/addominali/alzate_laterali.png','Addominali','Si alza e si abbassa il corpo senza mai toccare la terra, si svolge con le braccia attaccate a delle sbarre per allenare gli addominali.',''),(11,'Crunch su panca','esercizi/addominali/crunch_su_panca.png','Addominali','Simile al primo esercizio con la sola differenza che la posizione da noi tenuta non prevede le ginocchia in avanti ma bloccate dalla panca.',''),(12,'Alzate della gambe da terra','esercizi/addominali/alzate_della_gambe_da_terra.png','Addominali','Simile al secondo esercizio con la sola modifica che nonsi &egrave; sulla panca ma distesi per terra con le gambe alzate.',''),(13,'Panca piana','esercizi/pettorali/panca_piana.png','Pettorali','La panca piana &egrave; uno degli esercizi fondamentali per il petto. Lo svolgimento prevede di stendersi sulla panca con la schiena inarcata, i piedi saldi sul pavimento e afferrare il bilanciere con una presa salda. Dopo la preparazione il bilanciere deve sfiorare il petto e tornare su.',''),(14,'Piegamenti','esercizi/pettorali/piegamenti.png','Pettorali','I piegamenti sulle braccia sono un ottimo esercizio a corpo libero per l&rsquo;attivazione del pettorale. Bisogna stendersi per terra allargando le braccia alla larghezza delle spalle. Mantenendo la postura dritta, pieghiamo le braccia andando verso il basso, in modo da tirare il pettorale, e poi tornando verso l&rsquo;alto.',''),(15,'Croci con manubri su panca piana','esercizi/pettorali/croci_con_manubri_su_panca_piana.png','Pettorali','Esistono croci di diverso tipo. Le croci con manubri sono molto tecniche. Con l&rsquo;utilizzo di 2 manubri, ci si stende su una panca piana e alzando le braccia parallelamente al petto si aprono in modo lento e controllato finch&egrave; il petto non inizia a tirare.',''),(16,'Chest press','esercizi/pettorali/chest_press.png','Pettorali','La chest press prevede l&rsquo;utilizzo di una macchina isotonica che possiede gi&agrave; la traiettoria predefinita del movimento. Basta sedersi sulla macchina, impugnare le maniglie, contrarre le scapole mandando il petto in fuori e spingere in avanti per strizzare il petto e tornare indietro finche non si sente tirare il petto.',''),(17,'Croci ai cavi','esercizi/pettorali/croci_ai_cavi.png','Pettorali','Le croci ai cavi allenano diverse fasce del petto. Prendendo i 2 cavi ci si mette con i piedi uno davanti all&rsquo;altro e larghi quanto le spalle, schiena dritta, petto in fuori e si tirano i cavi davanti al petto con le braccia tese facendo toccare le mani e mantenendo la posizione per pochi secondi. Regolando l&rsquo;altezza delle mani andremo a stimolare le 3 fasce del petto ovvero alta, centrale e bassa.',''),(18,'Panca piana al multipower','esercizi/pettorali/panca_piana_al_multipower.png','Pettorali','La panca piana al multipower &egrave; una semplice panca piana ma con l&rsquo;aiuto del multipower ci permette di fare un movimento pi&ugrave; lento e controllato in modo da imparare bene l&rsquo;esercizio prima di farlo sulla panca libera. E&rsquo; un p&ograve; pi&ugrave; sicura infatti in caso di emergenza si pu&ograve; subito appoggiare agli agganci.',''),(19,'Curl con manubri','esercizi/bicipiti/curl_con_manubri.png','Bicipiti','Il curl con manubri &egrave; l&rsquo;esercizio standard per i bicipiti e si pi&ograve; eseguire in molte varianti. Questa variante si esegue in piedi con un manubrio per mano. Mettendoci dritti e con le gambe leggermente aperte portiamo i manubri al petto flettendo il braccio e attivando il bicipite.',''),(20,'Curl alla panca scott','esercizi/bicipiti/curl_alla_panca_scott.png','Bicipiti','Il curl alla panca scott si pu&ograve; eseguire sia con i manubri che con un bilanciere. Ci si siede sulla panca mettendo le braccia sulla parte piatta, si afferrano, in questo caso i manubri, e si esegue un curl lento ma controllato senza esagerare nella parte di ritorno per evitare infortuni.',''),(21,'Curl seduto','esercizi/bicipiti/curl_seduto.png','Bicipiti','Il curl seduto &egrave; molto semplice come esercizio. Basta prendere un solo manubrio, sedersi su una panca, appoggiare la zona del braccio tra il tricipite e il gomito nella parte interna della gamba e muove il manubrio verso di se come un curl normale. Da eseguire con un braccio alla volta.',''),(22,'Curl ai cavi','esercizi/bicipiti/curl_ai_cavi.png','Bicipiti','Il curl ai cavi &egrave; il pi&ugrave; tecnico tra i curl. Prendendo i 2 cavi si mettono le braccia a 90&deg; circa all&rsquo;altezza delle orecchie e parallele alle spalle si tirano i cavi verso la testa mantenendo la posizione delle braccia alla stessa altezza.',''),(23,'Curl alle corde','esercizi/bicipiti/curl_alle_corde.png','Bicipiti','Il curl alle corde (detto anche a martello) si esegue con una tirata dal basso verso l&rsquo;alto delle corde in modo lento e controllato con una postura leggermente spostata in avanti, gambe larghe quanto le spalle e petto in fuori.&nbsp;',''),(24,'Curl con bilanciere','esercizi/bicipiti/curl_con_bilanciere.png','Bicipiti','Il curl con bilanciere &egrave; un semplice curl, come quello con manubri, con l&rsquo;unica differenza che si usa un bilanciere quindi &egrave; pi&ugrave; pesante e non pu&ograve; essere svolto con un singolo braccio ma va svolto con entrambi. Mantenendo una postura eretta, si porta il bilanciere verso il petto.',''),(25,'Squat','esercizi/gambe/squat.png','Gambe','Lo squat &egrave; l&rsquo;esercizio per eccellenza delle gambe stimolando glutei, femorali e quadricipiti. Ci si sistema il bilanciere sulle spalle cercando l&rsquo;incastro giusto tra le spalle e le scapole. Una volta trovato l&rsquo;incastro si allargano le gambe alla larghezza delle spalle e si scende in modo verticale.',''),(26,'Pressa a 45&deg;','esercizi/gambe/pressa_a_45.png','Gambe','La pressa a 45&deg; &egrave; una macchina a carico diretto che ci permette di sviluppare molto i quadricipiti e i femorali in quanto la spinta &egrave; inclinata in alto. Basta sedersi sulla macchina, mettere i piedi sulla pressa e allargarli. Una volta preparati si da una spinta per sganciare la macchina spostando le maniglie di sicurezza e poi si pu&ograve; effettuare l&rsquo;esercizio.',''),(27,'Adduttori','esercizi/gambe/adduttori.png','Gambe','I muscoli adduttori sono i muscoli presenti nella parte interna della gamba e per poterli allenare possiamo usare una macchina. Ci si siede sull&rsquo;apposito sedile allargando le gambe,mettendole sui pedali e mantenendo la schiena dritta, chiudiamo le gambe in modo da mettere in funzione gli adduttori.',''),(28,'Leg extension','esercizi/gambe/leg_extension.png','Gambe','Questa macchina ci permette di isolare i quadricipiti in modo da allenare maggiormente solo quella parte di gamba. Sedendoci sulla macchina e mantenendo la postura dritta, si mettono i piedi sotto l&rsquo;apposito cuscino e si alzano verso l&rsquo;alto portando cos&igrave; le gambe in una posizione orizzontale.&nbsp;.',''),(29,'Abduttori','esercizi/gambe/abduttori.png','Gambe','Gli abduttori solo la parte esterna della gamba. L&rsquo;esercizio &egrave; molto simile a quello degli adduttori con l&rsquo;unica differenza che invece di chiudere le gambe qui si portano le gambe verso l&rsquo;esterno in modo da mettere il funzione i muscoli abduttori. Per isolare ancora di pi&ugrave; i muscoli si possono fare in posizione di squat.',''),(30,'Leg curl','esercizi/gambe/leg_curl.png','Gambe','Il leg curl permette di allenare i femorali con l&rsquo;utilizzo di una macchina. Ci si sdraia a pancia in gi&ugrave; sulla panca mettendo i piedi sull&rsquo;apposito cuscino. Una volta in posizione si flettono le gambe verso i glutei contraendo in questo modo i femorali e attivando glutei e un p&ograve; i polpacci.',''),(31,'Push down con barra a v','esercizi/tricipiti/push_down_con_barra_a_v.png','Tricipiti','Il push down con barra a v consiste nel spostare un peso regolabile mediante l&rsquo;uso delle braccia che, attaccate ad un manubrio a forma di v, solleveranno e alzeranno i pesi.',''),(32,'Estensioni inclinate con bilanciere','esercizi/tricipiti/estensioni_inclinate_con_bilanciere.png','Tricipiti','Consiste nel sollevare e abbassare il bacino, non permettendogli mai di toccare il terreno, per svolgere questo esercizio c&rsquo;&egrave; bisogno di una zona con conca come quella raffigurata in foto.',''),(33,'Estensioni tricipite con un braccio singolo manubrio','esercizi/tricipiti/estensioni_tricipite_con_un_braccio_singolo_manubrio.png','Tricipiti','Consiste nel estendere i muscoli dei tricipiti utilizzando un singolo manubrio con dei pesi attaccati e posizionarlo dietro la schiena, bisogna poi tenerlo per un periodo di tempo basato sulla propria esperienza.',''),(34,'Estensione tricipite al cavo','esercizi/tricipiti/estensione_tricipite_al_cavo.png','Tricipiti','Esercizio misto del 1&deg;&nbsp; e del&nbsp; 3&deg; esercizio, consiste nell&rsquo;estendere il tricipite utilizzando un cavo, anch&rsquo;esso collegato a dei pesi, il peso varia ovviamente in base all&rsquo;esperienza di chi fa l&rsquo;esercizio.',''),(35,'Estensione tricipite manubrio','esercizi/tricipiti/estensione_tricipite_manubrio.png','Tricipiti','Esercizio simile al 3&deg; esercizio con la sola modifica che al posto si un manubrio singolo di piccole dimensioni, si va ad utilizzare un manubrio di grande dimensioni, anche la durata di questo esercizio varia in base all&rsquo;esperienza.',''),(36,'Estensione manubrio in piedi','esercizi/tricipiti/estensione_manubrio_in_piedi.png','Tricipiti','Altro esercizio molto simile al 3&deg;, consiste nell&rsquo;estendere il tricipite utilizzando sempre un manubrio ma questa volta la posizione non sar&agrave; seduta, ma come dice il nome in piedi, la durata &egrave; sempre variabile.',''),(37,'Alzate frontali con manubri alternate','esercizi/spalle/alzate_frontali_con_manubri_alternate.png','Spalle','Consiste nel alzare frontalmente i manubri, prima quello di destra e logicamente poi quello di sinistra.',''),(38,'Alzate con manubri su panca','esercizi/spalle/alzate_con_manubri_su_panca.png','Spalle','Consiste nello sollevare e abbassare i manubri sedendosi sulla panca e mantenendo la schiena dritta.',''),(39,'Alzate di spalle con bilanciere','esercizi/spalle/alzate_di_spalle_con_bilanciere.png','Spalle','Si afferra il bilanciere da in piedi mantenendo la schiena dritta e le gambe leggermente allargate.',''),(40,'Alzate laterali','esercizi/spalle/alzate_laterali.png','Spalle','Consiste nel alzare lateralmente i manubri fino all&rsquo;altezza delle spalle in modo continuo.',''),(41,'Alzate al mento con bilanciere','esercizi/spalle/alzate_al_mento_con_bilanciere.png','Spalle','Consiste nello sollevare e abbassare il bilanciere verso il mento mantenendo una postura dritta e rigida.',''),(42,'Shoulder press','esercizi/spalle/shoulder_press.png','Spalle','E&rsquo; una macchina la quale ci si siede afferrando le maniglie, buttando il petto in fuori si spinge verso l&rsquo;alto.','');
/*!40000 ALTER TABLE `esercizio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `scheda`
--

DROP TABLE IF EXISTS `scheda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `scheda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `utente` int(11) NOT NULL,
  `data_assegnamento` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_scheda_utente` (`utente`),
  CONSTRAINT `FK_scheda_utente` FOREIGN KEY (`utente`) REFERENCES `utente` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scheda`
--

LOCK TABLES `scheda` WRITE;
/*!40000 ALTER TABLE `scheda` DISABLE KEYS */;
INSERT INTO `scheda` VALUES (2,8,'2023-06-03'),(3,9,'2023-06-03'),(4,10,'2023-06-03');
/*!40000 ALTER TABLE `scheda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `svolgimento`
--

DROP TABLE IF EXISTS `svolgimento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `svolgimento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `esercizio` int(11) NOT NULL,
  `scheda` int(11) NOT NULL,
  `serie` int(11) NOT NULL,
  `ripetizioni` int(11) NOT NULL,
  `recupero` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_svolgimento_scheda` (`scheda`),
  KEY `FK_svolgimento_esercizio` (`esercizio`),
  CONSTRAINT `FK_svolgimento_esercizio` FOREIGN KEY (`esercizio`) REFERENCES `esercizio` (`id`),
  CONSTRAINT `FK_svolgimento_scheda` FOREIGN KEY (`scheda`) REFERENCES `scheda` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `svolgimento`
--

LOCK TABLES `svolgimento` WRITE;
/*!40000 ALTER TABLE `svolgimento` DISABLE KEYS */;
INSERT INTO `svolgimento` VALUES (4,2,2,3,10,30),(5,4,2,3,10,30),(6,1,2,3,10,30),(7,6,2,3,10,30),(8,13,2,3,10,30),(9,17,2,3,10,30),(10,26,3,3,10,30),(11,30,3,3,10,30),(12,25,3,3,10,30),(13,8,3,3,10,30),(14,9,3,3,10,30),(15,7,3,3,10,30),(16,19,4,3,10,30),(17,21,4,3,10,30),(18,34,4,3,10,30),(19,36,4,3,10,30),(20,31,4,3,10,30);
/*!40000 ALTER TABLE `svolgimento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utente`
--

DROP TABLE IF EXISTS `utente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `utente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` char(128) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cognome` varchar(50) NOT NULL,
  `dipendente` tinyint(1) NOT NULL,
  `ruolo` varchar(50) DEFAULT NULL,
  `immagine` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utente`
--

LOCK TABLES `utente` WRITE;
/*!40000 ALTER TABLE `utente` DISABLE KEYS */;
INSERT INTO `utente` VALUES (1,'admin','c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec','Luciano','Bonecchi',1,'Proprietario','dipendenti/luciano.jpg'),(2,'achille','dcde72a5528c28fdd36597b6074d881b2f195929d9f6c5d8f2afcdb23f3fb5e17323156ee8513f8f3ff7cdae8928d6cd21d169b132c3ab716e51bd8bdbef3d69','Achille','Fontana',1,'Personal Trainer','dipendenti/achille.png'),(3,'arnold','f9fa80e7066a1bf6bf49305f342b618fea8320f4a45b047ea4fc59c661a6d017697b85418a781cc1dfdfc06e92bbd02386ca59b753bb8c53dc8cd2e960107ae4','Arnold','Schwartzenegger',1,'Body Building','dipendenti/arnold.jpg'),(4,'diego','d6d3370465fcf929e8fa1c832020d879a781edf2863f409f36f8ba7edb6d849b7388c5339c257a16e23637c60194c841600119213bcb95ac8ac4b70612c89b73','Diego','Girolami',1,'Postural Trainer','dipendenti/diego.jpg'),(5,'pietro','7eab7c2ccf55db8439c2971509c3bf9d73f2852cba473089500aff5de4a79fc8481f7be63258c60a7d76a877bed26b57141d79b7a489691a320ea75854fe5840','Pietro','Arnoldi',1,'Professional Coach','dipendenti/pietro.png'),(6,'ivan','23f080a7a1d8a53205df180fa23109e6213d9398bfc4455de3e97717807abaf31c3b00c6293618f97fe8ec83bbdfcfe7fedc5f15f2bffe3276daff5f3a6c6907','Ivan','Drago',1,'Istruttore Box','dipendenti/ivan.jpg'),(8,'paolo','6dcdd2b737cbd117dda1bfb1ab3e872df0a7f6a45a6f6b793f9158053a8a8749dbf12127d482bef67ddd66b9b2545c73bfbbb159af83b0e86f3d4bf7989cbac6','Paolo','Palumbo',0,NULL,NULL),(9,'luca','33afd882929b8d834fcf0fab7383eed94f4c9fc226a49434a09fb8b0dc7da1dee5116f32c0fe9010cf8ffd0475d8e3ea846fd0b6b5bca0ae9c61355dd2b92f98','Luca','Palumbo',0,NULL,NULL),(10,'giovanni','83833733fa80970ed63971615324b93fdc2161a339f727eb6c8b59cb173c932e253479cebfdcd063af50f9a7e95515fe8846252278e24c11b67de3ff6a5ea880','Giovanni','Bianchi',0,NULL,NULL),(11,'antonio','6fc10570c810f24685e42b7db25ab335cd79e38f4f0a0ed41312a4dbfbe272d9ebafff097ca499d195e1466e4047fcec9a4a4fa287ac1a0866155f8e1d1871ae','Antonio','Rossi',0,NULL,NULL);
/*!40000 ALTER TABLE `utente` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-03 14:46:50
