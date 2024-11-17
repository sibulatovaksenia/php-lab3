<?php

@extends('layouts.app')

@section('content')
    <h1>Абоненти</h1>

    <form action="{{ route('abonents.search') }}" method="GET">
        <input type="text" name="owner" placeholder="Прізвище абонента">
        <input type="number" name="total_call_duration" placeholder="Мінімальна тривалість розмов">
        <button type="submit">Шукати</button>
    </form>

    <a href="{{ route('abonents.create') }}">Створити нового абонента</a>

    <table>
        <thead>
        <tr>
            <th>Номер телефону</th>
            <th>Адреса</th>
            <th>Власник</th>
            <th>Тривалість розмов</th>
            <th>Баланс</th>
            <th>Дії</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($abonents as $abonent)
            <tr>
                <td>{{ $abonent->phone_number }}</td>
                <td>{{ $abonent->home_address }}</td>
                <td>{{ $abonent->owner }}</td>
                <td>{{ $abonent->total_call_duration }}</td>
                <td>{{ $abonent->balance }}</td>
                <td>
                    <a href="{{ route('abonents.edit', $abonent->id) }}">Редагувати</a>
                    <form action="{{ route('abonents.destroy', $abonent->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Видалити</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
