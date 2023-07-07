<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Score;

class Lesson4_4 extends Page
{

    protected static string $view = 'filament.pages.lesson4_4';

    protected static ?int $navigationSort = 15;

    protected static ?string $navigationGroup = 'Modules';

    protected static ?string $navigationIcon = 'heroicon-s-bookmark';

    protected static ?string $title = 'Module 4: Lesson 4';
 
    protected static ?string $navigationLabel = 'Module 4: Lesson IV';
 
    protected static ?string $slug = 'module-4-lesson-4';


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
