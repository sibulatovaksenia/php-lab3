<?php

@extends('layouts.app')

@section('content')
    <h1>Редагувати абонента</h1>

    <form action="{{ route('abonents.update', $abonent->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="phone_number" value="{{ $abonent->phone_number }}" required>
        <input type="text" name="home_address" value="{{ $abonent->home_address }}" required>
        <input type="text" name="owner" value="{{ $abonent->owner }}" required>
        <input type="number" name="total_call_duration" value="{{ $abonent->total_call_duration }}" required>
        <input type="number" name="balance" value="{{ $abonent->balance }}" required>
        <button type="submit">Оновити</button>
    </form>
@endsection
