<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List | Tugas Kolaborasi</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #9d4edd; /* Warna ungu dari desain */
            --primary-hover: #7b2cbf;
            --bg-gradient-start: #d4e2ff;
            --bg-gradient-end: #fbdff1;
            --text-dark: #1f2937;
            --text-gray: #6b7280;
            --card-bg: rgba(255, 255, 255, 0.7);
            --border-radius: 24px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            background: linear-gradient(135deg, var(--bg-gradient-start) 0%, var(--bg-gradient-end) 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 450px;
        }

        .card {
            background: var(--card-bg);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: var(--border-radius);
            padding: 40px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.6);
            text-align: center;
        }

        .icon-container {
            width: 60px;
            height: 60px;
            background: white;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px auto;
            box-shadow: 0 4px 10px rgba(0,0,0,0.03);
        }

        .icon-container svg {
            width: 28px;
            height: 28px;
            stroke: var(--primary);
        }

        h1 {
            color: var(--text-dark);
            font-size: 28px;
            font-weight: 800;
            margin-bottom: 8px;
            letter-spacing: -0.5px;
        }

        p.subtitle {
            color: var(--text-gray);
            font-size: 14px;
            margin-bottom: 30px;
        }

        .form-group {
            text-align: left;
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            color: var(--text-dark);
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .form-group input {
            width: 100%;
            padding: 14px 16px;
            border-radius: 12px;
            border: none;
            background: rgba(255, 255, 255, 0.9);
            font-size: 15px;
            color: var(--text-dark);
            outline: none;
            transition: all 0.3s ease;
            box-shadow: inset 0 2px 4px rgba(0,0,0,0.02);
        }

        .form-group input:focus {
            box-shadow: 0 0 0 2px var(--primary);
        }

        .form-group input::placeholder {
            color: #9ca3af;
        }

        button.btn-submit {
            width: 100%;
            background: var(--primary);
            color: white;
            border: none;
            padding: 16px;
            border-radius: 14px;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        button.btn-submit:hover {
            background: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(157, 78, 221, 0.3);
        }

        button.btn-submit svg {
            width: 20px;
            height: 20px;
        }

        /* Styling Read & Delete Features (Bagian Tugasmu) */
        .task-list {
            margin-top: 30px;
            list-style: none;
            text-align: left;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .task-item {
            background: white;
            padding: 14px 16px;
            border-radius: 14px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 8px rgba(0,0,0,0.02);
            transition: all 0.2s ease;
            border: 1px solid rgba(0,0,0,0.03);
        }

        .task-item:hover {
            transform: scale(1.02);
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .task-name {
            font-size: 15px;
            color: var(--text-dark);
            font-weight: 600;
            word-break: break-word;
        }

        .btn-delete {
            background: #fee2e2;
            color: #ef4444;
            border: none;
            width: 36px;
            height: 36px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s ease;
            flex-shrink: 0;
            margin-left: 10px;
        }

        .btn-delete:hover {
            background: #fecaca;
            color: #dc2626;
            transform: scale(1.05);
        }

        .empty-state {
            text-align: center;
            color: var(--text-gray);
            font-size: 14px;
            margin-top: 20px;
            padding: 16px;
            background: rgba(255,255,255,0.5);
            border-radius: 12px;
            font-weight: 500;
        }

        .footer-text {
            text-align: center;
            margin-top: 24px;
            color: var(--text-gray);
            font-size: 13px;
            font-weight: 600;
        }
        
        .alert-success {
            background: #dcfce7;
            color: #166534;
            padding: 12px;
            border-radius: 12px;
            margin-top: 20px;
            font-size: 14px;
            font-weight: 600;
            animation: fadeIn 0.3s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-5px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="card">
            <!-- Icon Checklist -->
            <div class="icon-container">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                </svg>
            </div>
            
            <h1>To-Do List</h1>
            <p class="subtitle">Apa yang ingin kamu capai hari ini?</p>

            <!-- Form Create (Fitur Temanmu) -->
            <!-- Temanmu bisa menambahkan route action="/tasks" atau yang sesuai nanti -->
            <form action="/tasks" method="POST">
                @csrf
                <div class="form-group">
                    <label for="task_name">Nama Task Baru</label>
                    <input type="text" id="task_name" name="task_name" placeholder="Cth: Belajar UI/UX Design..." required autocomplete="off">
                </div>
                <button type="submit" class="btn-submit">
                    Tambah Task
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                      <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 9a.75.75 0 00-1.5 0v2.25H9a.75.75 0 000 1.5h2.25V15a.75.75 0 001.5 0v-2.25H15a.75.75 0 000-1.5h-2.25V9z" clip-rule="evenodd" />
                    </svg>
                </button>
            </form>

            <!-- Menampilkan Data Read & Delete (Tugas Kamu) -->
            @if(session('success'))
                <div class="alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($tasks->isNotEmpty())
                <ul class="task-list">
                    @foreach ($tasks as $tugas)
                        <li class="task-item">
                            <span class="task-name">{{ $tugas->task_name }}</span>
                            
                            <!-- Form Delete -->
                            <form action="/tasks/{{ $tugas->id }}" method="POST" style="margin: 0;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete" title="Hapus Tugas" onclick="return confirm('Apakah kamu yakin ingin menghapus tugas ini?')">
                                    <!-- Icon Trash -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width: 18px; height: 18px;">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="empty-state">
                    Belum ada tugas saat ini. Ayo tambahkan tugas barumu!
                </div>
            @endif
        </div>

        <p class="footer-text">Tugas Kolaborasi • Fitur Read & Delete</p>
    </div>

</body>
</html>