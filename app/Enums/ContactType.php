<?php
namespace App\Enums;

enum ContactType: int
{
    case MOBILE = 1;
    case PHONE = 2;
    case EMAIL = 3;
    case WHATSAPP = 4;
    case TELEGRAM = 5;

    /**
     * Human-readable label for UI
     */
    public function label(): string
    {
        return match ($this) {
            self::MOBILE => 'mobile',
            self::PHONE => 'phone',
            self::EMAIL => 'email',
            self::WHATSAPP => 'WhatsApp',
            self::TELEGRAM => 'telegram',
        };
    }

    /**
     * Optional: validation helper
     */
    /**
     * @return array<int, int>
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
