<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Score;

class Lesson4_1 extends Page
{
    protected static string $view = 'filament.pages.lesson4_1';

    protected static ?int $navigationSort = 12;

    protected static ?string $navigationGroup = 'Modules';

    protected static ?string $navigationIcon = 'heroicon-s-bookmark';

    protected static ?string $title = 'Module 4: Lesson 1';
 
    protected static ?string $navigationLabel = 'Module 4: Lesson I';
 
    protected static ?string $slug = 'module-4-lesson-1';


    protected static function shouldRegisterNavigation(): bool
    {
        // return auth()->user()->canManageSettings();
        $user = Score::where('userid', '=', auth()->user()->id)->where('module', 'Module 3')->first();
        if ($user != null && auth()->user()->progress > 3){
            return true;
        } else {
            return false;
        }
    }
    public function mount(): void
    {
        abort_unless(Score::where('userid', '=', auth()->user()->id)->where('module', 'Module 3')->first() != null, 403);
    }
}
