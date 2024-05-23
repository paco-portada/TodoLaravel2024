<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- Styles -->
        <!-- normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css  -->
        <link rel="stylesheet" href="css/styles.css">
        <!-- <link rel="stylesheet" href="https://raw.githubusercontent.com/necolas/normalize.css/master/normalize.css">  -->
        
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                    @else
                        <a href="{{ url('/admin') }}" class="text-sm text-gray-700 underline dark:text-white">Admin</a>
                        &nbsp;
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline dark:text-white">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline dark:text-white">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
                      
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-4">
                
                <div class="flex justify-center text-primary">
                    <h1>Todo Tasks</h1>                    
                </div>
                <div class="flex justify-center text-success">
                    <h3>Manage your tasks online</h3>
                </div>
                <div class="flex justify-center text-secondary">
                    <h4>info@alumno.me</h4>
                </div>
                <div class="flex justify-center">                   
                    <div class="ml-4 text-center text-sm text-gray-500">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>