<?php

@extends('layouts.app')

@section('content')
    <h1>Створити нового абонента</h1>

    <form action="{{ route('abonents.store') }}" method="POST">
        @csrf
        <input type="text" name="phone_number" placeholder="Номер телефону" required>
        <input type="text" name="home_address" placeholder="Адреса" required>
        <input type="text" name="owner" placeholder="Власник" required>
        <input type="number" name="total_call_duration" placeholder="Тривалість розмов" required>
        <input type="number" name="balance" placeholder="Баланс" required>
        <button type="submit">Зберегти</button>
    </form>
@endsection

