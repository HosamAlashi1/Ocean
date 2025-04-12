<?php

namespace Database\Seeders;

use App\Models\Process;
use App\Traits\ImageTrait;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProcessSeeder extends Seeder
{
    use ImageTrait;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Process::create([
            'name_en'=>'Discovery',
            'name_ar'=>'اكتشاف',
            'desc_en'=>'We thoroughly analyze your business goals, audience, and challenges to gain insights and create a tailored strategy that aligns with your vision.',
            'desc_ar'=>'نحن نقوم بتحليل أهداف عملك وجمهورك والتحديات التي تواجهك بشكل شامل لاكتساب رؤى وإنشاء استراتيجية مخصصة تتوافق مع رؤيتك.',
            'image'=> 'img/Discovery.svg'
        ]);

        Process::create([
            'name_en'=>'Plan',
            'name_ar'=>'الخطة',
            'desc_en'=>'We develop a strategic roadmap based on our insights, outlining clear objectives, actionable steps, and timelines to achieve your goals effectively.',
            'desc_ar'=>'نحن نعمل على تطوير خارطة طريق استراتيجية بناءً على رؤيتنا، ونحدد أهدافًا واضحة وخطوات قابلة للتنفيذ وجداول زمنية لتحقيق أهدافك بشكل فعال.',
            'image'=> 'img/Plan.svg'
        ]);

        Process::create([
            'name_en'=>'Execute',
            'name_ar'=>'تنفيذ',
            'desc_en'=>'We implement the strategy with precision, managing each detail to ensure smooth execution and achieve the desired results.',
            'desc_ar'=>'نحن ننفذ الاستراتيجية بدقة، وندير كل التفاصيل لضمان التنفيذ السلس وتحقيق النتائج المرجوة.',
            'image'=> 'img/Execute.svg'
        ]);

    }
}
