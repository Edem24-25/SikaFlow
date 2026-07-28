@props(['name'])

@php
    // Ensure we handle accents correctly if possible, otherwise fallback to simple lowercase
    $normalizedName = function_exists('mb_strtolower') ? mb_strtolower(trim($name)) : strtolower(trim($name));
    $logoUrl = null;

    // Map common West African and international companies to their domains to fetch their real logos via Google Favicons
    $map = [
        'ecobank' => 'ecobank.com',
        'mtn' => 'mtn.com',
        'moov' => 'moov-africa.bj',
        'celtiis' => 'celtiis.bj',
        'sbee' => 'sbee.bj',
        'soneb' => 'soneb.bj',
        'canal' => 'canalplus.com',
        'netflix' => 'netflix.com',
        'spotify' => 'spotify.com',
        'boa' => 'boanet.com',
        'bank of africa' => 'boanet.com',
        'uba' => 'ubagroup.com',
        'orabank' => 'orabank.net',
        'coris' => 'coris.bank',
        'nsia' => 'groupensia.com',
        'bgfi' => 'bgfi.com',
        'apple' => 'apple.com',
        'amazon' => 'amazon.com',
        'google' => 'google.com',
        'microsoft' => 'microsoft.com',
    ];

    $domain = null;
    foreach ($map as $key => $d) {
        if (str_contains($normalizedName, $key)) {
            $domain = $d;
            break;
        }
    }

    if ($domain) {
        // Google's favicon service is highly reliable and provides high quality (sz=128) real logos
        $logoUrl = 'https://www.google.com/s2/favicons?domain=' . $domain . '&sz=128';
    } else {
        // Fallback to beautiful initials if the company is completely unknown
        $logoUrl = 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&background=random&color=fff&size=128&font-size=0.4';
    }
@endphp

<img src="{{ $logoUrl }}" alt="{{ $name }}" {{ $attributes->merge(['class' => 'object-cover rounded-xl bg-slate-50 border border-slate-100']) }} onerror="this.onerror=null;this.src='https://ui-avatars.com/api/?name={{ urlencode($name) }}&background=random&color=fff&size=128&font-size=0.4';">
