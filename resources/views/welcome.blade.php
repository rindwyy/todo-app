<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modern To-Do List</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Outfit', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Outfit', sans-serif;
        }
        .glass-panel {
            background: rgba(255, 255, 255, 0.4);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.6);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.05);
        }
        .glass-input {
            background: rgba(255, 255, 255, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.4);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .glass-input:focus {
            background: rgba(255, 255, 255, 0.95);
            border-color: rgba(255, 255, 255, 1);
            box-shadow: 0 0 0 4px rgba(255, 255, 255, 0.3);
            outline: none;
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-200 via-purple-200 to-pink-200 flex items-center justify-center p-4 antialiased selection:bg-purple-500 selection:text-white">

    <div class="w-full max-w-md">
        <!-- Main Card -->
        <div class="glass-panel rounded-3xl p-8 md:p-10 relative overflow-hidden">
            <!-- Decorative blur elements -->
            <div class="absolute top-0 right-0 -mr-16 -mt-16 w-32 h-32 rounded-full bg-white opacity-20 blur-2xl"></div>
            <div class="absolute bottom-0 left-0 -ml-16 -mb-16 w-32 h-32 rounded-full bg-white opacity-20 blur-2xl"></div>

            <div class="relative z-10">
                <!-- Header -->
                <div class="text-center mb-10">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-white/40 mb-4 shadow-inner border border-white/50 backdrop-blur-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                        </svg>
                    </div>
                    <h1 class="text-4xl font-bold text-slate-800 tracking-tight mb-2">To-Do List</h1>
                    <p class="text-slate-600 text-lg font-medium">Apa yang ingin kamu capai hari ini?</p>
                </div>

                <!-- Success Alert -->
                @if(session('success'))
                    <div class="mb-8 p-4 rounded-xl bg-green-100/80 backdrop-blur-md border border-green-200 text-green-800 flex items-center gap-3 animate-[pulse_0.5s_ease-in-out]">
                        <div class="bg-green-200/50 p-1.5 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <span class="font-medium tracking-wide">{{ session('success') }}</span>
                    </div>
                @endif

                <!-- Form -->
                <form action="/tasks" method="POST" class="space-y-6">
                    @csrf
                    
                    <div>
                        <label for="task_name" class="block text-slate-700 text-sm font-semibold mb-2 ml-1 tracking-wide">Nama Task Baru</label>
                        <div class="relative group">
                            <input 
                                type="text" 
                                name="task_name" 
                                id="task_name" 
                                class="w-full glass-input text-gray-800 placeholder-gray-500/70 rounded-2xl px-5 py-4 text-lg font-medium focus:ring-0"
                                placeholder="Cth: Belajar UI/UX Design..." 
                                required
                            >
                        </div>
                    </div>

                    <button 
                        type="submit" 
                        class="w-full group relative flex items-center justify-center gap-3 overflow-hidden rounded-2xl bg-purple-600 px-8 py-4 text-white font-bold text-lg transition-all duration-300 hover:bg-purple-700 hover:scale-[1.02] hover:shadow-[0_8px_30px_rgba(147,51,234,0.3)] active:scale-95"
                    >
                        <span>Tambah Task</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 transition-transform duration-300 group-hover:translate-x-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
        
        <!-- Footer Info -->
        <p class="text-center text-slate-500 text-sm mt-8 font-medium tracking-wide">
            Tugas Kolaborasi &bull; Fitur Create
        </p>
    </div>

</body>
</html>
