# Program Penghitung Diskon

## Deskripsi
Program Penghitung Diskon merupakan aplikasi sederhana berbasis web yang dibuat menggunakan PHP, HTML, dan CSS. Program ini digunakan untuk menghitung potongan harga berdasarkan total belanja pelanggan.

Pengguna dapat memasukkan total belanja melalui form yang tersedia. Selanjutnya, program akan menghitung diskon dan menampilkan jumlah pembayaran setelah diskon.

## Ketentuan Diskon
Program memiliki tiga ketentuan diskon, yaitu:

1. Total belanja lebih dari atau sama dengan Rp100.000 mendapatkan diskon sebesar 10%.
2. Total belanja lebih dari atau sama dengan Rp50.000 dan kurang dari Rp100.000 mendapatkan diskon sebesar 5%.
3. Total belanja kurang dari Rp50.000 tidak mendapatkan diskon.

## Teknologi yang Digunakan
- PHP
- HTML
- CSS

## Fitur Program
- Input total belanja melalui form.
- Menghitung diskon secara otomatis.
- Menentukan persentase diskon berdasarkan total belanja.
- Menghitung total pembayaran setelah diskon.
- Menampilkan hasil perhitungan dalam format Rupiah.
- Menampilkan ketentuan diskon.
- Tampilan sederhana dan responsif.

## Cara Menjalankan Program

1. Pastikan PHP sudah terinstal di komputer.
2. Buka folder project menggunakan Visual Studio Code.
3. Buka terminal pada folder project.
4. Jalankan perintah berikut:

```bash
php -S localhost:8000
```

5. Buka browser dan masukkan alamat berikut:

```text
http://localhost:8000/diskon.php
```

6. Masukkan total belanja pada form yang tersedia.
7. Klik tombol **Hitung Diskon** untuk melihat hasil perhitungan.

## Contoh Hasil Perhitungan

Dengan total belanja sebesar Rp120.000, diperoleh hasil sebagai berikut:

| Keterangan | Jumlah |
|---|---:|
| Total Belanja | Rp120.000 |
| Diskon (10%) | Rp12.000 |
| Total Pembayaran | Rp108.000 |

## Konsep Pemrograman yang Digunakan
- Function (Fungsi)
- Parameter dan Argumen
- Percabangan `if-elseif`
- `return`
- Variabel
- Operasi Aritmatika
- Form HTML
- PHP `$_POST`
- CSS untuk pengaturan tampilan

## Tujuan Pembelajaran
Program ini dibuat untuk memahami penerapan fungsi dalam PHP, khususnya penggunaan parameter, percabangan, dan nilai kembali (`return`) dalam proses perhitungan diskon.

---

**Bahasa Pemrograman:** PHP  
**Mata Kuliah:** Pengembangan Aplikasi Berbasis Web