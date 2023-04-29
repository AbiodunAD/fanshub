@if(session('success'))
    <div class="success-box">
        {{ session('success') }}
    </div>
@endif


@if ($errors->any())
    <div class="error-box">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif