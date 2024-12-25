<section @class([
    'fixed top-28 z-50 w-full justify-center flex',
    'hidden' => $hide,
])>
    <div class="bg-base-300 basis-11/12 md:basis-7/12 p-4 rounded-xl shadow shadow-black relative">
        <form method="dialog">
            <button wire:click="doHide" class="btn btn-sm btn-circle btn-ghost absolute right-3 top-3">✕</button>
        </form>

        <h3 class="text-lg mb-4 font-bold text-center">Buat pesan</h3>

        @if ($message)
            <div role="alert" class="alert alert-error mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ $message }}</span>
            </div>
        @endif

        <label class="form-control w-full mb-2">
            <div class="label">
                <span class="label-text">Kirim ke</span>
            </div>
            <input type="text" wire:model="receivedEmail" placeholder="Email..."
                class="input input-sm input-bordered w-full" />
            @error('receivedEmail')
                <div class="label">
                    <span class="label-text-alt text-error italic">{{ $message }}</span>
                </div>
            @enderror
        </label>

        <label class="form-control w-full mb-2">
            <div class="label">
                <span class="label-text">Text</span>
            </div>
            <input type="text" wire:model="content" placeholder="Ucapkan sesuatu"
                class="input input-sm input-bordered w-full" />
            @error('content')
                <div class="label">
                    <span class="label-text-alt text-error italic">{{ $message }}</span>
                </div>
            @enderror
        </label>

        <div class="flex justify-end gap-2">
            <div class="basis-2/12">
                <button type="button" wire:click="save"
                    class="btn btn-sm btn-primary
                    w-full">Kirim</button>
            </div>
        </div>

    </div>

</section>
