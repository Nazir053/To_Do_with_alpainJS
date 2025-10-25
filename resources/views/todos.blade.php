<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo Home - Task Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom style for main layout to ensure the sidebar and content are side-by-side */
        .app-layout {
            display: grid;
            grid-template-columns: 256px 1fr; /* 64 (16rem) for the sidebar, 1fr for content */
            min-height: 100vh;
        }

        /* Responsive adjustment for small screens */
        @media (max-width: 768px) {
            .app-layout {
                grid-template-columns: 1fr;
            }
            .sidebar {
                display: none; /* Hide sidebar on mobile, you'd use a mobile menu button to toggle it */
            }
        }
    </style>
</head>
<body class="bg-gray-50">

    <div class="app-layout">

        <aside class="sidebar bg-gray-900 text-white p-4 h-full fixed md:static md:block w-64">
            <h2 class="text-2xl font-extrabold mb-8 border-b border-gray-700 pb-2">
                Task Manager
            </h2>
            
            <nav class="space-y-2">
                <a href="#" class="flex items-center p-3 rounded-lg text-sm font-semibold bg-indigo-600 text-white transition duration-150">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-9 4h18a2 2 0 002-2V8a2 2 0 00-2-2H3a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                    Inbox (7)
                </a>
                <a href="#" class="flex items-center p-3 rounded-lg text-sm font-medium text-gray-300 hover:bg-gray-700 transition duration-150">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    Today
                </a>
                <a href="#" class="flex items-center p-3 rounded-lg text-sm font-medium text-gray-300 hover:bg-gray-700 transition duration-150">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Urgent
                </a>
            </nav>
        </aside>

        <main class="flex-1 p-6 md:p-10">

            <div class="max-w-4xl mx-auto">
                
                <h1 class="text-3xl font-bold text-gray-900 mb-6">Task Dashboard</h1>
                
                <div class="flex border-b border-gray-200 mb-8">
                    <button id="active-tab" onclick="showContent('active')" 
                            class="px-6 py-3 text-sm font-medium border-b-2 border-indigo-500 text-indigo-600 transition duration-150">
                        Active Tasks
                    </button>
                    <button id="completed-tab" onclick="showContent('completed')" 
                            class="px-6 py-3 text-sm font-medium border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 transition duration-150">
                        Completed Tasks
                    </button>
                </div>


                <div id="active-tasks" class="space-y-4">

                    <div class="flex items-center bg-white p-4 rounded-lg shadow-sm border border-gray-200">
                        <input id="task1" type="checkbox" class="h-5 w-5 text-green-600 border-gray-300 rounded focus:ring-green-500">
                        <label for="task1" class="ml-4 text-gray-800 text-base font-medium flex-1">
                            <span class="block">Design Landing Page Mockup</span>
                            <span class="block text-xs text-gray-500 mt-0.5">Project: Website Redesign</span>
                        </label>
                        <span class="text-sm text-gray-400">Due Today</span>
                    </div>

                    <div class="flex items-center bg-white p-4 rounded-lg shadow-sm border border-gray-200">
                        <input id="task2" type="checkbox" class="h-5 w-5 text-green-600 border-gray-300 rounded focus:ring-green-500">
                        <label for="task2" class="ml-4 text-gray-800 text-base font-medium flex-1">
                            <span class="block">Review Laravel Auth Middleware</span>
                            <span class="block text-xs text-gray-500 mt-0.5">Project: Todo App</span>
                        </label>
                        <span class="text-sm text-gray-400">Due: Tomorrow</span>
                    </div>

                    <div class="flex items-center bg-white p-4 rounded-lg shadow-sm border border-gray-200">
                        <input id="task3" type="checkbox" class="h-5 w-5 text-green-600 border-gray-300 rounded focus:ring-green-500">
                        <label for="task3" class="ml-4 text-gray-800 text-base font-medium flex-1">
                            <span class="block">Buy groceries (milk, eggs)</span>
                            <span class="block text-xs text-gray-500 mt-0.5">Personal: Errands</span>
                        </label>
                        <span class="text-sm text-gray-400">Due: This Evening</span>
                    </div>
                </div>


                <div id="completed-tasks" class="hidden bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="p-4 bg-gray-50 border-b border-gray-200">
                        <h3 class="text-xl font-semibold text-gray-800">Completed Tasks History</h3>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Task Name
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Headline Name
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Completed At
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        Set up initial project structure
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        Todo App Development
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        Oct 25, 2025 - 09:30 AM
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        Draft email to client
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        Inbox
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        Oct 24, 2025 - 04:15 PM
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        Finish Tailwind CSS styling
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        Urgent
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        Oct 24, 2025 - 11:00 AM
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </main>
    </div>

    <script>
        function showContent(contentType) {
            const activeContent = document.getElementById('active-tasks');
            const completedContent = document.getElementById('completed-tasks');
            const activeTab = document.getElementById('active-tab');
            const completedTab = document.getElementById('completed-tab');

            if (contentType === 'active') {
                // Show Active Tasks
                activeContent.classList.remove('hidden');
                completedContent.classList.add('hidden');
                
                // Style Active Tab
                activeTab.classList.add('border-indigo-500', 'text-indigo-600');
                activeTab.classList.remove('border-transparent', 'text-gray-500', 'hover:text-gray-700', 'hover:border-gray-300');
                
                // Style Completed Tab
                completedTab.classList.remove('border-indigo-500', 'text-indigo-600');
                completedTab.classList.add('border-transparent', 'text-gray-500', 'hover:text-gray-700', 'hover:border-gray-300');
            
            } else if (contentType === 'completed') {
                // Show Completed Tasks
                completedContent.classList.remove('hidden');
                activeContent.classList.add('hidden');

                // Style Completed Tab
                completedTab.classList.add('border-indigo-500', 'text-indigo-600');
                completedTab.classList.remove('border-transparent', 'text-gray-500', 'hover:text-gray-700', 'hover:border-gray-300');
                
                // Style Active Tab
                activeTab.classList.remove('border-indigo-500', 'text-indigo-600');
                activeTab.classList.add('border-transparent', 'text-gray-500', 'hover:text-gray-700', 'hover:border-gray-300');
            }
        }
    </script>

</body>
</html>