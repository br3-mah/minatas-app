<div class="content-body">
    <div class="container mx-auto">
        <div class="flex flex-col">
            <div class="w-full">
                <div class="pb-0">
                    <div class="bg-indigo-900 p-4 flex justify-between items-center">
                        <h1 class="text-3xl font-bold text-yellow-400">My Notifications</h1>
                    </div>
                    <div class="p-0">
                        <div id="DZ_W_Todo2" class="overflow-y-auto h-80 my-4 px-4">
                            <ul class="space-y-4">
                                @forelse (auth()->user()->unreadNotifications as $note)
                                <li class="flex gap-3 items-center">
                                    <div class="flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="text-purple-500">
                                            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
                                        </svg>
                                    </div>
                                    <div class="flex-grow">
                                        <h5 class="text-base font-medium text-gray-800 dark:text-gray-200">{{ $note->data['name'] }}</h5>
                                        <small class="block text-gray-500 dark:text-gray-400">{{ $note->data['msg'] }}</small>
                                    </div>
                                </li>
                                @empty
                                <li class="text-center">
                                    <p class="text-sm text-gray-600 dark:text-gray-300">No notifications available.</p>
                                </li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
