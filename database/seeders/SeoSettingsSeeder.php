<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SeoSettingsSeeder extends Seeder
{
    public function run(): void
    {
        $seoItems = [
            // Home Page
            [
                'key' => 'home_seo_title',
                'en' => 'Ocean IT | Web & App Development Experts',
                'ar' => 'أوشن لتقنية المعلومات | خبراء تطوير المواقع والتطبيقات',
                'group' => 'seo',
                'type' => 'Home Page SEO'
            ],
            [
                'key' => 'home_seo_description',
                'en' => 'Discover creative web and mobile development solutions by Ocean IT. We turn ideas into powerful digital experiences.',
                'ar' => 'اكتشف حلولاً إبداعية لتطوير المواقع والتطبيقات مع أوشن. نحول الأفكار إلى تجارب رقمية مميزة.',
                'group' => 'seo',
                'type' => 'Home Page SEO'
            ],

            // Projects Page
            [
                'key' => 'projects_seo_title',
                'en' => 'Our Projects | Custom Software Delivered with Precision',
                'ar' => 'مشاريعنا | حلول برمجية منفذة باحترافية',
                'group' => 'seo',
                'type' => 'Projects Page SEO'
            ],
            [
                'key' => 'projects_seo_description',
                'en' => 'Explore our best work and see how we help businesses succeed through technology.',
                'ar' => 'استعرض أفضل مشاريعنا وشاهد كيف نساعد الشركات على النجاح باستخدام التكنولوجيا.',
                'group' => 'seo',
                'type' => 'Projects Page SEO'
            ],

            // Blog Page
            [
                'key' => 'blog_seo_title',
                'en' => 'Ocean Blog | Insights on Tech, Design & Business',
                'ar' => 'مدونة أوشن | مقالات حول التقنية والتصميم والأعمال',
                'group' => 'seo',
                'type' => 'Blog Page SEO'
            ],
            [
                'key' => 'blog_seo_description',
                'en' => 'Stay updated with the latest trends and tips in development, UI/UX, and entrepreneurship.',
                'ar' => 'تابع آخر الاتجاهات والنصائح في البرمجة، وتصميم الواجهات، وريادة الأعمال.',
                'group' => 'seo',
                'type' => 'Blog Page SEO'
            ],

            // About Page
            [
                'key' => 'about_seo_title',
                'en' => 'About Ocean IT | Meet the Experts Behind the Code',
                'ar' => 'من نحن | تعرف على الفريق المحترف خلف الكود',
                'group' => 'seo',
                'type' => 'About Page SEO'
            ],
            [
                'key' => 'about_seo_description',
                'en' => 'Get to know Ocean IT — a passionate team of developers and designers delivering impactful digital products.',
                'ar' => 'تعرف على أوشن — فريق من المطورين والمصممين المتحمسين لصناعة منتجات رقمية متميزة.',
                'group' => 'seo',
                'type' => 'About Page SEO'
            ],

            // How It Works Page
            [
                'key' => 'howitworks_seo_title',
                'en' => 'How We Work | From Idea to Launch',
                'ar' => 'كيف نعمل | من الفكرة إلى التنفيذ',
                'group' => 'seo',
                'type' => 'How It Works Page SEO'
            ],
            [
                'key' => 'howitworks_seo_description',
                'en' => 'Learn how Ocean IT turns concepts into real digital products with clear processes and collaboration.',
                'ar' => 'تعرف كيف تحول أوشن المفاهيم إلى منتجات رقمية حقيقية عبر خطوات واضحة وتعاون مستمر.',
                'group' => 'seo',
                'type' => 'How It Works Page SEO'
            ],

            // Contact Page
            [
                'key' => 'contact_seo_title',
                'en' => 'Contact Ocean IT | Let’s Build Something Great',
                'ar' => 'تواصل مع أوشن | لنبنِ شيئًا مميزًا معًا',
                'group' => 'seo',
                'type' => 'Contact Page SEO'
            ],
            [
                'key' => 'contact_seo_description',
                'en' => 'Have questions or a project in mind? Reach out to Ocean IT and start your digital journey with us.',
                'ar' => 'هل لديك أسئلة أو فكرة مشروع؟ تواصل مع أوشن وابدأ رحلتك الرقمية معنا.',
                'group' => 'seo',
                'type' => 'Contact Page SEO'
            ],
        ];

        foreach ($seoItems as $item) {
            Setting::create([
                'key_id'     => $item['key'] . '_en',
                'title_en'   => ucfirst(str_replace('_', ' ', $item['key'])) . ' English',
                'title_ar'   => 'عنوان SEO انجليزي',
                'value'      => $item['en'],
                'set_group'  => $item['group'],
                'type_en'    => $item['type'],
                'type_ar'    => $item['type'],
                'is_object'  => 1,
            ]);

            Setting::create([
                'key_id'     => $item['key'] . '_ar',
                'title_en'   => ucfirst(str_replace('_', ' ', $item['key'])) . ' Arabic',
                'title_ar'   => 'عنوان SEO عربي',
                'value'      => $item['ar'],
                'set_group'  => $item['group'],
                'type_en'    => $item['type'],
                'type_ar'    => $item['type'],
                'is_object'  => 1,
            ]);
        }
    }
}

