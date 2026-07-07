<div>
    <div class=text-center>
        <flux:heading size="xl">{{ __('ثبت نام') }}</flux:heading>
        <flux:text class="mt-2">{{ __('اطلاعات خواسته شده را کامل کنید.') }}</flux:text>
    </div>

    <form wire:submit="cchchchchc" class="flex flex-col gap-6 mt-5 mb-3" autocomplete="off">

        <x-my.flt-lbl name="first_name_fa" label="{{ __('نام:') }}" maxlength="40" class="tracking-widest font-semibold"
            autofocus required />

        <x-my.flt-lbl name="last_name_fa" label="{{ __('نام خانوادگی:') }}" maxlength="40"
            class="tracking-wider font-semibold" required />

        <x-my.flt-lbl name="n_code" label="{{ __('کدملی:') }}" dir="ltr" maxlength="10"
            class="tracking-wider font-semibold" required inputmode="numeric"/>
        <x-my.flt-lbl name="mobile" label="{{ __('شماره موبایل:') }}" dir="ltr" maxlength="11"
            class="tracking-wider font-semibold" required inputmode="numeric"/>
            <flux:button type="submit" variant="primary" color="teal" class="w-full cursor-pointer">
            {{ __('ادامه ثبت نام') }}
        </flux:button>


    </form>

    <div class="space-x-1 text-sm text-center rtl:space-x-reverse text-zinc-600 dark:text-zinc-400 mt-4">
            <span>{{ __('حساب کاربری داشته اید؟') }}</span>
            <flux:button :href="route('login')" wire:navigate variant="ghost" icon:trailing="arrow-down-left" size="sm"
                         class="cursor-pointer">{{ __('وارد شوید.') }}
            </flux:button>
        </div>

    </div>
