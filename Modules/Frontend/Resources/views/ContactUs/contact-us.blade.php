@extends('notifications::Emails.layout')

@section('email-content')
    <p>You've new contact us request, with the details below,</p>
    <p>Name: <strong>{{ $render_data['name'] }}</strong> </p> 
    <p>Email: <strong>{{ $render_data['email'] }}</strong> </p> 
    <p>Phone: <strong>{{ $render_data['phone'] }}</strong> </p> 
    <p>{{ $render_data['body'] }} </p> 
@endsection