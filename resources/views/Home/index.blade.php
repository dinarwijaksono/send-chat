<!DOCTYPE html>
<html lang="en" data-theme="sunset">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Send chat</title>
    <link rel="stylesheet" href="/tailwind/style.css">
</head>

<body>

    <nav class="navbar bg-slate-700">
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

    <div class="flex gap-1">
        <aside class="basis-3/12 p-2">

            <section class="mb-2 p-2">
                <input type="text" placeholder="Cari" class="input input-bordered w-full" />
            </section>

            <section class="flex p-2 bg-slate-600 rounded-md mb-2">
                <div class="avatar placeholder">
                    <div class="bg-neutral text-neutral-content w-14 h-14 rounded-full">
                        <span>D</span>
                    </div>
                </div>

                <div class="p-2 text-slate-100">
                    <h1 class="font-bold">Andi</h1>
                </div>
            </section>

            <section class="flex p-2 bg-yellow-600 rounded-md mb-2">
                <div class="avatar placeholder">
                    <div class="bg-neutral text-neutral-content w-14 h-14 rounded-full">
                        <span>D</span>
                    </div>
                </div>

                <div class="p-2 text-slate-100">
                    <h1 class="font-bold">Andi</h1>
                </div>
            </section>

        </aside>

        <main class="basis-9/12 ">

            <section class="flex p-2 border-b border-l border-slate-600">

                <div class="avatar placeholder">
                    <div class="bg-neutral text-neutral-content w-14 h-14 rounded-full">
                        <span>D</span>
                    </div>
                </div>

                <div class="p-2 text-slate-100">
                    <h1 class="font-bold">Andi</h1>
                </div>

            </section>

            <section class="py-2 px-8">
                <section class="flex">
                    <div class="bg-success text-gray-800 mb-2 p-2 rounded-xl w-10/12">
                        <div>
                            <h1 class="text-lg font-bold">Lorem, ipsum.</h1>
                        </div>

                        <div class="pl-8">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
                        </div>

                        <div class="text-right text-xs">
                            08:10, 12 Maret 2024
                        </div>
                    </div>
                </section>

                <section class="flex justify-end">
                    <div class="bg-info text-gray-800 mb-2 p-2 rounded-xl w-10/12">
                        <div>
                            <h1 class="text-lg font-bold">Lorem, ipsum.</h1>
                        </div>

                        <div class="pl-8">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
                        </div>

                        <div class="text-right text-xs">
                            08:10, 12 Maret 2024
                        </div>
                    </div>
                </section>
            </section>

            <section class="p-2 flex gap-2">
                <div class="basis-11/12">
                    <textarea class="textarea textarea-accent w-full" placeholder="Ketik disini...."></textarea>
                </div>

                <div>
                    <button class="btn btn-sm btn-primary w-full">Kirim</button>
                </div>
            </section>

        </main>
    </div>

</body>

</html>
