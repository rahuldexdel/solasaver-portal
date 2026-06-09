<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h1 class="font-bold text-lg text-gray-900 tracking-tight">Adjust Security Profile Rights</h1>
            <a href="{{ route('admin.users.index') }}" class="text-xs text-gray-500 hover:text-gray-700">← Back to Profiles</a>
        </div>
    </x-slot>

    <div class="max-w-2xl bg-white rounded-xl shadow-sm border border-gray-200 p-6 overflow-hidden">
        
        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-800 text-sm rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-6 pb-4 border-b border-gray-100">
            <h2 class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Target Identity</h2>
            <p class="text-lg font-bold text-gray-900 mt-1">{{ $user->name }}</p>
            <p class="text-sm text-gray-500">{{ $user->email }}</p>
        </div>

        <form action="{{ route('admin.users.role', $user->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="mb-6">
                <label for="role" class="block text-sm font-medium text-gray-700 mb-2">
                    Assign Security Context Role
                </label>
                <select name="role" id="role" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm">
                    @foreach($roles as $role)
                        <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                            {{ ucfirst($role->name) }}
                        </option>
                    @endforeach
                </select>
                @error('role')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
                <a href="{{ route('admin.users.index') }}" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg text-sm font-medium transition">
                    Cancel
                </a>
                <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm font-medium transition shadow-sm">
                    Apply Authorization Changes
                </button>
            </div>
        </form>
    </div>
</x-app-layout>