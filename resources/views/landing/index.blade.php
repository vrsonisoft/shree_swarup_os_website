@extends('layouts.landing')

@section('title', 'ShreeSwarupOS - Advanced Restaurant Management System & QR Code Menu')
@section('meta_description', 'Simplify dining operations with ShreeSwarupOS. Digital QR code menus, POS order management, contactless ordering, table tracking, and real-time sales reporting for restaurants.')
@section('meta_keywords', 'restaurant management system, digital QR menu, restaurant POS, contactless ordering, table management, online restaurant software, ShreeSwarupOS')

@section('schema')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "SoftwareApplication",
  "name": "ShreeSwarupOS",
  "operatingSystem": "Web, Android, iOS",
  "applicationCategory": "BusinessApplication",
  "description": "Advanced Restaurant Management System with Digital QR Code Menu, Table Tracking, and Billing POS."
}
</script>
@endsection

@section('content')

<!-- 1. Hero Section -->
<section class="py-8 md:py-12 bg-[#f9fbfc] dark:bg-neutral-900 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <!-- Left Info Block -->
            <div class="lg:col-span-7 space-y-6">
                <!-- Mentioned In -->
                <div class="flex items-center gap-3 text-xs tracking-wider text-gray-500 font-bold uppercase">
                    <span>AS MENTIONED IN</span>
                    <span class="font-serif italic font-extrabold text-gray-800 dark:text-neutral-200 text-sm">The New York Times</span>
                </div>
                
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold tracking-tight text-menutiger-dark dark:text-neutral-100 leading-tight">
                    Advanced <span class="text-menutiger-orange">Restaurant Order Management System</span> with Digital QR Code Menu
                </h1>
                
                <p class="text-base md:text-lg text-gray-600 dark:text-neutral-400 leading-relaxed max-w-2xl">
                    Simplify dining with ShreeSwarupOS restaurant management software. Let guests order and pay seamlessly, manage orders efficiently, monitor sales performance, and execute promotions with precision for a smooth, streamlined operation year-round.
                </p>
                
                <div class="flex flex-col sm:flex-row items-center gap-6 pt-4">
                    <a href="{{ route('restaurant_signup') }}" class="btn-menutiger-primary px-8 py-4 text-base inline-flex items-center justify-center w-full sm:w-auto shadow-md">
                        Get Started for FREE
                    </a>
                    <a href="#testimonials" class="btn-menutiger-secondary text-base font-semibold">
                        Customer Success Stories
                    </a>
                </div>
            </div>

            <!-- Right Visual Mockups Stack -->
            <div class="lg:col-span-5 relative flex justify-center items-center h-[380px] md:h-[450px] w-full mt-8 lg:mt-0">
                <div class="absolute w-[80%] h-[80%] right-[5%] top-0 bg-menutiger-green/5 rounded-full blur-3xl pointer-events-none"></div>
                <!-- Banner 1 (Backplate) -->
                <img src="https://d25pihiozuzyh0.cloudfront.net/home-page/banner_1.webp" 
                     class="absolute right-[5%] top-4 h-[80%] object-contain rounded-2xl shadow-xl border border-gray-100 dark:border-neutral-800 transition duration-700 hover:scale-[1.02]" 
                     alt="Banner Dashboard">
                
                <!-- Banner 2 (Middle overlay) -->
                <img src="https://d25pihiozuzyh0.cloudfront.net/home-page/banner_2.webp" 
                     class="absolute left-[5%] top-[25%] h-[40%] object-contain rounded-xl shadow-lg border border-gray-150/50 dark:border-neutral-800 transition duration-700 hover:scale-[1.03]" 
                     alt="Banner Phone">
                
                <!-- Banner 3 (Foreground QR) -->
                <img src="https://d25pihiozuzyh0.cloudfront.net/home-page/banner_3.webp" 
                     class="absolute left-0 bottom-[10%] h-[30%] object-contain rounded-xl shadow-md border border-gray-150/50 dark:border-neutral-800 transition duration-700 hover:scale-[1.05]" 
                     alt="Banner QR Card">
            </div>

        </div>
    </div>
</section>

<!-- 2. Trusted Restaurant Section -->
<section class="py-8 bg-white dark:bg-neutral-800/40 border-y border-gray-100 dark:border-neutral-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-xl font-bold text-gray-500 dark:text-neutral-400 mb-6 tracking-wide uppercase">
            The Trusted Restaurant Menu Maker by Modern Restaurants & Cafes Worldwide
        </h2>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
            
            <!-- Cafe Card -->
            <div class="menutiger-card p-6 flex flex-col items-center justify-center text-center">
                <span class="text-4xl mb-3">☕</span>
                <span class="font-bold text-gray-800 dark:text-neutral-200">Cafés</span>
            </div>

            <!-- Food Trucks Card -->
            <div class="menutiger-card p-6 flex flex-col items-center justify-center text-center">
                <span class="text-4xl mb-3">🚚</span>
                <span class="font-bold text-gray-800 dark:text-neutral-200">Food Trucks</span>
            </div>

            <!-- Fine Dining Card -->
            <div class="menutiger-card p-6 flex flex-col items-center justify-center text-center">
                <span class="text-4xl mb-3">🍷</span>
                <span class="font-bold text-gray-800 dark:text-neutral-200">Fine Dining</span>
            </div>

            <!-- Bars Card -->
            <div class="menutiger-card p-6 flex flex-col items-center justify-center text-center">
                <span class="text-4xl mb-3">🍺</span>
                <span class="font-bold text-gray-800 dark:text-neutral-200">Bars</span>
            </div>

            <!-- Hotels Card -->
            <div class="menutiger-card p-6 flex flex-col items-center justify-center text-center">
                <span class="text-4xl mb-3">🏨</span>
                <span class="font-bold text-gray-800 dark:text-neutral-200">Hotels</span>
            </div>

        </div>
    </div>
</section>

<!-- 3. Stats Section -->
<section class="py-6 bg-white dark:bg-neutral-900">
    <div class="max-w-4xl mx-auto px-4">
        <div class="bg-menutiger-green rounded-2xl p-8 text-white shadow-lg flex flex-col md:flex-row justify-around items-center gap-6 text-center">
            
            <div class="flex-1">
                <div class="text-4xl lg:text-5xl font-extrabold">10M+</div>
                <div class="text-sm font-semibold tracking-wider mt-1 opacity-90">USERS</div>
            </div>
            
            <div class="hidden md:block w-px h-12 bg-white/20"></div>
            
            <div class="flex-1">
                <div class="text-4xl lg:text-5xl font-extrabold">20K+</div>
                <div class="text-sm font-semibold tracking-wider mt-1 opacity-90">RESTAURANTS</div>
            </div>
            
            <div class="hidden md:block w-px h-12 bg-white/20"></div>
            
            <div class="flex-1">
                <div class="text-4xl lg:text-5xl font-extrabold">15M+</div>
                <div class="text-sm font-semibold tracking-wider mt-1 opacity-90">ORDERS</div>
            </div>

        </div>
    </div>
</section>

<!-- 4. Video Preview Section -->
<section class="py-10 bg-[#f9fbfc] dark:bg-neutral-800/40">
    <div class="max-w-5xl mx-auto px-4 text-center space-y-4">
        <h2 class="text-3xl font-extrabold text-menutiger-dark dark:text-teal-400">
            All-In-One Free Menu Maker And Restaurant Management System
        </h2>
        <p class="text-gray-500 max-w-2xl mx-auto pb-4">
            Boost sales and engagement using ShreeSwarupOS’s free menu maker, management system, and built-in restaurant marketing tools.
        </p>
        <div class="relative rounded-2xl overflow-hidden shadow-2xl border border-gray-250/20 max-w-3xl mx-auto group">
            <img src="https://www.menutiger.com/_next/static/media/video_thumbnail.aab4b033.webp" 
                 class="w-full aspect-video object-cover group-hover:scale-[1.01] transition duration-500" 
                 alt="Video Thumbnail">
            <div class="absolute inset-0 bg-black/30 flex items-center justify-center cursor-pointer transition duration-300 group-hover:bg-black/40">
                <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center shadow-2xl text-menutiger-green transform transition duration-300 group-hover:scale-110">
                    <svg class="w-10 h-10 fill-current ml-1" viewBox="0 0 24 24">
                        <path d="M8 5v14l11-7z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 5. Features Grid Section -->
<section class="py-10 bg-white dark:bg-neutral-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
        <h2 class="text-3xl lg:text-4xl font-extrabold text-menutiger-dark dark:text-neutral-100">
            Everything You Need To Get The <span class="text-menutiger-green">Kitchen In order</span>
        </h2>
        <p class="text-gray-500 max-w-2xl mx-auto pb-6">
            Boost sales and engagement using ShreeSwarupOS’s free menu maker, management system, and built-in restaurant marketing tools.
        </p>
        
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
            
            <!-- Item 1 -->
            <div class="menutiger-card p-6 flex flex-col items-center justify-center text-center">
                <span class="text-4xl mb-3">📊</span>
                <span class="font-bold text-gray-800 dark:text-neutral-200">Ordering Dashboard</span>
            </div>

            <!-- Item 2 -->
            <div class="menutiger-card p-6 flex flex-col items-center justify-center text-center">
                <span class="text-4xl mb-3">📈</span>
                <span class="font-bold text-gray-800 dark:text-neutral-200">Sales Analytics</span>
            </div>

            <!-- Item 3 -->
            <div class="menutiger-card p-6 flex flex-col items-center justify-center text-center">
                <span class="text-4xl mb-3">🛒</span>
                <span class="font-bold text-gray-800 dark:text-neutral-200">Purchase Analytics</span>
            </div>

            <!-- Item 4 -->
            <div class="menutiger-card p-6 flex flex-col items-center justify-center text-center">
                <span class="text-4xl mb-3">💻</span>
                <span class="font-bold text-gray-800 dark:text-neutral-200">POS Integration</span>
            </div>

            <!-- Item 5 -->
            <div class="menutiger-card p-6 flex flex-col items-center justify-center text-center">
                <span class="text-4xl mb-3">📱</span>
                <span class="font-bold text-gray-800 dark:text-neutral-200">QR code Menu Creation</span>
            </div>

            <!-- Item 6 -->
            <div class="menutiger-card p-6 flex flex-col items-center justify-center text-center">
                <span class="text-4xl mb-3">📝</span>
                <span class="font-bold text-gray-800 dark:text-neutral-200">Customer Order Management</span>
            </div>

            <!-- Item 7 -->
            <div class="menutiger-card p-6 flex flex-col items-center justify-center text-center">
                <span class="text-4xl mb-3">🔍</span>
                <span class="font-bold text-gray-800 dark:text-neutral-200">Menu Analytics and Insights</span>
            </div>

            <!-- Item 8 -->
            <div class="menutiger-card p-6 flex flex-col items-center justify-center text-center">
                <span class="text-4xl mb-3">🎨</span>
                <span class="font-bold text-gray-800 dark:text-neutral-200">Restaurant Branding</span>
            </div>

            <!-- Item 9 -->
            <div class="menutiger-card p-6 flex flex-col items-center justify-center text-center">
                <span class="text-4xl mb-3">💬</span>
                <span class="font-bold text-gray-800 dark:text-neutral-200">Customer Feedback</span>
            </div>

            <!-- Item 10 -->
            <div class="menutiger-card p-6 flex flex-col items-center justify-center text-center">
                <span class="text-4xl mb-3">🌐</span>
                <span class="font-bold text-gray-800 dark:text-neutral-200">Multilingual Support</span>
            </div>

        </div>
    </div>
</section>

<!-- 6. Why Operators Love Us Section -->
<section class="py-10 bg-[#f9fbfc] dark:bg-neutral-800/40">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-4">
        <h2 class="text-3xl lg:text-4xl font-extrabold text-center text-menutiger-dark dark:text-neutral-100">
            Why <span class="text-menutiger-green">restaurant operators</span> love using our digital menu
        </h2>
        <div class="h-2"></div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <!-- Card 1 -->
            <div class="menutiger-card overflow-hidden flex flex-col">
                <img src="https://www.menutiger.com/_next/static/media/whyLove_1.dc110fdf.webp" 
                     class="w-full h-48 object-cover border-b border-gray-100 dark:border-neutral-800" alt="Tool Image">
                <div class="p-6 space-y-3 flex-1 flex flex-col justify-between">
                    <h3 class="font-bold text-lg text-gray-800 dark:text-neutral-200 leading-snug">
                        Transition to contactless ordering and payment
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-neutral-400">
                        Go paperless and embrace contactless ordering and payments using a restaurant QR code menu for a cleaner and safer experience.
                    </p>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="menutiger-card overflow-hidden flex flex-col">
                <img src="https://www.menutiger.com/_next/static/media/whyLove_3.dbcb6972.webp" 
                     class="w-full h-48 object-cover border-b border-gray-100 dark:border-neutral-800" alt="Tool Image">
                <div class="p-6 space-y-3 flex-1 flex flex-col justify-between">
                    <h3 class="font-bold text-lg text-gray-800 dark:text-neutral-200 leading-snug">
                        Easy-to-update menu items and prices
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-neutral-400">
                        Modify menus and prices in real-time with an interactive restaurant menu.
                    </p>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="menutiger-card overflow-hidden flex flex-col">
                <img src="https://www.menutiger.com/_next/static/media/whyLove_2.3100ef2c.webp" 
                     class="w-full h-48 object-cover border-b border-gray-100 dark:border-neutral-800" alt="Tool Image">
                <div class="p-6 space-y-3 flex-1 flex flex-col justify-between">
                    <h3 class="font-bold text-lg text-gray-800 dark:text-neutral-200 leading-snug">
                        Reduce wait times
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-neutral-400">
                        Our streamlined ordering system enhances efficiency with faster service, keeping customers happy with shorter wait times.
                    </p>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="menutiger-card overflow-hidden flex flex-col">
                <img src="https://www.menutiger.com/_next/static/media/whyLove_4.0a38e366.webp" 
                     class="w-full h-48 object-cover border-b border-gray-100 dark:border-neutral-800" alt="Tool Image">
                <div class="p-6 space-y-3 flex-1 flex flex-col justify-between">
                    <h3 class="font-bold text-lg text-gray-800 dark:text-neutral-200 leading-snug">
                        Create cost-effective solutions
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-neutral-400">
                        Our QR code menu is a cost-effective solution that reduces the need for printing and minimizes staff workload.
                    </p>
                </div>
            </div>

            <!-- Card 5 -->
            <div class="menutiger-card overflow-hidden flex flex-col">
                <img src="https://www.menutiger.com/_next/static/media/whyLove_5.7bde8c69.webp" 
                     class="w-full h-48 object-cover border-b border-gray-100 dark:border-neutral-800" alt="Tool Image">
                <div class="p-6 space-y-3 flex-1 flex flex-col justify-between">
                    <h3 class="font-bold text-lg text-gray-800 dark:text-neutral-200 leading-snug">
                        Increase order accuracy
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-neutral-400">
                        Bid farewell to incorrect dishes as a menu QR code guarantees precision, enhancing overall customer satisfaction.
                    </p>
                </div>
            </div>

            <!-- Card 6 -->
            <div class="menutiger-card overflow-hidden flex flex-col">
                <img src="https://www.menutiger.com/_next/static/media/whyLove_6.257286ac.webp" 
                     class="w-full h-48 object-cover border-b border-gray-100 dark:border-neutral-800" alt="Tool Image">
                <div class="p-6 space-y-3 flex-1 flex flex-col justify-between">
                    <h3 class="font-bold text-lg text-gray-800 dark:text-neutral-200 leading-snug">
                        Enhance customer experience
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-neutral-400">
                        Elevate the dining experience with our customer-friendly interactive restaurant menu features, turning satisfied customers into loyal patrons.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- 7. Integrations Section -->
<section class="py-10 bg-white dark:bg-neutral-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
            
            <div class="lg:col-span-6 space-y-4">
                <h3 class="text-3xl font-extrabold text-menutiger-dark dark:text-neutral-100 leading-tight">
                    Pairs perfectly<br/> with <span class="text-menutiger-green">tools you use</span>
                </h3>
                <p class="text-gray-500 text-base leading-relaxed">
                    Easily connect your dashboard with payment gateways, printers, and any software.
                </p>
            </div>
            
            <div class="lg:col-span-6 grid grid-cols-2 sm:grid-cols-3 gap-6">
                <!-- Stripe -->
                <div class="menutiger-card p-4 flex items-center justify-center h-20 bg-gray-50">
                    <span class="font-extrabold text-xl tracking-tight text-indigo-600">Stripe</span>
                </div>
                <!-- PayPal -->
                <div class="menutiger-card p-4 flex items-center justify-center h-20 bg-gray-50">
                    <span class="font-extrabold text-xl tracking-tight text-blue-800 italic">PayPal</span>
                </div>
                <!-- Zapier -->
                <div class="menutiger-card p-4 flex items-center justify-center h-20 bg-gray-50">
                    <span class="font-extrabold text-xl tracking-tight text-orange-600">Zapier</span>
                </div>
                <!-- Canva -->
                <div class="menutiger-card p-4 flex items-center justify-center h-20 bg-gray-50">
                    <span class="font-extrabold text-xl tracking-tight text-teal-500">Canva</span>
                </div>
                <!-- Apple Pay -->
                <div class="menutiger-card p-4 flex items-center justify-center h-20 bg-gray-50">
                    <span class="font-bold text-lg text-black"> Pay</span>
                </div>
                <!-- Google Play -->
                <div class="menutiger-card p-4 flex items-center justify-center h-20 bg-gray-50">
                    <span class="font-semibold text-sm text-gray-700">Google Play</span>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- 8. QR Preview Scan Section -->
<section class="py-10 bg-[#f9fbfc] dark:bg-neutral-800/40">
    <div class="max-w-5xl mx-auto px-4">
        
        <div class="bg-menutiger-green rounded-3xl p-8 md:p-12 shadow-xl flex flex-col lg:flex-row items-center justify-between gap-12">
            
            <div class="flex-1 space-y-6 text-white text-center lg:text-left">
                <h3 class="text-3xl font-extrabold leading-tight">
                    Scan the QR code to Preview Your Digital Menu For Restaurants
                </h3>
                <p class="text-sm md:text-base leading-relaxed opacity-95">
                    Explore a customizable, interactive menu designed to simplify ordering, boost your engagement, and showcase your restaurant at its best in just a scan.
                </p>
                <p class="text-xs opacity-80 italic">
                    Our smart digital menu for restaurants is powered by technology that has been used in the hospitality business since 2018.
                </p>
                <div class="pt-4">
                    <a href="{{ route('restaurant_signup') }}" class="btn-menutiger-primary px-8 py-3.5 inline-flex items-center justify-center font-bold bg-white text-menutiger-green shadow-md">
                        Create your QR code menu
                    </a>
                </div>
            </div>
            
            <div class="flex-shrink-0 flex items-center justify-center gap-6 bg-white/10 p-6 rounded-2xl border border-white/10">
                <img src="https://www.menutiger.com/_next/static/media/qr_code_scan.9237a00c.svg" 
                     class="w-32 h-32 md:w-40 md:h-40 bg-white p-2 rounded-xl" alt="Scan QR">
                <img src="https://www.menutiger.com/_next/static/media/menu_moblie_view.0f682208.webp?w=750&q=75" 
                     class="h-48 md:h-56 object-contain" alt="Mobile Menu View">
            </div>
            
        </div>

    </div>
</section>

<!-- 9. Templates Collection Section -->
<section class="py-10 bg-white dark:bg-neutral-900">
    <div class="max-w-5xl mx-auto px-4">
        <div class="bg-menutiger-light rounded-3xl p-8 md:p-12 border border-menutiger-green/10 flex flex-col md:flex-row items-center justify-between gap-8">
            <div class="space-y-4 flex-1 text-center md:text-left">
                <h3 class="text-2xl md:text-3xl font-extrabold text-menutiger-dark">
                    Choose from our collection of free customizable templates
                </h3>
                <p class="text-gray-600 text-sm leading-relaxed max-w-xl">
                    Save time on creating menus, posters, table tents, stickers, coasters, A-frames, and more.
                </p>
            </div>
            <div class="flex-shrink-0">
                <a href="{{ route('restaurant_signup') }}" class="btn-menutiger-primary px-6 py-3.5 inline-flex items-center justify-center shadow-sm">
                    View more templates
                </a>
            </div>
        </div>
    </div>
</section>

<!-- 10. Reviews Section -->
<section class="py-10 bg-[#f9fbfc] dark:bg-neutral-900" id="testimonials">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-6">
            <h2 class="text-3xl lg:text-4xl font-extrabold text-menutiger-dark dark:text-teal-400">
                Read our reviews from our satisfied customers
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <!-- Review 1 -->
            <div class="menutiger-card p-8 flex flex-col justify-between items-center text-center space-y-4">
                <img src="https://i.pravatar.cc/150?img=5" class="w-16 h-16 rounded-full object-cover border-2 border-menutiger-green/20" alt="Customer Avatar">
                <div class="space-y-1">
                    <h4 class="font-bold text-gray-800 dark:text-neutral-100 text-lg">Restaurant Owner</h4>
                    <p class="text-xs text-menutiger-green font-medium">Fine Dining Owner</p>
                </div>
                <div class="flex items-center gap-1 text-orange-400 text-sm">
                    <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                </div>
                <p class="text-gray-600 dark:text-neutral-400 text-sm leading-relaxed italic">
                    "We increased our average order size by 20% when we launched our QR code dine-in ordering in our restaurants. It’s very easy to implement, and our customers love fast and convenient ordering."
                </p>
            </div>

            <!-- Review 2 -->
            <div class="menutiger-card p-8 flex flex-col justify-between items-center text-center space-y-4">
                <img src="https://i.pravatar.cc/150?img=15" class="w-16 h-16 rounded-full object-cover border-2 border-menutiger-green/20" alt="Customer Avatar">
                <div class="space-y-1">
                    <h4 class="font-bold text-gray-800 dark:text-neutral-100 text-lg">Head of Marketing</h4>
                    <p class="text-xs text-menutiger-green font-medium">QSR Chain Coordinator</p>
                </div>
                <div class="flex items-center gap-1 text-orange-400 text-sm">
                    <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                </div>
                <p class="text-gray-600 dark:text-neutral-400 text-sm leading-relaxed italic">
                    "I was able to save both money and time… I recommend MENU TIGER to those who have restaurants and small food businesses. Two thumbs up for coming up with a helpful online tool."
                </p>
            </div>

            <!-- Review 3 -->
            <div class="menutiger-card p-8 flex flex-col justify-between items-center text-center space-y-4">
                <img src="https://i.pravatar.cc/150?img=20" class="w-16 h-16 rounded-full object-cover border-2 border-menutiger-green/20" alt="Customer Avatar">
                <div class="space-y-1">
                    <h4 class="font-bold text-gray-800 dark:text-neutral-100 text-lg">General Manager</h4>
                    <p class="text-xs text-menutiger-green font-medium">Hotel F&B Director</p>
                </div>
                <div class="flex items-center gap-1 text-orange-400 text-sm">
                    <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                </div>
                <p class="text-gray-600 dark:text-neutral-400 text-sm leading-relaxed italic">
                    "I recommend MENU TIGER for anyone looking to expand their restaurant business and add a digital edge. It's easy, user-friendly, and highly cost-effective."
                </p>
            </div>

        </div>
    </div>
</section>

<!-- 11. Bottom CTA Banner -->
<section class="py-10 bg-[#f9fbfc] dark:bg-neutral-900">
    <div class="max-w-5xl mx-auto px-4">
        <div class="bg-menutiger-dark rounded-3xl p-8 md:p-12 text-white shadow-xl space-y-6 text-center">
            <h4 class="text-xs font-bold tracking-widest text-menutiger-green uppercase">GET STARTED NOW</h4>
            <h2 class="text-3xl md:text-4xl font-extrabold leading-tight">
                Create Your First Digital Menu With Our Online Menu Maker
            </h2>
            <p class="text-sm md:text-base opacity-90 max-w-2xl mx-auto leading-relaxed">
                Design, customize, and publish your menu in minutes. Engage with your customers, streamline orders, and simplify restaurant order management, all in one tool.
            </p>
            <div class="pt-4">
                <a href="{{ route('restaurant_signup') }}" class="btn-menutiger-primary px-8 py-4 text-base inline-flex items-center justify-center shadow-md">
                    GET STARTED FOR FREE
                </a>
            </div>
        </div>
    </div>
</section>

<!-- 12. FAQ Section -->
<section class="py-10 bg-white dark:bg-neutral-800/40" id="user-faqs">
    <div class="max-w-4xl mx-auto px-4">
        <h2 class="text-3xl font-extrabold text-center text-menutiger-dark dark:text-teal-400 mb-6">
            Frequently Asked Questions
        </h2>
        
        <div class="space-y-4">
            
            <!-- Accordion 1 -->
            <div class="menutiger-card p-6" x-data="{ open: false }">
                <button class="w-full flex justify-between items-center font-bold text-lg text-left text-gray-800 dark:text-neutral-200" @click="open = !open">
                    <span>What is an online management system?</span>
                    <span class="text-2xl" x-text="open ? '−' : '+'"></span>
                </button>
                <div class="mt-4 text-sm text-gray-600 dark:text-neutral-400 leading-relaxed border-t border-gray-100 dark:border-neutral-800 pt-4" x-show="open" x-cloak>
                    Online management systems are integrated digital platforms that centralize restaurant operations, including menu design, order processing, sales tracking, and customer engagement. They empower restaurants to improve their operations with efficiency, accuracy, and real-time insights for sustainable growth.
                </div>
            </div>

            <!-- Accordion 2 -->
            <div class="menutiger-card p-6" x-data="{ open: false }">
                <button class="w-full flex justify-between items-center font-bold text-lg text-left text-gray-800 dark:text-neutral-200" @click="open = !open">
                    <span>What are digital menus in an online management system?</span>
                    <span class="text-2xl" x-text="open ? '−' : '+'"></span>
                </button>
                <div class="mt-4 text-sm text-gray-600 dark:text-neutral-400 leading-relaxed border-t border-gray-100 dark:border-neutral-800 pt-4" x-show="open" x-cloak>
                    Digital menus in an online management system are virtual menus accessed through QR codes on phones, tablets, or kiosks. These let guests browse, order, and pay instantly, while restaurants update items, track sales, and manage operations.
                </div>
            </div>

            <!-- Accordion 3 -->
            <div class="menutiger-card p-6" x-data="{ open: false }">
                <button class="w-full flex justify-between items-center font-bold text-lg text-left text-gray-800 dark:text-neutral-200" @click="open = !open">
                    <span>Can a digital menu be saved as a QR code?</span>
                    <span class="text-2xl" x-text="open ? '−' : '+'"></span>
                </button>
                <div class="mt-4 text-sm text-gray-600 dark:text-neutral-400 leading-relaxed border-t border-gray-100 dark:border-neutral-800 pt-4" x-show="open" x-cloak>
                    Absolutely! You can store and save your digital menu as a customized QR code and let your customers scan it via smartphones, iPads, or tablets.
                </div>
            </div>

            <!-- Accordion 4 -->
            <div class="menutiger-card p-6" x-data="{ open: false }">
                <button class="w-full flex justify-between items-center font-bold text-lg text-left text-gray-800 dark:text-neutral-200" @click="open = !open">
                    <span>Are QR code menus free?</span>
                    <span class="text-2xl" x-text="open ? '−' : '+'"></span>
                </button>
                <div class="mt-4 text-sm text-gray-600 dark:text-neutral-400 leading-relaxed border-t border-gray-100 dark:border-neutral-800 pt-4" x-show="open" x-cloak>
                    QR code menus can be free or paid. Free options include static QR codes linking to a PDF or website, but they can't be edited after creation. Paid options, like MENU TIGER restaurant management software, offer dynamic QR codes that allow menu updates, ordering, payments, and analytics. If you need a simple, non-editable QR code, you can create one for free. For more advanced features, a paid solution is required.
                </div>
            </div>

            <!-- Accordion 5 -->
            <div class="menutiger-card p-6" x-data="{ open: false }">
                <button class="w-full flex justify-between items-center font-bold text-lg text-left text-gray-800 dark:text-neutral-200" @click="open = !open">
                    <span>How do I get a QR code for my menu?</span>
                    <span class="text-2xl" x-text="open ? '−' : '+'"></span>
                </button>
                <div class="mt-4 text-sm text-gray-600 dark:text-neutral-400 leading-relaxed border-t border-gray-100 dark:border-neutral-800 pt-4" x-show="open" x-cloak>
                    You can get a QR code for your menu in three simple steps: Create or Upload Your Menu - Use a website, Google Drive, or a digital menu platform like MENU TIGER. Generate a QR Code - Use a free QR code generator for a static link or a paid service for a dynamic, editable QR code. Print & Display It - Download the QR code, print it on table tents, menus, or posters, and place it where customers can scan easily.
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
