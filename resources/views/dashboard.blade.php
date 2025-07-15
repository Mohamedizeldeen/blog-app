<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard - Interviews</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <!-- Side Navigation -->
        <div class="w-64 bg-white shadow-lg">
            <div class="p-6 border-b">
                <h2 class="text-xl font-bold text-gray-800">Dashboard</h2>
                @if(session('user_name'))
                    <p class="text-sm text-gray-600 mt-1">Welcome, {{ session('user_name') }}</p>
                @endif
            </div>
            
            <!-- Logout Button -->
           
            <nav class="mt-6">
                <a href="{{ route('interviews.index') }}" class="flex items-center px-6 py-3 text-gray-700 bg-gray-100 border-r-4 border-blue-500">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                    Interviews
                </a>
                <a href="{{ route('ads.index') }}" class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-100 hover:text-gray-700">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                    </svg>
                    Ads
                </a>
                <a href="{{ route('podcasts.index') }}" class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-100 hover:text-gray-700">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"></path>
                    </svg>
                    Podcast
                </a>
                <a href="{{ route('events.index') }}" class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-100 hover:text-gray-700">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    Events
                </a>
                <a href="{{ route('logout') }}" class="flex items-center px-6 py-3 bg-red-600 text-white">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    Logout
                </a>
               
                
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-800">Interviews</h1>
                <p class="text-gray-600 mt-2">Manage and view your interview, Podcast, Events and Ads content</p>
            </div>

            <!-- Add New Interview Button -->
            <a href="{{ route('interviews.create') }}">
            <div class="mb-6">
                <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Add New Interview
                </button>
            </div></a>

            <!-- Interviews Grid -->
            @if($interviews->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($interviews as $interview)
                        <!-- Interview Card -->
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            <img src="{{ $interview->image ? asset('storage/' . $interview->image) : 'https://via.placeholder.com/400x200' }}" 
                                 alt="{{ $interview->title }}" 
                                 class="w-full h-48 object-cover">
                            <div class="p-6">
                                <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $interview->title }}</h3>
                                @if($interview->category)
                                    <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full mb-2">{{ $interview->category }}</span>
                                @endif
                                <p class="text-gray-600 mb-4">{{ Str::limit($interview->content, 100) }}</p>
                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-gray-500">{{ $interview->created_at->format('M d, Y') }}</span>
                                    <div class="flex space-x-2">
                                        <a href="" class="text-green-500 hover:text-green-700">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                        </a>
                                        <form action="{{ route('interviews.destroy', $interview->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700" >
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-500 mb-2">No Interviews Found</h3>
                    <p class="text-gray-400">You haven't created any interviews yet. Click the button above to add your first interview.</p>
                </div>
            @endif
           
        </div>
    </div>
</body>
</html>