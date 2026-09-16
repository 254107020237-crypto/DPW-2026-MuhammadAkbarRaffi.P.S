## Wireframe Sistem Manajemen Tugas & Proyek (SIMPUS-Mini)

### 1. Login

## Tampilan

```
+--------------------------------+
|          SIMPRO-Mini           |
|                                |
| Alamat Email                   |
| [________________________]     |
|                                |
| Kata Sandi                     |
| [________________________]     |
|                                |
|          [ MASUK ]             |
+--------------------------------+
```

## Alur

1. Pengguna memasukkan alamat email dan kata sandi.

2. Pengguna menekan tombol Masuk.

3. Sistem memverifikasi kredensial akun.

4. Jika valid, pengguna diarahkan ke Dasbor Utama.

## Tampilan

```
+------------------------------------------------+
| SIMPRO-Mini                     Dashboard Logout|
+------------------------------------------------+
| Dasbor Pengguna                                |
|                                                |
| [ Total Proyek ]  [ Proyek Aktif ]             |
| [ Tugas Selesai]  [ Tenggat Dekat ]            |
|                                                |
| Menu: Tambah Tugas | Daftar Proyek | Laporan   |
+------------------------------------------------+
```

## Alur

1. Pengguna masuk ke halaman dasbor.

2. Sistem menyajikan indikator ringkasan statistik tugas.

3. Pengguna memilih menu navigasi yang diinginkan.

### 3. Tambah Tugas Baru

## Tampilan

```
+----------------------------------------+
|            Form Tugas Baru             |
+----------------------------------------+
| Nama Proyek                            |
| [ Pilih Proyek ▼ ]                     |
|                                        |
| Judul Tugas                            |
| [________________________]             |
|                                        |
| Tenggat Waktu                          |
| [  DD/MM/YYYY  ]                       |
|                                        |
|                [ SIMPAN ]              |
+----------------------------------------+
```

## Alur

1. Pengguna memilih kategori proyek.

2. Pengguna mengisi rincian judul tugas.

3. Pengguna menentukan tanggal batas waktu penuntasan.

4. Pengguna menekan tombol Simpan.

5. Sistem menyimpan entri data tugas baru ke basis data.

### 4. Pembaruan Status Tugas

## Tampilan

```
+----------------------------------------+
|          Pembaruan Status Tugas        |
+----------------------------------------+
| Kode / ID Tugas                        |
| [________________________]             |
|                                        |
| Detail Tugas                           |
| Judul   : -                            |
| Proyek  : -                            |
|                                        |
| Status Baru                            |
| [ Pilih Status ▼ ]                     |
|                                        |
|               [ PERBARUI ]             |
+----------------------------------------+
```

## Alur

1. Pengguna menginput kode transaksi atau ID tugas.

2. Sistem menampilkan ringkasan rincian tugas terkait.

3. Pengguna mengubah status pekerjaan (misal: Selesai).

4. Pengguna menekan tombol Perbarui.

5. Sistem memperbarui status progress tugas.

### 5. Laporan Tugas

## Tampilan

```
+------------------------------------------------------+
|                  Laporan Rekap Tugas                 |
+------------------------------------------------------+
| No | Judul Tugas | Proyek | Tenggat  | Status        |
|----|-------------|--------|----------|---------------|
| 1  | Desain UI   | Web A  | 10/09/26 | Selesai       |
| 2  | Setup DB    | Web A  | 18/09/26 | Dalam Proses  |
+------------------------------------------------------+
```

## Alur

1. Pengguna membuka halaman Laporan Tugas.

2. Sistem memuat seluruh daftar tugas beserta statusnya.

3. Pengguna dapat meninjau pencapaian progress setiap tugas.

### Kesimpulan

Wireframe ini digunakan sebagai acuan visual awal dan alur navigasi aplikasi SIMPRO-Mini sebelum seluruh tampilan dan fungsi dikembangkan ke dalam kode HTML, CSS, dan JavaScript.