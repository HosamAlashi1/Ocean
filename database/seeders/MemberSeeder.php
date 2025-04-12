<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    public function run(): void
    {
        Member::truncate(); // Clears existing data

        Member::create([
            'name_en' => 'Haneen naji',
            'name_ar' => 'حنين ناجي',
            'job_name_en' => 'Project Interface',
            'job_name_ar' => 'واجهة المشروع',
            'image' => 'img/team/Haneen.svg',
        ]);

        Member::create([
            'name_en' => 'Ezaden Herzallah',
            'name_ar' => 'عز الدين حرزالله',
            'job_name_en' => 'UI/UX',
            'job_name_ar' => 'تجربة المستخدم',
            'image' => 'img/team/ezaden.svg',
        ]);

        Member::create([
            'name_en' => 'Ahmed Alashi',
            'name_ar' => 'أحمد العشي',
            'job_name_en' => 'Laravel Programmer',
            'job_name_ar' => 'مبرمج Laravel',
            'image' => 'img/team/ahmed.svg',
        ]);

        Member::create([
            'name_en' => 'Kareem M Abbas',
            'name_ar' => 'كريم عباس',
            'job_name_en' => 'Graphic Designer',
            'job_name_ar' => 'مصمم جرافيك',
            'image' => 'img/team/kareem.svg',
        ]);

        Member::create([
            'name_en' => 'Musa Emad',
            'name_ar' => 'موسى عماد',
            'job_name_en' => 'Graphic Designer',
            'job_name_ar' => 'مصمم جرافيك',
            'image' => 'img/team/musa.svg',
        ]);

        Member::create([
            'name_en' => 'Mousa Hamdan',
            'name_ar' => 'موسى حمدان',
            'job_name_en' => 'Motion Graphics',
            'job_name_ar' => 'موشن جرافيك',
            'image' => 'img/team/mousa.png',
        ]);

        Member::create([
            'name_en' => 'Abdulazeez Alsourafa',
            'name_ar' => 'عبد العزيز الشورفة',
            'job_name_en' => 'Laravel Developer',
            'job_name_ar' => 'مطور Laravel',
            'image' => 'img/team/abdulazeez.png',
        ]);

        Member::create([
            'name_en' => 'Hosam Alashi',
            'name_ar' => 'حسام العشي',
            'job_name_en' => 'Laravel Programmer',
            'job_name_ar' => 'مبرمج Laravel',
            'image' => 'img/team/hosam.png',
        ]);

        Member::create([
            'name_en' => 'Eslam',
            'name_ar' => 'اسلام',
            'job_name_en' => 'Frontend',
            'job_name_ar' => 'واجهة أمامية',
            'image' => 'img/team/eslam.png',
        ]);
    }
}
