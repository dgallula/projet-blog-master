## Objectif 

Créer un blog avec un système de catégorie

- Page listing d'article (pagination)
- Page listing article pour une catégorie (pagination)
- Page présentation d'un article
- Administration des catégories
- Administration des articles

## Upload d'images

x Ajouter un champs sur le formulaire
x Valider le fichier envoyé par l'utilisateur
x Sauvegarder le fichier sur le serveur
x Gérer la suppression du fichier (quand l'article est supprimé)

## pour ouvrir le projet 

sur le terminal 
composer update
php -S localhost:8000 -t  public
la connection à mysql se trouve dans le dossier src/connection.php

## pour la mise a jour sur github


git add .     
git commit -m "update"       
git remote add origin https://github.com/dgallula/projet-blog-master.git
git branch -M master  
git push -u origin master
