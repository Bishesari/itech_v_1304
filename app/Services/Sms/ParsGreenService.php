<?php
namespace App\Services\Sms;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ParsGreenService
{
    protected string $baseUrl;
    protected string $apiKey;

    public function __construct()
    {
        $this->baseUrl = rtrim(config('parsgreen.base_url'), '/') . '/Apiv2';
        $this->apiKey = config('parsgreen.api_key');
    }

    /**
     * OTP ارسال
     */
    public function sendOtp(string $mobile, string $code, int $templateId = 0): array
    {
        return $this->request('Message/SendOtp', [
            'Mobile' => $mobile,
            'SmsCode' => $code,
            'TemplateId' => $templateId,
        ]);
    }

    /**
     * پیامک عادی
     */
    public function sendMessage(string|array $mobiles, string $text): array
    {
        return $this->request('Message/SendSms', [
            'Mobiles' => (array) $mobiles,
            'SmsBody' => $text,
        ]);
    }

    /**
     * ارسال عمومی (تنها نقطه خروجی)
     */
    protected function request(string $endpoint, array $payload): array
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => 'BASIC APIKEY:' . $this->apiKey,
                'Accept' => 'application/json',
            ])->post($this->baseUrl . '/' . ltrim($endpoint, '/'), $payload);

            if ($response->failed()) {
                Log::error('ParsGreen Error', [
                    'endpoint' => $endpoint,
                    'body' => $response->body(),
                ]);

                return [
                    'success' => false,
                    'message' => 'HTTP_ERROR',
                    'data' => null,
                ];
            }

            return [
                'success' => true,
                'message' => 'OK',
                'data' => $response->json(),
            ];

        } catch (\Throwable $e) {
            Log::error('ParsGreen Exception', [
                'message' => $e->getMessage(),
            ]);

            return [
                'success' => false,
                'message' => $e->getMessage(),
                'data' => null,
            ];
        }
    }
}
