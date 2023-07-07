<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Score;

class Lesson5_1 extends Page
{

    protected static string $view = 'filament.pages.lesson5_1';

    protected static ?int $navigationSort = 16;

    protected static ?string $navigationGroup = 'Modules';

    protected static ?string $navigationIcon = 'heroicon-s-bookmark';

    protected static ?string $title = 'Module 5: Lesson 1';
 
    protected static ?string $navigationLabel = 'Module 5: Lesson I';
 
    protected static ?string $slug = 'module-5-lesson-1';


    protected static function shouldRegisterNavigation(): bool
    {
        // return auth()->user()->canManageSettings();
        $user = Score::where('userid', '=', auth()->user()->id)->where('module', 'Module 4')->first();
        if ($user != null && auth()->user()->progress > 4){
            return true;
        } else {
            return false;
        }
    }
    public function mount(): void
    {
        abort_unless(Score::where('userid', '=', auth()->user()->id)->where('module', 'Module 4')->first() != null, 403);
    }
}
