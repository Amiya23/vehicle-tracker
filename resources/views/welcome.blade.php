<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Service Tracker
    </title>

    @vite('resources/css/app.css')
</head>

<body class="bg-black">

    <main
        class="
            min-h-screen
            flex
            justify-center
            bg-black
            overflow-hidden
        "
    >

        <div
            class="
                w-full
                max-w-[430px]
                min-h-screen
                bg-zinc-950
                text-white
                relative
                overflow-hidden
                border-x
                border-white/5
            "
        >

            <!-- Background Blur -->

            <div
                class="
                    absolute
                    top-[-150px]
                    left-[-100px]
                    w-[350px]
                    h-[350px]
                    rounded-full
                    bg-violet-600/20
                    blur-3xl
                "
            ></div>

            <div
                class="
                    absolute
                    bottom-[-150px]
                    right-[-100px]
                    w-[300px]
                    h-[300px]
                    rounded-full
                    bg-fuchsia-500/10
                    blur-3xl
                "
            ></div>

            <!-- Content -->

            <section
                class="
                    relative
                    z-10
                    px-6
                    pt-14
                    flex
                    flex-col
                    gap-10
                "
            >

                <!-- Header -->

                <div>

                    <h1
                        class="
                            text-[54px]
                            leading-[0.88]
                            font-black
                            tracking-[0.08em]
                            uppercase
                            text-violet-300
                        "
                    >
                        Vehicle
                        <br>
                        Dashboard
                    </h1>

                    <p
                        class="
                            text-zinc-500
                            text-[18px]
                            leading-8
                            mt-8
                            max-w-[320px]
                        "
                    >
                        Smart maintenance tracking
                        for all your vehicles.
                    </p>

                </div>

                <!-- Filter Button -->

                <div class="flex gap-3">

                    <button
                        class="
                            flex-1
                            h-[68px]
                            rounded-[24px]
                            bg-violet-600
                            text-lg
                            font-semibold
                        "
                    >
                        All
                    </button>

                    <button
                        class="
                            flex-1
                            h-[68px]
                            rounded-[24px]
                            bg-white/[0.03]
                            border
                            border-white/10
                            text-lg
                            font-semibold
                            text-zinc-300
                        "
                    >
                        Car
                    </button>

                    <button
                        class="
                            flex-1
                            h-[68px]
                            rounded-[24px]
                            bg-white/[0.03]
                            border
                            border-white/10
                            text-lg
                            font-semibold
                            text-zinc-300
                        "
                    >
                        Motor
                    </button>

                </div>

                <!-- Empty State -->

                <div
                    class="
                        bg-white/[0.03]
                        border
                        border-white/10
                        rounded-[32px]
                        px-8
                        py-12
                        text-center
                        backdrop-blur-xl
                    "
                >

                    <div
                        class="
                            w-20
                            h-20
                            rounded-full
                            bg-violet-500/10
                            flex
                            items-center
                            justify-center
                            text-4xl
                            mx-auto
                            mb-8
                        "
                    >
                        🚗
                    </div>

                    <h2
                        class="
                            text-[28px]
                            font-bold
                        "
                    >
                        No Vehicles Yet
                    </h2>

                    <p
                        class="
                            text-zinc-500
                            leading-7
                            mt-4
                        "
                    >
                        Add your first vehicle
                        and start tracking
                        maintenance schedules.
                    </p>

                </div>

            </section>

            <!-- Floating Button -->

            <button
                class="
                    fixed
                    bottom-28
                    right-6
                    w-16
                    h-16
                    rounded-full
                    bg-violet-600
                    text-4xl
                    shadow-2xl
                    shadow-violet-900/40
                "
            >
                +
            </button>

            <!-- Bottom Navbar -->

            <div
                class="
                    fixed
                    bottom-4
                    left-1/2
                    -translate-x-1/2
                    w-full
                    max-w-[430px]
                    px-4
                "
            >

                <nav
                    class="
                        h-[82px]
                        rounded-[30px]
                        bg-zinc-900/90
                        border
                        border-white/10
                        backdrop-blur-xl
                        flex
                        items-center
                        justify-around
                    "
                >

                    <button
                        class="
                            text-violet-400
                            text-sm
                            font-medium
                        "
                    >
                        Dashboard
                    </button>

                    <button
                        class="
                            text-zinc-500
                            text-sm
                            font-medium
                        "
                    >
                        Vehicles
                    </button>

                    <button
                        class="
                            text-zinc-500
                            text-sm
                            font-medium
                        "
                    >
                        Reminder
                    </button>

                    <button
                        class="
                            text-zinc-500
                            text-sm
                            font-medium
                        "
                    >
                        Account
                    </button>

                </nav>

            </div>

        </div>

    </main>

</body>

</html>