###Installer Mysql:

https://dev.mysql.com/downloads/file/?id=499589

Choisir server only

sélectionner mysql server + execute

Laisser tout les params' par défaut 
Choisir comme mot de passe toortoor


- Click droit «Ce PC»

- Propriétés

- Paramètres système avance 

- En bas variables d’environnement, 
- Selectionner path dans les variables systèmes
- Puis cliquer sur modifier 
- "Nouveau"
- Et coller l’url : `C:\Program Files\MySQL\MySQL Server 8.0\bin`



- Redémarrer
- Puis ouvrir PHPStorm ou terminal de VS CODE
- Taper la commande mysql -v 
- Si une erreur de type "Access denied" c’est bon 
- aller dans le dossier puis clic droit « Git Bash Here »
- lancer le serveur interne de PHP : php -S 127.0.0.1:8080 -t public
- aller sur l’adresse


Projet :
une base de données avec un administrateur qui peut modifier et un utilisateur qui peut seulement consulter et téléchager en PDF
dans uplaud : images téléchargées par l'utilisateur
viewx : les vues (en html uniquement si possible, peut-être un peu de php)
vendor : jamais sur github car trop lourd - utiliser composer install

git bash puis cd explorer puis composer install

pour le serveur : php -S 127.0.0.1:8000 -t public