<?php

namespace Examples\Misc;

class OrderService
{
    public function createOrder(array $data): array
    {
        // Placeholder: transform input into an order structure
        return [
            'id' => uniqid('order_'),
            'customer' => $data['customer'] ?? null,
            'items' => $data['items'] ?? [],
        ];
    }
}
