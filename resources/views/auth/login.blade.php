<x-layout>
    <x-nav-link />
    <section>
        <div class="px-8 py-24 mx-auto md:px-12 lg:px-32 max-w-7xl">
            <div class="grid items-center gap-12 lg:grid-cols-2 lg:gap-24">
                <div class="flex flex-col">
                    <h1 class="text-4xl font-semibold tracking-tighter text-gray-900 lg:text-5xl">
                        Discord
                        <span class="text-gray-600">chat</span>
                    </h1>
                    <p class="mt-4 text-base font-medium text-gray-500 text-pretty">
                        Access your account and chat with your friends through the best chat on the internet.
                    </p>
                </div>
                <x-form.container>
                    <x-form.form method='POST' action='/login'>
                        <div class="space-y-3">
                            <div>
                                <x-form.label for='email'>Email</x-form.label>
                                <x-form.input name='email' type='email' placeholder='Your email' required />
                                <x-form.error name='email' />

                            </div>
                            <div class="col-span-full">
                                <x-form.label for='password'>Password</x-form.label>
                                <x-form.input name='password' placeholder='Type password here...' type='password'
                                    required />
                                <x-form.error name='password' />
                            </div>
                            <div class="col-span-full">
                                <x-form.button>Sign in</x-form.button>
                            </div>
                        </div>

                        <div class="mt-6">
                            <p class="flex mx-auto text-sm font-medium leading-tight text-center text-black">
                                Not have accont?
                                <x-link href='/register'>Sign up now</x-link>
                            </p>
                        </div>
                    </x-form.form>
                </x-form.container>
            </div>
        </div>
    </section>

</x-layout>
