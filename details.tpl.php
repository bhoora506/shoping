<div style="color: red; font-size: 20px;" class="text-center">
<?php 
if(isset($_SESSION['error_message'])){
    echo $_SESSION['error_message'];
    unset($_SESSION['error_message']);
}
?>
</div>
<?php $image = "/bhoora/images/".$data['image']; ?>
<div class="container">
    <div class="card">
        <div class="container-fliud">
            <div class="wrapper row">
                <div class="preview col-md-6">
                    <div class="preview-pic tab-content">
                        <div class="tab-pane active" id="pic-1"><img   height="350px"; width="" src="<?php echo $image;?>"/></div>
                    </div>
                </div>
                <div class="details col-md-6">
                    <h3 class="product-title"><?php echo $data['name'] ?></h3>
                    <div class="rating">
                        <div class="stars">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                        <span class="review-no">41 reviews</span>
                    </div>
                    <p class="product-description"><?php echo $data['discription']; ?>.</p>
                    <h4 class="price">current price: <span>&#8377; <?php echo $data['price']; ?></span></h4>
                    <p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p>
                    <h5 class="sizes">sizes:
                        <span class="size" data-toggle="tooltip" title="small">s</span>
                        <span class="size" data-toggle="tooltip" title="medium">m</span>
                        <span class="size" data-toggle="tooltip" title="large">l</span>
                        <span class="size" data-toggle="tooltip" title="xtra large">xl</span>
                    </h5>
                    <div class="action">
                        <form action="addtocart.php" method="POST">
                        <select  class="like btn btn-default" name="quantity">
                            <option value="">-Quantity-</option>
                            <?php for($i=1;$i<=10;$i++) { ?>
                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                            <?php }?>
                        </select>
                       <input type="hidden" name="id" value="<?php echo $data['id'];?>">
                       <input style="margin-left: 40px;" class="like btn btn-default" type="submit" value="Add to cart" name="addtocart">
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

