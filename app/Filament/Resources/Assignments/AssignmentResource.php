<?php

namespace App\Filament\Resources\Assignments;

use App\Filament\Resources\Assignments\Pages\CreateAssignment;
use App\Filament\Resources\Assignments\Pages\EditAssignment;
use App\Filament\Resources\Assignments\Pages\ListAssignments;
use App\Filament\Resources\Assignments\Schemas\AssignmentForm;
use App\Filament\Resources\Assignments\Tables\AssignmentsTable;
use App\Models\Assignment;
use BackedEnum;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Forms\Components\TextArea;

class AssignmentResource extends Resource
{
    protected static ?string $model = Assignment::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->label('Judul Tugas'),
                TextInput::make('course')
                    ->required()
                    ->maxLength(255)
                    ->label('Mata Kuliah'),
                TextArea::make('description')
                    ->label('Deskripsi')
                    ->columnSpanFull(),
                Forms\Components\DateTimePicker::make('deadline')
                    ->required()
                    ->label('Batas Waktu'),
                Forms\Components\Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'completed' => 'Selesai',
                    ])
                    ->required()
                    ->default('pending')
                    ->label('Status'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return AssignmentsTable::configure($table);
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
            'index' => ListAssignments::route('/'),
            'create' => CreateAssignment::route('/create'),
            'edit' => EditAssignment::route('/{record}/edit'),
        ];
    }
}
