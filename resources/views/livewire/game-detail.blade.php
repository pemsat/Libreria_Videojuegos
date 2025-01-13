<div>
    <input type="number" wire:model="rating" min="1" max="5">
    <button wire:click="rate">Submit Rating</button>
    @if (session()->has('message'))
        <p>{{ session('message') }}</p>
    @endif
</div>

