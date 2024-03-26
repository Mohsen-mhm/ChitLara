@extends('layouts.app')

@section('content')
    <section class="w-full bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div
                class="w-full bg-white rounded-lg shadow-lg border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 border-gray-400 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8 flex flex-col justify-center items-center">
                    <div class="success-animation my-6">
                        <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                            <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                            <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                        </svg>
                    </div>

                    <h1 class="transition text-xl text-center font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        {{ __('validation.verify_success') }}
                    </h1>
                    <a href="{{ route('home') }}" class="transition text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        {{ __('validation.continue_to_app') }}
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <style>
            .checkmark {
                width: 100px;
                height: 100px;
                border-radius: 50%;
                display: block;
                stroke-width: 2;
                stroke: #4bb71b;
                stroke-miterlimit: 10;
                box-shadow: inset 0 0 0 #4bb71b;
                animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both;
                position: relative;
                top: 5px;
                right: 5px;
                margin: 0 auto;
            }

            .checkmark__circle {
                stroke-dasharray: 166;
                stroke-dashoffset: 166;
                stroke-width: 2;
                stroke-miterlimit: 10;
                stroke: #4bb71b;
                animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;

            }

            .checkmark__check {
                transform-origin: 50% 50%;
                stroke-dasharray: 48;
                stroke-dashoffset: 48;
                animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards;
            }

            @keyframes stroke {
                100% {
                    stroke-dashoffset: 0;
                }
            }

            @keyframes scale {
                0%, 100% {
                    transform: none;
                }

                50% {
                    transform: scale3d(1.1, 1.1, 1);
                }
            }
        </style>
    </section>
@endsection
