@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Інформація про абонента</h1>

        <div class="card">
            <div class="card-header">
                <h2>Абонент: {{ $abonent->owner }}</h2>
            </div>
            <div class="card-body">
                <p><strong>Номер телефону:</strong> {{ $abonent->phone_number }}</p>
                <p><strong>Домашня адреса:</strong> {{ $abonent->home_address }}</p>
                <p><strong>Тривалість дзвінків:</strong> {{ $abonent->total_call_duration }} хв</p>
                <p><strong>Баланс:</strong> {{ $abonent->balance }} грн</p>

                <!-- Вивести ім'я користувача, який створив абонента -->
                <p><strong>Створено користувачем:</strong> {{ $abonent->creator->name }}</p>
            </div>
            <div class="card-footer">
                <a href="{{ route('abonents.index') }}" class="btn btn-primary">Повернутися до списку</a>
                <a href="{{ route('abonents.edit', $abonent->id) }}" class="btn btn-warning">Редагувати</a>

                <form action="{{ route('abonents.destroy', $abonent->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Ви впевнені, що хочете видалити цього абонента?')">
                        Видалити
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
