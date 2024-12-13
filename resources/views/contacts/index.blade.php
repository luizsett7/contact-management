<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
             Contacts
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="min-w-full bg-white border border-gray-300">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 bg-gray-100">Name</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 bg-gray-100">Contact</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 bg-gray-100">Email</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 bg-gray-100">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-6 py-4 text-sm text-gray-800">{{ $contact->name }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800">{{ $contact->contact }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800">{{ $contact->email }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800">
                                    <a href="{{ route('contacts.edit', $contact) }}" class="text-blue-600 hover:underline">Edit</a>
                                    <form action="{{ route('contacts.destroy', $contact) }}" method="POST" class="inline-block ml-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>