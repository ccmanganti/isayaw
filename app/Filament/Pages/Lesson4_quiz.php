<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Score;

class Lesson4_quiz extends Page
{

    protected static string $view = 'filament.pages.lesson4_quiz';

    protected static ?int $navigationSort = 15;

    protected static ?string $navigationGroup = 'Modules';

    protected static ?string $navigationIcon = 'heroicon-s-pencil';

    protected static ?string $title = 'Module 4: Assessment';
 
    protected static ?string $navigationLabel = 'Module 4: Assessment';
 
    protected static ?string $slug = 'module-4-assessment';


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
