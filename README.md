# Altruhye - Platform Galang Dana, Barang, & Dukungan

Altruhye adalah aplikasi web berbasis Laravel untuk galang dana, barang, dan dukungan emosional. Mendukung fitur donasi oleh user login maupun guest, verifikasi identitas, approval admin, dan riwayat donasi/campaign. Cocok untuk portofolio backend/API modern.

## Fitur Utama
- **Manajemen Campaign**: Buat, lihat, update, hapus campaign (dana, barang, dukungan).
- **Donasi**: Donasi bisa dilakukan oleh user login maupun guest (anonim).
- **Verifikasi Identitas**: User wajib verifikasi identitas sebelum membuat campaign.
- **Approval Admin**: Admin dapat approve/reject campaign, donasi, dan verifikasi identitas.
- **Riwayat Donasi & Campaign**: User dapat melihat riwayat donasi dan campaign miliknya.
- **Notifikasi**: Notifikasi status donasi, campaign, dan verifikasi identitas.
- **API RESTful**: Semua fitur utama tersedia via endpoint API, mudah diintegrasikan dengan frontend atau Postman.

## Contoh Tampilan

<p align="center">
  <img src="https://i.imgur.com/ZE3mpHW.png" width="600" alt="Landing Page" />
  <img src="https://i.imgur.com/rlRI0mQ.png" width="600" alt="Daftar Campaign" />
  <img src="https://i.imgur.com/5fwi3V2.png" width="600" alt="Form Donasi" />
  <img src="https://i.imgur.com/ofLZLjD.png" width="600" alt="Dashboard User" />
</p>

## Struktur API (Ringkasan Endpoint)

| Endpoint                        | Method | Auth         | Keterangan                        |
|---------------------------------|--------|--------------|-----------------------------------|
| /api/campaigns                  | GET    | Public       | List campaign aktif               |
| /api/campaigns/{id}             | GET    | Public       | Detail campaign                   |
| /api/campaigns                  | POST   | User         | Buat campaign (verifikasi wajib)  |
| /api/campaigns/{id}             | PUT    | User         | Update campaign milik user        |
| /api/campaigns/{id}             | DELETE | User         | Hapus campaign milik user         |
| /api/my-campaigns               | GET    | User         | List campaign milik user          |
| /api/donations                  | GET    | Public       | List donasi (hanya yang verified) |
| /api/donations                  | POST   | Public/User  | Donasi (guest & login)            |
| /api/my-donations               | GET    | User         | Riwayat donasi user               |
| /api/identity-verifications     | POST   | User         | Ajukan verifikasi identitas       |
| /api/identity-verifications/me  | GET    | User         | Status verifikasi user            |
| /api/login                      | POST   | -            | Login user                        |
| /api/logout                     | POST   | User         | Logout user                       |
| /api/admin/...                  | -      | Admin        | Endpoint approval admin           |

## Cara Install & Jalankan

1. **Clone repo & install dependency**
   ```powershell
   git clone <repo-url>
   cd Altruhye
   composer install
   npm install && npm run build
   cp .env.example .env
   php artisan key:generate
   # Atur koneksi database di .env
   php artisan migrate --seed
   php artisan storage:link
   php artisan serve
   ```
2. **Testing API**
   - Gunakan Postman/Insomnia untuk akses endpoint di atas.
   - Untuk endpoint user/admin, login dulu dan gunakan Bearer Token dari response login.
   - Donasi bisa dilakukan tanpa login (guest) maupun dengan login.

## Struktur Kode
- `app/Models/` : Model utama (Campaign, Donation, User, dsb)
- `app/Http/Controllers/Api/` : Controller API utama
- `routes/api.php` : Definisi endpoint API
- `app/Notifications/` : Notifikasi status
- `app/Observers/` : Observer update otomatis

## Kontribusi & Lisensi
Project ini untuk keperluan portofolio. Silakan fork/clone untuk belajar. Lisensi MIT.
