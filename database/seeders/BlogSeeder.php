<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    public function run()
    {
        $this->seedCategories();
        $this->seedPosts();
    }

    protected function seedCategories()
    {
        $categories = [
            [
                'slug' => 'trading',
                'ordering' => 1,
                'en' => 'General Trading',
                'ar' => 'التجارة العامة',
            ],
            [
                'slug' => 'contracting',
                'ordering' => 2,
                'en' => 'Contracting & Engineering',
                'ar' => 'المقاولات والهندسة',
            ],
            [
                'slug' => 'aviation',
                'ordering' => 3,
                'en' => 'Aviation',
                'ar' => 'الطيران',
            ],
            [
                'slug' => 'logistics',
                'ordering' => 4,
                'en' => 'Logistics & Supply Chain',
                'ar' => 'الخدمات اللوجستية وسلسلة التوريد',
            ],
            [
                'slug' => 'company-news',
                'ordering' => 5,
                'en' => 'Company News',
                'ar' => 'أخبار الشركة',
            ],
        ];

        foreach ($categories as $data) {
            $category = Category::firstOrCreate(
                ['slug' => $data['slug']],
                ['ordering' => $data['ordering'], 'is_active' => true]
            );
            $category->translations()->delete();
            $category->translations()->createMany([
                ['locale' => 'en', 'name' => $data['en']],
                ['locale' => 'ar', 'name' => $data['ar']],
            ]);
        }

        $this->command->info('Blog categories seeded.');
    }

    protected function seedPosts()
    {
        $categoryIds = Category::pluck('id', 'slug');

        $posts = [
            [
                'category_slug' => 'trading',
                'slug' => 'evolution-general-trading-gcc',
                'published_at' => Carbon::parse('2026-01-15'),
                'en' => [
                    'title' => 'The Evolution of General Trading in the GCC: Four Decades of Growth',
                    'excerpt' => 'Explore how general trading has transformed across the GCC over the past 40 years, from traditional merchant networks to global supply chain integration.',
                    'content' => '
<p>The Gulf Cooperation Council (GCC) region has witnessed a remarkable transformation in the general trading landscape over the past four decades. What once began as a network of family-run merchant houses has evolved into a sophisticated, globally integrated trading ecosystem that connects markets across six continents.</p>

<h2>The Early Years: 1980s — 1990s</h2>
<p>In the 1980s, general trading in the GCC was characterised by strong personal relationships and face-to-face dealings. Merchants in Kuwait, the UAE, and Saudi Arabia built their reputations on trust, reliability, and deep knowledge of local markets. Companies like Four Islands EST., founded in Kuwait in 1987, emerged during this period as trusted intermediaries between international manufacturers and regional buyers. The model was simple yet effective: understand what the local market needs, source it from the best global suppliers, and deliver with consistency.</p>

<p>During this era, the trading portfolio was heavily weighted toward essential commodities — foodstuffs, construction materials, and basic industrial supplies. The oil boom of the late 1980s and early 1990s fuelled demand for heavy machinery, equipment, and specialised industrial inputs, setting the stage for diversification.</p>

<h2>The Expansion Phase: 2000 — 2010</h2>
<p>The turn of the millennium brought sweeping changes. The GCC states embarked on ambitious economic diversification programmes, investing heavily in infrastructure, healthcare, education, and tourism. This created unprecedented demand for a wider range of products — from medical equipment to hospitality supplies, from aviation parts to renewable energy components.</p>

<p>Trading companies expanded their portfolios and geographic reach. Supply chains became more complex, requiring sophisticated logistics capabilities, warehousing infrastructure, and multi-modal transportation solutions. The rise of container shipping and digital communication transformed how trading was conducted, enabling faster transactions and broader supplier networks.</p>

<h2>The Modern Era: 2010 — Present</h2>
<p>Today, general trading in the GCC is a data-driven, technology-enabled industry. Companies leverage digital platforms for procurement, inventory management, and customer relationship management. The focus has shifted from simply moving goods to providing integrated supply chain solutions that add value at every stage.</p>

<p>Key trends shaping the industry include:</p>
<ul>
<li><strong>Digital Transformation:</strong> E-procurement platforms, blockchain for traceability, and AI-powered demand forecasting are becoming standard tools for trading companies.</li>
<li><strong>Sustainability Requirements:</strong> Increasingly, clients demand proof of sustainable sourcing, carbon footprint data, and compliance with international environmental standards.</li>
<li><strong>Regional Integration:</strong> The GCC remains a key corridor for trade between Asia, Africa, and Europe, with free zones and trade agreements facilitating smoother cross-border transactions.</li>
<li><strong>Value-Added Services:</strong> Successful trading companies now offer financing, quality assurance, after-sales support, and technical training alongside traditional supply services.</li>
</ul>

<h2>Looking Ahead</h2>
<p>The next decade will see further consolidation and specialisation. Trading companies that invest in technology, talent development, and strategic partnerships will be best positioned to thrive. The fundamentals, however, remain the same: trust, reliability, and an unwavering commitment to quality — the very principles that have driven the industry for the past 40 years.</p>
                    ',
                    'meta_title' => 'Evolution of General Trading in GCC | Four Islands EST. Kuwait',
                    'meta_description' => 'Discover how general trading evolved across the GCC over 40 years — from family merchant houses to global supply chains. Insights from Four Islands EST., established in Kuwait since 1987.',
                ],
                'ar' => [
                    'title' => 'تطور التجارة العامة في دول مجلس التعاون الخليجي: أربعة عقود من النمو',
                    'excerpt' => 'استكشف كيف تحولت التجارة العامة في دول مجلس التعاون الخليجي على مدى 40 عاماً، من شبكات التجار التقليدية إلى التكامل العالمي لسلسلة التوريد.',
                    'content' => '
<p>شهدت منطقة دول مجلس التعاون الخليجي تحولاً ملحوظاً في مشهد التجارة العامة على مدى العقود الأربعة الماضية. فما بدأ كشبكة من البيوت التجارية العائلية تطور ليصبح نظاماً تجارياً متطوراً ومتكاملاً عالمياً يربط الأسواق عبر ست قارات.</p>

<h2>السنوات المبكرة: 1980 — 1990</h2>
<p>في الثمانينيات، اتسمت التجارة العامة في دول مجلس التعاون الخليجي بالعلاقات الشخصية القوية والتعاملات المباشرة. بنى التجار في الكويت والإمارات والمملكة العربية السعودية سمعتهم على الثقة والموثوقية والمعرفة العميقة بالأسواق المحلية. ظهرت شركات مثل مؤسسة الجزر الأربعة، التي تأسست في الكويت عام 1987، خلال هذه الفترة كوسطاء موثوقين بين المصنعين الدوليين والمشترين الإقليميين. كان النموذج بسيطاً لكنه فعال: فهم ما يحتاجه السوق المحلي، توريده من أفضل الموردين العالميين، والتسليم بثبات.</p>

<p>خلال هذه الحقبة، كان portfolio التجاري يتركز بشكل كبير على السلع الأساسية — المواد الغذائية ومواد البناء واللوازم الصناعية الأساسية. غذت الطفرة النفطية في أواخر الثمانينيات وأوائل التسعينيات الطلب على الآلات الثقيلة والمعدات والمدخلات الصناعية المتخصصة، مما مهد الطريق للتنويع.</p>

<h2>مرحلة التوسع: 2000 — 2010</h2>
<p>جلب مطلع الألفية تغييرات شاملة. شرعت دول مجلس التعاون الخليجي في برامج طموحة للتنويع الاقتصادي، مستثمرة بكثافة في البنية التحتية والرعاية الصحية والتعليم والسياحة. خلق هذا طلباً غير مسبوق على مجموعة أوسع من المنتجات — من المعدات الطبية إلى مستلزمات الضيافة، ومن قطع الطيران إلى مكونات الطاقة المتجددة.</p>

<p>وسعت الشركات التجارية محافظها ومدى انتشارها الجغرافي. أصبحت سلاسل التوريد أكثر تعقيداً، مما تطلب قدرات لوجستية متطورة وبنية تحتية للتخزين وحلول نقل متعددة الوسائط. أدى ظهور الشحن بالحاويات والاتصالات الرقمية إلى تحويل كيفية إجراء التجارة، مما مكن من معاملات أسرع وشبكات موردين أوسع.</p>

<h2>العصر الحديث: 2010 — حتى الآن</h2>
<p>اليوم، التجارة العامة في دول مجلس التعاون الخليجي هي صناعة تعتمد على البيانات والتكنولوجيا. تستفيد الشركات من المنصات الرقمية للمشتريات وإدارة المخزون وإدارة علاقات العملاء. تحول التركيز من مجرد نقل البضائع إلى توفير حلول سلسلة توريد متكاملة تضيف قيمة في كل مرحلة.</p>

<p>أبرز الاتجاهات التي تشكل الصناعة:</p>
<ul>
<li><strong>التحول الرقمي:</strong> أصبحت منصات المشتريات الإلكترونية وتقنية البلوك تشين لتتبع المنتجات والتنبؤ بالطلب بالذكاء الاصطناعي أدوات قياسية للشركات التجارية.</li>
<li><strong>متطلبات الاستدامة:</strong> يطلب العملاء بشكل متزايد إثباتات التوريد المستدام وبيانات البصمة الكربونية والامتثال للمعايير البيئية الدولية.</li>
<li><strong>التكامل الإقليمي:</strong> لا تزال دول مجلس التعاون الخليجي ممراً رئيسياً للتجارة بين آسيا وأفريقيا وأوروبا، مع مناطق حرة واتفاقيات تجارية تسهل المعاملات عبر الحدود.</li>
<li><strong>الخدمات ذات القيمة المضافة:</strong> تقدم الشركات التجارية الناجحة الآن التمويل وضمان الجودة والدعم بعد البيع والتدريب الفني إلى جانب خدمات التوريد التقليدية.</li>
</ul>

<h2>نظرة إلى المستقبل</h2>
<p>سيشهد العقد القادم مزيداً من التوحيد والتخصص. الشركات التجارية التي تستثمر في التكنولوجيا وتطوير المواهب والشراكات الاستراتيجية ستكون الأفضل للازدهار. لكن الأساسيات تبقى كما هي: الثقة والموثوقية والالتزام الراسخ بالجودة — نفس المبادئ التي قادت الصناعة على مدى 40 عاماً.</p>
                    ',
                    'meta_title' => 'تطور التجارة العامة في الخليج | مؤسسة الجزر الأربعة الكويت',
                    'meta_description' => 'اكتشف كيف تطورت التجارة العامة في دول مجلس التعاون الخليجي على مدى 40 عاماً — من البيوت التجارية العائلية إلى سلاسل التوريد العالمية. رؤى من مؤسسة الجزر الأربعة، منذ 1987.',
                ],
            ],
            [
                'category_slug' => 'aviation',
                'slug' => 'aviation-parts-supply-chain-safety-compliance',
                'published_at' => Carbon::parse('2026-02-20'),
                'en' => [
                    'title' => 'Aviation Parts Supply Chain: Ensuring Safety and Compliance Across Borders',
                    'excerpt' => 'A deep dive into the critical requirements for aviation parts procurement, including regulatory compliance, traceability, and quality assurance standards.',
                    'content' => '
<p>The aviation industry operates under some of the most stringent safety and quality standards of any sector worldwide. For companies involved in the supply of aircraft parts, ground support equipment, and aviation consumables, compliance is not optional — it is the foundation upon which trust and operational integrity are built.</p>

<h2>Regulatory Framework: EASA, FAA, and ICAO</h2>
<p>Aviation parts supply is governed by a complex web of international regulations. The European Union Aviation Safety Agency (EASA), the Federal Aviation Administration (FAA) in the United States, and the International Civil Aviation Organization (ICAO) set the benchmarks that all suppliers must meet. Each certified part must be accompanied by full traceability documentation, including manufacturer certificates of conformance, maintenance records, and chain-of-custody documentation.</p>

<p>For suppliers serving airlines, MRO (Maintenance, Repair, and Overhaul) facilities, and ground handlers across the Middle East, Africa, and beyond, navigating these regulatory requirements demands specialised expertise. A single compliance gap can ground an aircraft, disrupt operations, and expose all parties to significant liability.</p>

<h2>Traceability: The Backbone of Aviation Supply</h2>
<p>Traceability is the single most critical aspect of aviation parts supply. Every component must be traceable from its point of manufacture through every stage of its lifecycle. This includes:</p>
<ul>
<li>Original manufacturer part numbers and serial numbers</li>
<li>Date of manufacture and batch/lot numbers</li>
<li>Repair and overhaul history with detailed work scope documentation</li>
<li>Storage conditions and shelf-life tracking for consumables</li>
<li>Complete chain of custody from manufacturer to end user</li>
</ul>

<p>Modern digital traceability systems, including blockchain-based platforms, are transforming how this data is managed. These systems provide immutable records that can be accessed in real time by all authorised parties, reducing administrative burden while enhancing transparency and trust.</p>

<h2>Quality Assurance Beyond Certification</h2>
<p>While regulatory certification establishes a baseline, leading aviation suppliers go further by implementing comprehensive quality management systems. This includes:</p>
<ul>
<li><strong>Incoming Inspection Protocols:</strong> Every part is inspected upon receipt to verify condition, documentation, and compliance with purchase order requirements.</li>
<li><strong>Storage Environment Control:</strong> Temperature, humidity, and lighting conditions are monitored and maintained within specified parameters.</li>
<li><strong>Counterfeit Parts Prevention:</strong> Rigorous screening processes, including visual inspection, dimensional verification, and advanced material analysis, are employed to detect and eliminate counterfeit components.</li>
<li><strong>Supplier Audits:</strong> Regular audits of manufacturers and distributors ensure ongoing compliance with quality standards.</li>
</ul>

<h2>Meeting the Needs of a Growing Market</h2>
<p>The Middle East aviation market continues to expand rapidly, driven by fleet modernisation, new route development, and the growth of low-cost carriers. This creates sustained demand for certified aircraft parts, ground support equipment, and aviation-grade consumables. Suppliers who invest in robust quality systems, deep regulatory knowledge, and efficient logistics networks will be best positioned to serve this dynamic market.</p>
                    ',
                    'meta_title' => 'Aviation Parts Supply Chain Compliance | Four Islands EST. Kuwait',
                    'meta_description' => 'Learn about aviation parts supply chain requirements: EASA/FAA/ICAO compliance, traceability standards, and quality assurance. Expert insights from Four Islands EST.',
                ],
                'ar' => [
                    'title' => 'سلسلة توريد قطع الطيران: ضمان السلامة والامتثال عبر الحدود',
                    'excerpt' => 'غوص عميق في المتطلبات الحرجة لشراء قطع الطيران، بما في ذلك الامتثال التنظيمي وإمكانية التتبع ومعايير ضمان الجودة.',
                    'content' => '
<p>تعمل صناعة الطيران بموجب بعض من أكثر معايير السلامة والجودة صرامة في أي قطاع حول العالم. بالنسبة للشركات المشاركة في توريد قطع الطيران ومعدات الدعم الأرضي والمواد الاستهلاكية للطيران، الامتثال ليس خياراً — بل هو الأساس الذي تبنى عليه الثقة والنزاهة التشغيلية.</p>

<h2>الإطار التنظيمي: EASA وFAA وICAO</h2>
<p>يخضع توريد قطع الطيران لشبكة معقدة من اللوائح الدولية. تحدد وكالة سلامة الطيران الأوروبية (EASA) وإدارة الطيران الفيدرالية الأمريكية (FAA) ومنظمة الطيران المدني الدولي (ICAO) المعايير التي يجب على جميع الموردين الوفاء بها. يجب أن تكون كل قطعة معتمدة مصحوبة بوثائق تتبع كاملة، بما في ذلك شهادات المطابقة من الشركة المصنعة وسجلات الصيانة ووثائق حيازة السلسلة.</p>

<p>بالنسبة للموردين الذين يخدمون شركات الطيران ومرافق الصيانة والإصلاح والعمرة (MRO) ومناولي الأرض في الشرق الأوسط وأفريقيا وخارجها، فإن التعامل مع هذه المتطلبات التنظيمية يتطلب خبرة متخصصة. فجوة امتثال واحدة يمكن أن توقف طائرة عن العمل وتعطل العمليات وتعرض جميع الأطراف لمسؤولية كبيرة.</p>

<h2>إمكانية التتبع: العمود الفقري لتوريد الطيران</h2>
<p>إمكانية التتبع هي الجانب الأكثر أهمية في توريد قطع الطيران. يجب أن يكون كل مكون قابلاً للتتبع من نقطة تصنيعه عبر كل مرحلة من دورة حياته. يشمل ذلك:</p>
<ul>
<li>أرقام القطع والتسلسل الأصلية من الشركة المصنعة</li>
<li>تاريخ التصنيع وأرقام الدفعات</li>
<li>تاريخ الإصلاح والصيانة مع وثائق نطاق العمل التفصيلية</li>
<li>ظروف التخزين وتتبع مدة الصلاحية للمواد الاستهلاكية</li>
<li>سلسلة حيازة كاملة من الشركة المصنعة إلى المستخدم النهائي</li>
</ul>

<p>تعمل أنظمة التتبع الرقمية الحديثة، بما في ذلك المنصات القائمة على البلوك تشين، على تحويل كيفية إدارة هذه البيانات. توفر هذه الأنظمة سجلات غير قابلة للتغيير يمكن لجميع الأطراف المصرح لها الوصول إليها في الوقت الفعلي، مما يقلل العبء الإداري مع تعزيز الشفافية والثقة.</p>

<h2>ضمان الجودة إلى ما بعد الشهادة</h2>
<p>بينما تحدد الشهادة التنظيمية خط الأساس، يذهب موردو الطيران الرائدون إلى أبعد من ذلك من خلال تنفيذ أنظمة إدارة جودة شاملة. يشمل ذلك:</p>
<ul>
<li><strong>بروتوكولات التفتيش الواردة:</strong> يتم فحص كل قطعة عند الاستلام للتحقق من حالتها ووثائقها وامتثالها لمتطلبات أمر الشراء.</li>
<li><strong>التحكم في بيئة التخزين:</strong> تتم مراقبة ظروف درجة الحرارة والرطوبة والإضاءة والحفاظ عليها ضمن المعايير المحددة.</li>
<li><strong>منع القطع المقلدة:</strong> يتم استخدام عمليات فحص صارمة تشمل الفحص البصري والتحقق الأبعادي وتحليل المواد المتقدم لكشف وإزالة المكونات المقلدة.</li>
<li><strong>تدقيق الموردين:</strong> تضمن عمليات التدقيق المنتظمة للمصنعين والموزعين الامتثال المستمر لمعايير الجودة.</li>
</ul>

<h2>تلبية احتياجات سوق متنامي</h2>
<p>يواصل سوق الطيران في الشرق الأوسط توسعه السريع، مدفوعاً بتحديث الأسطول وتطوير طرق جديدة ونمو شركات الطيران منخفضة التكلفة. وهذا يخلق طلباً مستمراً على قطع الطيران المعتمدة ومعدات الدعم الأرضي والمواد الاستهلاكية من الدرجة الجوية. الموردون الذين يستثمرون في أنظمة جودة قوية ومعرفة تنظيمية عميقة وشبكات لوجستية فعالة سيكونون الأفضل لخدمة هذا السوق الديناميكي.</p>
                    ',
                    'meta_title' => 'الامتثال في سلسلة توريد قطع الطيران | مؤسسة الجزر الأربعة الكويت',
                    'meta_description' => 'تعرف على متطلبات سلسلة توريد قطع الطيران: الامتثال لـ EASA/FAA/ICAO ومعايير التتبع وضمان الجودة. رؤى خبراء من مؤسسة الجزر الأربعة.',
                ],
            ],
            [
                'category_slug' => 'contracting',
                'slug' => 'kuwait-infrastructure-boom-construction-opportunities',
                'published_at' => Carbon::parse('2026-03-10'),
                'en' => [
                    'title' => 'Kuwait\'s Infrastructure Boom: Opportunities in Construction and Civil Engineering',
                    'excerpt' => 'An analysis of Kuwait\'s ambitious infrastructure projects and the growing demand for construction materials, civil engineering expertise, and project management.',
                    'content' => '
<p>Kuwait is in the midst of one of the most ambitious infrastructure development programmes in its history. With Vision 2035 as its guiding framework, the country is investing billions of dollars in transportation networks, urban development, healthcare facilities, educational institutions, and industrial zones. For companies operating in the construction and civil engineering sectors, this represents a generational opportunity.</p>

<h2>The Vision 2035 Framework</h2>
<p>Kuwait Vision 2035, also known as "New Kuwait," is a comprehensive national development plan designed to transform the country into a leading financial and commercial hub in the region. The plan encompasses over 200 strategic projects across multiple sectors, with a combined investment value exceeding $100 billion. Key infrastructure initiatives include:</p>
<ul>
<li><strong>Silk City (Madinat al-Hareer):</strong> A massive urban development project on Kuwait\'s northern coast, featuring business districts, residential communities, tourism destinations, and the iconic Burj Mubarak tower.</li>
<li><strong>Boubyan Island Port Development:</strong> A strategic logistics hub that will position Kuwait as a major transshipment centre connecting Asia, Europe, and Africa.</li>
<li><strong>Kuwait Metro Project:</strong> A comprehensive urban rail network designed to alleviate traffic congestion and provide sustainable public transportation.</li>
<li><strong>Southern Cities Development:</strong> New residential cities including Sabah Al-Ahmad, Ali Sabah Al-Salem, and Al-Mutlaa, each designed to accommodate hundreds of thousands of residents.</li>
</ul>

<h2>Material Demand and Supply Chain Implications</h2>
<p>These mega-projects generate enormous demand for construction materials, heavy machinery, and specialised equipment. Steel, cement, aggregates, waterproofing solutions, finishing materials, and construction chemicals are all in high demand. Trading and contracting companies that can ensure consistent quality, reliable delivery schedules, and competitive pricing are essential partners in the delivery of these projects.</p>

<p>The scale of these developments also demands sophisticated project management capabilities. International best practices in programme management, risk mitigation, quality control, and safety management are being adopted across the sector, raising the bar for all participants.</p>

<h2>Civil Engineering Excellence</h2>
<p>Beyond the headline mega-projects, Kuwait is investing in critical civil engineering work including road networks, bridge construction, wastewater treatment facilities, and power generation plants. These projects require deep technical expertise in structural engineering, geotechnical analysis, environmental engineering, and hydraulic design.</p>

<p>Companies that combine international technical standards with local market knowledge are particularly well positioned. Understanding Kuwait\'s unique geological conditions, regulatory environment, and supply chain dynamics is essential for delivering projects on time and within budget.</p>

<h2>The Role of the Private Sector</h2>
<p>The Kuwaiti government has increasingly turned to public-private partnerships (PPP) to accelerate infrastructure delivery. This model brings private sector efficiency, innovation, and capital to public infrastructure projects, creating opportunities for contractors, suppliers, and engineering firms to participate in long-term partnerships.</p>

<p>For companies like Four Islands EST., with decades of experience in both trading and contracting, the current infrastructure boom represents an opportunity to leverage deep industry relationships, technical expertise, and supply chain capabilities in support of Kuwait\'s national development vision.</p>
                    ',
                    'meta_title' => 'Kuwait Infrastructure Boom 2026 | Construction Opportunities | Four Islands EST.',
                    'meta_description' => 'Analysis of Kuwait\'s Vision 2035 infrastructure projects, construction material demand, and civil engineering opportunities. Insights for contractors and suppliers from Four Islands EST.',
                ],
                'ar' => [
                    'title' => 'الطفرة العمرانية في الكويت: فرص في البناء والهندسة المدنية',
                    'excerpt' => 'تحليل لمشاريع البنية التحتية الطموحة في الكويت والطلب المتزايد على مواد البناء والخبرات الهندسية المدنية وإدارة المشاريع.',
                    'content' => '
<p>تشهد الكويت حالياً واحدة من أكثر برامج تطوير البنية التحتية طموحاً في تاريخها. مع رؤية 2035 كإطار توجيهي، تستثمر الدولة مليارات الدولارات في شبكات النقل والتطوير العمراني والمرافق الصحية والمؤسسات التعليمية والمناطق الصناعية. بالنسبة للشركات العاملة في قطاعي البناء والهندسة المدنية، تمثل هذه فرصة استثنائية.</p>

<h2>إطار رؤية 2035</h2>
<p>رؤية الكويت 2035، المعروفة أيضاً باسم "كويت جديدة"، هي خطة تنمية وطنية شاملة مصممة لتحويل البلاد إلى مركز مالي وتجاري رائد في المنطقة. تشمل الخطة أكثر من 200 مشروع استراتيجي عبر قطاعات متعددة، بقيمة استثمارية إجمالية تتجاوز 100 مليار دولار. تشمل مبادرات البنية التحتية الرئيسية:</p>
<ul>
<li><strong>مدينة الحرير:</strong> مشروع تطوير عمراني ضخم على الساحل الشمالي للكويت، يضم مناطق أعمال ومجتمعات سكنية ووجهات سياحية وبرج مبارك الشهير.</li>
<li><strong>تطوير ميناء جزيرة بوبيان:</strong> مركز لوجستي استراتيجي سيضع الكويت كمركز شحن رئيسي يربط آسيا وأوروبا وأفريقيا.</li>
<li><strong>مشروع مترو الكويت:</strong> شبكة سكك حديدية حضرية شاملة مصممة لتخفيف الازدحام المروري وتوفير وسائل نقل عام مستدامة.</li>
<li><strong>تطوير المدن الجنوبية:</strong> مدن سكنية جديدة تشمل صباح الأحمد وعلي صباح السالم والمطلاع، كل منها مصمم لاستيعاب مئات الآلاف من السكان.</li>
</ul>

<h2>الطلب على المواد وانعكاسات سلسلة التوريد</h2>
<p>تولد هذه المشاريع العملاقة طلباً هائلاً على مواد البناء والآلات الثقيلة والمعدات المتخصصة. الصلب والأسمنت والركام وحلول العزل المائي ومواد التشطيب والمواد الكيميائية الإنشائية كلها مطلوبة بشدة. شركات التجارة والمقاولات التي يمكنها ضمان الجودة الثابتة وجداول التسليم الموثوقة والأسعار التنافسية هي شركاء أساسيون في تنفيذ هذه المشاريع.</p>

<p>يتطلب حجم هذه التطورات أيضاً قدرات متطورة في إدارة المشاريع. يتم اعتماد أفضل الممارسات الدولية في إدارة البرامج وتخفيف المخاطر ومراقبة الجودة وإدارة السلامة عبر القطاع، مما يرفع المستوى لجميع المشاركين.</p>

<h2>التميز في الهندسة المدنية</h2>
<p>إلى جانب المشاريع العملاقة الرئيسية، تستثمر الكويت في أعمال الهندسة المدنية الحيوية بما في ذلك شبكات الطرق وبناء الجسور ومحطات معالجة مياه الصرف الصحي ومحطات توليد الطاقة. تتطلب هذه المشاريع خبرة فنية عميقة في الهندسة الإنشائية والتحليل الجيوتقني والهندسة البيئية والتصميم الهيدروليكي.</p>

<p>الشركات التي تجمع بين المعايير الفنية الدولية والمعرفة بالسوق المحلي هي في موقع جيد بشكل خاص. فهم الظروف الجيولوجية الفريدة للكويت والبيئة التنظيمية وديناميكيات سلسلة التوريد أمر ضروري لتسليم المشاريع في الوقت المحدد وضمن الميزانية.</p>

<h2>دور القطاع الخاص</h2>
<p>اتجهت الحكومة الكويتية بشكل متزايد إلى الشراكات بين القطاعين العام والخاص (PPP) لتسريع تنفيذ البنية التحتية. يجلب هذا النموذج كفاءة القطاع الخاص وابتكاره ورأس ماله إلى مشاريع البنية التحتية العامة، مما يخلق فرصاً للمقاولين والموردين وشركات الهندسة للمشاركة في شراكات طويلة الأمد.</p>

<p>بالنسبة لشركات مثل مؤسسة الجزر الأربعة، التي تمتلك عقوداً من الخبرة في كل من التجارة والمقاولات، تمثل الطفرة العمرانية الحالية فرصة للاستفادة من العلاقات الصناعية العميقة والخبرة الفنية وقدرات سلسلة التوريد لدعم رؤية التنمية الوطنية الكويتية.</p>
                    ',
                    'meta_title' => 'الطفرة العمرانية في الكويت 2026 | فرص البناء | مؤسسة الجزر الأربعة',
                    'meta_description' => 'تحليل مشاريع رؤية الكويت 2035 للبنية التحتية والطلب على مواد البناء وفرص الهندسة المدنية. رؤى للمقاولين والموردين من مؤسسة الجزر الأربعة.',
                ],
            ],
            [
                'category_slug' => 'logistics',
                'slug' => 'building-resilient-supply-chains-middle-east',
                'published_at' => Carbon::parse('2026-04-05'),
                'en' => [
                    'title' => 'Building Resilient Supply Chains in the Middle East: Strategies for 2026 and Beyond',
                    'excerpt' => 'Discover the key strategies for building supply chain resilience in the Middle East, from diversification to digital transformation and regional integration.',
                    'content' => '
<p>The global supply chain disruptions of recent years have fundamentally changed how businesses approach logistics and procurement. In the Middle East, where geopolitical dynamics, infrastructure development, and economic diversification intersect, building resilient supply chains has become a strategic imperative for companies of all sizes.</p>

<h2>Lessons from Recent Disruptions</h2>
<p>The COVID-19 pandemic, geopolitical tensions, and extreme weather events have exposed vulnerabilities in global supply chains that were previously taken for granted. Just-in-time inventory models, single-source procurement strategies, and over-reliance on distant manufacturing hubs have all been called into question.</p>

<p>For businesses operating in the Middle East, these lessons are particularly relevant. The region\'s strategic location as a corridor between Asia, Europe, and Africa offers unique advantages, but also exposes companies to a complex web of risks including shipping route disruptions, regulatory changes, and currency fluctuations.</p>

<h2>Key Strategies for Resilience</h2>

<h3>1. Supplier Diversification</h3>
<p>Relying on a single supplier or geographical region for critical inputs is no longer acceptable. Leading companies are building multi-source procurement strategies that spread risk across different suppliers, regions, and transportation routes. This approach requires investment in supplier relationship management, quality assurance capabilities, and logistics flexibility.</p>

<h3>2. Digital Transformation</h3>
<p>Technology is a powerful enabler of supply chain resilience. Real-time tracking systems, AI-powered demand forecasting, blockchain-based documentation, and cloud-based collaboration platforms are becoming essential tools. These technologies provide the visibility and agility needed to respond quickly to disruptions.</p>

<h3>3. Strategic Inventory Positioning</h3>
<p>Companies are reconsidering their inventory strategies, moving from pure just-in-time to hybrid models that maintain strategic buffer stocks at key locations. Regional distribution centres in free zones and logistics hubs across the GCC enable faster response times and reduce exposure to long-haul shipping risks.</p>

<h3>4. Regional Integration</h3>
<p>The GCC\'s growing economic integration, including customs union developments and infrastructure connectivity projects, creates opportunities for more efficient regional supply chains. Companies that establish strong regional networks can reduce lead times, lower costs, and improve service levels compared to those relying solely on international shipping.</p>

<h2>The Role of Trading Partners</h2>
<p>In this environment, general trading and contracting companies play a crucial role as strategic partners. Beyond simply sourcing and delivering products, they provide market intelligence, quality assurance, logistics coordination, and risk management expertise. Four Islands EST., with its network spanning 30+ countries and deep relationships across the GCC, Europe, Africa, and Asia, exemplifies the value that an experienced trading partner brings to supply chain resilience.</p>

<h2>Looking Forward</h2>
<p>Supply chain resilience will remain a top priority for businesses across the Middle East. Companies that invest in diversified sourcing, digital capabilities, and strategic partnerships will be best positioned to navigate an increasingly complex global environment. The ability to anticipate disruptions, adapt quickly, and maintain continuity of supply is not just a competitive advantage — it is a fundamental requirement for long-term success.</p>
                    ',
                    'meta_title' => 'Resilient Supply Chains Middle East 2026 | Strategies | Four Islands EST.',
                    'meta_description' => 'Learn key strategies for building supply chain resilience in the Middle East: supplier diversification, digital transformation, and regional integration. Expert insights from Four Islands EST.',
                ],
                'ar' => [
                    'title' => 'بناء سلاسل توريد مرنة في الشرق الأوسط: استراتيجيات 2026 وما بعدها',
                    'excerpt' => 'اكتشف الاستراتيجيات الرئيسية لبناء مرونة سلسلة التوريد في الشرق الأوسط، من التنويع إلى التحول الرقمي والتكامل الإقليمي.',
                    'content' => '
<p>غيرت اضطرابات سلسلة التوريد العالمية في السنوات الأخيرة بشكل جذري كيفية تعامل الشركات مع الخدمات اللوجستية والمشتريات. في الشرق الأوسط، حيث تتقاطع الديناميكيات الجيوسياسية وتطوير البنية التحتية والتنويع الاقتصادي، أصبح بناء سلاسل توريد مرنة ضرورة استراتيجية للشركات من جميع الأحجام.</p>

<h2>دروس من الاضطرابات الأخيرة</h2>
<p>كشفت جائحة كوفيد-19 والتوترات الجيوسياسية والظواهر الجوية المتطرفة عن نقاط ضعف في سلاسل التوريد العالمية كانت تعتبر أمراً مفروغاً منه. نماذج المخزون في الوقت المحدد، واستراتيجيات الشراء من مصدر واحد، والاعتماد المفرط على مراكز التصنيع البعيدة — كلها موضع تساؤل الآن.</p>

<p>بالنسبة للشركات العاملة في الشرق الأوسط، هذه الدروس ذات صلة خاصة. الموقع الاستراتيجي للمنطقة كممر بين آسيا وأوروبا وأفريقيا يوفر مزايا فريدة، لكنه يعرض الشركات أيضاً لشبكة معقدة من المخاطر تشمل اضطرابات طرق الشحن والتغييرات التنظيمية وتقلبات العملة.</p>

<h2>الاستراتيجيات الرئيسية للمرونة</h2>

<h3>1. تنويع الموردين</h3>
<p>الاعتماد على مورد واحد أو منطقة جغرافية واحدة للمدخلات الحرجة لم يعد مقبولاً. تبني الشركات الرائدة استراتيجيات شراء متعددة المصادر توزع المخاطر عبر موردين ومناطق وطرق نقل مختلفة. يتطلب هذا النهج استثماراً في إدارة علاقات الموردين وقدرات ضمان الجودة ومرونة الخدمات اللوجستية.</p>

<h3>2. التحول الرقمي</h3>
<p>التكنولوجيا هي عامل تمكين قوي لمرونة سلسلة التوريد. أنظمة التتبع في الوقت الفعلي والتنبؤ بالطلب بالذكاء الاصطناعي والتوثيق بالبلوك تشين ومنصات التعاون السحابية أصبحت أدوات أساسية. توفر هذه التقنيات الرؤية والمرونة اللازمتين للاستجابة بسرعة للاضطرابات.</p>

<h3>3. التموضع الاستراتيجي للمخزون</h3>
<p>تعيد الشركات النظر في استراتيجيات مخزونها، منتقلة من نموذج الوقت المحدد إلى نماذج هجينة تحافظ على مخازن احتياطية استراتيجية في مواقع رئيسية. مراكز التوزيع الإقليمية في المناطق الحرة والمراكز اللوجستية عبر دول مجلس التعاون الخليجي تمكن من أوقات استجابة أسرع وتقلل التعرض لمخاطر الشحن لمسافات طويلة.</p>

<h3>4. التكامل الإقليمي</h3>
<p>التكامل الاقتصادي المتنامي في دول مجلس التعاون الخليجي، بما في ذلك تطورات الاتحاد الجمركي ومشاريع ربط البنية التحتية، يخلق فرصاً لسلاسل توريد إقليمية أكثر كفاءة. الشركات التي تنشئ شبكات إقليمية قوية يمكنها تقليل المهل الزمنية وخفض التكاليف وتحسين مستويات الخدمة مقارنة بتلك التي تعتمد فقط على الشحن الدولي.</p>

<h2>دور شركاء التجارة</h2>
<p>في هذه البيئة، تلعب شركات التجارة العامة والمقاولات دوراً حاسماً كشركاء استراتيجيين. إلى جانب مجرد توريد وتسليم المنتجات، يقدمون المعلومات السوقية وضمان الجودة والتنسيق اللوجستي وخبرات إدارة المخاطر. مؤسسة الجزر الأربعة، بشبكتها التي تمتد لأكثر من 30 دولة وعلاقاتها العميقة عبر دول مجلس التعاون الخليجي وأوروبا وأفريقيا وآسيا، تجسد القيمة التي يجلبها الشريك التجاري ذو الخبرة لمرونة سلسلة التوريد.</p>

<h2>نظرة إلى المستقبل</h2>
<p>ستظل مرونة سلسلة التوريد أولوية قصوى للشركات في جميع أنحاء الشرق الأوسط. الشركات التي تستثمر في التوريد المتنوع والقدرات الرقمية والشراكات الاستراتيجية ستكون الأفضل للتعامل مع بيئة عالمية متزايدة التعقيد. القدرة على توقع الاضطرابات والتكيف بسرعة والحفاظ على استمرارية التوريد ليست مجرد ميزة تنافسية — بل هي شرط أساسي للنجاح على المدى الطويل.</p>
                    ',
                    'meta_title' => 'سلاسل توريد مرنة في الشرق الأوسط 2026 | استراتيجيات | مؤسسة الجزر الأربعة',
                    'meta_description' => 'تعرف على الاستراتيجيات الرئيسية لبناء مرونة سلسلة التوريد في الشرق الأوسط: تنويع الموردين والتحول الرقمي والتكامل الإقليمي. رؤى خبراء من مؤسسة الجزر الأربعة.',
                ],
            ],
            [
                'category_slug' => 'trading',
                'slug' => 'industrial-equipment-sourcing-global-best-practices',
                'published_at' => Carbon::parse('2026-05-18'),
                'en' => [
                    'title' => 'Industrial Equipment Sourcing: Global Best Practices for Procurement Success',
                    'excerpt' => 'A comprehensive guide to global industrial equipment sourcing, covering supplier evaluation, quality assurance, logistics, and total cost of ownership analysis.',
                    'content' => '
<p>Industrial equipment sourcing is a complex undertaking that requires careful planning, deep market knowledge, and rigorous execution. Whether procuring heavy machinery for construction projects, precision equipment for manufacturing facilities, or specialised tools for maintenance operations, organisations that follow global best practices achieve better outcomes in terms of cost, quality, and reliability.</p>

<h2>Strategic Sourcing Framework</h2>
<p>Successful industrial equipment procurement begins with a strategic sourcing framework that aligns purchasing decisions with organisational objectives. This framework includes:</p>
<ul>
<li><strong>Needs Assessment:</strong> Comprehensive analysis of technical specifications, performance requirements, and operational context.</li>
<li><strong>Market Analysis:</strong> Evaluation of supplier landscapes, technology trends, pricing dynamics, and lead time considerations.</li>
<li><strong>Risk Assessment:</strong> Identification of potential supply chain risks, including single-source dependencies, geopolitical factors, and quality variability.</li>
<li><strong>Total Cost of Ownership (TCO):</strong> Analysis that goes beyond purchase price to include installation, training, maintenance, spare parts, energy consumption, and disposal costs.</li>
</ul>

<h2>Supplier Evaluation and Qualification</h2>
<p>Selecting the right supplier is the most critical decision in the procurement process. Leading organisations employ a structured evaluation methodology that considers:</p>
<ul>
<li><strong>Technical Capability:</strong> Can the supplier meet the required specifications and quality standards? Do they have relevant certifications (ISO 9001, CE marking, API certification)?</li>
<li><strong>Financial Stability:</strong> Is the supplier financially sound? Are they likely to remain in business for the equipment\'s expected lifecycle?</li>
<li><strong>Production Capacity:</strong> Can they deliver the required volumes within the needed timeframe?</li>
<li><strong>After-Sales Support:</strong> What warranty, spare parts availability, and technical support do they offer?</li>
<li><strong>References and Track Record:</strong> Have they successfully supplied similar equipment to comparable organisations?</li>
</ul>

<h2>Quality Assurance Throughout the Process</h2>
<p>Quality assurance in industrial equipment sourcing is a continuous process that spans the entire procurement lifecycle:</p>
<ul>
<li><strong>Pre-Shipment Inspection:</strong> Independent verification that equipment meets specifications before shipment.</li>
<li><strong>Factory Acceptance Testing (FAT):</strong> Comprehensive testing at the manufacturer\'s facility to validate performance.</li>
<li><strong>Incoming Inspection:</strong> Verification upon delivery that equipment is undamaged and conforms to requirements.</li>
<li><strong>Site Acceptance Testing (SAT):</strong> Testing after installation to confirm proper operation in the intended environment.</li>
</ul>

<h2>Logistics and Delivery Management</h2>
<p>Industrial equipment often involves complex logistics, including oversized cargo, special handling requirements, and multi-modal transportation. Effective logistics management includes proper packaging, marine insurance, customs clearance coordination, and delivery scheduling. For projects in the Middle East, working with a trading partner that has established logistics networks and customs expertise can significantly reduce complications.</p>

<h2>The Value of Experienced Trading Partners</h2>
<p>For organisations that do not have dedicated procurement departments with global sourcing expertise, partnering with an established trading company offers significant advantages. Experienced trading partners bring supplier relationships built over decades, market intelligence, quality assurance infrastructure, and logistics capabilities that would be costly and time-consuming to develop internally. Four Islands EST., with over 39 years of experience supplying equipment to clients across 30+ countries, exemplifies the value that a trusted trading partner provides.</p>
                    ',
                    'meta_title' => 'Industrial Equipment Sourcing Best Practices | Four Islands EST. Kuwait',
                    'meta_description' => 'Global best practices for industrial equipment sourcing: supplier evaluation, quality assurance, TCO analysis, and logistics management. Expert guide from Four Islands EST.',
                ],
                'ar' => [
                    'title' => 'توريد المعدات الصناعية: أفضل الممارسات العالمية لنجاح المشتريات',
                    'excerpt' => 'دليل شامل لتوريد المعدات الصناعية العالمية، يغطي تقييم الموردين وضمان الجودة والخدمات اللوجستية وتحليل التكلفة الإجمالية للملكية.',
                    'content' => '
<p>توريد المعدات الصناعية هو مسعى معقد يتطلب تخطيطاً دقيقاً ومعرفة سوقية عميقة وتنفيذاً صارماً. سواء كان شراء آلات ثقيلة لمشاريع البناء أو معدات دقيقة لمنشآت التصنيع أو أدوات متخصصة لعمليات الصيانة، فإن المنظمات التي تتبع أفضل الممارسات العالمية تحقق نتائج أفضل من حيث التكلفة والجودة والموثوقية.</p>

<h2>إطار التوريد الاستراتيجي</h2>
<p>يبدأ الشراء الناجح للمعدات الصناعية بإطار توريد استراتيجي يوائم قرارات الشراء مع الأهداف التنظيمية. يشمل هذا الإطار:</p>
<ul>
<li><strong>تقييم الاحتياجات:</strong> تحليل شامل للمواصفات الفنية ومتطلبات الأداء والسياق التشغيلي.</li>
<li><strong>تحليل السوق:</strong> تقييم مشهد الموردين واتجاهات التكنولوجيا وديناميكيات التسعير واعتبارات المهلة الزمنية.</li>
<li><strong>تقييم المخاطر:</strong> تحديد مخاطر سلسلة التوريد المحتملة، بما في ذلك الاعتماد على مصدر واحد والعوامل الجيوسياسية وتقلب الجودة.</li>
<li><strong>التكلفة الإجمالية للملكية (TCO):</strong> تحليل يتجاوز سعر الشراء ليشمل التركيب والتدريب والصيانة وقطع الغيار واستهلاك الطاقة وتكاليف التخلص.</li>
</ul>

<h2>تقييم الموردين وتأهيلهم</h2>
<p>اختيار المورد المناسب هو القرار الأكثر أهمية في عملية الشراء. تستخدم المنظمات الرائدة منهجية تقييم منظمة تراعي:</p>
<ul>
<li><strong>القدرة الفنية:</strong> هل يمكن للمورد تلبية المواصفات ومعايير الجودة المطلوبة؟ هل لديهم الشهادات ذات الصلة (ISO 9001، علامة CE، شهادة API)؟</li>
<li><strong>الاستقرار المالي:</strong> هل المورد سليم مالياً؟ هل من المحتمل أن يظل في العمل طوال دورة الحياة المتوقعة للمعدات؟</li>
<li><strong>الطاقة الإنتاجية:</strong> هل يمكنهم تسليم الكميات المطلوبة ضمن الإطار الزمني المطلوب؟</li>
<li><strong>دعم ما بعد البيع:</strong> ما هو الضمان وتوفر قطع الغيار والدعم الفني الذي يقدمونه؟</li>
<li><strong>المراجع وسجل الأداء:</strong> هل قاموا بتوريد معدات مماثلة لمنظمات مماثلة بنجاح؟</li>
</ul>

<h2>ضمان الجودة طوال العملية</h2>
<p>ضمان الجودة في توريد المعدات الصناعية هو عملية مستمرة تمتد طوال دورة حياة المشتريات:</p>
<ul>
<li><strong>التفتيش قبل الشحن:</strong> تحقق مستقل من أن المعدات تلبي المواصفات قبل الشحن.</li>
<li><strong>اختبار القبول في المصنع (FAT):</strong> اختبار شامل في منشأة الشركة المصنعة للتحقق من الأداء.</li>
<li><strong>التفتيش الوارد:</strong> التحقق عند التسليم من أن المعدات غير تالفة وتتوافق مع المتطلبات.</li>
<li><strong>اختبار القبول في الموقع (SAT):</strong> اختبار بعد التركيب لتأكيد التشغيل السليم في البيئة المقصودة.</li>
</ul>

<h2>إدارة الخدمات اللوجستية والتسليم</h2>
<p>غالباً ما تنطوي المعدات الصناعية على خدمات لوجستية معقدة، بما في ذلك البضائع كبيرة الحجم ومتطلبات المناولة الخاصة والنقل متعدد الوسائط. تشمل إدارة الخدمات اللوجستية الفعالة التغليف المناسب والتأمين البحري والتنسيق الجمركي وجدولة التسليم. للمشاريع في الشرق الأوسط، العمل مع شريك تجاري لديه شبكات لوجستية راسخة وخبرة جمركية يمكن أن يقلل التعقيدات بشكل كبير.</p>

<h2>قيمة شركاء التجارة ذوي الخبرة</h2>
<p>للمنظمات التي ليس لديها أقسام مشتريات متخصصة مع خبرة توريد عالمية، الشراكة مع شركة تجارية راسخة تقدم مزايا كبيرة. يجلب شركاء التجارة ذوو الخبرة علاقات موردين بنيت على مدى عقود ومعرفة سوقية وبنية تحتية لضمان الجودة وقدرات لوجستية سيكون تطويرها داخلياً مكلفاً ويستغرق وقتاً طويلاً. مؤسسة الجزر الأربعة، مع أكثر من 39 عاماً من الخبرة في توريد المعدات للعملاء في أكثر من 30 دولة، تجسد القيمة التي يقدمها الشريك التجاري الموثوق.</p>
                    ',
                    'meta_title' => 'أفضل ممارسات توريد المعدات الصناعية | مؤسسة الجزر الأربعة الكويت',
                    'meta_description' => 'أفضل الممارسات العالمية لتوريد المعدات الصناعية: تقييم الموردين وضمان الجودة وتحليل التكلفة الإجمالية وإدارة الخدمات اللوجستية. دليل خبراء من مؤسسة الجزر الأربعة.',
                ],
            ],
            [
                'category_slug' => 'company-news',
                'slug' => 'four-islands-39-years-trading-excellence',
                'published_at' => Carbon::parse('2026-06-01'),
                'en' => [
                    'title' => 'Four Islands EST. Celebrates 39 Years of Trading and Contracting Excellence',
                    'excerpt' => 'Reflecting on nearly four decades of trusted partnerships, global reach, and unwavering commitment to quality across 30+ countries.',
                    'content' => '
<p>This year marks a significant milestone for Four Islands EST. for General Trading and Contracting as we celebrate 39 years of continuous operations since our founding in the State of Kuwait in 1987. Nearly four decades later, what began as a local trading enterprise has grown into a globally recognised supplier and contracting partner serving clients across more than 30 countries.</p>

<h2>A Legacy Built on Trust</h2>
<p>From our earliest days, Four Islands EST. was built on a simple but powerful principle: business is built on relationships. Every engagement, every partnership, and every project has been approached with an unwavering commitment to understanding our clients\' unique requirements and delivering tailored solutions that drive measurable value. This philosophy has guided our growth and earned us the trust of industry leaders across the globe.</p>

<p>Under the leadership of Mr. Mohammad Abdulmohsen Mohammad Al Saifi, our company has cultivated enduring partnerships with leading manufacturers and built a reputation for reliability, professionalism, and operational excellence. His strategic vision and integrity-driven leadership have been instrumental in transforming Four Islands from a local trading enterprise into a globally recognised supplier of choice.</p>

<h2>Global Reach, Local Expertise</h2>
<p>Today, our operational footprint spans the United Kingdom, Russia, continental Europe, the Middle East and North Africa, Sub-Saharan Africa, the Far East, and the Americas. This global reach is underpinned by a robust supply chain network, deep industry relationships, and a steadfast commitment to quality assurance at every stage of the procurement and delivery process.</p>

<p>Our core areas of specialisation encompass the wholesale distribution of machinery, equipment, and industrial supplies, as well as ancillary support activities for transportation, architectural design, civil engineering, and related professional services. Our portfolio spans commercial equipment, aviation parts and ground support equipment, construction and civil engineering solutions, and integrated transportation and logistics services.</p>

<h2>Looking to the Future</h2>
<p>As we look ahead to our fourth decade and beyond, Four Islands EST. remains committed to the principles that have defined our journey: integrity, quality, and partnership. We continue to invest in our capabilities, expand our network, and deepen our expertise to better serve our clients\' evolving needs.</p>

<p>We extend our deepest gratitude to our clients, partners, and team members who have been part of this remarkable journey. Your trust and collaboration have made the past 39 years possible, and we look forward to building many more years of success together.</p>
                    ',
                    'meta_title' => 'Four Islands EST. 39 Years Anniversary | Trading Excellence Since 1987',
                    'meta_description' => 'Four Islands EST. celebrates 39 years of trading and contracting excellence. From a local Kuwaiti enterprise to a global partner serving 30+ countries since 1987.',
                ],
                'ar' => [
                    'title' => 'مؤسسة الجزر الأربعة تحتفل بـ 39 عاماً من التميز في التجارة والمقاولات',
                    'excerpt' => 'تأمل将近 أربعة عقود من الشراكات الموثوقة والانتشار العالمي والالتزام الراسخ بالجودة في أكثر من 30 دولة.',
                    'content' => '
<p>يصادف هذا العام علامة فارقة لمؤسسة الجزر الأربعة للتجارة العامة والمقاولات، حيث نحتفل بمرور 39 عاماً من التشغيل المستمر منذ تأسيسنا في دولة الكويت عام 1987. بعد将近 أربعة عقود، نمت المؤسسة من مشروع تجاري محلي إلى مورد وشركة مقاولات معترف بها عالمياً تخدم العملاء في أكثر من 30 دولة.</p>

<h2>إرث مبني على الثقة</h2>
<p>منذ أيامنا الأولى، بنيت مؤسسة الجزر الأربعة على مبدأ بسيط لكنه قوي: الأعمال تُبنى على العلاقات. كل تعامل وكل شراكة وكل مشروع تم التعامل معه بالتزام راسخ بفهم المتطلبات الفريدة لعملائنا وتقديم حلول مخصصة تحقق قيمة ملموسة. هذه الفلسفة وجهت نمونا وأكسبتنا ثقة قادة الصناعة في جميع أنحاء العالم.</p>

<p>تحت قيادة السيد محمد عبد المحسن محمد الصائفي، زرعت شراكات دائمة مع كبار المصنعين وبنيت سمعة مرتكزة على الموثوقية والاحترافية والتميز التشغيلي. كانت رؤيته الاستراتيجية وقيادته القائمة على النزاهة فعالة في تحويل الجزر الأربعة من مؤسسة تجارية محلية إلى مورد عالمي مرموق.</p>

<h2>انتشار عالمي، خبرة محلية</h2>
<p>اليوم، يمتد بصمنا التشغيلي عبر المملكة المتحدة وروسيا وأوروبا القارية والشرق الأوسط وشمال أفريقيا وأفريقيا جنوب الصحراء والشرق الأقصى والأمريكتين. هذا الانتشار العالمي مدعوم بشبكة سلسلة توريد قوية وعلاقات صناعية عميقة والتزام راسخ بضمان الجودة في كل مرحلة من مراحل الشراء والتسليم.</p>

<p>تشمل مجالات تخصصنا الرئيسية التوزيع بالجملة للآلات والمعدات واللوازم الصناعية، بالإضافة إلى أنشطة الدعم المساعدة للنقل والتصميم المعماري والهندسة المدنية والخدمات المهنية ذات الصلة. تمتد محفظتنا لتشمل المعدات التجارية وقطع ومعدات الطيران وحلول البناء والهندسة المدنية وخدمات النقل والخدمات اللوجستية المتكاملة.</p>

<h2>نظرة إلى المستقبل</h2>
<p>بينما نتطلع إلى عقدنا الرابع وما بعده، تظل مؤسسة الجزر الأربعة ملتزمة بالمبادئ التي حددت مسيرتنا: النزاهة والجودة والشراكة. نستمر في الاستثمار في قدراتنا وتوسيع شبكتنا وتعميق خبراتنا لخدمة احتياجات عملائنا المتطورة بشكل أفضل.</p>

<p>نتوجه بأعمق امتناننا لعملائنا وشركائنا وأعضاء فريقنا الذين كانوا جزءاً من هذه الرحلة المميزة. ثقتكم وتعاونكم جعلا السنوات الـ 39 الماضية ممكنة، ونتطلع إلى بناء العديد من السنوات من النجاح معاً.</p>
                    ',
                    'meta_title' => 'الذكرى 39 لتأسيس مؤسسة الجزر الأربعة | التميز في التجارة منذ 1987',
                    'meta_description' => 'مؤسسة الجزر الأربعة تحتفل بـ 39 عاماً من التميز في التجارة والمقاولات. من مشروع كويتي محلي إلى شريك عالمي يخدم أكثر من 30 دولة منذ 1987.',
                ],
            ],
        ];

        foreach ($posts as $data) {
            $categoryId = $categoryIds[$data['category_slug']] ?? null;
            if (!$categoryId) {
                continue;
            }

            $post = Post::firstOrCreate(
                ['slug' => $data['slug']],
                [
                    'category_id' => $categoryId,
                    'image' => null,
                    'is_published' => true,
                    'published_at' => $data['published_at'],
                ]
            );

            $post->translations()->delete();
            foreach (['en', 'ar'] as $locale) {
                $post->translations()->create([
                    'locale' => $locale,
                    'title' => $data[$locale]['title'],
                    'excerpt' => $data[$locale]['excerpt'],
                    'content' => $data[$locale]['content'],
                    'meta_title' => $data[$locale]['meta_title'],
                    'meta_description' => $data[$locale]['meta_description'],
                ]);
            }
        }

        $this->command->info('Blog posts seeded.');
    }
}
