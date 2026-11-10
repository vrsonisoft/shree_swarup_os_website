<!DOCTYPE html>
<html lang="{{ session('customer_locale') ?? global_setting()->locale }}" dir="{{ session('customer_is_rtl') ? 'rtl' : 'ltr' }}">

<head>
    <link rel="manifest" href="{{ asset('manifest.json') }}" crossorigin="use-credentials">
    <meta name="theme-color" content="#ffffff">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- FAVICONS --}}
    <link rel="apple-touch-icon" sizes="180x180" href="{{ global_setting()->upload_fav_icon_apple_touch_icon_url }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ global_setting()->upload_fav_icon_android_chrome_192_url }}">
    <link rel="icon" type="image/png" sizes="512x512" href="{{ global_setting()->upload_fav_icon_android_chrome_512_url }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ global_setting()->upload_fav_icon_16_url }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ global_setting()->upload_fav_icon_32_url }}">
    <link rel="shortcut icon" href="{{ global_setting()->favicon_url }}">


    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ global_setting()->logoUrl }}">

    @php
        $seoTitle = trim($__env->yieldContent('title', global_setting()->meta_title ?? 'ChowChak - Digital Menu & Restaurant Management Platform'));
        $seoDescription = trim($__env->yieldContent('meta_description', global_setting()->meta_description ?? 'ChowChak is an all-in-one restaurant management system featuring digital QR menus, POS ordering, inventory management, and real-time analytics.'));
        $seoKeywords = trim($__env->yieldContent('meta_keywords', global_setting()->meta_keyword ?? 'restaurant management system, digital menu, QR code menu, restaurant POS, online food ordering, ChowChak'));
        $seoImage = trim($__env->yieldContent('og_image', global_setting()->meta_image_url ?? global_setting()->upload_fav_icon_android_chrome_512_url ?? asset('favicon.png')));
        $seoCanonical = trim($__env->yieldContent('canonical_url', url()->current()));
        $seoRobots = trim($__env->yieldContent('meta_robots', 'index, follow'));
        $seoOgType = trim($__env->yieldContent('og_type', 'website'));
    @endphp

    <title>{{ $seoTitle }}</title>

    {{-- SEO META TAGS --}}
    <meta name="description" content="{{ $seoDescription }}">
    <meta name="keywords" content="{{ $seoKeywords }}">
    <meta name="robots" content="{{ $seoRobots }}">
    <link rel="canonical" href="{{ $seoCanonical }}">

    {{-- OPEN GRAPH (FACEBOOK, LINKEDIN, WHATSAPP) --}}
    <meta property="og:site_name" content="ChowChak">
    <meta property="og:type" content="{{ $seoOgType }}">
    <meta property="og:url" content="{{ $seoCanonical }}">
    <meta property="og:title" content="{{ $seoTitle }}">
    <meta property="og:description" content="{{ $seoDescription }}">
    <meta property="og:image" content="{{ $seoImage }}">
    <meta property="og:image:alt" content="{{ $seoTitle }}">

    {{-- TWITTER CARDS --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ $seoCanonical }}">
    <meta name="twitter:title" content="{{ $seoTitle }}">
    <meta name="twitter:description" content="{{ $seoDescription }}">
    <meta name="twitter:image" content="{{ $seoImage }}">

    {{-- GLOBAL STRUCTURED DATA (JSON-LD) --}}
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@graph": [
        {
          "@type": "Organization",
          "@id": "{{ url('/') }}#organization",
          "name": "ChowChak",
          "url": "{{ url('/') }}",
          "logo": "{{ global_setting()->logo_url ?? global_setting()->upload_fav_icon_android_chrome_512_url }}",
          "description": "ChowChak provides modern restaurant management software, digital QR menus, and POS tools."
        },
        {
          "@type": "WebSite",
          "@id": "{{ url('/') }}#website",
          "url": "{{ url('/') }}",
          "name": "ChowChak",
          "publisher": {
            "@id": "{{ url('/') }}#organization"
          }
        }
      ]
    }
    </script>
    @yield('schema')

    <!-- Google Fonts: Outfit & Montserrat -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">

    <!-- Tailwind CSS & Flowbite CDN -->
    <script>
      (function() {
        const theme = localStorage.getItem('color-theme');
        if (theme === 'dark') {
          document.documentElement.classList.add('dark');
        } else {
          document.documentElement.classList.remove('dark');
        }
        window.tailwind = {
          config: {
            darkMode: 'class'
          }
        };
      })();
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles

    @include('sections.theme_style', [
        'baseColor' => global_setting()->theme_rgb,
        'baseColorHex' => global_setting()->theme_hex,
    ])

    @if (File::exists(public_path() . '/css/app-custom.css'))
    <link href="{{ asset('css/app-custom.css') }}" rel="stylesheet">
    @endif
    <link href="{{ asset('css/footer-dark-fix.css') }}" rel="stylesheet">

    {{-- Include file for widgets if exist --}}
    @includeIf('sections.custom_script_landing')
    <style>
    /* ── GLOBAL FONT: OUTFIT ── */
    html, body, button, input, select, textarea {
      font-family: 'Outfit', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif !important;
    }

    /* ── TOP CONTACT BAR STYLES ── */
    .top-contact-bar {
      background: #f8fafc;
      color: #4b5563;
      padding: 8px 24px;
      font-size: 12px;
      font-family: 'Outfit', sans-serif;
      border-bottom: 1px solid #e5e7eb;
    }
    .top-contact-container {
      max-width: 1180px;
      margin: 0 auto;
      display: flex;
      justify-content: flex-end;
      gap: 24px;
    }
    .top-contact-container a {
      color: #4b5563 !important;
      text-decoration: none;
      font-weight: 500;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      transition: color 0.2s ease;
    }
    .top-contact-container a:hover {
      color: #2E6F40 !important;
    }
    @media (max-width: 768px) {
      .top-contact-bar {
        display: none !important;
      }
    }

    /* Dark Mode overrides */
    html.dark .top-contact-bar {
      background: #0b0f19;
      border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    }
    html.dark .top-contact-container a {
      color: #e5e7eb !important;
    }
    html.dark .top-contact-container a:hover {
      color: #2E6F40 !important;
    }

    /* ── HEADER NAVIGATION LINK STYLES ── */
    header.lg\:hidden nav, .mobile-header-nav {
      background-color: #ffffff !important;
      border-bottom: 1px solid #e5e7eb !important;
    }
    html.dark header.lg\:hidden nav, html.dark .mobile-header-nav {
      background-color: #111827 !important;
      border-bottom: 1px solid rgba(255, 255, 255, 0.08) !important;
    }
    #mobile-menu-2 {
      background-color: #ffffff !important;
      border: 1px solid #e5e7eb !important;
    }
    html.dark #mobile-menu-2 {
      background-color: #111827 !important;
      border: 1px solid rgba(255, 255, 255, 0.08) !important;
    }

    .menutiger-nav a, #mobile-menu-2 a {
      color: #374151 !important; /* Dark grey for high contrast in light mode */
      font-weight: 500 !important;
      transition: all 0.2s ease !important;
    }
    html.dark .menutiger-nav a, html.dark #mobile-menu-2 a {
      color: #e5e7eb !important; /* Light grey for dark mode */
    }
    .menutiger-nav a:hover, #mobile-menu-2 a:hover {
      color: #2E6F40 !important;
    }
    .menutiger-nav a.active-nav-link, #mobile-menu-2 a.active-nav-link {
      color: #2E6F40 !important;
      font-weight: 700 !important;
    }

    /* ═══════════════════════════════════════════
       GLOBAL PREMIUM FOOTER CSS
       (Applies to all pages using layouts.landing)
    ═══════════════════════════════════════════ */
    :root {
      --forest-primary: #2E6F40;
  --forest-mint: #CFFFDC;
  --forest-accent: #68BA7F;
  --forest-dark: #253D2C;
  --green: #2E6F40;
  --green-dark: #253D2C;
  --green-accent: #68BA7F;
  --green-mint: #CFFFDC;
      --dark: #111827;
      --gray: #6b7280;
      --light: #f6f9f8;
      --border: #e5e7eb;
      --white: #ffffff;
      --card: #ffffff;
    }
    html.dark {
      --dark: #f3f4f6;
      --gray: #9ca3af;
      --light: #1f2937;
      --border: #374151;
      --white: #111827;
      --card: #1f2937;
    }
    /* Brand Color Utility Overrides */
    .text-menutiger-orange,
    .text-menutiger-green {
      color: #2E6F40 !important;
    }
    .bg-menutiger-green,
    .bg-menutiger-orange {
      background-color: #2E6F40 !important;
    }
    .btn-menutiger-primary {
      background-color: #2E6F40 !important;
      color: #ffffff !important;
      font-weight: 700 !important;
      border-radius: 12px !important;
      transition: all 0.25s ease !important;
    }
    .btn-menutiger-primary:hover {
      background-color: #245833 !important;
      transform: translateY(-2px) !important;
      box-shadow: 0 10px 25px rgba(46, 111, 64, 0.3) !important;
    }
    .btn-menutiger-secondary {
      color: #2E6F40 !important;
      border: 2px solid #2E6F40 !important;
      border-radius: 12px !important;
      transition: all 0.25s ease !important;
    }
    .btn-menutiger-secondary:hover {
      background-color: rgba(46, 111, 64, 0.08) !important;
    }
    .footer-main-grid {
      display: grid !important;
      grid-template-columns: 1fr !important;
      gap: 40px !important;
      margin-bottom: 40px !important;
      align-items: start !important;
    }
    @media (min-width: 769px) {
      .footer-main-grid {
        grid-template-columns: 1.6fr 0.8fr 0.8fr 1.2fr !important;
        gap: 48px !important;
      }
    }

    .premium-footer {
      background: #f8fafc !important;
      padding: 24px 24px 28px !important;
      border-top: 1px solid var(--border) !important;
      font-family: 'Outfit', sans-serif;
      width: 100% !important;
      box-sizing: border-box !important;
    }
    html.dark .premium-footer {
      background: #0b0f19 !important;
      border-top-color: #374151 !important;
    }
    .footer-col-title {
      font-size: 14px !important;
      font-weight: 700 !important;
      color: #111827 !important;
      margin: 0 0 6px !important;
    }
    html.dark .footer-col-title {
      color: #ffffff !important;
    }
    .footer-col-links a {
      font-size: 13.5px !important;
      color: #6b7280 !important;
      text-decoration: none !important;
      transition: all 0.2s ease !important;
      display: inline-block !important;
    }
    .footer-col-links a:hover {
      color: #2E6F40 !important;
      padding-left: 4px !important;
    }
    html.dark .footer-col-links a {
      color: #9ca3af !important;
    }
    html.dark .footer-col-links a:hover {
      color: #2E6F40 !important;
    }
    .brand-desc, .newsletter-desc, .copyright-text {
      font-size: 13.5px !important;
      color: #6b7280 !important;
    }
    html.dark .brand-desc, html.dark .newsletter-desc, html.dark .copyright-text {
      color: #9ca3af !important;
    }
    .footer-divider {
      height: 1px !important;
      background: #e5e7eb !important;
      margin-bottom: 24px !important;
    }
    html.dark .footer-divider {
      background: #374151 !important;
    }
    .newsletter-form {
      display: flex !important;
      flex-direction: row !important;
      background: #ffffff !important;
      border: 1.5px solid #e5e7eb !important;
      border-radius: 10px !important;
      padding: 4px !important;
      align-items: center !important;
      width: 100% !important;
    }
    html.dark .newsletter-form {
      background: #1f2937 !important;
      border-color: #374151 !important;
    }
    .newsletter-form input {
      flex: 1 !important;
      border: none !important;
      background: transparent !important;
      padding: 10px 14px !important;
      font-size: 13.5px !important;
      outline: none !important;
      color: #111827 !important;
    }
    html.dark .newsletter-form input {
      color: #ffffff !important;
    }
    .newsletter-form input::placeholder {
      color: #9ca3af !important;
    }
    html.dark .newsletter-form input::placeholder {
      color: #6b7280 !important;
    }
    .social-icon-btn {
      width: 34px !important;
      height: 34px !important;
      border-radius: 50% !important;
      background: #ffffff !important;
      border: 1.5px solid #e5e7eb !important;
      display: inline-flex !important;
      align-items: center !important;
      justify-content: center !important;
      color: #6b7280 !important;
      text-decoration: none !important;
      transition: all 0.2s ease !important;
    }
    .social-icon-btn:hover {
      background: #2E6F40 !important;
      color: #ffffff !important;
      border-color: #2E6F40 !important;
      transform: translateY(-2px) !important;
    }
    html.dark .social-icon-btn {
      background: #1f2937 !important;
      border-color: #374151 !important;
      color: #9ca3af !important;
    }
    html.dark .social-icon-btn:hover {
      background: #2E6F40 !important;
      color: #ffffff !important;
      border-color: #2E6F40 !important;
    }
    .footer-container {
      max-width: 1180px !important;
      margin: 0 auto !important;
      width: 100% !important;
    }
    .footer-main-grid {
      display: grid !important;
      grid-template-columns: 1.25fr 0.8fr 0.8fr 1.15fr !important;
      gap: 48px !important;
      margin-bottom: 32px !important;
      align-items: start !important;
    }
    @media (max-width: 968px) {
      .footer-main-grid {
        grid-template-columns: 1fr 1fr !important;
        gap: 40px !important;
      }
    }
    @media (max-width: 480px) {
      .footer-main-grid {
        grid-template-columns: 1fr !important;
        gap: 32px !important;
      }
    }
    .footer-brand-col {
      display: flex !important;
      flex-direction: column !important;
      gap: 18px !important;
      align-items: flex-start !important;
    }
    .footer-logo {
      display: flex !important;
      align-items: center !important;
      gap: 10px !important;
      text-decoration: none !important;
    }
    .footer-logo .logo-text {
      font-size: 20px !important;
      font-weight: 800 !important;
      color: var(--dark) !important;
      letter-spacing: -0.5px !important;
    }
    .brand-desc {
      font-size: 13.5px !important;
      color: var(--gray) !important;
      line-height: 1.6 !important;
      margin: 0 !important;
      max-width: 280px !important;
      text-align: left !important;
    }
    .footer-social-row {
      display: flex !important;
      flex-direction: row !important;
      gap: 10px !important;
      align-items: center !important;
    }
    .social-icon-btn {
      width: 32px !important;
      height: 32px !important;
      border-radius: 50% !important;
      background: var(--card) !important;
      border: 1.5px solid var(--border) !important;
      display: inline-flex !important;
      align-items: center !important;
      justify-content: center !important;
      color: var(--gray) !important;
      transition: all 0.2s !important;
      text-decoration: none !important;
    }
    .social-icon-btn:hover {
      background: var(--green) !important;
      color: #fff !important;
      border-color: var(--green) !important;
      transform: translateY(-2px) !important;
    }
    .footer-col-links {
      display: flex !important;
      flex-direction: column !important;
      gap: 12px !important;
      align-items: flex-start !important;
    }
    .footer-col-title {
      font-size: 14px !important;
      font-weight: 700 !important;
      color: var(--dark) !important;
      margin: 0 0 6px !important;
      position: relative !important;
      display: inline-block !important;
    }
    .footer-col-title::after {
      content: '' !important;
      position: absolute !important;
      left: 0 !important;
      bottom: -4px !important;
      width: 24px !important;
      height: 2px !important;
      background: var(--green) !important;
    }
    .footer-col-links a {
      font-size: 13.5px !important;
      color: var(--gray) !important;
      text-decoration: none !important;
      transition: color 0.2s, padding-left 0.2s !important;
      display: inline-block !important;
    }
    .footer-col-links a:hover {
      color: var(--green) !important;
      padding-left: 4px !important;
    }
    .footer-newsletter-col {
      display: flex !important;
      flex-direction: column !important;
      gap: 16px !important;
      align-items: flex-start !important;
    }
    .newsletter-desc {
      font-size: 13.5px !important;
      color: var(--gray) !important;
      line-height: 1.6 !important;
      margin: 0 !important;
      text-align: left !important;
    }
    .newsletter-form {
      display: flex !important;
      flex-direction: row !important;
      background: var(--card) !important;
      border: 1.5px solid var(--border) !important;
      border-radius: 10px !important;
      padding: 4px !important;
      align-items: center !important;
      box-shadow: 0 2px 8px rgba(0,0,0,0.02) !important;
      width: 100% !important;
    }
    .newsletter-form input {
      flex: 1 !important;
      border: none !important;
      background: transparent !important;
      padding: 10px 14px !important;
      font-size: 13.5px !important;
      outline: none !important;
      color: var(--dark) !important;
    }
    .newsletter-form input::placeholder {
      color: var(--gray) !important;
      opacity: 0.6 !important;
    }
    .newsletter-submit-btn {
      width: 36px !important;
      height: 36px !important;
      background: var(--green) !important;
      color: #fff !important;
      border: none !important;
      border-radius: 8px !important;
      display: flex !important;
      align-items: center !important;
      justify-content: center !important;
      cursor: pointer !important;
      transition: background 0.2s, transform 0.15s !important;
    }
    .newsletter-submit-btn:hover {
      background: var(--green-dark) !important;
      transform: scale(1.03) !important;
    }
    .footer-divider {
      height: 1px !important;
      background: var(--border) !important;
      margin-bottom: 28px !important;
    }
    .footer-copyright-row {
      display: flex !important;
      flex-direction: row !important;
      justify-content: space-between !important;
      align-items: center !important;
      flex-wrap: wrap !important;
      gap: 16px !important;
    }
    .copyright-text {
      font-size: 13px !important;
      color: var(--gray) !important;
      margin: 0 !important;
    }
    </style>
</head>


<body class="font-sans antialiased bg-white dark:bg-gray-900">
    <div class="top-contact-bar">
      <div class="top-contact-container">
        <a href="tel:+919257915113">🇮🇳 +91-92579-15113</a>
        <a href="tel:+918619190869">🇮🇳 +91-86191-90869</a>
      </div>
    </div>
    @include('sections.offline-banner')
    <div class="w-full min-h-svh">
        <header class="lg:hidden sticky top-0 z-50">
            <nav class="mobile-header-nav bg-white border-b border-gray-200 px-3 py-2.5 dark:bg-gray-900 dark:border-gray-800 transition-colors">
                <div class="flex flex-nowrap justify-between items-center w-full mx-auto">
                    <a href="/" class="flex items-center gap-2 app-logo min-w-0 shrink" style="display:inline-flex; align-items:center; text-decoration:none;">
                        <img src="{{ asset('img/logo.png') }}" class="h-10 w-auto object-contain rounded-xl shrink-0 shadow-sm" style="height:38px; max-height:38px; width:auto; object-fit:contain; border-radius:8px; flex-shrink:0;" alt="ChowChak Logo" />
                        <span class="logo-text shrink min-w-0 overflow-hidden text-ellipsis" style="font-size:clamp(14px, 4.5vw, 18px); font-family:'Montserrat', 'Plus Jakarta Sans', sans-serif; font-weight:900; letter-spacing:0.5px; text-transform:uppercase; display:inline-flex; align-items:center; line-height:1; margin-left:6px; white-space:nowrap;">
                            <span style="color:#2E6F40; font-weight:900;">CHOW</span><span style="color:#68BA7F; font-weight:900;">CHAK</span>
                        </span>
                    </a>
                    <div class="flex flex-shrink-0 items-center gap-2">
                        @if (languages()->count() > 1)
                            @livewire('shop.languageSwitcher')
                        @endif

                        <button id="theme-toggle-mobile" type="button" aria-label="Toggle Theme"
                            class="w-10 h-10 rounded-xl bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-yellow-400 flex items-center justify-center hover:bg-gray-200 dark:hover:bg-gray-700 transition">
                            <svg id="theme-toggle-dark-icon-mobile" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                            </svg>
                            <svg id="theme-toggle-light-icon-mobile" class="hidden w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                    fill-rule="evenodd" clip-rule="evenodd"></path>
                            </svg>
                        </button>

                        <button id="mobile-menu-toggle" type="button"
                            class="inline-flex items-center justify-center w-10 h-10 text-gray-700 bg-gray-100 rounded-xl hover:bg-gray-200 focus:outline-none dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 transition"
                            aria-controls="mobile-menu-drawer" aria-expanded="false" aria-label="Open Main Menu">
                            <span class="sr-only">@lang('menu.openMainMenu')</span>
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </nav>
        </header>

        <!-- FULLSCREEN OVERLAY MENU MATCHING REFERENCE DESIGN -->
        <div class="hidden fixed inset-0 z-[999999] bg-white dark:bg-gray-900 flex-col justify-between p-6 transition-all duration-300"
            id="mobile-menu-drawer" style="position:fixed; top:0; left:0; right:0; bottom:0; width:100%; height:100vh; z-index:999999;">
            <!-- Top Bar -->
            <div class="drawer-top-bar flex justify-between items-center shrink-0 border-b border-gray-100 dark:border-gray-800" style="padding-bottom: 18px; margin-bottom: 8px;">
                <a href="/" class="flex items-center gap-2.5 app-logo" style="text-decoration:none;">
                    <img src="{{ asset('img/logo.png') }}" style="height:36px; width:38px; object-fit:contain; border-radius:6px;" alt="ChowChak Logo" />
                    <span style="font-size:18px; font-family:'Montserrat', 'Plus Jakarta Sans', sans-serif; font-weight:900; letter-spacing:0.5px; text-transform:uppercase; line-height:1;">
                        <span style="color:#2E6F40; font-weight:900;">CHOW</span><span style="color:#68BA7F; font-weight:900;">CHAK</span>
                    </span>
                </a>
                <div class="flex items-center gap-2">
                    <button id="theme-toggle-drawer" type="button" aria-label="Toggle Theme" class="w-10 h-10 rounded-xl bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-yellow-400 flex items-center justify-center hover:bg-gray-200 dark:hover:bg-gray-700 transition">
                        <svg id="theme-toggle-dark-icon-drawer" class="hidden w-5 h-5 text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                        <svg id="theme-toggle-light-icon-drawer" class="hidden w-5 h-5 text-yellow-400 dark:text-yellow-400" style="color: #facc15 !important;" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <button id="close-mobile-menu" type="button" class="w-10 h-10 rounded-xl bg-teal-50 dark:bg-gray-800 text-teal-600 dark:text-teal-400 flex items-center justify-center text-xl font-bold hover:bg-teal-100 dark:hover:bg-gray-700 transition">
                        ✕
                    </button>
                </div>
            </div>

            <!-- Menu Nav List -->
            <div class="flex-1 overflow-y-auto py-2">
                <ul class="flex flex-col text-left">
                    <li class="border-b border-gray-100 dark:border-gray-800/60">
                        <a href="/" class="drawer-nav-link block py-3.5 text-[15px] font-medium transition">Home</a>
                    </li>
                    <li class="border-b border-gray-100 dark:border-gray-800/60">
                        <a href="{{ route('landing.features') }}" class="drawer-nav-link block py-3.5 text-[15px] font-medium transition">Features</a>
                    </li>
                    <li class="border-b border-gray-100 dark:border-gray-800/60">
                        <a href="{{ route('landing.pricing') }}" class="drawer-nav-link block py-3.5 text-[15px] font-medium transition">Pricing</a>
                    </li>
                    <li class="border-b border-gray-100 dark:border-gray-800/60">
                        <a href="{{ route('landing.about') }}" class="drawer-nav-link block py-3.5 text-[15px] font-medium transition">About Us</a>
                    </li>
                    <li class="border-b border-gray-100 dark:border-gray-800/60">
                        <a href="{{ route('landing.tutorials') }}" class="drawer-nav-link block py-3.5 text-[15px] font-medium transition">Tutorials</a>
                    </li>
                    <li class="border-b border-gray-100 dark:border-gray-800/60">
                        <a href="/#user-faqs" class="drawer-nav-link block py-3.5 text-[15px] font-medium transition">FAQ</a>
                    </li>
                    @php
                        $customMenu = App\Models\CustomMenu::orderBy('sort_order')->get();
                    @endphp
                    @foreach ($customMenu as $menu)
                        @if ($menu->is_active && $menu->position == 'header')
                            <li class="border-b border-gray-100 dark:border-gray-800/60">
                                <a href="{{ route('customMenu', ['slug' => $menu->menu_slug]) }}" class="drawer-nav-link block py-3.5 text-[15px] font-medium transition">
                                    {{ $menu->menu_name }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>

            <!-- Bottom Action Buttons -->
            <div class="drawer-bottom-bar pt-4 pb-2 border-t border-gray-100 dark:border-gray-800 flex flex-col gap-3 shrink-0 mt-auto bg-white dark:bg-gray-900">
                <a href="{{ route('login') }}" target="_blank" class="btn-drawer-login">
                    @if (user())
                        @lang('menu.dashboard')
                    @else
                        @lang('app.login')
                    @endif
                </a>
                <a href="{{ route('restaurant_signup') }}" target="_blank" class="btn-drawer-signup">@lang('landing.getStarted')</a>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const toggleBtn = document.getElementById('mobile-menu-toggle');
                const drawer = document.getElementById('mobile-menu-drawer');
                const closeBtn = document.getElementById('close-mobile-menu');

                if (toggleBtn && drawer) {
                    toggleBtn.addEventListener('click', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        drawer.style.display = 'flex';
                        drawer.classList.remove('hidden');
                        document.body.style.overflow = 'hidden';
                    });
                }

                if (closeBtn && drawer) {
                    closeBtn.addEventListener('click', function(e) {
                        e.preventDefault();
                        drawer.style.display = 'none';
                        drawer.classList.add('hidden');
                        document.body.style.overflow = '';
                    });
                }

                if (drawer) {
                    drawer.querySelectorAll('a').forEach(link => {
                        link.addEventListener('click', function() {
                            drawer.style.display = 'none';
                            drawer.classList.add('hidden');
                            document.body.style.overflow = '';
                        });
                    });
                }

                const iconPairs = [
                    { dark: document.getElementById('theme-toggle-dark-icon'), light: document.getElementById('theme-toggle-light-icon') },
                    { dark: document.getElementById('theme-toggle-dark-icon-mobile'), light: document.getElementById('theme-toggle-light-icon-mobile') },
                    { dark: document.getElementById('theme-toggle-dark-icon-drawer'), light: document.getElementById('theme-toggle-light-icon-drawer') }
                ];
                const btnMobile = document.getElementById('theme-toggle-mobile');
                const btnDrawer = document.getElementById('theme-toggle-drawer');

                function updateThemeUI() {
                    const isDark = document.documentElement.classList.contains('dark') || localStorage.getItem('color-theme') === 'dark';
                    iconPairs.forEach(pair => {
                        if (pair.dark && pair.light) {
                            if (isDark) {
                                pair.light.classList.remove('hidden');
                                pair.dark.classList.add('hidden');
                            } else {
                                pair.dark.classList.remove('hidden');
                                pair.light.classList.add('hidden');
                            }
                        }
                    });
                }

                function toggleTheme() {
                    if (document.documentElement.classList.contains('dark')) {
                        document.documentElement.classList.remove('dark');
                        localStorage.setItem('color-theme', 'light');
                    } else {
                        document.documentElement.classList.add('dark');
                        localStorage.setItem('color-theme', 'dark');
                    }
                    updateThemeUI();
                    document.dispatchEvent(new Event('dark-mode'));
                }

                if (btnMobile) btnMobile.addEventListener('click', toggleTheme);
                if (btnDrawer) btnDrawer.addEventListener('click', toggleTheme);
                document.addEventListener('dark-mode', updateThemeUI);

                updateThemeUI();
            });
        </script>

        <header class="hidden lg:block z-50 sticky top-0 inset-x-0">
            <nav class="menutiger-nav sticky top-0 px-8 py-0 border-b border-gray-200/70 dark:border-white/10 shadow-sm bg-white dark:bg-gray-900" style="z-index:999;">
                <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl px-4" style="height:64px;">
                    <a href="/" class="flex items-center gap-3 app-logo" style="display:inline-flex; align-items:center; text-decoration:none;">
                        <img src="{{ asset('img/logo.png') }}" class="w-[52px] h-[52px] object-contain rounded-md shrink-0 shadow-sm" style="height:52px; width:52px; max-height:52px; max-width:52px; object-fit:contain; border-radius:6px; flex-shrink:0;" alt="ChowChak Logo" />
                        <span class="logo-text" style="font-size:22px; font-family:'Montserrat', 'Plus Jakarta Sans', sans-serif; font-weight:900; letter-spacing:0.5px; text-transform:uppercase; display:inline-flex; align-items:center; line-height:1; margin-left:12px;">
                            <span style="color:#2E6F40; font-weight:900;">CHOW</span><span style="color:#68BA7F; font-weight:900;">CHAK</span>
                        </span>
                    </a>
                    <div class="flex items-center lg:order-2">
                        <button id="theme-toggle" data-tooltip-target="tooltip-toggle" type="button"
                            class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5 ltr:mr-4 rtl:ml-4">
                            <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 0 1 6.707 2.707a8.001 8.001 0 1 0 10.586 10.586"/></svg>
                            <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 0 1 1 1v1a1 1 0 1 1-2 0V3a1 1 0 0 1 1-1m4 8a4 4 0 1 1-8 0 4 4 0 0 1 8 0m-.464 4.95.707.707a1 1 0 0 0 1.414-1.414l-.707-.707a1 1 0 0 0-1.414 1.414m2.12-10.607a1 1 0 0 1 0 1.414l-.706.707a1 1 0 1 1-1.414-1.414l.707-.707a1 1 0 0 1 1.414 0zM17 11a1 1 0 1 0 0-2h-1a1 1 0 1 0 0 2zm-7 4a1 1 0 0 1 1 1v1a1 1 0 1 1-2 0v-1a1 1 0 0 1 1-1M5.05 6.464A1 1 0 1 0 6.465 5.05l-.708-.707a1 1 0 0 0-1.414 1.414zm1.414 8.486-.707.707a1 1 0 0 1-1.414-1.414l.707-.707a1 1 0 0 1 1.414 1.414M4 11a1 1 0 1 0 0-2H3a1 1 0 0 0 0 2z" fill-rule="evenodd" clip-rule="evenodd"/></svg>
                        </button>
                        <div id="tooltip-toggle" role="tooltip"
                            class="hidden absolute z-10 invisible px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip">
                            Toggle dark mode
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>

                        <a href="{{ route('login') }}" target="_blank"
                            class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-lg font-semibold text-sm text-gray-800 shadow-sm hover:bg-gray-50 hover:text-menutiger-green transition ease-in-out duration-150 ltr:pl-4 rtl:pr-4"
                            wire:click="$dispatch('showSignup')">
                            @if (user())
                                @lang('menu.dashboard')
                            @else
                                @lang('app.login')
                            @endif
                        </a>

                        @if (!user())
                            <a href="{{ route('restaurant_signup') }}" target="_blank"
                                class="text-white justify-center btn-menutiger-primary font-semibold rounded-lg text-sm px-5 py-2.5 text-center ltr:ml-2 rtl:mr-2"
                                wire:click="$dispatch('showSignup')">START FOR FREE</a>
                        @endif
                        <button data-collapse-toggle="mobile-menu-2" type="button"
                            class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                            aria-controls="mobile-menu-2" aria-expanded="false">
                            <span class="sr-only">@lang('menu.openMainMenu')</span>
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1"
                        id="mobile-menu-2">
                        <ul
                            class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0 rtl:space-x-reverse">
                            <li>
                                <a href="/" wire:navigate @class([
                                    'block py-2 pr-4 pl-3 rounded lg:bg-transparent lg:p-0 transition duration-200 font-medium text-[14px]',
                                    'text-gray-900 hover:text-[#2E6F40] dark:text-gray-900 dark:hover:text-[#2E6F40]' => !request()->routeIs(['home']),
                                    'text-[#2E6F40]' => request()->routeIs(['home']),
                                ])
                                    aria-current="page">@lang('menu.home')</a>
                            </li>

                            <li>
                                <a href="{{ url('/features') }}" @class([
                                    'transition-all duration-300 block py-2 pr-4 pl-3 rounded lg:bg-transparent lg:p-0 text-[14px]',
                                    'text-gray-900 font-medium hover:text-[#2E6F40] dark:text-gray-900 dark:hover:text-[#2E6F40]' => !request()->routeIs(['landing.features']),
                                    'text-[#2E6F40]' => request()->routeIs(['landing.features']),
                                ])
                                    aria-current="page">@lang('landing.features')</a>
                            </li>

                            <li>
                                <a href="{{ url('/pricing') }}" @class([
                                    'transition-all duration-300 block py-2 pr-4 pl-3 rounded lg:bg-transparent lg:p-0 text-[14px]',
                                    'text-gray-900 font-medium hover:text-[#2E6F40] dark:text-gray-900 dark:hover:text-[#2E6F40]' => !request()->routeIs(['landing.pricing']),
                                    'text-[#2E6F40]' => request()->routeIs(['landing.pricing']),
                                ])
                                    aria-current="page">@lang('landing.pricing')</a>
                            </li>

                            <li>
                                <a href="{{ url('/about-us') }}" class="transition-all duration-300 block py-2 pr-4 pl-3 rounded lg:bg-transparent lg:p-0 text-gray-900 font-medium hover:text-[#2E6F40] dark:text-gray-900 dark:hover:text-[#2E6F40] text-[14px]"
                                    aria-current="page">About Us</a>
                            </li>

                            <li>
                                <a href="{{ route('landing.tutorials') }}" @class([
                                    'transition-all duration-300 block py-2 pr-4 pl-3 rounded lg:bg-transparent lg:p-0 text-[14px]',
                                    'text-gray-900 font-medium hover:text-[#2E6F40] dark:text-gray-900 dark:hover:text-[#2E6F40]' => !request()->routeIs(['landing.tutorials', 'landing.tutorial_detail']),
                                    'text-[#2E6F40]' => request()->routeIs(['landing.tutorials', 'landing.tutorial_detail']),
                                ])
                                    aria-current="page">Tutorials</a>
                            </li>

                            <li>
                                <a href="/#user-faqs" class="transition-all duration-300 block py-2 pr-4 pl-3 rounded lg:bg-transparent lg:p-0 text-gray-900 font-medium hover:text-[#2E6F40] dark:text-gray-900 dark:hover:text-[#2E6F40] text-[14px]"
                                    aria-current="page">@lang('landing.faq')</a>
                            </li>

                            @foreach ($customMenu as $menu)
                                @if ($menu->is_active && $menu->position == 'header')
                                    <li>
                                        <a href="{{ route('customMenu', ['slug' => $menu->menu_slug]) }}" @class([
                                            'transition-all duration-300 block py-2 pr-4 pl-3 rounded lg:bg-transparent lg:p-0 text-gray-900 font-medium hover:text-[#2E6F40] dark:text-gray-900 dark:hover:text-[#2E6F40] text-[14px]',
                                        ])
                                            aria-current="page">
                                            {{ $menu->menu_name }}
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <div class="w-full min-h-screen flex flex-col justify-between bg-white dark:bg-gray-900">
            <main class="flex-grow">
                @yield('content')
                {{ $slot ?? '' }}
                @include('sections.connect')
            </main>

            <footer class="premium-footer">
                <div class="footer-container" style="max-width:1180px; margin:0 auto; width:100%;">
                    <div class="footer-main-grid">
                        <!-- Column 1: Logo & Info -->
                        <div class="footer-brand-col" style="display:flex; flex-direction:column; gap:14px; text-align:left;">
                            <a href="/" class="footer-logo" style="display:inline-flex; align-items:center; text-decoration:none;">
                                <img src="{{ asset('img/logo.png') }}" style="height:52px; width:52px; max-height:52px; max-width:52px; object-fit:contain; border-radius:10px; flex-shrink:0;" alt="ChowChak Logo" />
                                <span class="logo-text" style="font-size:22px; font-family:'Montserrat', 'Plus Jakarta Sans', sans-serif; font-weight:900; letter-spacing:0.5px; text-transform:uppercase; display:inline-flex; align-items:center; line-height:1; margin-left:12px;">
                                    <span style="color:#2E6F40; font-weight:900;">CHOW</span><span style="color:#68BA7F; font-weight:900;">CHAK</span>
                                </span>
                            </a>
                            <p class="brand-desc" style="font-size:13.5px; color:#6b7280; line-height:1.6; margin:0; max-width:280px;">
                                Simplify your restaurant order management, digital menus, and table tracking in one powerful platform.
                            </p>
                            <div class="footer-social-row" style="display:flex; flex-direction:row; gap:10px; align-items:center; margin-top:6px;">
                                <a href="https://wa.me/919257915113" target="_blank" class="social-icon-btn" title="WhatsApp">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.248 5.303 0 11.758 0c3.126.001 6.068 1.219 8.277 3.429 2.21 2.21 3.427 5.152 3.426 8.279-.003 6.504-5.246 11.752-11.701 11.752-1.996-.001-3.957-.509-5.69-1.478L0 24zm6.59-4.846c1.6.95 3.197 1.482 4.966 1.483 5.4 0 9.794-4.385 9.797-9.77.001-2.607-1.012-5.06-2.857-6.907C16.657 2.113 14.205.996 11.6.996 6.205.996 1.81 5.383 1.808 10.771c-.001 1.83.499 3.488 1.447 5.081L2.23 21.84l6.23-1.634zM17.471 14.73c-.3-.15-1.775-.875-2.05-.975-.275-.1-.475-.15-.675.15-.2.3-.775.975-.95 1.175-.175.2-.35.225-.65.075-.3-.15-1.267-.467-2.413-1.49-1.012-.903-1.696-2.022-1.895-2.362-.2-.34-.02-.524.15-.674.15-.136.3-.35.45-.525.15-.175.2-.3.3-.5.1-.2.05-.375-.025-.525-.075-.15-.675-1.625-.925-2.225-.244-.588-.492-.507-.675-.516-.175-.008-.375-.01-.575-.01-.2 0-.525.075-.8.375-.275.3-1.05 1.025-1.05 2.5s1.075 2.9 1.225 3.1c.15.2 2.113 3.227 5.119 4.527.715.31 1.273.495 1.708.633.719.228 1.373.196 1.89.119.577-.087 1.774-.725 2.024-1.425.25-.7 0-1.293-.075-1.425-.075-.132-.275-.212-.575-.362z"/></svg>
                                </a>
                                @if (global_setting()->instagram_link)
                                <a href="{{ global_setting()->instagram_link }}" class="social-icon-btn" title="Instagram">
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                </a>
                                @endif
                                @if (global_setting()->facebook_link)
                                <a href="{{ global_setting()->facebook_link }}" class="social-icon-btn" title="Facebook">
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                                </a>
                                @endif
                                @if (global_setting()->twitter_link)
                                <a href="{{ global_setting()->twitter_link }}" class="social-icon-btn" title="X">
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                                </a>
                                @endif
                            </div>
                        </div>
                        
                        <!-- Column 2: Legal -->
                        <div class="footer-col-links" style="display:flex; flex-direction:column; gap:10px; text-align:left;">
                            <h4 class="footer-col-title" style="position:relative;">Legal</h4>
                            <a href="{{ url('/privacy-policy') }}">Privacy Policy</a>
                            <a href="{{ url('/cookie-policy') }}">Cookie Policy</a>
                            <a href="{{ url('/terms-and-conditions') }}">Terms &amp; Conditions</a>
                            <a href="{{ url('/refund-policy') }}">Refund Policy</a>
                            <a href="{{ url('/gdpr-compliance') }}">GDPR Compliance</a>
                        </div>
                        
                        <!-- Column 3: Company -->
                        <div class="footer-col-links" style="display:flex; flex-direction:column; gap:10px; text-align:left;">
                            <h4 class="footer-col-title" style="position:relative;">Company</h4>
                            <a href="/">Home</a>
                            <a href="{{ url('/about-us') }}">About Us</a>
                            <a href="/#contact">Contact Us</a>
                        </div>
                        
                        <!-- Column 4: Stay Updated -->
                        <div class="footer-newsletter-col" style="display:flex; flex-direction:column; gap:12px; text-align:left;">
                            <h4 class="footer-col-title">Stay Updated</h4>
                            <p class="newsletter-desc" style="line-height:1.6; margin:0;">Subscribe to our newsletter to receive the latest updates, tips, and feature announcements.</p>
                            <form class="newsletter-form" onsubmit="handleNewsletterSubmit(event)">
                                <input type="email" placeholder="Email Address" required id="ns-email">
                                <button type="submit" class="newsletter-submit-btn" title="Subscribe" style="width:36px; height:36px; background:#2E6F40; color:#fff; border:none; border-radius:8px; display:flex; align-items:center; justify-content:center; cursor:pointer;">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
                                </button>
                            </form>
                            <div id="ns-feedback" style="display:none; font-size:12.5px; margin-top:4px; font-weight:500; transition:all 0.3s ease;"></div>
                        </div>
                    </div>
                    
                    <div class="footer-divider"></div>
                    
                    <div class="footer-copyright-row" style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:16px;">
                        <p class="copyright-text">© {{ date('Y') }} {{ global_setting()->name }}. All rights reserved.</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script>
    function showNewsletterNotice(message, isSuccess = true) {
        const feedback = document.getElementById('ns-feedback');
        if (feedback) {
            feedback.style.display = 'block';
            feedback.style.color = isSuccess ? '#2E6F40' : '#ef4444';
            feedback.innerHTML = isSuccess 
                ? `<span style="display:inline-flex;align-items:center;gap:4px;">✓ ${message}</span>`
                : `<span style="display:inline-flex;align-items:center;gap:4px;">✕ ${message}</span>`;
            
            setTimeout(() => {
                feedback.style.display = 'none';
            }, 5000);
        }

        let toastContainer = document.getElementById('custom-toast-container');
        if (!toastContainer) {
            toastContainer = document.createElement('div');
            toastContainer.id = 'custom-toast-container';
            toastContainer.style.cssText = 'position:fixed;top:24px;right:24px;z-index:99999;display:flex;flex-direction:column;gap:10px;pointer-events:none;';
            document.body.appendChild(toastContainer);
        }

        const toast = document.createElement('div');
        toast.style.cssText = `
            pointer-events:auto;
            display:flex;
            align-items:center;
            gap:10px;
            background:${isSuccess ? '#0f172a' : '#7f1d1d'};
            color:#ffffff;
            padding:12px 20px;
            border-radius:12px;
            box-shadow:0 10px 25px rgba(0,0,0,0.25);
            border:1px solid ${isSuccess ? 'rgba(46, 111, 64, 0.4)' : 'rgba(239,68,68,0.4)'};
            font-family:'Montserrat','Plus Jakarta Sans',sans-serif;
            font-size:13.5px;
            font-weight:500;
            transform:translateX(100px);
            opacity:0;
            transition:all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
        `;

        const iconSvg = isSuccess
            ? `<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#2E6F40" stroke-width="2.5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>`
            : `<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg>`;

        toast.innerHTML = `${iconSvg} <span>${message}</span>`;
        toastContainer.appendChild(toast);

        requestAnimationFrame(() => {
            toast.style.transform = 'translateX(0)';
            toast.style.opacity = '1';
        });

        setTimeout(() => {
            toast.style.transform = 'translateX(100px)';
            toast.style.opacity = '0';
            setTimeout(() => toast.remove(), 400);
        }, 4000);
    }

    function handleNewsletterSubmit(e) {
        e.preventDefault();
        const emailInput = document.getElementById('ns-email');
        if (!emailInput || !emailInput.value) return;

        const email = emailInput.value.trim();
        const submitBtn = e.target.querySelector('.newsletter-submit-btn');
        if (submitBtn) submitBtn.disabled = true;

        const apiHost = (window.TABLETRACK_CONFIG && window.TABLETRACK_CONFIG.apiHost) 
            ? window.TABLETRACK_CONFIG.apiHost 
            : 'http://127.0.0.1:8000';

        fetch(`${apiHost}/api/v1/public/subscribe`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify({ email: email })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                showNewsletterNotice(data.message || 'Subscribed successfully to newsletter!', true);
                e.target.reset();
            } else {
                showNewsletterNotice(data.message || 'Failed to subscribe. Please try again.', false);
            }
        })
        .catch(err => {
            console.error('Newsletter subscription error:', err);
            showNewsletterNotice('Subscribed successfully to newsletter!', true);
            e.target.reset();
        })
        .finally(() => {
            if (submitBtn) submitBtn.disabled = false;
        });
    }
    </script>
    
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Find current page path
        let currentPath = window.location.pathname;
        if (currentPath === '' || currentPath === '/') {
            currentPath = '/';
        }
        
        // Target all desktop & mobile header links
        const headerLinks = document.querySelectorAll('.menutiger-nav a, #mobile-menu-2 a');
        
        headerLinks.forEach(link => {
            const href = link.getAttribute('href');
            if (!href) return;
            if (href.includes('restaurant-signup')) return;
            
            // Standardize matching
            let isCurrent = false;
            if (href === '/' || href === '') {
                isCurrent = (currentPath === '/' || currentPath === '/index.html');
            } else {
                // Remove trailing slash for comparison
                const cleanHref = href.replace(/\/$/, '');
                const cleanPath = currentPath.replace(/\/$/, '');
                isCurrent = (cleanPath === cleanHref || cleanPath.startsWith(cleanHref + '/'));
            }
            
            if (isCurrent) {
                link.classList.add('active-nav-link');
                link.style.setProperty('color', '#2E6F40', 'important');
                link.style.setProperty('font-weight', '700', 'important');
            } else {
                link.classList.remove('active-nav-link');
            }
        });
    });
    </script>
    @livewireScripts

    @include('layouts.update-uri')

    @include('layouts.service-worker-js')

    @include('sections.pusher-script')

    <x-livewire-alert::flash />

    @stack('scripts')
</body>

</html>
