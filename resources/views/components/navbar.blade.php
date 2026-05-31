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
        z-50
    "
>

    <div
        class="
            h-[82px]
            rounded-[30px]
            bg-white/[0.04]
            backdrop-blur-2xl
            border
            border-white/10
            flex
            items-center
            justify-around
            shadow-2xl
            shadow-black/30
        "
    >

        <!-- Home -->

        <a
            href="/dashboard"
            class="
                flex
                flex-col
                items-center
                gap-1
                text-xs
                {{ request()->is('dashboard')
                    ? 'text-violet-400'
                    : 'text-zinc-500'
                }}
            "
        >

            <div class="text-2xl">
                🏠
            </div>

            <span>
                Home
            </span>

        </a>

        <!-- Reminder -->

        <a
    href="/reminder"
    class="
        flex
        flex-col
        items-center
        gap-1
        text-xs
        {{ request()->is('reminder')
            ? 'text-violet-400'
            : 'text-zinc-500'
        }}
    "
>
    <div class="text-2xl">
        🔔
    </div>

    <span>
        Reminder
    </span>
</a>
        <!-- Profile -->

        <a
            href="/profile"
            class="
                flex
                flex-col
                items-center
                gap-1
                text-xs
                {{ request()->is('profile')
                    ? 'text-violet-400'
                    : 'text-zinc-500'
                }}
            "
        >

            <div class="text-2xl">
                👤
            </div>

            <span>
                Account
            </span>

        </a>

    </div>

</div>