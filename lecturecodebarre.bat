:: Code ?rit par Virgile PARAT
:: Propri??de la soci??AEML
:: Toutes utilisations hors de la soci??est passible de poursuite judiciaire

@ECHO OFF

::La ligne "if not defined" est ?d?commenter lors d'une phase de d?eloppement
::Elle permet ?la fenetre de rester apr? une erreur non g??et donc un affichage de l'erreur
::if not defined in_subprocess (cmd /k SET in_subprocess=y ^& %0 %*) & exit )

SETlocal enableextensions enabledelayedexpansion

:: Initialise le menu ?0 pour qu'il puisse boucler en cas d'erreur
SET "menu=0"
ECHO Bienvenue dans le programme de la societe AEML
ECHO.
GOTO menuPrincipal

:failedInput
ECHO Je n'ai pas compris votre choix, veuillez retaper le numero
ECHO.
ECHO.
:: ram?e ?cette ?ape dans certaines situations
:menuPrincipal
ECHO Programme d'inventaire des AEML
ECHO.
ECHO.
ECHO 1 - Scanner des articles
ECHO 2 - Voir les fichier inventaire et afficher le contenu
ECHO 3 - Transformer un inventaire en fichier Excel
ECHO 4 - Mettre en commun deux fichiers d'inventaire
ECHO 5 - Gerer les references produits / code-barre
ECHO Q - Quitter le programme
ECHO.
ECHO Veuillez taper le numero correspondant a votre fonction
ECHO.
SET /P menu=Quel fonction voulez vous utiliser ? : 
ECHO.
ECHO.

IF "%menu%" NEQ "1" IF "%menu%" NEQ "2" IF "%menu%" NEQ "3" IF "%menu%" NEQ "4" IF "%menu%" NEQ "5" IF "%menu%" NEQ "q" IF "%menu%" NEQ "Q" IF "%menu%" NEQ "test" (CLS & GOTO failedInput)

::Cr?tion d'un fichier ayant pour nom la date dans le dossier inventaire et propose un ajout d'articles
IF "%menu%" EQU "1" CLS & GOTO scanArticle 

::Affiche les fichier inventaire leur contenu
IF "%menu%" EQU "2" CLS & GOTO showFiles

::Permet d'afficher les r?utlats d'un fichier
IF "%menu%" EQU "3" CLS & GOTO showResults

::Permet de grouper deux fichiers pour faire un inventaire en commun
IF "%menu%" EQU "4"	CLS & GOTO groupResults

::Stockage Inventaire
IF "%menu%" EQU "5"	CLS & GOTO inventaire

::Fin - Am?e ici au choix n?5
IF "%menu%" EQU "q" CLS & GOTO EOF
IF "%menu%" EQU "Q" CLS & GOTO EOF
::My Only friend, the end

::Test
IF "%menu%" EQU "test" CLS & GOTO secretZone
::Here we go !


:: ------------------------- R?up?ation des articles N?1 ---------------------------

:scanArticle

::Enregistre la date
SET "now=%date:~3,2%-%date:~0,2%-%date:~6,4%_%time:~0,2%-%time:~3,2%"
::Si le temps est inférieur à 10, génération d'un espace au lieu d'un 0 ce qui fait buguer l'enregistrement de fichier
::Cette ligne transforme les espaces en 0
SET "now=%now: =0%"

::Prépare le fichier
SET "fichier=Inventaire\%now%"

ECHO La sauvegarde de votre fichier va porter le nom %now%
ECHO Elle se trouve dans le dossier Inventaire

::Gère l'exception d'un autre fichier portant le même nom
IF EXIST "%fichier%" GOTO exceptDoubleOpen

:exceptDoubleClose

CLS
ECHO Vous pouvez maitenant scanner vos articles
ECHO.
ECHO.
ECHO Scannez un article pour l'ajouter
ECHO Tapez 'T' ou 't' pour terminer les entrees dans l'inventaire
ECHO Tapez 'S' ou 's' pour supprimer le dernier article mis dans l'inventaire
ECHO.
ECHO.

::attention à bien faire attnetion au "" elles permettent une gestion correct des espaces potentiels dans les codes barres
:scan
SET /P article=Scanner un article / S : supprimer / T : terminer :
IF "%article%" EQU "T" CLS & GOTO menuPrincipal
IF "%article%" EQU "t" CLS & GOTO menuPrincipal
IF "%article%" EQU "S" CLS & GOTO suprArticle
IF "%article%" EQU "s" CLS & GOTO suprArticle
@ECHO %article% >> "%fichier%"
:: affichage du fichier
CLS
TYPE "%fichier%"
GOTO scan

:: -------------------------- Suppression d'un article ---------------------------

:suprArticle
 
::Aucune idée de ce que ça fait mais ça marche
::La dernière ligne est supprimer et est sauvegardé dans un nouveau fichié.new
FOR /f "usebackq tokens=1* delims=[]" %%a in (`FIND /v /n "" "%fichier%"`) do (
	SET "LastLine=%%a"
	SET ContentLine_%%a=%%b
)
SET /a "LastLine=!LastLine!-1"
FOR /l %%a in (1,1,!LastLine!) do ECHO.!ContentLine_%%a!>>"%fichier%.new"

::L'ancien fichier est supprimé et laisse sa place au nouveau fichier modifié
DEL "%fichier%"
REN "%fichier%.new" "%now%"

:: affiche le contenu du ficher
CLS
TYPE %fichier%
GOTO scan

:: -------------------------- Affiche les fichiers N?2 ---------------------------

:showFiles
ECHO Inventaire actuellement present
DIR Inventaire /b
ECHO.
ECHO.
ECHO De quel inventaire Voulez-vous afficher le contenu ?
ECHO Entrez la touche 'Q' a tout moment pour revenir au menu
ECHO.
ECHO.
SET /P nom=Nom de l'inventaire :

IF "%nom%" EQU "q" CLS & GOTO menuPrincipal
IF "%nom%" EQU "Q" CLS & GOTO menuPrincipal

SET fichier=Inventaire\%nom%

IF NOT EXIST %fichier% CLS & ECHO Inventaire %choseList% non trouve, verifiez l'ortographe & ECHO. & GOTO showFiles

TYPE %fichier%
PAUSE

CLS & GOTO menuPrincipal


:: ------------------------- Afficher les r?ultats N?3 --------------------------

:showResults


ECHO Voici la liste des inventaire present dans le dossier Inventaire :
ECHO.
DIR Inventaire /b
ECHO.
ECHO.
ECHO Tapez le nom de l'inventaire que vous souhaiter Transformer en fichier excel
ECHO Entrez la touche 'Q' a tout moment pour revenir au menu

SET /P nom=Nom de l'inventaire :
IF "%nom%" EQU "q" CLS & GOTO menuPrincipal 
IF "%nom%" EQU "Q" CLS & GOTO menuPrincipal

::transformation du fichier en csv, language de lecture de tableau simplifi?
SET "fichier=Inventaire\%nom%"

IF NOT EXIST %fichier% CLS & ECHO Inventaire %choseList% non trouve, verifiez l'ortographe & GOTO showResults

SET /P newname=Veuillez choisir un nom pour votre fichier excel : 

COPY "%fichier%" "Excel\%newname%.csv"

PAUSE

GOTO menuPrincipal

:: -------------------------- Merge fichier N 4  -----------------------------

:groupResults


ECHO Vous allez maintenant mettre en commun deux inventaires pour en former un seul
ECHO Entrez a tout moment la touche 'Q' pour revenir a l'accueil
ECHO.
ECHO Voici la liste des inventaire pr?ent dans le dossier Inventaire :

:queryOne
ECHO.
DIR Inventaire /b
ECHO.
SET /P fichier1=Veuillez definir le premier inventaire : 

IF "%fichier1%" EQU "q" CLS & GOTO menuPrincipal
IF "%fichier1%" EQU "Q" CLS & GOTO menuPrincipal

SET "fichier1=Inventaire\%fichier1%"

IF NOT EXIST "%fichier1%" CLS & ECHO Le nom de votre premier inventaire est invalide, veuillez ressayer & GOTO queryOne

:queryTwo
ECHO.
DIR Inventaire /b
ECHO.
SET /P fichier2=Veuillez definir le deuxieme inventaire : 

IF "%fichier2%" EQU "q" CLS & GOTO menuPrincipal
IF "%fichier2%" EQU "Q" CLS & GOTO menuPrincipal

SET "fichier2=Inventaire\%fichier2%"

IF NOT EXIST "%fichier2%" ECHO Le nom de votre deuxieme inventaire est invalide, veuillez ressayer & GOTO queryTwo

::Enregistre la date
SET "now=%date:~3,2%-%date:~0,2%-%date:~6,4%_%time:~0,2%-%time:~3,2%"
::Si le temps est inf?ieur ?10, g??ation d'un espace au lieu d'un 0 ce qui fait buguer l'enregistrement de fichier
::Cette ligne transforme les espaces en 0
SET "now=%now: =0%"

::Pr?are le fichier
SET "fichier3=Inventaire\%now%"

COPY %fichier1%+%fichier2% Inventaire\%now%

ECHO Votre inventaire a ete mis en commun sous le nom %now%

PAUSE
CLS
GOTO menuPrincipal

:: -------------------------  Gestion inventaire N 5  ---------------------------

:inventaire


ECHO Bienvenue dans l'interface de gestion des references
ECHO.
ECHO Le fichier de references est localise dans le repertoire Reference
ECHO Vous pouvez modifier le fichier en utilisant un logiciel tableur (Excel)
ECHO.
ECHO.
ECHO Entrez la touche 'S' pour supprimer la derniere ligne affiche
ECHO Entrez la touche 'T' pour terminer vos enregistrement
ECHO.
ECHO Scannez d'abord votre code-barre
ECHO Indiquez ensuite le nom du produit lie a la reference
ECHO.
PAUSE
CLS

:inventaireAdd

SET "fichier=Reference\reference.csv"
TYPE "%fichier%"

ECHO.
IF NOT EXIST "%fichier%" ECHO AUCUN DE FICHIER DE REFERENCE TROUVE, CREATION D'UN NOUVEAU

ECHO.
SET /P scan=Veuillez scanner votre code-barre ('S' supprimer / 'T' terminer) :  

IF "%scan%" EQU "T" CLS & GOTO backupRef
IF "%scan%" EQU "t" CLS & GOTO backupRef
IF "%scan%" EQU "S" CLS & GOTO suprRef
IF "%scan%" EQU "s" CLS & GOTO suprRef

ECHO.
SET /P nom=Veuillez maintenant entrez le nom de la reference : 

@ECHO %scan%;%nom% >> "%fichier%"

CLS
GOTO inventaireAdd

:: ------------------------ Suppression d'une reference --------------------------

:suprRef
 
::Aucune idée de ce que ça fait mais ça marche
::La dernière ligne est supprimer et est sauvegardé dans un nouveau fichié.new
for /f "usebackq tokens=1* delims=[]" %%a in (`find /v /n "" "%fichier%"`) do (
	set "LastLine=%%a"
	set ContentLine_%%a=%%b
)
set /a "LastLine=!LastLine!-1"
for /l %%a in (1,1,!LastLine!) do echo.!ContentLine_%%a!>>"%fichier%.new"

::L'ancien fichier est supprimé et laisse sa place au nouveau fichier modifié
DEL "%fichier%"
REN "%fichier%.new" "reference.csv"

:: affiche le contenu du ficher
CLS
GOTO inventaireAdd

:: ------------------------ Back-up des Références  -----------------------------

:backupRef

::Enregistre la date
SET "now=%date:~3,2%-%date:~0,2%-%date:~6,4%_%time:~0,2%-%time:~3,2%"
::Si le temps est inf?ieur ?10, g??ation d'un espace au lieu d'un 0 ce qui fait buguer l'enregistrement de fichier
::Cette ligne transforme les espaces en 0
SET "now=%now: =0%"

COPY "%fichier%" "Reference\Sauvegarde\%now%"


GOTO menuPrincipal

:: ========================== Gestion des exception =============================

:: --------------------- Gestion des fichiers de m?e noms ----------------------



:exceptDoubleOpen

:: Permet la gestion des exception avec la commande file exist qui ne prend en compte qu'une commande
ECHO Un fichier portant exactement le meme nom existe deja
SET /P doublon=Voulez-vous le supprimer (oui/non) ?:

IF %doublon% NEQ oui IF %doublon% NEQ OUI IF %doublon% NEQ non IF %doublon% NEQ NON (
	ECHO Je n'ai pas compris votre choix, veuillez retaper le numero
	GOTO :doublefile
	)

IF %doublon% EQU non CLS & ECHO Veuillez patienter une minute avant de relancer la creation d'un fichier & ECHO. & GOTO :menuPrincipal
IF %doublon% EQU NON CLS & ECHO Veuillez patienter une minute avant de relancer la creation d'un fichier & ECHO. & GOTO :menuPrincipal

IF %doublon% EQU oui ECHO Suppresion de l'ancien fichier & DEL %fichier%
IF %doublon% EQU OUI ECHO Suppresion de l'ancien fichier & DEL %fichier%

PAUSE

GOTO exceptDoubleClose

:: ----------------------------------- Test -------------------------------------

:secretZone

cls

:: ========================== script qui compte les lignes =============================

rem DIR Inventaire /b
rem ECHO.
rem SET /P nom=Nom de l'inventaire :
rem SET "nom=Inventaire\%nom%"

rem IF "%nom%" EQU "q" CLS & GOTO menuPrincipal
rem IF "%nom%" EQU "Q" CLS & GOTO menuPrincipal

rem set "cmd=findstr /R /N "^^" %nom% | find /C ":""

rem for /f %%a in ('!cmd!') do set number=%%a
rem echo %number%

rem PAUSE

GOTO menuPrincipal

::End Of File
:EOF