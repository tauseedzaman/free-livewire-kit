<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    @livewireStyles
</head>

<body>
    {{-- <livewire:post /> --}}
    <livewire:mutli-step-form />
    {{-- <script src="{{ asset('script.js') }}"></script> --}}
    @livewireScripts
</body>

</html>
