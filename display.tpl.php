<div class="col-md-12 row">
    <?php foreach ($row as $key => $result) {
        $image = "/bhoora/images/" . $result['image']; 
        $string = $result['discription'];
        $descrip = substr($string,0,80);?>
        <div class="card" style="width: 18rem; margin:20px;">
            <img height="150px"; width="623px"; src="<?php echo $image; ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"> Title : <?php echo $result['name'] ?></h5>
                <p class="card-text"> <?php echo $descrip;?>...</p>
                <h5 class="card-price">Price : &#8377; <?php echo $result['price'] ?></h5>
                <a href="details.php?id=<?php echo $result['id'];?>" class="btn btn-primary">View details</a>
            </div>
        </div>
    <?php } ?>
</div>