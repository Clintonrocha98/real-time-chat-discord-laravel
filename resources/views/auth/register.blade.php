<x-layout>
    <x-nav-link />
    <section>
        <div class="px-8 py-20 mx-auto md:px-12 lg:px-32 max-w-7xl">
            <div class="grid items-center gap-12 lg:grid-cols-2 lg:gap-24">
                <div class="flex flex-col">
                    <h1 class="text-4xl font-semibold tracking-tighter text-gray-900 lg:text-5xl">
                        Discord
                        <span class="text-gray-600">chat</span>
                    </h1>
                    <p class="mt-4 text-base font-medium text-gray-500 text-pretty">
                        Create an account on the best chat on the internet.
                    </p>
                </div>
                <x-form.container>
                    <x-form.form method='POST' action='/register'>
                        <div class="space-y-3">
                            <x-form.label for='name'>Name</x-form.label>
                            <x-form.input name='name' placeholder='Your name' required />
                            <x-form.error name='name' />

                            <x-form.label for='email'>Email</x-form.label>
                            <x-form.input name='email' placeholder='example@email.com' type='email' required />
                            <x-form.error name='email' />

                            <x-form.label for='password'>Password</x-form.label>
                            <x-form.input name='password' type='password' required />
                            <x-form.error name='password' />


                            <x-form.label for='password'>Password confirmation</x-form.label>
                            <x-form.input name='password_confirmation' type='password' required />
                            <x-form.error name='password' />

                            <div class="col-span-full">
                                <x-form.button>Create</x-form.button>
                            </div>
                        </div>

                    </x-form.form>
                </x-form.container>
            </div>
        </div>
    </section>

</x-layout>
