@extends('eazyauthlogin.layout')
@section('title', 'Sign In - EazyAuth - Easy 2 Factor Authentication')
@section('cardtitle', 'Sign In')


@section('content')
<form method="POST" action="/login">
    @csrf
    <div class="form-group">
        <label for="useremail">Email address *</label>
        <input name="useremail" id="useremail" type="email" class="form-control @error('useremail') is-invalid @enderror" value="{{ old('useremail') }}" placeholder="Enter email" autofocus required>
        @error('useremail')
        <div class=" alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <button id="findmebutton" type="submit" class="btn btn-primary" data-loading-text="Find Me...">Find Me</button>
</form>
<br>
<p class="text-justify">
    This is the first step where the user enters their email address. Your app needs to trigger the 'find' API with the user's email address and your unique integraiton ID. The API searches for the email address, creates a user record if it doesn't exist and returns a unique user ID. You can use this user ID in your app to store other user properties.
</p>
<a href="/">Go Home<a>
        @endsection