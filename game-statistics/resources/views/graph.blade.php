<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Graph details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                   <div>

  <canvas id="myChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const label=[];
    const data=[];
    const barColors = ["red"];
   let list={!! $registered !!};
   for (let index = 0; index < list.length; index++) {
    const element = list[index]["monthOfRegistration"];
    const element2 = list[index]["numberOfRegisteredUsers"];
    label.push(element);
    data.push(element2);
   }

  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels:label,
      datasets: [{
        backgroundColor: barColors,
        label: 'Registered users per month',
        data: data,
        borderWidth: 1,
        barPercentage: 0.8,
        categoryPercentage:0.5
      }]
    },
    options: {
      legend: {display: true},
       title: {
        display: false,
        text: "Number of users registered per month"
        },
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
                </div>


            </div>
        </div>
    </div>
</x-app-layout>
