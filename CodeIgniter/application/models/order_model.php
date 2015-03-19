<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order_model extends CI_Model
{
    public function getAllOrders()
    {
        $sql = "SELECT *
                FROM orders";

        $query = $this->db->query($sql);
        $res = array();

        foreach($query->result_array() as $row)
        {
            $res[] = $row;
        }

        return $res;
    }

    public function getOrderById($idOrder)
    {
        $sql = "SELECT *
                FROM order_details
                JOIN products
                ON order_details.id_product_order_details = products.id_products
                JOIN orders
                ON orders.id_orders = order_details.id_orders_order_details
                JOIN customers
                ON orders.id_customer_orders = customers.id_customers
                WHERE order_details.id_orders_order_details = ?";

        $query = $this->db->query($sql, array($idOrder));
        $res = array();

        foreach($query->result_array() as $row)
        {
            $res[] = $row;
        }

        return $res;
    }
}