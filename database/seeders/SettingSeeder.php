<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'key_id' => 'instagram',
            'title_en'=>'instagram url',
            'title_ar'=>'رابط انستجرام',
            'value' => 'https://www.instagram.com/',
            'set_group' => 'web',
            'type_ar' => 'الاعدادات العامة',
            'type_en' => 'General Settings',
            'is_object' => '1',
        ]);
        Setting::create([
            'key_id' => 'whatsApp',
            'title_en'=>'whatsApp number',
            'title_ar'=>'رقم الواتس',
            'value' => '',
            'set_group' => 'web',
            'type_ar' => 'الاعدادات العامة',
            'type_en' => 'General Settings',
            'is_object' => '1',
        ]);
        Setting::create([
            'key_id' => 'twitter',
            'title_en'=>'X url',
            'title_ar'=>'رابط اكس',
            'value' => 'https://www.twitter.com/',
            'set_group' => 'web',
            'type_ar' => 'الاعدادات العامة',
            'type_en' => 'General Settings',
            'is_object' => '1',
        ]);
        Setting::create([
            'key_id' => 'youtube',
            'title_en'=>'YouTube url',
            'title_ar'=>'رابط يوتيوب',
            'value' => 'https://www.youtube.com/',
            'set_group' => 'web',
            'type_ar' => 'الاعدادات العامة',
            'type_en' => 'General Settings',
            'is_object' => '1',
        ]);

        Setting::create([
            'key_id' => 'clients_served_count',
            'title_en' => 'Clients Served Count',
            'title_ar' => 'عدد العملاء',
            'value' => '300+',
            'set_group' => 'web',
            'type_ar' => 'الاعدادات العامة',
            'type_en' => 'General Settings',
            'is_object' => '1',
        ]);

        Setting::create([
            'key_id' => 'satisfied_users_count',
            'title_en' => 'Satisfied End-Users Count',
            'title_ar' => 'عدد المستخدمين الراضين',
            'value' => '200+',
            'set_group' => 'web',
            'type_ar' => 'الاعدادات العامة',
            'type_en' => 'General Settings',
            'is_object' => '1',
        ]);

        Setting::create([
            'key_id' => 'projects_delivered_count',
            'title_en' => 'Projects Delivered Count',
            'title_ar' => 'عدد المشاريع المنجزة',
            'value' => '240+',
            'set_group' => 'web',
            'type_ar' => 'الاعدادات العامة',
            'type_en' => 'General Settings',
            'is_object' => '1',
        ]);


        // home page
        Setting::create([
            'key_id' => 'hero_main_title_en',
            'title_en' => 'Hero Main Title English',
            'title_ar' => 'عنوان رئيسي انجليزي',
            'value' => 'Discover Digital Art & Ocean',
            'set_group' => 'web',
            'type_ar' => 'اعدادات الصفحة الرئيسية',
            'type_en' => 'Home Page Settings',
            'is_object' => '1',
        ]);

        Setting::create([
            'key_id' => 'hero_main_title_ar',
            'title_en' => 'Hero Main Title Arabic',
            'title_ar' => 'عنوان رئيسي عربي',
            'value' => 'اكتشف الفن الرقمي و Ocean',
            'set_group' => 'web',
            'type_ar' => 'اعدادات الصفحة الرئيسية',
            'type_en' => 'Home Page Settings',
            'is_object' => '1',
        ]);

        Setting::create([
            'key_id' => 'hero_main_desc_en',
            'title_en' => 'Hero Main Description English',
            'title_ar' => 'وصف رئيسي انجليزي',
            'value' => 'At Ocean, we dive deep into creativity, blending the art of design with the power of programming to craft digital solutions that sail your ideas toward limitless success.',
            'set_group' => 'web',
            'type_ar' => 'اعدادات الصفحة الرئيسية',
            'type_en' => 'Home Page Settings',
            'is_object' => '1',
        ]);

        Setting::create([
            'key_id' => 'hero_main_desc_ar',
            'title_en' => 'Hero Main Description Arabic',
            'title_ar' => 'وصف رئيسي عربي',
            'value' => 'في أوشن، نغوص في أعماق الإبداع، ممزجين فن التصميم مع قوة البرمجة لصنع حلول رقمية تقود أفكارك نحو نجاح غير محدود.',
            'set_group' => 'web',
            'type_ar' => 'اعدادات الصفحة الرئيسية',
            'type_en' => 'Home Page Settings',
            'is_object' => '1',
        ]);

        // about on home page
        Setting::create([
            'key_id' => 'home_about_title_en',
            'title_en' => 'Home About Title English',
            'title_ar' => 'عنوان قسم من نحن في الصفحة الرئيسية انجليزي',
            'value' => 'Discover Digital Art & Ocean',
            'set_group' => 'web',
            'type_ar' => 'اعدادات الصفحة الرئيسية',
            'type_en' => 'Home Page Settings',
            'is_object' => '1',
        ]);

        Setting::create([
            'key_id' => 'home_about_title_ar',
            'title_en' => 'Home About Title Arabic',
            'title_ar' => 'عنوان قسم من نحن في الصفحة الرئيسية عربي',
            'value' => 'اكتشف الفن الرقمي و Ocean',
            'set_group' => 'web',
            'type_ar' => 'اعدادات الصفحة الرئيسية',
            'type_en' => 'Home Page Settings',
            'is_object' => '1',
        ]);

        Setting::create([
            'key_id' => 'home_about_desc_en',
            'title_en' => 'Home About Description English',
            'title_ar' => 'وصف قسم من نحن في الصفحة الرئيسية انجليزي',
            'value' => 'At Ocean, we dive deep into creativity, blending the art of design with the power of programming to craft digital solutions that sail your ideas toward limitless success.',
            'set_group' => 'web',
            'type_ar' => 'اعدادات الصفحة الرئيسية',
            'type_en' => 'Home Page Settings',
            'is_object' => '1',
        ]);

        Setting::create([
            'key_id' => 'home_about_desc_ar',
            'title_en' => 'Home About Description Arabic',
            'title_ar' => 'وصف قسم من نحن في الصفحة الرئيسية عربي',
            'value' => 'في أوشن، نغوص في أعماق الإبداع، ممزجين فن التصميم مع قوة البرمجة لصنع حلول رقمية تقود أفكارك نحو نجاح غير محدود.',
            'set_group' => 'web',
            'type_ar' => 'اعدادات الصفحة الرئيسية',
            'type_en' => 'Home Page Settings',
            'is_object' => '1',
        ]);

        // projects page
        Setting::create([
            'key_id' => 'projects_intro_title_en',
            'title_en' => 'Projects Page Title English',
            'title_ar' => 'عنوان صفحة المشاريع انجليزي',
            'value' => 'We have completed many amazing projects that you will not believe',
            'set_group' => 'web',
            'type_ar' => 'اعدادات صفحة المشاريع',
            'type_en' => 'Projects Page Settings',
            'is_object' => '1',
        ]);

        Setting::create([
            'key_id' => 'projects_intro_title_ar',
            'title_en' => 'Projects Page Title Arabic',
            'title_ar' => 'عنوان صفحة المشاريع عربي',
            'value' => 'لقد أنجزنا العديد من المشاريع المذهلة التي لن تصدقها',
            'set_group' => 'web',
            'type_ar' => 'اعدادات صفحة المشاريع',
            'type_en' => 'Projects Page Settings',
            'is_object' => '1',
        ]);

        // blog page
        Setting::create([
            'key_id' => 'blog_intro_title_en',
            'title_en' => 'Blog Page Title English',
            'title_ar' => 'عنوان صفحة المدونة انجليزي',
            'value' => 'Get precise knowledge wherever you are',
            'set_group' => 'web',
            'type_ar' => 'اعدادات صفحة المدونة',
            'type_en' => 'Blog Page Settings',
            'is_object' => '1',
        ]);

        Setting::create([
            'key_id' => 'blog_intro_title_ar',
            'title_en' => 'Blog Page Title Arabic',
            'title_ar' => 'عنوان صفحة المدونة عربي',
            'value' => 'احصل على معرفة دقيقة أينما كنت',
            'set_group' => 'web',
            'type_ar' => 'اعدادات صفحة المدونة',
            'type_en' => 'Blog Page Settings',
            'is_object' => '1',
        ]);

        // how we work page
        Setting::create([
            'key_id' => 'how_we_work_title_en',
            'title_en' => 'How We Work Title English',
            'title_ar' => 'عنوان كيف نعمل انجليزي',
            'value' => 'We have a workflow that allows the job to be delivered well',
            'set_group' => 'web',
            'type_ar' => 'اعدادات صفحة كيف نعمل',
            'type_en' => 'How We Work Page Settings',
            'is_object' => '1',
        ]);

        Setting::create([
            'key_id' => 'how_we_work_title_ar',
            'title_en' => 'How We Work Title Arabic',
            'title_ar' => 'عنوان كيف نعمل عربي',
            'value' => 'لدينا سير عمل يسمح بتنفيذ المهمة بشكل جيد',
            'set_group' => 'web',
            'type_ar' => 'اعدادات صفحة كيف نعمل',
            'type_en' => 'How We Work Page Settings',
            'is_object' => '1',
        ]);

        Setting::create([
            'key_id' => 'how_work_step1_title_en',
            'title_en' => 'Step 1 Title English',
            'title_ar' => 'عنوان الخطوة 1 انجليزي',
            'value' => 'Let’s talk about your company’s problems first',
            'set_group' => 'web',
            'type_ar' => 'اعدادات صفحة كيف نعمل',
            'type_en' => 'How We Work Page Settings',
            'is_object' => '1',
        ]);

        Setting::create([
            'key_id' => 'how_work_step1_title_ar',
            'title_en' => 'Step 1 Title Arabic',
            'title_ar' => 'عنوان الخطوة 1 عربي',
            'value' => 'دعنا نتحدث أولاً عن مشكلات شركتك',
            'set_group' => 'web',
            'type_ar' => 'اعدادات صفحة كيف نعمل',
            'type_en' => 'How We Work Page Settings',
            'is_object' => '1',
        ]);

        Setting::create([
            'key_id' => 'how_work_step1_desc_en',
            'title_en' => 'Step 1 Description English',
            'title_ar' => 'وصف الخطوة 1 انجليزي',
            'value' => 'After submitting the quote form, we will review the data. Then we will contact you. You discuss with the team regarding your problem and find a solution to what application to build.',
            'set_group' => 'web',
            'type_ar' => 'اعدادات صفحة كيف نعمل',
            'type_en' => 'How We Work Page Settings',
            'is_object' => '1',
        ]);

        Setting::create([
            'key_id' => 'how_work_step1_desc_ar',
            'title_en' => 'Step 1 Description Arabic',
            'title_ar' => 'وصف الخطوة 1 عربي',
            'value' => 'بعد إرسال نموذج الطلب، سنراجع البيانات ونتواصل معك لمناقشة المشكلة وإيجاد حل لتطبيق مناسب.',
            'set_group' => 'web',
            'type_ar' => 'اعدادات صفحة كيف نعمل',
            'type_en' => 'How We Work Page Settings',
            'is_object' => '1',
        ]);

        Setting::create([
            'key_id' => 'how_work_step2_title_en',
            'title_en' => 'Step 2 Title English',
            'title_ar' => 'عنوان الخطوة 2 انجليزي',
            'value' => 'Doing planning, design and development until everything is finished',
            'set_group' => 'web',
            'type_ar' => 'اعدادات صفحة كيف نعمل',
            'type_en' => 'How We Work Page Settings',
            'is_object' => '1',
        ]);

        Setting::create([
            'key_id' => 'how_work_step2_title_ar',
            'title_en' => 'Step 2 Title Arabic',
            'title_ar' => 'عنوان الخطوة 2 عربي',
            'value' => 'نقوم بالتخطيط والتصميم والتطوير حتى يتم الانتهاء من كل شيء',
            'set_group' => 'web',
            'type_ar' => 'اعدادات صفحة كيف نعمل',
            'type_en' => 'How We Work Page Settings',
            'is_object' => '1',
        ]);

        Setting::create([
            'key_id' => 'how_work_step2_desc_en',
            'title_en' => 'Step 2 Description English',
            'title_ar' => 'وصف الخطوة 2 انجليزي',
            'value' => 'With everything agreed upon, our team will make plans related to the application that will be created. Starting from analysis, design, to development.',
            'set_group' => 'web',
            'type_ar' => 'اعدادات صفحة كيف نعمل',
            'type_en' => 'How We Work Page Settings',
            'is_object' => '1',
        ]);

        Setting::create([
            'key_id' => 'how_work_step2_desc_ar',
            'title_en' => 'Step 2 Description Arabic',
            'title_ar' => 'وصف الخطوة 2 عربي',
            'value' => 'بعد الاتفاق على كل شيء، يقوم فريقنا بالتخطيط للتطبيق من حيث التحليل والتصميم والتطوير.',
            'set_group' => 'web',
            'type_ar' => 'اعدادات صفحة كيف نعمل',
            'type_en' => 'How We Work Page Settings',
            'is_object' => '1',
        ]);

        Setting::create([
            'key_id' => 'how_work_step3_title_en',
            'title_en' => 'Step 3 Title English',
            'title_ar' => 'عنوان الخطوة 3 انجليزي',
            'value' => 'The project is complete and we ship all the project assets, and access to the server',
            'set_group' => 'web',
            'type_ar' => 'اعدادات صفحة كيف نعمل',
            'type_en' => 'How We Work Page Settings',
            'is_object' => '1',
        ]);

        Setting::create([
            'key_id' => 'how_work_step3_title_ar',
            'title_en' => 'Step 3 Title Arabic',
            'title_ar' => 'عنوان الخطوة 3 عربي',
            'value' => 'اكتمل المشروع ونرسل جميع ملفات المشروع والوصول إلى الخادم',
            'set_group' => 'web',
            'type_ar' => 'اعدادات صفحة كيف نعمل',
            'type_en' => 'How We Work Page Settings',
            'is_object' => '1',
        ]);

        Setting::create([
            'key_id' => 'how_work_step3_desc_en',
            'title_en' => 'Step 3 Description English',
            'title_ar' => 'وصف الخطوة 3 انجليزي',
            'value' => 'We will be responsible for delivering all the project assets to you. These assets include: design files, source code, server access, and more.',
            'set_group' => 'web',
            'type_ar' => 'اعدادات صفحة كيف نعمل',
            'type_en' => 'How We Work Page Settings',
            'is_object' => '1',
        ]);

        Setting::create([
            'key_id' => 'how_work_step3_desc_ar',
            'title_en' => 'Step 3 Description Arabic',
            'title_ar' => 'وصف الخطوة 3 عربي',
            'value' => 'سنقوم بتسليم جميع ملفات المشروع بما في ذلك التصميم، الكود، وبيانات الدخول إلى الخادم.',
            'set_group' => 'web',
            'type_ar' => 'اعدادات صفحة كيف نعمل',
            'type_en' => 'How We Work Page Settings',
            'is_object' => '1',
        ]);

        Setting::create([
            'key_id' => 'how_work_step1_image',
            'title_en' => 'Step 1 Image',
            'title_ar' => 'صورة الخطوة 1',
            'value' => 'img/HowItWork1.png',
            'set_group' => 'web',
            'type_ar' => 'اعدادات صفحة كيف نعمل',
            'type_en' => 'How We Work Page Settings',
            'is_object' => '1',
        ]);

        Setting::create([
            'key_id' => 'how_work_step2_image',
            'title_en' => 'Step 2 Image',
            'title_ar' => 'صورة الخطوة 2',
            'value' => 'img/HowItWork2.png',
            'set_group' => 'web',
            'type_ar' => 'اعدادات صفحة كيف نعمل',
            'type_en' => 'How We Work Page Settings',
            'is_object' => '1',
        ]);

        Setting::create([
            'key_id' => 'how_work_step3_image',
            'title_en' => 'Step 3 Image',
            'title_ar' => 'صورة الخطوة 3',
            'value' => 'img/HowItWork3.png',
            'set_group' => 'web',
            'type_ar' => 'اعدادات صفحة كيف نعمل',
            'type_en' => 'How We Work Page Settings',
            'is_object' => '1',
        ]);


        // about page
        Setting::create([
            'key_id' => 'about_page_title_en',
            'title_en' => 'About Page Title English',
            'title_ar' => 'عنوان صفحة من نحن انجليزي',
            'value' => 'We are creative, smart and hardworking people',
            'set_group' => 'web',
            'type_ar' => 'اعدادات صفحة من نحن',
            'type_en' => 'About Page Settings',
            'is_object' => '1',
        ]);

        Setting::create([
            'key_id' => 'about_page_title_ar',
            'title_en' => 'About Page Title Arabic',
            'title_ar' => 'عنوان صفحة من نحن عربي',
            'value' => 'نحن أشخاص مبدعون وذكيون ونجتهد في العمل',
            'set_group' => 'web',
            'type_ar' => 'اعدادات صفحة من نحن',
            'type_en' => 'About Page Settings',
            'is_object' => '1',
        ]);

        Setting::create([
            'key_id' => 'about_page_desc_en',
            'title_en' => 'About Page Description English',
            'title_ar' => 'وصف صفحة من نحن انجليزي',
            'value' => 'Several creative individuals come together in the same place — this is Ocean. We collaborate to achieve the best results, loved by clients and comfortable for users. Here, we maintain a spirit of unity despite our different backgrounds, as everyone here is an expert in their respective fields.',
            'set_group' => 'web',
            'type_ar' => 'اعدادات صفحة من نحن',
            'type_en' => 'About Page Settings',
            'is_object' => '1',
        ]);

        Setting::create([
            'key_id' => 'about_page_desc_ar',
            'title_en' => 'About Page Description Arabic',
            'title_ar' => 'وصف صفحة من نحن عربي',
            'value' => 'يجتمع العديد من الأفراد المبدعين في مكان واحد — هذا هو أوشن. نتعاون لتحقيق أفضل النتائج، محبوبة من قبل العملاء ومريحة للمستخدمين. نحافظ على روح الوحدة على الرغم من اختلاف خلفياتنا، فكل شخص هنا خبير في مجاله.',
            'set_group' => 'web',
            'type_ar' => 'اعدادات صفحة من نحن',
            'type_en' => 'About Page Settings',
            'is_object' => '1',
        ]);

        Setting::create([
            'key_id' => 'about_page_image_1',
            'title_en' => 'About Page Main Image',
            'title_ar' => 'الصورة الرئيسية لصفحة من نحن',
            'value' => 'img/about_1.png',
            'set_group' => 'web',
            'type_ar' => 'اعدادات صفحة من نحن',
            'type_en' => 'About Page Settings',
            'is_object' => '1',
        ]);

        Setting::create([
            'key_id' => 'about_page_image_2',
            'title_en' => 'About Page Secondary Image',
            'title_ar' => 'الصورة الثانوية لصفحة من نحن',
            'value' => 'img/about_2.png',
            'set_group' => 'web',
            'type_ar' => 'اعدادات صفحة من نحن',
            'type_en' => 'About Page Settings',
            'is_object' => '1',
        ]);

        Setting::create([
            'key_id' => 'about_team_title_en',
            'title_en' => 'About Page Team Title English',
            'title_ar' => 'عنوان قسم الفريق في صفحة من نحن انجليزي',
            'value' => 'Meet the team! All creative people are here',
            'set_group' => 'web',
            'type_ar' => 'اعدادات صفحة من نحن',
            'type_en' => 'About Page Settings',
            'is_object' => '1',
        ]);

        Setting::create([
            'key_id' => 'about_team_title_ar',
            'title_en' => 'About Page Team Title Arabic',
            'title_ar' => 'عنوان قسم الفريق في صفحة من نحن عربي',
            'value' => 'تعرف على الفريق! جميع الأشخاص المبدعين هنا',
            'set_group' => 'web',
            'type_ar' => 'اعدادات صفحة من نحن',
            'type_en' => 'About Page Settings',
            'is_object' => '1',
        ]);

        // contact us page
        Setting::create([
            'key_id' => 'contactus_title_en',
            'title_en' => 'Contact Page Title English',
            'title_ar' => 'عنوان صفحة التواصل انجليزي',
            'value' => 'Contact us',
            'set_group' => 'web',
            'type_ar' => 'اعدادات صفحة اتصل بنا',
            'type_en' => 'Contact Page Settings',
            'is_object' => '1',
        ]);

        Setting::create([
            'key_id' => 'contactus_title_ar',
            'title_en' => 'Contact Page Title Arabic',
            'title_ar' => 'عنوان صفحة التواصل عربي',
            'value' => 'تواصل معنا',
            'set_group' => 'web',
            'type_ar' => 'اعدادات صفحة اتصل بنا',
            'type_en' => 'Contact Page Settings',
            'is_object' => '1',
        ]);

        Setting::create([
            'key_id' => 'contactus_intro_en',
            'title_en' => 'Contact Page Intro Text English',
            'title_ar' => 'مقدمة صفحة التواصل انجليزي',
            'value' => "Reach out to us, and let's build a world full of creativity together with Ocean — where innovative programming meets stunning design!",
            'set_group' => 'web',
            'type_ar' => 'اعدادات صفحة اتصل بنا',
            'type_en' => 'Contact Page Settings',
            'is_object' => '1',
        ]);

        Setting::create([
            'key_id' => 'contactus_intro_ar',
            'title_en' => 'Contact Page Intro Text Arabic',
            'title_ar' => 'مقدمة صفحة التواصل عربي',
            'value' => 'تواصل معنا، ولنبتكر معًا عالماً مليئاً بالإبداع من خلال Ocean، حيث يلتقي البرمجة المبتكرة بالتصميم المذهل!',
            'set_group' => 'web',
            'type_ar' => 'اعدادات صفحة اتصل بنا',
            'type_en' => 'Contact Page Settings',
            'is_object' => '1',
        ]);

        Setting::create([
            'key_id' => 'contactus_form_heading_en',
            'title_en' => 'Contact Page Form Heading English',
            'title_ar' => 'عنوان قسم الفورم انجليزي',
            'value' => 'Fill up the form and our Team will get back to you within 24 hours.',
            'set_group' => 'web',
            'type_ar' => 'اعدادات صفحة اتصل بنا',
            'type_en' => 'Contact Page Settings',
            'is_object' => '1',
        ]);

        Setting::create([
            'key_id' => 'contactus_form_heading_ar',
            'title_en' => 'Contact Page Form Heading Arabic',
            'title_ar' => 'عنوان قسم الفورم عربي',
            'value' => 'املأ النموذج وسنقوم بالرد عليك خلال 24 ساعة.',
            'set_group' => 'web',
            'type_ar' => 'اعدادات صفحة اتصل بنا',
            'type_en' => 'Contact Page Settings',
            'is_object' => '1',
        ]);

        Setting::create([
            'key_id' => 'contactus_form_desc_en',
            'title_en' => 'Contact Page Form Description English',
            'title_ar' => 'وصف قسم الفورم انجليزي',
            'value' => "We’d love to hear from you! Whether you have questions, need support, or want to discuss a potential project, feel free to reach out to us through any of the following methods:",
            'set_group' => 'web',
            'type_ar' => 'اعدادات صفحة اتصل بنا',
            'type_en' => 'Contact Page Settings',
            'is_object' => '1',
        ]);

        Setting::create([
            'key_id' => 'contactus_form_desc_ar',
            'title_en' => 'Contact Page Form Description Arabic',
            'title_ar' => 'وصف قسم الفورم عربي',
            'value' => 'يسعدنا التواصل معك! سواء كان لديك استفسارات، أو تحتاج إلى دعم، أو ترغب في مناقشة مشروع محتمل، لا تتردد في التواصل معنا بأي من الطرق التالية:',
            'set_group' => 'web',
            'type_ar' => 'اعدادات صفحة اتصل بنا',
            'type_en' => 'Contact Page Settings',
            'is_object' => '1',
        ]);



    }
}
