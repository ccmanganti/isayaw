<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Score;

class Lesson2_1 extends Page
{
    protected static ?int $navigationSort = 8;

    protected static ?string $navigationGroup = 'Modules';

    protected static ?string $navigationIcon = 'heroicon-s-bookmark';

    protected static ?string $title = 'Module 2: Lesson 1';
 
    protected static ?string $navigationLabel = 'Module 2: Lesson I';
 
    protected static ?string $slug = 'module-2-lesson-1';

    protected static string $view = 'filament.pages.lesson2_1';

    protected static function shouldRegisterNavigation(): bool
    {
        // return auth()->user()->canManageSettings();
        $user = Score::where('userid', '=', auth()->user()->id)->where('module', 'Module 1')->first();
        if ($user != null && auth()->user()->progress > 1){
            return true;
        } else {
            return false;
        }
    }
    public function mount(): void
    {
        abort_unless(Score::where('userid', '=', auth()->user()->id)->where('module', 'Module 1')->first() != null, 403);
    }
}
