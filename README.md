# 🛒 Symfony Shop Management System

> **Projet E-commerce développé avec Symfony**

---

# 📚 Sommaire

1. Présentation du projet
2. Objectifs
3. Technologies utilisées
4. Développement des interfaces
5. Gestion des données dynamiques
6. Système de panier
7. Authentification & sécurité
8. Structure du projet
9. Fonctionnalités implémentées
10. Installation du projet
11. Vérifications & tests
12. Résumé final

---

# 📖 Présentation du projet

Cette application est une plateforme e-commerce réalisée avec le framework Symfony.

Le projet a été conçu afin de développer une boutique en ligne moderne permettant :

- La gestion des produits
- La navigation par catégories
- L’ajout d’articles dans un panier
- L’authentification des utilisateurs
- L’accès à un espace personnel sécurisé

L’objectif principal est de mettre en pratique les concepts fondamentaux de Symfony tout en respectant une architecture propre et maintenable.

---

# 🎯 Objectifs

- Concevoir une application web avec Symfony
- Utiliser une architecture MVC claire
- Manipuler les données avec Doctrine ORM
- Créer un système de panier basé sur les sessions
- Implémenter un système d’authentification sécurisé
- Organiser le projet avec services et interfaces

---

# 🛠️ Technologies utilisées

| Outil | Utilisation |
|---|---|
| Symfony | Framework backend |
| PHP | Développement serveur |
| Doctrine ORM | Gestion des données |
| MySQL | Système de base de données |
| Twig | Génération des vues |
| Bootstrap | Design responsive |
| Font Awesome | Icônes |
| Composer | Gestion des packages |

---

# 🖥️ Développement des interfaces

Les différentes pages intégrées dans l’application :

| Interface | Description |
|---|---|
| Home | Accueil du site |
| Login | Authentification utilisateur |
| Register | Création de compte |
| Profile | Espace utilisateur |
| Categories | Liste des catégories |
| Products | Catalogue des produits |
| Product Details | Informations détaillées |
| Cart | Panier d’achat |

Les vues Twig sont organisées dans :

```bash
templates/
```

Le template principal :

```bash
base.html.twig
```

contient :

- Barre de navigation
- Footer
- Messages flash
- Layout global du site

---

# ⚙️ Gestion des données dynamiques

Les données sont récupérées dynamiquement depuis MySQL grâce à Doctrine ORM.

## Entity : Category

Cette entité représente les catégories de produits :

- id
- title
- description
- relation OneToMany avec Product

---

## Entity : Product

Cette entité représente les articles disponibles :

- id
- name
- description
- price
- quantity
- category

---

# 🌐 Routes principales

| URL | Fonction |
|---|---|
| /categories | Affichage des catégories |
| /products | Catalogue complet |
| /category/{id} | Produits filtrés |
| /product/{id} | Détails du produit |

Le projet utilise également des fixtures pour générer automatiquement des données de démonstration.

---

# 🛒 Système de panier

Le panier fonctionne avec la session Symfony sans stockage direct en base de données.

## Architecture

```bash
Cart/
├── CartInterface
├── SessionCartService
├── ExternalApiCart
└── CartManager
```

---

# 📌 Description des composants

## CartInterface

Définit les méthodes essentielles :

- add()
- remove()
- clear()
- getItems()

---

## SessionCartService

Service principal permettant de gérer les produits dans la session utilisateur.

---

## ExternalApiCart

Version alternative simulant une API externe de panier.

---

## CartManager

Classe responsable de la communication entre les contrôleurs et les services du panier.

---

# ✅ Fonctionnalités du panier

- Ajout d’articles
- Gestion des quantités
- Calcul automatique du total
- Suppression des produits
- Réinitialisation complète du panier

---

# 🔐 Authentification & Sécurité

## Entité User

| Attribut | Type |
|---|---|
| email | string |
| password | string |
| firstName | string |
| lastName | string |
| roles | array |
| enabled | boolean |

---

# 📝 Création de compte

Le formulaire d’inscription utilise :

- EmailType
- TextType
- PasswordType
- RepeatedType

Les mots de passe sont hashés automatiquement avant stockage.

---

# 🔑 Connexion utilisateur

Le système d’authentification repose sur :

```yaml
form_login
```

Fonctionnalités disponibles :

- Connexion sécurisée
- Déconnexion
- Redirection automatique après login

---

# 🔒 Protection des pages

Certaines routes sont accessibles uniquement après authentification :

```bash
/profile
```

La navbar change dynamiquement selon l’état de connexion de l’utilisateur.

---

# 📁 Structure du projet

```bash
📦 ecommerce-project/
├── 📂 src/
│   ├── 📂 Cart/
│   ├── 📂 Controller/
│   ├── 📂 Entity/
│   ├── 📂 Form/
│   ├── 📂 Repository/
│   ├── 📂 Service/
│   └── 📂 DataFixtures/
│
├── 📂 templates/
├── 📂 migrations/
├── 📂 config/
├── 📂 public/
└── 📄 .env
```

---

# ✅ Fonctionnalités implémentées

- [x] Catalogue dynamique
- [x] Gestion des catégories
- [x] Détails des produits
- [x] Panier avec session
- [x] Gestion des quantités
- [x] Authentification sécurisée
- [x] Création de compte
- [x] Déconnexion utilisateur
- [x] Espace profil protégé
- [x] Interface responsive

---

# 🚀 Installation du projet

## 📌 Prérequis

- PHP 8+
- Composer
- Symfony CLI
- MySQL

---

# 📥 Clonage du projet

```bash
git clone https://github.com/votre-compte/symfony-shop.git
cd symfony-shop
```

---

# 📦 Installation des dépendances

```bash
composer install
```

---

# ⚙️ Configuration de la base de données

Modifier le fichier :

```bash
.env
```

Ajouter :

```env
DATABASE_URL="mysql://root:password@127.0.0.1:3306/shop_db?serverVersion=8.0&charset=utf8mb4"
```

---

# 🗄️ Initialisation de la base

## Création de la base

```bash
php bin/console doctrine:database:create
```

## Exécution des migrations

```bash
php bin/console doctrine:migrations:migrate
```

## Chargement des fixtures

```bash
php bin/console doctrine:fixtures:load
```

---

# ▶️ Exécution du projet

```bash
symfony serve
```

Le projet sera disponible sur :

```bash
http://127.0.0.1:8000
```

---

# 🧪 Vérifications & tests

## Vérifications manuelles

- Navigation sur les pages
- Test du panier
- Création de compte
- Connexion utilisateur
- Protection des routes privées

---

# 🔍 Commandes utiles

```bash
php bin/console cache:clear
php bin/console debug:router
php bin/console lint:twig templates
php bin/console lint:yaml config
php bin/console lint:container
```

---

# 📝 Résumé final

Ce projet a permis de développer une plateforme e-commerce complète avec Symfony tout en appliquant les bonnes pratiques du framework.

Les notions principales exploitées :

- Architecture MVC
- Doctrine ORM
- Templates Twig
- Sécurité Symfony
- Gestion des sessions
- Services & Injection de dépendances
- Gestion des formulaires

L’application reste facilement maintenable et peut évoluer vers des fonctionnalités plus avancées comme le paiement en ligne ou la gestion des commandes.

---

<div align="center">
  <sub>Développé par <strong>CHARAF AZIZI</strong> — 2026</sub>
</div>
