# b-dash_lara_tail

Ce projet est une application web basée sur [Laravel](https://laravel.com/), utilisant [Vite](https://vitejs.dev/) pour le bundling front-end, [Tailwind CSS](https://tailwindcss.com/) pour le style, et [Alpine.js](https://alpinejs.dev/) pour l'interactivité.

## Prérequis

- PHP >= 8.1
- Composer
- Node.js >= 18
- npm

## Installation

1. Clonez le dépôt :
   ```sh
   git clone <url-du-repo>
   cd b-dash_lara_tail
   ```

2. Installez les dépendances PHP :
   ```sh
   composer install
   ```

3. Installez les dépendances JavaScript :
   ```sh
   npm install
   ```

4. Copiez le fichier d'environnement :
   ```sh
   cp .env.example .env
   ```

5. Générez la clé d'application :
   ```sh
   php artisan key:generate
   ```

6. Lancez les migrations :
   ```sh
   php artisan migrate
   ```

## Lancement du projet

- Pour lancer le serveur de développement Laravel :
  ```sh
  php artisan serve
  ```

- Pour lancer le build front-end en mode développement :
  ```sh
  npm run dev
  ```

- Pour générer le build de production :
  ```sh
  npm run build
  ```

## Stack technique

- **Backend** : Laravel 12
- **Frontend** : Vite, Tailwind CSS v4, Alpine.js
- **Autres dépendances** : FullCalendar, ApexCharts, Chart.js, Dropzone, Flatpickr, Swiper, etc.

## Packages JavaScript requis pour le dashboard

- [`@fullcalendar/core`](https://www.npmjs.com/package/@fullcalendar/core) : Gestion de calendrier
- [`@fullcalendar/daygrid`](https://www.npmjs.com/package/@fullcalendar/daygrid) : Vue grille du calendrier
- [`@fullcalendar/interaction`](https://www.npmjs.com/package/@fullcalendar/interaction) : Interactions utilisateur
- [`@fullcalendar/list`](https://www.npmjs.com/package/@fullcalendar/list) : Vue liste du calendrier
- [`@fullcalendar/timegrid`](https://www.npmjs.com/package/@fullcalendar/timegrid) : Vue agenda
- [`apexcharts`](https://www.npmjs.com/package/apexcharts) : Graphiques interactifs
- [`chart.js`](https://www.npmjs.com/package/chart.js) : Graphiques statistiques
- [`dropzone`](https://www.npmjs.com/package/dropzone) : Drag & drop de fichiers
- [`flatpickr`](https://www.npmjs.com/package/flatpickr) : Sélecteur de date
- [`jsvectormap`](https://www.npmjs.com/package/jsvectormap) : Cartes interactives
- [`swiper`](https://www.npmjs.com/package/swiper) : Carrousels

## Packages JavaScript requis pour la gestion de connexion

- [`alpinejs`](https://www.npmjs.com/package/alpinejs) et [`@alpinejs/persist`](https://www.npmjs.com/package/@alpinejs/persist) : Interactivité et persistance côté client
- [`axios`](https://www.npmjs.com/package/axios) : Requêtes HTTP (API, authentification)
- [`@tailwindcss/forms`](https://www.npmjs.com/package/@tailwindcss/forms) : Styles pour les formulaires
- [`@tailwindcss/typography`](https://www.npmjs.com/package/@tailwindcss/typography) : Styles typographiques

## Dépendances de build et outils

- [`vite`](https://www.npmjs.com/package/vite), [`@vitejs/plugin-vue`](https://www.npmjs.com/package/@vitejs/plugin-vue), [`laravel-vite-plugin`](https://www.npmjs.com/package/laravel-vite-plugin)
- [`tailwindcss`](https://www.npmjs.com/package/tailwindcss), [`autoprefixer`](https://www.npmjs.com/package/autoprefixer), [`postcss`](https://www.npmjs.com/package/postcss)
- [`prettier`](https://www.npmjs.com/package/prettier), [`prettier-plugin-tailwindcss`](https://www.npmjs.com/package/prettier-plugin-tailwindcss)
- [`concurrently`](https://www.npmjs.com/package/concurrently) : Exécution parallèle de scripts

## Structure du projet

- `app/` : Code backend Laravel (contrôleurs, modèles, etc.)
- `resources/views/` : Vues Blade
- `resources/css/` : Fichiers CSS (incluant Tailwind)
- `resources/js/` : Fichiers JavaScript (Alpine.js, etc.)
- `routes/` : Fichiers de routes Laravel
- `public/` : Fichiers accessibles publiquement
- `package.json` : Dépendances JS et scripts npm
- `composer.json` : Dépendances PHP

## Scripts utiles

- `npm run dev` : Démarre Vite en mode développement
- `npm run build` : Génère les assets pour la production

## Licence

Ce projet est sous licence MIT.
## WAFFO LELE Rostand
# SGRH_ESCA
