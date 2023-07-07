<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Score;

class Lesson2_2 extends Page
{
    protected static ?int $navigationSort = 9;

    protected static ?string $navigationGroup = 'Module 2';

    protected static ?string $navigationIcon = 'heroicon-o-bookmark';

    protected static ?string $title = 'Module 2: Lesson 2';
 
    protected static ?string $navigationLabel = 'Lesson II';
 
    protected static ?string $slug = 'module-2-lesson-2';

    protected static string $view = 'filament.pages.lesson2_2';

    protected static function shouldRegisterNavigation(): bool
    {
        // return auth()->user()->canManageSettings();
        // $user = Score::where('userid', '=', auth()->user()->id)->where('module', 'Module 1')->first();
        // if ($user != null && auth()->user()->progress > 1){
        //     return true;
        // } else {
        //     return false;
        // }
        return false;
    }
    public function mount(): void
    {
        // abort_unless(Score::where('userid', '=', auth()->user()->id)->where('module', 'Module 1')->first() != null, 403);
        abort_unless(false, 403);
    }
}
