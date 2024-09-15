@extends('layouts.app')

@section('content')
<div class="bg-gray-50 text-gray-800 font-sans text-sm">
    <header>
        <nav class="navbar navbar-expand-lg bg-white shadow-sm py-4 px-8">
            <a class="flex items-center text-lg font-medium mr-8" href="#">
                <img class="mr-3" src="./images/icon-money.svg" alt="Money Icon">
                <span>Dashboard</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto flex space-x-6 border-l pl-4">
                    <li class="nav-item active">
                        <a class="nav-link text-gray-700 hover:text-blue-600" href="#">Summary</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-gray-700 hover:text-blue-600" href="#">Activity</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-gray-700 hover:text-blue-600" href="#">Send & Request</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-gray-700 hover:text-blue-600" href="#">Wallet</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-gray-700 hover:text-blue-600" href="#">Offers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-gray-700 hover:text-blue-600" href="#">Help</a>
                    </li>
                </ul>
                <div class="flex space-x-4">
                    <button class="p-0 border-none bg-none">
                        <img src="./images/icon-settings.svg" alt="Settings Icon">
                    </button>
                    <button class="p-0 border-none bg-none">
                        <img src="./images/icon-notifications.svg" alt="Notifications Icon">
                    </button>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <section class="bg-white border-b py-8">
            <div class="container mx-auto flex justify-between">
                <div class="flex items-start">
                    <svg class="mr-6" xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 80 80">
                        <!-- SVG content -->
                    </svg>
                    <div>
                        <h1 class="text-2xl font-normal mb-2">Hi there, Frederick!</h1>
                        <div class="mb-3">
                            <select class="custom-select border-gray-300 shadow-sm text-sm">
                                <option selected>Spend Your Money!</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="flex space-x-6">
                    <button class="flex flex-col items-center">
                        <img class="mb-2" src="./images/icon-money.svg" alt="Money Icon">
                        <span class="text-sm">Send money</span>
                    </button>
                    <button class="flex flex-col items-center">
                        <img class="mb-2" src="./images/icon-cart.svg" alt="Cart Icon">
                        <span class="text-sm">Shopping deals</span>
                    </button>
                </div>
            </div>
        </section>
        <section class="py-8">
            <div class="container mx-auto">
                <div class="grid grid-cols-12 gap-8">
                    <div class="col-span-4">
                        <div class="bg-white shadow-sm rounded mb-8">
                            <div class="border-b p-6">
                                <div class="text-xs uppercase text-gray-500 mb-2">Payment Balance</div>
                                <h3 class="text-2xl font-light">$52,100.00</h3>
                                <a class="text-gray-500 hover:text-gray-600" href="#">Details →</a>
                            </div>
                            <div class="p-6">
                                <div class="text-xs uppercase text-gray-500 mb-4">Available Currencies</div>
                                <dl class="grid grid-cols-2 gap-4">
                                    <div>
                                        <dt>US Dollars</dt>
                                        <dd class="text-right">32,220.00 USD</dd>
                                    </div>
                                    <div>
                                        <dt>British Pounds</dt>
                                        <dd class="text-right">8,560.00 GBP</dd>
                                    </div>
                                    <div>
                                        <dt>Czech Koruna</dt>
                                        <dd class="text-right">98,444.00 CZK</dd>
                                    </div>
                                </dl>
                                <hr class="my-6 border-t">
                                <ul class="list-none space-y-2">
                                    <li><a class="text-blue-600 hover:underline" href="#">Add Money →</a></li>
                                    <li><a class="text-blue-600 hover:underline" href="#">Top Up →</a></li>
                                    <li><a class="text-blue-600 hover:underline" href="#">Add funds using PayBuddy →</a></li>
                                    <li><a class="text-blue-600 hover:underline" href="#">Withdraw funds →</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="bg-white shadow-sm rounded">
                            <div class="p-6">
                                <div class="text-xs uppercase text-gray-500 mb-4">Bank accounts and cards</div>
                                <ul class="space-y-4">
                                    <li class="flex items-center">
                                        <img class="mr-4" src="./images/icon-bank-of-america.svg" alt="Bank of America">
                                        <span>Bank of America x-9966</span>
                                    </li>
                                    <li class="flex items-center">
                                        <img class="mr-4" src="./images/icon-mastercard.svg" alt="MasterCard">
                                        <span>MasterCard x-1144</span>
                                    </li>
                                </ul>
                                <hr class="my-6 border-t">
                                <a class="text-blue-600 hover:underline" href="#">Add a Bank Account or Card →</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-8">
                        <div class="bg-blue-600 text-white p-4 mb-8 flex items-start">
                            <img class="mr-4" src="./images/icon-alert.svg" alt="Alert Icon">
                            <span>Your latest transaction may take a few minutes to show up in your activity.</span>
                        </div>
                        <!-- Pending and Completed Cards -->
                        <div class="bg-white shadow-sm rounded mb-8">
                            <div class="border-b p-6">
                                <h3 class="text-lg font-medium">Pending</h3>
                                <a class="text-gray-500 hover:text-gray-600" href="#">See all →</a>
                            </div>
                            <ul class="divide-y">
                                <li class="p-6 flex justify-between">
                                    <div>
                                        <span class="block text-2xl font-light">28</span>
                                        <span class="text-xs uppercase text-gray-500">Jul</span>
                                    </div>
                                    <div>
                                        <h4 class="font-medium">Bank of America</h4>
                                        <p class="text-gray-500 text-sm">Withdraw to bank account</p>
                                    </div>
                                    <div class="text-right">
                                        <span class="text-green-500 font-medium">+250.00</span>
                                        <span class="block text-xs text-gray-500">USD</span>
                                    </div>
                                </li>
                                <!-- Additional items can follow similar structure -->
                            </ul>
                        </div>
                        <!-- Completed Transactions Card -->
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
@endsection
