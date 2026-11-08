# PROGRESS: Sistem Booking Ruangan

Terakhir diperbarui: 2026-11-08
Stack: Laravel ^13.17, PHP ^8.3, MySQL/MariaDB, email via Gmail SMTP
Acuan desain: ERD Draf 2 (12 tabel + token reset password), alur persetujuan bertahap

## Cara memperbarui

- Ubah kolom **Status** saat tugas berubah, isi **Commit** dengan 7 karakter awal hash.
- Status: `Selesai` / `Proses` / `Siap` (syarat terpenuhi, belum dikerjakan) / `Menunggu` (bergantung tugas lain) / `Belum`.
- Prio: T = Tinggi, S = Sedang, B = Baru, R = Rendah.
- Commit pesan disarankan diawali ID tugas, contoh: `E2-02 login admin`.

## Ringkasan

| Epic                         | Selesai | Total  |
| ---------------------------- | ------- | ------ |
| 0 Kartu Terbuka              | 8       | 8      |
| 1 Setup                      | 2       | 6      |
| 2 Autentikasi                | 0       | 16     |
| 3 Akun Instansi dan Ruangan  | 0       | 8      |
| 4 Booking                    | 0       | 10     |
| 5 Persetujuan dan Notifikasi | 0       | 12     |
| 6 Admin, Laporan, Log, UI    | 0       | 10     |
| 7 Pengujian dan Rilis        | 0       | 8      |
| **Total**                    | **10**  | **78** |

## Sedang dikerjakan / berikutnya

- E1-03 migration sesuai ERD, lalu `php artisan migrate:fresh`
- E1-05 Gmail khusus + app password (langkah manual pemilik proyek)

## Epic 0: Kartu Terbuka (keputusan desain)

| ID    | Prio | Tugas                                                        | Status  |
| ----- | ---- | ------------------------------------------------------------ | ------- |
| T-133 | T    | Domain email: student / lecturer / staff.upnjatim.ac.id      | Selesai |
| T-134 | S    | Dosen/staf wajib cantumkan pembina                           | Selesai |
| T-135 | S    | Opsi acara universitas: Ketua Pelaksana + ketua organisasi   | Selesai |
| T-142 | S    | Satu akun BAAK dan satu akun Sarpras                         | Selesai |
| T-143 | S    | Penolakan Sarpras cukup alasan, tanpa surat                  | Selesai |
| T-144 | B    | Cakupan log instansi terbatas di tahapnya, admin lihat semua | Selesai |
| T-145 | B    | Mockup 13 layar diperbarui                                   | Selesai |
| T-137 | T    | ERD 12 tabel + persetujuan berjenjang                        | Selesai |

## Epic 1: Setup Proyek dan Database

| ID    | Prio | Tugas                                           | Status         | Commit  |
| ----- | ---- | ----------------------------------------------- | -------------- | ------- |
| E1-01 | T    | Install Laravel, buat repository                | Selesai        | 8958e85 |
| E1-02 | T    | Database MySQL/MariaDB, koneksi `.env`          | Selesai        | 8958e85 |
| E1-03 | T    | Migration tabel sesuai ERD                      | Siap           |         |
| E1-04 | T    | Seeder satu akun admin                          | Menunggu E1-03 |         |
| E1-05 | T    | Gmail khusus, 2-Step Verification, app password | Siap           |         |
| E1-06 | T    | Konfigurasi SMTP Gmail di `.env`                | Menunggu E1-05 |         |

## Epic 2: Autentikasi Tiga Jenis Akun

| ID    | Prio | Tugas                                                             | Status | Commit |
| ----- | ---- | ----------------------------------------------------------------- | ------ | ------ |
| E2-01 | T    | Tiga guard: admin, instansi, pembooking                           | Belum  |        |
| E2-02 | T    | Login admin                                                       | Belum  |        |
| E2-03 | T    | Login instansi, tanpa register                                    | Belum  |        |
| E2-04 | T    | Daftar pembooking + validasi domain email                         | Siap   |        |
| E2-05 | T    | Email verifikasi saat daftar                                      | Belum  |        |
| E2-06 | T    | Proses verifikasi, blokir login sebelum verifikasi                | Belum  |        |
| E2-07 | S    | Kirim ulang tautan verifikasi                                     | Belum  |        |
| E2-08 | T    | Login pembooking                                                  | Belum  |        |
| E2-09 | S    | Logout tiga jenis akun                                            | Belum  |        |
| E2-10 | T    | Middleware pembatas akses per jenis akun                          | Belum  |        |
| E2-11 | T    | Email unik lintas tiga tabel                                      | Belum  |        |
| E2-12 | T    | Halaman ganti password instansi                                   | Belum  |        |
| E2-13 | T    | Middleware paksa ganti password login pertama                     | Belum  |        |
| E2-14 | T    | Lupa/reset password pembooking via email                          | Belum  |        |
| E2-15 | T    | Lupa/reset password instansi via email                            | Belum  |        |
| E2-16 | T    | Pilih fakultas dan prodi saat daftar, terhubung ke akun penyetuju | Belum  |        |

## Epic 3: Kelola Akun Instansi dan Ruangan

| ID    | Prio | Tugas                                | Status | Commit |
| ----- | ---- | ------------------------------------ | ------ | ------ |
| E3-01 | T    | Admin buat akun instansi             | Belum  |        |
| E3-02 | T    | Admin ubah/nonaktifkan akun instansi | Belum  |        |
| E3-03 | T    | Sarpras tambah ruangan               | Belum  |        |
| E3-04 | T    | Sarpras lihat daftar ruangan         | Belum  |        |
| E3-05 | S    | Sarpras ubah ruangan                 | Belum  |        |
| E3-06 | S    | Sarpras hapus ruangan                | Belum  |        |
| E3-07 | T    | Sarpras kelola jam operasional       | Belum  |        |
| E3-08 | T    | Sarpras kelola jadwal tutup          | Belum  |        |

## Epic 4: Booking Ruangan (Pembooking)

| ID    | Prio | Tugas                                                                   | Status | Commit |
| ----- | ---- | ----------------------------------------------------------------------- | ------ | ------ |
| E4-01 | T    | Daftar ruangan + pencarian nama/nama lain                               | Belum  |        |
| E4-02 | T    | Jadwal terpakai ruangan (disetujui final, belum lewat)                  | Belum  |        |
| E4-03 | T    | Form ajukan booking                                                     | Siap   |        |
| E4-04 | T    | Rentang peserta dari daftar tetap, dipotong kapasitas                   | Belum  |        |
| E4-05 | T    | Unggah surat PDF maks 10 MB + validasi                                  | Belum  |        |
| E4-06 | T    | Validasi kirim: jam operasional, jadwal tutup, bentrok, maks 14 tanggal | Belum  |        |
| E4-07 | T    | Tampilkan tanggal bentrok                                               | Belum  |        |
| E4-08 | T    | Validasi server: rentang peserta vs kapasitas                           | Belum  |        |
| E4-09 | T    | Simpan pengajuan status menunggu, tahap 1 Wakil Dekan III               | Belum  |        |
| E4-10 | T    | Riwayat pengajuan sendiri + unduh surat persetujuan                     | Belum  |        |

## Epic 5: Persetujuan Bertahap dan Notifikasi

| ID    | Prio | Tugas                                                           | Status | Commit |
| ----- | ---- | --------------------------------------------------------------- | ------ | ------ |
| E5-01 | T    | Penyetuju lihat pengajuan di tahapnya                           | Belum  |        |
| E5-02 | T    | Detail pengajuan + unduh surat permohonan                       | Belum  |        |
| E5-03 | T    | Penentuan alur 3 atau 4 tahap dari kategori ruangan             | Belum  |        |
| E5-04 | T    | Setujui lewat sistem, lanjut tahap berikutnya                   | Belum  |        |
| E5-05 | T    | Tolak dengan alasan wajib, alur berhenti                        | Belum  |        |
| E5-06 | T    | Sarpras setujui + data pejabat + surat persetujuan PDF          | Siap   |        |
| E5-07 | T    | Cek ulang bentrok saat Sarpras menyetujui                       | Belum  |        |
| E5-08 | T    | Tolak otomatis pengajuan tumpang tindih + alasan                | Belum  |        |
| E5-09 | T    | Email ke penyetuju tahap berikutnya                             | Belum  |        |
| E5-10 | T    | Email ke pembooking tiap tahap + hasil akhir                    | Belum  |        |
| E5-11 | S    | Tangani kuota Gmail terlampaui                                  | Belum  |        |
| E5-12 | T    | Tanda tumpang tindih / luar jam operasional di daftar penyetuju | Belum  |        |

## Epic 6: Admin, Laporan, Log, Antarmuka

| ID    | Prio | Tugas                                                           | Status | Commit |
| ----- | ---- | --------------------------------------------------------------- | ------ | ------ |
| E6-01 | T    | Daftar kerja WhatsApp manual per tahap + tandai dikabari        | Belum  |        |
| E6-02 | T    | Admin lihat semua pengajuan + tahapnya                          | Belum  |        |
| E6-03 | S    | Admin filter riwayat (tanggal, status, ruangan)                 | Belum  |        |
| E6-04 | T    | Laporan PDF, satu baris per pengajuan                           | Belum  |        |
| E6-05 | T    | Laporan Excel                                                   | Belum  |        |
| E6-06 | T    | Pencatatan log (kirim, setujui/tolak per tahap, tolak otomatis) | Belum  |        |
| E6-07 | T    | Halaman log admin                                               | Belum  |        |
| E6-08 | S    | Halaman log instansi (hanya di tahapnya)                        | Siap   |        |
| E6-09 | T    | Implementasi UI sesuai mockup                                   | Belum  |        |
| E6-10 | S    | Tampilan responsif                                              | Belum  |        |

## Epic 7: Pengujian dan Rilis

| ID    | Prio | Tugas                                               | Status | Commit |
| ----- | ---- | --------------------------------------------------- | ------ | ------ |
| E7-01 | T    | Uji bentrok, jam operasional, jadwal tutup          | Belum  |        |
| E7-02 | T    | Uji alur lengkap login sampai surat Sarpras + email | Belum  |        |
| E7-03 | T    | Uji pembatasan akses antar akun                     | Belum  |        |
| E7-04 | T    | Uji tolak otomatis + alasan                         | Belum  |        |
| E7-05 | T    | Uji batas 14 tanggal dan rentang peserta            | Belum  |        |
| E7-06 | T    | Uji alur 3 dan 4 tahap + penolakan di tahap tengah  | Belum  |        |
| E7-07 | T    | Uji coba lokal                                      | Belum  |        |
| E7-08 | R    | Pindah ke server kampus setelah pengajuan diterima  | Belum  |        |

## Keputusan desain (ringkas)

- Tiga jenis akun: admin, instansi (Fakultas, Prodi, BAAK, Sarpras), pembooking.
- Alur: Wakil Dekan III, Kaprodi, [BAAK jika ruangan/acara universitas], Sarpras. Pemohon staf melewati Kaprodi.
- Jadwal terkunci hanya setelah Sarpras menyetujui. Sarpras mengelola semua ruangan.
- Maks 14 tanggal per pengajuan, surat PDF maks 10 MB, rentang peserta 1-10, 11-25, 26-50, 51-100, 101-kapasitas.
- Ruangan tertutup: di luar jam operasional diblokir. Ruangan terbuka: hanya ditandai.

## Pertanyaan terbuka

1. Staf tanpa fakultas: `pengguna.fakultas_id` wajib, bagaimana staf unit pusat?
2. Fakultas/prodi tanpa akun penyetuju: pengajuan macet. Tolak saat kirim atau beri peringatan ke admin?
3. Tabel token reset password (13 tabel total) dan broker reset per guard.
4. `tahap_saat_ini`: tetap disimpan (diperbarui dalam transaksi) atau dihitung dari tabel `persetujuan`?
5. Cek bentrok + tolak otomatis dalam satu transaksi dengan penguncian baris.
6. Paket laporan: PDF (mis. dompdf) dan Excel (mis. maatwebsite/excel) belum ada di `composer.json`.
