<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie App</title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <livewire:styles>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>


<body class="font-sans bg-gray-900 text-white">
    <nav class="border-b border-gray-800">
        <div class="container mx-auto flex flex-col md:flex-row items-center justify-between px-4 py-6">
            <ul class="flex flex-col md:flex-row  items-center">
                <li>
                    <a href="{{route('movies.index')}}">
                        <h3 class="w-32">MovieApp</h3>
                    </a>
                </li>
                <li class="md:ml-16 mt-3 md:mt-0">
                    <a href="{{route('movies.index')}}" class="hover:text-gray-300">
                        Movies
                    </a>
                </li>
                <li class="md:ml-16 mt-3 md:mt-0">
                    <a href="#" class="hover:text-gray-300">
                        TV Shows
                    </a>
                </li>
                <li class="md:ml-16 mt-3 md:mt-0">
                    <a href="#" class="hover:text-gray-300">
                        Actors
                    </a>
                </li>
            </ul>
            <div class="flex flex-col md:flex-row items-center">
                <livewire:search-dropdown>
                    <div class="md:ml-4 mt-3 md:mt-0">
                        <a href="#">
                            <img src="" alt="avatar" class="rounded-full w-8 h-8">
                        </a>
                    </div>
            </div>
        </div>
    </nav>
    @yield('content')
    <livewire:scripts>
</body>

</html>