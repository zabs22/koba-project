<?php

/*
|--------------------------------------------------------------------------
| KOBA public website copy (English)
|--------------------------------------------------------------------------
|
| Every visible string on the public site lives here so an Amharic edition
| can be added as lang/am/koba.php with the same keys. Image keys refer to
| config/koba.php.
|
*/

return [

    'meta' => [
        'title' => 'KOBA Patisserie & Bakery | Addis Ababa',
        'description' => 'KOBA Patisserie & Bakery — handcrafted pastries, cakes, bakery creations, breakfast, lunch and refined café experiences in Addis Ababa.',
        'pages' => [
            'our-story' => 'Our Story',
            'menu' => 'Menu',
            'cakes' => 'Cakes',
            'order' => 'Order a Cake',
            'experience' => 'The Experience',
            'locations' => 'Locations',
            'contact' => 'Contact',
        ],
    ],

    'ui' => [
        'skip' => 'Skip to content',
        'menu' => 'Menu',
        'close' => 'Close',
        'required' => ':field is required.',
        'slides' => 'Background photographs',
        'slide' => 'Show photograph :n of :total',
        'pause' => 'Pause slideshow',
        'play' => 'Play slideshow',
        'menu_open' => 'Open menu',
        'menu_close' => 'Close menu',
        'order_cake' => 'Order a Cake',
        'loader' => 'Crafted With Intention.',
        'scroll' => 'Scroll',
        'view' => 'View',
        'explore' => 'Explore',
        'discover' => 'Discover',
        'previous' => 'Previous',
        'next' => 'Next',
        'call' => 'Call',
        'directions' => 'Get Directions',
        'view_location' => 'View Location',
        'back_home' => 'Back to home',
    ],

    'nav' => [
        'home' => 'Home',
        'our-story' => 'Our Story',
        'menu' => 'Menu',
        'cakes' => 'Cakes',
        'experience' => 'Experience',
        'locations' => 'Locations',
        'contact' => 'Contact',
    ],

    'hero' => [
        'eyebrow' => 'KOBA Patisserie & Bakery',
        'lines' => [
            ['text' => 'Freshly Baked.', 'weight' => 'heavy'],
            ['text' => 'Beautifully Crafted.', 'weight' => 'light'],
            ['text' => 'Made With Heart.', 'weight' => 'heavy'],
        ],
        'sub' => 'A modern patisserie rooted in craftsmanship, warmth, and thoughtful café culture.',
        'cta_menu' => 'Explore Our Menu',
        'cta_cake' => 'Order a Cake',
        'caption_no' => 'No. 01',
        'caption' => 'The KOBA croissant — laminated in disciplined layers.',
        'inset_caption' => 'Afternoon pause into ritual.',
    ],

    'intro' => [
        'eyebrow' => 'The KOBA Experience',
        'title' => 'The Sweetest|Place in *Addis.*',
        'body' => 'At KOBA, baking is more than a process. It is a craft shaped by patience, precision, and care. From beautifully finished cakes and delicate pastries to thoughtfully prepared breakfast and lunch, every creation is designed to make an ordinary moment feel remarkable.',
        'rituals' => [
            'A morning croissant becomes a ceremony.',
            'An afternoon espresso becomes a pause.',
            'A slice of cake becomes memory.',
        ],
        'founded' => 'Est. 2020 · Addis Ababa',
    ],

    'philosophy' => [
        'eyebrow' => 'Our Philosophy',
        'title' => 'Made With Passion.|*Crafted With Care.*',
        'hint' => 'Five principles. One standard.',
        'items' => [
            ['name' => 'Craftsmanship', 'line' => 'Every fold, temper, and proof is deliberate. No shortcuts. No compromise.', 'image' => 'craft-lamination'],
            ['name' => 'Refinement', 'line' => 'Luxury lives in restraint. Every flavor, plate, and space has purpose.', 'image' => 'opera-slice'],
            ['name' => 'Excellence', 'line' => 'Texture, structure, taste, and presentation matter.', 'image' => 'glazed-dome'],
            ['name' => 'Consistency', 'line' => 'Every experience should meet the same standard.', 'image' => 'drink-macchiato'],
            ['name' => 'Warmth', 'line' => 'Refinement should never feel cold. Every guest should feel seen and welcomed.', 'image' => 'drink-tea-pour'],
        ],
    ],

    'creations' => [
        'eyebrow' => 'Signature Creations',
        'title' => 'Something Delicious|*for Every Moment.*',
        'cta' => 'View Full Menu',
        'view_all' => 'All :category',
        'categories' => [
            'cakes' => [
                'label' => 'Cakes',
                'line' => 'Layered, glazed, and finished by hand — for celebrations large and quiet.',
                'images' => ['cake-opera-caramel', 'opera-slice'],
                'items' => ['Trio', 'Chocolate Fudge', 'Opera Caramel', 'Vanilla Éclair', 'Cheesecake'],
            ],
            'pastries' => [
                'label' => 'Pastries',
                'line' => 'Laminated in disciplined layers. Crisp outside, tender within.',
                'images' => ['almond-croissant', 'bomboloni'],
                'items' => ['KOBA Croissant', 'Almond Croissant', 'Pecan Tart', 'Éclair', 'White & Dark Chocolate Muffins'],
            ],
            'breakfast' => [
                'label' => 'Breakfast',
                'line' => 'Morning light into ceremony — from Chechebsa to Eggs Benedict.',
                'images' => ['croissant', 'drink-flat-white'],
                'items' => ['Eggs Benedict', 'Chechebsa', 'KOBA Croissant Sandwich', 'Fluffy Pancakes', 'Ful Medames'],
            ],
            'sandwiches' => [
                'label' => 'Sandwiches',
                'line' => 'Fresh, generous, and made with care.',
                'images' => [],
                'items' => ['Mediterranean', 'Caprese', 'Nile Perch', 'Chicken & Avocado', 'Salt Beef'],
            ],
            'salads' => [
                'label' => 'Salads',
                'line' => 'Bright, composed, and generous.',
                'images' => [],
                'items' => ['Summer Salad', 'Cobb Salad', 'Citrus Salad', 'Mediterranean Salad', 'Greek Salad'],
            ],
            'mains' => [
                'label' => 'Main Dishes',
                'line' => 'Stay for lunch. Linger over something warm.',
                'images' => [],
                'items' => ['Honey Garlic Chicken', 'Beef Bourguignon', 'Tagliatelle Meatballs', 'Thai Nile Perch', 'Vegetable Curry'],
            ],
            'drinks' => [
                'label' => 'Coffee & Drinks',
                'line' => 'An afternoon espresso becomes a pause.',
                'images' => ['drink-cappuccino', 'drink-mojito'],
                'items' => ['Espresso & milk coffee', 'Tea', 'Iced coffee', 'Fresh cold drinks'],
            ],
        ],
    ],

    'craft' => [
        'eyebrow' => 'The Craft',
        'title' => 'The Art Is|*in the Details.*',
        'body' => 'Our croissants are laminated in disciplined layers to achieve the perfect balance of crisp exterior and tender crumb.',
        'items' => [
            ['image' => 'craft-lamination', 'title' => 'Lamination', 'line' => 'Layer after layer. Precision in every fold.'],
            ['image' => 'drink-tea-pour', 'title' => 'Pour', 'line' => 'Slow, steady, and deliberate.'],
            ['image' => 'craft-crumb', 'title' => 'Crumb', 'line' => 'Texture tells the story.'],
            ['image' => 'mocha-slice', 'title' => 'Layers', 'line' => 'Assembled with patience, sliced clean.'],
            ['image' => 'craft-glaze', 'title' => 'Glaze', 'line' => 'A final detail. Nothing accidental.'],
            ['image' => 'craft-almond', 'title' => 'Almond', 'line' => 'Toasted flakes, a quiet crunch.'],
            ['image' => 'craft-dusting', 'title' => 'Dusting', 'line' => 'Sugar, light as morning.'],
            ['image' => 'craft-finish', 'title' => 'Finish', 'line' => 'Glossed, set, and left alone.'],
        ],
    ],

    'menu_preview' => [
        'eyebrow' => 'The Menu',
        'title' => 'From Morning|*to Evening.*',
        'body' => 'A curated taste of the KOBA kitchen. Breakfast, lunch, and everything in between — prepared with the same discipline as our pastry.',
        'cta' => 'View Full Menu',
    ],

    'cakes_feature' => [
        'eyebrow' => 'Celebration Cakes',
        'title' => 'Your Cake.|Your Celebration.|*Your KOBA.*',
        'body' => 'Every celebration deserves something made with care. From birthdays and anniversaries to graduations, weddings, corporate occasions, and quiet surprises, KOBA creates cakes designed to make the moment memorable.',
        'cta_explore' => 'Explore Cakes',
        'cta_order' => 'Order Your Cake',
        'drag' => 'Drag or use the arrows',
    ],

    'experience' => [
        'eyebrow' => 'The KOBA Experience',
        'title' => 'More Than|*a Bakery.*',
        'body' => 'KOBA is a place to meet, relax, celebrate, and enjoy. Come for your morning coffee and pastry. Stay for lunch. Meet your friends. Bring your family. Celebrate something special. Or simply give yourself a moment to enjoy something delicious.',
        'cta' => 'Discover the Experience',
    ],

    'manifesto' => [
        'eyebrow' => 'Manifesto',
        'opening' => ['Every Moment Composed.', 'Every Sense Invited.'],
        'fragments' => [
            'The fold of butter into dough.',
            'The shimmer of glaze.',
            'The quiet patience of chocolate.',
            'Every layer of craft, care, and intention.',
            'Morning light into ceremony.',
            'Afternoon pause into ritual.',
            'Evening indulgence into memory.',
        ],
        'closing' => 'We Are KOBA.',
    ],

    'locations' => [
        'eyebrow' => 'Locations',
        'title' => 'Find Your|*KOBA.*',
        'body' => 'Three cafés across Addis Ababa, one standard.',
        'hours_title' => 'Opening Hours',
        'branches' => [
            'sanford' => [
                'name' => 'KOBA Sanford',
                'short' => 'Sanford',
                'tagline' => 'Get Cozy at KOBA Sanford.',
                'mood' => 'Get Cozy',
                'body' => 'A welcoming space for breakfast, coffee, pastries, lunch, and relaxed conversations.',
                'phone' => '+251 941 000 022',
                'image' => 'drink-tea-pour',
                'maps' => 'KOBA Patisserie Sanford Addis Ababa',
            ],
            'bole-atlas' => [
                'name' => 'KOBA Bole Atlas',
                'short' => 'Bole Atlas',
                'tagline' => 'Go Social at KOBA Bole Atlas.',
                'mood' => 'Go Social',
                'body' => 'A place to meet, share, and enjoy the KOBA experience.',
                'phone' => '+251 900 989 898',
                'image' => 'drink-iced-latte-terrace',
                'maps' => 'KOBA Patisserie Bole Atlas Addis Ababa',
            ],
            '4-killo' => [
                'name' => 'KOBA 4 Killo',
                'short' => '4 Killo',
                'tagline' => 'Take a Break at KOBA 4 Killo.',
                'mood' => 'Take a Break',
                'body' => 'Fresh food, pastries, cakes, and drinks in the heart of Addis.',
                'phone' => '+251 900 898 989',
                'image' => 'drink-macchiato',
                'maps' => 'KOBA Patisserie 4 Killo Addis Ababa',
            ],
        ],
        'hours' => [
            ['where' => 'Sanford & 4 Killo', 'days' => 'Monday – Friday', 'time' => '7:00 AM – 9:00 PM'],
            ['where' => 'Bole Atlas', 'days' => 'Monday – Friday', 'time' => '7:00 AM – 10:00 PM'],
            ['where' => 'All branches', 'days' => 'Saturday & Sunday', 'time' => '6:00 AM – 11:00 PM'],
        ],
        'map_show' => 'Show map',
        'map_note' => 'Map loads from Google Maps.',
    ],

    'voices' => [
        'eyebrow' => 'Customer Voices',
        'title' => 'Heard at|*KOBA.*',
        'quotes' => [
            'KOBA croissant, excellent.',
            'I love the white and dark chocolate muffins.',
            'Vegetable focaccia is my favorite.',
            'Amazing ambiance — the best café setting in Addis.',
            'So gorgeous and calming. It makes me want to stay.',
        ],
    ],

    'cta' => [
        'title' => 'Make Today|*a KOBA Day.*',
        'body' => 'Good food tastes even better when it is shared. Bring your friends. Bring your family. Celebrate something special. Or simply treat yourself.',
        'order' => 'Order a Cake',
        'menu' => 'View the Menu',
        'find' => 'Find a KOBA',
    ],

    'footer' => [
        'tagline' => 'Patisserie, bakery & café culture, crafted with intention in Addis Ababa.',
        'explore' => 'Explore',
        'visit' => 'Visit',
        'contact' => 'Contact',
        'follow' => 'Follow',
        'email' => 'hello@kobapatisserie.com',
        'social' => ['Instagram', 'Facebook', 'TikTok'],
        'rights' => '© 2026 KOBA Patisserie & Bakery. All rights reserved.',
        'signoff' => 'Craft. Refinement. Warmth. Precision. Intention.',
    ],

    /*
    |----------------------------------------------------------------------
    | Inner pages
    |----------------------------------------------------------------------
    */

    'story' => [
        'eyebrow' => 'Our Story',
        'title' => 'Rooted in Addis.|*Shaped by craft.*',
        'lede' => 'Founded in 2020 in Addis Ababa, Ethiopia, KOBA Patisserie and Bakery was created to elevate the city’s bakery and café culture.',
        'chapters' => [
            [
                'no' => '2020',
                'title' => 'A beginning in Addis Ababa.',
                'body' => 'As a modern, high-end patisserie, KOBA blends traditional techniques with contemporary craftsmanship to produce handcrafted breads, pastries, and cakes defined by precision and refinement.',
                'image' => 'croissant',
            ],
            [
                'no' => 'Craft',
                'title' => 'Everything from scratch.',
                'body' => 'Driven by passionate baking and uncompromising quality, every creation is made from scratch using carefully sourced ingredients. Lamination exact, glaze flawless, crumb tender, flavors balanced, and presentation immaculate.',
                'image' => 'craft-crumb',
            ],
            [
                'no' => 'Today',
                'title' => 'A destination, three times over.',
                'body' => 'More than a bakery, KOBA has become a destination where taste, design, and experience come together to set a new standard — in Sanford, Bole Atlas, and 4 Killo.',
                'image' => 'drink-iced-latte',
            ],
        ],
        'leaf_eyebrow' => 'ኮባ — The name',
        'leaf_title' => 'Inspired by|*the koba plant.*',
        'leaf_body' => [
            'The KOBA logo is inspired by the Ensete ventricosum plant, locally known as koba. Its design draws from the plant’s natural patterns, overlaid with the Ethiopian letters ኮባ, forming a continuous, harmonious cycle.',
            'This connection to the plant reflects growth, resilience, and rooted tradition. Just as the plant thrives with patience and attention, KOBA nurtures flavors, textures, and experiences that honor heritage while inviting innovation.',
        ],
        'purpose_eyebrow' => 'Purpose',
        'purpose' => 'KOBA exists to turn everyday moments into meaningful rituals. Through beautifully crafted pastries and thoughtfully curated café experiences, we blend precision with warmth, discipline with generosity, and structure with softness.',
        'mission_eyebrow' => 'Mission',
        'mission' => 'To transform everyday moments into ritual, through beautifully crafted pastries, thoughtfully prepared food, and curated café experiences.',
        'vision_eyebrow' => 'Vision',
        'vision' => 'To be Ethiopia’s benchmark for refined patisserie and composed café culture where craftsmanship, elegance, and hospitality set the standard.',
        'values_eyebrow' => 'What we hold to',
        'values_title' => 'What We|*Hold To.*',
        'values' => [
            ['name' => 'Discipline in Craft', 'body' => 'We obsess over the details that matter — the layers of a croissant, the sheen of a glaze, the balance of flavors. Precision isn’t optional; it’s the foundation of every creation.'],
            ['name' => 'Intentional Luxury', 'body' => 'Everything we do is deliberate. No unnecessary decoration, no shortcuts, no filler. Luxury is in restraint, thought, and purpose.'],
            ['name' => 'Warmth Without Compromise', 'body' => 'Refinement doesn’t mean coldness. Every guest is welcomed, every service is thoughtful, and every interaction is human. Elegance and empathy go hand in hand.'],
            ['name' => 'Relentless Improvement', 'body' => 'We never settle. Every pastry, every sip, every service is an opportunity to get better, to refine, to surprise.'],
            ['name' => 'Honest Indulgence', 'body' => 'Our desserts are rich, flavorful, and memorable — never gimmicky, never excessive.'],
        ],
        'creator_eyebrow' => 'The Creator',
        'creator' => 'KOBA crafts with imagination grounded in discipline. Every flavor is composed, every texture layered, every presentation intentional. Beauty is not decoration, it is discipline made visible — an art form you can taste and experience.',
    ],

    'menu_page' => [
        'eyebrow' => 'The Menu',
        'title' => 'Something for|*Every Moment.*',
        'lede' => 'Breakfast, lunch, pastries, and cakes — prepared in our kitchens across Addis Ababa.',
        'search' => 'Search the menu',
        'search_placeholder' => 'Try “croissant” or “salad”',
        'empty' => 'Nothing matches that yet. Try another word.',
        'results' => ':count matching dishes',
        'count' => ':count dish|:count dishes',
        'sections' => [
            'breakfast' => [
                'label' => 'Breakfast',
                'line' => 'Morning light into ceremony.',
                'image' => 'croissant',
                'items' => ['Eggs Benedict', 'Omelettes', 'French Toast', 'Fluffy Pancakes', 'Chechebsa', 'KOBA Croissant Sandwich', 'Waffles', 'Ful Medames'],
            ],
            'sandwiches' => [
                'label' => 'Sandwiches',
                'line' => 'Fresh, generous, made with care.',
                'image' => null,
                'items' => ['Mediterranean', 'Caprese', 'Cheese Melt', 'Nile Perch', 'Tuna', 'Chicken & Avocado', 'Salt Beef'],
            ],
            'salads' => [
                'label' => 'Salads',
                'line' => 'Bright, composed, generous.',
                'image' => null,
                'items' => ['Summer Salad', 'Cobb Salad', 'Citrus Salad', 'Mediterranean Salad', 'Tuna Salad', 'Greek Salad'],
            ],
            'mains' => [
                'label' => 'Main Dishes',
                'line' => 'Stay for lunch.',
                'image' => null,
                'items' => ['Honey Garlic Chicken', 'Kung Pao Chicken', 'Beef Bourguignon', 'Tagliatelle Meatballs', 'Beef Lasagna', 'Eggplant Lasagna', 'Thai Nile Perch', 'Fish Cakes', 'Vegetable Curry', 'Chicken Nuggets'],
            ],
            'pastries' => [
                'label' => 'Pastries',
                'line' => 'Laminated in disciplined layers.',
                'image' => 'almond-croissant',
                'items' => ['KOBA Croissant', 'Almond Croissant', 'Pecan Tart', 'Éclair', 'White & Dark Chocolate Muffins', 'Vegetable Focaccia'],
            ],
            'cakes' => [
                'label' => 'Cakes',
                'line' => 'For celebrations large and quiet.',
                'image' => 'cake-opera-caramel',
                'items' => ['Trio', 'Chocolate Fudge', 'Opera Caramel', 'Vanilla Éclair', 'Cheesecake'],
            ],
        ],
        'drinks_eyebrow' => 'From the bar',
        'drinks_title' => 'Coffee, Tea|*& Cold Drinks.*',
        'drinks_line' => 'Poured slowly, served with care.',
        'drinks' => [
            ['image' => 'drink-macchiato', 'label' => 'Layered espresso'],
            ['image' => 'drink-cappuccino', 'label' => 'Milk coffee'],
            ['image' => 'drink-tea-pour', 'label' => 'Tea, poured to order'],
            ['image' => 'drink-iced-latte', 'label' => 'Iced coffee'],
            ['image' => 'drink-chocolate-pour', 'label' => 'Hot chocolate'],
            ['image' => 'drink-affogato', 'label' => 'Affogato'],
            ['image' => 'drink-mojito', 'label' => 'Lime & mint cooler'],
            ['image' => 'drink-green-mint', 'label' => 'Green mint'],
            ['image' => 'drink-layered', 'label' => 'Layered fresh juice'],
            ['image' => 'drink-strawberry-mojito', 'label' => 'Strawberry cooler'],
        ],
        'cake_cta_title' => 'Planning a celebration?',
        'cake_cta' => 'Order a Cake',
    ],

    'cakes_page' => [
        'eyebrow' => 'Cakes',
        'title' => 'Your Cake.|Your Celebration.|*Your KOBA.*',
        'lede' => 'Every celebration deserves something made with care. From birthdays and anniversaries to graduations, weddings, corporate occasions, and quiet surprises, KOBA creates cakes designed to make the moment memorable.',
        'featured_eyebrow' => 'Featured cakes',
        'featured_title' => 'The Signature|*Five.*',
        'order_this' => 'Order this cake',
        'close' => 'Close',
        'occasions_eyebrow' => 'For every occasion',
        'occasions' => ['Birthdays', 'Anniversaries', 'Graduations', 'Weddings', 'Corporate occasions', 'Quiet surprises'],
        'gallery_eyebrow' => 'From the cake counter',
        'gallery_title' => 'Finished|*by Hand.*',
        'slices_eyebrow' => 'By the slice',
        'slices_title' => 'A Slice Becomes|*Memory.*',
        'steps_eyebrow' => 'How ordering works',
        'steps' => [
            ['title' => 'Choose', 'body' => 'Pick a signature cake or tell us what you have in mind.'],
            ['title' => 'Share the details', 'body' => 'Size, date, and any message or request.'],
            ['title' => 'We confirm', 'body' => 'Our team calls you to confirm every detail.'],
        ],
        'cta_title' => 'Ready when you are.',
        'cta' => 'Order Your Cake',
    ],

    /*
    | Featured cake catalogue. "image" keys map to config/koba.php.
    | Confirm each photo ↔ name pairing with the KOBA team.
    */
    'cakes' => [
        'trio' => ['name' => 'Trio', 'line' => 'Composed in layers, finished by hand.', 'image' => 'cake-trio'],
        'chocolate-fudge' => ['name' => 'Chocolate Fudge', 'line' => 'Deep, glossy, and generous.', 'image' => 'cake-chocolate-fudge'],
        'opera-caramel' => ['name' => 'Opera Caramel', 'line' => 'Fine layers, finished in caramel.', 'image' => 'cake-opera-caramel'],
        'vanilla-eclair' => ['name' => 'Vanilla Éclair', 'line' => 'Soft vanilla, quietly elegant.', 'image' => 'cake-vanilla'],
        'cheesecake' => ['name' => 'Cheesecake', 'line' => 'Creamy, bright, and balanced.', 'image' => 'cake-cheesecake'],
    ],

    'gallery_cakes' => [
        ['image' => 'cake-opera-chocolate', 'alt' => 'Chocolate opera cake with a piped treble clef'],
        ['image' => 'cake-meringue', 'alt' => 'Layered cake crowned with piped meringue'],
        ['image' => 'cake-red-velvet', 'alt' => 'Red-topped layered cake, sliced'],
        ['image' => 'cake-chocolate-mousse', 'alt' => 'Chocolate mousse cake with cream pearls'],
        ['image' => 'cake-basque', 'alt' => 'Caramelised baked cheesecake'],
        ['image' => 'cake-opera-cocoa', 'alt' => 'Layered chocolate cake dusted with cocoa'],
    ],

    'slices' => [
        ['image' => 'opera-slice', 'alt' => 'Opera slice with a chocolate plaque'],
        ['image' => 'glazed-dome', 'alt' => 'Mirror-glazed dome on a crumble base'],
        ['image' => 'mocha-slice', 'alt' => 'Layered mocha slice'],
        ['image' => 'eclair', 'alt' => 'Glazed éclair with coffee beans'],
        ['image' => 'pecan-tart', 'alt' => 'Slice of pecan tart'],
    ],

    'order' => [
        'eyebrow' => 'Order a Cake',
        'title' => 'Let’s Make It|*Memorable.*',
        'lede' => 'Four short steps. Our team will call you to confirm every detail.',
        'steps' => ['Your Details', 'Your Cake', 'Your Date', 'Your Request'],
        'review' => 'Review Your Order',
        'fields' => [
            'name' => 'Your name',
            'phone' => 'Phone number',
            'phone_hint' => 'We call to confirm — e.g. +251 9XX XXX XXX',
            'cake' => 'Cake',
            'custom' => 'Something else — I’ll describe it',
            'size' => 'Size',
            'branch' => 'Preferred branch for pickup',
            'date' => 'Preferred date',
            'date_hint' => 'Choose a date from tomorrow onwards.',
            'notes' => 'Special instructions',
            'notes_hint' => 'Message on the cake, flavour notes, allergies, or design ideas.',
        ],
        'sizes' => [
            'small' => 'Small',
            'medium' => 'Medium',
            'large' => 'Large',
            'advise' => 'Not sure — please advise',
        ],
        'back' => 'Back',
        'continue' => 'Continue',
        'edit' => 'Edit',
        'submit' => 'Order My Cake',
        'sending' => 'Sending…',
        'success_title' => 'Thank you.',
        'success_body' => 'Your request has reached us. Our team will call you shortly to confirm the details.',
        'success_again' => 'Order another cake',
        'error' => 'Something went wrong. Please try again or call us directly.',
        'step_of' => 'Step :current of :total',
        'aside_title' => 'Prefer to talk?',
        'aside_body' => 'Call any KOBA branch and our team will take your order.',
    ],

    'experience_page' => [
        'eyebrow' => 'The Experience',
        'title' => 'More Than|*a Bakery.*',
        'lede' => 'KOBA is a place to meet, relax, celebrate, and enjoy. A space that holds you — where a barista remembers, and every detail is composed.',
        'day_eyebrow' => 'A day at KOBA',
        'day' => [
            ['time' => 'Morning', 'title' => 'Morning light into ceremony.', 'body' => 'Come for your morning coffee and pastry. The crack of a croissant, the aroma of morning drifting through the café.', 'images' => ['croissant', 'drink-flat-white']],
            ['time' => 'Afternoon', 'title' => 'Afternoon pause into ritual.', 'body' => 'Stay for lunch. Meet your friends. Let an espresso become a pause, or a pot of tea become a conversation.', 'images' => ['drink-tea-pour', 'drink-iced-mocha']],
            ['time' => 'Evening', 'title' => 'Evening indulgence into memory.', 'body' => 'Bring your family. Celebrate something special. Or simply give yourself a moment to enjoy something delicious.', 'images' => ['glazed-dome', 'drink-chocolate-pour']],
        ],
        'atmosphere_eyebrow' => 'Atmosphere',
        'atmosphere_title' => 'Warm wood.|Green leaves.|*Quiet light.*',
        'atmosphere_body' => 'Every KOBA is composed with the same calm presence — natural textures, generous light, and room to stay a while.',
        'hospitality_eyebrow' => 'Hospitality',
        'hospitality' => 'Warmth is essential: a barista who remembers, a space that holds you, humanity folded into refinement.',
        'craft_eyebrow' => 'Behind the counter',
        'craft_title' => 'Slow,|*thoughtful baking.*',
        'craft_body' => 'We honor the art of slow, thoughtful baking — never rushed, never forced. Each product is given the time and care it deserves, creating moments that comfort, restore, and quiet the mind.',
    ],

    'locations_page' => [
        'eyebrow' => 'Locations',
        'title' => 'Find Your|*KOBA.*',
        'lede' => 'Three cafés across Addis Ababa. One standard of craft and warmth.',
    ],

    'contact' => [
        'eyebrow' => 'Contact',
        'title' => 'Let’s|*Talk.*',
        'lede' => 'Questions, events, corporate orders, or a kind word — we would love to hear from you.',
        'by_phone' => 'By phone',
        'by_email' => 'By email',
        'form_title' => 'Send us a note',
        'fields' => [
            'name' => 'Your name',
            'email' => 'Email',
            'phone' => 'Phone (optional)',
            'topic' => 'Topic',
            'branch' => 'Branch (optional)',
            'message' => 'Message',
        ],
        'topics' => [
            'general' => 'General question',
            'cakes' => 'Cakes & celebrations',
            'events' => 'Events & corporate',
            'feedback' => 'Feedback',
        ],
        'any_branch' => 'Any branch',
        'submit' => 'Send Message',
        'sending' => 'Sending…',
        'success_title' => 'Thank you.',
        'success_body' => 'Your message has reached us. We will reply soon.',
        'error' => 'Something went wrong. Please try again or email us directly.',
        'cake_hint' => 'Ordering a cake?',
        'cake_hint_cta' => 'Use the cake order form',
    ],
];
