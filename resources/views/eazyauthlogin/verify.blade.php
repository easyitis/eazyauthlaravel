@extends('eazyauthlogin.layout')
@section('title', 'Verify - EazyAuth - Easy 2 Factor Authentication')
@section('cardtitle', 'Verify')

@section('content')
@if (!$secretkeymatched)
<form method="POST" action="/verify">
    @csrf
    <input name="userid" id="userid" type="hidden" value="{{ $userid }}">
    <div class="form-group">
        <label for="useremail">Email address *</label>
        <input name="useremail" id="useremail" type="email" class="form-control @error('useremail') is-invalid @enderror" value="{{ $emailentered }}" placeholder="Enter email" readonly required>
        @error('useremail')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="secretkeyentered">Secret Key *</label>
        <input name="secretkeyentered" type="text" class="form-control @error('secretkeyentered') is-invalid @enderror" id="secretkeyentered" placeholder="Enter secret key received by email" autofocus required>
        @error('secretkeyentered')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <button id="verifymebutton" type="submit" class="btn btn-primary" data-loading-text="Verify Me...">Verify Me</button>
</form>
<br>
@else
<div class="alert alert-success" role="alert">
    Secret key verified.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if ($erroroccured)
<div class="alert alert-danger" role="alert">
    Incorrect secret key. Try again.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<br>
<p class="text-justify">
    @if ($secretkeymatched)
    At this point, the user is already verified and your app can perform actions specific to the user.
    @else
    In this step, the user enters the secret key received by email. Your app needs to trigger the 'verify' API with the user's email address, the secret key and your unique integraiton ID. The API returns a verified / not verified status. Based on that you take further action - such as storing the user ID in local memory.
    @endif
</p>
<a href="/">Go Home<a>
        @endsection