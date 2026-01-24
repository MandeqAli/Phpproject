<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pharmacy Website</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100 text-slate-900">

    <!-- NAVBAR -->
    <nav class="bg-white shadow fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-extrabold text-emerald-600">PharmacyStore</h1>
            <ul class="hidden md:flex space-x-6 font-medium">
                <li><a class="hover:text-emerald-600" href="{{ route('home') }}">Home</a></li>
                <li><a class="hover:text-emerald-600" href="{{ route('product') }}">Products</a></li>
                <li><a class="hover:text-emerald-600" href="{{ route('about') }}">About</a></li>
                <li><a class="hover:text-emerald-600" href="{{ route('contact') }}">Contact</a></li>
            </ul>
            <a href="{{ route('contact') }}"
                class="bg-gray-900 text-white rounded-full px-6 py-2 hover:bg-gray-800 transition-colors duration-300 inline-block">
                Get Started
            </a>
        </div>
    </nav>

    <!-- HERO -->
    <!-- HERO SECTION -->
    <section class="pt-24 bg-gradient-to-r-from-emerald-600-to-emerald-500 text-slate-900">
        <div class="max-w-7xl mx-auto px-6 py-16 grid md:grid-cols-2 items-center gap-10">

            <!-- TEXT -->
            <div>
                <h2 class="text-4xl md:text-5xl font-extrabold leading-tight">
                    Your Trusted Online Pharmacy
                </h2>

                <p class="mt-4 text-slate-800 text-lg">
                    Fast delivery • Genuine medicine • 24/7 Support
                </p>

                <p class="mt-3 text-slate-800 text-sm max-w-md">
                    We provide certified medicines, professional pharmacist guidance,
                    and quick delivery right to your doorstep.
                </p>

                <div class="mt-6 flex gap-4">
                    <a href="{{ route(name: 'product') }}"
                        class="bg-white text-emerald-600 px-6 py-3 rounded-lg font-semibold shadow">
                        Shop Now
                    </a>

                    <a href="#"
                        class="border border-white px-6 py-3 rounded-lg font-semibold">
                        Contact Us
                    </a>
                </div>
            </div>

            <!-- IMAGE URL -->
            <div class="text-center">
                <img src="https://i.pinimg.com/736x/03/be/92/03be92b4b8f06f7e19124cdac4bf1b85.jpg"
                    class="w-full max-w-md mx-auto drop-shadow-2xl rounded-xl"
                    alt="Online Pharmacy">

            </div>

        </div>
    </section>


    <!-- SERVICES -->
    <section class="py-16">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h3 class="text-3xl font-extrabold">Our Services</h3>
            <div class="grid md:grid-cols-3 gap-8 mt-10">

                <div class="bg-white p-6 rounded-2xl shadow hover:shadow-xl transition">
                    <div class="text-4xl">💊</div>
                    <h4 class="font-bold mt-3">Quality Medicines</h4>
                    <p class="text-slate-500 text-sm mt-2">We provide genuine certified medicines.</p>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow hover:shadow-xl transition">
                    <div class="text-4xl">🚚</div>
                    <h4 class="font-bold mt-3">Fast Delivery</h4>
                    <p class="text-slate-500 text-sm mt-2">Quick delivery across the city.</p>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow hover:shadow-xl transition">
                    <div class="text-4xl">📞</div>
                    <h4 class="font-bold mt-3">24/7 Support</h4>
                    <p class="text-slate-500 text-sm mt-2">Always ready to help you.</p>
                </div>

            </div>
        </div>
    </section>

    <!-- OUR TEAM -->
    <section class="py-16 bg-slate-100">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h3 class="text-3xl font-extrabold">Our Professional Team</h3>

            <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-8 mt-10">

                <div class="bg-white p-6 rounded-3xl shadow hover:shadow-xl transition">
                    <img src="https://i.pravatar.cc/150?img=12" class="w-24 h-24 mx-auto rounded-full border-4 border-emerald-500 object-cover">
                    <h4 class="mt-4 font-bold">Dr. Ahmed Ali</h4>
                    <p class="text-sm text-slate-500">Chief Pharmacist</p>
                </div>

                <div class="bg-white p-6 rounded-3xl shadow hover:shadow-xl transition">
                    <img src="https://i.pravatar.cc/150?img=32" class="w-24 h-24 mx-auto rounded-full border-4 border-emerald-500 object-cover">
                    <h4 class="mt-4 font-bold">Dr. Amina Yusuf</h4>
                    <p class="text-sm text-slate-500">Senior Pharmacist</p>
                </div>

                <div class="bg-white p-6 rounded-3xl shadow hover:shadow-xl transition">
                    <img src="https://i.pravatar.cc/150?img=56" class="w-24 h-24 mx-auto rounded-full border-4 border-emerald-500 object-cover">
                    <h4 class="mt-4 font-bold">Dr. Hassan Noor</h4>
                    <p class="text-sm text-slate-500">Assistant Pharmacist</p>
                </div>

            </div>
        </div>
    </section>

    <!-- STATS -->
    <section class="py-16">
        <div class=" max-w-6xl mx-auto px-6 grid md:grid-cols-3 gap-6 text-center">

            <div class="bg-emerald-600 text-white p-6 rounded-2xl">
                <h4 class="text-3xl font-bold">10K+</h4>
                <p>Happy Customers</p>
            </div>

            <div class="bg-indigo-600 text-white p-6 rounded-2xl">
                <h4 class="text-3xl font-bold">500+</h4>
                <p>Products</p>
            </div>

            <div class="bg-rose-600 text-white p-6 rounded-2xl">
                <h4 class="text-3xl font-bold">24/7</h4>
                <p>Support</p>
            </div>

        </div>
    </section>

    <!-- TESTIMONIAL -->
    <section class="py-16 bg-slate-100">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h3 class="text-3xl font-extrabold">What Customers Say</h3>
            <div class="bg-white mt-8 p-6 rounded-2xl shadow">
                <p class="text-slate-600 italic">
                    "Fast delivery and genuine medicines. Highly recommended!"
                </p>
                <h4 class="mt-4 font-bold">— Mohamed Hussein</h4>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-16 bg-gradient-to-r-from-emerald-600 to-emerald-500 text-white text-center">
        <h3 class="text-3xl font-extrabold text-slate-950">Need Medicine Now?</h3>
        <p class="mt-2 text-slate-900">Order online and get fast delivery</p>
        <button class="mt-6 bg-white text-emerald-600 px-6 py-3 rounded-lg font-semibold">
            Shop Now
        </button>
    </section>

    <!-- FOOTER -->
    <footer class="bg-[#f9fbff] text-slate-950 py-10">
        <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-3 gap-6">

            <div>
                <h4 class="text-black font-bold text-lg">PharmaCare</h4>
                <p class="text-sm mt-2">Your trusted pharmacy solution.</p>
            </div>

            <div>
                <h4 class="text-slate-950 font-bold text-lg">Quick Links</h4>
                <ul class="text-sm mt-2 space-y-1">
                    <li>Home</li>
                    <li>About</li>
                    <li>Services</li>
                    <li>Contact</li>
                </ul>
            </div>

            <div>
                <h4 class="text-black font-bold text-lg">Contact</h4>
                <p class="text-sm mt-2">Mogadishu, Somalia</p>
                <p class="text-sm">+252 61xxxxxxx</p>
            </div>

        </div>
    </footer>

</body>

</html>