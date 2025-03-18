<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    @vite('resources/css/app.css') <!-- Tailwind CSSが使われている場合 -->
</head>
<body class="antialiased">
    <div class="min-h-screen bg-gray-100 flex flex-col justify-center items-center py-6 sm:px-6 lg:px-8">
        @if (Route::has('login'))
            <div class="absolute top-0 right-0 p-6">
                @auth
                    <!-- ログイン中 -->
                    
                    <form action="{{ route('logout') }}" method="POST" class="inline-block ml-4">
                        @csrf
                        <button type="submit" class="text-blue-500">Logout</button>
                    </form>
                @endauth
            </div>
        @endif

        <div class="text-center mt-20"> <!-- mt-20で上部に余白を追加 -->
            <h1 class="text-3xl font-bold text-gray-800">Welcome to the website!</h1>
        
            @guest
                <!-- ログインまたは新規登録を促す -->
                <div class="mt-10"> <!-- 余白をさらに増やす -->
                    <a href="{{ route('login') }}" class="inline-block bg-blue-500 text-black py-2 px-4 rounded-md mt-6">Login</a>
                    <a href="{{ route('register') }}" class="inline-block bg-green-500 text-black py-2 px-4 rounded-md ml-4 mt-6">Register</a>
                </div>
            @endguest
        </div>
    </div>
</body>
</html>
