<div style="text-align: center">
    <button wire:click="increment">+</button>
    <h1>{{ $count }}</h1>
    <div class="mb-8"></div>

    {{ $name }} <br>
    <input type="text" wire:model.defer="name"><br>

</div>
