<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>To-Do App | Aesthetic Workspace</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Outfit', sans-serif; }
    </style>
</head>
<body class="bg-[#faf8ff] text-[#4a3f69] min-h-screen flex flex-col selection:bg-[#d6bcfa] selection:text-[#322659] relative overflow-hidden">

    <!-- Soft Decorative Blobs -->
    <div class="absolute top-[-10%] left-[-5%] w-[40rem] h-[40rem] bg-[#f3e8ff] rounded-full mix-blend-multiply filter blur-3xl opacity-50 pointer-events-none"></div>
    <div class="absolute bottom-[-10%] right-[-5%] w-[30rem] h-[30rem] bg-[#fce7f3] rounded-full mix-blend-multiply filter blur-3xl opacity-50 pointer-events-none"></div>

    <!-- Navigation -->
    <nav class="relative z-10 py-6 px-8 flex justify-between items-center max-w-6xl mx-auto w-full">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-full bg-gradient-to-br from-[#b794f4] to-[#9f7aea] flex items-center justify-center text-white shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            <span class="text-xl font-bold text-[#553c9a] tracking-tight">DoIt.</span>
        </div>
        <a href="/dashboard" class="text-sm font-medium text-[#805ad5] bg-[#faf5ff] px-5 py-2.5 rounded-full hover:bg-[#ebd8ff] transition-all duration-300">
            Buka Workspace
        </a>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow flex items-center justify-center relative z-10 px-6 py-12">
        <div class="max-w-3xl text-center space-y-8">
            <span class="inline-block px-4 py-1.5 rounded-full bg-[#f3e8ff] text-[#805ad5] text-xs font-semibold tracking-wider shadow-sm border border-[#e9d8fd]">
                ✨ PROYEK KELOMPOK MID WEB 2
            </span>
            
            <h1 class="text-5xl md:text-7xl font-extrabold text-[#322659] leading-[1.1] tracking-tight">
                Rapikan Tugasmu, <br />
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#805ad5] to-[#d53f8c]">Tenangkan Pikiranmu.</span>
            </h1>
            
            <p class="text-xl text-[#71668f] max-w-xl mx-auto font-light leading-relaxed">
                Platform sederhana untuk mencatat dan melacak setiap progres kuliahmu. Tampilan rapi, fokus terjaga.
            </p>
            
            <div class="pt-4">
                <a href="/dashboard" class="inline-flex items-center justify-center gap-2 px-10 py-4 text-lg font-medium text-white bg-[#805ad5] rounded-full hover:bg-[#6b46c1] hover:shadow-[0_8px_30px_rgb(128,90,213,0.3)] hover:-translate-y-0.5 transition-all duration-300">
                    Mulai Mencatat
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>
        </div>
    </main>

</body>
</html>
