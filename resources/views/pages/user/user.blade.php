@extends('Site.layout.tamplate')
@section('content')
<div class="content-wrapper">
<div>
<h3>Welcome to page {{Auth::user()->name}}</h3>
</div>
</div>
</div>

@endsection