<a href="<?php $_SERVER['PHP_SELF']; ?>?sort=price&order=0">Від дешевших до дорожчих</a>
    <br>
<a href="<?php $_SERVER['PHP_SELF']; ?>?sort=price&order=1">Від дорожчих до дешевших</a>


<?php
if (isset($_GET['sort'])) {
            $sort = $_GET['sort'];
        } else 
        { 
            $sort = "name";
        }
if (isset($_GET['order'])) {
            $order = $_GET['order'];
        } else {
            $order = 0;
            
        } 
        // DZ sorting

        // echo($order);
        // var_dump($products[0]);
        
        $arrForSort=[];
        foreach($products as $key => $product){  
            array_push($arrForSort,$product['price']);
        } 
        // ($order===0)?asort($arrForSort):arsort($arrForSort);
        if($order==1)arsort($arrForSort);
        if($order==0)asort($arrForSort);
        // arsort($arrForSort);
        $sortArr=[];
        foreach($arrForSort as $key => $value){
            array_push($sortArr,$products[$key]);
        }
        // var_dump($arrForSort);
        // var_dump($sortArr);
        $products=$sortArr;        
        



        
        
        
        
        
        
        
   
foreach($products as $product)  :
?>
    <div class="product">
        <p class="sku">Код: <?php echo $product['sku']?></p>
        <h4><?php echo $product['name']?><h4>
        <p> Ціна: <span class="price"><?php echo $product['price']?></span> грн</p>
        <p><?php if(!$product['qty'] > 0) { echo 'Нема в наявності'; } ?></p>
    </div>
<?php endforeach; ?>
