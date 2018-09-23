@extends('layouts.app')

@section('content')

<form class="form-horizontal" method="POST" action="{{ route('getText') }}">
  {{ csrf_field() }}
  <input type="file" accept="audio/*" capture="microphone" id="recorder" name="recorder">
  <audio id="player" controls></audio>
  <button class="btn btn-primary" :disabled="isProcessing" type="submit">Convertir</button>
</form>

@endsection
