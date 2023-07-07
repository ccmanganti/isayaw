<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Score;

class Lesson5_quiz extends Page
{

    protected static string $view = 'filament.pages.lesson5_quiz';

    protected static ?int $navigationSort = 17;

    protected static ?string $navigationGroup = 'Modules';

    protected static ?string $navigationIcon = 'heroicon-s-pencil';

    protected static ?string $title = 'Module 5: Assessment';
 
    protected static ?string $navigationLabel = 'Module 5: Assessment';
 
    protected static ?string $slug = 'module-5-assessment';


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
