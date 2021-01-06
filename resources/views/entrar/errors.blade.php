@if ($errors->any())
    <div class="alert alert-danger p-2">
        <ul class="list-group ml-3">
            @foreach ($errors->all() as $error)
                <li class="">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
