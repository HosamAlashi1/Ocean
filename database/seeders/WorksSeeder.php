<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\Work;

class WorksSeeder extends Seeder
{
    public function run(): void
    {
        // Fetch the existing "Application" service from DB
        $applicationService = Service::where('title_en', 'Applications')->first();

        if ($applicationService) {
            $images = [
                'Portfolios1.png',
                'Portfolios2.png',
                'Portfolios3.png',
                'Portfolios2.png',
                'Portfolios4.png',
                'Portfolios6.png',
            ];

            foreach ($images as $img) {
                Work::create([
                    'image' => 'img/portfolio/' . $img,
                    'service_id' => $applicationService->id,
                ]);
            }
        } else {
            echo "Service 'Application' not found.\n";
        }
    }
}
