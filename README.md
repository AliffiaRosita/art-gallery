# Nama aplikasi ita
----

## pengantar
Aplikasi art work merupakan sebuah aplikasi yang dapat digunakan untuk menyimpan hasil karyanya

- [Pengantar](#pengantar)
- [Fitur - fitur](#fitur-fitur)
- [Desain Database](#desain-database)
- [Pratinjau](#pratinjau)
- [Dependency](#dependency)
- [Instalasi](#instalasi)

## Fitur - fitur

- Autentikasi
- Manajemen art work
- Dokumentasi API

## Desain Database
![](https://pandao.github.io/editor.md/examples/images/4.jpg)

## Pratinjau
![](https://pandao.github.io/editor.md/examples/images/4.jpg)

## Dependency

Dillinger is currently extended with the following plugins.
Instructions on how to use them in your own application are linked below.

| Plugin | README |
| ------ | ------ |
| Dropbox | [plugins/dropbox/README.md][PlDb] |
| GitHub | [plugins/github/README.md][PlGh] |
| Google Drive | [plugins/googledrive/README.md][PlGd] |
| OneDrive | [plugins/onedrive/README.md][PlOd] |
| Medium | [plugins/medium/README.md][PlMe] |
| Google Analytics | [plugins/googleanalytics/README.md][PlGa] |

## Instalasi

```bash
# clone the project
git clone https://github.com/AliffiaRosita/art-gallery.git
# enter the project directory
cd art-gallery
# install dependency
composer update
# config
cp .env.example .env
php artisan key:generate
php artisan migrate
#run
php artisan serve
```

## License

MIT