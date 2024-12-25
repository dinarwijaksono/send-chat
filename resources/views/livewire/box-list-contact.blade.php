<main class="md:basis-6/12 sm:basis-full bg-slate-500 p-2">

    <section class="mb-2">
        <label class="input input-bordered flex items-center gap-2">
            <input type="text" class="grow rounded-xl input-sm" placeholder="Search" />
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="h-4 w-4 opacity-70">
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
        <button type="button" wire:click="doShowModalCreateConversation"
            class="btn btn-primary shadow-lg">Buat</button>
    </section>

</main>
