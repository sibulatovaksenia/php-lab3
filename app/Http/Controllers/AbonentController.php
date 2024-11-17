<?php

namespace App\Http\Controllers;

use App\Models\Abonent;
use Illuminate\Http\Request;

class AbonentController extends Controller
{
    /**
     * Показати інформацію про абонента.
     *
     * @param  \App\Models\Abonent  $abonent
     * @return \Illuminate\Http\Response
     */
    public function show(Abonent $abonent)
    {
        $this->authorize('view', $abonent);

        return view('abonents.show', compact('abonent'));
    }

    /**
     * Створити нового абонента.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Abonent::class);

        return view('abonents.create');
    }

    /**
     * Зберегти новий абонент.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Валідація запиту
        $request->validate([
            'phone_number' => 'required|unique:abonents|regex:/^[0-9]{10}$/',
            'home_address' => 'required|string|max:255',
            'owner' => 'required|string|max:255',
            'total_call_duration' => 'required|numeric|min:0',
            'balance' => 'required|numeric|min:0',
        ]);

        // Створення нового абонента
        Abonent::create([
            'phone_number' => $request->phone_number,
            'home_address' => $request->home_address,
            'owner' => $request->owner,
            'total_call_duration' => $request->total_call_duration,
            'balance' => $request->balance,
            'creator_user_id' => auth()->id(),
        ]);

        return redirect()->route('abonents.index')->with('success', 'Абонент успішно доданий!');
    }

    /**
     * Редагувати абонента.
     *
     * @param  \App\Models\Abonent  $abonent
     * @return \Illuminate\Http\Response
     */
    public function edit(Abonent $abonent)
    {
        $this->authorize('update', $abonent);

        return view('abonents.edit', compact('abonent'));
    }

    /**
     * Оновити абонента.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Abonent  $abonent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $abonent = Abonent::findOrFail($id);

        $this->authorize('update', $abonent);

        $abonent->update($request->all());

        return redirect()->route('abonents.index')->with('success', 'Абонент оновлений');
    }

    /**
     * Видалити абонента.
     *
     * @param  \App\Models\Abonent  $abonent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $abonent = Abonent::findOrFail($id);

        $this->authorize('delete', $abonent);

        $abonent->delete();

        return redirect()->route('abonents.index')->with('success', 'Абонент видалений');
    }
}
