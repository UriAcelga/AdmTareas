<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A ver tailwind..</title>
    <link rel="stylesheet" href="<?= base_url('css/output.css') ?>">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-8">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold">Task Management</h1>
            <div class="flex items-center space-x-2">
                <div class="flex -space-x-2">
                    <img src="https://via.placeholder.com/30" alt="User 1" class="w-8 h-8 rounded-full border-2 border-white">
                    <img src="https://via.placeholder.com/30" alt="User 2" class="w-8 h-8 rounded-full border-2 border-white">
                    <img src="https://via.placeholder.com/30" alt="User 3" class="w-8 h-8 rounded-full border-2 border-white">
                    <img src="https://via.placeholder.com/30" alt="User 4" class="w-8 h-8 rounded-full border-2 border-white">
                </div>
                <div class="w-8 h-8 rounded-full bg-gray-300 flex items-center justify-center font-semibold">A</div>
            </div>
        </div>

        <div class="flex items-center justify-between mb-4">
            <h2 class="text-xl font-semibold">Team Tasks</h2>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">+ New Task</button>
        </div>

        <div class="mb-4">
            <h3 class="text-lg font-semibold">Task Board</h3>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-white rounded-md shadow-sm p-4">
                <h4 class="font-semibold mb-2">Todo</h4>
                <div class="space-y-2">
                    <div class="bg-gray-100 rounded-md p-3">
                        <p class="font-semibold">Design new logo</p>
                        <div class="flex items-center space-x-2 text-sm text-gray-600">
                            <img src="https://via.placeholder.com/20" alt="User" class="w-5 h-5 rounded-full">
                            <span>Low</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V8.25A2.25 2.25 0 015.25 6h13.5A2.25 2.25 0 0121 8.25v10.5M3 3h18M3 15.75h18M6.75 15.75a.75.75 0 00-.75.75V19.5a.75.75 0 00.75.75h10.5a.75.75 0 00.75-.75V16.5a.75.75 0 00-.75-.75H6.75z" />
                            </svg>
                            <span>May 7</span>
                        </div>
                    </div>
                    <div class="bg-gray-100 rounded-md p-3">
                        <p class="font-semibold">Update website</p>
                        <div class="flex items-center space-x-2 text-sm text-gray-600">
                            <img src="https://via.placeholder.com/20" alt="User" class="w-5 h-5 rounded-full">
                            <img src="https://via.placeholder.com/20" alt="User" class="w-5 h-5 rounded-full">
                            <span>High</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V8.25A2.25 2.25 0 015.25 6h13.5A2.25 2.25 0 0121 8.25v10.5M3 3h18M3 15.75h18M6.75 15.75a.75.75 0 00-.75.75V19.5a.75.75 0 00.75.75h10.5a.75.75 0 00.75-.75V16.5a.75.75 0 00-.75-.75H6.75z" />
                            </svg>
                            <span>May 14</span>
                        </div>
                    </div>
                    <div class="bg-gray-100 rounded-md p-3">
                        <p class="font-semibold">Write blog post</p>
                        <div class="flex items-center space-x-2 text-sm text-gray-600">
                            <img src="https://via.placeholder.com/20" alt="User" class="w-5 h-5 rounded-full">
                            <span>Normal</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V8.25A2.25 2.25 0 015.25 6h13.5A2.25 2.25 0 0121 8.25v10.5M3 3h18M3 15.75h18M6.75 15.75a.75.75 0 00-.75.75V19.5a.75.75 0 00.75.75h10.5a.75.75 0 00.75-.75V16.5a.75.75 0 00-.75-.75H6.75z" />
                            </svg>
                            <span>May 10</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-md shadow-sm p-4">
                <h4 class="font-semibold mb-2">In Progress</h4>
                <div class="space-y-2">
                    <div class="bg-gray-100 rounded-md p-3">
                        <p class="font-semibold">Create presentation</p>
                        <div class="flex items-center space-x-2 text-sm text-gray-600">
                            <img src="https://via.placeholder.com/20" alt="User" class="w-5 h-5 rounded-full">
                            <img src="https://via.placeholder.com/20" alt="User" class="w-5 h-5 rounded-full">
                            <span>Normal</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12h-18" />
                            </svg>
                            <span>Normal</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V8.25A2.25 2.25 0 015.25 6h13.5A2.25 2.25 0 0121 8.25v10.5M3 3h18M3 15.75h18M6.75 15.75a.75.75 0 00-.75.75V19.5a.75.75 0 00.75.75h10.5a.75.75 0 00.75-.75V16.5a.75.75 0 00-.75-.75H6.75z" />
                            </svg>
                            <span>May 8</span>
                        </div>
                    </div>
                    <div class="bg-gray-100 rounded-md p-3">
                        <p class="font-semibold">Bug fixes</p>
                        <div class="flex items-center space-x-2 text-sm text-gray-600">
                            <img src="https://via.placeholder.com/20" alt="User" class="w-5 h-5 rounded-full">
                            <span>High</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V8.25A2.25 2.25 0 015.25 6h13.5A2.25 2.25 0 0121 8.25v10.5M3 3h18M3 15.75h18M6.75 15.75a.75.75 0 00-.75.75V19.5a.75.75 0 00.75.75h10.5a.75.75 0 00.75-.75V16.5a.75.75 0 00-.75-.75H6.75z" />
                            </svg>
                            <span>May 11</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-md shadow-sm p-4">
                <h4 class="font-semibold mb-2">Completed</h4>
                <div class="space-y-2">
                    <div class="bg-gray-100 rounded-md p-3">
                        <p class="font-semibold">Onboard new employee</p>
                        <div class="flex items-center space-x-2 text-sm text-gray-600">
                            <img src="https://via.placeholder.com/20" alt="User" class="w-5 h-5 rounded-full">
                            <img src="https://via.placeholder.com/20" alt="User" class="w-5 h-5 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>Apr 30</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4 flex justify-end items-center space-x-4 text-sm text-gray-600">
            <button class="hover:text-gray-800">Filter <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 inline-block align-middle">
                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
              </svg></button>
            <button class="hover:text-gray-800">Sort <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 inline-block align-middle">
                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
              </svg></button>
        </div>
    </div>
</body>
</html>