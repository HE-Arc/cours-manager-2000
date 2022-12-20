# Documentation utilisateur

## Login

Pour se connecter à la version déployée de l'application, il suffit de suivre ce [lien](https://coursmanager2000.k8s.ing.he-arc.ch/). Il vous amenera sur la page de connexion de l'application. Il est nécessaire de se connecter à cette application car elle fait office d'outil de gestion d'emploi du temps et de notes, tous les deux sujets à des personnalisations en fonction de l'étudiant.

login.png

### Création de compte

Afin de pouvoir se connecter à l'application, il faut d'abord se créer un compte. Le formulaire pour le faire peut être trouvé en cliquant le bouton "Créer un compte" encadré en rouge ci-dessous.

login-encadr.png

Il vous amènera sur la page de création de compte qui se présente sous cette forme :

new-acc.png

Il suffit alors de rentrer vos détails dans les cases associées. **ATTENTION:** l'application requiert un mot-de-passe d'au moins 8 caractères afin d'assurer une meilleure sécurité à ces utilisateurs. Il faut aussi prêter attention à la classe que l'on choisit, cette dernière définira la liste des modules auxquels ont pourra s'inscrire. Une fois cette étape finie, on peut actionner le boton "S'inscrire" encadré ci-dessous.

new-acc-encadr.png

Si toutes les informations sont adéquates on est alors automatiquement transféré sur l'écran d'acceuil.

## Page d'acceuil

Sur la page d'acceuil, qui ressemble à ceci :

homepage.png

on peut distinguer plusieurs options sous formes de "cards" (cartes) stylisées avec diverses images d'animeaux qu'il faudra découvrir par soi-même. En effet, elle nous présente deux options de naviguation. Dans la barre en haut de la page se trouve aussi une option "Bulletin", celle-ci sera explorée à la fin de cette documentation utilisateurs.

### Modules

#### S'abonner aux modules

Dans un premier temps, ouvrons les "Modules". Cette page nous amène vers une vue d'ensemble des modules que nous avons décidés de suivre. Pour l'instant cette page est complètement vide, normal, nous n'avons pas encore décidé à quels modules nous voulions nous abonner. Pour s'abonner à des modules, il suffit d'actionner le bouton "Inscription aux modules".

modules-encadr.png

L'application nous présente alors une liste de modules (correspondant à la classe que nous avons sélectionnée lors de la création de compte). On peut aussi voir que chaque module est accompagné de non seuelement sa note minimale pour l'acquérir, mais aussi un bouton "s'abonner" figurant encadré sur la capture ci-dessous.

modules-abo-encadr.png

Lorsqu'un utilisateur s'abonne à un module, les matières et cours correspondants seront automatiquement ajoutés à son bulletin et emplois du temps. Lorsque la sélection de modules que l'on souhaite suivre est accomplie, on peut revenir sur la page d'avant, à savoir la liste de modules maintenant peuplée:

modules.png

#### Naviguer dans les modules

Lorsque l'utilisateur souhaite naviguer dans un module, il suffit de cliquer sur la case du module qu'il souhaite ouvrir et il retrouve une vue d'ensemble des matières ainsi qu'une indication aux notes qui composent la moyenne générale du module.

D'ici, l'utilisateur peut aussi naviguer dans les matières afin d'y ajouter des notes.

### Ajouter des notes

Afin d'ajouter une note à une matière d'un module, il suffit de naviguer dans ce module (en suivant ce qu'est décrit dans le sous-chapitre ci-dessus), naviguer dans la matière de la même façon et là il sera présenté avec un écran semblant à la capture suivante :

matiere-encadr.png

Encadré en rouge est le bouton "Ajouter note" qui amène directement au formulaire de création d'une note appartenant à cette matière. Dans ce formulaire il faut alors donner la valeur et le coefficient de la note. Ensuite il suffit de cliquer le bouton "Ajouter" pour ajouter la note.

### Modifier une note

Afin de modifier une note il suffit de cliquer sur la date de l'entrée de la note encadrée en rouge sur la capture ci-dessous :

matiere-change-encadr.png

Celle-ci nous amène à un formulaire de modification.

## Horaire

En cliquant sur la case "Horaire" de la page d'acceuil on peut retrouver son emploi-du-temps généré automatiquement à partir des modules auxquels on s'est abonné.

## Bulletin

En cliquant sur la case "Bulletin" dans la barre de naviguation, nous sommes amenés sur la génération automatique d'un bulletin, assemblant les modules et matières que nous poursuivons ainsi qu'une vue d'ensemble de toutes nos notes ainsi que leurs moyennes.

# Documentation secrétaire

Afin de pouvoir créer modifier et supprimer des matières et modules (auxquels les étudiants peuvent s'inscrire), il faut un compte nommé "Secrétaire" ou "administrateur". Ce compte a des droits élevés et peut ainsi créer des nouveau modules en sélectionnant les menus prévus à cet effet. Le bouton "Modules" amène sur une vue d'ensemble de ces modules. Ainsi sur la page d'acceuil, on peut soit aller sur les modules, soit aller sur les cours (les matières des modules) ou encore les leçons, désignant les matières et leurs horaires (localisation, salle, heure, prof) en fonction de la classe.

En voici une capture :

acceuil-admin.png

Il faut savoir que dans chaque catégorie d'objets, on peut appliquer les opérations suivantes :

- ajout
- suppression
- modification

Ceci compte pour les modules, les cours et les leçons. Mais ces actions ne sont que visibles (et accessibles) si le compte connecté à l'application est un compte "Secrétaire" ou "Administrateur".
