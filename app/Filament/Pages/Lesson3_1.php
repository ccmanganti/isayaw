<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Score;

class Lesson3_1 extends Page
{

    protected static string $view = 'filament.pages.lesson3_1';

    protected static ?int $navigationSort = 10;

    protected static ?string $navigationGroup = 'Modules';

    protected static ?string $navigationIcon = 'heroicon-s-bookmark';

    protected static ?string $title = 'Module 3: Lesson 1';
 
    protected static ?string $navigationLabel = 'Module 3: Lesson I';
 
    protected static ?string $slug = 'module-3-lesson-1';

    protected static function shouldRegisterNavigation(): bool
    {
        // return auth()->user()->canManageSettings();
        $user = Score::where('userid', '=', auth()->user()->id)->where('module', 'Module 2')->first();
        if ($user != null && auth()->user()->progress > 2){
            return true;
        } else {
            return false;
        }
    }
    public function mount(): void
    {
        abort_unless(Score::where('userid', '=', auth()->user()->id)->where('module', 'Module 2')->first() != null, 403);
    }
}
