<x-app-layout>
    <div class="container mx-auto p-4">
        <div class="max-w-md mx-auto bg-white shadow-md rounded-lg p-6">
            <!-- Contact Name -->
            <h1 class="text-2xl font-bold text-gray-800 mb-4">{{ $contact->name }}</h1>

            <!-- Contact Details -->
            <div class="mb-4">
                <p class="text-sm text-gray-600 font-semibold mb-1">Contact</p>
                <p class="text-lg text-gray-700">{{ $contact->contact }}</p>
            </div>
            <div class="mb-6">
                <p class="text-sm text-gray-600 font-semibold mb-1">E-mail</p>
                <p class="text-lg text-gray-700">{{ $contact->email }}</p>
            </div>

            <!-- Actions -->
            <div class="flex justify-between items-center">
                <a href="{{ route('contacts.edit', $contact) }}"
                    class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition">
                    Edit
                </a>
                <form action="{{ route('contacts.destroy', $contact) }}" method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this contact?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="bg-red-600 text-white py-2 px-4 rounded-md hover:bg-red-700 transition">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>