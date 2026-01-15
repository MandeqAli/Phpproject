<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Customers - Pharmacy</title>

  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    .dd-hidden { opacity: 0; transform: translateY(-6px); pointer-events: none; }
    .dd-show   { opacity: 1; transform: translateY(0); pointer-events: auto; }
  </style>
</head>

<body class="bg-white">

  <!-- ✅ SIDEBAR -->
  <aside class="fixed left-0 top-0 h-screen w-20 bg-slate-950/95 text-white flex flex-col items-center py-6 space-y-6 border-r border-white/10">
    <!-- Logo -->
    <a href="/dashboard"
      class="h-12 w-12 rounded-2xl bg-emerald-500/15 text-emerald-400 flex items-center justify-center text-2xl"
      title="Dashboard">💊</a>

    <!-- Menu -->
    <nav class="flex flex-col items-center gap-3">
      <a href="/dashboard"
        class="text-2xl p-3 rounded-2xl text-slate-300 hover:bg-white/10 hover:text-white transition"
        title="Dashboard">🏥</a>

      <!-- ✅ Active Customers -->
      <a href="/customers"
        class="text-2xl p-3 rounded-2xl bg-emerald-600 text-white shadow-lg shadow-emerald-500/20"
        title="Customers">🧑‍⚕️</a>

      <a href="/orders"
        class="text-2xl p-3 rounded-2xl text-slate-300 hover:bg-white/10 hover:text-white transition"
        title="Orders">💊</a>

      <a href="/messages"
        class="text-2xl p-3 rounded-2xl text-slate-300 hover:bg-white/10 hover:text-white transition"
        title="Messages">💬</a>
    </nav>

    <div class="flex-1"></div>

    <!-- Logout -->
    <form method="POST" action="/logout" class="pb-2">
      <!-- @csrf -->
      <button type="submit" title="Logout"
        class="text-2xl p-3 rounded-2xl text-red-300 hover:bg-red-500 hover:text-white transition">⎋</button>
    </form>
  </aside>

  <!-- ✅ PAGE CONTENT -->
  <div class="min-h-screen bg-white ml-20">

    <!-- TABLE WRAP -->
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

        <!-- ROW 1 -->
        <a href="/orders/show?id=1"
           class="row-link grid grid-cols-12 px-8 py-6 border-b border-slate-100 hover:bg-slate-50 transition"
           data-order-url="/orders/show?id=1">

          <div class="col-span-4 flex items-center gap-5">
            <div class="h-14 w-14 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold">
              AB
            </div>
            <div class="leading-tight">
              <div class="font-bold text-slate-900 text-[18px]">Abu Bin Ishtiyak</div>
              <div class="text-[15px] text-slate-500">info@softnio.com</div>
            </div>
          </div>

          <div class="col-span-2 flex items-center text-slate-700 text-[16px]">
            +811 847-4958
          </div>

          <div class="col-span-3 flex items-center text-slate-700 text-[16px]">
            Item: Omidon10mg • Qty: 10pcs
          </div>

          <div class="col-span-1 flex items-center justify-end pr-4 font-extrabold text-slate-900 text-[16px]">
            78.55 USD
          </div>

          <div class="col-span-1 flex items-center">
            <span class="status-pill font-bold text-emerald-500 text-[16px]" data-status="confirm">Confirm</span>
          </div>

          <div class="col-span-1 flex items-center justify-end relative">
            <button type="button"
              onclick="toggleMenu(event, this)"
              class="h-10 w-10 rounded-xl hover:bg-slate-100 flex items-center justify-center text-slate-500"
              title="Actions">
              <span class="text-2xl leading-none">⋮</span>
            </button>

            <!-- Dropdown -->
            <div class="action-menu dd-hidden transition-all duration-150 absolute right-0 top-12 w-72 rounded-2xl border border-slate-200 bg-white shadow-xl overflow-hidden z-50">

              <button type="button"
                onclick="setStatus(event, this, 'confirm')"
                class="w-full px-5 py-4 text-left hover:bg-slate-50 flex items-center gap-4">
                <span class="h-12 w-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-xl">✓</span>
                <div>
                  <div class="font-bold text-slate-900 text-[16px]">Confirm</div>
                  <div class="text-sm text-slate-500">Set status to Confirm</div>
                </div>
              </button>

              <button type="button"
                onclick="setStatus(event, this, 'pending')"
                class="w-full px-5 py-4 text-left hover:bg-slate-50 flex items-center gap-4 border-t border-slate-100">
                <span class="h-12 w-12 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center text-xl">⌛</span>
                <div>
                  <div class="font-bold text-slate-900 text-[16px]">Pending</div>
                  <div class="text-sm text-slate-500">Set status to Pending</div>
                </div>
              </button>

              <button type="button"
                onclick="setStatus(event, this, 'cancel')"
                class="w-full px-5 py-4 text-left hover:bg-slate-50 flex items-center gap-4 border-t border-slate-100">
                <span class="h-12 w-12 rounded-2xl bg-red-50 text-red-600 flex items-center justify-center text-xl">✕</span>
                <div>
                  <div class="font-bold text-slate-900 text-[16px]">Cancel</div>
                  <div class="text-sm text-slate-500">Set status to Cancel</div>
                </div>
              </button>

            </div>
          </div>
        </a>

        <!-- ROW 2 -->
        <a href="/orders/show?id=2"
           class="row-link grid grid-cols-12 px-8 py-6 border-b border-slate-100 hover:bg-slate-50 transition"
           data-order-url="/orders/show?id=2">

          <div class="col-span-4 flex items-center gap-5">
            <div class="h-14 w-14 rounded-full bg-orange-100 text-orange-700 flex items-center justify-center font-bold">
              AL
            </div>
            <div class="leading-tight">
              <div class="font-bold text-slate-900 text-[18px]">Ashley Lawson</div>
              <div class="text-[15px] text-slate-500">ashley@softnio.com</div>
            </div>
          </div>

          <div class="col-span-2 flex items-center text-slate-700 text-[16px]">
            +124 394-1787
          </div>

          <div class="col-span-3 flex items-center text-slate-700 text-[16px]">
            Item: Zimax50mg • Qty: 12pcs
          </div>

          <div class="col-span-1 flex items-center justify-end pr-4 font-extrabold text-slate-900 text-[16px]">
            90.20 USD
          </div>

          <div class="col-span-1 flex items-center">
            <span class="status-pill font-bold text-amber-500 text-[16px]" data-status="pending">Pending</span>
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
                  <div class="text-sm text-slate-500">Set status to Confirm</div>
                </div>
              </button>

              <button type="button"
                onclick="setStatus(event, this, 'pending')"
                class="w-full px-5 py-4 text-left hover:bg-slate-50 flex items-center gap-4 border-t border-slate-100">
                <span class="h-12 w-12 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center text-xl">⌛</span>
                <div>
                  <div class="font-bold text-slate-900 text-[16px]">Pending</div>
                  <div class="text-sm text-slate-500">Set status to Pending</div>
                </div>
              </button>

              <button type="button"
                onclick="setStatus(event, this, 'cancel')"
                class="w-full px-5 py-4 text-left hover:bg-slate-50 flex items-center gap-4 border-t border-slate-100">
                <span class="h-12 w-12 rounded-2xl bg-red-50 text-red-600 flex items-center justify-center text-xl">✕</span>
                <div>
                  <div class="font-bold text-slate-900 text-[16px]">Cancel</div>
                  <div class="text-sm text-slate-500">Set status to Cancel</div>
                </div>
              </button>

            </div>
          </div>
        </a>

        <!-- Note -->
        <div class="px-8 py-6 text-[15px] text-slate-500">
          Click any row to open the order page. Confirm will open the order page automatically.
        </div>

      </div>
    </div>

  </div>

  <script>
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

    function setStatus(event, el, status) {
      event.preventDefault();
      event.stopPropagation();

      const row = el.closest(".row-link");
      const pill = row.querySelector(".status-pill");
      const orderUrl = row.dataset.orderUrl || row.getAttribute("href");

      pill.classList.remove("text-emerald-500","text-amber-500","text-red-500");

      if (status === "confirm") {
        pill.textContent = "Confirm";
        pill.classList.add("text-emerald-500");
        closeAllMenus();
        window.location.href = orderUrl; // ✅ Confirm opens order page automatically
        return;
      }

      if (status === "pending") {
        pill.textContent = "Pending";
        pill.classList.add("text-amber-500");
      } else {
        pill.textContent = "Cancel";
        pill.classList.add("text-red-500");
      }

      closeAllMenus();

      // Later: AJAX -> Laravel save status
      // console.log("Save status:", status, "Order:", orderUrl);
    }

    document.addEventListener("click", closeAllMenus);
    document.addEventListener("keydown", (e) => {
      if (e.key === "Escape") closeAllMenus();
    });
  </script>

</body>
</html>
