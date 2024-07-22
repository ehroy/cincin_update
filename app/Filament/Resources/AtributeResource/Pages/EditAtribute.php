<?php

namespace App\Filament\Resources\AtributeResource\Pages;

use App\Filament\Resources\AtributeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAtribute extends EditRecord
{
    protected static string $resource = AtributeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
