<?php 
session_start();
include "../layout/header.php"; 
require_once "../db_inc.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST['id'];
    $text = $_POST['text'];
}

?>


<div class="mt-10 mx-auto max-w-5xl">
    <div class="bg-white shadow-md px-4 rounded-xl">
            <div class="py-4 text-center">
                <h1 class="font-bold">Enter your message below</h1>
            </div>
            <form action="../scripts/update.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id;?>">
                <textarea name="text" rows="10" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-100 rounded-lg border border-gray-300"><?php echo $text;?></textarea>
                <button type="submit" class="bg-[#ff4400] text-white font-medium px-6 py-2 my-4 rounded">Update</button>
            </form>
        </div>
    </div>
</div>
    


<?php include "../layout/footer.php"; ?>