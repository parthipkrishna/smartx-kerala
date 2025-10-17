<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Address;

class OrderService
{
    protected $userId;

    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    public function createOrder($request)
    {
        // Retrieve addresses
        $deliveryAddress = Address::find($request->delivery_address_id);
        $billingAddress = Address::find($request->billing_address_id);

        // Calculate final amount
        $finalAmount = $this->calculateFinalAmount($request->total_amount, $request->shipping_cost);
        $orderNumber = $this->generateOrderNumber();

        // Create the order
        $order = Order::create([
            'order_number' => $orderNumber,
            'user_id' => $this->userId,
            'shop_id' => $request->shop_id,
            'total_amount' => $finalAmount,
            'discount' => $request->discount ?? 0,
            'coupon' => $request->coupon_code,
            'total_quantity' => array_sum(array_column($request->order_items, 'quantity')),
            'total_before_tax' => $finalAmount,
            'tax_amount' => 0,
            'shipping_cost' => $request->shipping_cost,
        ]);

        // Save order items
        $this->saveOrderItems($request->order_items, $order);

        return $order;
    }

    protected function calculateFinalAmount($totalAmount, $shippingCost)
    {
        return $totalAmount + $shippingCost;
    }

    protected function saveOrderItems($orderItems, $order)
    {
        foreach ($orderItems as $item) {
            $product = Product::find($item['product_id']);
            OrderItem::create([
                'order_id' => $order->id,
                'status' => 'Pending',
                'product_id' => $item['product_id'],
                'user_id' => $this->userId,
                'quantity' => $item['quantity'],
                'tax_amount' => 0,
                'unit_amount' => $product->price,
                'total_amount' => $product->effective_price,
            ]);
        }
    }

    protected function generateOrderNumber()
    {
        return 'ORD-' . strtoupper(uniqid());
    }
}
