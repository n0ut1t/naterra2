# Naterra2 🚀

Joc educatiu amb Laravel sobre la navegació espacial, nivells i quizzes interactius.

## Requisits

- **PHP 8.1+** amb extensions:
  - `pdo_pgsql` i `pgsql` (driver PostgreSQL per Supabase)
- **Composer**
- **Node.js & npm**
- **Laragon** (recomanat) o servidor web equivalent

### ⚠️ Configuració Driver PostgreSQL

El projecte utilitza **Supabase** (PostgreSQL). Has d'habilitar les extensions:

1. Obre el teu `php.ini`
2. Descomenta o afegeix:
   ```ini
   extension=pdo_pgsql
   extension=pgsql
   ```
3. Reinicia el servidor web

**Verificar:**
```bash
php -m | grep pgsql
```

---

## 🔧 Instal·lació (Primer cop)

```bash
# 1. Clonar repositori
git clone https://github.com/[usuario]/naterra2.git
cd naterra2

# 2. Copiar configuració
cp .env.example .env
# Editar .env amb credencials de Supabase

# 3. Instal·lar dependències
composer install


# 5. Executar migracions
php artisan migrate

# 6. Crear enllaç d'emmagatzematge (IMPORTANT per fotos de perfil!)
php artisan storage:link


---

## 🔄 Després de fer Pull (Actualitzacions)

Quan facis `git pull` i hi hagi canvis, executa:

```bash
# Actualitzar dependències PHP (si hi ha canvis a composer.json)
composer install

# Executar noves migracions (si n'hi ha)
php artisan migrate

# Netejar cache (recomanat)
php artisan config:clear
php artisan cache:clear
```

### Comandes freqüents

| Comanda | Descripció |
|---------|------------|
| `php artisan migrate` | Executar migracions pendents |
| `php artisan migrate:fresh` | Esborrar i recrear totes les taules |
| `php artisan storage:link` | Crear enllaç simbòlic per fitxers públics |
| `php artisan cache:clear` | Netejar cache |

---

## 📁 Estructura del Projecte

```
naterra2/
├── app/
│   ├── Http/Controllers/    # Controladors (PreguntaController, RankingController, etc.)
│   └── Models/              # Models (User.php)
├── database/
│   └── migrations/          # Migracions de base de dades
├── public/
│   ├── img/                 # Imatges estàtiques
│   ├── static/              # CSS i JS
│   └── storage/             # Enllaç simbòlic a storage/app/public
├── resources/
│   └── views/               # Vistes Blade
│       ├── perfil.blade.php
│       ├── ranking.blade.php
│       ├── juego.blade.php
│       └── ...
├── routes/
│   └── web.php              # Definició de rutes
└── storage/
    └── app/public/avatars/  # Fotos de perfil dels usuaris
```

---

## 🎮 Funcionalitats

- **Autenticació**: Login i registre d'usuaris
- **Mapa interactiu**: Navegació per nivells
- **Sistema de preguntes**: Quizzes amb puntuació
- **Ranking**: Classificació global amb avatars
- **Perfil d'usuari**: Foto de perfil personalitzable
- **Sistema de punts**: Guarda puntuació automàticament

---

## 🖼️ Fotos de Perfil

Les fotos de perfil es guarden a `storage/app/public/avatars/` i es mostren:
- A la pàgina de perfil (`/perfil`)
- Al ranking (`/ranking`) - Top 3 amb avatars
- A les preguntes del joc - Barra lateral

**Important**: Cal executar `php artisan storage:link` perquè les fotos es puguin veure!

---

## 🗄️ Base de Dades

**Taula `users`:**
| Camp | Tipus | Descripció |
|------|-------|------------|
| id | int | ID únic |
| name | varchar | Nom d'usuari |
| email | varchar | Correu electrònic |
| password | varchar | Contrasenya (hash) |
| puntuacion | int | Punts acumulats |
| icono_perfil | text | Ruta a la foto de perfil |
| created_at | timestamp | Data de creació |
| updated_at | timestamp | Última actualització |

---

## 📝 Llicència

Laravel és programari de codi obert amb llicència [MIT](https://opensource.org/licenses/MIT).

