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
            font-weight: 500;
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
        @media only screen and (max-width: 480px) {
            
            .custom-card{
                flex-direction: column;
            }

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
                    <img class="company-logo" src="<?= $partnerPath; ?>SBI_Logo.png" alt="Company Logo">
                    <div class="company-name">Platinum Partner</div>
                    <!-- <div class="partnership-category"></div> -->
                </div>

                <!-- Border between sections -->
                <!-- //my-3 -->
                <div class="border-left"></div>

                <!-- Second Section (70%) -->
                <div class="card-body">
                    <p class="description">
                        SBI Life Insurance (‘SBI Life’ / ‘The Company’), one of the most trusted life insurance companies in India, 
                        was incorporated in October 2000 and is registered with the Insurance Regulatory and Development 
                        Authority of India (IRDAI) in March 2001.
                        <br><br>Serving millions of families across India, SBI Life’s diverse range of products caters to individuals as well 
                        as group customers through Protection, Pension, Savings and Health solutions.
                        <br><br>Driven by ‘Customer-First’ approach, SBI Life places great emphasis on maintaining world class operating 
                        efficiency and providing hassle-free claim settlement experience to its customers by following high ethical 
                        standards of service. Additionally, SBI Life is committed to enhance digital experiences for its customers, 
                        distributors and employees alike.
                        <br><br>SBI Life strives to make insurance accessible to all, with its extensive presence across the country through 
                        its 1,028 offices, 24,060 employees, a large and productive network of about 243,590 agents, 74 corporate 
                        agents and 14 bancassurance partners with more than 41,000 partner branches, 150 brokers and other 
                        insurance marketing firms.
                        <br><br>In addition to doing what’s right for the customers, the company is also committed to provide a healthy 
                        and flexible work environment for its employees to excel personally and professionally.
                        <br><br>SBI Life strongly encourages a culture of giving back to the society and has made substantial contribution 
                        in the areas of child education, healthcare, disaster relief and environmental upgrade. In 2022-23, the 
                        Company touched over 1.1 lakh direct beneficiaries through various CSR interventions.
                        <br><br>Listed on the Bombay Stock Exchange ('BSE') and the National Stock Exchange ('NSE'), the company has 
                        an authorized capital of Rs. 20.0 billion and a paid-up capital of Rs. 10.0 billion. The AuM is Rs. 3,714.1 
                        billion.
                        <br><br>For more information, please visit our website-<a href="https://www.sbilife.co.in/" target="_blank">www.sbilife.co.in</a> and connect with us on Facebook, 
                        Twitter, YouTube, Instagram, and LinkedIn.
                        <br>(Numbers & data mentioned above are for the period ended December 31, 2023)
                    </p>
                    <p class="read-more" onclick="toggleDescription(this)">
                        Read More <i class="fa fa-chevron-down fa-icon"></i>
                    </p>
                    <a href="https://www.sbilife.co.in/" target="_blank" class="btn btn-main-md">Partner Website</a>
                </div>
            </div>
            <div class="card custom-card mt-5">
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
                    <img class="company-logo" src="<?= $partnerPath; ?>MetLife.png" alt="Company Logo">
                    <div class="company-name">Gold Partner</div>
                    <div class="partnership-category"></div>
                </div>

                <!-- Border between sections -->
                <!-- //my-3 -->
                <div class="border-left"></div>

                <!-- Second Section (70%) -->
                <div class="card-body">
                    <p class="description">
                    MetLife GOSC was established in Noida, India, in 2007. GOSC is MetLife owned and has been operational since March 2008.  Presently, we stand strong at ~3700 associates with additional capability centers in Jaipur and Hyderabad. As a customer-first organization, we develop optimal solutions for migrating and improving business processes through a disciplined approach grounded in quality methodologies and technology. This enables our business partners to focus resources where they count most.
                    <br><br>We have been certified as a ‘Great place to work’ for the 5th time. At GOSC, we believe that people are our most valuable asset and investment in our colleagues yields strong business outcomes. This recognition is a testimony of our strong people practices. Following industry-wide best norms, we have also achieved CMMI 2.0 – Maturity Level 5 Certification – which further demonstrates our strong industry positioning and focus on innovation and sustained excellence.
                    <br><br>GOSC lays an equal emphasis on environmental sustainability, community outreach programs, and pushing the needle on diversity, equity, and inclusion. We are actively involved in working towards the social and economic development of the communities in which we operate. Our association with different NGOs has given us positive results and today we are working on dimensions such as healthcare, education, sustainable livelihood, and women empowerment to calibrate substantial changes. </p>
                    <p class="read-more" onclick="toggleDescription(this)">
                        Read More <i class="fa fa-chevron-down fa-icon"></i>
                    </p>
                    <a href="https://www.metlife.com/" target="_blank" class="btn btn-main-md">Partner Website</a>
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
                    <img class="company-logo" src="<?= $partnerPath; ?>Tata AA.png" alt="Company Logo">
                    <div class="company-name">Delegate Kit Partner</div>
                    <div class="partnership-category"></div>
                </div>

                <!-- Border between sections -->
                <!-- //my-3 -->
                <div class="border-left"></div>

                <!-- Second Section (70%) -->
                <div class="card-body">
                    <p class="description">
                                                <b>About Tata AIA Life </b>

                            

                            <br><br>Tata AIA Life Insurance Company Limited (Tata AIA) is a joint venture Company formed by Tata Sons Pvt. Ltd. and AIA Group Ltd. (AIA). Tata AIA Life combines Tata’s pre-eminent leadership position in India and AIA’s presence as the largest, independent listed pan-Asian life insurance group in the world, spanning 18 markets in the Asia Pacific region. 

                            <br>Tata AIA reported an Individual Weighted New Business Premium (IWNBP) income of INR 7,092 Cr in FY23, an increase of 59% over FY22. The Individual Death Claims Settlement ratio improved from 98.53% in FY22 to 99.01% in FY23. The Persistency ratio, reflecting the percentage of consumers who choose to renew their policies with Tata AIA, has earned the Company the top rank in four out of five cohorts, including 13th-month persistency.  Compared to FY22, the 13th Month Persistency ratio (based on Premium) of the Company improved to 88.1%. 

                            

                            <br><br><b>About the Tata Group   </b>

                            

                            <br><br>Founded by Jamsetji Tata in 1868, the Tata Group is a global enterprise, headquartered in India, comprising 30 companies across ten verticals. The group operates in more than 100 countries across six continents, with a mission 'To improve the quality of life of the communities we serve globally, through long-term stakeholder value creation based on Leadership with Trust’. 

                            <br>Tata Sons is the principal investment holding company and promoter of Tata companies. Sixty-six percent of the equity share capital of Tata Sons is held by philanthropic trusts, which support education, health, livelihood generation and art and culture. In 2022-23, the revenue of Tata companies, taken together, was $150 billion (INR 12 trillion). These companies collectively employ over 1 million people. 

                            

                            <br>Each Tata company or enterprise operates independently under the guidance and supervision of its own board of directors. There are 29 publicly listed Tata enterprises with a combined market capitalisation of $300 billion (INR 24 trillion) as on July 31, 2023. 

                            

                            <br><br><b>About AIA  </b>

                            

                            <br><br> AIA Group Limited and its subsidiaries (collectively “AIA” or the “Group”) comprise the largest independent publicly listed pan-Asian life insurance group. It has a presence in 18 markets–wholly-owned branches and subsidiaries in Mainland China, Hong Kong SAR(1), Thailand, Singapore, Malaysia, Australia, Cambodia, Indonesia, Myanmar, New Zealand, the Philippines, South Korea, Sri Lanka, Taiwan (China), Vietnam, Brunei and Macau SAR(2), and a 49 per cent joint venture in India. In addition, AIA has a 24.99 per cent shareholding in China Post Life Insurance Co., Ltd. 

                            

                            <br>The business that is now AIA was first established in Shanghai more than a century ago in 1919. It is a market leader in Asia (ex-Japan) based on life insurance premiums and holds leading positions across the majority of its markets. It had total assets of US$276 billion as of 30 June 2023. 

                            

                            <br>AIA meets the long-term savings and protection needs of individuals by offering a range of products and services including life insurance, accident and health insurance and savings plans. The Group also provides employee benefits, credit life and pension services to corporate clients. Through an extensive network of agents, partners and employees across Asia, AIA serves the holders of more than 41 million individual policies and 17 million participating members of group insurance schemes. 

                            

                            <br>AIA Group Limited is listed on the Main Board of The Stock Exchange of Hong Kong Limited under the stock codes “1299” for HKD counter and “81299” for RMB counter with American Depositary Receipts (Level 1) traded on the over-the-counter market under the ticker symbol “AAGIY”. 

                            

                            <br><br><b>Notes: </b>

                            <br><br>(1) Hong Kong SAR refers to the Hong Kong Special Administrative Region. 

                            <br>(2) Macau SAR refers to the Macau Special Administrative Region. 

                            
                    </p>
                    <p class="read-more" onclick="toggleDescription(this)">
                        Read More <i class="fa fa-chevron-down fa-icon"></i>
                    </p>
                    <a href="https://www.tataaia.com/" target="_blank" class="btn btn-main-md">Partner Website</a>
                </div>
            </div>
          
            <!-- Wellness start -->
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
            <!-- Wellness end -->
            <div class="card custom-card mt-5">
                <!-- First Section (30%) -->
                <div class="card-body text-center">
                    <img class="company-logo" src="<?= $partnerPath; ?>AIC Logo.png" alt="Company Logo">
                    <div class="company-name">Engagement Partner</div>
                    <div class="partnership-category"></div>
                </div>

                <!-- Border between sections -->
                <!-- //my-3 -->
                <div class="border-left"></div>

                <!-- Second Section (70%) -->
                <div class="card-body">
                    <p class="description">
                    Agriculture Insurance Company of India Limited (AIC) has been formed at the behest of Government of India, 
                    consequent to the announcement by the then Hon'ble Union Finance Minister in his General Budget Speech FY 2002-
                    03 that, "to subserve the needs of farmers better and to move towards a sustainable actuarial regime, it was proposed 
                    to set up a new Corporation for Agriculture Insurance".
                    <br><br>AIC has taken over the implementation of National Agricultural Insurance Scheme (NAIS) which, until FY 2002-03 was 
                    implemented by General Insurance Corporation of India. In addition, AIC also transacts other insurance businesses 
                    directly or indirectly concerning agriculture and its allied activities.
                    <br><br>Company has its Registered & Head Office at New Delhi and 18 Regional Offices situated in State Capitals.
                    <br><br>The company has technically sound workforce working only in the field of Agriculture insurance.
                    <br><br>Since inception the Company is the leading crop insurer of the country and is the largest insurer in term of number of 
                    farmers insured in the world and presently the Market Leader with more than 50% market share of Crop Insurance in 
                    India.
                    </p>
                    <p class="read-more" onclick="toggleDescription(this)">
                        Read More <i class="fa fa-chevron-down fa-icon"></i>
                    </p>
                    <a href="https://www.aicofindia.com/AICEng/Pages/default.aspx" target="_blank" class="btn btn-main-md">Partner Website</a>
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
              <!-- Silver start -->
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
                    <img class="company-logo" src="<?= $partnerPath; ?>gicre.jpg" alt="Company Logo">
                    <div class="company-name">Silver Partner</div>
                    <div class="partnership-category"></div>
                </div>

                <!-- Border between sections -->
                <!-- //my-3 -->
                <div class="border-left"></div>

                <!-- Second Section (70%) -->
                <div class="card-body">
                    <p class="description">
                        Set up in 1972 by the Government of India, to supervise the Indian General Insurance Industry, today, GIC Re with a net worth of 7.76 billion dollar, is the largest reinsurer in the domestic reinsurance market in India and leads most of the domestic companies' treaty programmes and facultative placements. It has steadfastly maintained its leadership position in the Indian reinsurance market. While foreign reinsurers have opened branch operations in India since early 2017, GIC Re has continued to maintain its market leadership and market share. GIC Re has been identified as Domestic Systemically Important Insurers (D-SIIs) by insurance regulator IRDAI. GIC Re, is India's sole public sector reinsurance company. 

                            <br><br>Internationally, GIC Re is an effective reinsurance partner for the Afro-Asian region, leading the reinsurance programmes of several insurance companies in Middle East and North Africa, and Asia including SAARC countries.  It has branch offices in London and Kuala Lumpur.  In April 2018, a syndicate fully capitalised by GIC Re became operational at Lloyd's of London.  This syndicate is expected to scale up over the next few years towards achieving the medium-term management objective of achieving 60:40 (domestic: international) risk portfolio composition.  Additionally, GIC Re has 100% subsidiary in South Africa and Russia and also associate companies in Bhutan, Singapore and India. GIC Re is transacting business across the world in 160 countries.  

                            <br><br>Besides subsidiaries and associate companies, GIC Re has branches in London, Dubai (currently in Run-off), Malaysia and GIFT City, Gandhinagar, India. 

                            <br><br>GIC Re provides reinsurance across all business lines, viz property, marine, motor, engineering, agriculture, aviation/space, health, liability, credit and financial and life insurance. 

                            <br><br>GIC Re was listed on the major stock exchanges of India in October 2017 by way of an Initial Public Offering. Majority ownership is still with the Government of India. 

                            <br><br>With more than 50 years of experience and commitment, GIC Re has become a trusted brand in India and overseas and is ranked 16th largest global reinsurer group as per AM Best Rating Agency. 
                                              
                        </p>
                        <p class="read-more" onclick="toggleDescription(this)">
                        Read More <i class="fa fa-chevron-down fa-icon"></i>
                    </p>
                    <a href="https://www.gicre.in/en/" target="_blank" class="btn btn-main-md">Partner Website</a>
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
                    <img class="company-logo" src="<?= $partnerPath; ?>Kotak Life.png" alt="Company Logo">
                    <div class="company-name">Silver Partner</div>
                    <div class="partnership-category"></div>
                </div>

                <!-- Border between sections -->
                <!-- //my-3 -->
                <div class="border-left"></div>

                <!-- Second Section (70%) -->
                <div class="card-body">
                    <p class="description">
                    Kotak Mahindra Life Insurance Company Limited (Kotak Life) is a 100% owned subsidiary of Kotak Mahindra Bank Limited (Kotak). As an organisation, Kotak Life provides world-class insurance products with high customer empathy. Its product suite leverages the combined prowess of protection and long term savings. Kotak Life is one of the fastest growing insurance companies in India with 286 branches across 146 cities and has more than 5 crore lives covered on its books as on 31st December, 2023.
                    </p>
                    <!-- <p class="read-more" onclick="toggleDescription(this)">
                        Read More <i class="fa fa-chevron-down fa-icon"></i>
                    </p> -->
                    <a href="https://www.kotaklife.com/" target="_blank" class="btn btn-main-md">Partner Website</a>
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
                    <img class="company-logo" src="<?= $partnerPath; ?>Niva Bupa Logo in Blue PNG.PNG" alt="Company Logo">
                    <div class="company-name">Silver Partner</div>
                    <div class="partnership-category"></div>
                </div>

                <!-- Border between sections -->
                <!-- //my-3 -->
                <div class="border-left"></div>

                <!-- Second Section (70%) -->
                <div class="card-body">
                    <p class="description">
                    About Niva Bupa Health Insurance (Formerly known as Max Bupa Health Insurance)    
                            Niva Bupa Health Insurance Company Limited is committed to offering every Indian the confidence to access the best healthcare - 'Zindagi Ko Claim Kar Le'. A joint venture between Fettle Tone LLP (an affiliate of True North Fund VI LLP), a leading Indian private equity firm, and the UK based healthcare expert, Bupa Singapore Holdings Pte. Limited. Niva Bupa is currently present in over 350 cities in the country. It additionally distributes its products through a network of 1.5 lakhs agent advisors, 20+ bank partners spread across 45,000+ bank partner branches and over 100 third party distributors.
                            <br><br>Niva Bupa currently covers more than 11 million lives and has 10,300+ hospitals as part of its network. The Company has been empowering consumers since 2010 with innovative products and solutions across all age groups in urban & rural markets. It is one of the fastest-growing health insurance companies with an annual average of 90%+ claim settlement ratio. With an employee base of over 7500 people, Niva Bupa is certified ‘Great Place to Work’ for the fourth time in a row.
                        </p>
                        <p class="read-more" onclick="toggleDescription(this)">
                        Read More <i class="fa fa-chevron-down fa-icon"></i>
                    </p> 
                    <a href="https://www.nivabupa.com/" target="_blank" class="btn btn-main-md">Partner Website</a>
                </div>
            </div>
            <div class="card custom-card mt-5">
                <!-- First Section (30%) -->
                <div class="card-body text-center">
                    <img class="company-logo" src="<?= $partnerPath; ?>shriram-life-insurance.svg" alt="Company Logo">
                    <div class="company-name">Silver Partner</div>
                    <div class="partnership-category"></div>
                </div>

                <!-- Border between sections -->
                <!-- //my-3 -->
                <div class="border-left"></div>

                <!-- Second Section (70%) -->
                <div class="card-body">
                    <p class="description">
                    Shriram Life Insurance Company Ltd is jointly promoted by Shriram Capital Ltd, the holding company for the financial services business of the Shriram Group, and South Africa-based financial services group Sanlam Ltd. Shriram Life Insurance is a leading insurer having built its operations over 18 years by catering to a wide demographic and providing the average Indian with a bouquet of life insurance products catering to their financial needs. The company works with the purpose of ensuring that all families in the community are provided with adequate financial protection especially in the vulnerable segment. 
                        <br><br>
                        Shriram Life Insurance offers comprehensive protection and long-term savings life insurance solutions, focused on people at the bottom of the socio-economic pyramid, with close to 45% of insurance beneficiaries being from rural markets. It has a network of 403 branch offices across India. Shriram Life Insurance underwrote gross premium of approximately INR 2,500 crore in FY23 and recording Assets Under Management (AUM) exceeding INR 10,000 crore as on September’23. The company successfully has provided life protection to over 7.2cr customers.
                        The Company has won an Award for the Best Digital Initiative- Life Insurance conferred by the InsureNext Awards 2022, organized by the Banking Frontiers in collaboration with knowledge partner Deloitte India. 
                        <br><br>
                        About Shriram Group
                        <br><br>
                        Shriram Group is one of India’s leading financial conglomerates with a dominant presence in commercial vehicle, retail, chit fund, equipment and housing finance, in addition to life and general insurance, stockbroking, distribution of financial products, and wealth advisory services. The Group focuses on serving the underserved and is driven by its agenda of ‘Financial Inclusion’ wherein it aims to provide access to finance to low-income families and small businesses. Shriram Capital Ltd is the holding company for the financial service entities--Shriram City Union Finance Ltd and Shriram Transport Finance Ltd, and the insurance entities--Shriram General Insurance Company Ltd and Shriram Life Insurance Company Ltd. Shriram Housing Finance Ltd is a subsidiary of Shriram City Union Finance. Shriram Group has a customer base in excess of 26 million, and around 1,12,000 employees across 4,200 branches. It posted a net profit of Rs 85 billion for FY23, with assets under management at Rs 2.5 trillion as of March 2023.
                                            </p>
                    <p class="read-more" onclick="toggleDescription(this)">
                        Read More <i class="fa fa-chevron-down fa-icon"></i>
                    </p> 
                    <a href="https://www.shriramlife.com/" target="_blank" class="btn btn-main-md">Partner Website</a>
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
            <!-- Silver end -->


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