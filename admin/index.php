<?php
ob_start();
include('header.php'); 
if(!isset($_SESSION['login'])){
    header('location:../');
    // echo "<script>location.href='".$URL."/login.php';</script>";
}

include '../partials/_categories_nav.php';

?>
<link href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css" />
<style>
    table{
        width:100%;
    }
</style>

<!-- SIMPLE DB CONNECTION -->
<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flipkart_clone";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM products";
$result = $conn->query($sql);



?>

    <!-- main sections starts -->
    <main class="w-full mt-16 sm:mt-0">

        <!-- row -->
        <div class="flex gap-3.5 mt-2 sm:mt-6 sm:mx-3 m-auto mb-7">

            <!-- sidebar column  -->
            <div class="hidden sm:flex flex-col w-1/5 px-1">

                <!-- nav tiles -->
                <div class="flex flex-col bg-white rounded-sm shadow">

                    <!-- filters header -->
                    <div class="flex items-center gap-5 px-4 py-2 border-b">
                        <p class="flex w-full justify-between text-lg font-medium">MENU</p>
                    </div>

                    <!-- order status checkboxes -->
                    <div class="flex flex-col py-3 text-sm">
                    <a href="index.php"> <span class="font-medium px-4">Product List</span></a>
                       <a href="product_add.php"> <span class="font-medium px-4">Product Add</span></a>
                       <!-- <a> <span class="font-medium px-4">ORDER STATUS</span></a> -->

                        <!-- checkboxes -->
                        <!-- <div class="flex flex-col gap-3 px-4 mt-3 pb-3 border-b">
                            <div class="flex gap-2 items-center">
                                <input type="checkbox" name="" id="ontw" class="h-4 w-4">
                                <label for="ontw">On the way</label>
                            </div>
                            <div class="flex gap-2 items-center">
                                <input type="checkbox" name="" id="devlivered" class="h-4 w-4">
                                <label for="devlivered">Delivered</label>
                            </div>
                            <div class="flex gap-2 items-center">
                                <input type="checkbox" name="" id="cancelled" class="h-4 w-4">
                                <label for="cancelled">Cancelled</label>
                            </div>
                            <div class="flex gap-2 items-center">
                                <input type="checkbox" name="" id="returned" class="h-4 w-4">
                                <label for="returned">Returned</label>
                            </div>
                        </div> -->
                        <!-- checkboxes -->

                    </div>
                    <!-- order status checkboxes -->

                    <!-- order time checkboxes -->
                    <div class="flex flex-col pb-2 text-sm">
                        <span class="font-medium px-4">ORDER TIME</span>

                        <!-- checkboxes -->
                        <!-- <div class="flex flex-col gap-3 px-4 mt-3 pb-3">
                            <div class="flex gap-2 items-center">
                                <input type="checkbox" name="" id="last30" class="h-4 w-4">
                                <label for="last30">Last 30 days</label>
                            </div>
                            <div class="flex gap-2 items-center">
                                <input type="checkbox" name="" id="2020" class="h-4 w-4">
                                <label for="2020">2020</label>
                            </div>
                            <div class="flex gap-2 items-center">
                                <input type="checkbox" name="" id="2019" class="h-4 w-4">
                                <label for="2019">2019</label>
                            </div>
                            <div class="flex gap-2 items-center">
                                <input type="checkbox" name="" id="older" class="h-4 w-4">
                                <label for="older">Older</label>
                            </div>
                        </div> -->
                        <!-- checkboxes -->

                    </div>
                    <!-- order time checkboxes -->


                </div>
                <!-- nav tiles -->

            </div>
            <!-- sidebar column  -->

            <!-- orders column -->
            <div class="flex-1">

                <!-- orders container -->
                <div class="flex flex-col gap-3 sm:mr-4 overflow-hidden sm:p-1 ">
                <div class="table-responsive">
                   <table class="table display data-table text-nowrap col-12" id="product_list" >
                        <thead>
                            <tr>
                                <th>Product Title</th>
                                <th>Country</th>
                                <th>Action</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) { ?>
                                    <tr>
                                        <td><?= $row['product_title'] ?></td>
                                        <td><?= $row['product_origin_country'] ?></td>                                
                                        <td><a href="product_edit.php?id=<?= $row['id'] ?>">Edit</a> | <a href="product_delete.php?id=<?= $row['id'] ?>">Delete</a></td>
                                    </tr>
                              <?php  }
                              } else {
                                echo "0 results";
                              }
                            
                            ?>
                            
                           
                        </tbody>
                   </table>

</div>

                </div>
                <!-- orders container -->
                
            </div>
            <!-- orders column -->
        </div>
        <!-- row -->

    </main>
    <?php

include 'footer.php';


?>
<script src="https://cdn.datatables.net/2.0.3/js/dataTables.min.js" ></script>
<script>

    $('#product_list').DataTable({})
</script>