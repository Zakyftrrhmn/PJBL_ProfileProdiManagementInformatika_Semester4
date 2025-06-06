@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

        <!-- row 1 -->
        <div class="flex flex-wrap -mx-3">
          <!-- Card Pesan Masuk -->
          <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
            <div class="relative flex flex-col min-h-[100px] min-w-0 break-words bg-white shadow-xl rounded-2xl bg-clip-border">
              <div class="flex-auto p-4">
                <div class="flex flex-row -mx-3">
                  <div class="flex-none w-2/3 max-w-full px-3">
                    <div>
                      <p class="mb-0 text-sm font-semibold uppercase">Pesan Masuk</p>
                      <h5 class="mb-2 font-bold">{{ $jumlahPesan }}</h5>
                    </div>
                  </div>
                  <div class="px-3 text-right basis-1/3">
                    <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-blue-500 to-violet-500">
                      <i class="ni ni-email-83 text-lg text-white relative top-3.5"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Card Informasi -->
          <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
            <div class="relative flex flex-col min-h-[100px] min-w-0 break-words bg-white shadow-xl rounded-2xl bg-clip-border">
              <div class="flex-auto p-4">
                <div class="flex flex-row -mx-3">
                  <div class="flex-none w-2/3 max-w-full px-3">
                    <div>
                      <p class="mb-0 text-sm font-semibold uppercase">Informasi</p>
                      <h5 class="mb-2 font-bold">{{ $jumlahInformasi }}</h5>
                    </div>
                  </div>
                  <div class="px-3 text-right basis-1/3">
                    <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-green-500 to-lime-500">
                      <i class="ni ni-notification-70 text-lg text-white relative top-3.5"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Card Karya Mahasiswa -->
          <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
            <div class="relative flex flex-col min-h-[100px] min-w-0 break-words bg-white shadow-xl rounded-2xl bg-clip-border">
              <div class="flex-auto p-4">
                <div class="flex flex-row -mx-3">
                  <div class="flex-none w-2/3 max-w-full px-3">
                    <div>
                      <p class="mb-0 text-sm font-semibold uppercase">Karya Mahasiswa</p>
                      <h5 class="mb-2 font-bold">{{ $jumlahKarya }}</h5>
                    </div>
                  </div>
                  <div class="px-3 text-right basis-1/3">
                    <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-purple-500 to-pink-500">
                      <i class="ni ni-books text-lg text-white relative top-3.5"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Card Prestasi -->
          <div class="w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:w-1/4">
            <div class="relative flex flex-col min-h-[100px] min-w-0 break-words bg-white shadow-xl rounded-2xl bg-clip-border">
              <div class="flex-auto p-4">
                <div class="flex flex-row -mx-3">
                  <div class="flex-none w-2/3 max-w-full px-3">
                    <div>
                      <p class="mb-0 text-sm font-semibold uppercase">Prestasi Mahasiswa</p>
                      <h5 class="mb-2 font-bold">{{ $jumlahPrestasi }}</h5>
                    </div>
                  </div>
                  <div class="px-3 text-right basis-1/3">
                    <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-orange-500 to-yellow-500">
                      <i class="ni ni-hat-3 text-lg text-white relative top-3.5"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>



        <!-- cards row 2 -->
        <div class="w-full max-w-full px-3 mt-6">
          <div class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
            <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
              <h6 class="capitalize dark:text-white">Grafik Kunjungan Halaman</h6>
              <p class="mb-0 text-sm leading-normal dark:text-white dark:opacity-60">
                <i class="fa fa-arrow-up text-emerald-500"></i>
                <span class="font-semibold">Statistik</span> 30 hari terakhir
              </p>
            </div>
            <div class="flex-auto p-4">
              <canvas id="chart-kunjungan" height="300"></canvas>
            </div>
          </div>
        </div>
  

@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
if(document.querySelector("#chart-kunjungan")) {
    const ctx = document.getElementById("chart-kunjungan").getContext("2d");

    const gradientStroke = ctx.createLinearGradient(0, 230, 0, 50);
    gradientStroke.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke.addColorStop(0, 'rgba(94, 114, 228, 0)');

    new Chart(ctx, {
        type: "line",
        data: {
            labels: @json($labels),
            datasets: [{
                label: "Kunjungan",
                tension: 0.4,
                borderWidth: 0,
                pointRadius: 0,
                borderColor: "#5e72e4",
                backgroundColor: gradientStroke,
                borderWidth: 3,
                fill: true,
                data: @json($data),
                maxBarThickness: 6
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false }
            },
            interaction: {
                intersect: false,
                mode: 'index',
            },
            scales: {
                y: {
                    grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5]
                    },
                    ticks: {
                        display: true,
                        padding: 10,
                        color: '#fbfbfb',
                        font: {
                            size: 11,
                            family: "Open Sans",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
                x: {
                    grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false,
                        borderDash: [5, 5]
                    },
                    ticks: {
                        display: true,
                        color: '#ccc',
                        padding: 20,
                        font: {
                            size: 11,
                            family: "Open Sans",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
            },
        },
    });
}
</script>

@endpush