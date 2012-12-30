Alur Aplikasi

Aplikasi ini sama dengan project sebelumnya yaitu SI_KKN, hanya karena kondisi DBnya itu tiap fakultas berbeda sehingga
aplikasi ini harus support multiple database. Dan yang sebelumnya DB KKN ini dijadikan satu dengan DB SIA, saat ini dibuat
DB sendiri yaitu DB KKN.

Mahasiswa
1.Login menggunakan SIA
2.Jika dia sudah Entri KRS,akan ada menu KKN
3.Jika belum bayar tidak bisa isi biodata KKN (belum)
4.Jika sudah bayar klik link KKN
5.Agreement menjadi peserta KKN dari LPM (Harus di setujui untuk lanjut ke step berikutnya)
6.Isi biodata, beberapa biodata readonly.
7.Upload dokumen persyaratan wajib(foto,surat ket sehat, surat gol darah), sunnah (surat tidak hamil, surat cuti)
8.halaman home mahasiswa
9. mahasiswa bisa melihat:
	a. profil
	b. doc yang sudah di upload
	c. teman2 kelompok seanggota (fitur akan enable jika LPM sudah menambahkan mhs yang bersangkutan kedalam kelompok)
	d. melihat DPL dan tempat KKN lama KKN
	e. print keterangan untuk pengambilan buku KKN (belum buat fitur printnya)

10.Jika mahasiswa klik link KKN di SIA ketika mhs yang bersangkutan sudah mengisi dokumen akan otomatis redirect ke home page mahasiswa KKN.
	- set status SUDAH =1 jika mhs sudah isi profil lengkap
	- set status SUDAH =2 jika mhs sudah mengisi lengkap doc spt foto, sk shat,gol darah dsb
	- set status SUDAH =3 Jika mhs sudah ditamhakan dalam sebuah kelompok oleh admin LPM
11. Mahasiswa bisa edit foto dan crop thumbnails
	
Admin LPM
1. login
2. Manage TA
3. Manage Periode KKN
4. Manage ANgkatan KKN
5. Melihat List pendaftar KKN tapi tidak bisa menambah pendaftar
6. Membuat Kelompok KKN (tempat, DPL) DPL akan terlihat Nama dan Alamatnya (diambil dari D_dosen)
	Aturan pemberian nama kelompok AngkatanNamaKelompok contoh 77KOTA1 (untuk mempermudah) dan agar tidak sama namanya
7. Menambahkan mahasiswa kedalam kelompok yang telah dibuat (Mahasiswa akan terlihat NIM dan Fakulatasnya)
8. Mahasiswa yang sudah di tambah ke kelompok akan bersetatus SUDAH =3 shingga tak akan tampil ketika akan menambahkan mahasiswa ke dalam kelompok baru.
9. Preview siap di print dan export ke file csv
10. Generate kartu KKN.. (bingung ttdne jek)
11. Admin bisa mengexport seluruh data peserta KKN per TA/Periode/Angkatan
12. Searching Member berdasarkan ... :-D
13. ketika da perpindahan anggota kelompok, tidak ad menu edit, tapi di hapus kemudian insert lagi ..
14. Manage DPL.
15. Generate Sertifikat KKN


Dosen/ DPL
Bagi yang di tunjuk sebagai DPL KKN seharusnya di SIa dosen yang bersangkutan ad menu KKN... klo g ad i don't know
1. Dosen bisa melihat Kelompok yang di bina dan seluruh mahasiswa KKN yang didalamnya termasuk juga tempat KKNnya
2. Input Nilai Bagi mahasiswa/peserta KKN yang dibina


