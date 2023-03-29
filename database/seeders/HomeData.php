<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomeData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('about_us')->insert([
            'vision'   => '1خدمة قطاع الاعمال مثل شركات المقاولات والمصانع وشركات الاستقدام وشركات التأمين ومكاتب المحاماة والاستشارات القانونية واستشارات الاعمال والخدمات
            ',
            'mission'      => 'تهدف الي إتاحة الوصول الي الخدمات الإلكترونية الحكومية وتنفيذ التعاملات بها سواء للموظفين والمقيمين والشركات والزوار من اي مكان
            ',
            'description'     => 'منصة للخدمات الالكترونية تجمع بين العملاء و مقدمي الخدمات في السعودية .
            ',
            'l1'     => '"لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور
            ',
            'l2'     => '"لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور
            ',
            'l3'     => '"لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور
            ',

          ]);


          DB::table('home_hero_banners')->insert([
            'sub_title'   => 'تعرف علي الخدمات والبرامج
            ',
            'title'      => 'حلول افضل لعملك
            ',
            'description'     => 'منصة للخدمات الالكترونية تجمع بين العملاء و مقدمي الخدمات في السعودية .
            ',
            'button'     => 'ابدأ الان',
            'image' => 'upload/hero/hero-img.png',

          ]);

          DB::table('how_does_it_works')->insert([
            'tab1'   => 'خطوات تنفيذ الخدمة',
            'tab2'      => '
            الضوابط والشروط
           ',
            'tab3'     => ' المستندات المطلوبة',
            'tab11'     => '"لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور
',
            'tab12'     => '"لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور
',
            'tab13'     => '"لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور
',
            'tab14'     => '"لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور
',
            'tab21'     => '"لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور
',
            'tab22'     => '"لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور
',
            'tab23'     => '"لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور
',
            'tab24'     => '"لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور
',
            'tab31'     => '"لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور
',
            'tab32'     => '"لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور
',
            'tab33'     => '"لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور
',
            'tab34'     => '"لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور
',
          ]);


 DB::table('for_provider_sections')->insert([
          'description'   => 'ساهم التحول الرقمي السريع للجهات في خلق فرص عمل جديدة ، وتأتي أهمية المنصة في دعم هذا التحول بنشر المفاهيم و المعلومات و التعريف بالخدمات الإلكترونية لتساند مقدمي الخدمات على إيجاد فرص عمل عن بعد في أي وقت و من أي مدينة ..
          ',
          'title1'      => 'كن مدير نفسك',
          'description1'     => 'لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور',
          'title2'      => ' تحكم بدخلك',
          'description2'     => 'لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور',
          'title3'      => 'تحكم بحياتك',
          'description3'     => 'لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور',
          'image' => 'upload/provider/why-us.png'
        ]);



    DB::table('for_requester_sections')->insert([
        'description'   => 'خدمة المستفيدين في قطاع الأعمال مثل شركات المقاولات والمصانع و شركات الاستقدام و شركات التأمين و مكاتب المحاماة والاستشارات القانونية و استشارات الأعمال و الخدمات

        ',
        'title1'      => 'لوريم ايبسوم',
        'description1'     => 'لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور',
        'title2'      => 'لوريم ايبسوم',
        'description2'     => 'لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور',
        'title3'      => 'لوريم ايبسوم',
        'description3'     => 'لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور',
        'title4'      => 'لوريم ايبسوم',
        'description4'     => 'لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور',

    ]);


    DB::table('services')->insert([
        'title'   => 'الإستشارات القانونية        ',
        'description'      => 'تقدم خبراتها الاحترافية في باقات متميزة لإدارة خدمات الشركات عن بُعد لنصل بكم إلى حد الاكتفاء و تقليص تكاليف التشغيل لديكم لأدنى حد ممكن

        ',

      ]);

      DB::table('services')->insert([
        'title'   => 'إدارة خدمات الشركات',
        'description'      => 'خدمات الأعمال نتعاون مع مجموعة واسعة من المكاتب الاستشارية والخدمات القانونية لدعم العملاء في كافة المجالات القانونية

        ',

      ]);
      DB::table('services')->insert([
        'title'   => 'استشارات الأعمال'        ,
        'description'      => 'يختص بالشؤون التجارية وتأسيس الأعمال والعلاقات و التوكيلات

        ',

      ]);
      DB::table('services')->insert([
        'title'   => 'VIP',
        'description'      => '"لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور

        ',

      ]);

      DB::table('c_t_a_s')->insert([
        'title'   => 'هل انت جاهز؟
        ',
        'description'      => '"لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور

        ',

      ]);

      DB::table('faqs')->insert([
        'question'   => 'كيف أقدم طلب ؟',
        'answer'      => 'يمكنك التواصل مع مقدم الخدمة الذي يناسبك والاتفاق على تفاصيل الخدمة و السعر .

        ',

      ]);
      DB::table('faqs')->insert([
        'question'   => 'كيف أضمن حقوقي ؟',
        'answer'      => 'المنصة لا تسلم قيمة الخدمة إلى مقدم الخدمة حتى يؤكد صاحب الطلب استلام الخدمة

        ',

      ]);
      DB::table('faqs')->insert([
        'question'   => 'أنا مقدم خدمة , متى يمكنني المباشرة بالعمل؟',
        'answer'      => 'مجرد أن تملك المعلومات اللازمة والمعرفة الجيدة في دليل خدمات الأفراد ودليل خدمات قطاع الأعمال يمكنك مباشرة العمل!

        ',

      ]);

      DB::table('socials')->insert([
        'facebook'   => 'https://www.facebook.com/',
        'tw'      => 'https://twitter.com/',
        'insta'      => 'https://www.instagram.com/',
        'linkedin'      => 'http://127.0.0.1:8000/linkedin.com',
        'youtube'      => 'https://youtube.com/',

      ]);

      DB::table('req_services')->insert([

        'services'      => 'الإستشارات القانونية',

      ]);
      DB::table('req_services')->insert([

        'services'      => 'إدارة خدمات الشركات',

      ]);
      DB::table('req_services')->insert([

        'services'      => 'استشارات الأعمال',

      ]);


      DB::table('req_statuses')->insert([
        'status'      => 'مفتوح',

      ]);
      DB::table('req_statuses')->insert([
        'status'      => 'جاري تنفيذ الطلب',

      ]);
      DB::table('req_statuses')->insert([
        'status'      => 'اكتمل',

      ]);
      DB::table('req_statuses')->insert([
        'status'      => 'ملغي',

      ]);

      DB::table('terms_conditions')->insert([
        'terms'      => '
        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.

        ',

      ]);

      DB::table('rates')->insert([
        'req_rate'      => '20',
        'prov_rate'      => '20',


      ]);



    }
}