<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TO.NEWS</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-white text-gray-900">

    <!-- Header -->
    <header class="bg-black text-white px-6 py-3 flex justify-between items-center">
        <h1 class="text-xl font-bold">TO.<span class="text-orange-500">NEWS</span></h1>

        <!-- Hamburger button (mobile) -->
        <button id="menu-toggle" class="block md:hidden focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>

        <!-- Navigation menu -->
        <nav id="menu" class="hidden md:flex space-x-6 text-xs font-medium absolute top-full left-0 w-full bg-black md:static md:w-auto md:bg-transparent md:flex-row md:space-x-6 md:items-center">
            <a href="#" class="block px-4 py-2 hover:underline">NEWS</a>
            <a href="#" class="block px-4 py-2 hover:underline">WATCH</a>
            <a href="#" class="block px-4 py-2 hover:underline">LISTEN</a>
            <a href="#" class="block px-4 py-2 hover:underline">LIVE TV</a>
        </nav>
    </header>

    <!-- Breaking News -->
    <div class="bg-red-100 px-6 py-1.5 text-xs text-red-600">
        <span class="font-medium">Breaking News:</span>
        Stay ahead with the latest business insights, comprehensive analysis, real-time updates on breaking news, and in-depth coverage of current market trends.
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 py-4">
        <!-- Featured Article Section -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
            <!-- Main Featured Article -->
            <div class="lg:col-span-2">
                @if(isset($headlines[0]))
                <div>
                    <div class="relative">
                        <img src="{{ $headlines[0]['urlToImage'] }}" alt="{{ $headlines[0]['title'] }}" class="w-full h-[300px] object-cover">
                    </div>
                    <div class="py-3">
                        <h2 class="text-lg font-bold leading-tight mb-2">{{ $headlines[0]['title'] }}</h2>
                        <a href="{{ $headlines[0]['url'] }}" target="_blank" class="text-orange-500 text-xs font-medium hover:underline">Read More</a>
                    </div>
                </div>
                @endif
            </div>

            <!-- Side News -->
            <div class="space-y-3">
                @for($i = 1; $i <= 3; $i++)
                    @if(isset($headlines[$i]))
                    <div class="flex gap-3">
                        <img src="{{ $headlines[$i]['urlToImage'] }}" alt="{{ $headlines[$i]['title'] }}" class="w-28 h-20 object-cover">
                        <div>
                            <h3 class="text-xs font-semibold mb-1">{{ $headlines[$i]['title'] }}</h3>
                            <p class="text-[10px] text-gray-500 mb-1">Small subtitle text to accompany headline, describing the key points of the article in a concise manner.</p>
                            <div class="flex items-center justify-between w-full">
                                <a href="{{ $headlines[$i]['url'] }}" target="_blank" class="text-orange-500 text-[10px] font-medium hover:underline">Read More</a>
                                <span class="text-[10px] text-gray-400">5 minutes</span>
                            </div>
                        </div>
                    </div>
                    @endif
                @endfor
            </div>
        </div>

        <!-- Trending News Section -->
<div class="mt-10 mb-10">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-base font-bold">Trending News</h2>
        <a href="#" class="text-xs text-orange-500 font-medium">See More →</a>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
        @php
            $minutesValues = [10, 15, 20];
        @endphp

        @foreach($trending as $index => $news)
            <div>
                @if(!empty($news['urlToImage']))
                    <img src="{{ $news['urlToImage'] }}" alt="{{ $news['title'] }}" class="w-full h-40 object-cover mb-2">
                @endif
                <h3 class="text-xs font-semibold mb-1">{{ $news['title'] }}</h3>
                <p class="text-[10px] text-gray-500 mb-1">{{ Str::limit($news['description'] ?? 'No description available', 100) }}</p>
                <div class="flex items-center justify-between w-full">
                    <a href="{{ $news['url'] }}" target="_blank" class="text-orange-500 text-[10px] font-medium hover:underline">Read More</a>
                    <span class="text-[10px] text-gray-400">{{ $minutesValues[$index % 3] }} minutes</span>
                </div>
            </div>
        @endforeach
    </div>
</div>



<!-- Latest News Section -->
<div class="mb-10">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-base font-bold">Latest News</h2>
        <a href="#" class="text-xs text-orange-500 font-medium">See More →</a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        @for($i = 4; $i <= 6; $i++)
            @if(isset($headlines[$i]))
                <div>
                    @if(!empty($headlines[$i]['urlToImage']))
                        <img src="{{ $headlines[$i]['urlToImage'] }}" alt="{{ $headlines[$i]['title'] }}" class="w-full h-40 object-cover mb-2">
                    @endif
                    <h3 class="text-sm font-semibold mb-1">{{ $headlines[$i]['title'] }}</h3>
                    <p class="text-xs text-gray-500 mb-2">{{ Str::limit($headlines[$i]['description'] ?? 'No description available', 100) }}</p>
                    <div class="flex items-center justify-between">
                        <a href="{{ $headlines[$i]['url'] }}" target="_blank" class="text-orange-500 text-xs font-medium hover:underline">Read More</a>
                        <span class="text-xs text-gray-400">5 minutes</span>
                    </div>
                </div>
            @endif
        @endfor
    </div>

    
<section class="mt-16 px-4 py-10 bg-gradient-to-r from-zinc-900 to-black rounded-2xl text-white">
    <div class="max-w-5xl mx-auto text-center">
        <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold leading-tight">
            LATEST UPDATES ON <br>
            <span class="text-orange-500">NATIONAL GLOBAL NEWS</span>
        </h2>
        <p class="mt-4 text-gray-300 text-sm sm:text-base">
            DELIVERING REAL-TIME UPDATES AND THE LATEST HEADLINES DAILY.
        </p>

        <div class="mt-6 flex justify-center">
            <div class="relative w-full max-w-md">
                <input
                    type="text"
                    placeholder="Find the topic you want now!"
                    class="w-full py-3 pl-5 pr-12 rounded-lg bg-zinc-800 text-sm text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-orange-500"
                />
                <button class="absolute right-3 top-1/2 -translate-y-1/2 text-orange-500 hover:text-orange-600">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M21 20l-4.35-4.35a8 8 0 1 0-1.41 1.41L20 21zM10 16a6 6 0 1 1 0-12 6 6 0 0 1 0 12z"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</section>

    @if(isset($headlines[7]))
    <!-- Large Featured Article -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center mt-16">
        <div>
            @if(!empty($headlines[7]['urlToImage']))
                <img src="{{ $headlines[7]['urlToImage'] }}" alt="{{ $headlines[7]['title'] }}" class="w-full h-56 object-cover rounded">
            @endif
        </div>
        <div>
            <h2 class="text-lg font-bold mb-2">{{ $headlines[7]['title'] }}</h2>
            <p class="text-sm text-gray-600 mb-4">{{ Str::limit($headlines[7]['description'] ?? 'No description available', 250) }}</p>
            <div class="flex items-center justify-between">
                <a href="{{ $headlines[7]['url'] }}" target="_blank" class="text-orange-500 text-sm font-medium hover:underline">Read More</a>
                <span class="text-xs text-gray-400">6 minutes</span>
            </div>
        </div>
    </div>
    @endif
</div>


<footer class="bg-black text-white px-8 md:px-20 py-12">
    <div class="grid grid-cols-1 md:grid-cols-5 gap-8 mb-8">
        <!-- Logo and Description -->
        <div>
            <h2 class="text-xl font-bold"><span class="text-orange-500">TO</span>.NEWS</h2>
            <p class="text-sm mt-2">"Stay Informed, Stay Ahead with Breaking News and In-Depth Insights."</p>
            <div class="flex space-x-4 mt-4 text-gray-400">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>

        <!-- Contact -->
        <div>
            <h3 class="text-base font-semibold mb-2">Contact</h3>
            <ul class="text-sm space-y-1 text-gray-400">
                <li><a href="#">Email</a></li>
                <li><a href="#">Phone</a></li>
                <li><a href="#">Address</a></li>
                <li><a href="#">Call center</a></li>
            </ul>
        </div>

        <!-- Service -->
        <div>
            <h3 class="text-base font-semibold mb-2">Service</h3>
            <ul class="text-sm space-y-1 text-gray-400">
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">Shipping & Returns</a></li>
                <li><a href="#">Warranty</a></li>
            </ul>
        </div>

        <!-- Events -->
        <div>
            <h3 class="text-base font-semibold mb-2">Events</h3>
            <ul class="text-sm space-y-1 text-gray-400">
                <li><a href="#">Summer 2023</a></li>
                <li><a href="#">Spring 2023</a></li>
                <li><a href="#">NYFW 2023</a></li>
                <li><a href="#">PFW 2023</a></li>
            </ul>
        </div>

        <!-- Follow Us -->
        <div>
            <h3 class="text-base font-semibold mb-2">Follow Us</h3>
            <ul class="text-sm space-y-1 text-gray-400">
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Instagram</a></li>
                <li><a href="#">Pinterest</a></li>
                <li><a href="#">Twitter</a></li>
            </ul>
        </div>
    </div>

    <!-- Bottom Footer -->
    <div class="flex flex-col md:flex-row justify-between items-center border-t border-gray-700 pt-6 text-sm text-gray-500">
        <p>All rights reserved © 2024</p>
        <div class="flex items-center gap-4 mt-2 md:mt-0">
            <span><i class="fas fa-phone"></i> +1 234 - 567 - 890</span>
            <span><i class="fas fa-map-marker-alt"></i> California, USA</span>
        </div>
    </div>
</footer>



</body>
</html>
