<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    public function run(): void
    {

        Service::create([
            'title_en' => 'Graphic Design',
            'desc_en' => 'We specialize in creating impactful social media designs and unique branding to elevate your presence.',
            'title_ar' => 'التصميم الجرافيكي',
            'desc_ar' => 'نحن متخصصون في إنشاء تصاميم وسائط اجتماعية مؤثرة وعلامات تجارية فريدة لتعزيز حضورك.',
            'image' => 'img/print.svg',
            'show_on_recent_work' => true,
            'show_on_our_service' => true,
        ]);

        Service::create([
            'title_en' => 'Website',
            'desc_en' => 'We build dynamic, custom websites with the latest technologies to ensure high performance.',
            'title_ar' => 'المواقع الإلكترونية',
            'desc_ar' => 'نقوم ببناء مواقع ديناميكية ومخصصة باستخدام أحدث التقنيات لضمان أداء عالي.',
            'image' => 'img/code-tag.svg',
            'show_on_recent_work' => true,
            'show_on_our_service' => true,
        ]);

        Service::create([
            'title_en' => 'Applications',
            'desc_en' => 'We develop effective, seamless applications, delivering the project fully ready for immediate deployment.',
            'title_ar' => 'تطبيقات',
            'desc_ar' => 'نطور تطبيقات فعالة وسلسة، جاهزة للتنفيذ الفوري.',
            'image' => 'img/MobileIcon.svg',
            'show_on_recent_work' => true,
            'show_on_our_service' => true,
        ]);

        Service::create([
            'title_en' => 'Motion Graphics',
            'desc_en' => 'We create captivating motion graphics that bring your ideas to life with creativity.',
            'title_ar' => 'الرسوم المتحركة',
            'desc_ar' => 'نصمم رسوم متحركة جذابة تحيي أفكارك بالإبداع.',
            'image' => 'img/video.svg',
            'show_on_recent_work' => true,
            'show_on_our_service' => true,
        ]);

        Service::create([
            'title_en' => 'Digital Marketing',
            'desc_en' => 'We provide effective digital marketing strategies to enhance your reach and achieve goals.',
            'title_ar' => 'التسويق الرقمي',
            'desc_ar' => 'نقدم استراتيجيات تسويق رقمي فعالة لتعزيز مدى الوصول وتحقيق الأهداف.',
            'image' => 'img/Discovery.svg',
            'show_on_recent_work' => true,
            'show_on_our_service' => true,
        ]);

        Service::create([
            'title_en' => 'Architecture',
            'desc_en' => 'We deliver meticulous architectural designs, providing blueprints and resources to ensure professional execution.',
            'title_ar' => 'الهندسة المعمارية',
            'desc_ar' => 'نقدم تصاميم معمارية دقيقة، مع مخططات وموارد لضمان تنفيذ احترافي.',
            'image' => 'img/coding.png',
            'show_on_recent_work' => true,
            'show_on_our_service' => true,
        ]);
    }
}
