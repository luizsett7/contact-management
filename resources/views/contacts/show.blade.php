<x-app-layout>
<h1>{{ $contact->name }}</h1>
<p>{{ $contact->contact }}</p>
<p>{{ $contact->email }}</p>
<a href="{{ route('contacts.edit', $contact) }}">Edit</a>
<form action="{{ route('contacts.destroy', $contact) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
</form>
</x-app-layout>
