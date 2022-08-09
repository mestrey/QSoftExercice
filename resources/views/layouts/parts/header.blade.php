<header class="bg-white">
    <div class="border-b">
        <div class="container mx-auto block sm:flex sm:justify-between sm:items-center py-4 px-4 sm:px-0 space-y-4 sm:space-y-0">
            <div class="flex justify-center">
                <a href="{{ route('homepage') }}" class="inline-block sm:inline hover:opacity-75">
                    <img src="{{ asset('images/logo.png') }}" width="222" height="30" alt="">
                </a>
            </div>
            <div>
                <ul class="flex justify-center sm:justify-end items-center space-x-8 text-sm">
                    <li>
                        <a class="text-gray-500 hover:text-orange" href="authorized.html">
                            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block text-orange h-4 w-4" fill="currentColor" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Регистрация
                        </a>
                    </li>
                    <li>
                        <a class="text-gray-500 hover:text-orange" href="form.html">
                            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block text-orange h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                            </svg>
                            Авторизация
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="border-b">
        <div class="container mx-auto block lg:flex justify-between items-center px-2 sm:px-0">
            <form name="search_form" class="bg-gray-100 rounded-full flex items-center px-3 text-sm order-2 my-4 lg:my-0">
                <label for="search-input" class="hidden"></label>
                <input id="search-input" type="text" placeholder="Поиск по сайту" class="bg-gray-100 rounded-full py-1 px-1 focus:outline-none placeholder-opacity-50 flex-1 border-none focus:shadow-none focus:ring-0">
                <button type="submit" class="group focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-black group-hover:text-orange h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </form>

            <x-panels.categories />
        </div>
    </div>
</header>