<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abonent extends Model
{
    use HasFactory;

    // Визначте, які атрибути можуть бути масово заповнені
    protected $fillable = [
        'phone_number',
        'home_address',
        'owner',
        'total_call_duration',
        'balance'
    ];

}
class AbonentController extends Controller
{
    // Перевірка прав на перегляд абонента
    public function show($id)
    {
        $abonent = Abonent::findOrFail($id);

        // Перевіряємо, чи користувач має право переглядати цього абонента
        $this->authorize('view', $abonent);

        return view('abonents.show', compact('abonent'));
    }

    // Перевірка прав на редагування абонента
    public function edit($id)
    {
        $abonent = Abonent::findOrFail($id);

        // Перевіряємо, чи користувач має право редагувати цього абонента
        $this->authorize('update', $abonent);

        return view('abonents.edit', compact('abonent'));
    }

    // Перевірка прав на видалення абонента
    public function destroy($id)
    {
        $abonent = Abonent::findOrFail($id);

        // Перевіряємо, чи користувач має право видаляти цього абонента
        $this->authorize('delete', $abonent);

        $abonent->delete();

        return redirect()->route('abonents.index')->with('success', 'Абонент успішно видалений!');
    }
    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_user_id');
    }
}
