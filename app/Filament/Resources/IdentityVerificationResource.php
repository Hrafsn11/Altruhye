<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IdentityVerificationResource\Pages;
use App\Models\IdentityVerification;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Actions\Action;
use App\Notifications\IdentityVerificationStatusNotification;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;

class IdentityVerificationResource extends Resource
{
    protected static ?string $model = IdentityVerification::class;

    protected static ?string $navigationIcon = 'heroicon-o-check-circle';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('full_name')->label('Nama Lengkap')->required(),
                TextInput::make('email')->label('Email')->required(),
                TextInput::make('phone_number')->label('Nomor HP')->required(),
                TextInput::make('bank_account_number')->label('Nomor Rekening')->required(),
                TextInput::make('ktp_number')->label('Nomor KTP')->required(),
                FileUpload::make('photo')->label('Foto')->image()->required(),
                Select::make('status')
                    ->label('Status Verifikasi')
                    ->options([
                        'pending' => 'Pending',
                        'approved' => 'Approved',
                        'rejected' => 'Rejected',
                    ])
                    ->default('pending')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('full_name')->label('Nama Lengkap'),
                Tables\Columns\TextColumn::make('email')->label('Email'),
                Tables\Columns\TextColumn::make('phone_number')->label('Nomor HP'),
                Tables\Columns\TextColumn::make('bank_account_number')->label('Nomor Rekening'),
                BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'success' => 'approved',
                        'danger' => 'rejected',
                        'warning' => 'pending',
                    ])
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->label('Dibuat'),
            ])
            ->actions([
                Action::make('approve')
                    ->label('Approve')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->visible(fn($record) => $record->status === 'pending')
                    ->requiresConfirmation()
                    ->action(function ($record) {
                        $record->update(['status' => 'approved']);
                        // Kirim notifikasi
                        if ($record->user) {
                            $record->user->notify(new IdentityVerificationStatusNotification($record));
                        }
                    }),

                Action::make('reject')
                    ->label('Reject')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->visible(fn($record) => $record->status === 'pending')
                    ->requiresConfirmation()
                    ->action(function ($record) {
                        $record->update(['status' => 'rejected']);
                        // Kirim notifikasi
                        if ($record->user) {
                            $record->user->notify(new IdentityVerificationStatusNotification($record));
                        }
                    }),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListIdentityVerifications::route('/'),
            'create' => Pages\CreateIdentityVerification::route('/create'),
            'edit' => Pages\EditIdentityVerification::route('/{record}/edit'),
        ];
    }
}
