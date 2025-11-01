<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo & Notes App Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom scrollbar for main content */
        .custom-scroll {
            scrollbar-width: thin;
            scrollbar-color: #3b82f6 #f1f1f1;
        }
        .custom-scroll::-webkit-scrollbar {
            width: 8px;
        }
        .custom-scroll::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        .custom-scroll::-webkit-scrollbar-thumb {
            background-color: #3b82f6;
            border-radius: 20px;
            border: 2px solid #f1f1f1;
        }

        /* Initial hidden state for mobile menu */
        #mobile-menu {
            display: none;
        }

        /* Modal specific styling */
        .modal {
            transition: opacity 0.3s ease-in-out, visibility 0.3s ease-in-out;
        }
        .modal-active {
            opacity: 1;
            visibility: visible;
        }
        .modal-inactive {
            opacity: 0;
            visibility: hidden;
        }
    </style>
</head>
<body class="bg-gray-100 font-sans antialiased h-screen flex flex-col">

    <header class="bg-white shadow-md p-4 flex justify-between items-center z-10">
        <div class="flex items-center">
            <button id="hamburger-button" class="lg:hidden p-2 text-gray-700 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-md">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
            <div class="text-2xl font-bold text-blue-600 ml-4 lg:ml-0">🚀 P-App</div>
        </div>
        <div class="flex items-center space-x-4">
            <a href="#" class="px-4 py-2 rounded-md text-gray-700 hover:bg-gray-100 transition duration-200">Login</a>
            <a href="#" class="px-4 py-2 rounded-md bg-blue-600 text-white hover:bg-blue-700 transition duration-200">Sign Up</a>
        </div>
    </header>

    <div class="flex flex-1 overflow-hidden">

        <aside id="sidebar" class="w-64 bg-white shadow-xl flex-shrink-0 p-4 border-r border-gray-200 transition-all duration-300 ease-in-out transform -translate-x-full lg:translate-x-0 absolute lg:relative h-full z-20">
            <nav class="space-y-1">
                <a href="#" data-content="dashboard" class="menu-item flex items-center p-3 rounded-lg text-white bg-blue-600 font-semibold transition duration-200 hover:bg-blue-700">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    Dashboard
                </a>
                
                <h3 class="text-xs font-semibold uppercase text-gray-400 pt-4 pb-1 ml-3">To-Dos</h3>
                <a href="#" data-content="todos-all" class="menu-item flex items-center p-3 rounded-lg text-gray-700 hover:bg-gray-100 transition duration-200">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                    All To-Dos
                </a>
                <a href="#" data-content="todos-incomplete" class="menu-item flex items-center p-3 rounded-lg text-gray-700 hover:bg-gray-100 transition duration-200">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Incomplete
                </a>
                <a href="#" data-content="todos-completed" class="menu-item flex items-center p-3 rounded-lg text-gray-700 hover:bg-gray-100 transition duration-200">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Completed
                </a>
                <a href="#" data-content="todos-deleted" class="menu-item flex items-center p-3 rounded-lg text-gray-700 hover:bg-gray-100 transition duration-200">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                    Deleted
                </a>
                <a href="#" data-content="todos-add" class="menu-item flex items-center p-3 rounded-lg text-gray-700 hover:bg-gray-100 transition duration-200">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Add New To-Do
                </a>

                <h3 class="text-xs font-semibold uppercase text-gray-400 pt-4 pb-1 ml-3">Notes</h3>
                <a href="#" data-content="notes-all" class="menu-item flex items-center p-3 rounded-lg text-gray-700 hover:bg-gray-100 transition duration-200">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    All Notes
                </a>
                <a href="#" data-content="notes-imported" class="menu-item flex items-center p-3 rounded-lg text-gray-700 hover:bg-gray-100 transition duration-200">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                    Imported
                </a>
                <a href="#" data-content="notes-archive" class="menu-item flex items-center p-3 rounded-lg text-gray-700 hover:bg-gray-100 transition duration-200">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path></svg>
                    Archive
                </a>
                <a href="#" data-content="notes-deleted" class="menu-item flex items-center p-3 rounded-lg text-gray-700 hover:bg-gray-100 transition duration-200">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                    Deleted
                </a>
                <a href="#" data-content="notes-add" class="menu-item flex items-center p-3 rounded-lg text-gray-700 hover:bg-gray-100 transition duration-200">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Add New Note
                </a>
            </nav>
        </aside>

        <main id="content-area" class="flex-1 p-6 lg:p-8 overflow-y-auto custom-scroll">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Dashboard</h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <div class="bg-white p-6 rounded-xl shadow-lg border-b-4 border-blue-500">
                    <div class="flex justify-between items-center">
                        <span class="text-sm font-medium text-gray-500 uppercase">Total To-Dos</span>
                        <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                    </div>
                    <p class="text-4xl font-bold text-gray-900 mt-2">18</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-lg border-b-4 border-green-500">
                    <div class="flex justify-between items-center">
                        <span class="text-sm font-medium text-gray-500 uppercase">Completed To-Dos</span>
                        <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <p class="text-4xl font-bold text-gray-900 mt-2">12</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-lg border-b-4 border-purple-500">
                    <div class="flex justify-between items-center">
                        <span class="text-sm font-medium text-gray-500 uppercase">Important To-Dos</span>
                        <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.381-1.81.588-1.81h4.914a1 1 0 00.95-.69l1.519-4.674z"></path></svg>
                    </div>
                    <p class="text-4xl font-bold text-gray-900 mt-2">3</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-lg border-b-4 border-indigo-500">
                    <div class="flex justify-between items-center">
                        <span class="text-sm font-medium text-gray-500 uppercase">Total Notes</span>
                        <svg class="w-6 h-6 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <p class="text-4xl font-bold text-gray-900 mt-2">55</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-lg border-b-4 border-yellow-500">
                    <div class="flex justify-between items-center">
                        <span class="text-sm font-medium text-gray-500 uppercase">Archived Notes</span>
                        <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path></svg>
                    </div>
                    <p class="text-4xl font-bold text-gray-900 mt-2">5</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-lg border-b-4 border-teal-500">
                    <div class="flex justify-between items-center">
                        <span class="text-sm font-medium text-gray-500 uppercase">Imported Notes</span>
                        <svg class="w-6 h-6 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                    </div>
                    <p class="text-4xl font-bold text-gray-900 mt-2">8</p>
                </div>
            </div>
        </main>

    </div>

    <div id="editModal" class="modal modal-inactive fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center z-50">
        <div class="bg-white p-8 rounded-lg shadow-xl w-11/12 md:w-1/2 lg:w-1/3">
            <h2 class="text-2xl font-bold mb-4 text-gray-800">Edit Item</h2>
            <form>
                <div class="mb-4">
                    <label for="edit-title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                    <input type="text" id="edit-title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="edit-description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
                    <textarea id="edit-description" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                </div>
                <div class="flex justify-end space-x-4">
                    <button type="button" id="cancelEdit" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Cancel
                    </button>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const hamburgerButton = document.getElementById('hamburger-button');
        const sidebar = document.getElementById('sidebar');
        const contentArea = document.getElementById('content-area');
        const menuItems = document.querySelectorAll('.menu-item');
        const editModal = document.getElementById('editModal');
        const cancelEditButton = document.getElementById('cancelEdit');

        // Toggle sidebar for mobile
        hamburgerButton.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
            // Optional: Add an overlay to main content when sidebar is open on mobile
            // if (sidebar.classList.contains('-translate-x-full')) {
            //     contentArea.classList.remove('overlay-active');
            // } else {
            //     contentArea.classList.add('overlay-active');
            // }
        });

        // Close sidebar if clicking outside on mobile (optional)
        // contentArea.addEventListener('click', () => {
        //     if (!sidebar.classList.contains('-translate-x-full')) {
        //         sidebar.classList.add('-translate-x-full');
        //     }
        // });

        // Function to render different content based on menu item clicked
        function renderContent(contentType) {
            let htmlContent = '';
            let title = '';

            // Close sidebar on mobile after selection
            if (window.innerWidth < 1024) { // 1024px is Tailwind's 'lg' breakpoint
                sidebar.classList.add('-translate-x-full');
            }

            // Remove active state from all menu items
            menuItems.forEach(item => {
                item.classList.remove('bg-blue-600', 'text-white', 'hover:bg-blue-700');
                item.classList.add('text-gray-700', 'hover:bg-gray-100');
            });
            // Add active state to the clicked item
            const activeItem = document.querySelector(`.menu-item[data-content="${contentType}"]`);
            if (activeItem) {
                 activeItem.classList.remove('text-gray-700', 'hover:bg-gray-100');
                 activeItem.classList.add('bg-blue-600', 'text-white', 'hover:bg-blue-700');
            }


            switch (contentType) {
                case 'dashboard':
                    title = 'Dashboard';
                    htmlContent = `
                        <h1 class="text-3xl font-bold text-gray-800 mb-6">${title}</h1>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                            <div class="bg-white p-6 rounded-xl shadow-lg border-b-4 border-blue-500">
                                <div class="flex justify-between items-center">
                                    <span class="text-sm font-medium text-gray-500 uppercase">Total To-Dos</span>
                                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                                </div>
                                <p class="text-4xl font-bold text-gray-900 mt-2">18</p>
                            </div>
                            <div class="bg-white p-6 rounded-xl shadow-lg border-b-4 border-green-500">
                                <div class="flex justify-between items-center">
                                    <span class="text-sm font-medium text-gray-500 uppercase">Completed To-Dos</span>
                                    <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <p class="text-4xl font-bold text-gray-900 mt-2">12</p>
                            </div>
                            <div class="bg-white p-6 rounded-xl shadow-lg border-b-4 border-purple-500">
                                <div class="flex justify-between items-center">
                                    <span class="text-sm font-medium text-gray-500 uppercase">Important To-Dos</span>
                                    <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.381-1.81.588-1.81h4.914a1 1 0 00.95-.69l1.519-4.674z"></path></svg>
                                </div>
                                <p class="text-4xl font-bold text-gray-900 mt-2">3</p>
                            </div>

                            <div class="bg-white p-6 rounded-xl shadow-lg border-b-4 border-indigo-500">
                                <div class="flex justify-between items-center">
                                    <span class="text-sm font-medium text-gray-500 uppercase">Total Notes</span>
                                    <svg class="w-6 h-6 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                </div>
                                <p class="text-4xl font-bold text-gray-900 mt-2">55</p>
                            </div>
                            <div class="bg-white p-6 rounded-xl shadow-lg border-b-4 border-yellow-500">
                                <div class="flex justify-between items-center">
                                    <span class="text-sm font-medium text-gray-500 uppercase">Archived Notes</span>
                                    <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path></svg>
                                </div>
                                <p class="text-4xl font-bold text-gray-900 mt-2">5</p>
                            </div>
                            <div class="bg-white p-6 rounded-xl shadow-lg border-b-4 border-teal-500">
                                <div class="flex justify-between items-center">
                                    <span class="text-sm font-medium text-gray-500 uppercase">Imported Notes</span>
                                    <svg class="w-6 h-6 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                </div>
                                <p class="text-4xl font-bold text-gray-900 mt-2">8</p>
                            </div>
                        </div>
                    `;
                    break;
                case 'todos-all':
                    title = 'All To-Dos';
                    htmlContent = `
                        <h1 class="text-3xl font-bold text-gray-800 mb-6">${title}</h1>
                        <div class="bg-white shadow-md rounded-lg overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Due Date</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        <th scope="col" class="relative px-6 py-3"><span class="sr-only">Actions</span></th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Finish Project Report</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2023-10-26</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-yellow-600">Incomplete</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                            <button class="text-blue-600 hover:text-blue-900 edit-button" data-title="Finish Project Report" data-description="Write and review the Q3 project report for submission.">Edit</button>
                                            <button class="text-red-600 hover:text-red-900">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Grocery Shopping</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2023-10-25</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600">Completed</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                            <button class="text-blue-600 hover:text-blue-900 edit-button" data-title="Grocery Shopping" data-description="Buy milk, eggs, bread, and fruits.">Edit</button>
                                            <button class="text-red-600 hover:text-red-900">Delete</button>
                                        </td>
                                    </tr>
                                    </tbody>
                            </table>
                        </div>
                    `;
                    break;
                case 'todos-incomplete':
                    title = 'Incomplete To-Dos';
                    htmlContent = `
                        <h1 class="text-3xl font-bold text-gray-800 mb-6">${title}</h1>
                        <div class="bg-white shadow-md rounded-lg overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Due Date</th>
                                        <th scope="col" class="relative px-6 py-3"><span class="sr-only">Actions</span></th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Call client X</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2023-10-27</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                            <button class="text-blue-600 hover:text-blue-900 edit-button" data-title="Call client X" data-description="Discuss project milestones and next steps.">Edit</button>
                                            <button class="text-red-600 hover:text-red-900">Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    `;
                    break;
                case 'todos-completed':
                    title = 'Completed To-Dos';
                    htmlContent = `
                        <h1 class="text-3xl font-bold text-gray-800 mb-6">${title}</h1>
                        <div class="bg-white shadow-md rounded-lg overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Completed On</th>
                                        <th scope="col" class="relative px-6 py-3"><span class="sr-only">Actions</span></th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Walk the dog</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2023-10-24</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                            <button class="text-blue-600 hover:text-blue-900 edit-button" data-title="Walk the dog" data-description="Take Fido for a walk around the park.">Edit</button>
                                            <button class="text-red-600 hover:text-red-900">Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    `;
                    break;
                case 'todos-deleted':
                    title = 'Deleted To-Dos';
                    htmlContent = `
                        <h1 class="text-3xl font-bold text-gray-800 mb-6">${title}</h1>
                        <div class="bg-white shadow-md rounded-lg overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Deleted On</th>
                                        <th scope="col" class="relative px-6 py-3"><span class="sr-only">Actions</span></th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Old Task (Accidental)</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2023-09-15</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                            <button class="text-green-600 hover:text-green-900">Restore</button>
                                            <button class="text-red-600 hover:text-red-900">Permanently Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    `;
                    break;
                case 'todos-add':
                    title = 'Add New To-Do';
                    htmlContent = `
                        <h1 class="text-3xl font-bold text-gray-800 mb-6">${title}</h1>
                        <div class="bg-white p-8 rounded-lg shadow-xl w-full md:w-2/3 lg:w-1/2">
                            <form>
                                <div class="mb-4">
                                    <label for="new-todo-title" class="block text-gray-700 text-sm font-bold mb-2">To-Do Title:</label>
                                    <input type="text" id="new-todo-title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="e.g., Buy groceries">
                                </div>
                                <div class="mb-4">
                                    <label for="new-todo-description" class="block text-gray-700 text-sm font-bold mb-2">Description (Optional):</label>
                                    <textarea id="new-todo-description" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="e.g., Milk, eggs, bread..."></textarea>
                                </div>
                                <div class="mb-4">
                                    <label for="new-todo-due-date" class="block text-gray-700 text-sm font-bold mb-2">Due Date:</label>
                                    <input type="date" id="new-todo-due-date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                </div>
                                <div class="flex justify-end">
                                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                        Add To-Do
                                    </button>
                                </div>
                            </form>
                        </div>
                    `;
                    break;
                case 'notes-all':
                    title = 'All Notes';
                    htmlContent = `
                        <h1 class="text-3xl font-bold text-gray-800 mb-6">${title}</h1>
                        <div class="bg-white shadow-md rounded-lg overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Last Modified</th>
                                        <th scope="col" class="relative px-6 py-3"><span class="sr-only">Actions</span></th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Meeting Minutes - Project Alpha</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2023-10-25 14:30</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                            <button class="text-blue-600 hover:text-blue-900 edit-button" data-title="Meeting Minutes - Project Alpha" data-description="Discussed Q4 strategy, resource allocation, and next steps for team.">Edit</button>
                                            <button class="text-red-600 hover:text-red-900">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Brainstorming - New Feature Ideas</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2023-10-24 10:00</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                            <button class="text-blue-600 hover:text-blue-900 edit-button" data-title="Brainstorming - New Feature Ideas" data-description="Generated ideas for user onboarding, new analytics features, and API integrations.">Edit</button>
                                            <button class="text-red-600 hover:text-red-900">Delete</button>
                                        </td>
                                    </tr>
                                    </tbody>
                            </table>
                        </div>
                    `;
                    break;
                case 'notes-imported':
                    title = 'Imported Notes';
                    htmlContent = `
                        <h1 class="text-3xl font-bold text-gray-800 mb-6">${title}</h1>
                        <div class="bg-white shadow-md rounded-lg overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Source</th>
                                        <th scope="col" class="relative px-6 py-3"><span class="sr-only">Actions</span></th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Recipe: Chicken Curry</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Evernote Import</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                            <button class="text-blue-600 hover:text-blue-900 edit-button" data-title="Recipe: Chicken Curry" data-description="A delicious and easy chicken curry recipe.">Edit</button>
                                            <button class="text-red-600 hover:text-red-900">Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    `;
                    break;
                case 'notes-archive':
                    title = 'Archived Notes';
                    htmlContent = `
                        <h1 class="text-3xl font-bold text-gray-800 mb-6">${title}</h1>
                        <div class="bg-white shadow-md rounded-lg overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Archived On</th>
                                        <th scope="col" class="relative px-6 py-3"><span class="sr-only">Actions</span></th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Project X - Q1 Summary</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2023-04-01</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                            <button class="text-blue-600 hover:text-blue-900 edit-button" data-title="Project X - Q1 Summary" data-description="Summary of Project X performance in Q1.">Edit</button>
                                            <button class="text-red-600 hover:text-red-900">Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    `;
                    break;
                case 'notes-deleted':
                    title = 'Deleted Notes';
                    htmlContent = `
                        <h1 class="text-3xl font-bold text-gray-800 mb-6">${title}</h1>
                        <div class="bg-white shadow-md rounded-lg overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Deleted On</th>
                                        <th scope="col" class="relative px-6 py-3"><span class="sr-only">Actions</span></th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Old Idea Sketch</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2023-08-01</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                            <button class="text-green-600 hover:text-green-900">Restore</button>
                                            <button class="text-red-600 hover:text-red-900">Permanently Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    `;
                    break;
                case 'notes-add':
                    title = 'Add New Note';
                    htmlContent = `
                        <h1 class="text-3xl font-bold text-gray-800 mb-6">${title}</h1>
                        <div class="bg-white p-8 rounded-lg shadow-xl w-full md:w-2/3 lg:w-1/2">
                            <form>
                                <div class="mb-4">
                                    <label for="new-note-title" class="block text-gray-700 text-sm font-bold mb-2">Note Title:</label>
                                    <input type="text" id="new-note-title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="e.g., Meeting with John">
                                </div>
                                <div class="mb-4">
                                    <label for="new-note-content" class="block text-gray-700 text-sm font-bold mb-2">Note Content:</label>
                                    <textarea id="new-note-content" rows="8" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Write your note here..."></textarea>
                                </div>
                                <div class="flex justify-end">
                                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                        Add Note
                                    </button>
                                </div>
                            </form>
                        </div>
                    `;
                    break;
                default:
                    title = 'Content Not Found';
                    htmlContent = `<h1 class="text-3xl font-bold text-gray-800 mb-6">Error: ${title}</h1><p>The requested content could not be loaded.</p>`;
            }
            contentArea.innerHTML = htmlContent;
            
            // Re-attach event listeners for edit buttons after content is rendered
            attachEditButtonListeners();

            // Set the dashboard item as active by default on page load or if dashboard is clicked.
            if (contentType === 'dashboard') {
                 const dashboardItem = document.querySelector('.menu-item[data-content="dashboard"]');
                 if (dashboardItem) {
                     dashboardItem.classList.remove('text-gray-700', 'hover:bg-gray-100');
                     dashboardItem.classList.add('bg-blue-600', 'text-white', 'hover:bg-blue-700');
                 }
            }
        }

        // Attach event listeners to all menu items
        menuItems.forEach(item => {
            item.addEventListener('click', (e) => {
                e.preventDefault(); // Prevent default link behavior
                const contentType = item.getAttribute('data-content');
                renderContent(contentType);
            });
        });

        // Event listener for opening the modal
        function attachEditButtonListeners() {
            document.querySelectorAll('.edit-button').forEach(button => {
                button.addEventListener('click', () => {
                    const title = button.getAttribute('data-title');
                    const description = button.getAttribute('data-description'); // Get description from data attribute
                    document.getElementById('edit-title').value = title;
                    document.getElementById('edit-description').value = description; // Set description in textarea
                    editModal.classList.remove('modal-inactive');
                    editModal.classList.add('modal-active');
                });
            });
        }

        // Event listener for closing the modal
        cancelEditButton.addEventListener('click', () => {
            editModal.classList.remove('modal-active');
            editModal.classList.add('modal-inactive');
        });
        
        // Close modal if clicking outside it
        editModal.addEventListener('click', (e) => {
            if (e.target === editModal) {
                editModal.classList.remove('modal-active');
                editModal.classList.add('modal-inactive');
            }
        });


        // Initial render of dashboard content when page loads
        document.addEventListener('DOMContentLoaded', () => {
            renderContent('dashboard');
        });

    </script>
</body>
</html>