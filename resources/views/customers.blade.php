<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Customers - Pharmacy</title>

  <script src="https://cdn.tailwindcss.com"></script>

  <!-- ✅ CSRF token for POST -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <style>
    .dd-hidden {
      opacity: 0;
      transform: translateY(-6px);
      pointer-events: none;
    }

    .dd-show {
      opacity: 1;
      transform: translateY(0);
      pointer-events: auto;
    }
  </style>
</head>

<body class="bg-white">

  <!-- ✅ SIDEBAR -->
  <!-- Font Awesome (hal mar ku dar head-ka) -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

  <!-- SIDEBAR -->
  <aside class="fixed left-0 top-0 h-screen w-20 bg-slate-950/95 text-white flex flex-col items-center py-6 space-y-6 border-r border-white/10">

    <!-- Logo -->
    <a href="/dashboard"
      class="h-12 w-12 rounded-2xl bg-emerald-500/15 text-emerald-400 flex items-center justify-center text-xl shadow-lg shadow-emerald-500/10"
      title="Dashboard">
      <i class="fa-solid fa-pills"></i>
    </a>

    <!-- Navigation -->
    <nav class="flex flex-col items-center gap-3">

      <!-- Dashboard -->
      <a href="/dashboard"
        class="group relative p-3 rounded-2xl bg-emerald-500 text-white shadow-lg shadow-emerald-500/20"
        title="Dashboard">
        <i class="fa-solid fa-gauge-high text-xl"></i>
      </a>

      <!-- Customers -->
      <a href="/customers"
        class="group relative p-3 rounded-2xl text-slate-300 hover:bg-white/10 hover:text-white transition"
        title="Customers">
        <i class="fa-solid fa-user-group text-xl"></i>
      </a>

      <!-- Orders -->
      <a href="/order_details"
        class="group relative p-3 rounded-2xl text-slate-300 hover:bg-white/10 hover:text-white transition"
        title="Orders">
        <i class="fa-solid fa-clipboard-list text-xl"></i>
      </a>

      <!-- Messages -->
      <a href="{{ route('admin.messages') }}"
        class="group relative p-3 rounded-2xl text-slate-300 hover:bg-white/10 hover:text-white transition"
        title="Messages">
        <i class="fa-solid fa-envelope text-xl"></i>
      </a>

    </nav>

    <div class="flex-1"></div>

    <!-- Logout -->
   <form method="POST" action="{{ route('logout.admin') }}">
  @csrf
  <button type="submit" title="Logout">
    <i class="fa-solid fa-right-from-bracket text-xl"></i>
  </button>
</form>


  </aside>

  
  <div class="min-h-screen bg-white ml-20">

    <div class="max-w-6xl mx-auto px-6 py-8">
      <div class="border border-slate-200 rounded-2xl overflow-hidden bg-white">

        <!-- Header -->
        <div class="grid grid-cols-12 px-8 py-4 text-[15px] text-slate-500 border-b border-slate-200 bg-white">
          <div class="col-span-4">Customer</div>
          <div class="col-span-2">Phone</div>
          <div class="col-span-3">Purchase Details</div>
          <div class="col-span-1 text-right pr-4">Amount</div>
          <div class="col-span-1">Status</div>
          <div class="col-span-1"></div>
        </div>

      
        @forelse($orders as $order)
        @php
        $userName = $order->user->name ?? 'Unknown';
        $userEmail = $order->user->email ?? '';
        $userPhone = $order->user->phone ?? '-';
        $productName = $order->product->name ?? 'Unknown Product';
        $qty = $order->quantity ?? 1;
        $amount = $order->total_price ?? 0;
        $status = $order->status ?? 'pending';

        $parts = preg_split('/\s+/', trim($userName));
        $initials = '';
        if (count($parts) >= 2) {
        $initials = strtoupper(substr($parts[0],0,1) . substr($parts[1],0,1));
        } else {
        $initials = strtoupper(substr($userName,0,2));
        }

        $statusText = ucfirst($status);
        $statusClass = 'text-amber-500';
        if ($status === 'shipped' || $status === 'confirm') $statusClass = 'text-emerald-500';
        if ($status === 'cancel' || $status === 'cancelled') $statusClass = 'text-red-500';
        @endphp

      
        <a href="#"
          id="order-row-{{ $order->id }}"
          data-order-id="{{ $order->id }}"
          class="row-link grid grid-cols-12 px-8 py-6 border-b border-slate-100 hover:bg-slate-50 transition">

          <div class="col-span-4 flex items-center gap-5">
            <div class="h-14 w-14 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold">
              {{ $initials }}
            </div>
            <div class="leading-tight">
              <div class="font-bold text-slate-900 text-[18px]">{{ $userName }}</div>
              <div class="text-[15px] text-slate-500">{{ $userEmail }}</div>
            </div>
          </div>

          <div class="col-span-2 flex items-center text-slate-700 text-[16px]">
            {{ $userPhone }}
          </div>

          <div class="col-span-3 flex items-center text-slate-700 text-[16px]">
            Item: {{ $productName }} • Qty: {{ $qty }}
          </div>

          <div class="col-span-1 flex items-center justify-end pr-4 font-extrabold text-slate-900 text-[16px]">
            {{ number_format((float)$amount, 2) }} USD
          </div>

          <div class="col-span-1 flex items-center">
            <span class="status-pill font-bold {{ $statusClass }} text-[16px]" data-status="{{ $status }}">
              {{ $statusText }}
            </span>
          </div>

          <div class="col-span-1 flex items-center justify-end relative">
            <button type="button"
              onclick="toggleMenu(event, this)"
              class="h-10 w-10 rounded-xl hover:bg-slate-100 flex items-center justify-center text-slate-500"
              title="Actions">
              <span class="text-2xl leading-none">⋮</span>
            </button>

            <div class="action-menu dd-hidden transition-all duration-150 absolute right-0 top-12 w-72 rounded-2xl border border-slate-200 bg-white shadow-xl overflow-hidden z-50">

              <button type="button"
                onclick="setStatus(event, this, 'confirm')"
                class="w-full px-5 py-4 text-left hover:bg-slate-50 flex items-center gap-4">
                <span class="h-12 w-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-xl">✓</span>
                <div>
                  <div class="font-bold text-slate-900 text-[16px]">Confirm</div>
                  <div class="text-sm text-slate-500">Move to confirmed orders</div>
                </div>
              </button>

              <button type="button"
                onclick="setStatus(event, this, 'pending')"
                class="w-full px-5 py-4 text-left hover:bg-slate-50 flex items-center gap-4 border-t border-slate-100">
                <span class="h-12 w-12 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center text-xl">⌛</span>
                <div>
                  <div class="font-bold text-slate-900 text-[16px]">Pending</div>
                  <div class="text-sm text-slate-500">Stay on this page</div>
                </div>
              </button>

              <button type="button"
                onclick="setStatus(event, this, 'cancel')"
                class="w-full px-5 py-4 text-left hover:bg-slate-50 flex items-center gap-4 border-t border-slate-100">
                <span class="h-12 w-12 rounded-2xl bg-red-50 text-red-600 flex items-center justify-center text-xl">✕</span>
                <div>
                  <div class="font-bold text-slate-900 text-[16px]">Cancel</div>
                  <div class="text-sm text-slate-500">Delete & remove order</div>
                </div>
              </button>

            </div>
          </div>
        </a>

        @empty
        <div class="px-8 py-8 text-[15px] text-slate-500">
          No customers/orders yet. Place an order from cart to see it here.
        </div>
        @endforelse

      </div>
    </div>

  </div>

  <script>
    function csrfToken() {
      const el = document.querySelector('meta[name="csrf-token"]');
      return el ? el.getAttribute('content') : '';
    }

    function closeAllMenus() {
      document.querySelectorAll(".action-menu").forEach(m => {
        m.classList.remove("dd-show");
        m.classList.add("dd-hidden");
      });
    }

    function toggleMenu(event, btn) {
      event.preventDefault();
      event.stopPropagation();

      const menu = btn.parentElement.querySelector(".action-menu");
      const isOpen = menu.classList.contains("dd-show");

      closeAllMenus();

      if (!isOpen) {
        menu.classList.remove("dd-hidden");
        requestAnimationFrame(() => menu.classList.add("dd-show"));
      }
    }

   
    async function setStatus(event, el, status) {
      event.preventDefault();
      event.stopPropagation();

      const row = el.closest(".row-link");
      const pill = row.querySelector(".status-pill");
      const orderId = row.dataset.orderId;

      if (!orderId) {
        closeAllMenus();
        return;
      }

   
      if (status === "confirm") {
        try {
          const res = await fetch(`/orders/${orderId}/status`, {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
              "X-CSRF-TOKEN": csrfToken(),
              "Accept": "application/json"
            },
            body: JSON.stringify({
              status: "confirm"
            })
          });

          const data = await res.json();
          if (data && data.success) {
            closeAllMenus();
            window.location.href = "/order_details";
            return;
          }
        } catch (e) {
          console.error(e);
        }

        closeAllMenus();
        return;
      }

   
      if (status === "pending") {
        try {
          const res = await fetch(`/orders/${orderId}/status`, {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
              "X-CSRF-TOKEN": csrfToken(),
              "Accept": "application/json"
            },
            body: JSON.stringify({
              status: "pending"
            })
          });

          const data = await res.json();
          if (data && data.success) {
            pill.classList.remove("text-emerald-500", "text-amber-500", "text-red-500");
            pill.textContent = "Pending";
            pill.classList.add("text-amber-500");
          }
        } catch (e) {
          console.error(e);
        }

        closeAllMenus();
        return;
      }

  
      if (status === "cancel") {
        if (!confirm("Are you sure you want to cancel and delete this order?")) {
          closeAllMenus();
          return;
        }

        try {
          const res = await fetch(`/orders/${orderId}/delete`, {
            method: "POST",
            headers: {
              "X-CSRF-TOKEN": csrfToken(),
              "Accept": "application/json"
            }
          });

          const data = await res.json();
          if (data && data.success) {
            row.remove();
          }
        } catch (e) {
          console.error(e);
        }

        closeAllMenus();
        return;
      }

      closeAllMenus();
    }

  
    document.querySelectorAll(".row-link").forEach(a => {
      a.addEventListener("click", function(e) {
        e.preventDefault();
      });
    });

    document.addEventListener("click", closeAllMenus);
    document.addEventListener("keydown", (e) => {
      if (e.key === "Escape") closeAllMenus();
    });
  </script>

</body>

</html>