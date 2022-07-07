# Art Gallery
----

## Pengantar
website art gallery merupakan sebuah website yang dapat digunakan untuk menyimpan hasil karya seni yang ingin dipamerkan kepada masyarakat umum.

- [Pengantar](#pengantar)
- [Fitur - fitur](#fitur-fitur)
- [Desain Database](#desain-database)
- [Pratinjau](#pratinjau)
- [Dependency](#dependency)
- [Instalasi](#instalasi)

## Fitur - fitur

website art gallery memiliki fitur utama yaitu
- authentikasi 
- mengelola data user
- mengelola data karya seni

## Dokumentasi API
beberapa data artwork dapat dilihat menggunakan endpoint.
Gunakan url localhost:8000/api/ untuk mendapatkan data yang telah disediakan.

| Fitur | endpoint | Params |
| ------ | ------ |  ----- |
| Get all artwork with user upload | [/artwork] | |
| Search by title of artwork | [/artwork/search] | title |
| Detail artwork by user | [/artwork/detail] | user_id |

## Desain Database
database dari website ini terdiri dari 2 tabel yaitu user yang memiliki atribut id sebagai primary key, nama, foto profil, email dan password untuk melakukan login.
Kedua adalah tabel artwork yang berisi karya seni dari user, tabel user memiliki relasi one to many terhadap tabel artwork dimana user_id pada tabel artwork sebagai foreign key.
![](https://i.imgur.com/n2a9uLg.png)

## Pratinjau

![](https://i.imgur.com/vEwD3yq.png)
![](https://i.imgur.com/BGLToMk.png)
![](https://i.imgur.com/0TNKSdM.png)
![](https://i.imgur.com/sg7h0sT.png)

## Dependency

Dillinger is currently extended with the following plugins.
Instructions on how to use them in your own application are linked below.

| Plugin | version |
| ------ | ------ |
| php | ^7.3/^8.0 |
| fruitcake/laravel-cors | ^2.0 |
| guzzlehttp/guzzle | ^7.0.1 |
| laravel/framework | ^8.75 |
| laravel/passport | ^10.4 |
| laravel/sanctum | ^2.11 |
| laravel/tinker | ^2.5 |

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
