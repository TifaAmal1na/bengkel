<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Notification;
use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Notification::create(['message' => 'Keterlambatan part electrical proyek KCR 5', 'status' => 'decrease']);
        Notification::create(['message' => 'Percepatan proses datangnya pipa 105', 'status' => 'increase']);
        Notification::create(['message' => 'Hold pekerjaan pemasangan main engine', 'status' => 'neutral']);
    }
}
