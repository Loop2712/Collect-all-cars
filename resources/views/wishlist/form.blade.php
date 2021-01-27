
    <input class="form-control" name="product_id" type="number" id="product_id" value="{{ isset($wishlist->product_id) ? $wishlist->product_id : ''}}" >

    <input class="form-control" name="user_id" type="number" id="user_id" value="{{ isset($wishlist->user_id) ? $wishlist->user_id : ''}}" >

    <input class="form-control" name="price" type="number" id="price" value="{{ isset($wishlist->price) ? $wishlist->price : ''}}" >
