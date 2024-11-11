<?php

namespace App\Http\Controllers;

use App\Models\Abonent;
use Illuminate\Http\Request;

class AbonentController extends Controller
{
    // Показати всі абоненти
    public function index()
    {
        $abonents = Abonent::all(); // Отримати всі абоненти
        return view('abonents.index', compact('abonents'));
    }

    // Створення нового абонента
    public function create()
    {
        return view('abonents.create');
    }

    // Зберегти нового абонента
    public function store(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|unique:abonents|regex:/^[0-9]{10}$/',
            'home_address' => 'required',
            'owner' => 'required',
            'total_call_duration' => 'required|numeric',
            'balance' => 'required|numeric',
        ]);

        Abonent::create([
            'phone_number' => $request->phone_number,
            'home_address' => $request->home_address,
            'owner' => $request->owner,
            'total_call_duration' => $request->total_call_duration,
            'balance' => $request->balance,
        ]);

        return redirect()->route('abonents.index');
    }

    // Показати форму для редагування абонента
    public function edit($id)
    {
        $abonent = Abonent::findOrFail($id);
        return view('abonents.edit', compact('abonent'));
    }

    // Оновити абонента
    public function update(Request $request, $id)
    {
        $request->validate([
            'phone_number' => 'required|regex:/^[0-9]{10}$/',
            'home_address' => 'required',
            'owner' => 'required',
            'total_call_duration' => 'required|numeric',
            'balance' => 'required|numeric',
        ]);

        $abonent = Abonent::findOrFail($id);
        $abonent->update([
            'phone_number' => $request->phone_number,
            'home_address' => $request->home_address,
            'owner' => $request->owner,
            'total_call_duration' => $request->total_call_duration,
            'balance' => $request->balance,
        ]);

        return redirect()->route('abonents.index');
    }

    // Видалити абонента
    public function destroy($id)
    {
        $abonent = Abonent::findOrFail($id);
        $abonent->delete();

        return redirect()->route('abonents.index');
    }

    // Пошук абонентів за прізвищем та тривалістю розмов
    public function search(Request $request)
    {
        $request->validate([
            'owner' => 'required|string',
            'total_call_duration' => 'required|numeric',
        ]);

        $abonents = Abonent::where('owner', 'like', '%' . $request->owner . '%')
            ->where('total_call_duration', '>', $request->total_call_duration)
            ->get();

        return view('abonents.index', compact('abonents'));
    }
}
