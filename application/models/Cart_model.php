<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Cart_model extends CI_Model
{
    public function get_cart_items()
    {
        return $this->cart->contents(); // Adjust based on how you're storing cart data
    }

    public function get_cart_total()
    {
        return $this->cart->total(); // Get total amount from cart
    }
}
