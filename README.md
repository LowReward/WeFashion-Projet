<p align="center"><a href="#" target="_blank"><img src="https://seeklogo.com/images/W/WE_Fashion-logo-AE6F8295EF-seeklogo.com.png" width="400" alt="Wefashion logo"></a></p>
<p align="center">We Fashion vend des vêtements homme et femme de créateurs.
Dans le futur, cette plateforme a pour but d’être multicanal : boutique en ligne ou en VR, sur 
mobile, via un agent conversationnel.</p>


## Guide d'installation

- Faire un clone du repository sur la machine en local : `git clone https://github.com/LowReward/WeFashion-Projet.git`
- Faire une copie de `.exemple.env` et renommer le fichier en `.env`
- Créer une nouvelle base de données sous le nom de wefashion et y ajouter les informations dans le fichier .env
- saisir : `composer install`
- `npm install && npm run dev`
- `php artisan key:generate`
- `php artisan migrate`
- `php artisan db:seed`
- lancer `php artisan serve` pour ensuite consulter le projet à l'adresse indiqué

## Utilisateur admin :
- Vous pouvez accéder à la page administrateur directement via /admin

Les identifiants de connexion :
```
Email : edouard@admin.com
Mot de passe : wefashion123
```
