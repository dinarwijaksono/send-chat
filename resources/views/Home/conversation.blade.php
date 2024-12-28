@extends('./layouts/main')

@section('mainSection')
    <main class="md:basis-6/12 sm:basis-full bg-slate-500 relative">

        <section class="bg-base-300 py-2 px-4 flex">
            <div class="avatar placeholder basis-1/12">
                <div class="bg-neutral text-neutral-content w-12 rounded-full">
                    <span>AB</span>
                </div>
            </div>

            <div class="py-2 px-4 basis-9/12">
                <h1><a href="" class="btn btn-link btn-sm">Damayanti</a></h1>
            </div>

            <div class="py-2 px-4 basis-2/12">
                <a href="/" class="btn btn-sm w-full btn-info text-base-100">Kembali</a>
            </div>
        </section>

        <section class="py-2 px-4 max-h-96 overflow-scroll">

            <div class="w-full flex justify-normal">
                <section class="rounded-xl p-4 bg-base-100 mb-2 shadow-xl w-9/12">
                    <h2 class="font-bold text-lg text-slate-200">Andi Subagja </h2>

                    <p class="pl-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illo
                        hic
                        praesentium
                        dolorem. Illum omnis nostrum perferendis tenetur quidem eaque est.</p>

                    <div class="text-right">
                        <div class="text-sm text-slate-200">12 Maret 2024</div>
                    </div>
                </section>
            </div>

            @for ($i = 0; $i < 10; $i++)
                <div class="w-full flex justify-end">
                    <section class="rounded-xl p-4 bg-green-800 mb-2 shadow-xl w-9/12">
                        <h2 class="font-bold text-lg text-slate-200">Andi Subagja </h2>

                        <p class="pl-4 ">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illo
                            hic
                            praesentium
                            dolorem. Illum omnis nostrum perferendis tenetur quidem eaque est.</p>

                        <div class="text-right">
                            <div class="text-sm text-slate-200">12 Maret 2024</div>
                        </div>
                    </section>
                </div>
            @endfor

        </section>

        <section class="px-4 py-2 bg-base-300 flex gap-2">

            <div class="basis-10/12">
                <textarea class="textarea textarea-primary w-full" rows="1" placeholder="Tulis sesuatu"></textarea>
            </div>

            <div class="basis-2/12">
                <button class="btn btn-primary w-full">Kirim</button>
            </div>

        </section>

    </main>
@endsection
