<x-app-layout>
@foreach ($contacts as $contact)
    <tr>
        <td>{{ $contact->name }}</td>
        <td>{{ $contact->contact }}</td>
        <td>{{ $contact->email }}</td>
        <td>
            <a href="{{ route('contacts.edit', $contact) }}">Edit</a>
            <form action="{{ route('contacts.destroy', $contact) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
@endforeach
</x-app-layout>
