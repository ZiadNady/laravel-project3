<form action="{{ route('countries.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div>
        <label for="country_name">Name:</label>
        <input type="text" name="country_name" id="country_name">
        @error('country_name')
            <div>{{ $message }}</div>
        @enderror
    </div>

    <div>
        <button type="submit">Create Country</button>
    </div>
</form>
