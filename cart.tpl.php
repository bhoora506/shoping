
<div style="color: green; font-size: 20px;" class="text-center">
<?php 
if(isset($_SESSION['error_message'])){
    echo $_SESSION['error_message'];
    unset($_SESSION['error_message']);
}?>
</div>
<section class="h-100" style="background-color: #eee;">
<div class="container h-100 py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12">
            <div class="col-lg-12 text-center border rounded bg-danger p-2 my-5" style="--bs-bg-opacity: .5;">
                <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Serial_no.</th>
                        <th scope="col">Item_image</th>
                        <th scope="col">Item_name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Item_price</th>
                        <th class="col">Sub_total</th>
                        <th class="col">Operation</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $grand_total= 0;
                    if(isset($_SESSION['cart'])){
                        foreach($_SESSION['cart'] as $key=> $quan_tity){ 
                            $data = singledata($key);
                            $max = $data['maximum'];
                            $min = $data['minimum'];
                            $sub_total = $data['price']*$quan_tity;
                            $grand_total += $sub_total;
                            static $serial = 1;?>
                    <tr>
                        <th scope="row"><?php echo $serial++; ?></th>
                        <td><img height="50px;" width="50px;" src="<?php echo "/bhoora/images/".$data['image'];?>" alt="Cotton T-shirt"></td>
                        <td> <p class="lead fw-normal mb-2"><?php echo $data['name'];?></p></td>
                        <td><input style="width: 10em;" min="1" name="quantity" id="quantity" class="quantity" value="<?php echo $quan_tity;?>" type="number" data-id="<?php echo $key; ?>"> </td>
                        <td><h5 class="mb-0">&#8377; <?php echo $data['price']; ?></h5></td>
                        <td  class ="subtotal" id="subtotal_<?php echo $key; ?>"><h5>&#8377; <?php echo $sub_total;?></h5></td>
                        <td>
                            <form action="remove.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $key;?>">
                                <input class="btn btn-danger" onclick="return confirmation()" type="submit" name="remove" value="Remove">
                            </form>
                        </td>
                    </tr>
                    <?php 
                        }
                    }
                    ?>
                </tbody>
            </table>
            <div class="card">
                <div class="card-body">
                 <a href="pay.php"><button type="button" class="btn btn-warning btn-block btn-lg">Proceed to Pay</button></a> 
               <h5>Grandtotal:</h5>
               <h5 style="margin-top: 10px;" class="grandtotal"  id="grandtotal">&#8377; <?php echo $grand_total;?></h5>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

<script>
    function confirmation(){
        return confirm('Are you sure you want to delete this products');
    }
 $(document).ready(function() {
    $(".quantity").on("change", function () {
      var quantity = $(this).val();
      var p_id = $(this).attr("data-id");
      $.ajax({
        url: "action.php",
        method: "POST",
        data: {
          quantity: quantity,
          product_id: p_id,
        },
        dataType: 'json',
        success: function(response) {
            grandtotal = 0;
            for (var sub in response.subtotal) {
            $("#subtotal_" + sub).html(response.subtotal[sub]);
            grandtotal += response.subtotal[sub]
            $("#grandtotal").html(grandtotal);
            
          } 
        },
        error: function(error) {
          alert('You can add minimum<?php echo $min;?> and maximum <?php echo $max; ?>  products at this time. :' + error);
        }
      });
    });
  });
</script>

