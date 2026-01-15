<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Messages</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100">

  <!-- SIDEBAR -->
  <div class="fixed left-0 top-0 h-screen w-20 bg-slate-900 text-white flex flex-col items-center py-6 space-y-6">
    <a href="/dashboard" class="text-3xl text-emerald-500" title="Dashboard">💊</a>

    <a href="/dashboard" class="text-2xl p-3 rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white">🏥</a>
    <a href="/customers" class="text-2xl p-3 rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white">🧑‍⚕️</a>
    <a href="/orders" class="text-2xl p-3 rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white">💊</a>

    <a href="/messages" class="text-2xl p-3 rounded-xl bg-emerald-600 text-white">💬</a>

    <div class="flex-1"></div>
    <form method="POST" action="/logout">
      <button type="submit" class="text-2xl p-3 rounded-xl text-red-400 hover:bg-red-600 hover:text-white">⎋</button>
    </form>
  </div>

  <div class="min-h-screen ml-20">
    <!-- Header -->
    <div class="bg-white border-b border-slate-200">
      <div class="max-w-5xl mx-auto px-6 py-4 flex items-center justify-between">
        <div class="flex items-center gap-3">
          <div class="h-10 w-10 rounded-full bg-violet-200 text-violet-700 flex items-center justify-center font-bold">IH</div>
          <div>
            <div class="font-bold text-slate-800">Customer</div>
            <div class="text-sm text-slate-500">Active</div>
          </div>
        </div>

        <a href="/customers" class="px-4 py-2 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 text-slate-700 font-semibold">Back</a>
      </div>
    </div>

    <div class="max-w-5xl mx-auto px-6 py-6">
      <div class="bg-slate-50 border border-slate-200 rounded-2xl overflow-hidden">

        <div id="chatBody" class="h-[70vh] overflow-y-auto p-6 space-y-5">
          <!-- left -->
          <div class="flex gap-3 justify-start">
            <div class="h-10 w-10 rounded-full bg-violet-200 text-violet-700 flex items-center justify-center font-bold">IH</div>
            <div class="max-w-[70%]">
              <div class="px-4 py-3 rounded-2xl text-sm border border-slate-200 bg-white text-slate-800 rounded-tl-md">Hello!</div>
              <div class="mt-1 text-xs text-slate-400">Customer • Today</div>
            </div>
          </div>

          <!-- right -->
          <div class="flex gap-3 justify-end">
            <div class="max-w-[70%]">
              <div class="px-4 py-3 rounded-2xl text-sm bg-emerald-600 text-white rounded-tr-md">How can I help you?</div>
              <div class="mt-1 text-xs text-slate-400 text-right">You • Today</div>
            </div>
            <div class="h-10 w-10 rounded-full bg-violet-200 text-violet-700 flex items-center justify-center font-bold">ME</div>
          </div>
        </div>

        <!-- input -->
        <div class="bg-white border-t border-slate-200 p-4 flex items-center gap-3">
          <button type="button" class="h-11 w-11 rounded-xl bg-emerald-600 text-white flex items-center justify-center text-xl" title="Add">+</button>

          <input id="msgInput" placeholder="Type your message..."
            class="flex-1 h-11 px-4 rounded-xl border border-slate-200 outline-none focus:ring-2 focus:ring-emerald-200" />

          <button id="sendBtn" type="button"
            class="h-11 px-5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-semibold">
            Send
          </button>
        </div>

      </div>
    </div>
  </div>

  <script>
    const sendBtn = document.getElementById("sendBtn");
    const msgInput = document.getElementById("msgInput");
    const chatBody = document.getElementById("chatBody");

    function sendMsg() {
      const t = msgInput.value.trim();
      if (!t) return;

      const wrap = document.createElement("div");
      wrap.className = "flex gap-3 justify-end";
      wrap.innerHTML = `
        <div class="max-w-[70%]">
          <div class="px-4 py-3 rounded-2xl text-sm bg-emerald-600 text-white rounded-tr-md">${t}</div>
          <div class="mt-1 text-xs text-slate-400 text-right">You • now</div>
        </div>
        <div class="h-10 w-10 rounded-full bg-violet-200 text-violet-700 flex items-center justify-center font-bold">ME</div>
      `;
      chatBody.appendChild(wrap);
      msgInput.value = "";
      chatBody.scrollTop = chatBody.scrollHeight;
    }

    sendBtn.addEventListener("click", sendMsg);
    msgInput.addEventListener("keydown", (e) => {
      if (e.key === "Enter") sendMsg();
    });
  </script>
</body>
</html>
