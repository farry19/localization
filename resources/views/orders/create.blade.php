@extends('layouts.app')

@section('content')
    <form action="{{ route('store_order') }}" method="post">
        @csrf
        <button type="submit" class="btn btn-primary">Place Order</button>
    </form>
@endsection