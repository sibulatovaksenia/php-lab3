<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Реєструє будь-які служби в контейнері.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Виконує будь-які ініціалізаційні завдання.
     *
     * @return void
     */
    public function boot()
    {
        // Створення Blade директиви для перевірки ролі
        Blade::directive('role', function ($role) {
            return "<?php if(auth()->check() && auth()->user()->role === {$role}) : ?>";
        });

        Blade::directive('endrole', function () {
            return '<?php endif; ?>';
        });
    }
}
