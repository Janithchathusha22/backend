<div>
    <form wire:submit.prevent="submit">
        {{ $this->form }}

        <button type="submit">
            Submit
        </button>
    </form>

    <h1>{{ $name }}</h1>
</div>
