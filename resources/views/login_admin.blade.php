<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Login - Pharmacy System</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex items-center justify-center bg-gradient-to-br-from-green-50 to-green-100">

  <div class="bg-white shadow-xl rounded-xl flex w-full max-w-4xl overflow-hidden">

    <!-- Left Side -->
    <div class="hidden md:flex w-1/2 bg-green-600 text-white flex-col items-center justify-center p-10">
      <div class="text-6xl mb-4">💊</div>
      <h2 class="text-3xl font-bold">Pharmacy Admin</h2>
      <p class="mt-2 text-green-100 text-center">
        Manage orders, customers and inventory.
      </p>
    </div>

    <!-- Right Side -->
    <div class="w-full md:w-1/2 p-8">
      <h2 class="text-2xl font-bold text-gray-800 mb-6">Admin Login</h2>

      @if($errors->any())
        <p class="bg-red-100 text-red-600 p-2 rounded mb-4">
          {{ $errors->first() }}
        </p>
      @endif

      <!-- ✅ ONE FORM ONLY -->
      <form method="POST" action="{{ route('login.admin.submit') }}" class="space-y-4">
        @csrf

        <!-- Email -->
        <div class="relative">
          <span class="absolute left-3 top-2.5 text-gray-400">👤</span>
          <input
            name="email"
            type="email"
            placeholder="Admin Email"
            class="w-full pl-10 p-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-500"
            value="{{ old('email') }}"
            required
          />
        </div>

        <!-- Password -->
        <div class="relative">
          <span class="absolute left-3 top-2.5 text-gray-400">🔒</span>

          <input
            id="password"
            name="password"
            type="password"
            placeholder="Password"
            class="w-full pl-10 pr-10 p-2 border rounded focus:outline-none focus:ring-2 focus:ring-green-500"
            required
          />

          <button
            type="button"
            id="togglePassword"
            class="absolute right-3 top-2.5 text-gray-500 hover:text-green-600"
            title="Show/Hide"
          >
            👁️
          </button>
        </div>

        <button
          type="submit"
          class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700 transition"
        >
          Login
        </button>
      </form>
    </div>
  </div>

  <script>
    const btn = document.getElementById("togglePassword");
    const input = document.getElementById("password");
    btn.addEventListener("click", () => {
      input.type = input.type === "password" ? "text" : "password";
    });
  </script>
</body>
</html>
