<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Portfolio;
use App\Models\User;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Ambil semua ID user yang role-nya 'mahasiswa'
        $studentIds = User::where('role', 'mahasiswa')->pluck('id')->toArray();

        // Cek jika belum ada mahasiswa, hentikan proses
        if (empty($studentIds)) {
            $this->command->info('⚠️ Tidak ada data mahasiswa! Jalankan MahasiswaSeeder terlebih dahulu.');
            return;
        }

        // 2. Siapkan data judul proyek dan keahlian agar terlihat variatif
        $projectTitles = [
            'Sistem Monitoring Suhu IoT', 'Website E-Commerce UMKM', 'Aplikasi Kasir Berbasis Android',
            'Rancang Bangun Jaringan WAN', 'Sistem Absensi Face Recognition', 'sistem pemesanan tiket kereta api ',
            'Smart Home dengan Arduino', 'Aplikasi Manajemen Keuangan', 'Topologi Jaringan Kantor',
            'Robot Pemadam Api', 'Sistem Informasi Perpustakaan', 'Landing Page Promosi Produk',
            'Deteksi Masker dengan AI', 'Website Portal Berita', 'Game Edukasi Anak'
        ];

        $skills = [
            'Laravel, MySQL, Bootstrap', 'IoT, Arduino, C++', 'Android Studio, Java',
            'Cisco Packet Tracer, Mikrotik', 'Python, TensorFlow', 'HTML, CSS, JavaScript',
            'React Native, Firebase', 'PHP, CodeIgniter', 'Figma, UI/UX Design'
        ];

        // 3. Loop sebanyak 15 kali untuk membuat 15 data dummy
        for ($i = 0; $i < 15; $i++) {
            Portfolio::create([
                // Pilih ID mahasiswa secara acak dari daftar yang ada
                'user_id' => $studentIds[array_rand($studentIds)],
                
                // Pilih judul dan keahlian secara acak
                'nama_proyek' => $projectTitles[array_rand($projectTitles)],
                'keahlian' => $skills[array_rand($skills)],
                
                'deskripsi' => 'Ini adalah contoh deskripsi proyek portofolio dummy. Proyek ini dikembangkan untuk memenuhi tugas akhir dan studi kasus pengembangan sistem informasi modern.',
                
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    }
}
}
