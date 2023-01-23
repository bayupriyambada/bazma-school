<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DonationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Donation::create([
            'content' => '
            <p>Yayasan Baituzzakah Pertamina (Bazma) adalah Lembaga Nirlaba yang berkhidmat mengangkat harkat sosial kemanusiaan dengan mendayagunakan dana zakat, infak/sedekah dan wakaf (Ziswaf) yang bersumber dari masyarakat. Dana yang terhimpun disalurkan dalam beragam bentuk program sosial, pendidikan, kesehatan, pelayanan dhuafa, penanganan bencana dan pemberdayaan ekonomi masyarakat di seluruh Indonesia.</p>

Salah satu program yang sedang digulirkan adalah wakaf Pembangunan SMK TI Bazma, sebuah model pengelolaan pendidikan yang diharapkan bisa mencetak kader-kader berkarakter unggul dan berdaya saing bersaing di era global.

Salurkan Wakaf terbaik anda melalui :

Logo BSI
711.88.444.88
A.N Yayasan Baituzzakah Pertamina

Konfirmasi donasi: 0812 9077 1055',
        ]);
    }
}
