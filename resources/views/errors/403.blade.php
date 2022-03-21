@extends('errors::illustrated-layout')

@section('title', __('Forbidden'))
@section('code', '403 😩')

@section('image')

<div style="background-image: url('/images/errors/403.jpg');" class="absolute pin bg-no-repeat md:bg-left lg:bg-center">
</div>

@endsection

@section('message', __($exception->getMessage() ?: 'Forbidden'))
