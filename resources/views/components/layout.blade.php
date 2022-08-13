<!doctype html>
<title>Store App</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <img src="/images/logo.svg" alt="logo" width="165" height="16">
                </a>
            </div>

            <div class="mt-4 text-center md:mt-0">
                <a href="/all" class="text-xs font-bold uppercase">All stores</a>
            </div>
            <div class="text-center md:mt-0">
                <a href="/items" class="text-xs font-bold uppercase">All items</a>
            </div>
            <div class="text-center md:mt-0">
                <a href="/test" class="text-xs font-bold uppercase">Test</a>
            </div>
            <div class="text-center md:mt-0">
                <a href="/" class="text-xs font-bold uppercase">Home Page</a>
            </div>
        </nav>

        {{ $slot }}

    </section>
</body>
