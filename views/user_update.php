<?php 
session_start();
include "../layout/header.php"; 
require_once "../db_inc.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST['userid'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
}

?>


<div class="mt-10 mx-auto max-w-5xl">
    <div class="bg-white shadow-md px-4 rounded-xl">
        <div class="flex flex-col">
            <div class="py-4 text-center">
                <h1 class="font-bold">Edit your account details</h1>
            </div>
            <form action="../scripts/user_update.php" method="POST" class="flex flex-col items-center">
                <input type="hidden" name="userid" value="<?php echo $id;?>">
                <input type="text" name="firstName" value="<?php echo $fname;?>" class="w-2/4 mb-4 p-2.5 text-sm text-gray-900 bg-gray-100 rounded-lg border border-gray-300">
                <input type="text" name="lastName" value="<?php echo $lname;?>" class="w-2/4 mb-4 p-2.5 text-sm text-gray-900 bg-gray-100 rounded-lg border border-gray-300">
                <input type="text" name="emailAddress" value="<?php echo $email;?>" class="w-2/4 mb-4 p-2.5 text-sm text-gray-900 bg-gray-100 rounded-lg border border-gray-300">
                <button type="submit" class="w-2/4 bg-[#ff4400] text-white font-medium px-6 py-2 my-4 rounded">Save</button>
            </form>
            <?php 
                if(($id == $_SESSION['user']) || ($_SESSION['userFname'] == 'admin')){
                    echo "<button type='submit' class='bg-[#ff4400] text-white font-medium px-6 py-2 mb-4 mx-auto w-2/4 rounded'><a id='deleteBtn' class='w-full' href='../scripts/user_delete.php?userid=$id'>Delete</a></button>";
                } else{
                    echo '';
                }
            ?>
        </div>
    </div>
</div>


<?php include "../layout/footer.php"; ?>