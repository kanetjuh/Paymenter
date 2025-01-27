<x-admin-layout>
    <x-slot name="title">
        {{ __('General') }}
    </x-slot>
    <div class="py-10">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg p-4 grid md:grid-cols-3">
                <!-- show ticketclosed, tickets, orders -->
                <div class="p-10 bg-white border-2 rounded-xl border-grey-600 col-span-2">
                    <div class="grid grid-cols-3 p-2 pb-10">
                        <div class="bg-normal rounded-md mr-3 p-2">
                            <h1 class="text-xl text-gray-500">Revenue today</h1>
                            <p class="text-black font-bold text-2xl">€20</p>
                        </div>
                        <div class="bg-normal rounded-md mr-3 p-2">
                            <h1 class="text-xl text-gray-500">Tickets today</h1>
                            <p class="text-black font-bold text-2xl">5</p>
                        </div>
                        <div class="bg-normal rounded-md p-2">
                            <h1 class="text-xl text-gray-500">Revenue Total</h1>
                            <p class="text-black font-bold text-2xl">$500</p>
                        </div>
                    </div>
                    <canvas id="myChart" style="width:100%;max-height:400px;"></canvas>
                </div>
                <div class="p-10 bg-white border-2 rounded-xl border-grey-600 ml-4">
                    <h1 class="text-xl text-gray-500">Recent tickets</h1>
                    <div class="grid grid-cols-1 gap-4">
                    @foreach(App\Models\Tickets::all()->take(3) as $ticket)
                        <div class="bg-normal rounded-md p-2">
                            <h1 class="text-xl text-gray-500">Ticket #{{$ticket->id}}</h1>
                            <p class="text-black font-bold text-2xl">{{ $ticket->title }}</p>
                        </div>
                    @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Revenue', 'Tickets', 'Orders', 
                ],
                datasets: [{
                        label: "Yesterday",
                        backgroundColor: "#CFE2FD",
                        data: [3, 7, 4]
                    },
                    {
                        label: "Today",
                        backgroundColor: "#5270FD",
                        data: [4, 3, 5]
                    },
                ]


            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</x-admin-layout>
