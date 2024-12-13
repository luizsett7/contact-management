<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
           Edit Contact
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-semibold text-gray-800 mb-4">
                        {{ isset($contact) ? 'Edit Contact' : 'Add Contact' }}
                    </h1>
                    <form action="{{ isset($contact) ? route('contacts.update', $contact) : route('contacts.store') }}" method="POST">
                        @csrf
                        @if(isset($contact)) @method('PUT') @endif

                        <!-- Name Input -->
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                            <input type="text"
                                id="name"
                                name="name"
                                value="{{ $contact->name ?? '' }}"
                                required
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
                        </div>

                        <!-- Contact Input -->
                        <div class="mb-4">
                            <label for="contact" class="block text-sm font-medium text-gray-700 mb-1">Contact</label>
                            <input type="text"
                                id="contact"
                                name="contact"
                                value="{{ $contact->contact ?? '' }}"
                                required
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
                        </div>

                        <!-- Email Input -->
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">E-mail</label>
                            <input type="email"
                                id="email"
                                name="email"
                                value="{{ $contact->email ?? '' }}"
                                required
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
                        </div>

                        <!-- Submit Button -->
                        <button type="submit"
                            class="w-full bg-blue-600 py-2 px-4 rounded-md hover:bg-blue-700 transition">
                            {{ isset($contact) ? 'Update' : 'Create' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>