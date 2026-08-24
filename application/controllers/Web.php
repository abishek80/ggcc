<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

    private $services_data;
    private $locations_data;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->_init_data();
    }

    private function _init_data()
    {
        // 16 Detailed Services Data Registry
        $this->services_data = array(
            'electrical-contracting' => array(
                'slug' => 'electrical-contracting',
                'title' => 'Electrical Contracting Services',
                'meta_title' => 'Turnkey Electrical Contracting Services in India | GGCC',
                'meta_description' => 'George General Construction Company (GGCC) provides end-to-end turnkey electrical contracting services for industrial, commercial, and infrastructure projects across India.',
                'short_desc' => 'Comprehensive turnkey electrical contracting solutions, power distribution, design execution, and project commissioning.',
                'icon' => '',
                'long_desc' => 'As a licensed electrical contracting company, GGCC manages full lifecycle electrical projects for industrial facilities, commercial complexes, power substations, and infrastructure utilities. Our certified electrical engineers execute projects with strict adherence to IS standards, NBC compliance, and CEA safety regulations.',
                'scope_of_work' => array(
                    'Electrical load design, single line diagram (SLD) preparation, and regulatory approval planning',
                    'Supply, installation, testing, and commissioning of HT & LT power distribution systems',
                    'Transformer installation, switchyard development, and ring main unit (RMU) integration',
                    'Earthing network design using chemical & copper plate earthing for sub-ohm resistivity',
                    'Electrical safety audit, insulation resistance testing, and load balancing'
                ),
                'applications' => array('Manufacturing Plants', 'Commercial Real Estate', 'IT Parks & Tech Centers', 'Infrastructure Projects', 'Hospitals & Education Campuses'),
                'benefits' => array('CEA & Bureau of Electrical Safety Compliance', 'Zero-Accident Safety Protocol Implementation', 'Optimized Cable Routing & Reduced Transmission Losses', 'On-Time Project Commissioning Guaranteed'),
                'faqs' => array(
                    array('q' => 'What licenses does GGCC hold for electrical contracting?', 'a' => 'GGCC holds class-1 electrical contracting licenses issued by state electrical inspectorates, authorizing turnkey HT and LT electrical installations across India.'),
                    array('q' => 'Do you handle government utility approvals and safety clearances?', 'a' => 'Yes, GGCC manages complete liaison with state electricity boards, CEIG (Chief Electrical Inspector to Government), and DISCOMs for sanction loads and safety certificates.')
                )
            ),
            'industrial-electrical-installation' => array(
                'slug' => 'industrial-electrical-installation',
                'title' => 'Industrial Electrical Installation',
                'meta_title' => 'Industrial Electrical Installation Services in India | GGCC',
                'meta_description' => 'GGCC offers robust industrial electrical installation, heavy motor wiring, sub-station setup, and plant electrification across major industrial hubs in India.',
                'short_desc' => 'Industrial UPS installation, VRLA/Lithium battery bank cabling, ATS panel integration, and clean power distribution.',
                'icon' => '',
                'long_desc' => 'Industrial manufacturing environments demand resilient electrical infrastructure capable of handling heavy inductive loads, harmonics, continuous duty cycles, and harsh operating conditions. GGCC delivers industrial electrical installations tailored to factory automation, chemical plants, automotive units, and textile mills.',
                'scope_of_work' => array(
                    'Heavy machinery cable termination and busbar trunking (BBT) system installation',
                    'Substation equipment installation including HT breakers, power transformers, and VCBs',
                    'Motor Control Center (MCC) installation and Variable Frequency Drive (VFD) wiring',
                    'Hazardous zone flameproof wiring and explosion-proof fitting integration',
                    'Industrial earthing grid installation with lightning protection systems'
                ),
                'applications' => array('Automotive & Engineering Factories', 'Chemical & Pharmaceutical Units', 'Textile & Processing Mills', 'Steel & Metallurgy Plants', 'Food Processing Units'),
                'benefits' => array('High uptime reliability under continuous industrial load', 'Harmonic suppression and power factor correction', 'Robust cable tray pathways and IP-rated enclosures', 'Full compliance with factory safety acts'),
                'faqs' => array(
                    array('q' => 'Can GGCC execute electrical work during active factory operations?', 'a' => 'Yes, our team plans phased shutdowns and off-peak execution strategies to ensure zero interruption to your core manufacturing lines.'),
                    array('q' => 'Do you install flameproof electrical equipment for chemical factories?', 'a' => 'Yes, we specialize in Flameproof (Ex-d) electrical installations certified for Zone 1 and Zone 2 hazardous industrial environments.')
                )
            ),
            'commercial-electrical-installation' => array(
                'slug' => 'commercial-electrical-installation',
                'title' => 'Commercial Electrical Installation',
                'meta_title' => 'Commercial Electrical Installation Services | GGCC',
                'meta_description' => 'GGCC delivers modern electrical installation services for office complexes, shopping malls, IT parks, hotels, and commercial buildings across India.',
                'short_desc' => 'Complete electrification for corporate offices, IT parks, retail malls, hotels, and institutional commercial spaces.',
                'icon' => '',
                'long_desc' => 'Modern commercial buildings require energy-efficient electrical systems, reliable emergency backup, aesthetics, and smart power management. GGCC handles complete interior and exterior commercial electrification, from main incoming panels to workstations and architectural illumination.',
                'scope_of_work' => array(
                    'Main LT distribution panel and floor sub-distribution board (SDB) installation',
                    'Concealed & surface conduit wiring for power sockets, lighting, and data points',
                    'UPS secondary distribution wiring and server room power infrastructure',
                    'Emergency power transfer switches (AMF/ATS) and DG set synchronization',
                    'Commercial energy metering and building management system (BMS) wiring integration'
                ),
                'applications' => array('Corporate Office Buildings', 'Shopping Malls & Retail Outlets', 'Hotels & Hospitality Complexes', 'Hospitals & Diagnostic Centers', 'Educational Institutions'),
                'benefits' => array('Aesthetic and code-compliant concealed wiring', 'Energy-efficient LED lighting power distribution', 'Seamless UPS & DG power backup integration', 'Comprehensive electrical load testing'),
                'faqs' => array(
                    array('q' => 'How does GGCC handle energy efficiency in commercial installations?', 'a' => 'We incorporate low-loss conductors, APFC panels, LED lighting controls, and sub-metering to minimize building operational costs.'),
                    array('q' => 'What safety standards are followed for high-rise commercial buildings?', 'a' => 'We comply strictly with National Building Code (NBC) guidelines, installing FRLS (Flame Retardant Low Smoke) cabling and dedicated fire pump electrical circuits.')
                )
            ),
            'annual-maintenance-contract-amc' => array(
                'slug' => 'annual-maintenance-contract-amc',
                'title' => 'Annual Maintenance Contract (AMC)',
                'meta_title' => 'Electrical AMC Services for Industrial & Commercial Facilities | GGCC',
                'meta_description' => 'Ensure continuous uptime with GGCC Electrical Annual Maintenance Contracts (AMC). Preventive maintenance, thermography, and 24/7 breakdown support.',
                'short_desc' => 'Comprehensive electrical preventive maintenance contracts for transformers, panels, cable networks, and backup systems.',
                'icon' => '',
                'long_desc' => 'Electrical failures can cause severe financial losses and safety hazards. GGCC Electrical AMC services provide scheduled preventive maintenance, thermal imaging inspection, breakdown support, and routine calibration for electrical installations across commercial and industrial sites.',
                'scope_of_work' => array(
                    'Periodic inspection and servicing of HT switchgears, transformers, and LT panels',
                    'Thermographic scanning to identify hot spots, loose busbar connections, and overload points',
                    'Transformer oil BDV (Breakdown Voltage) testing and DGA analysis',
                    'Earth pit resistance measuring and chemical treatment renewal',
                    '24/7 emergency response team for critical power breakdown restoration'
                ),
                'applications' => array('Factories & Manufacturing Facilities', 'IT & Data Centers', 'Commercial Towers', 'Hospitals', 'Residential & Commercial Estates'),
                'benefits' => array('Prevents costly catastrophic equipment failures', 'Extends operational lifespan of transformers & panels', 'Ensures compliance with statutory electrical safety audits', '24/7 priority emergency response'),
                'faqs' => array(
                    array('q' => 'What is included in a typical GGCC Electrical AMC?', 'a' => 'Our AMC packages include scheduled preventive maintenance visits, thermal imaging audits, earth pit testing, transformer servicing, and round-the-clock emergency breakdown support.'),
                    array('q' => 'Do you provide spare parts replacement under AMC contracts?', 'a' => 'We offer both Comprehensive (including spares replacement) and Non-Comprehensive AMC models based on facility requirements.')
                )
            ),
            'ht-lt-cable-laying' => array(
                'slug' => 'ht-lt-cable-laying',
                'title' => 'HT & LT Cable Laying Services',
                'meta_title' => 'HT & LT Cable Laying Services in India | GGCC',
                'meta_description' => 'GGCC specializes in high voltage (HT) and low voltage (LT) cable laying, trenching, cable jointing, and megger testing across India.',
                'short_desc' => 'High-voltage HT underground cable laying, trenching, HDD crossings, cable tray pathways, and heat-shrink jointing.',
                'icon' => '',
                'long_desc' => 'High Voltage (HT) up to 33kV and Low Voltage (LT) cable networks form the backbone of power distribution. GGCC delivers professional cable laying services, including trench excavation, masonry ducting, tray laying, heat-shrink jointing, and insulation resistance verification.',
                'scope_of_work' => array(
                    'Trenching, sand bedding, brick protection, and backfilling for underground cables',
                    'HDPE pipe pulling via trenchless HDD (Horizontal Directional Drilling) method',
                    'Cable tray installation (Ladder, Perforated, Wire mesh) in indoor and outdoor runs',
                    'Straight-through and outdoor heat-shrink cable jointing and end termination (Raychem/3M)',
                    'Hi-Pot testing, Insulation Resistance (Megger) testing, and continuity verification'
                ),
                'applications' => array('Industrial Plant Substation Feeder Lines', 'City Power Distribution Networks', 'Solar & Wind Farm Power Evacuation', 'Commercial Complex Mains', 'Infrastructure Corridors'),
                'benefits' => array('Flawless cable bending radius compliance to avoid insulation stress', 'Certified cable jointing technicians', 'Minimal surface damage with trenchless technology options', 'Comprehensive pre-commissioning test reports'),
                'faqs' => array(
                    array('q' => 'What voltage ratings of HT cables can GGCC handle?', 'a' => 'GGCC handles HT cable laying up to 33kV, as well as LT armored XLPE/PVC power and control cables of all sizes.'),
                    array('q' => 'Do you perform Hi-Pot testing on HT cables after laying?', 'a' => 'Yes, every HT cable installation undergoes high-voltage DC/AC withstand testing (Hi-Pot) and insulation resistance verification prior to charging.')
                )
            ),
            'lt-control-panel-installation' => array(
                'slug' => 'lt-control-panel-installation',
                'title' => 'LT Control Panel Installation',
                'meta_title' => 'LT Control Panel Installation & Fabrication Services | GGCC',
                'meta_description' => 'Professional installation of Low Tension (LT) main distribution boards, PCC, MCC, APFC, and custom control panels by GGCC.',
                'short_desc' => 'Fabrication and site installation of PCC, MCC, APFC, PDB, and main LT power distribution switchboards.',
                'icon' => '',
                'long_desc' => 'Low Tension (LT) panels distribute electrical power across facility loads while providing overload, short-circuit, and ground fault protection. GGCC supplies, installs, couples, and commissions custom-built LT panels complying with IS 8623 / IEC 61439 standards.',
                'scope_of_work' => array(
                    'Base frame foundation civil work and structural panel positioning',
                    'Inter-panel busbar jointing, torque checking, and insulation sleeve installation',
                    'Incoming and outgoing power & control cable glanding, dressing, and crimping',
                    'Protective relay testing, ACB/MCCB trip curve verification, and metering calibration',
                    'No-load and full-load panel commissioning tests'
                ),
                'applications' => array('Industrial Main Receiving Sub-stations', 'Commercial Building Power Centers', 'Motor Control Centers (MCC) for Process Plants', 'HVAC & Chiller Plant Control', 'Renewable Energy Power Coupling'),
                'benefits' => array('Ingress protection rating up to IP-55 / IP-65', 'High short-circuit withstand capacity design', 'Neat cable dressing and color-coded ferrules', 'Thorough secondary injection testing'),
                'faqs' => array(
                    array('q' => 'Does GGCC assist with panel sizing and busbar rating calculations?', 'a' => 'Yes, our engineering design team calculates load current, fault level, temperature rise, and busbar cross-sectional requirements.'),
                    array('q' => 'Can you modify existing live LT panels on-site?', 'a' => 'We perform panel extensions, ACB replacements, and retrofits under strictly controlled shutdown safety protocols.')
                )
            ),
            'flameproof-electrical-installation' => array(
                'slug' => 'flameproof-electrical-installation',
                'title' => 'Flameproof Electrical Installation',
                'meta_title' => 'Flameproof Electrical Installation Services | GGCC',
                'meta_description' => 'GGCC provides certified explosion-proof (Ex-d) and flameproof electrical installations for chemical, pharma, oil & gas, and hazardous industrial environments.',
                'short_desc' => 'PESO & CIMFR certified explosion-proof flameproof electrical installations for Zone 1 & Zone 2 hazardous areas.',
                'icon' => '',
                'long_desc' => 'Hazardous environments containing flammable gases, vapors, or combustible dust demand specialized explosion-proof (Ex-d/Ex-e) electrical apparatus. GGCC holds extensive expertise in deploying flameproof lighting, switchgears, glanding, and conduit systems adhering to IS/IEC 60079 standards.',
                'scope_of_work' => array(
                    'Zone classification assessment (Zone 1, Zone 2, Zone 21, Zone 22) and equipment selection',
                    'Installation of CIMFR/PESO-approved flameproof light fittings, junction boxes, and push buttons',
                    'Double-compression flameproof cable glanding with barrier compound filling',
                    'Heavy-gauge rigid metal conduit wiring with explosion-proof stopper boxes',
                    'Intrinsic safety earthing grid installation and bonding'
                ),
                'applications' => array('Chemical & Agro-Chemical Refineries', 'Pharmaceutical Active Pharmaceutical Ingredient (API) Plants', 'Oil & Gas Terminals & Depots', 'Paint & Solvent Manufacturing Units', 'LPG/CNG Bottling Plants'),
                'benefits' => array('100% PESO & CIMFR certified equipment compliance', 'Eliminates ignition risk in volatile atmospheres', 'Certified hazardous location electrical installers', 'Complete hazard compliance documentation'),
                'faqs' => array(
                    array('q' => 'What certifications do your flameproof equipment carry?', 'a' => 'All flameproof equipment installed by GGCC carries PESO (Petroleum and Explosives Safety Organization) and CIMFR test certificates.'),
                    array('q' => 'Why is double-compression glanding necessary in hazardous areas?', 'a' => 'Double-compression glands provide flameproof sealing on both the inner sheath and outer armor, preventing gas migration through cable voids.')
                )
            ),
            'street-lighting-installation' => array(
                'slug' => 'street-lighting-installation',
                'title' => 'Street Lighting Installation',
                'meta_title' => 'Street Lighting & Municipal Electrification Services | GGCC',
                'meta_description' => 'GGCC delivers turnkey street lighting installations, octagonal pole erections, smart LED lighting controls, and feeder pillar setup across India.',
                'short_desc' => 'Turnkey street lighting projects, smart LED lighting, octagonal pole installation, underground cabling, and automated timer pillars.',
                'icon' => '',
                'long_desc' => 'Reliable public and industrial street lighting enhances security, visibility, and energy conservation. GGCC executes complete street lighting projects for municipal roadways, industrial parks, highway corridors, and residential townships.',
                'scope_of_work' => array(
                    'Civil foundation construction for octagonal & tubular light poles',
                    'Erection of hot-dip galvanized octagonal poles (6m to 12m height)',
                    'Armored underground feeder cabling, loop-in loop-out junction box wiring',
                    'Installation of high-efficacy LED street light luminaires',
                    'Automation feeder pillar setup with astronomical timers and GSM smart controllers'
                ),
                'applications' => array('Municipal Roadways & Highways', 'Industrial Park Internal Roads', 'Gated Residential Townships', 'Ports, Logistics & SEZ Corridors', 'Commercial Campus Pathways'),
                'benefits' => array('Uniform lux level distribution engineered per IRC standards', 'Hot-dip galvanizing for 25+ years rust-free pole life', 'Smart timer pillars reducing municipal energy bills', 'Surge protection device (SPD) integration'),
                'faqs' => array(
                    array('q' => 'What pole heights and luminaire wattages can GGCC install?', 'a' => 'We install poles ranging from 4m garden posts up to 12m octagonal street poles, paired with 30W to 250W LED luminaires.'),
                    array('q' => 'Do you provide automated smart switching for street lights?', 'a' => 'Yes, we integrate photo-sensor astronomical timers and GSM/LoRa smart lighting controllers for automated dusk-to-dawn operation.')
                )
            ),
            'area-lighting-installation' => array(
                'slug' => 'area-lighting-installation',
                'title' => 'Area Lighting & High Mast Installation',
                'meta_title' => 'High Mast & Area Lighting Installation Services | GGCC',
                'meta_description' => 'GGCC provides high mast lighting towers, floodlighting, stadium lighting, and large area illumination solutions across India.',
                'short_desc' => 'Octagonal pole erection, 30m high mast tower winch assembly, LED floodlight aiming, and automated timer control.',
                'icon' => '',
                'long_desc' => 'Large open spaces such as stockyards, container terminals, sports arenas, and industrial plant yards require specialized high mast illumination. GGCC provides turnkey high mast erection, foundation civil work, motorized winch mechanism setup, and floodlight installation.',
                'scope_of_work' => array(
                    'Soil bearing test and heavy civil foundation casting for high mast towers',
                    'Assembly and erection of polygonal high mast shafts (16m, 20m, 25m, 30m)',
                    'Motorized winch mechanism installation, steel wire rope threading, and trailing cable setup',
                    'Floodlight fixture mounting, aiming, and lux distribution mapping',
                    'Aviation obstruction light (AOL) and lightning arrestor mounting'
                ),
                'applications' => array('Industrial Plant Stockyards & Raw Material Yards', 'Ports & Container Freight Stations (CFS)', 'Railway Yards & Bus Depots', 'Sports Stadiums & Arenas', 'Toll Plazas & Highway Junctions'),
                'benefits' => array('Engineered wind load resistance up to 180 km/h', 'Motorized lowering & raising mechanism for easy maintenance', 'High uniformity ratio minimizing dark spots', 'Heavy-duty weather-proof IP-66 luminaires'),
                'faqs' => array(
                    array('q' => 'How is maintenance performed on high mast lights?', 'a' => 'High mast towers feature an internal motorized winch that lowers the lantern carriage to ground level, enabling safe ground-based maintenance without scaffolding.'),
                    array('q' => 'Does GGCC conduct lux level computer simulations prior to installation?', 'a' => 'Yes, our lighting design team uses DIALux software to simulate lux levels, beam angles, and fixture counts based on yard dimensions.')
                )
            ),
            'electrical-panel-installation' => array(
                'slug' => 'electrical-panel-installation',
                'title' => 'Electrical Panel Installation',
                'meta_title' => 'Industrial Electrical Panel Installation Services | GGCC',
                'meta_description' => 'GGCC offers custom installation, busbar alignment, cable glanding, and testing for all types of electrical distribution and control panels.',
                'short_desc' => 'Main electrical room layout design, busbar riser trunking (BBT), riser cable pulling, and floor distribution boards.',
                'icon' => '',
                'long_desc' => 'Electrical distribution panels serve as critical hubs governing facility power flow and safety. GGCC installs, tests, and commissions all variations of electrical panels, ensuring structured cable entries, thermal dissipation, and short-circuit withstand capabilities.',
                'scope_of_work' => array(
                    'Positioning, leveling, and anchoring panels on ISMC base channels',
                    'Busbar trunking connection, copper/aluminum torque tight verification',
                    'Glanding, armor earthing, and ferrule labeling for incoming and outgoing feeders',
                    'Relay setting, CT/PT ratio testing, and breaker contact resistance measurement',
                    'Pre-commissioning dielectric withstand and insulation resistance testing'
                ),
                'applications' => array('Main Power Control Centers (PCC)', 'Motor Control Centers (MCC)', 'Power Distribution Boards (PDB)', 'Lighting Distribution Boards (LDB)', 'Automated Changeover (AMF) Panels'),
                'benefits' => array('Form 3b/4b internal compartment segregation options', 'Neat wire routing with fire-retardant channels', 'Precise protection relay parameter setting', 'Comprehensive panel testing documentation'),
                'faqs' => array(
                    array('q' => 'What panel IP ratings does GGCC install?', 'a' => 'We install panels ranging from indoor IP-42 distribution boards to outdoor weather-proof IP-65 stainless steel enclosures.'),
                    array('q' => 'Can GGCC upgrade older switchgear components inside existing panels?', 'a' => 'Yes, we retrofit obsolete air circuit breakers (ACBs) and oil circuit breakers with modern vacuum or SF6 breakers.')
                )
            ),
            'underground-cable-laying' => array(
                'slug' => 'underground-cable-laying',
                'title' => 'Underground Cable Laying Services',
                'meta_title' => 'Underground Cable Laying & Trenching Services | GGCC',
                'meta_description' => 'Expert underground HT & LT cable laying, HDD trenchless drilling, cable fault locating, and jointing by GGCC across India.',
                'short_desc' => 'Preventive maintenance, transformer oil filtration, thermography audits, and 24/7 emergency power restoration.',
                'icon' => '',
                'long_desc' => 'Underground cable systems protect power lines from weather elements and urban congestion. GGCC executes underground cable laying using both open trenching and Horizontal Directional Drilling (HDD) trenchless methods across complex urban and industrial terrains.',
                'scope_of_work' => array(
                    'Route survey, utility mapping, and municipal trenching permission coordination',
                    'Manual & mechanical trench excavation, stone clearing, and sand cushioning',
                    'Cable pulling using motorized winches with tension monitoring rollers',
                    'Protective brick/concrete tile covering and warning tape placement',
                    'Trench backfilling, soil compaction, and surface reinstatement'
                ),
                'applications' => array('City Sub-Transmission Grid Networks', 'Industrial Estate Underground Mains', 'Smart City Power Infrastructure', 'Cross-Highway Cable Crossings', 'River & Railway Track Electrical Crossings'),
                'benefits' => array('Zero cable sheath damage guarantee during winch pulling', 'Heavy mechanical protection against future excavation', 'Clear cable marker installation at 30m intervals', 'Precision cable fault locator support'),
                'faqs' => array(
                    array('q' => 'When is HDD (trenchless drilling) recommended over open trenching?', 'a' => 'HDD is recommended when crossing busy highways, railway tracks, paved roads, or rivers where open excavation is restricted.'),
                    array('q' => 'How deep are underground HT and LT cables laid by GGCC?', 'a' => 'Per IS code standards, LT cables are laid at a minimum depth of 0.75m, while HT cables (11kV/33kV) are laid at 1.0m to 1.2m depth.')
                )
            ),
            'electrical-maintenance-services' => array(
                'slug' => 'electrical-maintenance-services',
                'title' => 'Electrical Maintenance Services',
                'meta_title' => 'On-Call & Breakdown Electrical Maintenance Services | GGCC',
                'meta_description' => 'GGCC delivers responsive electrical maintenance, power fault diagnosis, transformer servicing, thermal audits, and repair services.',
                'short_desc' => 'Comprehensive breakdown repairs, preventive electrical maintenance, diagnostic testing, and system health checks.',
                'icon' => '',
                'long_desc' => 'Unscheduled electrical disruptions can halt plant operations and damage valuable capital assets. GGCC provides reliable, rapid-response electrical maintenance services, combining routine health checks with emergency fault repair capabilities.',
                'scope_of_work' => array(
                    'Emergency electrical fault tracing, cable fault detection, and insulation restoration',
                    'Transformer oil filtration, dehydration, and tap changer servicing',
                    'Switchgear contact cleaning, lubrication, and arc chute inspection',
                    'Earthing resistance re-testing and chemical pit recharge',
                    'Power quality analysis including voltage flicker and harmonic measurement'
                ),
                'applications' => array('Industrial Manufacturing Units', 'Commercial Office Buildings', 'Data Centers & Telecom Towers', 'Shopping Malls & Supermarkets', 'Government Facilities'),
                'benefits' => array('Rapid mobilization of trained electrical breakdown teams', 'Advanced fault location diagnostics', 'Restores power safely while minimizing downtime', 'Detailed failure analysis & preventive reporting'),
                'faqs' => array(
                    array('q' => 'How fast can GGCC respond to an emergency electrical breakdown?', 'a' => 'Our service engineering teams in key locations offer rapid response times tailored to client SLA requirements.'),
                    array('q' => 'Do you provide power quality and harmonic analysis reports?', 'a' => 'Yes, we utilize calibrated power quality analyzers to measure THD (Total Harmonic Distortion) and recommend corrective filter solutions.')
                )
            ),
            'cable-tray-installation' => array(
                'slug' => 'cable-tray-installation',
                'title' => 'Cable Tray Installation Services',
                'meta_title' => 'Industrial Cable Tray Installation Services | GGCC',
                'meta_description' => 'GGCC supplies and installs ladder, perforated, and wire mesh cable trays with hot-dip galvanized finishes for industrial & commercial plants.',
                'short_desc' => 'Perforated, ladder-type, and mesh cable tray installation with custom bends, reducers, and heavy structural supports.',
                'icon' => '',
                'long_desc' => 'Structured cable tray management ensures proper cable support, heat dissipation, ease of inspection, and physical protection. GGCC designs and installs robust cable tray pathways across industrial factories, cable cellars, and commercial risers.',
                'scope_of_work' => array(
                    'Cable routing layout design and load distribution calculation',
                    'Fabrication & erection of MS heavy structural steel support brackets and unistrut channels',
                    'Installation of Hot-Dip Galvanized (HDG) / Powder Coated ladder & perforated cable trays',
                    'Precision fitting of factory-made elbows, tees, cross junctions, and reducers',
                    'Continuous tray earthing bond wire / copper strip installation'
                ),
                'applications' => array('Power Plants & Heavy Industrial Units', 'Substation Cable Vaults & Basements', 'Commercial Riser Shafts', 'Data Center Overhead Cable Runs', 'Chemical & Process Plants'),
                'benefits' => array('High load-bearing structural support stability', 'Corrosion-resistant hot-dip galvanizing per IS 2629', 'Clean separation of power and instrumentation cabling', 'Easy future expansion capability'),
                'faqs' => array(
                    array('q' => 'What types of cable tray finishes does GGCC offer?', 'a' => 'We supply Hot-Dip Galvanized (HDG), Pre-Galvanized, Stainless Steel (SS304/SS316), and Powder Coated cable trays.'),
                    array('q' => 'How do you ensure proper earthing along long cable tray runs?', 'a' => 'We bolt continuous copper or GI earthing strips along the entire length of the cable tray, jumpering across all tray joints.')
                )
            ),
            'apfc-panel-installation' => array(
                'slug' => 'apfc-panel-installation',
                'title' => 'APFC Panel Installation & Power Factor Correction',
                'meta_title' => 'APFC Panel Installation & Power Factor Correction | GGCC',
                'meta_description' => 'GGCC installs Automatic Power Factor Correction (APFC) panels to optimize electrical power factor near unity and eliminate utility penalty charges.',
                'short_desc' => 'Automatic Power Factor Correction panel fabrication, capacitor bank integration, and harmonic filter installation.',
                'icon' => '',
                'long_desc' => 'Low power factor results in heavy financial penalties from electricity distribution companies and higher kVA demand. GGCC designs, installs, and tunes APFC panels equipped with automatic micro-processor controllers, duty capacitors, and detuned reactors to maintain power factor near unity (0.99).',
                'scope_of_work' => array(
                    'Load study and reactive power (kVAR) requirement calculation',
                    'APFC panel positioning, busbar connection, and CT wiring',
                    'Installation of MPP heavy-duty gas-filled capacitors and detuned series reactors',
                    'Microprocessor APFC controller programming (target PF, step delay, switching cycle)',
                    'Harmonic filter integration to prevent resonance in non-linear load networks'
                ),
                'applications' => array('Manufacturing Facilities with Inductive Motor Loads', 'Commercial Complexes & Shopping Centers', 'Extrusion & Injection Molding Plants', 'Textile Mills & Foundries', 'Cold Storage Facilities'),
                'benefits' => array('Maintains power factor at 0.99+, eliminating utility penalty', 'Qualifies facility for power factor incentive discounts', 'Reduces transformer and cable thermal stress', 'Protects capacitor banks with detuned reactors'),
                'faqs' => array(
                    array('q' => 'How quickly does an APFC panel pay for itself?', 'a' => 'Most industrial APFC panels achieve full return on investment (ROI) within 6 to 12 months by eliminating low power factor penalties.'),
                    array('q' => 'Why are detuned reactors required in modern APFC panels?', 'a' => 'Detuned reactors prevent harmonic resonance between capacitors and non-linear loads (VFDs, UPS), protecting capacitors from bursting.')
                )
            ),
            'ups-installation-maintenance' => array(
                'slug' => 'ups-installation-maintenance',
                'title' => 'UPS Installation & Maintenance Services',
                'meta_title' => 'Industrial & Commercial UPS Installation & AMC | GGCC',
                'meta_description' => 'GGCC delivers online industrial UPS system installation, battery bank integration, battery maintenance, and static bypass cabling.',
                'short_desc' => 'Turnkey installation and maintenance for 3-phase industrial UPS systems, battery bank racks, and isolation transformers.',
                'icon' => '',
                'long_desc' => 'Critical data centers, healthcare facilities, and automated process lines require uninterrupted zero-millisecond power transfer. GGCC installs and maintains high-capacity 3-phase Online UPS systems, battery banks, static switches, and isolation transformers.',
                'scope_of_work' => array(
                    'UPS sizing, battery run-time backup calculation, and floor load-bearing verification',
                    'Input, output, and external static bypass cable installation',
                    'Battery bank rack assembly, inter-cell connector torque tightening, and battery isolation switch setup',
                    'K-factor isolation transformer installation for harmonic isolation',
                    'UPS load testing, mains failure simulation, and battery autonomy verification'
                ),
                'applications' => array('Data Centers & IT Server Rooms', 'Hospital Operation Theaters & ICU Equipment', 'Industrial Process Automation Control', 'Financial & Banking Infrastructure', 'Broadcast & Telecom Facilities'),
                'benefits' => array('Zero millisecond transfer time protection for critical loads', 'Properly engineered battery room ventilation and safety', 'Comprehensive UPS testing under actual load', 'Battery impedance testing & replacement services'),
                'faqs' => array(
                    array('q' => 'What UPS capacity range does GGCC install?', 'a' => 'We install standalone and parallel-redundant 3-phase online UPS systems ranging from 10kVA up to 800kVA.'),
                    array('q' => 'What maintenance is required for UPS battery banks?', 'a' => 'Regular testing includes battery cell voltage logging, internal resistance (impedance) measurement, terminal torque checking, and thermal scanning.')
                )
            ),
            'servo-voltage-stabilizer-installation' => array(
                'slug' => 'servo-voltage-stabilizer-installation',
                'title' => 'Servo Voltage Stabilizer Installation',
                'meta_title' => 'Industrial Servo Voltage Stabilizer Installation | GGCC',
                'meta_description' => 'GGCC installs heavy-duty oil-cooled & air-cooled servo voltage stabilizers to protect sensitive machinery from grid voltage fluctuations.',
                'short_desc' => 'Heavy-duty 3-phase Servo Controlled Voltage Stabilizer (SCVS) installation, isolation transformers, and voltage regulation.',
                'icon' => '',
                'long_desc' => 'Grid voltage fluctuations damage sensitive CNC machines, robotics, medical scanners, and industrial drives. GGCC installs heavy-duty 3-phase Servo Controlled Voltage Stabilizers (SCVS) providing tight ±1% output voltage regulation.',
                'scope_of_work' => array(
                    'Site voltage fluctuation survey and kVA capacity calculation',
                    'Oil-cooled / air-cooled servo stabilizer foundation positioning and leveling',
                    'Power cable termination, manual/automatic bypass switch installation',
                    'Digital controller calibration (high/low cut-off, overload trip, single phasing protection)',
                    'Full voltage step variation test and correction speed verification'
                ),
                'applications' => array('Precision CNC Machining Centers & Robotics', 'Medical MRI / CT Scanner Machines', 'Printing & Packaging Presses', 'Textile Spinning & Weaving Machinery', 'Entire Factory Main Incoming Feeder Protection'),
                'benefits' => array('Output voltage accuracy of ±1% under severe input fluctuations', 'Protects costly electronic equipment from burnouts', 'Improves machinery operational lifespan and product finish', 'High efficiency (>98%) design'),
                'faqs' => array(
                    array('q' => 'Should I choose an oil-cooled or air-cooled servo stabilizer?', 'a' => 'Air-cooled stabilizers are ideal for indoor applications up to 100kVA, while oil-cooled stabilizers are recommended for heavy industrial loads above 100kVA and harsh environments.'),
                    array('q' => 'Does a servo stabilizer feature a bypass switch?', 'a' => 'Yes, we install built-in or external manual/automatic bypass switches allowing direct utility power feed during maintenance.')
                )
            )
        );

        // 13 Locations SEO Registry
        $this->locations_data = array(
            'vashi' => array(
                'slug' => 'vashi',
                'city_name' => 'Vashi',
                'state' => 'Maharashtra',
                'meta_title' => 'Electrical Contractor in Vashi, Navi Mumbai | GGCC Services',
                'meta_description' => 'GGCC is a premier licensed electrical contracting company in Vashi, Navi Mumbai. Expert industrial electrical installation, commercial wiring, and panel fabrication.',
                'industrial_highlights' => 'Vashi serves as the commercial hub of Navi Mumbai, featuring major commercial complexes, IT parks, retail centers, and proximity to the Trans-Thane Creek (TTC) Industrial Area.',
                'description' => 'GGCC delivers certified electrical contracting, commercial building wiring, HT/LT cable laying, and panel maintenance across Vashi, Sector 17, APMC market complex, and neighboring industrial corridors.',
                'local_sectors' => array('Commercial Office Complexes', 'TTC Industrial Area Plants', 'IT Parks & Tech Centers', 'Retail Malls & Showrooms', 'Warehousing & Cold Storage Units'),
                'coverage_areas' => array('Vashi Sector 1 to 30', 'Sanpada', 'Turbhe Industrial Belt', 'Kopar Khairane', 'Juinagar'),
                'faqs' => array(
                    array('q' => 'Does GGCC provide emergency electrical repair in Vashi?', 'a' => 'Yes, our main branch is located right next to Vashi in Sanpada, enabling ultra-fast response for emergency electrical breakdown services in Vashi.'),
                    array('q' => 'What services do you offer for TTC Industrial Area units?', 'a' => 'We provide industrial power cabling, HT transformer setup, LT panel installation, flameproof wiring, and annual maintenance contracts (AMC).')
                )
            ),
            'gwalior' => array(
                'slug' => 'gwalior',
                'city_name' => 'Gwalior',
                'state' => 'Madhya Pradesh',
                'meta_title' => 'Electrical Contracting Services in Gwalior | GGCC',
                'meta_description' => 'Leading electrical contracting company in Gwalior, MP. Industrial electrification, cable laying, panel installation, and street lighting by GGCC.',
                'industrial_highlights' => 'Gwalior is a growing industrial and educational center in Madhya Pradesh with key industrial areas like Banmore, Malanpur, and Sithouli.',
                'description' => 'GGCC provides turnkey electrical contracting services for manufacturing facilities, government infrastructure, power distribution networks, and commercial institutions in Gwalior and surrounding industrial zones.',
                'local_sectors' => array('Malanpur Industrial Area', 'Banmore Industrial Cluster', 'Educational Campuses', 'Government Infrastructure', 'Commercial Depots'),
                'coverage_areas' => array('City Center Gwalior', 'Banmore', 'Malanpur', 'Sithouli', 'Lashkar'),
                'faqs' => array(
                    array('q' => 'Do you undertake factory electrification in Malanpur and Banmore?', 'a' => 'Yes, GGCC executes complete industrial electrical installation, busbar trunking, sub-station setup, and earthing grids for plants in Malanpur and Banmore.'),
                    array('q' => 'Can GGCC handle municipal street lighting in Gwalior?', 'a' => 'Yes, we provide octagonal pole erection, underground cabling, and automated timer pillars for municipal roadways and industrial parks.')
                )
            ),
            'madurai' => array(
                'slug' => 'madurai',
                'city_name' => 'Madurai',
                'state' => 'Tamil Nadu',
                'meta_title' => 'Electrical Contracting Company in Madurai | GGCC',
                'meta_description' => 'Top electrical contractor in Madurai, Tamil Nadu. Industrial electrification, HT LT cable laying, transformer setup, and commercial wiring by GGCC.',
                'industrial_highlights' => 'Madurai is a major economic hub in southern Tamil Nadu, renowned for textile manufacturing, granite processing, rubber production, and IT parks.',
                'description' => 'GGCC brings heavy-duty industrial electrical expertise to Madurai, catering to textile mills, processing units, hospitals, and infrastructure development across the region.',
                'local_sectors' => array('Textile & Garment Mills', 'Rubber & Polymer Units', 'Granite Processing Plants', 'Vadapalanji IT Park', 'Hospitals & Medical Centers'),
                'coverage_areas' => array('Kappalur Industrial Estate', 'Nagamalai Pudukottai', 'Mattuthavani', 'Ellis Nagar', 'Thiruparankundram Corridor'),
                'faqs' => array(
                    array('q' => 'What electrical installation services do you provide for Madurai textile mills?', 'a' => 'We install APFC panels to maintain power factor, high-capacity motor control centers (MCC), sub-stations, and flameproof lighting.'),
                    array('q' => 'Are GGCC engineers licensed under TNEB / Tamil Nadu Electrical Licensing Board?', 'a' => 'Yes, our team complies with all Tamil Nadu Electrical Licensing Board (TNELB) regulations for HT and LT installations.')
                )
            ),
            'coimbatore' => array(
                'slug' => 'coimbatore',
                'city_name' => 'Coimbatore',
                'state' => 'Tamil Nadu',
                'meta_title' => 'Electrical Maintenance & Contracting in Coimbatore | GGCC',
                'meta_description' => 'Licensed electrical contractor in Coimbatore. Industrial power installation, HT cable laying, APFC panel setup, and motor control systems.',
                'industrial_highlights' => 'Known as the Manchester of South India, Coimbatore is a powerhouse of engineering, textile machinery, pump manufacturing, and auto components.',
                'description' => 'GGCC delivers precision electrical contracting and preventive maintenance for Coimbatore’s engineering foundries, pump manufacturing plants, textile machinery units, and commercial towers.',
                'local_sectors' => array('Pump & Motor Manufacturing Units', 'Auto Component Foundries', 'Textile Machinery Plants', 'TIDEL Park Coimbatore', 'Commercial & Health Estates'),
                'coverage_areas' => array('Peelamedu Industrial Hub', 'Ganapathy', 'SIDCO Industrial Estate Kurichi', 'Saravanampatti', 'Singanallur'),
                'faqs' => array(
                    array('q' => 'Why is APFC panel installation critical for Coimbatore manufacturing units?', 'a' => 'Coimbatore foundries and pump plants operate heavy motor loads; APFC panels prevent low power factor penalties and optimize kVA demand.'),
                    array('q' => 'Do you install high mast lighting for industrial yards in Coimbatore?', 'a' => 'Yes, we erect 16m to 30m motorized high mast towers for raw material and casting yards across SIDCO and Peelamedu industrial estates.')
                )
            ),
            'tiruchirappalli' => array(
                'slug' => 'tiruchirappalli',
                'city_name' => 'Tiruchirappalli',
                'state' => 'Tamil Nadu',
                'meta_title' => 'Electrical Contractor in Tiruchirappalli (Trichy) | GGCC',
                'meta_description' => 'GGCC provides industrial electrical contracting, heavy fabrication plant electrification, HT cable laying, and panel installation in Trichy.',
                'industrial_highlights' => 'Tiruchirappalli (Trichy) is India’s boiler and heavy engineering capital, housing major energy equipment manufacturing clusters and educational landmarks.',
                'description' => 'GGCC executes industrial plant electrification, high-voltage sub-station setup, cable tray pathways, and sub-distribution for Trichy’s heavy engineering, boiler component, and defense manufacturing ecosystems.',
                'local_sectors' => array('Heavy Engineering & Fabrication Units', 'Boiler Manufacturing Ancillaries', 'Educational Institutions', 'Commercial Centers', 'Transportation Terminals'),
                'coverage_areas' => array('BHEL Ancillary Estate Ranavattam', 'Thuvakudi Industrial Area', 'Thillai Nagar', 'Ariyamangalam', 'Trichy IT Park Corridor'),
                'faqs' => array(
                    array('q' => 'Can GGCC handle high-voltage cable laying and sub-station work in Trichy?', 'a' => 'Yes, we specialize in HT cable laying up to 33kV, transformer installation, VCB commissioning, and grid earthing for Trichy heavy engineering units.'),
                    array('q' => 'Do you offer annual electrical maintenance contracts in Trichy?', 'a' => 'Yes, we provide comprehensive AMC services including transformer oil testing, panel servicing, and thermographic scans.')
                )
            ),
            'bangalore' => array(
                'slug' => 'bangalore',
                'city_name' => 'Bangalore',
                'state' => 'Karnataka',
                'meta_title' => 'Commercial Electrical Installation in Bangalore | GGCC',
                'meta_description' => 'Premier electrical contractor in Bangalore. Turnkey commercial building wiring, IT park electrification, UPS systems, and industrial power solutions.',
                'industrial_highlights' => 'Bangalore (Bengaluru) is the Silicon Valley of India, characterized by massive IT tech parks, aerospace industries, electronics manufacturing, and commercial real estate.',
                'description' => 'GGCC provides modern, high-reliability commercial electrification, UPS power infrastructure, server room distribution, and industrial electrical installations across Bangalore tech hubs and manufacturing corridors.',
                'local_sectors' => array('IT Parks & Global Capability Centers', 'Electronics & Semiconductor Units', 'Aerospace Manufacturing Units', 'Commercial Office Skyscrapers', 'Data Centers'),
                'coverage_areas' => array('Electronic City', 'Whitefield IT Corridor', 'Peenya Industrial Area', 'Outer Ring Road (ORR)', 'Manyata Tech Park Area'),
                'faqs' => array(
                    array('q' => 'What solutions do you offer for Bangalore Data Centers and IT parks?', 'a' => 'We install redundant 3-phase online UPS systems, dual-path LT distribution panels, server room cable trays, and automatic transfer switches (ATS).'),
                    array('q' => 'Do you handle factory electrification in Peenya Industrial Area?', 'a' => 'Yes, we provide heavy power cabling, transformer setup, motor control centers (MCC), and APFC panel installation across Peenya.')
                )
            ),
            'indore' => array(
                'slug' => 'indore',
                'city_name' => 'Indore',
                'state' => 'Madhya Pradesh',
                'meta_title' => 'Electrical Contractor in Indore | GGCC Services',
                'meta_description' => 'Leading electrical contracting company in Indore. Industrial electrical installation, Pithampur plant wiring, cable laying, and panel setup by GGCC.',
                'industrial_highlights' => 'Indore is the commercial capital of Madhya Pradesh, adjacent to the massive Pithampur industrial belt and Sanwer Road industrial estate.',
                'description' => 'GGCC delivers certified electrical contracting, industrial sub-station setup, flameproof wiring, and commercial power distribution for Indore city and Pithampur industrial cluster.',
                'local_sectors' => array('Automotive Manufacturing Plants', 'Pharmaceutical & API Units', 'Textile & Garment Clusters', 'Commercial Centers & Malls', 'Food & Confectionery Plants'),
                'coverage_areas' => array('Pithampur Industrial Sector 1 to 3', 'Sanwer Road Industrial Area', 'Vijay Nagar', 'AB Road Commercial Zone', 'Rau Corridor'),
                'faqs' => array(
                    array('q' => 'Does GGCC undertake pharma-certified flameproof installation in Pithampur?', 'a' => 'Yes, we install CIMFR/PESO-approved flameproof light fittings, junction boxes, and double-compression glanding for Pithampur pharmaceutical plants.'),
                    array('q' => 'Can you install servo voltage stabilizers for Indore auto-ancillary CNC machines?', 'a' => 'Yes, we supply and install 3-phase oil-cooled servo stabilizers to protect precision CNC and robotic units from grid fluctuations.')
                )
            ),
            'tirunelveli' => array(
                'slug' => 'tirunelveli',
                'city_name' => 'Tirunelveli',
                'state' => 'Tamil Nadu',
                'meta_title' => 'Electrical Contracting Services in Tirunelveli | GGCC',
                'meta_description' => 'Professional electrical contractor in Tirunelveli, Tamil Nadu. Industrial electrification, renewable energy power evacuation, and HT LT cabling.',
                'industrial_highlights' => 'Tirunelveli is an emerging economic and industrial hub in southern Tamil Nadu, known for wind energy corridors, solar parks, textile units, and SIPCOT estates.',
                'description' => 'GGCC supports Tirunelveli’s growing industrial base with specialized HT/LT cable laying, renewable power evacuation switchyards, industrial plant electrification, and municipal lighting.',
                'local_sectors' => array('Wind & Solar Power Generation', 'SIPCOT Gangaikondan Industrial Park', 'Textile & Spinning Mills', 'Cement & Mineral Processing', 'Commercial Institutions'),
                'coverage_areas' => array('Gangaikondan SIPCOT', 'Palayamkottai', 'Vannarpettai', 'Nanguneri SEZ Corridor', 'Thachanallur'),
                'faqs' => array(
                    array('q' => 'What electrical services do you offer for solar and wind power developers in Tirunelveli?', 'a' => 'We perform HT underground cable laying, yard transformer installation, ring main unit (RMU) connection, and grid earthing networks.'),
                    array('q' => 'Can GGCC execute electrical contracting for Gangaikondan SIPCOT units?', 'a' => 'Yes, we provide complete factory electrification, LT distribution panels, cable tray pathways, and earthing grids across Gangaikondan SIPCOT.')
                )
            ),
            'mumbai' => array(
                'slug' => 'mumbai',
                'city_name' => 'Mumbai',
                'state' => 'Maharashtra',
                'meta_title' => 'Electrical Contracting Services in Mumbai | GGCC',
                'meta_description' => 'Premier licensed electrical contracting company in Mumbai. Commercial skyscraper wiring, industrial electrification, sub-stations, and HT cable laying.',
                'industrial_highlights' => 'Mumbai is the financial capital of India, featuring high-density commercial skyscrapers, financial centers, ports, data centers, and heavy infrastructure.',
                'description' => 'GGCC provides high-end commercial building electrification, concealed riser wiring, substation installations, high-voltage HT cable trenching, and emergency AMC support across Mumbai MMR.',
                'local_sectors' => array('Financial & Banking Towers', 'Commercial Office Skyscrapers', 'Data Centers & Telecom Exchanges', 'Port & Marine Terminals', 'Hospitals & High-Rise Complexes'),
                'coverage_areas' => array('Bandra-Kurla Complex (BKC)', 'Nariman Point', 'Lower Parel Commercial Belt', 'Andheri East MIDC', 'Kanjurmarg & Powai Corridor'),
                'faqs' => array(
                    array('q' => 'What safety standards are applied for commercial high-rises in Mumbai?', 'a' => 'We strictly adhere to NBC fire safety codes, deploying FRLS/ZHFR cables, fire-rated cable sealing systems, and dedicated emergency panel logic.'),
                    array('q' => 'Do you provide night-time electrical project execution in busy Mumbai business districts?', 'a' => 'Yes, we schedule off-hour and night shifts in financial hubs like BKC and Lower Parel to avoid disruption to daily commercial activities.')
                )
            ),
            'nanded' => array(
                'slug' => 'nanded',
                'city_name' => 'Nanded',
                'state' => 'Maharashtra',
                'meta_title' => 'Electrical Contractor in Nanded, Maharashtra | GGCC',
                'meta_description' => 'Reliable electrical contracting company in Nanded. Industrial plant electrification, agro-processing unit wiring, street lighting, and panel setup.',
                'industrial_highlights' => 'Nanded is a key regional center in Marathwada, renowned for textile processing, agro-based industries, sugar mills, and spiritual tourism infrastructure.',
                'description' => 'GGCC offers dedicated electrical contracting and maintenance for Nanded’s MIDC industrial units, agricultural processing plants, commercial establishments, and public lighting networks.',
                'local_sectors' => array('Agro-Processing & Ginning Mills', 'Sugar Factories & Distillery Units', 'MIDC Nanded Manufacturing Units', 'Commercial & Hospitality Estates', 'Municipal Infrastructure'),
                'coverage_areas' => array('MIDC Krushnoor', 'MIDC VIP Road', 'Vazirabad', 'Taroda Naka', 'CIDCO Nanded'),
                'faqs' => array(
                    array('q' => 'What electrical solutions do you provide for Nanded agro-processing and sugar mills?', 'a' => 'We supply and commission heavy-duty motor control centers (MCC), APFC panels, HT cable laying, and transformer oil maintenance.'),
                    array('q' => 'Do you undertake street lighting projects for Nanded municipal areas?', 'a' => 'Yes, we install octagonal light poles, LED luminaires, underground cabling, and automated timer pillars for city avenues and industrial estates.')
                )
            ),
            'chennai' => array(
                'slug' => 'chennai',
                'city_name' => 'Chennai',
                'state' => 'Tamil Nadu',
                'meta_title' => 'Industrial Electrical Installation in Chennai | GGCC',
                'meta_description' => 'Leading industrial electrical contractor in Chennai. Sub-station setup, auto-plant electrification, HT/LT cable laying, and flameproof wiring by GGCC.',
                'industrial_highlights' => 'Chennai is the Detroit of Asia, home to major automotive assembly plants, electronic hardware manufacturing, seaport hubs, and sprawling IT corridors.',
                'description' => 'GGCC delivers robust industrial electrical installations, high-voltage switchyards, busbar trunking, flameproof wiring, and commercial power distribution across Chennai’s major industrial belts.',
                'local_sectors' => array('Automotive & Auto Ancillary OEM Plants', 'Electronic Hardware SEZs', 'IT Parks along OMR Corridor', 'Port & Logistics Terminals', 'Commercial Real Estate'),
                'coverage_areas' => array('Sriperumbudur Industrial Hub', 'Oragadam Auto Corridor', 'Guindy Industrial Estate', 'Ambattur Industrial Estate', 'Old Mahabalipuram Road (OMR)'),
                'faqs' => array(
                    array('q' => 'What experience does GGCC have in Sriperumbudur and Oragadam auto corridors?', 'a' => 'We execute complete turnkey electrification for automotive assembly lines, robotic welding feeder lines, BBT systems, and main sub-stations in Sriperumbudur and Oragadam.'),
                    array('q' => 'Do you install flameproof electrical fittings for chemical units near Chennai port?', 'a' => 'Yes, we provide PESO-certified explosion-proof installations for solvent storage, chemical processing, and port logistics facilities.')
                )
            ),
            'bhopal' => array(
                'slug' => 'bhopal',
                'city_name' => 'Bhopal',
                'state' => 'Madhya Pradesh',
                'meta_title' => 'Electrical Panel Installation & Contracting in Bhopal | GGCC',
                'meta_description' => 'Licensed electrical contractor in Bhopal, MP. Industrial plant electrification, HT cable laying, electrical panel installation, and municipal lighting.',
                'industrial_highlights' => 'Bhopal is the capital city of Madhya Pradesh and a major electrical engineering manufacturing center, flanked by Mandideep and Govindpura industrial estates.',
                'description' => 'GGCC provides turnkey electrical contracting, sub-station commissioning, cable tray installation, and maintenance for Bhopal’s electrical equipment manufacturing hub and infrastructure projects.',
                'local_sectors' => array('Heavy Electrical Manufacturing Units', 'Mandideep Industrial Estate Plants', 'Govindpura Industrial Area Units', 'Government Administrative Infrastructure', 'Educational Campuses'),
                'coverage_areas' => array('Mandideep Industrial Zone', 'Govindpura', 'MP Nagar Commercial Zone', 'Arera Colony', 'Bairagarh Corridor'),
                'faqs' => array(
                    array('q' => 'Can GGCC execute electrical sub-station work in Mandideep and Govindpura?', 'a' => 'Yes, we install transformers, HT circuit breakers, busbar couplings, and earthing grids for industrial plants in Mandideep and Govindpura.'),
                    array('q' => 'Do you provide underground cable laying services in Bhopal city?', 'a' => 'Yes, we execute underground HT/LT cable laying, trenching, HDD pipe pulling, and heat-shrink jointing for city power lines.')
                )
            ),
            'kochi' => array(
                'slug' => 'kochi',
                'city_name' => 'Kochi',
                'state' => 'Kerala',
                'meta_title' => 'Electrical Panel Installation in Kochi | GGCC Services',
                'meta_description' => 'Top electrical contractor in Kochi, Kerala. Marine & industrial electrification, Infopark IT wiring, underground cable laying, and AMC services by GGCC.',
                'industrial_highlights' => 'Kochi is the commercial and maritime gateway of Kerala, renowned for its international seaport, Cochin Shipyard, chemical complexes, and Infopark IT hub.',
                'description' => 'GGCC delivers specialized electrical contracting, weather-proof IP-66 panel installations, marine & port utility wiring, and commercial IT park electrification across Kochi.',
                'local_sectors' => array('Port & Maritime Terminals', 'Infopark & SmartCity IT Campuses', 'Chemical & Fertilizer Plants', 'Commercial Malls & Hotels', 'Healthcare & Diagnostic Centers'),
                'coverage_areas' => array('Kakkanad IT Zone', 'Eloor - Udyogamandal Industrial Belt', 'Willingdon Island Port Area', 'Kaloor & MG Road Commercial Zone', 'Kalamassery'),
                'faqs' => array(
                    array('q' => 'How does GGCC handle coastal humidity and corrosion protection in Kochi?', 'a' => 'We deploy Hot-Dip Galvanized (HDG) cable trays, IP-65/IP-66 stainless steel panel enclosures, and anti-corrosive earthing materials designed for coastal environments.'),
                    array('q' => 'Do you provide commercial wiring for Infopark Kakkanad office spaces?', 'a' => 'Yes, we install floor distribution boards, UPS power cabling, server room electrical infrastructure, and aesthetic concealed wiring.')
                )
            )
        );
    }

    // Helper view renderer
    private function _render_page($view_name, $data)
    {
        $data['services_menu'] = $this->services_data;
        $data['locations_menu'] = $this->locations_data;
        
        $this->load->view('site/header', $data);
        $this->load->view('site/' . $view_name, $data);
        $this->load->view('site/footer', $data);
    }

    // 1. Home Page
    public function index()
    {
        $data = array(
            'page_title' => 'George General Construction Company (GGCC) | Electrical Contracting & Installation',
            'meta_title' => 'GGCC — Professional Electrical Contracting & Installation Services in India',
            'meta_description' => 'George General Construction Company (GGCC) is a premier licensed electrical contracting company delivering industrial electrification, HT/LT cabling, panel fabrication, and AMC across India.',
            'canonical_url' => base_url(),
            'services' => $this->services_data,
            'locations' => $this->locations_data,
            'current_page' => 'home'
        );
        $this->_render_page('home', $data);
    }

    // 2. About Page
    public function about()
    {
        $data = array(
            'page_title' => 'About Us | George General Construction Company (GGCC)',
            'meta_title' => 'About GGCC — Licensed Electrical Contracting & Infrastructure Company',
            'meta_description' => 'Learn about GGCC expertise in electrical contracting, industrial installation, safety protocols, technical excellence, and multi-location project execution across India.',
            'canonical_url' => base_url('about'),
            'current_page' => 'about'
        );
        $this->_render_page('about', $data);
    }

    // 3. Services Page
    public function services()
    {
        $data = array(
            'page_title' => 'Our Electrical Services | George General Construction Company',
            'meta_title' => 'Electrical Contracting & Installation Services Directory | GGCC',
            'meta_description' => 'Explore GGCC electrical services: Industrial installation, HT/LT cable laying, LT panels, flameproof wiring, AMC, street lighting, APFC panels, and UPS systems.',
            'canonical_url' => base_url('services'),
            'services' => $this->services_data,
            'current_page' => 'services'
        );
        $this->_render_page('services', $data);
    }

    // 4. Service Detail Page (Dynamic)
    public function service_detail($slug = '')
    {
        if (empty($slug) || !isset($this->services_data[$slug])) {
            show_404();
            return;
        }

        $service = $this->services_data[$slug];
        $data = array(
            'page_title' => $service['title'] . ' | GGCC',
            'meta_title' => $service['meta_title'],
            'meta_description' => $service['meta_description'],
            'canonical_url' => base_url('services/' . $slug),
            'service' => $service,
            'services' => $this->services_data,
            'locations' => $this->locations_data,
            'current_page' => 'services'
        );
        $this->_render_page('service_detail', $data);
    }

    // 5. Gallery Page
    public function gallery()
    {
        $data = array(
            'page_title' => 'Gallery & Achievements | George General Construction Company',
            'meta_title' => 'GGCC Work Portfolio & Quality Certifications Gallery',
            'meta_description' => 'Explore GGCC project portfolio highlights, technical recognitions, quality safety standards, and project category showcases.',
            'canonical_url' => base_url('gallery'),
            'current_page' => 'gallery'
        );
        $this->_render_page('gallery', $data);
    }

    // 6. Contact Page
    public function contact()
    {
        $data = array(
            'page_title' => 'Contact Us | George General Construction Company (GGCC)',
            'meta_title' => 'Contact GGCC — Sanpada Navi Mumbai Branch & Business Enquiries',
            'meta_description' => 'Get in touch with George General Construction Company (GGCC) at Sanpada, Navi Mumbai. Phone: 099206 67756, Email: info@ggcc.org.in. Enquire for turnkey electrical projects.',
            'canonical_url' => base_url('contact'),
            'current_page' => 'contact'
        );
        $this->_render_page('contact', $data);
    }

    // 7. Partners & Customers Page
    public function partners_customers()
    {
        $data = array(
            'page_title' => 'Partners & Customers | George General Construction Company',
            'meta_title' => 'GGCC Business Relationships & Industry Partners',
            'meta_description' => 'Learn about GGCC business engagement models, industry relationships, client sector coverage, and strategic service partnerships.',
            'canonical_url' => base_url('partners-customers'),
            'current_page' => 'partners'
        );
        $this->_render_page('partners_customers', $data);
    }

    // 8. Terms & Conditions
    public function terms_and_conditions()
    {
        $data = array(
            'page_title' => 'Terms & Conditions | George General Construction Company',
            'meta_title' => 'GGCC Website Terms & Conditions of Service',
            'meta_description' => 'Read the original terms and conditions governing the use of GGCC corporate website and electrical contracting service information.',
            'canonical_url' => base_url('terms-and-conditions'),
            'current_page' => 'terms'
        );
        $this->_render_page('terms', $data);
    }

    // 9. Privacy Policy
    public function privacy_policy()
    {
        $data = array(
            'page_title' => 'Privacy Policy | George General Construction Company',
            'meta_title' => 'GGCC Website Privacy & Data Protection Policy',
            'meta_description' => 'Read how George General Construction Company collects, protects, and handles contact form information and website usage data.',
            'canonical_url' => base_url('privacy-policy'),
            'current_page' => 'privacy'
        );
        $this->_render_page('privacy', $data);
    }

    // 10. All Locations Directory
    public function locations()
    {
        $data = array(
            'page_title' => 'Service Locations Across India | GGCC Electrical Contractor',
            'meta_title' => 'GGCC Electrical Contracting Service Locations Across India',
            'meta_description' => 'GGCC provides certified electrical contracting services across 13 major hubs: Vashi, Mumbai, Gwalior, Madurai, Coimbatore, Trichy, Bangalore, Indore, Tirunelveli, Nanded, Chennai, Bhopal, and Kochi.',
            'canonical_url' => base_url('locations'),
            'locations' => $this->locations_data,
            'current_page' => 'locations'
        );
        $this->_render_page('locations', $data);
    }

    // 11. Location SEO Detail Page (Dynamic)
    public function location_detail($slug = '')
    {
        if (empty($slug) || !isset($this->locations_data[$slug])) {
            show_404();
            return;
        }

        $location = $this->locations_data[$slug];
        $data = array(
            'page_title' => 'Electrical Contracting Services in ' . $location['city_name'] . ' | GGCC',
            'meta_title' => $location['meta_title'],
            'meta_description' => $location['meta_description'],
            'canonical_url' => base_url('locations/' . $slug),
            'location' => $location,
            'services' => $this->services_data,
            'locations' => $this->locations_data,
            'current_page' => 'locations'
        );
        $this->_render_page('location_detail', $data);
    }
}
