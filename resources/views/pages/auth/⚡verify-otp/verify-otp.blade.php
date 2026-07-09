<div class="space-y-6">

    <div>

        <flux:input
            wire:model="code"
            type="text"
            maxlength="6"
            dir="ltr"
            class="tracking-[0.5em] text-center"
            autocomplete="one-time-code"
        />
    </div>

    <flux:button
        wire:click="verify"
        variant="primary"
        class="w-full"
    >
        تایید کد
    </flux:button>

</div>
