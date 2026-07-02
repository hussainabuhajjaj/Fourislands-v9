<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Faq;
use App\Models\Image;
use App\Models\Page;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Slider;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    public function run()
    {
        $this->seedSettings();
        $this->seedPages();
        $this->seedServices();
        $this->seedProducts();
        $this->seedPartners();
        $this->seedSliders();
        $this->seedAddresses();
        $this->seedFaqs();
    }

    protected function seedSettings()
    {
        $settings = [
            ['key' => 'phone', 'value' => '+965 2225 5565'],
            ['key' => 'email', 'value' => 'info@fourislands.com'],
            ['key' => 'address', 'value' => 'Kuwait - Qibla, Dawliya complex, office 61, Ground Floor'],
            ['key' => 'facebook', 'value' => 'https://facebook.com/fourislands'],
            ['key' => 'twitter', 'value' => 'https://twitter.com/fourislands'],
            ['key' => 'instagram', 'value' => 'https://instagram.com/fourislands'],
            ['key' => 'linkedin', 'value' => 'https://linkedin.com/company/fourislands-est'],
        ];
        foreach ($settings as $s) {
            Setting::firstOrCreate(['key' => $s['key']], ['value' => $s['value']]);
        }
        $this->command->info('Settings seeded.');
    }

    protected function seedPages()
    {
        $about = Page::firstOrCreate(['id' => 36]);
        $about->translations()->delete();
        $about->translations()->createMany([
            ['locale' => 'en', 'title' => 'About Four Islands EST.', 'content' => '
<p>Founded in 1987 in the State of Kuwait, <strong>Four Islands EST. for General Trading and Contracting</strong> has established itself as a distinguished and trusted partner in aviation support, spare parts supply, and international trading. With a legacy spanning more than 39 years, we have consistently delivered excellence across borders, supplying certified aircraft parts, OEM spare parts, and premium industrial products to a diverse and growing customer base spanning over 30 countries.</p>
<p>Our operational footprint extends across the United Kingdom, continental Europe, the Middle East and North Africa, Sub-Saharan Africa, the Far East, and the Americas. This global reach is underpinned by a robust supply chain network, deep industry relationships, and an unwavering commitment to quality assurance at every stage of the procurement and delivery process.</p>
<p>At the helm of our organisation is <strong>Mr. Mohammad Abdulmohsen Mohammad Al Saifi</strong>, whose strategic vision, integrity-driven leadership, and deep understanding of the regional and international markets have been instrumental in transforming Four Islands from a local trading enterprise into a globally recognised supplier of choice for aviation and industrial clients. Under his guidance, the company has cultivated enduring partnerships with leading manufacturers and built a reputation for reliability, professionalism, and operational excellence.</p>
<p>Our core areas of specialisation encompass aviation support services, aircraft parts and ground support equipment supply, OEM and aftermarket spare parts distribution, general trading and procurement, contracting and project management, logistics and supply chain management, and engineering and technical services. Our clients include airlines, MRO facilities, industrial enterprises, government institutions, and commercial organisations across the globe.</p>
<p>At Four Islands EST., we believe that business is built on relationships. Every engagement is approached with a commitment to understanding our clients&rsquo; unique requirements and delivering tailored solutions that drive measurable value. We do not merely supply products &mdash; we provide peace of mind, consistency, and a standard of service that has earned us the trust of industry leaders across the globe.</p>
            '],
            ['locale' => 'ar', 'title' => 'عن مؤسسة الجزر الأربعة', 'content' => '
<p>تأسست <strong>مؤسسة الجزر الأربعة للتجارة العامة والمقاولات</strong> في الكويت عام 1987، لترسخ مكانتها كشريك متميز وموثوق في دعم الطيران وتوريد قطع الغيار والتجارة الدولية. وعلى مدى أكثر من 39 عاماً، التزمنا بتقديم التميز عبر الحدود، موردين قطع طيران معتمدة وقطع غيار أصلية ومنتجات صناعية فاخرة لقاعدة عملاء متنوعة ومتنامية تمتد لأكثر من 30 دولة.</p>
<p>يمتد بصمنا التشغيلي عبر المملكة المتحدة وأوروبا القارية والشرق الأوسط وشمال أفريقيا وأفريقيا جنوب الصحراء والشرق الأقصى والأمريكتين. هذا الانتشار العالمي مدعوم بشبكة سلسلة توريد قوية وعلاقات صناعية عميقة والتزام راسخ بضمان الجودة في كل مرحلة من مراحل الشراء والتسليم.</p>
<p>على رأس مؤسستنا <strong>السيد محمد عبد المحسن محمد الصائفي</strong>، الذي كانت رؤيته الاستراتيجية وقيادته القائمة على النزاهة وفهمه العميق للأسواق الإقليمية والدولية فعالة في تحويل الجزر الأربعة من مؤسسة تجارية محلية إلى مورد عالمي مرموق لعملاء الطيران والصناعة. تحت توجيهاته، بنت الشركة شراكات دائمة مع كبار المصنعين وبنيت سمعة مرتكزة على الموثوقية والاحترافية والتميز التشغيلي.</p>
<p>تشمل مجالات تخصصنا الرئيسية خدمات دعم الطيران وتوريد قطع ومعدات الطيران وتوزيع قطع الغيار الأصلية والبديلة والتجارة العامة والمشتريات والمقاولات وإدارة المشاريع والخدمات اللوجستية وسلسلة التوريد والخدمات الهندسية والفنية. يشمل عملاؤنا شركات الطيران ومرافق الصيانة والإصلاح والعمرة والمؤسسات الصناعية والهيئات الحكومية والمنظمات التجارية في جميع أنحاء العالم.</p>
<p>في مؤسسة الجزر الأربعة، نؤمن بأن الأعمال تُبنى على العلاقات. كل تعامل يُقترب منه بالتزام بفهم المتطلبات الفريدة لعملائنا وتقديم حلول مخصصة تحقق قيمة ملموسة. نحن لا نورد المنتجات فحسب &mdash; بل نقدم راحة البال والثبات ومعياراً من الخدمة أكسبنا ثقة قادة الصناعة في جميع أنحاء العالم.</p>
            '],
        ]);

        $mission = Page::firstOrCreate(['id' => 35]);
        $mission->translations()->delete();
        $mission->translations()->createMany([
            ['locale' => 'en', 'title' => 'Our Mission', 'content' => '<p>To deliver world-class trading and contracting solutions that consistently exceed our clients&rsquo; expectations, fostering enduring partnerships founded on trust, reliability, integrity, and an uncompromising commitment to excellence in every project we undertake. We strive to create measurable value for our clients, our partners, and the communities we serve through innovative thinking, operational efficiency, and the highest standards of quality and safety.</p>'],
            ['locale' => 'ar', 'title' => 'رسالتنا', 'content' => '<p>تقديم حلول تجارية ومقاولات عالمية المستوى تتجاوز باستمرار توقعات عملائنا، وتعزيز شراكات دائمة قائمة على الثقة والموثوقية والنزاهة والالتزام الراسخ بالتميز في كل مشروع ننفذه. نسعى جاهدين لخلق قيمة ملموسة لعملائنا وشركائنا والمجتمعات التي نخدمها من خلال التفكير الابتكاري والكفاءة التشغيلية وأعلى معايير الجودة والسلامة.</p>'],
        ]);

        $vision = Page::firstOrCreate(['id' => 37]);
        $vision->translations()->delete();
        $vision->translations()->createMany([
            ['locale' => 'en', 'title' => 'Our Vision', 'content' => '<p>To be the premier trading and contracting partner of choice across the region, globally recognised for our unwavering commitment to quality, continuous innovation, exceptional customer service, and sustainable business practices. We aspire to set the benchmark for excellence in every market we serve, empowering our clients&rsquo; success through reliable, forward-thinking, and value-driven partnerships.</p>'],
            ['locale' => 'ar', 'title' => 'رؤيتنا', 'content' => '<p>أن نكون الشريك التجاري والمقاولات الأول المختار في جميع أنحاء المنطقة، معترفاً بنا عالمياً لالتزامنا الراسخ بالجودة والابتكار المستمر وخدمة العملاء الاستثنائية والممارسات التجارية المستدامة. نطمح لوضع المعيار للتميز في كل سوق نخدمه، وتمكين نجاح عملائنا من خلال شراكات موثوقة واستشرافية وقائمة على القيمة.</p>'],
        ]);

        $this->command->info('Pages seeded.');
    }

    protected function seedServices()
    {
        $services = [
            [
                'image' => null, 'is_home' => 1,
                'en' => ['title' => 'Aviation Support', 'description' => 'As our flagship service, we provide comprehensive supply chain and support solutions for the aviation industry. We specialise in the procurement and supply of fully certified aircraft parts, airframe and engine components, avionics, ground support equipment (GSE), and aviation-grade consumables. Every product we supply complies with EASA, FAA, and ICAO regulations and is backed by full traceability, manufacturer certificates of conformance, and comprehensive warranty coverage. Our deep understanding of aviation regulations and supply chain dynamics enables us to serve airlines, MRO facilities, cargo operators, and ground handling companies with speed, accuracy, and absolute reliability across 30+ countries.'],
                'ar' => ['title' => 'دعم الطيران', 'description' => 'كخدمتنا الرئيسية، نقدم حلولاً شاملة لسلسلة التوريد والدعم لصناعة الطيران. نتخصص في شراء وتوريد قطع الطيران المعتمدة بالكامل ومكونات هيكل الطائرة والمحرك وإلكترونيات الطيران ومعدات الدعم الأرضي والمواد الاستهلاكية من الدرجة الجوية. كل منتج نقدمه يمتثل للوائح EASA وFAA وICAO ومدعوم بإمكانية التتبع الكاملة وشهادات المطابقة من الشركة المصنعة وتغطية ضمان شاملة. فهمنا العميق للوائح الطيران وديناميكيات سلسلة التوريد يمكننا من خدمة شركات الطيران ومرافق الصيانة والإصلاح والعمرة ومشغلي الشحن الجوي وشركات المناولة الأرضية بسرعة ودقة وموثوقية مطلقة في أكثر من 30 دولة.'],
            ],
            [
                'image' => null, 'is_home' => 1,
                'en' => ['title' => 'Spare Parts Supply', 'description' => 'We are a dedicated supplier of genuine OEM and high-quality aftermarket spare parts for both aviation and industrial applications. Our extensive catalogue includes aircraft spare parts, engine components, landing gear parts, hydraulic and pneumatic systems, electrical and electronic components, as well as industrial machinery parts, heavy equipment spares, and specialised consumables. Through our partnerships with leading global manufacturers and authorised distributors, we guarantee parts authenticity, competitive pricing, and rapid delivery. Our rigorous quality control and supply chain expertise ensure that every part we supply meets the exact specifications and performance standards required by our clients.'],
                'ar' => ['title' => 'توريد قطع الغيار', 'description' => 'نحن مورد متخصص لقطع الغيار الأصلية عالية الجودة لكل من تطبيقات الطيران والصناعة. تشمل قائمتنا الواسعة قطع غيار الطائرات ومكونات المحرك وأجزاء معدات الهبوط والأنظمة الهيدروليكية والهوائية والمكونات الكهربائية والإلكترونية بالإضافة إلى قطع غيار الآلات الصناعية وقطع غيار المعدات الثقيلة والمواد الاستهلاكية المتخصصة. من خلال شراكاتنا مع كبار المصنعين العالميين والموزعين المعتمدين، نضمن أصالة القطع والأسعار التنافسية والتسليم السريع. تضمن خبرتنا في مراقبة الجودة وسلسلة التوريد أن كل قطعة نوردها تلبي المواصفات الدقيقة ومعايير الأداء المطلوبة من قبل عملائنا.'],
            ],
            [
                'image' => null, 'is_home' => 1,
                'en' => ['title' => 'General Trading & Procurement', 'description' => 'We serve as a comprehensive procurement partner for aviation, industrial, and commercial clients worldwide. Leveraging our extensive global network and four decades of market intelligence, we source and supply a vast portfolio of products — from industrial machinery and heavy equipment to commercial supplies, construction materials, and institutional consumables. Our procurement model combines competitive pricing, rigorous quality assurance, and end-to-end logistics management, ensuring that every order is delivered on time, in full, and to the exact specifications required. We manage the entire supply chain so our clients can focus on their core operations with confidence.'],
                'ar' => ['title' => 'التجارة العامة والمشتريات', 'description' => 'نعمل كشريك شراء شامل لعملاء الطيران والصناعة والتجارة في جميع أنحاء العالم. بالاستفادة من شبكتنا العالمية الواسعة وأربعة عقود من المعرفة السوقية، نقوم بتوريد مجموعة واسعة من المنتجات — من الآلات الصناعية والمعدات الثقيلة إلى اللوازم التجارية ومواد البناء والمواد الاستهلاكية المؤسسية. يجمع نموذج المشتريات لدينا بين الأسعار التنافسية وضمان الجودة الصارم وإدارة الخدمات اللوجستية الشاملة، مما يضمن تسليم كل طلب في الوقت المحدد وبالكامل ووفقاً للمواصفات الدقيقة المطلوبة. ندير سلسلة التوريد بأكملها ليتمكن عملاؤنا من التركيز على عملياتهم الأساسية بثقة.'],
            ],
            [
                'image' => null, 'is_home' => 1,
                'en' => ['title' => 'Contracting & Project Management', 'description' => 'Our contracting division delivers professional, end-to-end project management and execution across construction, civil engineering, and infrastructure developments — with a specialised focus on aviation-related facilities including hangars, MRO workshops, and ground support infrastructure. We bring together a team of experienced engineers, project managers, and skilled tradespeople committed to delivering projects on time, within budget, and to the most exacting quality and safety standards. Every project benefits from rigorous planning, transparent communication, and a relentless focus on client satisfaction.'],
                'ar' => ['title' => 'المقاولات وإدارة المشاريع', 'description' => 'يقدم قسم المقاولات لدينا إدارة وتنفيذ مشاريع احترافية متكاملة في البناء والهندسة المدنية ومشاريع البنية التحتية — مع تركيز متخصص على مرافق الطيران بما في ذلك حظائر الطائرات وورش الصيانة والعمرة والبنية التحتية للدعم الأرضي. نضم فريقاً من المهندسين ذوي الخبرة ومديري المشاريع والعمال المهرة الملتزمين بتسليم المشاريع في الوقت المحدد وضمن الميزانية ووفقاً لأعلى معايير الجودة والسلامة. يستفيد كل مشروع من تخطيط دقيق وتواصل شفاف وتركيز دؤوب على رضا العملاء.'],
            ],
            [
                'image' => null, 'is_home' => 0,
                'en' => ['title' => 'Logistics & Supply Chain', 'description' => 'Our integrated logistics and supply chain services provide end-to-end support for the movement of goods across borders and continents — with particular expertise in handling time-critical aviation and industrial shipments. We offer multimodal freight forwarding, customs clearance, bonded warehousing, and last-mile delivery solutions tailored to the unique requirements of each client. With a focus on efficiency, security, and real-time visibility, our logistics team ensures that your supply chain operates seamlessly, reducing lead times and optimising costs at every stage.'],
                'ar' => ['title' => 'الخدمات اللوجستية وسلسلة التوريد', 'description' => 'توفر خدماتنا اللوجستية المتكاملة وسلسلة التوريد دعماً شاملاً لنقل البضائع عبر الحدود والقارات — مع خبرة خاصة في معالجة الشحنات الجوية والصناعية الحساسة زمنياً. نقدم حلول الشحن متعدد الوسائط والتخليص الجمركي والتخزين في المناطق الحرة والتسليم في الميل الأخير المصممة خصيصاً للمتطلبات الفريدة لكل عميل. مع التركيز على الكفاءة والأمان والرؤية الفورية، يضمن فريقنا اللوجستي أن تعمل سلسلة التوريد الخاصة بك بسلاسة، مما يقلل المهل الزمنية ويحسن التكاليف في كل مرحلة.'],
            ],
            [
                'image' => null, 'is_home' => 0,
                'en' => ['title' => 'Engineering & Technical Services', 'description' => 'We provide comprehensive engineering and technical services encompassing feasibility studies, design, project management, and construction supervision — with specialised expertise in aviation infrastructure, MRO facility planning, and industrial plant engineering. Our team of licensed engineers and technical specialists collaborates closely with clients to deliver innovative, sustainable, and cost-effective solutions for aviation, commercial, industrial, and institutional projects. From initial concept through to final handover, we ensure that every project is technically sound, compliant with local and international regulations, and delivered to the highest standards of quality and safety.'],
                'ar' => ['title' => 'الخدمات الهندسية والفنية', 'description' => 'نقدم خدمات هندسية وفنية شاملة تشمل دراسات الجدوى والتصميم وإدارة المشاريع والإشراف على البناء — مع خبرة متخصصة في البنية التحتية للطيران وتخطيط مرافق الصيانة والإصلاح والعمرة والهندسة الصناعية. يتعاون فريقنا من المهندسين المرخصين والمتخصصين الفنيين بشكل وثيق مع العملاء لتقديم حلول مبتكرة ومستدامة وفعالة من حيث التكلفة لمشاريع الطيران والتجارة والصناعة والمؤسسات. من المفهوم الأولي وحتى التسليم النهائي، نضمن أن كل مشروع سليم فنياً ومتوافق مع اللوائح المحلية والدولية ويتم تسليمه بأعلى معايير الجودة والسلامة.'],
            ],
        ];

        foreach ($services as $data) {
            $service = Service::create(['image' => $data['image'], 'is_home' => $data['is_home']]);
            foreach (['en', 'ar'] as $locale) {
                $service->translations()->create([
                    'locale' => $locale,
                    'title' => $data[$locale]['title'],
                    'description' => $data[$locale]['description'],
                ]);
            }
        }
        $this->command->info('Services seeded.');
    }

    protected function seedProducts()
    {
        $products = [
            [
                'image' => null,
                'en' => ['title' => 'Industrial Machinery', 'description' => 'Heavy-duty machinery and precision equipment for industrial applications, including manufacturing, processing, and material handling. Sourced directly from trusted global OEMs with full installation support, operator training, and comprehensive after-sales service packages.'],
                'ar' => ['title' => 'الآلات الصناعية', 'description' => 'آلات ثقيلة ومعدات دقيقة للتطبيقات الصناعية، تشمل التصنيع والمعالجة ومناولة المواد. يتم توريدها مباشرة من الشركات المصنعة الأصلية الموثوقة عالمياً مع دعم كامل للتركيب وتدريب المشغلين وحزم خدمة شاملة لما بعد البيع.'],
            ],
            [
                'image' => null,
                'en' => ['title' => 'Commercial Equipment', 'description' => 'A comprehensive range of commercial-grade equipment for businesses of all sizes, including office furnishings, retail fixtures, hospitality equipment, and operational supplies. Every product is selected for durability, functionality, and value.'],
                'ar' => ['title' => 'المعدات التجارية', 'description' => 'مجموعة شاملة من المعدات التجارية للشركات بجميع أحجامها، تشمل أثاث المكاتب وتركيبات التجزئة ومعدات الضيافة واللوازم التشغيلية. يتم اختيار كل منتج بعناية لضمان المتانة والوظائف والقيمة.'],
            ],
            [
                'image' => null,
                'en' => ['title' => 'Construction Materials', 'description' => 'Premium-grade construction and building materials for civil engineering and infrastructure projects of all scales. Our product range includes structural steel, cement and aggregates, finishing materials, waterproofing solutions, and specialised construction chemicals from leading international brands.'],
                'ar' => ['title' => 'مواد البناء', 'description' => 'مواد بناء وتشييد فاخرة لمشاريع الهندسة المدنية والبنية التحتية بجميع المقاييس. تشمل مجموعتنا المنتجة الصلب الإنشائي والأسمنت والركام ومواد التشطيب وحلول العزل المائي والمواد الكيميائية المتخصصة للبناء من علامات تجارية دولية رائدة.'],
            ],
            [
                'image' => null,
                'en' => ['title' => 'Aviation Parts & Equipment', 'description' => 'Fully certified aircraft parts, avionics components, ground support equipment, and aviation-grade consumables. All products comply with EASA, FAA, and ICAO regulations and are supplied with full traceability and manufacturer certificates of conformance.'],
                'ar' => ['title' => 'قطع ومعدات الطيران', 'description' => 'قطع طيران معتمدة بالكامل ومكونات إلكترونيات طيران ومعدات دعم أرضي ومواد استهلاكية من الدرجة الجوية. جميع المنتجات تتوافق مع لوائح EASA وFAA وICAO ويتم توريدها مع إمكانية التتبع الكاملة وشهادات المطابقة من الشركة المصنعة.'],
            ],
            [
                'image' => null,
                'en' => ['title' => 'Consumable Products', 'description' => 'A dependable, uninterrupted supply of everyday consumable products for institutional, commercial, and governmental use. Our catalogue spans cleaning and hygiene products, office stationery, safety equipment, packaging materials, and catering supplies sourced from world-class brands known for consistency and quality.'],
                'ar' => ['title' => 'المنتجات الاستهلاكية', 'description' => 'توريد موثوق ومستمر للمنتجات الاستهلاكية اليومية للاستخدام المؤسسي والتجاري والحكومي. تشمل قائمتنا منتجات التنظيف والنظافة والقرطاسية المكتبية ومعدات السلامة ومواد التغليف ولوازم التموين من علامات تجارية عالمية معروفة بالثبات والجودة.'],
            ],
            [
                'image' => null,
                'en' => ['title' => 'Logistics Solutions', 'description' => 'Integrated third-party logistics and supply chain management solutions encompassing strategic warehousing, inventory management, order fulfilment, distribution, and international freight forwarding across air, sea, and land. Our solutions are custom-engineered to optimise your supply chain efficiency and reduce total landed cost.'],
                'ar' => ['title' => 'حلول لوجستية', 'description' => 'حلول لوجستية متكاملة من طرف ثالث وإدارة سلسلة التوريد تشمل التخزين الاستراتيجي وإدارة المخزون وتنفيذ الطلبات والتوزيع والشحن الدولي جوياً وبحراً وبراً. تم تصميم حلولنا خصيصاً لتحسين كفاءة سلسلة التوريد الخاصة بك وتقليل التكلفة الإجمالية.'],
            ],
        ];

        foreach ($products as $data) {
            $product = Product::create(['image' => $data['image']]);
            foreach (['en', 'ar'] as $locale) {
                $product->translations()->create([
                    'locale' => $locale,
                    'title' => $data[$locale]['title'],
                    'description' => $data[$locale]['description'],
                ]);
            }
        }
        $this->command->info('Products seeded.');
    }

    protected function seedPartners()
    {
        $partners = [
            'Kuwait Petroleum Corporation (KPC)',
            'Boubyan Petrochemical Company',
            'Alghanim Industries',
            'National Bank of Kuwait (NBK)',
            'Zain Telecom',
            'Agility Logistics',
            'Mabanee Company (Avenues Mall)',
            'KIPCO',
            'Kuwait Airways',
            'United Gulf Bank',
            'Gulf Cable & Electrical Industries',
            'Kuwait Flour Mills & Bakeries Company',
        ];
        foreach ($partners as $name) {
            Partner::firstOrCreate(['name' => $name, 'image' => 'NewFront/img/clients/' . str_replace(' ', '_', $name) . '.png']);
        }
        $this->command->info('Partners seeded.');
    }

    protected function seedSliders()
    {
        $images = ['NewFront/img/slider/slide1.jpg', 'NewFront/img/slider/slide2.jpg', 'NewFront/img/slider/slide3.jpg'];
        $slides = [
            ['en' => ['title' => 'Premier Aviation Support & Spare Parts Supply', 'short_description' => 'Delivering certified aviation parts, OEM spare parts, and world-class procurement services to airlines, MRO facilities, and industrial clients across 30+ countries since 1987.'],
             'ar' => ['title' => 'الريادة في دعم الطيران وتوريد قطع الغيار', 'short_description' => 'نقدم قطع طيران معتمدة وقطع غيار أصلية وخدمات شراء عالمية لشركات الطيران ومرافق الصيانة والعملاء الصناعيين في أكثر من 30 دولة منذ 1987.']],
            ['en' => ['title' => 'Global Aviation Supply Chain', 'short_description' => 'Serving a diverse international clientele across the United Kingdom, Europe, the Middle East, Africa, the Far East, and the Americas — combining global sourcing capabilities with deep aviation industry expertise and personal service.'],
             'ar' => ['title' => 'سلسلة توريد طيران عالمية', 'short_description' => 'نخدم عملاء دوليين متنوعين عبر المملكة المتحدة وأوروبا والشرق الأوسط وأفريقيا والشرق الأقصى والأمريكتين — نجمع بين قدرات التوريد العالمية والخبرة العميقة في صناعة الطيران والخدمة الشخصية.']],
            ['en' => ['title' => 'Certified Quality & Traceability', 'short_description' => 'Every aviation product we supply meets stringent EASA, FAA, and ICAO standards, backed by full traceability and manufacturer certifications. Quality is not just a promise — it is the foundation of everything we do.'],
             'ar' => ['title' => 'جودة معتمدة وإمكانية تتبع كاملة', 'short_description' => 'كل منتج طيران نقدمه يلبي معايير EASA وFAA وICAO الصارمة، مدعوم بإمكانية التتبع الكاملة وشهادات الشركة المصنعة. الجودة ليست مجرد وعد — بل هي أساس كل ما نقوم به.']],
        ];

        foreach ($slides as $i => $data) {
            $img = Image::firstOrCreate(
                ['path' => $images[$i] ?? 'NewFront/img/banner2.jpg'],
                ['name' => 'Slide ' . ($i + 1), 'size' => '0']
            );
            $slider = Slider::create(['image' => $img->id]);
            foreach (['en', 'ar'] as $locale) {
                $slider->translations()->create([
                    'locale' => $locale,
                    'title' => $data[$locale]['title'],
                    'short_description' => $data[$locale]['short_description'],
                ]);
            }
        }
        $this->command->info('Sliders seeded.');
    }

    protected function seedAddresses()
    {
        $addresses = [
            ['image' => null, 'phone' => '+965 2225 5565', 'email' => 'info@fourislands.com',
             'en' => ['city' => 'Kuwait City', 'address' => 'Qibla, Dawliya complex, office 61, Ground Floor'],
             'ar' => ['city' => 'مدينة الكويت', 'address' => 'القبلة، مجمع الدويلة، مكتب 61، الدور الأرضي']],
            ['image' => null, 'phone' => '+41 22 123 4567', 'email' => 'europe@fourislands.com',
             'en' => ['city' => 'Geneva', 'address' => 'Rue de la Croix-d\'Or 17, 1204 Geneva, Switzerland'],
             'ar' => ['city' => 'جنيف', 'address' => '17 شارع دي لا كروا دور، 1204 جنيف، سويسرا']],
        ];

        foreach ($addresses as $data) {
            $address = Address::create(['image' => $data['image'], 'phone' => $data['phone'], 'email' => $data['email']]);
            foreach (['en', 'ar'] as $locale) {
                $address->translations()->create([
                    'locale' => $locale,
                    'city' => $data[$locale]['city'],
                    'address' => $data[$locale]['address'],
                ]);
            }
        }
        $this->command->info('Addresses seeded.');
    }

    protected function seedFaqs()
    {
        $faqs = [
            ['ordering' => 1,
             'en' => ['question' => 'What does Four Islands EST. specialise in?', 'answer' => 'Four Islands EST. is primarily a provider of comprehensive aviation support and spare parts supply services. Our core expertise encompasses the procurement and supply of certified aircraft parts, engine components, avionics, ground support equipment, and OEM/aftermarket spare parts for aviation and industrial applications. We also provide general trading and procurement, contracting, logistics, and engineering services — all underpinned by four decades of experience and a global supply chain network spanning 30+ countries.'],
             'ar' => ['question' => 'فيما تتخصص مؤسسة الجزر الأربعة؟', 'answer' => 'مؤسسة الجزر الأربعة هي في المقام الأول مزود شامل لخدمات دعم الطيران وتوريد قطع الغيار. تشمل خبراتنا الأساسية شراء وتوريد قطع الطيران المعتمدة ومكونات المحرك وإلكترونيات الطيران ومعدات الدعم الأرضي وقطع الغيار الأصلية والبديلة لتطبيقات الطيران والصناعة. كما نقدم خدمات التجارة العامة والمشتريات والمقاولات والخدمات اللوجستية والهندسية — وكلها مدعومة بأربعة عقود من الخبرة وشبكة سلسلة توريد عالمية تمتد لأكثر من 30 دولة.']],
            ['ordering' => 2,
             'en' => ['question' => 'How long has Four Islands EST. been in business?', 'answer' => 'Four Islands EST. was founded in 1987 in the State of Kuwait. With more than 39 years of continuous operation, we have built a deep understanding of the trading and contracting industry, cultivated lasting relationships with leading manufacturers and clients worldwide, and established a reputation for reliability and excellence that spans generations.'],
             'ar' => ['question' => 'منذ متى تأسست مؤسسة الجزر الأربعة؟', 'answer' => 'تأسست مؤسسة الجزر الأربعة عام 1987 في دولة الكويت. مع أكثر من 39 عاماً من التشغيل المستمر، بنينا فهماً عميقاً لصناعة التجارة والمقاولات، وزرعنا علاقات دائمة مع كبار المصنعين والعملاء في جميع أنحاء العالم، وأسسنا سمعة مرتكزة على الموثوقية والتميز تمتد عبر الأجيال.']],
            ['ordering' => 3,
             'en' => ['question' => 'Which regions and countries does Four Islands serve?', 'answer' => 'We serve a diverse and growing customer base spanning over 30 countries across the United Kingdom, Russia, continental Europe, the Middle East and North Africa, Sub-Saharan Africa, the Far East, and the Americas. Our logistics network enables us to deliver reliably to virtually any destination worldwide.'],
             'ar' => ['question' => 'ما هي المناطق والبلدان التي تخدمها مؤسسة الجزر الأربعة؟', 'answer' => 'نخدم قاعدة عملاء متنوعة ومتنامية تمتد لأكثر من 30 دولة عبر المملكة المتحدة وروسيا وأوروبا القارية والشرق الأوسط وشمال أفريقيا وأفريقيا جنوب الصحراء والشرق الأقصى والأمريكتين. تمكننا شبكتنا اللوجستية من التوصيل بموثوقية إلى أي وجهة في العالم تقريباً.']],
            ['ordering' => 4,
             'en' => ['question' => 'What types of products does Four Islands supply?', 'answer' => 'Our primary focus is on aviation parts and spare parts supply. Our portfolio includes fully certified aircraft parts (airframe, engine, avionics), ground support equipment, OEM and aftermarket spare parts for aviation and industrial machinery, as well as heavy equipment, commercial supplies, construction materials, and institutional consumables. Every product category is managed by dedicated specialists who ensure quality, compliance, and value. All aviation products are supplied with full traceability and manufacturer certifications in compliance with EASA, FAA, and ICAO standards.'],
             'ar' => ['question' => 'ما أنواع المنتجات التي توردها مؤسسة الجزر الأربعة؟', 'answer' => 'تركيزنا الأساسي هو على قطع الطيران وقطع الغيار. تشمل محفظتنا قطع طيران معتمدة بالكامل (هيكل الطائرة والمحرك وإلكترونيات الطيران) ومعدات الدعم الأرضي وقطع الغيار الأصلية والبديلة للطيران والآلات الصناعية بالإضافة إلى المعدات الثقيلة واللوازم التجارية ومواد البناء والمواد الاستهلاكية المؤسسية. كل فئة منتجات يديرها متخصصون يضمنون الجودة والامتثال والقيمة. جميع منتجات الطيران مزودة بإمكانية التتبع الكاملة وشهادات الشركة المصنعة وفقاً لمعايير EASA وFAA وICAO.']],
            ['ordering' => 5,
             'en' => ['question' => 'How can I request a quote or discuss a potential partnership?', 'answer' => 'You can request a quote or discuss a potential partnership by visiting our Contact page and completing the enquiry form, or by contacting us directly via phone at +965 2225 5565 or email at info@fourislands.com. Our dedicated team of account managers will review your requirements and respond within 24 hours with a tailored proposal. We welcome enquiries of all scales and look forward to exploring how we can support your business objectives.'],
             'ar' => ['question' => 'كيف يمكنني طلب عرض سعر أو مناقشة شراكة محتملة؟', 'answer' => 'يمكنك طلب عرض سعر أو مناقشة شراكة محتملة من خلال زيارة صفحة الاتصال بنا وتعبئة نموذج الاستفسار، أو بالاتصال بنا مباشرة على +965 2225 5565 أو البريد الإلكتروني info@fourislands.com. سيقوم فريقنا المخصص من مديري الحسابات بمراجعة متطلباتك والرد خلال 24 ساعة بعرض مخصص. نرحب باستفسارات جميع الأحجام ونتطلع إلى استكشاف كيف يمكننا دعم أهداف أعمالك.']],
            ['ordering' => 6,
             'en' => ['question' => 'Does Four Islands offer after-sales support and warranty?', 'answer' => 'Yes. Every product we supply is backed by comprehensive after-sales support, including manufacturer warranties, technical assistance, spare parts availability, and maintenance guidance. Our commitment to our clients extends well beyond the point of delivery — we believe in building long-term partnerships, and that means standing behind every product and service we provide.'],
             'ar' => ['question' => 'هل تقدم مؤسسة الجزر الأربعة دعماً بعد البيع وضماناً؟', 'answer' => 'نعم. كل منتج نقدمه مدعوم بدعم شامل بعد البيع، بما في ذلك ضمانات الشركة المصنعة والمساعدة الفنية وتوفر قطع الغيار وإرشادات الصيانة. التزامنا تجاه عملائنا يمتد إلى ما بعد نقطة التسليم — نحن نؤمن ببناء شراكات طويلة الأمد، وهذا يعني الوقوف خلف كل منتج وخدمة نقدمها.']],
            ['ordering' => 7,
             'en' => ['question' => 'What industries does Four Islands primarily serve?', 'answer' => 'We serve a broad cross-section of industries including oil and gas, petrochemicals, construction and infrastructure, aviation and aerospace, hospitality and retail, healthcare and institutional facilities, transportation and logistics, and government and defence. Our diverse portfolio and flexible supply model allow us to adapt to the unique procurement and compliance requirements of each sector.'],
             'ar' => ['question' => 'ما هي القطاعات التي تخدمها مؤسسة الجزر الأربعة بشكل أساسي؟', 'answer' => 'نخدم قطاعاً عريضاً من الصناعات بما في ذلك النفط والغاز والبتروكيماويات والبناء والبنية التحتية والطيران والفضاء والضيافة والتجزئة والرعاية الصحية والمرافق المؤسسية والنقل والخدمات اللوجستية والحكومة والدفاع. تسمح لنا محفظتنا المتنوعة ونموذج التوريد المرن لدينا بالتكيف مع متطلبات المشتريات والامتثال الفريدة لكل قطاع.']],
        ];

        foreach ($faqs as $data) {
            $faq = Faq::create(['ordering' => $data['ordering']]);
            foreach (['en', 'ar'] as $locale) {
                $faq->translations()->create([
                    'locale' => $locale,
                    'question' => $data[$locale]['question'],
                    'answer' => $data[$locale]['answer'],
                ]);
            }
        }
        $this->command->info('FAQs seeded.');
    }
}
