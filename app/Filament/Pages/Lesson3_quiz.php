<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Score;

class Lesson3_quiz extends Page
{

    protected static string $view = 'filament.pages.lesson3_quiz';

    protected static ?int $navigationSort = 11;

    protected static ?string $navigationGroup = 'Modules';

    protected static ?string $navigationIcon = 'heroicon-s-pencil';

    protected static ?string $title = 'Module 3: Assessment';
 
    protected static ?string $navigationLabel = 'Module 3: Assessment';
 
    protected static ?string $slug = 'module-3-assessment';


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
