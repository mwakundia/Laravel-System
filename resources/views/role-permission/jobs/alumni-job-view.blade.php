<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>{{ $tittle ?? 'Alumni System'}}</title>
</head>
@role('alumni')
<x-partials.alumni-navbar>
    <div class="container flex mx-auto px-20 pt-10">
        <div>


            <h1 class="text-4xl pb-4"><b>{{$title}}</b></h1>

            <div class="text-lg"></div>
            <h4>{{$name}}</h4>
            <br><br>
            <hr>

            <div class="">
                <h3><b>About Us</b></h3>
                <p>{{$description}}</p>
                <br>
                <h3><b>Job Qualification</b></h3>
                <p>{{$qualification}}</p>
                <br>
                <hr>
                <br>

                <br>

                <p class="center"><b> KSH: {{$amount}}</b><br>Fixed Amount</p>
            </div>
        </div>
        <div>
            <div class="pt-10 p-20 ">
                <button class="bg-red-600 p-3 rounded-lg w-32  text-white">
                    Apply 
                </button>
                <button class="bg-transparent p-3 rounded-lg w-32  text-black">
                    Save Job 
                </button>
            </div>
        </div>

    </div>


</x-partials.alumni-navbar>
@endrole