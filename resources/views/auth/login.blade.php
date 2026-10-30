@extends('layouts.app')

@section('title', 'Sign In - Bakuna Tracker')

@section('content')
<div class="max-w-md mx-auto my-12">
    <div class="bg-white rounded-2xl shadow-xl border border-slate-100 overflow-hidden">
        <div class="bg-indigo-700 px-6 py-6 text-white text-center">
            <h2 class="text-2xl font-bold">Health Worker Login</h2>
            <p class="text-indigo-200 text-sm mt-1">Access the Barangay Bakuna dashboard</p>
        </div>

        <form method="POST" action="/login" class="p-6 sm:p-8 space-y-5">
            @csrf

            <div>
                <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-slate-600 mb-1">Email Address</label>
                <input 
                    type="email" 
                    id="email"
                    name="email" 
                    value="{{ old('email') }}" 
                    placeholder="nurse.hisuan@bakuna.test"
                    required
                    class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-slate-800 placeholder-slate-400 text-sm transition"
                >
                @error('email') 
                    <p class="text-rose-600 text-xs mt-1.5 font-medium">{{ $message }}</p> 
                @enderror
            </div>

            <div>
                <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-slate-600 mb-1">Password</label>
                <input 
                    type="password" 
                    id="password"
                    name="password" 
                    placeholder="••••••••" 
                    required
                    class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-slate-800 placeholder-slate-400 text-sm transition"
                >
                @error('password') 
                    <p class="text-rose-600 text-xs mt-1.5 font-medium">{{ $message }}</p> 
                @enderror
            </div>

            <button 
                type="submit" 
                class="w-full py-2.5 px-4 bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 text-white font-semibold rounded-lg shadow-md hover:shadow-lg transition duration-150 cursor-pointer text-sm"
            >
                Sign in
            </button>

            <div class="pt-2 border-t border-slate-100 text-center">
                <p class="text-xs text-slate-400">
                    Default: <span class="font-mono text-slate-600">nurse.hisuan@bakuna.test</span> / <span class="font-mono text-slate-600">bakuna2026</span>
                </p>
            </div>
        </form>
    </div>
</div>
@endsection

