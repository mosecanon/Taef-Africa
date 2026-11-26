<?php
/**
 * Summit Configuration & Global Metadata
 * The African Executive Feature Summit 2027
 */

return [
    'name' => 'The African Executive Feature Summit 2027',
    'short_name' => 'AEFS 2027',
    'theme' => "Shaping Africa's Future",
    'tagline' => 'A Continent of Possibilities. A Future Worth Shaping.',
    'year' => 2027,
    'dates' => 'March 24 - 26, 2027',
    'date_iso' => '2027-03-24T09:00:00+03:00',
    'venue' => 'JW Marriott Hotel, Nairobi, Kenya',
    'city' => 'Nairobi',
    'country' => 'Kenya',
    'timezone' => 'Africa/Nairobi',
    'coordinates' => [
        'lat' => -1.2676,
        'lng' => 36.8045
    ],

    // Contact Details
    'contact' => [
        'general_email' => 'concierge@africanexecutivesummit.com',
        'partnership_email' => 'partnerships@africanexecutivesummit.com',
        'speaker_email' => 'speakers@africanexecutivesummit.com',
        'phone' => '+254 (0) 20 800 2027',
        'social' => [
            'linkedin' => 'https://linkedin.com/company/african-executive-summit',
            'instagram' => 'https://instagram.com/africanexecutivesummit',
            'facebook' => 'https://facebook.com/africanexecutivesummit',
            'youtube' => 'https://youtube.com/@africanexecutivesummit'
        ]
    ],

    // Navigation Structure
    'navigation' => [
        ['label' => 'Home', 'url' => '/'],
        ['label' => 'About', 'url' => '/about'],
        ['label' => 'Thematic Tracks', 'url' => '/about#tracks'],
        ['label' => 'Speakers', 'url' => '/speakers'],
        ['label' => 'Partnerships', 'url' => '/partnerships'],
        ['label' => 'Register', 'url' => '/register', 'highlight' => true],
        ['label' => 'Contact', 'url' => '/contact']
    ],

    // The 6 Summit Conversation Areas from Document
    'conversation_tracks' => [
        [
            'id' => 'leadership',
            'title' => 'Leadership & The Future of Business',
            'subtitle' => 'Corporate Governance & Sustainable Scale',
            'desc' => 'Exploring the changing face of African leadership, corporate governance, responsible decision-making, and sustainable business growth.',
            'icon' => 'crown',
            'tag' => 'Track 01',
            'stats' => '45+ Board Chairs & CEOs'
        ],
        [
            'id' => 'entrepreneurship',
            'title' => 'Entrepreneurship & Enterprise Development',
            'subtitle' => 'Building & Scaling Pan-African Champions',
            'desc' => 'Examining the realities of building, growing, and scaling businesses within the African business environment, logistics corridors, and supply chains.',
            'icon' => 'trending-up',
            'tag' => 'Track 02',
            'stats' => '$1.2B+ Pipeline Capital'
        ],
        [
            'id' => 'innovation-tech',
            'title' => 'Innovation, Technology & The Digital Economy',
            'subtitle' => 'AI, Sovereign Infrastructure & Fintech Frontier',
            'desc' => 'Understanding how technology, artificial intelligence, and digital transformation are redefining African industries and creating unprecedented market opportunities.',
            'icon' => 'cpu',
            'tag' => 'Track 03',
            'stats' => '30+ Tech Unicorn Founders'
        ],
        [
            'id' => 'investment-trade',
            'title' => 'Investment, Trade & Economic Opportunities',
            'subtitle' => 'AfCFTA, Regional Corridors & Cross-Border Capital',
            'desc' => 'Exploring investment prospects, regional trade under AfCFTA, cross-border business execution, and strategic economic partnerships across 54 markets.',
            'icon' => 'globe',
            'tag' => 'Track 04',
            'stats' => '$3.4T Market Potential'
        ],
        [
            'id' => 'brands-influence',
            'title' => 'Brands, Influence & The Changing Consumer Landscape',
            'subtitle' => 'Cultural Equity & Global Market Resonance',
            'desc' => 'Examining how African brands can build continental relevance, establish enduring trust, and compete aggressively within an evolving global marketplace.',
            'icon' => 'sparkles',
            'tag' => 'Track 05',
            'stats' => '1.4B Consumer Demographic'
        ],
        [
            'id' => 'next-generation',
            'title' => 'The Next Generation of African Leaders',
            'subtitle' => 'Bridging Generational Vision & Sovereign Power',
            'desc' => 'Creating structured opportunities for emerging founders, young executives, and innovative thinkers to contribute directly to conversations about the continent’s future.',
            'icon' => 'compass',
            'tag' => 'Track 06',
            'stats' => 'Top 100 African Innovators'
        ]
    ],

    // The 5 Pillars from "What to Expect"
    'pillars' => [
        [
            'title' => 'Thought Leadership',
            'desc' => 'Insightful keynote addresses and high-stakes conversations with influential industry voices shaping African commerce.',
            'number' => '01'
        ],
        [
            'title' => 'Business Conversations',
            'desc' => 'Discussions exploring leadership, entrepreneurship, innovation, investment, and cross-border economic opportunities.',
            'number' => '02'
        ],
        [
            'title' => 'Strategic Networking',
            'desc' => 'Meaningful, closed-door interactions between founders, corporate executives, institutional brands, and sovereign leaders.',
            'number' => '03'
        ],
        [
            'title' => 'Partnership Opportunities',
            'desc' => 'A curated platform for organisations to establish institutional relationships, explore joint ventures, and sign cross-border MOUs.',
            'number' => '04'
        ],
        [
            'title' => 'Brand Engagement',
            'desc' => 'High-visibility opportunities for participating organisations to showcase expertise, game-changing innovations, and sovereign contributions.',
            'number' => '05'
        ]
    ],

    // Speaker Categories
    'speaker_categories' => [
        'Corporate & Institutional Leaders',
        'Business Founders & Entrepreneurs',
        'Industry Experts & Innovators',
        'Investors & Financial Leaders',
        'Technology & Digital Transformation Leaders',
        'Emerging African Leaders'
    ],

    // Partnership Tiers
    'partnership_tiers' => [
        [
            'name' => 'Presenting & Title Partners',
            'category' => 'Supreme',
            'badge' => 'Exclusive (Limit 2)',
            'desc' => 'The highest echelon of continental leadership positioning, headline branding across all summit touchpoints, and host of the Opening Gala Dinner.',
            'benefits' => [
                'Exclusive Title Branding ("Presented by...")',
                'Keynote Address on Main Plenary Stage',
                'Host of Private Presidential & VIP Lounge',
                '15 VIP Executive All-Access Delegate Passes',
                'Dedicated 60-Minute Closed-Door Deal Roundtable',
                'Full Page Feature in Executive Summit Book'
            ]
        ],
        [
            'name' => 'Platinum & Gold Sponsors',
            'category' => 'Strategic',
            'badge' => 'High Prestige',
            'desc' => 'Prominent thought leadership integration, panel curation, and premier executive networking suites.',
            'benefits' => [
                'Plenary Panelist / Moderator Placement',
                'Curated Private Breakfast / Luncheon Roundtable',
                '8 VIP Executive All-Access Passes',
                'Executive Brand Activation Suite at JW Marriott',
                'Prominent Logo Placement on Stage & Digital Broadcast',
                'Direct Access to Pre-Summit Attendee Matchmaking'
            ]
        ],
        [
            'name' => 'Strategic Corporate & Sector Partners',
            'category' => 'Domain Leader',
            'badge' => 'Sector Focus',
            'desc' => 'Sector-specific leadership across Banking, Energy, Mining, Telecoms, Aviation, or Agriculture.',
            'benefits' => [
                'Thematic Track Lead Partner',
                '5 Executive Delegate Passes',
                'Co-Curated Breakout Workshop',
                'Brand Recognition Across All Marketing Channels',
                'Targeted Introductions to Relevant Sovereign Stakeholders'
            ]
        ],
        [
            'name' => 'Knowledge & Institutional Partners',
            'category' => 'Policy & Research',
            'badge' => 'DFI & Think Tanks',
            'desc' => 'For multilateral institutions, development banks, and research bodies contributing policy insights and white papers.',
            'benefits' => [
                'Policy Whitepaper Co-Publication',
                'Stage Presentation of Economic Insights',
                '4 Institutional Passes',
                'Executive Working Group Facilitation'
            ]
        ],
        [
            'name' => 'Technology & Innovation Partners',
            'category' => 'Digital Frontier',
            'badge' => 'Infrastructure',
            'desc' => 'For cloud, AI, fintech, and telecommunication giants powering the summit’s next-gen digital infrastructure.',
            'benefits' => [
                'Official Tech & Digital Infrastructure Partner',
                'Live Innovation Showcase Stage',
                '4 Executive Passes',
                'Direct Pitch to 100+ Enterprise CTOs & CIOs'
            ]
        ]
    ]
];
