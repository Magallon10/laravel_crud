<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$titulo ?? ""}}</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert"></script>
    @vite (["resources/css/app.css","resources/js/app.js"])
</head>
<body class="flex flex-col min-h-screen">
<x-layouts.header />
<main class="bg-main flex-1" >
    {{$slot}}
</main>
<x-layouts.footer />


