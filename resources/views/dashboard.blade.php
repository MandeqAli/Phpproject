<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dashboard - Pharmacy</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-gradient-to-br from-slate-50 via-slate-100 to-emerald-50">

  <!-- SIDEBAR -->
  <aside class="fixed left-0 top-0 h-screen w-20 bg-slate-950/95 text-white flex flex-col items-center py-6 space-y-6 border-r border-white/10">
    <!-- Logo -->
    <a href="/dashboard" class="h-12 w-12 rounded-2xl bg-emerald-500/15 text-emerald-400 flex items-center justify-center text-2xl shadow-lg shadow-emerald-500/10" title="Dashboard">
      💊
    </a>

    <!-- Links -->
    <nav class="flex flex-col items-center gap-3">
      <a href="/dashboard" title="Dashboard"
        class="group relative text-2xl p-3 rounded-2xl bg-emerald-500 text-white shadow-lg shadow-emerald-500/20">
        🏥
        <span class="absolute left-24 top-1/2 -translate-y-1/2 px-3 py-1 rounded-lg bg-slate-900 text-xs opacity-0 group-hover:opacity-100 transition whitespace-nowrap">
          Dashboard
        </span>
      </a>

      <a href="/customers" title="Bukaan"
        class="group relative text-2xl p-3 rounded-2xl text-slate-300 hover:bg-white/10 hover:text-white transition">
        🧑‍⚕️
        <span class="absolute left-24 top-1/2 -translate-y-1/2 px-3 py-1 rounded-lg bg-slate-900 text-xs opacity-0 group-hover:opacity-100 transition whitespace-nowrap">
          Bukaan
        </span>
      </a>

      <a href="/order_details" title="Orders"
        class="group relative text-2xl p-3 rounded-2xl text-slate-300 hover:bg-white/10 hover:text-white transition">
        💊
        <span class="absolute left-24 top-1/2 -translate-y-1/2 px-3 py-1 rounded-lg bg-slate-900 text-xs opacity-0 group-hover:opacity-100 transition whitespace-nowrap">
          Orders
        </span>
      </a>

      <a href="/messages" title="Messages"
        class="group relative text-2xl p-3 rounded-2xl text-slate-300 hover:bg-white/10 hover:text-white transition">
        💬
        <span class="absolute left-24 top-1/2 -translate-y-1/2 px-3 py-1 rounded-lg bg-slate-900 text-xs opacity-0 group-hover:opacity-100 transition whitespace-nowrap">
          Messages
        </span>
      </a>
    </nav>

    <div class="flex-1"></div>

    <!-- Logout -->
    <form method="POST" action="/logout" class="pb-2">
      <!-- @csrf -->
      <button type="submit" title="Logout"
        class="group relative text-2xl p-3 rounded-2xl text-red-300 hover:bg-red-500 hover:text-white transition shadow-lg shadow-red-500/10">
        ⎋
        <span class="absolute left-24 top-1/2 -translate-y-1/2 px-3 py-1 rounded-lg bg-slate-900 text-xs opacity-0 group-hover:opacity-100 transition whitespace-nowrap">
          Logout
        </span>
      </button>
    </form>
  </aside>

  <!-- MAIN -->
  <main class="ml-20">

    <!-- TOPBAR -->
    <header class="sticky top-0 z-30 backdrop-blur bg-white/70 border-b border-slate-200/70">
      <div class="px-6 py-4 flex items-center justify-between gap-4">
        <!-- Left -->
        <div class="flex flex-col gap-1">
          <h1 class="text-xl font-extrabold text-slate-900 tracking-tight">Pharmacy Dashboard</h1>
          <p class="text-sm text-slate-500">Monitor sales, orders, customers & inventory in one place.</p>
        </div>

        <!-- Center Search -->
        <div class="hidden md:block flex-1 max-w-xl px-6">
          <div class="relative">
            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">🔍</span>
            <input
              type="text"
              placeholder="Search anything..."
              class="w-full pl-11 pr-4 py-3 rounded-2xl border border-slate-200 bg-white/80
                     focus:outline-none focus:ring-2 focus:ring-emerald-300 text-sm shadow-sm"
            />
          </div>
        </div>

        <!-- Right -->
        <div class="flex items-center gap-3">
          <button class="h-11 w-11 rounded-2xl border border-slate-200 bg-white/80 hover:bg-white shadow-sm" title="Language">🌐</button>
          <button class="h-11 w-11 rounded-2xl border border-slate-200 bg-white/80 hover:bg-white shadow-sm" title="Messages">💬</button>
          <button class="h-11 w-11 rounded-2xl border border-slate-200 bg-white/80 hover:bg-white shadow-sm" title="Notifications">🔔</button>

          <div class="hidden sm:flex items-center gap-2 pl-2">
            <img src="https://flagcdn.com/w20/us.png" alt="US" class="w-6 h-4 object-cover rounded-sm shadow-sm" />
            <div class="h-11 w-11 rounded-2xl bg-emerald-500 text-white flex items-center justify-center font-bold shadow-lg shadow-emerald-500/20">
              A
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- CONTENT -->
    <section class="p-6 md:p-8 space-y-6">

      <!-- Quick actions row -->
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Welcome Card -->
        <div class="lg:col-span-2 rounded-3xl p-6 bg-gradient-to-r from-emerald-600 to-emerald-500 text-white shadow-xl shadow-emerald-500/20">
          <div class="flex items-start justify-between gap-6">
            <div>
              <div class="text-sm text-emerald-100">Today Overview</div>
              <div class="mt-1 text-2xl font-extrabold">Your Pharmacy is performing well ✅</div>
              <div class="mt-2 text-emerald-100 text-sm">
                Review orders, reply to customers, and track sales easily.
              </div>
            </div>
            <div class="hidden sm:flex h-14 w-14 rounded-2xl bg-white/20 items-center justify-center text-2xl">
              📈
            </div>
          </div>

          <div class="mt-5 flex flex-wrap gap-3">
            <a href="/order_details" class="px-4 py-2 rounded-2xl bg-white/15 hover:bg-white/20 text-sm font-semibold">
              View Orders
            </a>
            <a href="/customers" class="px-4 py-2 rounded-2xl bg-white/15 hover:bg-white/20 text-sm font-semibold">
              View Customers
            </a>
            <a href="/messages" class="px-4 py-2 rounded-2xl bg-white/15 hover:bg-white/20 text-sm font-semibold">
              Open Messages
            </a>
          </div>
        </div>

        <!-- Mini card -->
        <div class="rounded-3xl p-6 bg-white/80 backdrop-blur border border-slate-200 shadow-lg">
          <div class="flex items-center justify-between">
            <div>
              <div class="text-sm text-slate-500">Inventory Alert</div>
              <div class="text-2xl font-extrabold text-slate-900 mt-1">12</div>
              <div class="text-sm text-slate-500 mt-1">items low stock</div>
            </div>
            <div class="h-12 w-12 rounded-2xl bg-amber-500/15 text-amber-600 flex items-center justify-center text-xl">
              ⚠️
            </div>
          </div>
          <button class="mt-5 w-full py-3 rounded-2xl bg-slate-900 text-white font-semibold hover:bg-slate-800">
            View Inventory
          </button>
        </div>
      </div>

      <!-- Stats Cards -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

        <!-- Card 1 -->
        <div class="rounded-3xl bg-white/80 backdrop-blur border border-slate-200 shadow-lg p-5">
          <div class="flex items-center justify-between">
            <div class="text-sm text-slate-500">Today Orders</div>
            <div class="h-10 w-10 rounded-2xl bg-emerald-500/15 text-emerald-700 flex items-center justify-center">🧾</div>
          </div>
          <div class="mt-3 text-3xl font-extrabold text-slate-900">1,945</div>
          <div class="mt-2 text-sm font-semibold text-emerald-600">↑ +4.63% <span class="font-normal text-slate-500">vs last week</span></div>
        </div>

        <!-- Card 2 -->
        <div class="rounded-3xl bg-white/80 backdrop-blur border border-slate-200 shadow-lg p-5">
          <div class="flex items-center justify-between">
            <div class="text-sm text-slate-500">Today Revenue</div>
            <div class="h-10 w-10 rounded-2xl bg-indigo-500/15 text-indigo-700 flex items-center justify-center">💵</div>
          </div>
          <div class="mt-3 text-3xl font-extrabold text-slate-900">2,338</div>
          <div class="mt-2 text-sm font-semibold text-red-600">↓ -2.34% <span class="font-normal text-slate-500">vs last week</span></div>
        </div>

        <!-- Card 3 -->
        <div class="rounded-3xl bg-white/80 backdrop-blur border border-slate-200 shadow-lg p-5">
          <div class="flex items-center justify-between">
            <div class="text-sm text-slate-500">Today Customers</div>
            <div class="h-10 w-10 rounded-2xl bg-violet-500/15 text-violet-700 flex items-center justify-center">🧑‍⚕️</div>
          </div>
          <div class="mt-3 text-3xl font-extrabold text-slate-900">847</div>
          <div class="mt-2 text-sm font-semibold text-emerald-600">↑ +4.63% <span class="font-normal text-slate-500">vs last week</span></div>
        </div>

        <!-- Card 4 -->
        <div class="rounded-3xl bg-white/80 backdrop-blur border border-slate-200 shadow-lg p-5">
          <div class="flex items-center justify-between">
            <div class="text-sm text-slate-500">Today Visitors</div>
            <div class="h-10 w-10 rounded-2xl bg-sky-500/15 text-sky-700 flex items-center justify-center">👁️</div>
          </div>
          <div class="mt-3 text-3xl font-extrabold text-slate-900">23,485</div>
          <div class="mt-2 text-sm font-semibold text-red-600">↓ -2.34% <span class="font-normal text-slate-500">vs last week</span></div>
        </div>

      </div>

      <!-- ✅ CHARTS (REAL) -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- Sales Chart -->
        <div class="rounded-3xl bg-white/80 backdrop-blur border border-slate-200 shadow-lg p-4">
          <div class="flex items-center justify-between px-2">
            <div>
              <div class="font-semibold text-slate-900">Sales Chart</div>
              <div class="text-xs text-slate-500 mt-0.5">Last 7 days</div>
            </div>
            <span class="text-xs px-2 py-1 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-100">Live</span>
          </div>

          <div class="mt-4 h-56 rounded-2xl bg-gradient-to-br from-slate-50 to-slate-100 border border-slate-200 p-3">
            <canvas id="salesChart" class="w-full h-full"></canvas>
          </div>
        </div>

        <!-- Orders Chart -->
        <div class="rounded-3xl bg-white/80 backdrop-blur border border-slate-200 shadow-lg p-4">
          <div class="flex items-center justify-between px-2">
            <div>
              <div class="font-semibold text-slate-900">Order Chart</div>
              <div class="text-xs text-slate-500 mt-0.5">This month</div>
            </div>
            <span class="text-xs px-2 py-1 rounded-full bg-indigo-50 text-indigo-700 border border-indigo-100">Monthly</span>
          </div>

          <div class="mt-4 h-56 rounded-2xl bg-gradient-to-br from-slate-50 to-slate-100 border border-slate-200 p-3">
            <canvas id="ordersChart" class="w-full h-full"></canvas>
          </div>
        </div>

        <!-- Store Stats -->
        <div class="rounded-3xl bg-white/80 backdrop-blur border border-slate-200 shadow-lg p-4">
          <div class="flex items-center justify-between px-2">
            <div>
              <div class="font-semibold text-slate-900">Store Stats</div>
              <div class="text-xs text-slate-500 mt-0.5">Stock status</div>
            </div>
            <span class="text-xs px-2 py-1 rounded-full bg-amber-50 text-amber-700 border border-amber-100">Inventory</span>
          </div>

          <div class="mt-4 grid grid-cols-5 gap-3 items-center">
            <div class="col-span-2 h-40 rounded-2xl bg-gradient-to-br from-slate-50 to-slate-100 border border-slate-200 p-3">
              <canvas id="storeChart" class="w-full h-full"></canvas>
            </div>

            <div class="col-span-3 space-y-3">
              <div class="rounded-2xl border border-slate-200 bg-white/70 p-3">
                <div class="flex items-center justify-between">
                  <div class="text-sm text-slate-500">Available</div>
                  <div class="text-sm font-bold text-emerald-600">65%</div>
                </div>
                <div class="mt-2 h-2 rounded-full bg-slate-100 overflow-hidden">
                  <div class="h-2 bg-emerald-500 rounded-full" style="width:65%"></div>
                </div>
              </div>

              <div class="rounded-2xl border border-slate-200 bg-white/70 p-3">
                <div class="flex items-center justify-between">
                  <div class="text-sm text-slate-500">Low Stock</div>
                  <div class="text-sm font-bold text-amber-600">20%</div>
                </div>
                <div class="mt-2 h-2 rounded-full bg-slate-100 overflow-hidden">
                  <div class="h-2 bg-amber-500 rounded-full" style="width:20%"></div>
                </div>
              </div>

              <div class="rounded-2xl border border-slate-200 bg-white/70 p-3">
                <div class="flex items-center justify-between">
                  <div class="text-sm text-slate-500">Out of Stock</div>
                  <div class="text-sm font-bold text-red-600">15%</div>
                </div>
                <div class="mt-2 h-2 rounded-full bg-slate-100 overflow-hidden">
                  <div class="h-2 bg-red-500 rounded-full" style="width:15%"></div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section>
  </main>

  <!-- ✅ CHARTS JS -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    Chart.defaults.font.family = "ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Arial";
    Chart.defaults.color = "#334155";

    // SALES (Line)
    new Chart(document.getElementById("salesChart"), {
      type: "line",
      data: {
        labels: ["Mon","Tue","Wed","Thu","Fri","Sat","Sun"],
        datasets: [{
          label: "Sales",
          data: [120, 190, 170, 220, 260, 300, 280],
          borderColor: "#10b981",
          backgroundColor: "rgba(16,185,129,0.18)",
          fill: true,
          tension: 0.4,
          pointRadius: 4,
          pointBackgroundColor: "#10b981",
          pointBorderWidth: 0
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: { legend: { display: false } },
        scales: {
          x: { grid: { display: false }, ticks: { color: "#64748b" } },
          y: { grid: { color: "rgba(148,163,184,0.35)" }, ticks: { color: "#64748b" } }
        }
      }
    });

    // ORDERS (Bar)
    new Chart(document.getElementById("ordersChart"), {
      type: "bar",
      data: {
        labels: ["Jan","Feb","Mar","Apr","May","Jun"],
        datasets: [{
          label: "Orders",
          data: [320, 450, 380, 500, 620, 700],
          backgroundColor: "#6366f1",
          borderRadius: 10,
          borderSkipped: false
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: { legend: { display: false } },
        scales: {
          x: { grid: { display: false }, ticks: { color: "#64748b" } },
          y: { grid: { color: "rgba(148,163,184,0.35)" }, ticks: { color: "#64748b" } }
        }
      }
    });

    // STORE (Doughnut)
    new Chart(document.getElementById("storeChart"), {
      type: "doughnut",
      data: {
        labels: ["Available", "Low Stock", "Out of Stock"],
        datasets: [{
          data: [65, 20, 15],
          backgroundColor: ["#10b981", "#f59e0b", "#ef4444"],
          borderWidth: 0
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        cutout: "70%",
        plugins: {
          legend: {
            position: "bottom",
            labels: { boxWidth: 10, padding: 12 }
          }
        }
      }
    });
  </script>

</body>
</html>
