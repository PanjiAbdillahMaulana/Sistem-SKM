<?php

namespace Database\Seeders;

use App\Models\Survey;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $surveys = [
            [
                'indicator' => 'Persyaratan',
                'question' => 'Bagaimana pendapat Saudara tentang kesesuaian persyaratan pelayanan dengan jenis pelayanannya.',
                'answer1' => 'Tidak sesuai.',
                'answer2' => 'Kurang sesuai.',
                'answer3' => 'Sesuai.',
                'answer4' => 'Sangat sesuai.'
            ],
            [
                'indicator' => 'Sistem, Mekanisme, dan Prosedur',
                'question' => 'Bagaimana pemahaman Saudara tentang kemudahan prosedur pelayanan di unit ini.',
                'answer1' => 'Tidak mudah.',
                'answer2' => 'Kurang mudah.',
                'answer3' => 'Mudah.',
                'answer4' => 'Sangat mudah.'
            ],
            [
                'indicator' => 'Waktu Penyelesaian',
                'question' => 'Bagaimana pendapat Saudara tentang kecepatan waktu dalam memberikan pelayanan.',
                'answer1' => 'Tidak cepat.',
                'answer2' => 'Kurang cepat.',
                'answer3' => 'Cepat.',
                'answer4' => 'Sangat cepat.'
            ],
            [
                'indicator' => 'Biaya/Tarif',
                'question' => 'Bagaimana pendapat Saudara tentang kewajaran biaya/tarif dalam pelayanan.',
                'answer1' => 'Sangat mahal',
                'answer2' => 'Cukup mahal',
                'answer3' => 'Murah',
                'answer4' => 'Gratis'
            ],
            [
                'indicator' => 'Produk Spesifikasi Jenis Pelayanan',
                'question' => 'Bagaimana pendapat Saudara tentang kesesuaian produk pelayanan antara yang tercantum dalam standar pelayanan dengan hasil yang diberikan.',
                'answer1' => 'Tidak sesuai',
                'answer2' => 'Kurang sesuai',
                'answer3' => 'Sesuai.',
                'answer4' => 'Sangat sesuai'
            ],
            [
                'indicator' => 'Kompetensi Pelaksana',
                'question' => 'Bagaimana pendapat Saudara tentang kompetensi/ kemampuan petugas dalam pelayanan.',
                'answer1' => 'Tidak kompeten',
                'answer2' => 'Kurang kompeten',
                'answer3' => 'Kompeten',
                'answer4' => 'Sangat kompeten'
            ],
            [
                'indicator' => 'Perilaku Pelaksana',
                'question' => 'Bagamana pendapat saudara perilaku petugas dalam pelayanan terkait kesopanan dan keramahan.',
                'answer1' => 'Tidak sopan dan ramah',
                'answer2' => 'Kurang sopan dan ramah',
                'answer3' => 'Sopan dan ramah',
                'answer4' => 'Sangat sopan dan ramah'
            ],
            [
                'indicator' => 'Penanganan Pengaduan, Saran dan Masukan',
                'question' => 'Bagaimana pendapat Saudara tentang kualitas sarana dan prasarana.',
                'answer1' => 'Buruk.',
                'answer2' => 'Cukup.',
                'answer3' => 'Baik',
                'answer4' => 'Sangat Baik'
            ],
            [
                'indicator' => 'Sarana dan prasarana',
                'question' => 'Bagaimana pendapat Saudara tentang penanganan pengaduan pengguna layanan.',
                'answer1' => 'Tidak ada.',
                'answer2' => 'Ada tetapi tidak berfungsi',
                'answer3' => 'Berfungsi kurang maksimal',
                'answer4' => 'Dikelola dengan baik.'
            ],
        ];

        foreach ($surveys as $survey) {
            Survey::create($survey);
        }
    }
}
