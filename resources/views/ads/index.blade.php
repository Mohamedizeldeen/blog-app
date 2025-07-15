<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ads - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="container mx-auto py-8 px-4">
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-gray-800">Ads</h1>
                <div class="space-x-4">
                    <a href="{{ route('ads.create') }}" 
                       class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md transition duration-200">
                        Create New Ad
                    </a>
                    <a href="{{ route('dashboard') }}" 
                       class="bg-gray-500 hover:bg-gray-600 text-white font-medium py-2 px-4 rounded-md transition duration-200">
                        Back to Dashboard
                    </a>
                </div>
            </div>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @forelse($ads as $ad)
                    <div class="bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-200">
                        @if($ad->image)
                            <img src="{{ asset('storage/' . $ad->image) }}" 
                                 alt="{{ $ad->title }}" 
                                 class="w-full h-48 object-cover rounded-t-lg">
                        @endif
                        
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $ad->title }}</h3>
                            
                            @if($ad->category)
                                <span class="inline-block bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full mb-2">
                                    {{ $ad->category }}
                                </span>
                            @endif
                            
                            @if($ad->content)
                                <p class="text-gray-600 text-sm mb-3 line-clamp-3">
                                    {{ Str::limit($ad->content, 100) }}
                                </p>
                            @endif
                            
                            <div class="flex justify-between items-center">
                                <span class="text-xs text-gray-500">
                                    {{ $ad->created_at->format('M d, Y') }}
                                </span>
                                
                                <form action="{{ route('ads.destroy', $ad->id) }}" method="POST" 
                                      onsubmit="return confirm('Are you sure you want to delete this ad?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="bg-red-500 hover:bg-red-600 text-white text-xs px-3 py-1 rounded transition duration-200">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-8">
                        <p class="text-gray-500 text-lg">No ads found.</p>
                        <a href="{{ route('ads.create') }}" 
                           class="text-blue-600 hover:text-blue-800 font-medium">
                            Create your first ad
                        </a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</body>
</html>
