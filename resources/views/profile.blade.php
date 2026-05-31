<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Profile
    </title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>

<body class="bg-black">

<main
    class="
        min-h-screen
        flex
        justify-center
        bg-black
    "
>

<div
    class="
        w-full
        max-w-[430px]
        min-h-screen
        bg-zinc-950
        text-white
        px-6
        pt-14
        pb-40
    "
>

    <h1
        class="
            text-5xl
            font-black
            text-violet-300
            uppercase
        "
    >
        Account
    </h1>

    <div
        class="
            mt-10
            bg-white/[0.03]
            border
            border-white/10
            rounded-[32px]
            p-8
        "
    >

        <div
            class="
                w-24
                h-24
                rounded-full
                bg-violet-600
                flex
                items-center
                justify-center
                text-4xl
                font-bold
            "
        >
            👤
        </div>

        <h2
            class="
                text-2xl
                font-bold
                mt-6
            "
        >
            {{ auth()->user()->name }}
        </h2>

        <p
            class="
                text-zinc-500
                mt-2
            "
        >
            {{ auth()->user()->email }}
        </p>

        <form
            method="POST"
            action="/logout"
            class="mt-8"
        >

            @csrf

            <button
                class="
                    w-full
                    h-14
                    rounded-2xl
                    bg-red-500
                    font-semibold
                "
            >
                Logout
            </button>

        </form>

    </div>

    <div
    class="
        mt-12
        mb-8
        text-center
    "
>

    <p
        class="
            text-zinc-500
            text-sm
            font-medium
        "
    >
        Vehicle Tracker
    </p>

    <p
        class="
            text-zinc-600
            text-xs
            mt-2
        "
    >
        Version 1.0.0
    </p>

    <p
        class="
            text-zinc-700
            text-xs
            mt-1
        "
    >
        Built by Dhiandra Pradika
    </p>

</div>

</div>

</main>

<x-navbar />

</body>
</html>