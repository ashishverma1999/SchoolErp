<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $pageDescription ?? 'Excel Public School — A premier institution delivering excellence in education from Pre-Nursery to Class XII.' }}">
    <meta name="keywords" content="Excel Public School, EPS, Best School, English Medium School, Admissions 2026-27, School ERP">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- OpenGraph / Social Meta -->
    <meta property="og:title" content="{{ $pageTitle ?? 'Excel Public School | Excellence in Education' }}">
    <meta property="og:description" content="{{ $pageDescription ?? 'Nurturing future leaders with knowledge, values, and holistic excellence.' }}">
    <meta property="og:image" content="{{ asset('images/hero_bg.jpg') }}">
    <meta property="og:type" content="website">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}">

    <title>{{ $pageTitle ?? ($school['name'] ?? config('app.name')) }}</title>

    <!-- Google Fonts — Inter + Playfair Display + Space Grotesk -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Playfair+Display:ital,wght@0,700;0,800;0,900;1,700&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Google Translate Container -->
    <div id="google_translate_element" style="display:none;"></div>
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en',
                includedLanguages: 'en,hi',
                autoDisplay: false
            }, 'google_translate_element');
        }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</head>
<body class="bg-[#f8f7ff] font-sans text-slate-900 antialiased">
    @yield('content')
</body>
</html>
