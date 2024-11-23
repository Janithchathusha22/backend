<?php

namespace App\Livewire;

use Filament\Forms;
use Livewire\Component;

class Posts extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public $title;
    public $content;

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('title')
                ->label('Title')
                ->required(),
            Forms\Components\MarkdownEditor::make('content')
                ->label('Content'),
        ];
    }

    public function submit()
    {
        // Handle form submission
        $data = $this->form->getState();
        dd($data); // Debugging: Output the form data to check submission
    }

    public function render()
    {
        return view('livewire.posts', ['name' => 'Chathu']);
    }
}
