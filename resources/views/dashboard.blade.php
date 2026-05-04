<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Workspace - DoIt.</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Outfit', sans-serif; }
        
        .soft-card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.8);
            box-shadow: 0 10px 40px rgba(128, 90, 213, 0.05);
        }
        
        .soft-input {
            background: rgba(255, 255, 255, 0.8);
            border: 1px solid rgba(233, 216, 253, 0.6);
            transition: all 0.3s ease;
        }
        
        .soft-input:focus {
            background: #ffffff;
            border-color: #b794f4;
            box-shadow: 0 0 0 3px rgba(183, 148, 244, 0.2);
            outline: none;
        }
    </style>
</head>
<body class="bg-[#faf8ff] text-[#4a3f69] min-h-screen relative selection:bg-[#d6bcfa] selection:text-[#322659] pb-12">

    <!-- Decorative Soft Blobs -->
    <div class="fixed top-[-5%] left-[-5%] w-[30rem] h-[30rem] bg-[#f3e8ff] rounded-full mix-blend-multiply filter blur-3xl opacity-60 pointer-events-none -z-10"></div>
    <div class="fixed bottom-[-5%] right-[-5%] w-[40rem] h-[40rem] bg-[#fce7f3] rounded-full mix-blend-multiply filter blur-3xl opacity-40 pointer-events-none -z-10"></div>

    <!-- Top Navigation -->
    <nav class="w-full pt-8 pb-4 px-6 relative z-10 max-w-6xl mx-auto">
        <div class="flex justify-between items-center bg-white/60 backdrop-blur-md px-6 py-4 rounded-3xl border border-white/60 shadow-[0_4px_20px_rgb(0,0,0,0.02)]">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-[#b794f4] to-[#9f7aea] flex items-center justify-center text-white shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <h1 class="text-2xl font-bold text-[#553c9a] tracking-tight">DoIt.</h1>
            </div>
            <a href="/" class="text-sm font-semibold text-[#805ad5] hover:text-[#553c9a] flex items-center gap-1.5 transition-colors bg-[#f3e8ff] px-4 py-2 rounded-full hover:bg-[#e9d8fd]">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali
            </a>
        </div>
    </nav>

    <!-- Main Workspace -->
    <main class="max-w-6xl mx-auto w-full px-6 py-4 relative z-10">
        
        <!-- Alerts -->
        @if(session('success'))
            <div class="mb-6 p-4 rounded-2xl bg-[#f0fff4] border border-[#c6f6d5] text-[#2f855a] flex items-center gap-3 shadow-sm">
                <div class="bg-[#c6f6d5] p-1.5 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#276749]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            
            <!-- Left Column: Form -->
            <div class="lg:col-span-4">
                <div class="soft-card rounded-3xl p-7">
                    <div class="mb-6">
                        <h2 class="text-xl font-bold text-[#322659]">Tugas Baru</h2>
                        <p class="text-sm text-[#71668f] mt-1">Apa fokusmu selanjutnya?</p>
                    </div>
                    
                    <form action="/tasks" method="POST" class="space-y-5">
                        @csrf
                        
                        <div>
                            <label for="task_name" class="block text-sm font-semibold text-[#553c9a] mb-2">Nama Tugas</label>
                            <input type="text" name="task_name" id="task_name" class="w-full soft-input rounded-2xl px-5 py-3.5 text-[#322659] placeholder-[#a0aec0]" placeholder="Cth: Kerjakan Revisi Laporan" required>
                        </div>

                        <div>
                            <label for="deadline" class="block text-sm font-semibold text-[#553c9a] mb-2">Deadline (Opsional)</label>
                            <input type="date" name="deadline" id="deadline" class="w-full soft-input rounded-2xl px-5 py-3.5 text-[#322659]">
                        </div>

                        <div>
                            <label for="note" class="block text-sm font-semibold text-[#553c9a] mb-2">Catatan Tambahan</label>
                            <textarea name="note" id="note" rows="3" class="w-full soft-input rounded-2xl px-5 py-3.5 text-[#322659] placeholder-[#a0aec0] resize-none" placeholder="Tulis rincian jika perlu..."></textarea>
                        </div>

                        <button type="submit" class="w-full bg-[#805ad5] hover:bg-[#6b46c1] text-white font-bold py-4 rounded-2xl transition-all duration-300 shadow-[0_4px_14px_0_rgba(128,90,213,0.39)] hover:shadow-[0_6px_20px_rgba(128,90,213,0.23)] hover:-translate-y-0.5 mt-2 flex items-center justify-center gap-2">
                            <span>Tambahkan</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Right Column: Task List -->
            <div class="lg:col-span-8">
                <div class="soft-card rounded-3xl p-7 min-h-[500px] flex flex-col">
                    
                    <!-- Header List -->
                    <div class="flex justify-between items-end mb-6 pb-4 border-b border-[#e9d8fd]">
                        <div>
                            <h2 class="text-xl font-bold text-[#322659]">Daftar Pekerjaan</h2>
                            <p class="text-sm text-[#71668f] mt-1">Jangan ditunda-tunda ya!</p>
                        </div>
                        <div class="bg-[#faf5ff] text-[#805ad5] px-4 py-1.5 rounded-full text-sm font-bold border border-[#e9d8fd]">
                            {{ $tasks->count() }} Tugas
                        </div>
                    </div>

                    <!-- Tasks -->
                    <div class="flex-grow">
                        @if($tasks->isEmpty())
                            <div class="h-full flex flex-col items-center justify-center text-center opacity-60 py-20">
                                <div class="w-24 h-24 bg-[#e9d8fd] rounded-full flex items-center justify-center mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-[#805ad5]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                    </svg>
                                </div>
                                <p class="text-lg font-medium text-[#553c9a]">Ruang kerjamu masih kosong.</p>
                                <p class="text-[#71668f]">Ayo mulai dengan menambahkan satu tugas.</p>
                            </div>
                        @else
                            <ul class="space-y-4">
                                @foreach($tasks as $tugas)
                                    <li class="group bg-white rounded-2xl p-5 border border-[#e9d8fd] shadow-sm hover:shadow-md hover:border-[#d6bcfa] transition-all duration-300 flex justify-between items-start gap-4 relative overflow-hidden">
                                        
                                        <!-- Deco strip left -->
                                        <div class="absolute left-0 top-0 bottom-0 w-1 bg-gradient-to-b from-[#b794f4] to-[#ed64a6] opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                        
                                        <div class="flex-grow pl-2">
                                            <div class="flex items-start justify-between mb-1">
                                                <h3 class="text-lg font-bold text-[#322659]">{{ $tugas->task_name }}</h3>
                                                
                                                @if($tugas->deadline)
                                                    <span class="inline-flex items-center gap-1.5 text-[#dd6b20] bg-[#feebc8] px-2.5 py-1 rounded-md text-xs font-bold whitespace-nowrap">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                        </svg>
                                                        {{ \Carbon\Carbon::parse($tugas->deadline)->format('d M Y') }}
                                                    </span>
                                                @endif
                                            </div>
                                            
                                            @if($tugas->note)
                                                <p class="text-sm text-[#71668f] mt-2 leading-relaxed bg-[#faf8ff] p-3 rounded-xl border border-[#f3e8ff]">
                                                    {{ $tugas->note }}
                                                </p>
                                            @endif
                                        </div>
                                        
                                        <!-- Action -->
                                        <div class="flex-shrink-0 pt-1 pr-2">
                                            <form action="/tasks/{{ $tugas->id }}" method="POST" onsubmit="return confirm('Selesai dengan tugas ini? Yakin mau dihapus?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-[#e53e3e] bg-[#fff5f5] hover:bg-[#fed7d7] p-2.5 rounded-xl transition-colors shadow-sm" title="Selesaikan & Hapus">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </main>

</body>
</html>
