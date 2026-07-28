@props(['title'])

@php
    $normalizedTitle = function_exists('mb_strtolower') ? mb_strtolower(trim($title)) : strtolower(trim($title));
    $imageUrl = null;

    // High quality, thematic images inspired by the subscription title
    $map = [
        'internet' => 'https://images.unsplash.com/photo-1544197150-b99a580bb7a8?w=400&q=80', // Router/Wifi
        'wifi' => 'https://images.unsplash.com/photo-1544197150-b99a580bb7a8?w=400&q=80',
        'fibre' => 'https://images.unsplash.com/photo-1544197150-b99a580bb7a8?w=400&q=80',
        'netflix' => 'https://images.unsplash.com/photo-1522869635100-9f4c5e86aa37?w=400&q=80', // Cinema/TV screen
        'canal' => 'https://images.unsplash.com/photo-1593784991095-a205069470b6?w=400&q=80', // TV Remote / Screen
        'sbee' => 'https://images.unsplash.com/photo-1473341304170-971dccb5ac1e?w=400&q=80', // Electricity/Lightbulb
        'electricite' => 'https://images.unsplash.com/photo-1473341304170-971dccb5ac1e?w=400&q=80',
        'courant' => 'https://images.unsplash.com/photo-1473341304170-971dccb5ac1e?w=400&q=80',
        'eau' => 'https://images.unsplash.com/photo-1527066236129-a86a6e87d4d4?w=400&q=80', // Water drop
        'soneb' => 'https://images.unsplash.com/photo-1527066236129-a86a6e87d4d4?w=400&q=80',
        'gym' => 'https://images.unsplash.com/photo-1534438327276-14e5300c3a48?w=400&q=80', // Gym weights
        'sport' => 'https://images.unsplash.com/photo-1534438327276-14e5300c3a48?w=400&q=80',
        'fitness' => 'https://images.unsplash.com/photo-1534438327276-14e5300c3a48?w=400&q=80',
        'spotify' => 'https://images.unsplash.com/photo-1614680376573-df3480f0c6ff?w=400&q=80', // Music/Headphones
        'musique' => 'https://images.unsplash.com/photo-1614680376573-df3480f0c6ff?w=400&q=80',
        'loyer' => 'https://images.unsplash.com/photo-1560518883-ce09059eeffa?w=400&q=80', // House/Keys
        'maison' => 'https://images.unsplash.com/photo-1560518883-ce09059eeffa?w=400&q=80',
        'assurance' => 'https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=400&q=80', // Documents
        'sante' => 'https://images.unsplash.com/photo-1505751172876-fa1923c5c528?w=400&q=80', // Health
        'ecole' => 'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=400&q=80', // School
        'scolarite' => 'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=400&q=80',
    ];

    foreach ($map as $key => $url) {
        if (str_contains($normalizedTitle, $key)) {
            $imageUrl = $url;
            break;
        }
    }

    if (!$imageUrl) {
        // Fallback: A beautiful random abstract photo seeded by the title (so it remains consistent for the same title)
        $imageUrl = 'https://picsum.photos/seed/' . md5($title) . '/400/400';
    }
@endphp

<img src="{{ $imageUrl }}" alt="{{ $title }}" {{ $attributes->merge(['class' => 'object-cover rounded-xl bg-slate-100 shadow-sm']) }} onerror="this.onerror=null;this.src='https://ui-avatars.com/api/?name={{ urlencode($title) }}&background=random&color=fff&size=400';">
