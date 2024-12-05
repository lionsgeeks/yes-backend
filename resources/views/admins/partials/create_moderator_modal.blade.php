<dialog id="addModeratorAdmin">
    <div class="w-screen h-screen flex items-center justify-center fixed inset-0 bg-black/50  md:grid lg:grid md:place-items-center lg:place-items-center z-10">
        <div class="bg-white rounded h-[55%] w-[90%] md:w-[30vw] lg:h-[48%] shadow-md pt-1.5 pb-4">
            <div class="flex justify-between py-[1.25rem] px-8 border-b border-gray-100">
                <h1 class="capitalize text-2xl font-bold">Add new Admin</h1>

                <button type="reset" onclick="addModeratorAdmin.close()">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.75"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <form class="px-8 pt-[0.5rem]" action="{{ route("admins.store") }}" method="POST">
                @csrf
                <!-- First & Last Name -->
                <div class="mt-[0.75rem] flex flex-col gap-1">
                        <label class="font-medium" for="full_name">First Name</label>
                        <input class="rounded-lg" name="name" placeholder="Full Name..." id="full_name" type="text" required>
                </div>

                <!-- Email -->
                <div class="mt-[0.75rem] flex-1 flex flex-col gap-1">
                    <label class="font-medium" for="email">Email</label>
                    <input class="rounded-lg" name="email" id="email" type="email" placeholder="Email..." required>
                </div>

                

                <div class="mt-6 flex justify-end gap-3">
                    <button type="reset" onclick="addModeratorAdmin.close()"
                        class="text-alpha px-[2.75rem] py-[0.5rem] rounded-xl font-bold uppercase">
                        cancel
                    </button>
                    <button type="submit"
                        class="bg-alpha text-white px-[2.75rem] py-[0.5rem] rounded-xl font-medium uppercase">
                        confirm
                    </button>
                </div>

            </form>
        </div>
</dialog>
