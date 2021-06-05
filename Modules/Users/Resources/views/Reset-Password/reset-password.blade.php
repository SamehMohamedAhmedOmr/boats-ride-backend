@extends('notifications::Emails.layout')

@section('email-content')

    <p>You are receiving this email because we received a password reset request for your account.</p>
    {{-- <p>Your recovery code is <strong>{{ $render_data['token'] }}</strong> </p> --}}
    <p>Your link is <a href="{{route('reset.password',$render_data['token'])}}"><strong>{{route('reset.password',$render_data['token'])}}</strong></a> </p>
    <p>If you did not request a password reset, no further action is required.</p>

@endsection