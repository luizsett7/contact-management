<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Create Contact
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-xl font-bold text-gray-700 mb-4">
                        {{ isset($contact) ? 'Update Contact' : 'Create Contact' }}
                    </h1>
                    <form action="{{ isset($contact) ? route('contacts.update', $contact) : route('contacts.store') }}" method="POST">
                        @csrf
                        @if(isset($contact)) @method('PUT') @endif

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                            <input type="text"
                                name="name"
                                value="{{ $contact->name ?? '' }}"
                                required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400" />
                        </div>

                        <div class="mb-4">
                            <label for="contact" class="block text-sm font-medium text-gray-700 mb-1">Contact</label>
                            <input type="text"
                                name="contact"
                                value="{{ $contact->contact ?? '' }}"
                                required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400" />
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">E-mail</label>
                            <input type="email"
                                name="email"
                                value="{{ $contact->email ?? '' }}"
                                required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400" />
                        </div>

                        <button type="submit"
                            class="w-full bg-blue-500 py-2 px-4 rounded-lg hover:bg-blue-600 transition">
                            {{ isset($contact) ? 'Update' : 'Create' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>