<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>Know Our Partners - 23rd GCA</title>

    <?php
    include "includes/header_includes.php";
    ?>

    <style>
        .about .content-block {
            margin: 15px 0 !important;
        }

        .about .content-block .description-one p {
            margin-bottom: 15px;
        }

        label.label {
            color: #222;
        }

        .custom-card {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: row;
            /* Display children in a row */
            transition: box-shadow 0.3s ease;
            /* Transition for shadow */
        }

        .custom-card:hover {
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.3);
            /* Shadow on hover */
        }

        .custom-card .card-body:first-child {
            flex: 1;
            /* Updated to 50% width */
            padding: 20px;
            background-color: #f8f9fa;
            /* Lighter background color */
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center; /* Center content horizontally */
            align-items: center; /* Center content vertically */
        }

        .company-logo {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
            max-height: 110px;
        }

        .company-name {
            font-size: 1.5em;
            /* Larger font size */
            font-weight: bold;
            margin-bottom: 10px;
            /* Increased margin */
            color: #007bff;
            /* Company title color */
        }

        .partnership-category {
            font-size: 1.1em;
            /* Larger font size */
            color: #6c757d;
            /* Company category color */
            margin-bottom: 10px;
            /* Increased margin */
        }

        .custom-card .card-body:last-child {
            flex: 3;
            /* Updated to 50% width */
            padding: 20px;
        }

        .description {
            font-size: 1em;
            line-height: 1.5;

            color: #111;
            overflow: hidden;
            height: 185px;
            /* Initial height */
        }

        .read-more {
            color: #007bff;
            cursor: pointer;
            margin-bottom: 20px;
        }

        .fa-icon {
            margin-left: 5px;
        }

        .moretext {
            display: none;
        }

        .new-height {
            height: auto !important;
            margin-bottom: 20px;
        }
        .section.schedule.two a:not(.btn){
            color: #007bff;
        }
    </style>
</head>

<body class="body-wrapper">


    <!--========================================
=            Navigation Section            =
=========================================-->
    <?php
    include "includes/header.php"
    ?>

    <!--====  End of Navigation Section  ====-->


    <!--================================
=            Page Title            =
=================================-->

    <section class="page-title bg-title overlay-dark">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="title">
                        <h3>Know Our Partners</h3>
                    </div>
                    <ol class="breadcrumb justify-content-center p-0 m-0">
                        <li class="breadcrumb-item"><a href="index">Home</a></li>
                        <li class="breadcrumb-item active">Know Our Partners</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!--===========================
=            About            =
============================-->
    <?php
    $partnerPath = "assets/images/partners/";
    ?>
    <section class="section schedule two">

        <div class="container">
            <div class="card custom-card">
                <!-- First Section (30%) -->
                <div class="card-body text-center">
                    <img class="company-logo" src="<?= $partnerPath; ?>K A Pandit_AGFA.png" alt="Company Logo">
                    <div class="company-name">AGFA Partner</div>
                    <!-- <div class="partnership-category"></div> -->
                </div>

                <!-- Border between sections -->
                <!-- //my-3 -->
                <div class="border-left"></div>

                <!-- Second Section (70%) -->
                <div class="card-body">
                    <p class="description new-height">
                        Established in 1943, K. A. Pandit has navigated a historical journey of 80 years. It is the oldest Actuarial Firm in India. Our central working theme of a ‘client centric approach’ finds us in the constant endeavour to understand our clients better, address their needs and find innovative business solutions for them, which in fact, also derives its inspiration from our business tag line “We work for you, wherever your business takes you!’’
                        We have 3 distinguished service lines namely – Employee Benefits, Insurance and Corporate Solutions catering to 5000+ clients across globe. We strongly believe in building meaningful relationships, facilitating sustainable growth and development for the business while nurturing purposeful contributions to the society and world.
                        
                    </p>
                    <a href="https://www.ka-pandit.com/" target="_blank" class="btn btn-main-md">Partner Website</a>
                </div>
            </div>

            <div class="card custom-card mt-5">
                <!-- First Section (30%) -->
                <div class="card-body text-center">
                    <img class="company-logo" src="<?= $partnerPath; ?>IFOA.png" alt="Company Logo">
                    <div class="company-name">Gold Partner</div>
                    <div class="partnership-category"></div>
                </div>

                <!-- Border between sections -->
                <!-- //my-3 -->
                <div class="border-left"></div>

                <!-- Second Section (70%) -->
                <div class="card-body">
                    <p class="description">
                    
                    The Institute and Faculty of Actuaries (IFoA) is the UK's only chartered professional body dedicated to educating, developing and regulating actuaries based both in the UK and internationally. The IFoA regulates and represents over 32,000 members worldwide, overseeing their actuarial education at all stages of qualification and development throughout their careers. We set examinations, continuing professional development, professional codes and disciplinary standards for our members.
                    <br>The Institute and Faculty of Actuaries came into being on 1 August 2010 as a result of the merger of the Institute of Actuaries in England and the Faculty of Actuaries in Scotland after members of both bodies voted to merge their respective organisations.
                    </p>
                    <p class="read-more" onclick="toggleDescription(this)">
                        Read More <i class="fa fa-chevron-down fa-icon"></i>
                    </p>
                    <a href="https://actuaries.org.uk/" target="_blank" class="btn btn-main-md">Partner Website</a>
                </div>
            </div>
            <div class="card custom-card mt-5">
                <!-- First Section (30%) -->
                <div class="card-body text-center">
                    <img class="company-logo" src="<?= $partnerPath; ?>MarshMcLennan_h_rgb_c.png" alt="Company Logo">
                    <div class="company-name">Gold Partner</div>
                    <div class="partnership-category"></div>
                </div>

                <!-- Border between sections -->
                <!-- //my-3 -->
                <div class="border-left"></div>

                <!-- Second Section (70%) -->
                <div class="card-body">
                    <p class="description">
                    Marsh McLennan is the world’s leading professional services firm in the areas of risk, strategy and people. The Company’s 86,000 colleagues advise clients in 130 countries. With annual revenue over $19 billion, Marsh McLennan helps clients navigate an increasingly dynamic and complex environment through four market-leading businesses. 
                    <br><br>
                    Marsh provides data-driven risk advisory services and insurance solutions to commercial and consumer clients. 
                    Guy Carpenter develops advanced risk, reinsurance and capital strategies that help clients grow profitably and pursue emerging opportunities. 
                    Mercer delivers advice and technology-driven solutions that help organizations redefine the world of work, reshape retirement and investment outcomes, and unlock health and well-being for a changing workforce. 
                    Oliver Wyman serves as a critical strategic, economic and brand advisor to private sector and governmental clients.
                    </p>
                    <p class="read-more" onclick="toggleDescription(this)">
                        Read More <i class="fa fa-chevron-down fa-icon"></i>
                    </p>
                    <a href="https://www.marshmclennan.com" target="_blank" class="btn btn-main-md">Partner Website</a>
                </div>
            </div>

            <div class="card custom-card mt-5">
                <!-- First Section (30%) -->
                <div class="card-body text-center">
                    <img class="company-logo" src="<?= $partnerPath; ?>M&G Global.png" alt="Company Logo">
                    <div class="company-name">Gold Partner</div>
                    <div class="partnership-category"></div>
                </div>

                <!-- Border between sections -->
                <!-- //my-3 -->
                <div class="border-left"></div>

                <!-- Second Section (70%) -->
                <div class="card-body">
                    <p class="description">
                        A strong partner within the M&G plc group, enabling our international savings and investment business.
                        <br>M&G Global Services Private Limited is M&G plc’s fully owned entity in India, delivering with excellence since inception in 2003.

                        <br>We serve international customers through our customer brands – international asset manager M&G Investments, and Prudential which manages long-term savings, investments and retirement solutions within the M&G plc group.
                        <br><br>About Us

                        <br>M&G Global Services was established in Mumbai, India in 2003. We focus on delivering positive outcomes for our customers and clients across the M&G plc group, providing knowledge-based and digitally led solutions.

                        <br>We partner with our colleagues across business areas and international locations for the group such as digital, finance, actuarial, quants, investment management, wealth operations, technology, risk, compliance, and audit, including M&G’s third parties in India.

                        <br>Our focus on <a href="https://www.mandgplc.com/sitecore/service/notfound.aspx?item=web%3a%7b767FAE7C-535F-408E-9AFC-A60930A5C0D5%7d%40en" target="_blank">sustainability</a>, <a href="https://www.mandgplc.com/our-business/diversity-and-inclusion"  target="_blank">diversity and inclusion</a> along with our <a href="https://www.mandgplc.com/sitecore/service/notfound.aspx?item=web%3a%7b2248D51B-C480-44B7-AC6B-19D83EB23A1F%7d%40en" target="_blank">Corporate Responsibility (CR)</a> initiatives, helps us to build a well-knit and sustainable community.

                
                    </p>
                    <p class="read-more" onclick="toggleDescription(this)">
                        Read More <i class="fa fa-chevron-down fa-icon"></i>
                    </p>
                    <a href="https://www.mandg.com/mandgglobalservices.com" target="_blank" class="btn btn-main-md">Partner Website</a>
                </div>
            </div>
            <div class="card custom-card mt-5">
                <!-- First Section (30%) -->
                <div class="card-body text-center">
                    <img class="company-logo" src="<?= $partnerPath; ?>MarshMcLennan_h_rgb_c.png" alt="Company Logo">
                    <div class="company-name">Gold Partner</div>
                    <div class="partnership-category"></div>
                </div>

                <!-- Border between sections -->
                <!-- //my-3 -->
                <div class="border-left"></div>

                <!-- Second Section (70%) -->
                <div class="card-body">
                    <p class="description">
                    Marsh McLennan is the world’s leading professional services firm in the areas of risk, strategy and people. The Company’s 86,000 colleagues advise clients in 130 countries. With annual revenue over $19 billion, Marsh McLennan helps clients navigate an increasingly dynamic and complex environment through four market-leading businesses. 
                    <br><br>
                    Marsh provides data-driven risk advisory services and insurance solutions to commercial and consumer clients. 
                    Guy Carpenter develops advanced risk, reinsurance and capital strategies that help clients grow profitably and pursue emerging opportunities. 
                    Mercer delivers advice and technology-driven solutions that help organizations redefine the world of work, reshape retirement and investment outcomes, and unlock health and well-being for a changing workforce. 
                    Oliver Wyman serves as a critical strategic, economic and brand advisor to private sector and governmental clients.
                    </p>
                    <p class="read-more" onclick="toggleDescription(this)">
                        Read More <i class="fa fa-chevron-down fa-icon"></i>
                    </p>
                    <a href="https://www.marshmclennan.com" target="_blank" class="btn btn-main-md">Partner Website</a>
                </div>
            </div>
            <div class="card custom-card mt-5">
                <!-- First Section (30%) -->
                <div class="card-body text-center">
                    <img class="company-logo" src="<?= $partnerPath; ?>Munich_re.png" alt="Company Logo">
                    <div class="company-name">Gold Partner</div>
                    <div class="partnership-category"></div>
                </div>

                <!-- Border between sections -->
                <!-- //my-3 -->
                <div class="border-left"></div>

                <!-- Second Section (70%) -->
                <div class="card-body">
                    <p class="description">
                    Munich Re is one of the world’s leading providers of reinsurance, primary insurance and insurance-related risk solutions. The Group consists of the reinsurance and ERGO business segments, as well as the asset manager MEAG. Munich Re is globally active and operates in all lines of the insurance business. Since it was founded in 1880, Munich Re has been known for its unrivalled risk-related expertise and its sound financial position. It offers customers financial protection when faced with exceptional levels of damage – from the 1906 San Francisco earthquake to Hurricane Ian in 2022. Munich Re possesses outstanding innovative strength, which enables it to also provide coverage for extraordinary risks such as rocket launches, renewable energies or cyber risks. The company is playing a key role in driving forward the digital transformation of the insurance industry, and in doing so has further expanded its ability to assess risks and the range of services that it offers. Its tailor-made solutions and close proximity to its customers make Munich Re one of the world’s most sought-after risk partners for businesses, institutions, and private individuals.
                    </p>
                    <p class="read-more" onclick="toggleDescription(this)">
                        Read More <i class="fa fa-chevron-down fa-icon"></i>
                    </p>
                    <a href="https://www.munichre.com/en.html" target="_blank" class="btn btn-main-md">Partner Website</a>
                </div>
            </div>
            <div class="card custom-card mt-5">
                <!-- First Section (30%) -->
                <div class="card-body text-center">
                    <img class="company-logo" src="<?= $partnerPath; ?>Swiss Re.png" alt="Company Logo">
                    <div class="company-name">Gold Partner</div>
                    <div class="partnership-category"></div>
                </div>

                <!-- Border between sections -->
                <!-- //my-3 -->
                <div class="border-left"></div>

                <!-- Second Section (70%) -->
                <div class="card-body">
                    <p class="description new-height">
                        The Swiss Re Group is one of the world's leading providers of reinsurance, insurance and other forms of insurance-based risk transfer, working to make the world more resilient. The aim of the Swiss Re Group is to enable society to thrive and progress, creating new opportunities and solutions for its clients. Our Reinsurance Business Unit covers both Property & Casualty and Life & Health. We're a leading, diversified global reinsurer with offices in more than 20 countries, providing expertise and services to clients throughout the world. We've been engaged in the reinsurance business since our foundation in Zurich, Switzerland in 1863.
                       
                    </p>
                    <a href="https://www.swissre.com/" target="_blank" class="btn btn-main-md">Partner Website</a>
                </div>
            </div>
            
            <div class="card custom-card mt-5">
                <!-- First Section (30%) -->
                <div class="card-body text-center">
                    <img class="company-logo" src="<?= $partnerPath; ?>CAS Logo.png" alt="Company Logo">
                    <div class="company-name">Silver Partner</div>
                    <div class="partnership-category"></div>
                </div>

                <!-- Border between sections -->
                <!-- //my-3 -->
                <div class="border-left"></div>

                <!-- Second Section (70%) -->
                <div class="card-body">
                    <p class="description new-height">
                        The Casualty Actuarial Society (CAS) is a leading international organization for credentialing and professional education. Founded in 1914, the CAS is the world’s only actuarial organization focused exclusively on general insurance risks and serves over 10,000 members worldwide. CAS members are experts in general insurance, reinsurance, finance, risk management, and enterprise risk management. Professionals educated by the CAS empower business and government to make well-informed strategic, financial and operational decisions.
                        

                    </p>
                    <a href="https://www.casact.org" target="_blank" class="btn btn-main-md">Partner Website</a>
                </div>
            </div>
            <div class="card custom-card mt-5">
                <!-- First Section (30%) -->
                <div class="card-body text-center">
                    <img class="company-logo" src="<?= $partnerPath; ?>GenRe.svg" alt="Company Logo">
                    <div class="company-name">Silver Partner</div>
                    <div class="partnership-category"></div>
                </div>

                <!-- Border between sections -->
                <!-- //my-3 -->
                <div class="border-left"></div>

                <!-- Second Section (70%) -->
                <div class="card-body">
                    <p class="description new-height">Gen Re delivers reinsurance solutions to the Life & Health and Property & Casualty insurance industries. We work closely with the clients to understand their strategic and operational goals, offering a wide range of products, tools, and resources that aim to promote our clients’ ongoing growth and success. Gen Re is a member of the Berkshire Hathaway family of companies and has earned superior financial strength ratings from each of the major rating agencies.
                    </p>
                    <a href="https://www.genre.com/" target="_blank" class="btn btn-main-md">Partner Website</a>
                </div>
            </div>
            <div class="card custom-card mt-5">
                <!-- First Section (30%) -->
                <div class="card-body text-center">
                    <img class="company-logo" src="<?= $partnerPath; ?>HDFC ERGO.png" alt="Company Logo">
                    <div class="company-name">Silver Partner</div>
                    <div class="partnership-category"></div>
                </div>

                <!-- Border between sections -->
                <!-- //my-3 -->
                <div class="border-left"></div>

                <!-- Second Section (70%) -->
                <div class="card-body">
                    <p class="description">
                        HDFC ERGO General Insurance Company Limited was promoted by erstwhile Housing Development Finance Corporation Ltd. (HDFC), India&rsquo;s premier Housing Finance Institution and ERGO International AG, the primary insurance entity of Munich Re Group. Consequent to the implementation of the Scheme of Amalgamation of HDFC with and into HDFC Bank Limited (Bank), one of India&rsquo;s leading private sector banks, the Company has become a subsidiary of the Bank. HDFC ERGO is the second largest non-life insurance company in the Private Sector as on 31st March 2023 based on gross premium garnered. &nbsp;
                        <br><br>A digital-first company, transforming into an AI-first company, HDFC ERGO is a leader in implementing technology to offer customers the best-in-class service experience. The company has created a stream of innovative &amp; new products as well as services using technologies like Artificial Intelligence (AI), Machine Learning (ML), Natural Processing Language (NLP), and Robotics. HDFC ERGO offers a range of general insurance products and has a completely digital sales process with ~93% of retail policies issued digitally. HDFC ERGO&rsquo;s technology platform has empowered it to service 66% of policy servicing requests digitally on a 24x7 basis with one third of the requests serviced through Artificial Intelligence. &nbsp;
                        <br><br>In FY23, the company has issued 1.22 crore policies and has settled ~50 lakhs claims. The Company has an active data base of 1.5+ crore customers. HDFC ERGO is present in 490 districts of the country through their 215 branches, 10,000+ employees and 1.8 lakhs agents and channel partners.&nbsp;
                        <br><br>HDFC ERGO offers a complete range of General Insurance products including Health, Motor, Home, Agriculture, Travel, Credit, Cyber and Personal Accident in the retail space along with Property, Marine, Engineering, Marine Cargo, Group Health and Liability Insurance in the corporate space. Be it unique insurance products, integrated customer service models, top-in-class claim processes or a host of technologically innovative solutions, HDFC ERGO has been able to delight its customers at every touch-point and milestone to ensure consumers are serviced in real-time.&nbsp;
                        <br><br>Please log on to <a href="https://www.hdfcergo.com" target="_blank">www.hdfcergo.com</a> or stay connected on the following social media handles to get more information on HDFC ERGO and the products and services offered by the company. &nbsp;
                
                    </p>
                    <p class="read-more" onclick="toggleDescription(this)">
                        Read More <i class="fa fa-chevron-down fa-icon"></i>
                    </p>
                    <a href="https://www.hdfcergo.com/" target="_blank" class="btn btn-main-md">Partner Website</a>
                </div>
            </div>
            <div class="card custom-card mt-5">
                <!-- First Section (30%) -->
                <div class="card-body text-center">
                    <img class="company-logo" src="<?= $partnerPath; ?>ICICI pru Logo.jpg" alt="Company Logo">
                    <div class="company-name">Silver Partner</div>
                    <div class="partnership-category"></div>
                </div>

                <!-- Border between sections -->
                <!-- //my-3 -->
                <div class="border-left"></div>

                <!-- Second Section (70%) -->
                <div class="card-body">
                    <p class="description">
                        ICICI Prudential Life Insurance Company Limited (ICICI Prudential Life) is promoted by ICICI Bank Limited and Prudential Corporation Holdings Limited.

                        <br><br>ICICI Prudential Life began its operations in the fiscal year 2001. On a retail weighted received premium basis (RWRP), it has consistently been amongst the top companies in the Indian life insurance sector. Our Assets Under Management (AUM) at September 30, 2023 were ₹2,719.03 billion.

                        <br><br>At ICICI Prudential Life, we operate on the core philosophy of customer-centricity. We offer long-term savings and protection products to meet the different life stage requirements of our customers. We have developed and implemented various initiatives to provide cost-effective products, superior quality services, consistent fund performance and a hassle-free claim settlement experience to our customers.
                    </p>
                    <p class="read-more" onclick="toggleDescription(this)">
                        Read More <i class="fa fa-chevron-down fa-icon"></i>
                    </p>
                    <a href="https://www.iciciprulife.com/" target="_blank" class="btn btn-main-md">Partner Website</a>
                </div>
            </div>
            <div class="card custom-card mt-5">
                <!-- First Section (30%) -->
                <div class="card-body text-center">
                    <img class="company-logo" src="<?= $partnerPath; ?>max_logo_png.png" alt="Company Logo">
                    <div class="company-name">Silver Partner</div>
                    <div class="partnership-category"></div>
                </div>

                <!-- Border between sections -->
                <!-- //my-3 -->
                <div class="border-left"></div>

                <!-- Second Section (70%) -->
                <div class="card-body">
                    <p class="description">
                    Max Life is a Joint Venture between Max Financial Services Limited (“MFSL”) and Axis Bank Limited. Max Life offers comprehensive protection and long-term savings life insurance solutions, through its multi-channel distribution including agency and third-party distribution partners. Max Life has built its operations over two decades through a need-based sales process, a customer-centric approach to engagement and service delivery and trained human capital. As per annual audited financials for FY2022-23, Max Life has achieved a gross written premium of INR 25,342 Cr.
                    </p>
                   
                    <a href="https://www.maxlifeinsurance.com/" target="_blank" class="btn btn-main-md">Partner Website</a>
                </div>
            </div>
            <div class="card custom-card mt-5">
                <!-- First Section (30%) -->
                <div class="card-body text-center">
                    <img class="company-logo" src="<?= $partnerPath; ?>soa.webp" alt="Company Logo">
                    <div class="company-name">Silver Partner</div>
                    <div class="partnership-category"></div>
                </div>

                <!-- Border between sections -->
                <!-- //my-3 -->
                <div class="border-left"></div>

                <!-- Second Section (70%) -->
                <div class="card-body">
                    <p class="description">
                    With roots dating back to 1889, the Society of Actuaries (SOA) is the world's largest actuarial professional organization with more than 32,000 actuaries as members. Through research and education, the SOA's mission is to advance actuarial knowledge and to enhance the ability of actuaries to provide expert advice and relevant solutions for financial, business and societal challenges. The SOA's vision is for actuaries to be the leading professionals in the measurement and management of risk. 
                    </p>
                   
                    <a href="https://www.soa.org/" target="_blank" class="btn btn-main-md">Partner Website</a>
                </div>
            </div>
            <div class="card custom-card mt-5">
                <!-- First Section (30%) -->
                <div class="card-body text-center">
                    <img class="company-logo" src="<?= $partnerPath; ?>sud.png" alt="Company Logo">
                    <div class="company-name">Silver Partner</div>
                    <div class="partnership-category"></div>
                </div>

                <!-- Border between sections -->
                <!-- //my-3 -->
                <div class="border-left"></div>

                <!-- Second Section (70%) -->
                <div class="card-body">
                    <p class="description">
                        Star Union Dai-ichi Life Insurance, an influential presence in the Indian life insurance 
                        landscape since its establishment in 2009, stands as a beacon of financial security and 
                        innovation. In a powerful collaboration, it brings together the strengths of two of India's 
                        premier public sector banks - Bank of India and Union Bank of India, along with Dai-ichi 
                        Life, the second-largest life insurance company in Japan. As a testament to our expansive 
                        reach and influence, SUD Life boasts of having one of the most extensive life insurance 
                        distribution footprints in India. With a robust collective network spanning over 15,000 
                        bank branches, we diligently serve the financial needs of over 10 million customers 
                        nationwide. <br>
                        Our portfolio of offerings is as diverse as the needs of our customers. From comprehensive 
                        protection products to innovative savings solutions, wealth-building instruments, child-centric plans, retirement products, and cutting-edge hybrid health insurance options, SUD 
                        Life is committed to providing a comprehensive suite of life insurance products. 
                        <br>At the heart of our mission is an unwavering commitment to our customers. Their needs, 
                        aspirations, and diverse backgrounds are our guiding principles. We strive to cater to the 
                        unique requirements of individuals across various strata of society and geographies. In a 
                        world where financial security is paramount, SUD Life stands tall as a guardian of dreams 
                        and aspirations. Our journey goes beyond mere transactions; it is a pledge to safeguard 
                        the financial well-being of our customers and contribute meaningfully to their life 
                        journeys.
                        
                    
                    </p>
                    <p class="read-more" onclick="toggleDescription(this)">
                        Read More <i class="fa fa-chevron-down fa-icon"></i>
                    </p>
                    <a href="https://www.sudlife.in/" target="_blank" class="btn btn-main-md">Partner Website</a>
                </div>
            </div>
            <div class="card custom-card mt-5">
                <!-- First Section (30%) -->
                <div class="card-body text-center">
                    <img class="company-logo" src="<?= $partnerPath; ?>ICICI_Lombard-removebg-preview.png" alt="Company Logo">
                    <div class="company-name">Wellness Partner</div>
                    <div class="partnership-category"></div>
                </div>

                <!-- Border between sections -->
                <!-- //my-3 -->
                <div class="border-left"></div>

                <!-- Second Section (70%) -->
                <div class="card-body">
                    <p class="description">
                    ICICI Lombard is the leading private general insurance company in the country. The company offers a comprehensive and well-diversified range of products through multiple distribution channels, including Motor, Health, Crop, Fire, Personal accident, Marine, Engineering and Liability insurance. With a legacy of over 22 years, ICICI Lombard is committed to customer centricity with its brand philosophy of “Nibhaaye Vaade” The company has issued over 32.7 million policies, settled 3.6 million claim and has a gross written premium (GWP) of INR 217.72 billion for the year ended March 31, 2023. ICICI Lombard has 305 branches and 12,685 employees, as on 31st March 2023.
                    
                    </p>
                    <p class="read-more" onclick="toggleDescription(this)">
                        Read More <i class="fa fa-chevron-down fa-icon"></i>
                    </p>
                    <a href="https://www.icicilombard.com/" target="_blank" class="btn btn-main-md">Partner Website</a>
                </div>
            </div>
            <div class="card custom-card mt-5">
                <!-- First Section (30%) -->
                <div class="card-body text-center">
                    <img class="company-logo" src="<?= $partnerPath; ?>hdfc life.png" alt="Company Logo">
                    <div class="company-name">Engagement Partner</div>
                    <div class="partnership-category"></div>
                </div>

                <!-- Border between sections -->
                <!-- //my-3 -->
                <div class="border-left"></div>

                <!-- Second Section (70%) -->
                <div class="card-body">
                    <p class="description">
                    Established in 2000, HDFC Life is a leading, listed, long-term life insurance solutions provider in India, offering a range of individual and group insurance solutions that meet various customer needs such as Protection, Pension, Savings, Investment, Annuity and Health. The Company has more than 80 products (including individual and group products) and optional riders in its portfolio, catering to a diverse range of customer needs.<br>
                    <br>HDFC Life continues to benefit from its increased presence across the country, having a wide reach with branches and additional distribution touch-points through several new tie-ups and partnerships. The count of distribution partnerships is over 300, comprising banks, NBFCs, MFIs, SFBs, brokers, new ecosystem partners amongst others. The Company has a strong base of financial consultants.

                    </p>
                    <p class="read-more" onclick="toggleDescription(this)">
                        Read More <i class="fa fa-chevron-down fa-icon"></i>
                    </p>
                    <a href="https://www.hdfclife.com/" target="_blank" class="btn btn-main-md">Partner Website</a>
                </div>
            </div>
            <div class="card custom-card mt-5">
                <!-- First Section (30%) -->
                <div class="card-body text-center">
                    <img class="company-logo" src="<?= $partnerPath; ?>pnb-metlife.svg" alt="Company Logo">
                    <div class="company-name">Engagement Partner</div>
                    <div class="partnership-category"></div>
                </div>

                <!-- Border between sections -->
                <!-- //my-3 -->
                <div class="border-left"></div>

                <!-- Second Section (70%) -->
                <div class="card-body">
                    <p class="description">
                    PNB MetLife India Insurance Company Limited is one of the leading life insurance companies in India that combines the financial strength of MetLife, Inc. with the credibility of Punjab National Bank (PNB), one of the India's oldest nationalized banks. PNB MetLife’s purpose, Milkar Life Aage Badhaein, is demonstrated through its customer-centric innovations and employee empowerment practices. 
                    <br><br>
                    With a strong presence in 139 branches, and access to customers through its bank partnerships in over 18,600 branches (as of March 31, 2023), PNB MetLife offers a comprehensive product portfolio covering Child Education, Family Protection, Long-Term Saving, and Retirement solutions through its sales channel of over 19,500 financial advisors and multiple bank partners and caters to over 590+ group relationships in India.

                    </p>
                    <p class="read-more" onclick="toggleDescription(this)">
                        Read More <i class="fa fa-chevron-down fa-icon"></i>
                    </p>
                    <a href="https://www.pnbmetlife.com/" target="_blank" class="btn btn-main-md">Partner Website</a>
                </div>
            </div>


        </div>



    </section>




    <!--====  End of Speakers  ====-->

    <!--==============================
=            Schedule            =
===============================-->



    <?php
    include "includes/footer.php";
    include "includes/footer_includes.php";
    ?>


    <script>
        function toggleDescription(element) {
            var cardBody = element.parentElement;
            var description = cardBody.querySelector('.description');
            var readMore = cardBody.querySelector('.read-more');

            if (description.style.height === '' || description.style.height === '185px') {
                description.style.height = 'auto';
                readMore.innerHTML = 'Read Less <i class="fa fa-chevron-up fa-icon"></i>';
            } else {
                description.style.height = '185px';
                readMore.innerHTML = 'Read More <i class="fa fa-chevron-down fa-icon"></i>';
            }
        }
    </script>

</body>

</html>