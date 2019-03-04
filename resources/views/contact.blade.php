@extends('layouts.main')

@section('content')
    <h1>Liste des demandes de contact</h1>
    <ul>
        @foreach ( $contacts as $contact )
            <li>
                By {{$contact->contact_name}} at {{$contact->contact_date}}
            </li>
        @endforeach
    </ul>
        <h1>Demande de contact</h1>
        {{--<form method="post" action="/contact">--}}
            {{--{{ csrf_field() }}--}}
            {{--<label for="name"> Nom </label>--}}
            {{--<input type="text" id="name" name="name"/>--}}
            {{--<br />--}}
            {{--<label for="email"> Email </label>--}}
            {{--<input type="email" id="email" name="email"/>--}}
            {{--<br />--}}
            {{--<label for="message"> Message </label>--}}
            {{--<textarea id="message" placeholder="Veuillez écrire votre message ici" name="message"></textarea>--}}
            {{--<br />--}}
            {{--<input type="submit" class="button" value="Submit">--}}
        {{--</form>--}}
    <form action="{{ url('/contact') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="text" class="form-control {{ $errors->has('contact_name') ? 'is-invalid' : '' }}" name="contact_name" id="contact_name" placeholder="Votre nom"
                   value="{{ old('contact_name') }}"> {!! $errors->first('contact_name', '
                            <div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <input type="email" class="form-control {{ $errors->has('contact_email') ? 'is-invalid' : '' }}" name="contact_email" id="contact_email" placeholder="Votre email"
                   value="{{ old('contact_email') }}"> {!! $errors->first('contact_email', '
                            <div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <textarea class="form-control {{ $errors->has('contact_message') ? 'is-invalid' : '' }}" name="contact_message" id="contact_message" placeholder="Votre message">{{ old('contact_message') }}</textarea>                            {!! $errors->first('contact_message', '
                            <div class="invalid-feedback">:message</div>') !!}
        </div>
        <button type="submit" class="btn btn-secondary">Envoyer !</button>
    </form>
@endsection