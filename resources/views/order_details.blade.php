<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Confirmed Orders</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50">

  <!-- SIDEBAR -->
  <div class="fixed left-0 top-0 h-screen w-20 bg-slate-900 text-white flex flex-col items-center py-6 space-y-6">
    <a href="/dashboard" class="text-3xl text-emerald-500" title="Dashboard">💊</a>
    <a href="/dashboard" class="text-2xl p-3 rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white">🏥</a>
    <a href="/customers" class="text-2xl p-3 rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white">🧑‍⚕️</a>
    <a href="/order_details" class="text-2xl p-3 rounded-xl bg-emerald-600 text-white">💊</a>
    <a href="/messages" class="text-2xl p-3 rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white">💬</a>

    <div class="flex-1"></div>
    <form method="POST" action="/logout">
      @csrf
      <button type="submit" class="text-2xl p-3 rounded-xl text-red-400 hover:bg-red-600 hover:text-white">⎋</button>
    </form>
  </div>

  <div class="min-h-screen ml-20">
    <!-- Header -->
    <div class="bg-white border-b border-slate-200">
      <div class="max-w-5xl mx-auto px-6 py-5 flex items-center justify-between">
        <div>
          <div class="text-sm text-slate-500">Orders</div>
          <div class="text-2xl font-extrabold text-slate-800">Confirmed Orders</div>
          <div class="text-sm text-slate-500 mt-1">All orders that are confirmed</div>
        </div>

        <a href="/customers"
          class="px-4 py-2 rounded-xl border border-slate-200 bg-white hover:bg-slate-100 text-slate-700 font-semibold">
          Back
        </a>
      </div>
    </div>

    <div class="max-w-5xl mx-auto px-6 py-8">
      <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden">

        <!-- Table Head -->
        <div class="grid grid-cols-12 px-6 py-4 text-[14px] text-slate-500 border-b border-slate-200">
          <div class="col-span-5">Customer</div>
          <div class="col-span-4">Product</div>
          <div class="col-span-1 text-right">Qty</div>
          <div class="col-span-2 text-right">Amount</div>
        </div>

        @forelse($orders as $order)
          <div class="grid grid-cols-12 px-6 py-5 border-b border-slate-100">
            <div class="col-span-5">
              <div class="font-bold text-slate-900">{{ $order->user->name ?? 'Unknown' }}</div>
              <div class="text-sm text-slate-500">{{ $order->user->email ?? '' }}</div>
            </div>

            <div class="col-span-4 flex items-center text-slate-700">
              {{ $order->product->name ?? 'Unknown Product' }}
            </div>

            <div class="col-span-1 text-right font-semibold text-slate-800">
              {{ $order->quantity ?? 1 }}
            </div>

            <div class="col-span-2 text-right font-extrabold text-slate-900">
              {{ number_format((float)($order->total_price ?? 0), 2) }} USD
            </div>
          </div>
        @empty
          <div class="px-6 py-10 text-slate-500">
            No confirmed orders yet.
          </div>
        @endforelse

      </div>
    </div>
  </div>

</body>
</html>
