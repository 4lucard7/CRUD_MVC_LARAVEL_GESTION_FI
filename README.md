# 📚 Mini Projet CRUD Laravel - Gestion des Formations et Inscriptions

## 📋 Description

Application web de gestion des formations et inscriptions développée avec Laravel. Ce projet implémente un système CRUD complet permettant de gérer des formations professionnelles et les inscriptions des étudiants.

## 🎯 Fonctionnalités

### ✅ Gestion des Formations
- Créer, consulter, modifier et supprimer des formations
- Affichage détaillé des informations de chaque formation
- Liste des étudiants inscrits par formation
- Statistiques (nombre d'inscrits, durée totale, etc.)

### ✅ Gestion des Inscriptions
- Créer, consulter, modifier et supprimer des inscriptions
- Association d'étudiants aux formations
- Suivi des dates d'inscription
- Affichage des détails complets (étudiant + formation)

### ✅ Page d'Accueil
- Vue d'ensemble des statistiques
- Accès rapide aux fonctionnalités principales
- Interface intuitive et responsive

## 🗄️ Structure de la Base de Données

### Table `formations`
| Colonne | Type | Description |
|---------|------|-------------|
| id | BIGINT | Clé primaire |
| titre | VARCHAR(150) | Titre de la formation |
| description | TEXT | Description détaillée |
| duree | INTEGER | Durée en heures |
| prix | DECIMAL(10,2) | Prix en MAD |
| timestamps | TIMESTAMP | created_at, updated_at |

### Table `inscriptions`
| Colonne | Type | Description |
|---------|------|-------------|
| id | BIGINT | Clé primaire |
| etudiant | VARCHAR(100) | Nom de l'étudiant |
| formation_id | BIGINT | Clé étrangère → formations.id |
| date_inscription | DATE | Date d'inscription |
| timestamps | TIMESTAMP | created_at, updated_at |

### Relations
- **Formation** `hasMany` **Inscription** (Une formation a plusieurs inscriptions)
- **Inscription** `belongsTo` **Formation** (Une inscription appartient à une formation)

## 🛠️ Technologies Utilisées

- **Framework**: Laravel 10.x
- **PHP**: 8.1+
- **Base de données**: MySQL 8.0
- **Frontend**: Bootstrap 5.3 + Font Awesome 6.4
- **Architecture**: MVC (Model-View-Controller)

## 📦 Installation

### Prérequis
- PHP >= 8.1
- Composer
- MySQL >= 8.0
- Node.js et NPM (optionnel)

### Étapes d'installation

1. **Cloner le projet**
```bash
git clone <votre-repository>
cd mini-projet-crud
```

2. **Installer les dépendances**
```bash
composer install
```

3. **Configurer l'environnement**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Configurer la base de données**

Éditez le fichier `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gestion_formations
DB_USERNAME=root
DB_PASSWORD=votre_mot_de_passe
```

5. **Créer la base de données**
```sql
CREATE DATABASE gestion_formations CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

6. **Exécuter les migrations**
```bash
php artisan migrate
```

7. **Ajouter des données de test (optionnel)**
```bash
php artisan db:seed
```

8. **Lancer le serveur**
```bash
php artisan serve
```

9. **Accéder à l'application**

Ouvrez votre navigateur: `http://localhost:8000`

## 📂 Structure du Projet

```
mini-projet-crud/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── FormationController.php
│   │       └── InscriptionController.php
│   └── Models/
│       ├── Formation.php
│       └── Inscription.php
├── database/
│   ├── migrations/
│   │   ├── xxxx_create_formations_table.php
│   │   └── xxxx_create_inscriptions_table.php
│   └── seeders/
│       └── DatabaseSeeder.php
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php
│       ├── formations/
│       │   ├── index.blade.php
│       │   ├── create.blade.php
│       │   ├── edit.blade.php
│       │   └── show.blade.php
│       ├── inscriptions/
│       │   ├── index.blade.php
│       │   ├── create.blade.php
│       │   ├── edit.blade.php
│       │   └── show.blade.php
│       └── welcome.blade.php
└── routes/
    └── web.php
```

## 🚀 Utilisation

### Gestion des Formations

#### Lister les formations
```
GET /formations
```

#### Créer une formation
```
GET /formations/create
POST /formations
```

#### Afficher une formation
```
GET /formations/{id}
```

#### Modifier une formation
```
GET /formations/{id}/edit
PUT /formations/{id}
```

#### Supprimer une formation
```
DELETE /formations/{id}
```

### Gestion des Inscriptions

#### Lister les inscriptions
```
GET /inscriptions
```

#### Créer une inscription
```
GET /inscriptions/create
POST /inscriptions
```

#### Afficher une inscription
```
GET /inscriptions/{id}
```

#### Modifier une inscription
```
GET /inscriptions/{id}/edit
PUT /inscriptions/{id}
```

#### Supprimer une inscription
```
DELETE /inscriptions/{id}
```

## 🔧 Commandes Artisan Utiles

### Migrations
```bash
# Exécuter les migrations
php artisan migrate

# Réinitialiser et re-migrer
php artisan migrate:fresh

# Réinitialiser et ajouter des données de test
php artisan migrate:fresh --seed
```

### Base de données
```bash
# Accéder à Tinker (console interactive)
php artisan tinker

# Exemples dans Tinker:
>>> Formation::count()
>>> Inscription::with('formation')->get()
>>> Formation::find(1)->inscriptions
```

### Cache
```bash
# Vider le cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear
```

### Routes
```bash
# Lister toutes les routes
php artisan route:list

# Filtrer par nom
php artisan route:list --name=formations
```

## 📝 Modèles Eloquent

### Formation
```php
// Récupérer toutes les formations
$formations = Formation::all();

// Récupérer avec les inscriptions
$formations = Formation::with('inscriptions')->get();

// Compter les inscriptions
$formations = Formation::withCount('inscriptions')->get();

// Créer une formation
Formation::create([
    'titre' => 'Laravel Avancé',
    'description' => 'Formation complète sur Laravel',
    'duree' => 40,
    'prix' => 2500.00
]);
```

### Inscription
```php
// Récupérer avec la formation
$inscriptions = Inscription::with('formation')->get();

// Créer une inscription
Inscription::create([
    'etudiant' => 'Ahmed Bennani',
    'formation_id' => 1,
    'date_inscription' => now()
]);

// Récupérer la formation d'une inscription
$inscription = Inscription::find(1);
$formation = $inscription->formation;
```

## 🎨 Personnalisation

### Modifier les couleurs

Éditez `resources/views/layouts/app.blade.php`:

```css
.navbar {
    background-color: #2c3e50 !important; /* Changez cette couleur */
}
```

### Ajouter des champs

1. Créer une migration:
```bash
php artisan make:migration add_email_to_inscriptions_table
```

2. Définir les changements:
```php
Schema::table('inscriptions', function (Blueprint $table) {
    $table->string('email')->after('etudiant');
});
```

3. Exécuter la migration:
```bash
php artisan migrate
```

4. Mettre à jour le modèle:
```php
protected $fillable = ['etudiant', 'email', 'formation_id', 'date_inscription'];
```

## 🐛 Dépannage

### Erreur: "Class not found"
```bash
composer dump-autoload
```

### Erreur: "SQLSTATE[HY000] [1045]"
Vérifiez vos identifiants de base de données dans `.env`

### Erreur: "View not found"
```bash
php artisan view:clear
```

### Erreur: "Route not found"
```bash
php artisan route:clear
php artisan route:list
```

### Erreur de clé étrangère
```bash
# Réinitialiser complètement
php artisan migrate:fresh
```

## 📊 Tests

### Tester avec Tinker
```bash
php artisan tinker
```

```php
// Créer une formation
$formation = Formation::create([
    'titre' => 'Test Formation',
    'description' => 'Formation de test',
    'duree' => 20,
    'prix' => 1000
]);

// Créer une inscription
$inscription = Inscription::create([
    'etudiant' => 'Test Étudiant',
    'formation_id' => $formation->id,
    'date_inscription' => now()
]);

// Vérifier les relations
$formation->inscriptions; // Devrait afficher l'inscription
$inscription->formation; // Devrait afficher la formation
```

## 📚 Documentation Laravel

- [Documentation Officielle](https://laravel.com/docs)
- [Eloquent ORM](https://laravel.com/docs/eloquent)
- [Migrations](https://laravel.com/docs/migrations)
- [Blade Templates](https://laravel.com/docs/blade)
- [Validation](https://laravel.com/docs/validation)

## 👨‍💻 Développement

### Créer un nouveau contrôleur
```bash
php artisan make:controller NomController --resource
```

### Créer un nouveau modèle avec migration
```bash
php artisan make:model NomModele -m
```

### Créer un seeder
```bash
php artisan make:seeder NomTableSeeder
```

## 🔒 Sécurité

- ✅ Protection CSRF sur tous les formulaires
- ✅ Validation des données côté serveur
- ✅ Utilisation de requêtes préparées (Eloquent)
- ✅ Échappement automatique des données (Blade)
- ✅ Protection contre les injections SQL

## 📈 Améliorations Futures

- [ ] Authentification des utilisateurs
- [ ] Système de rôles (admin, étudiant)
- [ ] Tableau de bord avec graphiques
- [ ] Export PDF des inscriptions
- [ ] Notifications par email
- [ ] API RESTful
- [ ] Tests unitaires et fonctionnels
- [ ] Pagination avancée avec recherche
- [ ] Upload de documents (certificats, etc.)

## 👥 Contribution

Les contributions sont les bienvenues ! Pour contribuer :

1. Fork le projet
2. Créez une branche (`git checkout -b feature/AmazingFeature`)
3. Commit vos changements (`git commit -m 'Add AmazingFeature'`)
4. Push vers la branche (`git push origin feature/AmazingFeature`)
5. Ouvrez une Pull Request



## 📞 Contact

- **Projet**: Mini Projet CRUD Laravel
- **Institution**: Direction Régionale Casablanca Settat
- **Email**: moahemdmaftouh0@gmail.ma

## 🙏 Remerciements

- Laravel Framework
- Bootstrap Framework
- Font Awesome Icons
- Communauté Laravel Maroc

---

**Développé avec ❤️ pour l'apprentissage de Laravel**

**Date**: Février 2026