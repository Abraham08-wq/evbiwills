<?php
// ============================================================
//  EvBwills — edit this file to update your website.
//  Change your phone, add items, or change prices here.
// ============================================================

$business = [
    'name'      => 'EvBwills',
    'monogram'  => 'EB',
    'tagline'   => 'Clothes, shoes, home fabrics, beauty and branding, delivered to your door.',
    'phone'     => '0725 454 020',      // shown on the website
    'whatsapp'  => '254725454020',      // same number in international format, no + or spaces
    'base'      => 'Utawala, Nairobi',
];

// Each category has an icon key and a list of items. Add a 'price' like
// 'KSh 1,500' to any item, or leave it empty and customers will ask for the price.
$categories = [
    [
        'id'    => 'clothes',
        'image' => 'images/wide-leg-jeans.jpg',
        'name'  => 'Clothes',
        'icon'  => 'shirt',
        'blurb' => 'Men, women and children. New and quality second-hand pieces.',
        'items' => [
            ['name' => 'Dresses & skirts',     'price' => ''],
            ['name' => 'Shirts & T-shirts',    'price' => ''],
            ['name' => 'Jeans: wide-leg, flared, ripped', 'price' => ''],
            ['name' => 'Denim shorts & jorts', 'price' => ''],
            ['name' => 'Jackets & hoodies',    'price' => ''],
            ['name' => 'Kids wear',            'price' => ''],
        ],
    ],
    [
        'id'    => 'overalls',
        'image' => 'images/branded-overall.jpg',
        'name'  => 'Tailor-made Overalls',
        'icon'  => 'overall',
        'blurb' => 'Sewn to your measurements in the colour you want. For work, school, factories and hospitals. Add your logo or name.',
        'items' => [
            ['name' => 'Work overalls (one-piece)', 'price' => ''],
            ['name' => 'Dust coats',           'price' => ''],
            ['name' => 'Two-piece work suits', 'price' => ''],
            ['name' => 'Bulk orders for teams','price' => ''],
        ],
    ],
    [
        'id'    => 'shoes',
        'image' => 'images/sneakers-teal-red.jpg',
        'name'  => 'Shoes',
        'icon'  => 'shoe',
        'blurb' => 'Sneakers, official shoes, flats and sandals in all sizes.',
        'items' => [
            ['name' => 'Sneakers',             'price' => ''],
            ['name' => 'Official shoes',       'price' => ''],
            ['name' => 'Flat shoes',           'price' => ''],
            ['name' => 'Sandals & slides',     'price' => ''],
        ],
    ],
    [
        'id'    => 'curtains',
        'image' => 'images/curtain-cream-jacquard.jpg',
        'name'  => 'Curtains',
        'icon'  => 'curtain',
        'blurb' => 'Brand new curtains and sheers, not mtumba. For sitting rooms and bedrooms.',
        'items' => [
            ['name' => 'Heavy curtains',       'price' => ''],
            ['name' => 'Sheers',               'price' => ''],
            ['name' => 'Blackout curtains',    'price' => ''],
            ['name' => 'Curtain rods & rings', 'price' => ''],
        ],
    ],
    [
        'id'    => 'sheets',
        'name'  => 'Bed Sheets',
        'icon'  => 'sheet',
        'blurb' => 'Cotton bed sheet sets with pillow cases, 4x6 to 6x6.',
        'items' => [
            ['name' => 'Cotton sheet sets',    'price' => ''],
            ['name' => 'Fitted sheets',        'price' => ''],
            ['name' => 'Pillow cases',         'price' => ''],
        ],
    ],
    [
        'id'    => 'duvets',
        'name'  => 'Duvets',
        'icon'  => 'duvet',
        'blurb' => 'Warm duvets and duvet covers for every bed size.',
        'items' => [
            ['name' => 'Duvets (4x6, 5x6, 6x6)', 'price' => ''],
            ['name' => 'Duvet covers',         'price' => ''],
            ['name' => 'Throw blankets',       'price' => ''],
        ],
    ],
    [
        'id'    => 'beads',
        'image' => 'images/beadwork.jpg',
        'name'  => 'Beads',
        'icon'  => 'beads',
        'blurb' => 'Handmade beadwork in many colours and patterns.',
        'items' => [
            ['name' => 'Waist beads',          'price' => ''],
            ['name' => 'Bracelets',            'price' => ''],
        ],
    ],
    [
        'id'    => 'dreadlocks',
        'name'  => 'Artificial Dreadlocks',
        'icon'  => 'locs',
        'blurb' => 'Synthetic locs in different lengths and colours, ready to install.',
        'items' => [
            ['name' => 'Short locs',           'price' => ''],
            ['name' => 'Long locs',            'price' => ''],
            ['name' => 'Coloured locs',        'price' => ''],
        ],
    ],
    [
        'id'    => 'carpets',
        'name'  => 'Carpets & Rugs',
        'icon'  => 'carpet',
        'image' => 'images/carpet-grey-gold.jpg',
        'blurb' => 'Soft modern carpets for the sitting room and bedroom, plus fluffy bedside mats.',
        'items' => [
            ['name' => 'Sitting room carpets', 'price' => ''],
            ['name' => 'Bedside & fluffy mats','price' => ''],
            ['name' => 'Door mats',            'price' => ''],
        ],
    ],
    [
        'id'    => 'flowers',
        'name'  => 'Flower Bouquets',
        'icon'  => 'flower',
        'image' => 'images/bouquet-luxury-red.jpg',
        'blurb' => 'Fresh rose bouquets for birthdays, anniversaries, apologies and surprises. Delivered with a card.',
        'items' => [
            ['name' => 'Red rose bouquets',    'price' => ''],
            ['name' => 'Mixed colour bouquets','price' => ''],
            ['name' => 'Luxury 50+ rose bouquets', 'price' => ''],
        ],
    ],
];

// Branding section — for SACCOs, chamas, companies, churches, schools and events.
$branding = [
    'title' => 'Branding',
    'blurb' => 'Get your SACCO, chama, company, church or event logo printed on quality merchandise. Send us your logo and quantity and we handle the rest.',
    'items' => [
        'Maasai fleeces', 'Hoodies', 'T-shirts', 'Cups & mugs', 'Bags',
        'Keyholders', 'Tags & lanyards', 'Notebooks', 'Umbrellas', 'Water bottles',
        'Caps', 'Pens',
    ],
    // Examples of branding work
    'photos' => [
        ['image' => 'images/branded-overall.jpg',   'caption' => 'Company overalls with logo'],
        ['image' => 'images/branded-umbrellas.jpg', 'caption' => 'Branded umbrellas'],
        ['image' => 'images/branded-hoodies.jpg',   'caption' => 'Custom printed hoodies'],
    ],
];

// ============================================================
//  LATEST STOCK — real items with photos.
//  To add an item: put the photo in the images folder and add a line here.
//  'cat' must match a category id above. Add a price like 'KSh 1,800'.
// ============================================================
$products = [
    ['code' => 'EB-01', 'name' => 'Patchwork denim shorts',      'cat' => 'clothes',  'image' => 'images/patchwork-denim-shorts.jpg',  'price' => ''],
    ['code' => 'EB-02', 'name' => 'Light wash ripped jeans',     'cat' => 'clothes',  'image' => 'images/light-wash-ripped-jeans.jpg', 'price' => ''],
    ['code' => 'EB-03', 'name' => 'Flared jeans, frayed hem',    'cat' => 'clothes',  'image' => 'images/flared-jeans.jpg',            'price' => ''],
    ['code' => 'EB-04', 'name' => 'Mid wash bootcut jeans',      'cat' => 'clothes',  'image' => 'images/mid-wash-bootcut-jeans.jpg',  'price' => ''],
    ['code' => 'EB-05', 'name' => 'Baggy denim jorts',           'cat' => 'clothes',  'image' => 'images/baggy-denim-jorts.jpg',       'price' => ''],
    ['code' => 'EB-06', 'name' => 'Black ripped wide-leg jeans', 'cat' => 'clothes',  'image' => 'images/black-ripped-jeans.jpg',      'price' => ''],
    ['code' => 'EB-07', 'name' => 'Wide-leg raw hem jeans',      'cat' => 'clothes',  'image' => 'images/wide-leg-jeans.jpg',          'price' => ''],
    ['code' => 'EB-08', 'name' => 'Teal & red low-top sneakers', 'cat' => 'shoes',    'image' => 'images/sneakers-teal-red.jpg',       'price' => ''],
    ['code' => 'EB-09', 'name' => 'Black & red sport sneakers',  'cat' => 'shoes',    'image' => 'images/sneakers-black-red.jpg',      'price' => ''],
    ['code' => 'EB-10', 'name' => 'Cream jacquard curtains',     'cat' => 'curtains', 'image' => 'images/curtain-cream-jacquard.jpg',  'price' => ''],
    ['code' => 'EB-11', 'name' => 'Grey & gold wave carpet',     'cat' => 'carpets',  'image' => 'images/carpet-grey-gold.jpg',        'price' => ''],
    ['code' => 'EB-12', 'name' => 'Blue stripe carpet',          'cat' => 'carpets',  'image' => 'images/carpet-blue-stripe.jpg',      'price' => ''],
    ['code' => 'EB-13', 'name' => 'Beaded bracelets & bands',    'cat' => 'beads',    'image' => 'images/beadwork.jpg',                'price' => ''],
    ['code' => 'EB-14', 'name' => 'Luxury red rose bouquet',     'cat' => 'flowers',  'image' => 'images/bouquet-luxury-red.jpg',      'price' => ''],
    ['code' => 'EB-15', 'name' => '12 red roses bouquet',        'cat' => 'flowers',  'image' => 'images/bouquet-red-roses.jpg',       'price' => ''],
    ['code' => 'EB-16', 'name' => 'Mixed roses bouquet',         'cat' => 'flowers',  'image' => 'images/bouquet-mixed-roses.jpg',     'price' => ''],
];

$icons = [
    'shirt'   => '<path d="M22 8l-10 6 4 9 5-3v26h22V20l5 3 4-9-10-6c-1 4-5 7-10 7s-9-3-10-7z"/>',
    'overall' => '<path d="M22 6v12M42 6v12"/><path d="M18 18h28v12l4 26H36l-4-18-4 18H14l4-26z"/><rect x="26" y="22" width="12" height="8"/>',
    'shoe'    => '<path d="M6 40V26c0-2 2-3 4-2l8 4c4 2 8 1 10-2l3-4c1-1 3-1 4 0 6 6 14 9 22 10 2 0 3 2 3 4v4z"/><path d="M6 44h54"/>',
    'curtain' => '<path d="M6 10h52"/><path d="M10 10c0 14 2 26 8 40h8c-4-14-4-28-2-40"/><path d="M54 10c0 14-2 26-8 40h-8c4-14 4-28 2-40"/>',
    'sheet'   => '<rect x="8" y="22" width="48" height="22" rx="2"/><path d="M8 32h48"/><rect x="12" y="14" width="16" height="8" rx="2"/><rect x="36" y="14" width="16" height="8" rx="2"/><path d="M8 44v6M56 44v6"/>',
    'duvet'   => '<path d="M10 18c8-4 36-4 44 0v28c-8 4-36 4-44 0z"/><path d="M10 28c8 3 36 3 44 0M10 37c8 3 36 3 44 0"/>',
    'beads'   => '<circle cx="32" cy="12" r="4"/><circle cx="46" cy="18" r="4"/><circle cx="52" cy="32" r="4"/><circle cx="46" cy="46" r="4"/><circle cx="32" cy="52" r="4"/><circle cx="18" cy="46" r="4"/><circle cx="12" cy="32" r="4"/><circle cx="18" cy="18" r="4"/>',
    'locs'    => '<path d="M18 26c0-10 6-16 14-16s14 6 14 16"/><path d="M18 26v28M24 22v32M30 20v34M36 20v34M42 22v32M46 26v28"/>',
    'carpet'  => '<rect x="10" y="14" width="44" height="36" rx="2"/><rect x="18" y="22" width="28" height="20"/><path d="M14 50v6M22 50v6M30 50v6M38 50v6M46 50v6M50 50v6"/>',
    'flower'  => '<circle cx="32" cy="22" r="6"/><path d="M32 16c-4-8 4-10 0-12M32 16c4-8-4-10 0-12"/><path d="M26 22c-8-2-8 8 0 6M38 22c8-2 8 8 0 6"/><path d="M32 28v30M32 44c-6-8-14-6-14-6 2 8 14 8 14 8M32 40c6-8 14-6 14-6-2 8-14 8-14 8"/>',
    'brand'   => '<path d="M12 18h30v28a6 6 0 0 1-6 6H18a6 6 0 0 1-6-6z"/><path d="M42 24h4a6 6 0 0 1 0 12h-4"/><path d="M20 30l4 6 8-10"/>',
];

function e($s) { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
