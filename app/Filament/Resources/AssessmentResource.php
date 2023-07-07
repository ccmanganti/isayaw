<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AssessmentResource\Pages;
use App\Filament\Resources\AssessmentResource\RelationManagers;
use App\Models\Assessment;
use App\Models\Module;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Repeater;

function moduleFunc(){
    $modules = Module::all();
    $arrModules = [];
    foreach($modules as $module){
        $newArr = array($module->module_number => $module->module_number);
        $arrModules = array_merge($arrModules, $newArr);
    }
    return $arrModules;
    
}

class AssessmentResource extends Resource
{
    protected static ?string $model = Assessment::class;


    protected static ?int $navigationSort = 5;

    protected static ?string $navigationGroup = 'Resource Management';

    protected static ?string $navigationIcon = 'heroicon-o-folder-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('module')
                ->options(
                    moduleFunc()
                ) 
                ->required()
                ->preload()
                ->unique(ignorable: fn ($record) => $record)
                ->columnSpan(2),
                Repeater::make('questions')
                ->schema([
                    RichEditor::make('question')
                    ->required()
                    ->columnSpan(2)
                    ->toolbarButtons([
                        'attachFiles',
                        'bold',
                        'italic',
                        'link',
                        'redo',
                        'strike',
                        'undo',
                    ])
                    ->fileAttachmentsDisk('local')
                    ->fileAttachmentsDirectory('public'),
                    RichEditor::make('c1')->required()->label('Choice 1')
                    ->toolbarButtons([
                        'attachFiles',
                        'bold',
                        'italic',
                        'link',
                        'redo',
                        'strike',
                        'undo',
                    ])
                    ->fileAttachmentsDisk('local')
                    ->fileAttachmentsDirectory('public'),
                    RichEditor::make('c2')->required()->label('Choice 2')
                    ->toolbarButtons([
                        'attachFiles',
                        'bold',
                        'italic',
                        'link',
                        'redo',
                        'strike',
                        'undo',
                    ])
                    ->fileAttachmentsDisk('local')
                    ->fileAttachmentsDirectory('public'),
                    RichEditor::make('c3')->required()->label('Choice 3')
                    ->toolbarButtons([
                        'attachFiles',
                        'bold',
                        'italic',
                        'link',
                        'redo',
                        'strike',
                        'undo',
                    ])
                    ->fileAttachmentsDisk('local')
                    ->fileAttachmentsDirectory('public'),
                    RichEditor::make('c4')->required()->label('Choice 4')
                    ->toolbarButtons([
                        'attachFiles',
                        'bold',
                        'italic',
                        'link',
                        'redo',
                        'strike',
                        'undo',
                    ])
                    ->fileAttachmentsDisk('local')
                    ->fileAttachmentsDirectory('public'),
                    Select::make('answer')
                    ->options([
                            'c1' => 'Choice 1',
                            'c2' => 'Choice 2',
                            'c3' => 'Choice 3',
                            'c4' => 'Choice 4',
                    ])
                    ->required()
                    ->preload()
                    ->columnSpan(2),
                ])
                ->columnSpan(2)
                ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('module'),
                TextColumn::make('created_at')->date(),
                TextColumn::make('updated_at')->since()->label('Updated'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAssessments::route('/'),
            'create' => Pages\CreateAssessment::route('/create'),
            'edit' => Pages\EditAssessment::route('/{record}/edit'),
        ];
    }    
}
