@extends('layouts.app')

@section('content')
    <section class="w-full bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                <img class="max-w-[15rem] mr-2" src="{{ asset('assets/img/chitlara-logo.png') }}" alt="logo">
            </a>
            <div
                class="w-full bg-white rounded-lg shadow-lg border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 border-gray-400 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="transition text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        {{ __('auth.password_recovery') }}
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="{{ route('forgot.password.send') }}" method="POST">
                        @csrf
                        <div>
                            <div class="flex justify-start items-start">
                                <label for="email"
                                       class="transition block mb-2 text-sm font-medium text-gray-900 dark:text-white @error('email') text-red-600 dark:text-red-500 @enderror">{{ __('auth.email') }}
                                    &nbsp;</label>
                                <svg class="w-2 h-2 text-red-800 dark:text-red-600" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                     viewBox="0 0 24 24">
                                    <path
                                        d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"/>
                                </svg>
                            </div>
                            <input type="email" name="email" id="email" value="{{ old('email') }}"
                                   class="transition bg-gray-50 border border-gray-400 text-gray-900 sm:text-sm rounded-lg focus:ring-purple-600 focus:border-purple-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500 @error('email') border-red-500 dark:border-red-500 @enderror"
                                   placeholder="name@company.com" required>
                            @error('email')
                            <span class="mt-2 text-sm text-red-600 dark:text-red-500 font-medium">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-purple-800 dark:text-purple-500" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                 viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M10 11h2v5m-2 0h4m-2.592-8.5h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                            <p class="transition text-sm font-bold leading-tight tracking-tight text-gray-900 dark:text-white">
                                {{ __('auth.send_link') }}
                            </p>
                        </div>

                        <button type="submit"
                                class="w-full transition focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 my-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">
                            {{ __('auth.send') }}
                        </button>


                    </form>
                </div>
            </div>

            <a href="{{ route('login') }}"
               class="transition py-2.5 px-5 me-2 mt-5 text-sm font-medium text-gray-900 focus:outline-none bg-gray-50 rounded-lg border border-gray-400 hover:bg-gray-200 hover:text-gray-800 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">{{ __('auth.back') }}</a>
        </div>
    </section>
@endsection
