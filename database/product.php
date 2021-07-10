<html>
<head>

    <title> Insert product </title>
    <style>
        body{
            background-color: rgba(114, 223, 255, 0.9);
        }
        input{
            width: 50%;
            height: 5%;
            border: 1px;
            border-radius: 05px;
            padding: 8px 15px 8px 15px;
            margin: 10px 0px 15px 0px;
            box-shadow: 1px 1px 2px 1px grey;
            font-weight: bold;
        }
        
    </style>
    

	
</head>
<body>
    <center>
        <h1> Upload and Insert New Product </h>

        <form action="" method="POST" enctype="multipart/form-data">
    
            <label> Choose a Product Picture: </label><br> 
            <input type="file" name="image" id="image" /><br> 

            <label> Enter product name </label><br> 
            <input type="text" name="ProductName" placeholder="Enter product name" /><br> 

            <label> Enter product type </label><br> 
            <input type="text" name="ProductType" placeholder="Enter product type" /><br> 

            <label> Enter product price(RM) </label><br> 
            <input type="text" name="ProductPrice" placeholder="Enter product price(RM)" /><br> 

            <label> Enter product quantity </label><br> 
            <input type="number" name="ProductQuantity" placeholder="Enter product quantity" /><br> 

            <input type="Submit" name="upload" value="Upload Image/Data" /><br>
            <a href="welcome.php" class="button">Main page</a>


        </form>    
    </center>
</body>    
</html>    


<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,'myshopdb');

if(isset($_POST['upload']))
{
    $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    $ProductName = $_POST['ProductName'];
    $ProductType = $_POST['ProductType'];
    $ProductPrice = $_POST['ProductPrice'];
    $ProductQuantity = $_POST['ProductQuantity'];

    $query = "INSERT INTO `tbl_product`(`image`,`ProductName`,`ProductType`,`ProductPrice`,`ProductQuantity`) VALUES ('$file','$ProductName','$ProductType','$ProductPrice','$ProductQuantity') ";
    $query_run = mysqli_query($connection,$query);

    if($query_run)
    {
        echo '<script type="text/javascript"> alert("Image Profile Uploaded") </script>';
    }
    else
    {
        echo '<script type="text/javascript"> alert("Image Profile Not Uploaded") </script>';
    }
}