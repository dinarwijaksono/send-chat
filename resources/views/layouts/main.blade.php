<!DOCTYPE html>
<html lang="en" data-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Send chat</title>
    <link rel="stylesheet" href="/tailwind/style.css">

    <!-- Styles -->
    @livewireStyles
</head>

<body>

    <nav class="navbar bg-slate-700 h-14 fixed z-50">
        <div class="flex-1">
            <a class="btn btn-ghost text-xl">Send Chat</a>
        </div>
        <div class="flex-none">
            <ul class="menu menu-horizontal px-2">
                <li class="mr-2"><a>{{ auth()->user()->name }}</a></li>
                <form action="/logout" method="post">
                    <li>
                        @csrf
                        <button type="submit" class="btn btn-error btn-sm">Logout</button>
                    </li>
                </form>
            </ul>
        </div>
    </nav>

    <div class="flex justify-center pt-16">

        @yield('mainSection')

    </div>

    @livewireScripts
</body>

</html>
