<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\User;
use Illuminate\Support\Facades\Route;

class StatsOverview extends BaseWidget
{

    public static function canView(): bool
    {
        if ($currentPath= Route::getFacadeRoot()->current()->uri() == "/"){
            return false;
        } else {
            return true;
        }
    }
    protected static ?string $pollingInterval = null;
    
    public bool $readyToLoad = false;

    public function loadData()
    {
        $this->readyToLoad = true;
    }

    protected function getCards(): array
    {

            if (! $this->readyToLoad) {
                return [
                    Card::make('Total Users', 'loading...'),
                    Card::make('Average User Progress', 'loading...'),
                ];
            }

            sleep (5);

            return [
                Card::make('Total Users', User::all()->count().' active users')
                ->description('Including admin accounts since the launch')
                ->descriptionIcon('heroicon-s-user-group')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('primary'),

                Card::make('Average User Progress', function(){
                    $total = 0;
                    foreach(User::all() as $user){
                        $total += $user->progress;
                    }

                    return round((((($total/User::all()->count())/5)*100)), 0).'%';
                })
                ->description('of the Modules Unlocked by Most')
                ->descriptionIcon('heroicon-s-lock-open')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
            ];
        
    }
}

