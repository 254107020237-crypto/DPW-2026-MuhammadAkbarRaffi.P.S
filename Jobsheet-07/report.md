|  | Desain dan Pemrograman Web |
|--|--|
| NIM | 254107020237 |
| Nama | Muhammad Akbar Raffi Putra Susanto |
| Kelas | TI - 2F |
| Jobsheet | Jobsheet 07 |

## Stuktur file

``` text
Jobsheet-07/
├── anggota/
│   ├── list.php
│   └── proses_tambah.php
|   └── tambah.php
|── assets/
|   |── css/
|        |── style.css
|   |── js/
|        |── app.js
├── Buku/
│   ├── list.php
│   └── tambah_tambah.php
|   └── tambah.php
├── includes/
|   ├── footer.php
|   └── header.php
└── index.php
```  

## Ringkasan
 
 - Pada Jobsheet-07, saya melakukan pembaruan ini memigrasikan sistem menjadi server-side sepenuhnya dengan mengubah HTML ke PHP dan memisahkan kerangka layout (header/footer) agar lebih rapi. Form kini berfungsi nyata untuk memvalidasi dan menyimpan data ke $_SESSION dengan tambahan fitur flash message. Karena PHP kini langsung merender data dari session, pendekatan Javascript/JSON dari jobsheet sebelumnya resmi ditinggalkan dan file terkait telah dihapus.