function handleCartSubmit(cartId) {
    const itemForm = document.getElementById(`cart-${cartId}`);
    console.log(itemForm);
    itemForm['cart_id'] = cartId;
    itemForm.submit();
}