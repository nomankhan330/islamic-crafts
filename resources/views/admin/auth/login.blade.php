<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login — Islamic Crafts</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,500;0,600;1,500;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #FAF4ED; }
        .font-serif-lux { font-family: 'Cormorant Garamond', serif; }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4 bg-gradient-to-b from-[#F7EFE6] to-[#FAF4ED]">

    <div class="max-w-md w-full bg-[#FAF4ED] border border-[#E8DACB] rounded-3xl p-8 sm:p-10 shadow-xl shadow-[#4A301A]/5 relative">
        
        <!-- Brand Logo & Header -->
        <div class="text-center mb-8">
            <div class="flex justify-center mb-3">
                <svg class="w-12 h-12 text-[#7D5838]" viewBox="0 0 100 100" fill="none" stroke="currentColor">
                    <path d="M50 48 C42 36 24 24 16 34 C8 44 20 60 40 53 C46 51 49 48 50 48 Z" stroke-width="4.5" stroke-linecap="round"/>
                    <path d="M50 48 C58 36 76 24 84 34 C92 44 80 60 60 53 C54 51 51 48 50 48 Z" stroke-width="4.5" stroke-linecap="round"/>
                    <circle cx="50" cy="48" r="5" fill="#7D5838"/>
                    <path d="M47 53 C43 68 33 82 22 90 M53 53 C57 68 67 82 78 90" stroke-width="4" stroke-linecap="round"/>
                </svg>
            </div>
            <h1 class="font-serif-lux text-3xl font-semibold italic text-[#52351E]">Islamic Crafts</h1>
            <p class="text-xs text-[#8A6749] tracking-widest uppercase mt-1">Admin Portal Access</p>
        </div>

        @if(session('error'))
            <div class="bg-rose-50 border border-rose-200 text-rose-800 text-xs rounded-xl p-3 mb-5">
                {{ session('error') }}
            </div>
        @endif
        @if(session('success'))
            <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs rounded-xl p-3 mb-5">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-xs font-semibold text-[#52351E] mb-1.5">Email Address</label>
                <input type="email" name="email" value="{{ old('email', 'admin@islamiccrafts.com') }}" required 
                    class="w-full bg-[#F5ECE1] border border-[#DFCBB7] rounded-xl px-4 py-2.5 text-sm text-[#432C19] outline-none focus:border-[#6B4B32] focus:ring-1 focus:ring-[#6B4B32]">
                @error('email')
                    <p class="text-rose-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-xs font-semibold text-[#52351E] mb-1.5">Password</label>
                <input type="password" name="password" value="admin123" required 
                    class="w-full bg-[#F5ECE1] border border-[#DFCBB7] rounded-xl px-4 py-2.5 text-sm text-[#432C19] outline-none focus:border-[#6B4B32] focus:ring-1 focus:ring-[#6B4B32]">
                @error('password')
                    <p class="text-rose-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between text-xs pt-1">
                <label class="flex items-center space-x-2 text-[#7A5A3E] cursor-pointer">
                    <input type="checkbox" name="remember" class="rounded border-[#DFCBB7] text-[#6B4B32] focus:ring-[#6B4B32]">
                    <span>Remember me</span>
                </label>
            </div>

            <button type="submit" class="w-full bg-[#6B4B32] hover:bg-[#573C27] text-white py-3 rounded-xl text-sm font-semibold tracking-wide transition-colors mt-2 shadow-sm">
                Login to Dashboard →
            </button>
        </form>

        <!-- Credentials hint pill -->
        <div class="mt-6 pt-5 border-t border-[#E8DACB] text-center">
            <p class="text-[11px] text-[#8A6749]">Default Admin Login:</p>
            <p class="text-xs font-mono bg-[#F2E5D5] py-1.5 px-3 rounded-lg text-[#52351E] mt-1 inline-block">
                admin@islamiccrafts.com / admin123
            </p>
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('home') }}" class="text-xs text-[#7A5A3E] hover:text-[#52351E] transition-colors">
                ← Back to Islamic Crafts Store
            </a>
        </div>

    </div>

</body>
</html>
