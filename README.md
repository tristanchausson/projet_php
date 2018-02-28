Découverte PHP

Projet découverte PHP

Réalisation d'un mini site PHP/Mysql ayant l'architecture suivante :

    Home
    A propose
    Bog
        Article de blog
    Evénements
    Contact
    Log In
    Inscription

Squelette du site web

Création du squelette du site. Le menu doit être présent sur toutes les pages du site. Attention, le code HTML du menu ne doit pas être dupliqué.
Home page

La home page contient du contenu HTML statique
A propos

La page "A propos" contient du contenu HTML statique
Blog

La page blog liste par ordre décroissant (date de publication) tous les billets de blog présent en base de donnée. Un article de blog contient :

    Un titre
    Une image
    Un texte d'intro
    Le texte complet
    Une date de publication

La liste affiche pour chaque billet de blog le titre, l'image, le texte d'intro et la date du publication. Au clic sur un billet de blog amène sur l'article complet (Article de blog).

Bonus: L'utilisateur doit pourvoir changer l'ordre d'affichage des billets de blog (croissant ou décroissant sur la date de publication).
Article de blog

La page artile de blog affiche le contenu complet d'un billet.
Evénements

Un événement contient :

    Un titre
    Une image
    Un texte d'intro
    Une date de début
    Une date de fin
    Un lieu
    Une date de publication

La page Evénéments liste uniquement les événements à venir ou en cours. Seul les utilisateurs connectés peuvent accéder à cette liste d'événements

Bonus: Permettre à l'utilisateur de filtrer la liste des événements par lieu
Contact

La page de contact contient un formulaire demandant à l'utilisateur de saisir :

    L'objet de son message
    Son message
    Son age
    Un thème (à choisir parmis une liste pré-définie)

Nous vouslons aussi savoir si l'utilisateur est un utilisateur connecté ou non Chaque demande de contact sera stocké en base de données.

Bonus: L'utisateur ne doit pas pouvoir saisir "Simplon" dans l'objet de son message
Inscription

Pour la création d'un compte, l'utilisateur doit choisir un nom d'utilisateur et un mot de passe. Le nom d'utilisateut doit être unique. Il doit saisir 2 fois son mot de passe afin d'éviter toute erreur de saisie. Pour des raisons de sécurité, il doit être impossible de retrouver le mot de passe des utilisateurs dans la base de données.

Bonus: La vérification de l'unicité du nom utilisateur et la vérification de la correspondance des mots de passe saisis seront en AJAX.
Log In

Les utilisateurs ayant un compte doivent pouvoir s'indentifier en saissant leur nom d'utilisateur et leur mot de passe afin de pouvoir accéder à la page "Evénéments". Les utilisateurs connectés doivent pouvoir se déconnecter facilement.
Bonus

Les utilisateurs connectés pourront écrire de nouveaux articles de blogs et modifier les articles dont ils sont les auteurs.
