<!DOCTYPE html>
<html lang="en" data-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Send chat</title>
    <link rel="stylesheet" href="/tailwind/style.css">
</head>

<body>

    <nav class="navbar bg-slate-700 h-14 fixed z-50">
        <div class="flex-1">
            <a class="btn btn-ghost text-xl">Send Chat</a>
        </div>
        <div class="flex-none">
            <ul class="menu menu-horizontal px-2">
                <li class="mr-2"><a>Dinar Wijaksono</a></li>
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
        <main class="md:basis-6/12 sm:basis-full bg-slate-500 p-2">

            <section class="mb-2">
                <label class="input input-bordered flex items-center gap-2">
                    <input type="text" class="grow rounded-xl input-sm" placeholder="Search" />
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                        class="h-4 w-4 opacity-70">
                        <path fill-rule="evenodd"
                            d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                            clip-rule="evenodd" />
                    </svg>
                </label>
            </section>

            @for ($i = 0; $i < 10; $i++)
                <a href="">
                    <section class="rounded-xl p-4 bg-base-100 w-full mb-2 shadow-xl">
                        <h2 class="font-bold text-lg text-slate-200">
                            Andi Subagja <div class="badge badge-accent">{{ $i + 3 }}</div>
                        </h2>

                        <div class="text-right">
                            <div class="text-sm text-slate-200">12 Maret 2024</div>
                        </div>

                        <p class="pl-8 text-sky-500">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illo
                            hic
                            praesentium
                            dolorem. Illum omnis nostrum perferendis tenetur quidem eaque est.</p>

                    </section>
                </a>
            @endfor

            <section class="fixed bottom-5 right-5">
                <a class="btn btn-primary shadow-lg">Buat</a>
            </section>

        </main>
    </div>

</body>

</html>
