<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Messages - Pharmacy</title>

  <!-- Tailwind -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- ✅ Font Awesome -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer" />
</head>

<body class="bg-slate-50">

  <!-- SIDEBAR -->
  <div class="fixed left-0 top-0 h-screen w-20 bg-slate-900 text-white flex flex-col items-center py-6 space-y-6">

    <!-- Logo -->
    <a href="/dashboard"
      class="h-12 w-12 rounded-2xl bg-emerald-500/15 text-emerald-400 flex items-center justify-center text-xl"
      title="Dashboard">
      <i class="fa-solid fa-pills"></i>
    </a>

    <!-- Menu -->
    <a href="/dashboard"
      class="p-3 rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white"
      title="Dashboard">
      <i class="fa-solid fa-house text-xl"></i>
    </a>

    <a href="/customers"
      class="p-3 rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white"
      title="Customers">
      <i class="fa-solid fa-users text-xl"></i>
    </a>

    <a href="/order_details"
      class="p-3 rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white"
      title="Confirmed Orders">
      <i class="fa-solid fa-clipboard-check text-xl"></i>
    </a>
    
    <a href="{{ route('admin.messages') }}"
      class="p-3 rounded-xl bg-emerald-600 text-white"
      title="Messages">
      <i class="fa-solid fa-envelope text-xl"></i>
    </a>

    <div class="flex-1"></div>

    <!-- Logout -->
   <form method="POST" action="{{ route('logout.admin') }}">
  @csrf
  <button type="submit" title="Logout">
    <i class="fa-solid fa-right-from-bracket text-xl"></i>
  </button>
</form>

  </div>

  <!-- PAGE CONTENT -->
  <div class="min-h-screen ml-20">

    <!-- Header -->
    <div class="bg-white border-b border-slate-200">
      <div class="max-w-5xl mx-auto px-6 py-5">
        <div class="text-sm text-slate-500">Admin</div>
        <div class="text-2xl font-extrabold text-slate-800">Messages</div>
        <div class="text-sm text-slate-500 mt-1">Contact form submissions from users</div>
      </div>
    </div>

    <div class="max-w-5xl mx-auto px-6 py-8">
      <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden">

        <!-- Table Head -->
        <div class="grid grid-cols-12 px-6 py-4 text-[14px] text-slate-500 border-b border-slate-200">
          <div class="col-span-3">Name</div>
          <div class="col-span-3">Email</div>
          <div class="col-span-4">Message</div>
          <div class="col-span-2 text-right">Date</div>
        </div>

        @forelse($messages as $msg)
        <div class="grid grid-cols-12 px-6 py-5 border-b border-slate-100 items-start">
          <div class="col-span-3 font-bold text-slate-900">
            {{ $msg->name }}
          </div>
          <div class="col-span-3 text-sm text-slate-500 break-words pr-2">
            {{ $msg->email }}
          </div>
          <div class="col-span-4 text-slate-700 text-sm whitespace-pre-line">
            {{ $msg->message }}
          </div>
          <div class="col-span-2 text-right text-xs text-slate-400">
            {{ \Carbon\Carbon::parse($msg->created_at)->format('M d, Y H:i') }}
          </div>
        </div>
        @empty
        <div class="px-6 py-10 text-slate-500 text-center">
          <i class="fa-regular fa-envelope-open text-2xl mb-2"></i><br>
          No messages received yet.
        </div>
        @endforelse

      </div>
    </div>
  </div>

</body>
</html>
