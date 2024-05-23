<?php

namespace App\Orchid\Resources;

use Orchid\Crud\Resource;
use Orchid\Screen\TD;

use \App\Models\Horse;

use Orchid\Screen\Fields\Input;
// use Orchid\Screen\TD;
use Orchid\Screen\Sight;

use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Upload;

class HorseResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = Horse::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
        {
        return [
            Input::make('name')
            ->title('Name')
            ->placeholder('Enter name here'),

            TextArea::make('description')
            ->title('Description')
            ->placeholder('Enter description here')
            ->rows(2),

            DateTimer::make('birthday')
            ->title('Birthday')
            ->placeholder('Enter birthday here')
            ->format('Y-m-d'),

            CheckBox::make('available')
            ->value(1)
            ->title('Available')
            ->placeholder('Enter available here')
            ->help('Is available the horse?'),

            Input::make('photo')
            ->title('Photo')
            ->placeholder('Enter photo here'),
/*
            Upload::make('photo')
            ->title('Photo')
            ->placeholder('Enter photo here'),
            //->maxFileSize(1024), // Size in MB            
*/
            Input::make('link')
            ->title('Link')
            ->placeholder('Enter link here'),

            Input::make('price')
            ->title('Price')
            ->placeholder('Enter price here'),
        ];
    }

    /**
     * Get the columns displayed by the resource.
     *
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('id'),

            TD::make('name'),

            TD::make('description'),

            TD::make('birthday'),

            TD::make('unavailable'),

            TD::make('photo'),

            TD::make('link'),

            TD::make('price'),

            TD::make('created_at', 'Date of creation')
                ->render(function ($model) {
                    return $model->created_at->toDateTimeString();
                }),

            TD::make('updated_at', 'Update date')
                ->render(function ($model) {
                    return $model->updated_at->toDateTimeString();
                }),
        ];
    }

    /**
     * Get the sights displayed by the resource.
     *
     * @return Sight[]
     */
    public function legend(): array
    {
        return [
            Sight::make('id'),
            Sight::make('name'),
            Sight::make('description'),
            Sight::make('birthday'),
            Sight::make('unavailable'),
            Sight::make('photo'),
            Sight::make('link'),
            Sight::make('price'),
        ];
    }
    /**
     * Get the filters available for the resource.
     *
     * @return array
     */
    public function filters(): array
    {
        return [];
    }
}
