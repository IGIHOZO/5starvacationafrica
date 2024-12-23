<?php 
echo "<div style='background-color: #aaaaaa; padding: 20px; text-align: center;'>";
require("lib/header.php");
echo "</div>";
@require("lib/drive.php");
?>
<br>
<br>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-light">
                <div class="card-header text-center" style="background-color: #543554;">
                    <h3 class="mb-0" style="color: white!important;">Proceed with Payment</h3>
                </div>
                <div class="card-body">
                    <form action="https://www.afripay.africa/checkout/index.php" method="post" id="afripayform">
                        <input type="hidden" name="amount" value="<?=$_POST['totalPrice']?>" >
                        <input type="hidden" name="currency" value="RWF" >
                        <input type="hidden" name="comment" value="Order <?=$_POST['packageId']?>">
                        <input type="hidden" name="client_token" value="<?=uniqid()?>" >
                        <input type="hidden" name="return_url" value="https://5starvacationafrica.com" >
                        <input type="hidden" name="app_id" value="b8b666ab2fccaef6ebd5c532c20358a7">
                        <input type="hidden" name="app_secret" value="JDJ5JDEwJEZHTk1o">
                        
                        <!-- <div class="text-center mb-4">
                            <p><strong>Total Amount: RWF <?=$_POST['totalPrice']?></strong></p>
                            <p><strong>Order ID: <?=$_POST['packageId']?></strong></p>
                        </div> -->

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <img src="https://www.afripay.africa/logos/pay_with_afripay.png" alt="Pay with AfriPay" class="img-fluid" style="max-width: 250px;">
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
require("lib/footer.php");
?>
