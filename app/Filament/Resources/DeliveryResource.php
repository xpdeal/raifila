<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DeliveryResource\Pages;
use App\Filament\Resources\DeliveryResource\RelationManagers;
use App\Models\Delivery;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DeliveryResource extends Resource
{
    protected static ?string $model = Delivery::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                Forms\Components\TextInput::make('document')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('key')
                    ->required()
                    ->maxLength(44),
                Forms\Components\TextInput::make('emitter_document')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('emitter_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('emitter_city')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('emitter_state')
                    ->required()
                    ->maxLength(2),
                Forms\Components\TextInput::make('receiver_document')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('receiver_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('receiver_city')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('receiver_state')
                    ->required()
                    ->maxLength(2),
                Forms\Components\TextInput::make('carrier_document')
                    ->maxLength(255),
                Forms\Components\TextInput::make('carrier_name')
                    ->maxLength(255),
                Forms\Components\TextInput::make('carrier_city')
                    ->maxLength(255),
                Forms\Components\TextInput::make('carrier_state')
                    ->maxLength(2),
                Forms\Components\DateTimePicker::make('issue_date')
                    ->required(),
                Forms\Components\TextInput::make('internal_number')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('status')
                    ->required(),
                Forms\Components\TextInput::make('hash')
                    ->maxLength(255),
                Forms\Components\TextInput::make('instituicao_financeira')
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('timestamp_event'),
                Forms\Components\Toggle::make('is_running_job')
                    ->required(),
                Forms\Components\FileUpload::make('filepath_uri')
                    ->visibility('public')
                    ->directory('uploads/delivery')
                    ->disk('public')
                    ->acceptedFileTypes([
                        'text/xml'
                    ]),
                Forms\Components\TextInput::make('running_job_name')
                    ->maxLength(255),
                Forms\Components\Textarea::make('error_message')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('document')
                    ->searchable(),
                Tables\Columns\TextColumn::make('key')
                    ->searchable(),
                Tables\Columns\TextColumn::make('emitter_document')
                    ->searchable(),
                Tables\Columns\TextColumn::make('emitter_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('emitter_city')
                    ->searchable(),
                Tables\Columns\TextColumn::make('emitter_state')
                    ->searchable(),
                Tables\Columns\TextColumn::make('receiver_document')
                    ->searchable(),
                Tables\Columns\TextColumn::make('receiver_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('receiver_city')
                    ->searchable(),
                Tables\Columns\TextColumn::make('receiver_state')
                    ->searchable(),
                Tables\Columns\TextColumn::make('carrier_document')
                    ->searchable(),
                Tables\Columns\TextColumn::make('carrier_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('carrier_city')
                    ->searchable(),
                Tables\Columns\TextColumn::make('carrier_state')
                    ->searchable(),
                Tables\Columns\TextColumn::make('issue_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('internal_number')
                    ->searchable(),
                Tables\Columns\IconColumn::make('status')
                    ->boolean(),
                Tables\Columns\TextColumn::make('hash')
                    ->searchable(),
                Tables\Columns\TextColumn::make('instituicao_financeira')
                    ->searchable(),
                Tables\Columns\TextColumn::make('timestamp_event')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_running_job')
                    ->boolean(),
                Tables\Columns\TextColumn::make('filepath_uri')
                    ->searchable(),
                Tables\Columns\TextColumn::make('running_job_name')->hidden()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                  //  Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListDeliveries::route('/'),
            //'create' => Pages\CreateDelivery::route('/create'),
            //'edit' => Pages\EditDelivery::route('/{record}/edit'),
        ];
    }
}
