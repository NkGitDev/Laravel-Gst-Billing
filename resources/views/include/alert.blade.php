<!-- Redirect after inserting party data - with status -->
@if(session('status'))
<div class='alert alert-success'>{{ session('status') }}</div>
@endif

@if(session('error'))
<div class='alert alert-danger'>{{ session('error') }}</div>
@endif


<!-- Validation -->
@if(count($errors))
    <div class="alert alert-danger">
        <strong>Validation : Please fix all following issues</strong>
        <ul>
            @foreach($errors->all() as $err)
                <li>
                    <div>{{ $err }}</div>
                </li>
            @endforeach
        </ul>
    </div>
@endif
