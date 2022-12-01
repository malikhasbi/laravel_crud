@if (Session::has('success'))
<div class="pt-3">
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>

</div>
@endif


@if ($errors->any())
<div class="pt-3">
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $item)
            <li>{{ $item }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif