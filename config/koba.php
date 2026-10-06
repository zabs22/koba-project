<?php

/*
|--------------------------------------------------------------------------
| KOBA public website — media & contact registry
|--------------------------------------------------------------------------
|
| Images live in public/images/koba as "<key>-<width>.webp". Each entry is
| [intrinsic width, intrinsic height, available widths, alt text]. The
| intrinsic size gives the browser the aspect ratio up front (no layout
| shift); renditions are generated from the original photography.
|
*/

return [

    'images' => [
        'croissant' => [3799, 5762, [800, 1400, 2200], 'A glossy, freshly baked KOBA croissant on a dark wooden board'],
        'almond-croissant' => [4160, 6240, [480, 960, 1600], 'Almond croissant dusted with icing sugar'],
        'bomboloni' => [3860, 5919, [480, 960, 1600], 'Sugar-dusted doughnut on a dark serving board'],
        'pecan-tart' => [1024, 1536, [480, 960, 1024], 'A slice of glazed pecan tart'],
        'mocha-slice' => [3959, 5697, [480, 960, 1600], 'Layered mocha slice topped with a chocolate shard'],
        'eclair' => [3960, 5940, [480, 960, 1600], 'Glazed éclair finished with coffee beans'],
        'opera-slice' => [3831, 5802, [480, 960, 1600], 'Opera slice with fine layers and a chocolate plaque'],
        'glazed-dome' => [1360, 2048, [480, 960, 1360], 'Mirror-glazed dome entremet on a crumble base'],

        'cake-opera-chocolate' => [3841, 6074, [480, 960, 1600], 'Chocolate opera cake with a piped treble clef'],
        'cake-red-velvet' => [1360, 2048, [480, 960, 1360], 'Red-topped layered cake, sliced into portions'],
        'cake-cheesecake' => [1360, 2048, [480, 960, 1360], 'Cheesecake with a glossy berry top, sliced'],
        'cake-opera-caramel' => [3738, 5963, [480, 960, 1600], 'Square caramel opera cake with piped detailing'],
        'cake-basque' => [3725, 6187, [480, 960, 1600], 'Caramelised baked cheesecake'],
        'cake-vanilla' => [4091, 6189, [480, 960, 1600], 'Layered vanilla cake with a white glaze and chocolate seals'],
        'cake-meringue' => [3980, 6036, [480, 960, 1600], 'Layered cake crowned with piped meringue'],
        'cake-chocolate-mousse' => [1360, 2048, [480, 960, 1360], 'Chocolate mousse cake with cream pearls'],
        'cake-trio' => [1360, 2048, [480, 960, 1360], 'Square chocolate cake with glossy chocolate lines'],
        'cake-chocolate-fudge' => [1360, 2048, [480, 960, 1360], 'Round chocolate cake with a mirror glaze'],
        'cake-opera-cocoa' => [3960, 6074, [480, 960, 1600], 'Layered chocolate cake dusted with cocoa'],

        'drink-layered' => [1600, 2000, [480, 960, 1600], 'Layered fresh juice in a glass mug'],
        'drink-pineapple-mojito' => [1600, 2000, [480, 960, 1600], 'Pineapple and mint cooler'],
        'drink-green-mint' => [1600, 2000, [480, 960, 1600], 'Green mint drink with a sprig of fresh mint'],
        'drink-affogato' => [1600, 2000, [480, 960, 1600], 'Affogato in a glass cup'],
        'drink-red-juice' => [1600, 2000, [480, 960, 1600], 'Deep red fresh juice'],
        'drink-tea-pour' => [1600, 2000, [480, 960, 1600], 'Milk tea being poured from a white teapot into a glass'],
        'drink-macchiato' => [1600, 2000, [480, 960, 1600], 'Layered espresso in a glass cup on a warm wooden table'],
        'drink-iced-americano' => [1600, 2000, [480, 960, 1600], 'Iced coffee on a wooden table beside a velvet cushion'],
        'drink-iced-latte' => [1600, 2000, [480, 960, 1600], 'Iced latte in front of green plants'],
        'drink-cappuccino' => [1600, 2000, [480, 960, 1600], 'Milk coffee with latte art'],
        'drink-mocha' => [1466, 2000, [480, 960, 1466], 'Mocha with chocolate latte art'],
        'drink-iced-latte-terrace' => [1600, 2000, [480, 960, 1600], 'Iced latte on a terrace table surrounded by greenery'],
        'drink-iced-mocha' => [1467, 2000, [480, 960, 1467], 'Iced mocha on a red wooden table among plants'],
        'drink-flat-white' => [1600, 2000, [480, 960, 1600], 'Flat white with a heart in the foam'],
        'drink-layered-terrace' => [1600, 2000, [480, 960, 1600], 'Layered juice on a terrace table'],
        'drink-strawberry-mojito' => [1600, 2000, [480, 960, 1600], 'Strawberry and mint cooler'],
        'drink-mojito' => [1600, 2000, [480, 960, 1600], 'Lime and mint cooler with crushed ice'],
        'drink-chocolate-pour' => [1600, 2000, [480, 960, 1600], 'Hot milk poured over a chocolate sphere'],

        'craft-lamination' => [1520, 1325, [480, 960, 1520], 'Close-up of the laminated layers of a croissant'],
        'craft-glaze' => [626, 532, [480, 626], 'Close-up of a mirror glaze'],
        'craft-crumb' => [2107, 1567, [480, 960, 1600], 'Close-up of the fine layers of an opera slice'],
        'craft-dusting' => [1853, 1361, [480, 960, 1600], 'Close-up of sugar dusting on a doughnut'],
        'craft-finish' => [2218, 1782, [480, 960, 1600], 'Close-up of a glazed éclair'],
        'craft-almond' => [2080, 1685, [480, 960, 1600], 'Close-up of toasted almonds on a croissant'],
    ],

    /*
    | Dish photographs, keyed by Str::slug() of the dish name. Dishes without
    | a real photograph are simply left out — never substitute another dish.
    */
    'dish_images' => [
        'trio' => 'cake-trio',
        'chocolate-fudge' => 'cake-chocolate-fudge',
        'opera-caramel' => 'cake-opera-caramel',
        'vanilla-eclair' => 'cake-vanilla',
        'cheesecake' => 'cake-cheesecake',
        'koba-croissant' => 'croissant',
        'almond-croissant' => 'almond-croissant',
        'pecan-tart' => 'pecan-tart',
        'eclair' => 'eclair',
        'espresso-milk-coffee' => 'drink-macchiato',
        'tea' => 'drink-tea-pour',
        'iced-coffee' => 'drink-iced-latte',
        'fresh-cold-drinks' => 'drink-mojito',
    ],

    'email' => 'hello@kobapatisserie.com',

    // Replace with the official profile URLs.
    'social' => [
        'Instagram' => 'https://www.instagram.com/',
        'Facebook' => 'https://www.facebook.com/',
        'TikTok' => 'https://www.tiktok.com/',
    ],
];
