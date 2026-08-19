<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'customer_name' => ['required', 'string', 'min:2', 'max:100'],
            'customer_email' => ['required', 'email', 'max:150'],
            'customer_phone' => ['required', 'string', 'min:9', 'max:20'],
            'shipping_address' => ['required', 'string', 'min:10', 'max:500'],
            'city' => ['required', 'string', 'max:100'],
            'province' => ['required', 'string', 'max:100'],
            'postal_code' => ['required', 'digits_between:5,6'],
            'courier' => ['required', 'in:jne,sicepat,gojek'],
            'payment_method' => ['required', 'in:transfer,qris,cod'],
            'notes' => ['nullable', 'string', 'max:500'],
        ];
    }

    public function attributes(): array
    {
        return [
            'customer_name' => 'nama lengkap',
            'customer_email' => 'email',
            'customer_phone' => 'nomor HP',
            'shipping_address' => 'alamat pengiriman',
            'city' => 'kota',
            'province' => 'provinsi',
            'postal_code' => 'kode pos',
            'courier' => 'kurir',
            'payment_method' => 'metode pembayaran',
        ];
    }
}
