<form action="{{ isset($contact) ? route('contacts.update', $contact) : route('contacts.store') }}" method="POST">
    @csrf
    @if(isset($contact)) @method('PUT') @endif
    <label for="name">Name</label>
    <input type="text" name="name" value="{{ $contact->name ?? '' }}" required />
    <label for="contact">Contact</label>
    <input type="text" name="contact" value="{{ $contact->contact ?? '' }}" required />
    <label for="email">E-mail</label>
    <input type="email" name="email" value="{{ $contact->email ?? '' }}" required />
    <button type="submit">{{ isset($contact) ? 'Update' : 'Create' }}</button>
</form>
