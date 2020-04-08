@extends('layouts.app')

@section('content')
	<div class="col-sm-12" id="app">
      <h1 class="page-header">Languages and Localized Strings</h1>
      <localization-component :languages="{{ $languages->toJson() }}" />
    </div>
@endsection