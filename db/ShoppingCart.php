<?php
require_once "DBController.php";
class ShoppingCart extends DBController
{

   function getItemById($cartId)
   {
      $query = "SELECT * FROM cart WHERE id=?";
      $params = array(array("param_type" => "i", "param_value" => $cartId));
      $item = $this->getDBResult($query, $params);
      return $item;
   }

   function getAllProduct()
   {
      $query = "SELECT * FROM services";

      $serviceResult = $this->getDBResult($query);
      return $serviceResult;
   }
   function getMemberCartItem($id_user)
   {
      $query = "SELECT services.*, cart.id as cart_id, cart.quantity FROM services 
               INNER JOIN cart ON cart.service_id=services.id AND cart.id_user=?";

      $params = array(array("param_type" => "i", "param_value" => $id_user));

      $cartResult = $this->getDBResult($query, $params);
      return $cartResult;
   }
   function getProductByCode($service_code)
   {
      $query = "SELECT * FROM services WHERE code=?";

      $params = array(array("param_type" => "s", "param_value" => $service_code));

      $serviceResult = $this->getDBResult($query, $params);
      return $serviceResult;
   }

   function getCartItemByProduct($service_id, $id_user)
   {
      $query = "SELECT * FROM cart WHERE service_id = ? AND id_user = ?";

      $params = array(
         array("param_type" => "i", "param_value" => $service_id),
         array("param_type" => "i", "param_value" => $id_user)
      );

      $cartResult = $this->getDBResult($query, $params);
      return $cartResult;
   }

   function addToCart($service_id, $quantity, $id_user)
   {
      $query = "INSERT INTO cart (service_id,quantity,id_user) VALUES (?, ?, ?)";

      $params = array(
         array("param_type" => "i", "param_value" => $service_id),
         array("param_type" => "i", "param_value" => $quantity),
         array("param_type" => "i", "param_value" => $id_user)
      );

      $this->updateDB($query, $params);
   }

   function updateCartQuantity($quantity, $cart_id)
   {
      $query = "UPDATE cart SET quantity = ? WHERE id= ?";

      $params = array(array("param_type" => "i", "param_value" => $quantity), array("param_type" => "i", "param_value" => $cart_id));

      $this->updateDB($query, $params);
   }
   function deleteCartItem($cart_id)
   {
      $query = "UPDATE cart SET id_user=-1 WHERE id = ?";

      $params = array(array("param_type" => "i", "param_value" => $cart_id));

      $this->updateDB($query, $params);
   }
   function emptyCart($id_user)
   {
      $query = "UPDATE cart SET id_user=-1 WHERE id_user = ?";

      $params = array(array("param_type" => "i", "param_value" => $id_user));

      $this->updateDB($query, $params);
   }
}
