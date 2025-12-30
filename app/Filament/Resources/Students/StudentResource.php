<?php

namespace App\Filament\Resources\Students;

use App\Filament\Resources\Students\Pages\CreateStudent;
use App\Filament\Resources\Students\Pages\EditStudent;
use App\Filament\Resources\Students\Pages\ListStudents;
use App\Filament\Resources\Students\Tables\StudentsTable;
use App\Models\Student;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use BackedEnum;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextArea;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Mahasiswa')
                    ->schema([
                        TextInput::make('nim')
                            ->required()
                            ->maxLength(50)
                            ->label('NIM'),
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->label('Nama Mahasiswa'),
                        Select::make('role')
                            ->options([
                                'Mahasiswa' => 'Mahasiswa',
                            ])
                            ->default('Mahasiswa')
                            ->required(),
                        TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255)
                            ->label('Email'),
                        FileUpload::make('photo')
                            ->disk('public')
                            ->image()
                            ->visibility('public'   )
                            ->directory('students')
                            ->label('Foto Profil'),
                    ])
                    ->columns(2),

                Section::make('Detail Tambahan')
                    ->schema([
                        TextInput::make('quote')
                            ->maxLength(500)
                            ->label('Kutipan')
                            ->columnSpanFull(),
                        TextArea::make('bio')
                            ->label('Deskripsi Diri')
                            ->columnSpanFull(),
                        TextInput::make('instagram')
                            ->maxLength(255)
                            ->label('Instagram'),
                        TextInput::make('linkedin')
                            ->maxLength(255)
                            ->label('LinkedIn'),
                        TextInput::make('github')
                            ->maxLength(255)
                            ->label('GitHub'),
                    ])
                    ->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return StudentsTable::configure($table);
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
            'index' => ListStudents::route('/'),
            'create' => CreateStudent::route('/create'),
            'edit' => EditStudent::route('/{record}/edit'),
        ];
    }
}