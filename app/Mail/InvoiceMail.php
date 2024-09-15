<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;
use App\Models\OrderItems;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $orderItems;
    public $subTotal;
    public $discount;
    public $total;

    /**
     * Create a new message instance.
     *
     * @param Order $order
     * @param \Illuminate\Database\Eloquent\Collection $orderItems
     * @param float $subTotal
     * @param float $discount
     * @param float $total
     */
    public function __construct(Order $order, $orderItems, $subTotal, $discount, $total)
    {
        $this->order = $order;
        $this->orderItems = $orderItems;
        $this->subTotal = $subTotal;
        $this->discount = $discount;
        $this->total = $total;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Order Invoice #' . $this->order->order_number,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'backEnd.order.invoice', // Ensure this view exists
            with: [
                'order' => $this->order,
                'orderItems' => $this->orderItems,
                'subTotal' => $this->subTotal,
                'discount' => $this->discount,
                'total' => $this->total,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
