<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Order Details</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50">

  <!-- SIDEBAR -->
  <div class="fixed left-0 top-0 h-screen w-20 bg-slate-900 text-white flex flex-col items-center py-6 space-y-6">
    <a href="/dashboard" class="text-3xl text-emerald-500" title="Dashboard">💊</a>
    <a href="/dashboard" class="text-2xl p-3 rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white">🏥</a>
    <a href="/customers" class="text-2xl p-3 rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white">🧑‍⚕️</a>
    <a href="/orders" class="text-2xl p-3 rounded-xl bg-emerald-600 text-white">💊</a>
    <a href="/messages" class="text-2xl p-3 rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white">💬</a>

    <div class="flex-1"></div>
    <form method="POST" action="/logout">
      <button type="submit" class="text-2xl p-3 rounded-xl text-red-400 hover:bg-red-600 hover:text-white">⎋</button>
    </form>
  </div>

  <div class="min-h-screen ml-20">
    <!-- Header -->
    <div class="bg-white border-b border-slate-200">
      <div class="max-w-5xl mx-auto px-6 py-5 flex items-center justify-between">
        <div>
          <div class="text-sm text-slate-500">Order Details</div>
          <div class="text-2xl font-extrabold text-slate-800">Customer Name</div>
          <div class="text-sm text-slate-500 mt-1">email@example.com • +000 000 000</div>
        </div>

        <a href="/customers"
          class="px-4 py-2 rounded-xl border border-slate-200 bg-white hover:bg-slate-100 text-slate-700 font-semibold">
          Back
        </a>
      </div>
    </div>

    <div class="max-w-5xl mx-auto px-6 py-8">
      <div class="bg-white border border-slate-200 rounded-2xl p-6">

        <div class="flex items-start justify-between gap-6">
          <div>
            <div class="text-sm text-slate-500">Order ID</div>
            <div class="font-bold text-slate-800">#1</div>
          </div>

          <div class="text-right">
            <div class="text-sm text-slate-500">Status</div>
            <div class="mt-1">
              <span class="px-3 py-1 rounded-full text-sm font-semibold border bg-emerald-50 text-emerald-700 border-emerald-200">
                Confirm
              </span>
            </div>
          </div>
        </div>

        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-5">
          <div class="p-4 rounded-xl border border-slate-200 bg-slate-50">
            <div class="text-sm text-slate-500">Purchase Details</div>
            <div class="mt-1 font-semibold text-slate-800">Item: Omidon10mg • Qty: 10pcs</div>
          </div>

          <div class="p-4 rounded-xl border border-slate-200 bg-slate-50">
            <div class="text-sm text-slate-500">Amount</div>
            <div class="mt-1 font-semibold text-slate-800">78.55 USD</div>
          </div>
        </div>

        <div class="mt-6 p-4 rounded-xl border border-slate-200">
          <div class="text-sm font-semibold text-slate-700">Notes</div>
          <div class="text-sm text-slate-500 mt-1">
            Replace this page with dynamic data from your Laravel controller.
          </div>
        </div>

      </div>
    </div>
  </div>
</body>
</html>
