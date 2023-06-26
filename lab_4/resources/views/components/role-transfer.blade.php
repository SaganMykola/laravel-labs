<div x-data="{ open: false }" @click.outside="open = false">
    <div @click="open = ! open">
        {{ $button }}
    </div>

    <div x-show="open" @click="open = false">
        <div>
            {{ $users }}
        </div>
    </div>
</div>
