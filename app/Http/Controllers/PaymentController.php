<?php

namespace App\Http\Controllers;

use Cart;
use Billow\Contracts\PaymentProcessor;
use App\Http\Controllers\Controller;

Class PaymentController extends Controller
{

    public function confirmPayment(PaymentProcessor $payfast)
    {
        // Eloquent example.
        // $cartTotal = 9999;
        $order = Cart::getContent();
        $cartTotal = Cart::getTotal();
        $m_payment_id = '001';
        $email = 'nkengloic@gmail.com';
        

        // [
        //     'm_payment_id' => '001', // A unique reference for the order.
        //     'amount'       => $cartTotal
        // ]

        // Build up payment Paramaters.
        $payfast->setBuyer('first name', 'last name', $email);
        $payfast->setAmount($cartTotal);
        $payfast->setItem('Laravel for Beginners', 'item-description');
        $payfast->setMerchantReference($m_payment_id);


        // Optionally send confirmation email to seller

        // $payfast->setEmailConfirmation();
        // $payfast->setConfirmationAddress(env('PAYFAST_CONFIRMATION_EMAIL'));


        // Optionally make this a subscription
        // $payfast->setSubscriptionType();    // will default to 1
        // $payfast->setFrequency();           // will default to 3 = monthly if not set
        // $payfast->setCycles();              // will default to 0 = indefinite if not set

        // Return the payment form.
        return $payfast->paymentForm('Pay Now');
    }

    public function itn(Request $request, PaymentProcessor $payfast)
    {
        // Retrieve the Order from persistance. Eloquent Example.
        $order = Order::where('m_payment_id', $request->get('m_payment_id'))->firstOrFail(); // Eloquent Example

        // Verify the payment status.
        $status = $payfast->verify($request, $order->amount, $order->m_payment_id)->status();

        // Handle the result of the transaction.
        switch( $status )
        {
            case 'COMPLETE': // Things went as planned, update your order status and notify the customer/admins.
                break;
            case 'FAILED': // We've got problems, notify admin and contact Payfast Support.
                break;
            case 'PENDING': // We've got problems, notify admin and contact Payfast Support.
                break;
            default: // We've got problems, notify admin to check logs.
                break;
        }
    }

}

