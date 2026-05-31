<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Register
    </title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>

<body
    class="
        bg-black
        min-h-screen
        flex
        items-center
        justify-center
        px-6
        py-10
    "
>

<div
    class="
        w-full
        max-w-[430px]
    "
>

    <div class="mb-10">

        <h1
            class="
                text-[54px]
                leading-[0.9]
                font-black
                uppercase
                text-violet-300
            "
        >
            Vehicle
            <br>
            Tracker
        </h1>

        <p
            class="
                text-zinc-500
                mt-6
            "
        >
            Create your account.
        </p>

    </div>

    @if ($errors->any())

    <div
        class="
            mb-6
            rounded-2xl
            bg-red-500/10
            border
            border-red-500/20
            p-4
        "
    >

        @foreach ($errors->all() as $error)

            <p
                class="
                    text-red-300
                    text-sm
                    mb-1
                "
            >
                ⚠ {{ $error }}
            </p>

        @endforeach

    </div>

@endif

    <form
        method="POST"
        action="{{ route('register') }}"
        class="
            flex
            flex-col
            gap-4
        "
    >

        @csrf

        <input
            type="text"
            name="name"
            placeholder="Name"
            required
            class="
                h-14
                rounded-2xl
                bg-zinc-900
                border
                border-white/10
                px-4
                text-white
            "
        >

        <input
            type="email"
            name="email"
            placeholder="Email"
            required
            class="
                h-14
                rounded-2xl
                bg-zinc-900
                border
                border-white/10
                px-4
                text-white
            "
        >

        <input
            type="password"
            name="password"
            placeholder="Password"
            required
            class="
                h-14
                rounded-2xl
                bg-zinc-900
                border
                border-white/10
                px-4
                text-white
            "
        >

        <input
            type="password"
            name="password_confirmation"
            placeholder="Confirm Password"
            required
            class="
                h-14
                rounded-2xl
                bg-zinc-900
                border
                border-white/10
                px-4
                text-white
            "
        >

        <button
            class="
                h-14
                rounded-2xl
                bg-violet-600
                text-white
                font-semibold
                mt-2
            "
        >
            Create Account
        </button>

    </form>

    <div
        class="
            mt-8
            text-center
            text-zinc-500
        "
    >

        Already have an account?

        <a
            href="{{ route('login') }}"
            class="
                text-violet-400
                ml-1
            "
        >
            Sign In
        </a>

    </div>

</div>

</body>
</html>