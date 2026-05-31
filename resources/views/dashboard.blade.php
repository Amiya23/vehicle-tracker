<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Vehicle Dashboard
    </title>

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
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
   x-data="{
    open:false,
    updateOpen:false,
    editOpen:false,

    historyOpen:false,
    historyHtml:'',

    selectedVehicle:null,

    editId:null,
    editBrand:'',
    editType:'',
    editPlate:'',
    editCategory:'',
    editTax:''
}"
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

    <!-- Header -->

    <div>

        <h1
            class="
                text-[54px]
                leading-[0.88]
                font-black
                uppercase
                tracking-[0.08em]
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
                text-lg
                leading-8
                mt-8
            "
        >
            Smart maintenance tracking
            for all your vehicles.
        </p>

    </div>

    <!-- Form -->

    <div>

    <!-- Floating Button -->

    <button
        x-show="!open"
        @click="open = true"
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
            z-30
        "
    >
        +
    </button>

    <!-- Overlay -->

    <div
        x-show="open"
        x-transition.opacity
        @click="open = false"
        class="
            fixed
            inset-0
            bg-black/70
            backdrop-blur-sm
            z-40
        "
    ></div>

    <!-- Modal Wrapper -->

    <div
        x-show="open"
        x-transition
        class="
            fixed
            inset-0
            flex
            items-center
            justify-center
            z-50
            p-4
        "
    >

        <!-- Modal -->

        <div
            @click.stop
            class="
                w-full
                max-w-[430px]
                bg-zinc-950
                border
                border-white/10
                rounded-[36px]
                p-6
                pb-10
                relative
            "
        >

            <!-- Close Button -->

            <button
                type="button"
                @click="open = false"
                class="
                    absolute
                    top-5
                    right-5
                    w-10
                    h-10
                    rounded-full
                    bg-white/5
                    hover:bg-white/10
                    flex
                    items-center
                    justify-center
                    text-zinc-400
                    transition
                "
            >
                ✕
            </button>

            <!-- Header -->

            <div class="mb-6">

                <h2
                    class="
                        text-2xl
                        font-bold
                    "
                >
                    Add Vehicle
                </h2>

                <p
                    class="
                        text-zinc-500
                        mt-1
                    "
                >
                    Add your car or motorcycle
                </p>

            </div>

            <!-- Form -->

            @if ($errors->any())

    <div
        class="
            mb-4
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
                action="/vehicles"
                method="POST"
                class="
                    flex
                    flex-col
                    gap-4
                "
            >

                @csrf

                <select
                    name="category"
                    class="
                        h-14
                        rounded-2xl
                        bg-zinc-900
                        border
                        border-white/10
                        px-4
                    "
                >
                    <option>
                        Motorcycle
                    </option>

                    <option>
                        Car
                    </option>
                </select>

                <input
                    type="text"
                    name="brand"
                    placeholder="Brand"
                    class="
                        h-14
                        rounded-2xl
                        bg-zinc-900
                        border
                        border-white/10
                        px-4
                    "
                >

                <input
                    type="text"
                    name="type"
                    placeholder="Type"
                    class="
                        h-14
                        rounded-2xl
                        bg-zinc-900
                        border
                        border-white/10
                        px-4
                    "
                >

                <input
                    type="text"
                    name="plate_number"
                    placeholder="Plate Number"
                    class="
                        h-14
                        rounded-2xl
                        bg-zinc-900
                        border
                        border-white/10
                        px-4
                    "
                >

                <input
                    type="date"
                    name="tax_due_date"
                    class="
                        h-14
                        rounded-2xl
                        bg-zinc-900
                        border
                        border-white/10
                         px-4
                    "
                >

                <input
                    type="number"
                    name="odometer"
                    placeholder="Odometer"
                    class="
                        h-14
                        rounded-2xl
                        bg-zinc-900
                        border
                        border-white/10
                        px-4
                    "
                >

                <button
                    class="
                        h-16
                        rounded-2xl
                        bg-violet-600
                        font-semibold
                        text-lg
                        mt-2
                    "
                >
                    Save Vehicle
                </button>

            </form>

        </div>

    </div>

</div>

    <!-- Vehicle List -->

    <div
        class="
            mt-10
            flex
            flex-col
            gap-5
        "
    >

        @forelse($vehicles as $vehicle)

@php

$isOverdue =
    $vehicle->next_service_date
    &&
    now()->greaterThan(
        $vehicle->next_service_date
    );

@endphp

@php

$taxExpired =
    $vehicle->tax_due_date &&
    now()->greaterThan(
        $vehicle->tax_due_date
    );

@endphp

<div
    class="
        {{
            $isOverdue
            ? 'bg-red-500/10 border-red-500/30'
            : 'bg-white/[0.03] border-white/10'
        }}
        border
        rounded-[32px]
        p-7
        flex
        flex-col
        gap-6
        backdrop-blur-xl
    "
>

    <!-- Header -->

    <div
    class="
        flex
        items-start
        justify-between
        gap-4
    "
>

    <div>

        <h2
            class="
                text-2xl
                font-bold
            "
        >
            {{ $vehicle->brand }}
        </h2>

        <p
            class="
                text-zinc-500
                mt-1
            "
        >
            {{ $vehicle->type }}
        </p>

    </div>

    <div class="flex gap-3">

    <!-- HISTORY -->

    <button
        type="button"

        @click="
            historyHtml = `
            @foreach($vehicle->serviceHistories as $history)

                <div class='mb-4 pb-4 border-b border-white/10'>

                    <div class='font-semibold'>
                        {{ number_format($history->odometer) }} KM
                    </div>

                    <div class='text-zinc-400 text-sm'>
                        {{ \Carbon\Carbon::parse($history->service_date)->format('d M Y') }}
                    </div>

                </div>

            @endforeach
            `;

            historyOpen = true;
        "

        class="
            text-violet-400
            text-sm
        "
    >
        History
    </button>

    <!-- EDIT -->

    <button
        type="button"

        @click="
            editOpen = true;

            editId =
                {{ $vehicle->id }};

            editBrand =
                '{{ $vehicle->brand }}';

            editType =
                '{{ $vehicle->type }}';

            editPlate =
                '{{ $vehicle->plate_number }}';

            editCategory =
                '{{ $vehicle->category }}';

            editTax =
                '{{ $vehicle->tax_due_date }}';
        "

        class="
            text-blue-400
            text-sm
        "
    >
        Edit
    </button>

    <!-- DELETE -->

    <form
        action="/vehicles/{{ $vehicle->id }}"
        method="POST"
    >
        @csrf
        @method('DELETE')

        <button
            class="
                text-red-400
                text-sm
            "
        >
            Delete
        </button>

    </form>

</div>

</div>

    <!-- Info -->

    <div
        class="
            flex
            items-center
            justify-between
            gap-6
        "
    >

        <div class="flex-1">

            <p
                class="
                    text-zinc-500
                    text-sm
                "
            >
                Plate Number
            </p>

            <h3
                class="
                    font-semibold
                    mt-1
                "
            >
                {{ $vehicle->plate_number }}
            </h3>

        </div>

        <div class="mt-5">

    <p
        class="
            text-zinc-500
            text-sm
        "
    >
        Tax Due
    </p>

    <p
        class="
            mt-1
            font-semibold
            {{
                $taxExpired
                ? 'text-red-400'
                : 'text-white'
            }}
        "
    >
        {{
            $vehicle->tax_due_date
            ? \Carbon\Carbon::parse(
                $vehicle->tax_due_date
            )->format('d M Y')
            : '-'
        }}
    </p>


</div>

        <div
            class="
                text-right
                min-w-[120px]
            "
        >

            <p
                class="
                    text-zinc-500
                    text-sm
                "
            >
                Odometer
            </p>

            <h3
                class="
                    font-semibold
                    mt-1
                "
            >
                {{ number_format(
                    $vehicle->odometer
                ) }}
                KM
            </h3>

        </div>

    </div>

    {{-- TAX REMINDER --}}

@if($taxExpired)

<div
    class="
        mt-5
        rounded-2xl
        bg-red-500/20
        border
        border-red-500/30
        px-4
        py-3
    "
>

    <div
        class="
            flex
            items-center
            justify-between
        "
    >

        <span
            class="
                text-red-300
                text-sm
                font-medium
            "
        >
            🚨 Tax overdue
        </span>

        <form
            action="/vehicles/{{ $vehicle->id }}/renew-tax"
            method="POST"
        >
            @csrf
            @method('PUT')

            <button type="submit"
                class="
                     bg-red-500
                    px-4
                    py-2
                    rounded-xl
                    text-sm
                    font-medium
                    "
            >
                Renew
            </button>

        </form>

    </div>

</div>

@endif

    <!-- Reminder -->

    @if($isOverdue)

<div
    class="
        rounded-2xl
        bg-gradient-to-r
        from-red-500/20
        to-red-600/10
        border
        border-red-500/30
        px-4
        py-4
    "
>

    <div
        class="
            flex
            items-center
            justify-between
        "
    >

        <span
            class="
                text-red-300
                text-sm
                font-medium
            "
        >
            🚨 Service overdue
        </span>

        <button
    type="button"
    @click="
        selectedVehicle = {{ $vehicle->id }};
        updateOpen = true;
    "
    class="
        bg-red-500
        px-4
        py-2
        rounded-xl
        text-sm
        font-medium
    "
>
    Update KM
</button>

    </div>

</div>

@else

<div
    class="
        rounded-2xl
        bg-violet-500/10
        border
        border-violet-500/20
        px-4
        py-3
        text-violet-300
        text-sm
        font-medium
    "
>
    Next service:
    {{
        \Carbon\Carbon::parse(
            $vehicle->next_service_date
        )->diffForHumans()
    }}
</div>

@endif

</div>

@empty

<div
    class="
        bg-white/[0.03]
        border
        border-white/10
        rounded-[32px]
        px-8
        py-12
        text-center
    "
>

    <div
        class="
            text-5xl
            mb-6
        "
    >
        🚗
    </div>

    <h2
        class="
            text-2xl
            font-bold
        "
    >
        No Vehicles Yet
    </h2>

    <p
        class="
            text-zinc-500
            mt-4
            leading-7
        "
    >
        Add your first vehicle
        to start tracking
        maintenance.
    </p>

</div>

@endforelse



    </div>

    <div
    x-show="updateOpen"
    x-transition.opacity
    class="
        fixed
        inset-0
        z-[9999]
        flex
        items-center
        justify-center
        bg-black/80
        backdrop-blur-md
    "
>

    <div
        @click.stop
        class="
            bg-zinc-950
            border
            border-white/10
            rounded-[32px]
            p-6
            w-full
            max-w-[430px]
            relative
        "
        
    >

        <button
    type="button"
    @click="updateOpen=false"
    class="
        absolute
        top-4
        right-4
        w-10
        h-10
        rounded-full
        bg-white/5
    "
>
    ✕
</button>

        <h2 class="text-xl font-bold mb-4">
            Update Odometer
        </h2>

        <form
            method="POST"
            :action="'/vehicles/' + selectedVehicle + '/odometer'"
        >

            @csrf
            @method('PUT')

            <input
                type="number"
                name="odometer"
                placeholder="Latest KM"
                class="
                    w-full
                    h-14
                    rounded-2xl
                    bg-zinc-900
                    border
                    border-white/10
                    px-4
                "
            >

            <div class="flex gap-3 mt-5">

                <button
                    type="button"
                    @click="updateOpen = false"
                    class="
                        flex-1
                        h-14
                        rounded-2xl
                        bg-zinc-800
                    "
                >
                    Cancel
                </button>

                <button
                    type="submit"
                    class="
                        flex-1
                        h-14
                        rounded-2xl
                        bg-violet-600
                    "
                >
                    Save
                </button>

            </div>

        </form>

    </div>

</div>

<div
    x-show="editOpen"
    x-transition.opacity
    class="
        fixed
        inset-0
        bg-black/80
        backdrop-blur-md
        z-[9999]
        flex
        items-center
        justify-center
        p-4
    "
>

    <div
        @click.stop
        class="
            bg-zinc-950
            rounded-[32px]
            border
            border-white/10
            p-6
            w-full
            max-w-[430px]
        "
    >

        <h2
            class="
                text-xl
                font-bold
                mb-5
            "
        >
            Edit Vehicle
        </h2>

        <form
            method="POST"
            :action="'/vehicles/' + editId"
        >

            @csrf
            @method('PUT')

            <div class="flex flex-col gap-4">

                <input
                    x-model="editBrand"
                    name="brand"
                    placeholder="Brand"
                    class="
                        h-14
                        rounded-2xl
                        bg-zinc-900
                        border
                        border-white/10
                        px-4
                    "
                >

                <input
                    x-model="editType"
                    name="type"
                    placeholder="Type"
                    class="
                        h-14
                        rounded-2xl
                        bg-zinc-900
                        border
                        border-white/10
                        px-4
                    "
                >

                <input
                    x-model="editPlate"
                    name="plate_number"
                    placeholder="Plate Number"
                    class="
                        h-14
                        rounded-2xl
                        bg-zinc-900
                        border
                        border-white/10
                        px-4
                    "
                >

                <input
                    x-model="editCategory"
                    name="category"
                    placeholder="Category"
                    class="
                        h-14
                        rounded-2xl
                        bg-zinc-900
                        border
                        border-white/10
                        px-4
                    "
                >

                <input
                    x-model="editTax"
                    type="date"
                    name="tax_due_date"
                    class="
                        h-14
                        rounded-2xl
                        bg-zinc-900
                        border
                        border-white/10
                        px-4
                    "
                >

            </div>
            <div class="flex gap-3 mt-6">

    <button
        type="button"
        @click="editOpen=false"
        class="
            flex-1
            h-14
            rounded-2xl
            bg-zinc-800
        "
    >
        Cancel
    </button>

    <button
        type="submit"
        class="
            flex-1
            h-14
            rounded-2xl
            bg-violet-600
        "
    >
        Save
    </button>

</div>
        </form>

    </div>

</div>

{{-- Modal History --}}
<div
    x-show="historyOpen"
    x-transition.opacity
    class="
        fixed
        inset-0
        z-[9999]
        bg-black/80
        backdrop-blur-md
        flex
        items-center
        justify-center
        p-4
    "
>

    <div
        @click.stop
        class="
            bg-zinc-950
            border
            border-white/10
            rounded-[32px]
            p-6
            w-full
            max-w-[430px]
            max-h-[80vh]
            overflow-y-auto
        "
    >

        <div
            class="
                flex
                justify-between
                items-center
                mb-6
            "
        >

            <h2
                class="
                    text-xl
                    font-bold
                "
            >
                Service History
            </h2>

            <button
                type="button"
                @click="historyOpen=false"
                class="text-zinc-400"
            >
                ✕
            </button>

        </div>

        <div x-html="historyHtml"></div>

<div
    x-show="historyHtml.trim() === ''"
    class="
        py-8
        text-center
    "
>

    <div class="text-4xl mb-4">
        📋
    </div>

    <p
        class="
            text-zinc-400
            font-medium
        "
    >
        No service history yet
    </p>

    <p
        class="
            text-zinc-600
            text-sm
            mt-2
        "
    >
        Update your odometer after service
        to start tracking history.
    </p>

</div>

    </div>

</div>

</div>



</main>



<x-navbar />

</body>
</html>