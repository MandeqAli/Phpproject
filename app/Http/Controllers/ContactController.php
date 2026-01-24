<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function submit(Request $request)
    {
        $data = $request->validate([
            'name'    => ['required', 'string', 'max:255'],
            'email'   => ['required', 'email', 'max:255'],
            'message' => ['required', 'string'],
        ]);

        DB::table('contacts')->insert([
            'name'       => $data['name'],
            'email'      => $data['email'],
            'message'    => $data['message'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json([
            'success' => true,
            'message' => '✅ Message sent successfully!',
        ]);
    }
    public function messages()
    {
        $messages = DB::table('contacts')->orderBy('created_at', 'desc')->get();
        return view('admin.messages', compact('messages'));
    }
}
