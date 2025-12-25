@extends('Layout.app')

@section('content')
    <div class="min-h-screen grid grid-cols-[120px_1fr] grid-rows-[100px_1fr]">
            
            <aside class="bg-white shadow px-4 row-span-2 space-y-10 text-center">
                <div class="flex flex-col p-5 justify-between min-h-screen">
                    <div class="flex flex-col gap-y-10">
                        <div class="py-3 flex justify-center">
                            <div class="bg-black rounded-full p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.712 4.33a9.027 9.027 0 0 1 1.652 1.306c.51.51.944 1.064 1.306 1.652M16.712 4.33l-3.448 4.138m3.448-4.138a9.014 9.014 0 0 0-9.424 0M19.67 7.288l-4.138 3.448m4.138-3.448a9.014 9.014 0 0 1 0 9.424m-4.138-5.976a3.736 3.736 0 0 0-.88-1.388 3.737 3.737 0 0 0-1.388-.88m2.268 2.268a3.765 3.765 0 0 1 0 2.528m-2.268-4.796a3.765 3.765 0 0 0-2.528 0m4.796 4.796c-.181.506-.475.982-.88 1.388a3.736 3.736 0 0 1-1.388.88m2.268-2.268 4.138 3.448m0 0a9.027 9.027 0 0 1-1.306 1.652c-.51.51-1.064.944-1.652 1.306m0 0-3.448-4.138m3.448 4.138a9.014 9.014 0 0 1-9.424 0m5.976-4.138a3.765 3.765 0 0 1-2.528 0m0 0a3.736 3.736 0 0 1-1.388-.88 3.737 3.737 0 0 1-.88-1.388m2.268 2.268L7.288 19.67m0 0a9.024 9.024 0 0 1-1.652-1.306 9.027 9.027 0 0 1-1.306-1.652m0 0 4.138-3.448M4.33 16.712a9.014 9.014 0 0 1 0-9.424m4.138 5.976a3.765 3.765 0 0 1 0-2.528m0 0c.181-.506.475-.982.88-1.388a3.736 3.736 0 0 1 1.388-.88m-2.268 2.268L4.33 7.288m6.406 1.18L7.288 4.33m0 0a9.024 9.024 0 0 0-1.652 1.306A9.025 9.025 0 0 0 4.33 7.288" />
                                </svg>
                            </div>
                        </div>

                        <ul class="space-y-5">
                            <li class="flex justify-center">
                                <a href="{{ route('dashboard.index') }}"
                                class="hover:text-white hover:bg-black text-black p-2 rounded-2xl border">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                    </svg>
                                </a>
                            </li>

                            <li class="flex justify-center">
                                <a href="{{ route('product.index') }}"
                                class="hover:text-white hover:bg-black text-black p-2 rounded-2xl border">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                    

                    <ul class="space-y-10">
                            <li class="flex justify-center">
                                <a href="#" 
                                class="hover:text-white hover:bg-black text-black p-2 rounded-2xl border">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" />
                                    </svg>
                                </a>
                            </li>

                            <li class="flex justify-center">
                                <form action="{{ route('logout.store') }}" method="POST"> 
                                    @csrf
                                    <button type="submit" onclick="return confirm('Are you sure want to leave ?')"
                                    class="hover:text-white hover:bg-black text-black p-2 rounded-2xl border">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                                        </svg>
                                    </button>
                                </form>
                            </li>
                        </ul>
                </div>
                
                
            </aside>

            <nav class="bg-white shadow flex justify-between py-5 px-3 items-center ">
                <div class="flex gap-x-2 items-center ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                    </svg>
                    <h2 class="font-semibold text-xl">Order Products</h2>
                </div>

                <div class="flex gap-x-2">
                    <input type="text" class="bg-gray-100 py-1 px-2 w-[300px] border outline-none">
                    <div class="bg-gray-100 py-1 px-2 border text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                        </svg>
                    </div>
                    <div class="bg-gray-100 py-1 px-2 border">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                        </svg>
                    </div>
                </div>
                
            </nav>

            <main class="bg-white shadow rounded-xl mt-5 pt-5 px-10 flex flex-col gap-y-5 ml-5">
                <div class="flex justify-between items-center">
                    <div class="flex flex-col gap-y-2">
                        <h2 class="font-semibold text-xl">Select Products</h2>
                        <p class="text-gray-300">Lorem ipsum dolor sit amet.</p>
                    </div>

                    <div class="space-x-2">
                        <input type="text" class="bg-gray-100 py-2 px-3 rounded outline-none" placeholder="Search Products">
                        <a href="" class="bg-black text-white py-2 px-3 rounded">Scan Barcode</a>
                    </div>
                </div>

                <div class="shadow p-0.5">
                    <div class="shadow flex text-center">
                        <h3 class="border font-semibold w-full p-2">All Products</h3>
                        <h3 class="border font-semibold w-full p-2">Foods</h3>
                        <h3 class="border font-semibold w-full p-2">Beverages</h3>
                        <h3 class="border font-semibold w-full p-2">Electronic</h3>
                        <h3 class="border font-semibold w-full p-2" >All Products</h3>
                    </div>
                </div>

                <div class="grid md:grid-cols-3 lg:grid-cols-4 gap-x-5 gap-y-10">
                    @forelse ($products as $product)
                        <a href="{{ route('product.detail', $product->id) }}" 
                            class="bg-gray-100 cursor-pointer p-5 text-center shadow transform duration-300 hover:scale-105">
                            <div class="flex flex-col gap-y-4">
                                @if ($product->image)
                                    <img src="{{ asset('storage/' . $product->image)  }}"
                                    class="object-center object-cover w-[200px] h-[200px] mx-auto">
                                @endif
                                
                                <p class=" text-black font-semibold">{{ $product->name }}</p> 
                            </div>  
                        </a>
                    @empty
                        <div class="col-span-4">
                            <p class="text-gray-500 italic">Belum ada produk dibuat.</p>
                        </div>
                    @endforelse
                </div>
            </main>
        </div>
@endsection