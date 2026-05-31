<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Forgot Password
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
    "
>

<div
    class="
        w-full
        max-w-[430px]
    "
>

    <h1
        class="
            text-[54px]
            leading-[0.9]
            font-black
            uppercase
            text-violet-300
        "
    >
        Reset
        <br>
        Password
    </h1>

    <p
        class="
            text-zinc-500
            mt-6
            mb-8
        "
    >
        Enter your email and we'll send you a reset link.
    </p>

    @if (session('status'))

        <div
            class="
                mb-6
                rounded-2xl
                bg-green-500/10
                border
                border-green-500/20
                p-4
                text-green-300
                text-sm
            "
        >
            {{ session('status') }}
        </div>

    @endif

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
                    "
                >
                    ⚠ {{ $error }}
                </p>

            @endforeach

        </div>

    @endif

    <form
        method="POST"
        action="{{ route('password.email') }}"
        class="
            flex
            flex-col
            gap-4
        "
    >

        @csrf

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

        <button
            class="
                h-14
                rounded-2xl
                bg-violet-600
                text-white
                font-semibold
            "
        >
            Send Reset Link
        </button>

    </form>

    <div class="mt-6 text-center">

        <a
            href="{{ route('login') }}"
            class="
                text-zinc-500
                hover:text-violet-400
            "
        >
            Back to Login
        </a>

    </div>

</div>

</body>
</html>