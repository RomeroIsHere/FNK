# FNK: Finders, not Keeper

FNK es un  Protoipo de Sitio web donde las personas pueden Dar un Reporte de Objetos Perdidos de Bajo valor, como chamarras, botellas de agua, thermos, etc.

En Este Sitio Puedes Registrar Objetos que Hayas Encontrados, asi como objetos que estes Buscando, Con Descripción y Nombre del Objeto

## Instalación Local

```bash
git clone <URL>
composer install
mv .env.example .env
php artisan key:generate
vim .env # Configura tu Ambiente Local de Desarollo
```

## Instalación Por contenedores(Docker)

TODO: finish all the Stuff i need to Make docker compose work, as current YAML does not work with Laravel