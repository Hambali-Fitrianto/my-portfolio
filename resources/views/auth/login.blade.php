<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Portfolio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        dark: '#050505',
                        accent: '#3b82f6',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>

    <style>
        body {
            background-color: #050505;
            background-image:
                radial-gradient(circle at 20% 35%, rgba(59, 130, 246, 0.05) 0%, transparent 40%),
                radial-gradient(circle at 80% 65%, rgba(59, 130, 246, 0.05) 0%, transparent 40%);
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.02);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }

        .input-field {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }

        .input-field:focus {
            border-color: #3b82f6;
            background: rgba(255, 255, 255, 0.05);
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        }
    </style>
</head>

<body class="text-gray-300 antialiased h-screen flex items-center justify-center p-6">

    <div class="w-full max-w-md">
        <!-- Logo Area -->
        <div class="text-center mb-10">
            <div class="inline-block p-4 rounded-2xl bg-blue-500/10 text-accent mb-4">
                <i class="fas fa-shield-halved text-3xl"></i>
            </div>
            <h1 class="text-2xl font-extrabold text-white tracking-tight">Admin Gate</h1>
            <p class="text-gray-500 text-sm mt-2">Silakan masuk untuk mengelola portofolio.</p>
        </div>

        <!-- Login Card -->
        <div class="glass-card p-8 rounded-3xl">
            <form action="{{ route('login.process') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Email Field -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-widest text-gray-500 mb-2 ml-1">Email Address</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-500">
                            <i class="fas fa-envelope text-sm"></i>
                        </span>
                        <input type="email" name="email" required
                            class="input-field w-full pl-11 pr-4 py-3 rounded-xl text-white placeholder-gray-600 focus:outline-none"
                            placeholder="admin@gmail.com">
                    </div>
                </div>

                <!-- Password Field -->
                <div>
                    <div class="flex justify-between mb-2 ml-1">
                        <label class="block text-xs font-bold uppercase tracking-widest text-gray-500">Password</label>
                    </div>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-500">
                            <i class="fas fa-lock text-sm"></i>
                        </span>
                        <input type="password" name="password" required
                            class="input-field w-full pl-11 pr-4 py-3 rounded-xl text-white placeholder-gray-600 focus:outline-none"
                            placeholder="••••••••">
                    </div>
                </div>

                <!-- Remember Me -->
                <div class="flex items-center">
                    <input type="checkbox" id="remember" class="w-4 h-4 rounded border-gray-800 bg-dark text-accent focus:ring-accent/20">
                    <label for="remember" class="ml-2 text-sm text-gray-500 select-none">Ingat perangkat ini</label>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full bg-white text-black font-bold py-3 rounded-xl hover:bg-blue-500 hover:text-white transition-all duration-300 transform active:scale-[0.98]">
                    Masuk Sekarang
                </button>
            </form>
        </div>

        <!-- Footer -->
        <p class="text-center mt-8 text-gray-600 text-xs tracking-widest uppercase">
            &copy; {{ date('Y') }} - All Rights Reserved
        </p>
    </div>

</body>

</html>