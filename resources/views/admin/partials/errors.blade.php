@isset($errors)
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger alert-dissmissible fade show" dir="rtl" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                <strong>{{ $error }}</strong>
            </div>
        @endforeach
    @endif
@endisset
