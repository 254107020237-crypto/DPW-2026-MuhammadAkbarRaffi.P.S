|  | Desain dan Pemrograman Web |
|--|--|
| NIM | 254107020237 |
| Nama | Muhammad Akbar Raffi Putra Susanto |
| Kelas | TI - 2F |
| Jobsheet | Jobsheet 08 |

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
|   └── koneksi.php
|── sql/
|   ├── 01_buku_anggota.sql
└── index.php
```  

## Ringkasan
 
 - Pada Jobsheet 8 ini saya memigrasikan penyimpanan data dari session ke database PostgreSQL berbasis PDO. Seluruh proses penambahan (INSERT), penampil data (list.php), dan statistik ringkasan pada index.php kini dijalankan secara real-time langsung dari database melalui query SQL.