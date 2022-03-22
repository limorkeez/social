<?php 

include "../layout/header.php"; 
require_once "../db_inc.php";

?>

<div class="my-5">
    <h1 class="text-center text-2xl font-medium">Please log into your account to continue</h1>
</div>

<div class="flex justify-center">
    <div class="bg-white p-10 rounded-xl">
        <div class="flex flex-col">
            <form class="flex flex-col gap-4" action="..\scripts\login.php" method="POST" enctype="multipart/form-data">
                <input type="email" class="bg-gray-100 p-4 rounded" placeholder="Enter your e-mail" name="email">
                <input type="password" class="bg-gray-100 p-4 rounded" placeholder="Password" name="password">
                <button type="submit" class="bg-[#ff4400] text-white font-medium px-6 py-2 my-4 rounded">Log In</button>
                <p>Don't have an account? <a href="./register.php" class="text-[#ff4400]">Register Here</a></p>
            </form>
        </div>
    </div>
</div>
    


<?php include "../layout/footer.php"; ?>