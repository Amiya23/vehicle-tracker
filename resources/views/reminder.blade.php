<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>

<body
    class="
        bg-black
        text-white
    "
>

<div
    class="
        max-w-[430px]
        mx-auto
        min-h-screen
        px-6
        pt-10
        pb-32
    "
>

    <h1
        class="
            text-5xl
            font-black
            uppercase
            text-violet-300
        "
    >
        Reminder
    </h1>

    <p
        class="
            text-zinc-400
            mt-4
        "
    >
        Upcoming maintenance & tax reminders
    </p>

    @php
$serviceOverdue = $vehicles->filter(function ($vehicle) {
    return $vehicle->next_service_date &&
        now()->greaterThan(
            $vehicle->next_service_date
        );
});
@endphp

        <div class="mt-10">

       <h2
    class="
        text-red-400
        font-bold
        mb-4
    "
>
    🚨 Service Overdue
</h2>

@if($serviceOverdue->count())

    @foreach($serviceOverdue as $vehicle)

        <div
            class="
                bg-zinc-900
                border
                border-red-500/30
                rounded-2xl
                p-4
                mb-3
            "
        >

            <p class="font-bold">
                {{ $vehicle->brand }}
            </p>

            <p class="text-zinc-400 text-sm">
                {{ $vehicle->type }}
            </p>

        </div>

    @endforeach

@else

    <div
        class="
            bg-zinc-900
            rounded-2xl
            p-4
            text-zinc-400
        "
    >
        No overdue reminders 
    </div>

@endif



    </div>

    @php
$taxOverdue = $vehicles->filter(function ($vehicle) {
    return $vehicle->tax_due_date &&
        now()->greaterThan(
            $vehicle->tax_due_date
        );
});
@endphp

<div class="mt-10">

    <h2
        class="
            text-red-400
            font-bold
            mb-4
        "
    >
        📄 Tax Overdue
    </h2>

    @if($taxOverdue->count())

        @foreach($taxOverdue as $vehicle)

            <div
                class="
                    bg-zinc-900
                    border
                    border-red-500/30
                    rounded-2xl
                    p-4
                    mb-3
                "
            >

                <p class="font-bold">
                    {{ $vehicle->brand }}
                </p>

                <p class="text-zinc-400 text-sm">
                    {{ $vehicle->type }}
                </p>

            </div>

        @endforeach

    @else

        <div
            class="
                bg-zinc-900
                rounded-2xl
                p-4
                text-zinc-400
            "
        >
            No overdue reminders 
        </div>

    @endif

</div>

    
</div>

</div>

<x-navbar />

</body>
</html>