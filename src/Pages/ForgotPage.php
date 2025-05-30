<?php

declare(strict_types=1);

namespace Ichinya\MoonshineLogin\Pages;

use Ichinya\MoonshineLogin\Layouts\FormLayout;
use MoonShine\Laravel\Pages\Page;
use MoonShine\UI\Components\ActionButton;
use MoonShine\UI\Components\FormBuilder;
use MoonShine\UI\Components\Layout\Divider;
use MoonShine\UI\Components\Layout\Flex;
use MoonShine\UI\Fields\Text;

class ForgotPage extends Page
{
    protected ?string $layout = FormLayout::class;

    public function getBreadcrumbs(): array
    {
        return [
            '#' => $this->getTitle(),
        ];
    }

    public function getTitle(): string
    {
        return $this->title ?: 'ForgotPage';
    }

    protected function components(): iterable
    {
        return [
            FormBuilder::make()
                ->class('authentication-form')
                ->action(route('forgot'))
                ->fields([
                    Text::make('E-mail', 'email')
                        ->required()
                        ->customAttributes([
                            'autofocus' => true,
                            'autocomplete' => 'off',
                        ]),
                ])->submit(__('Reset password'), [
                    'class' => 'btn-primary btn-lg w-full',
                ]),
            Divider::make(),
            Flex::make([
                ActionButton::make(__('Log in'), route('login'))->primary(),
            ])->justifyAlign('start'),
        ];
    }
}
