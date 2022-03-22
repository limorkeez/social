<?php include '../layout/header.php'; ?>


<div class="my-5">
    <h1 class="text-center text-2xl font-medium">Fill the fields below</h1>
</div>

<div class="flex justify-center">
    <div class="bg-white p-10 rounded-xl">
        <div class="flex flex-col">
            <form class="flex flex-col gap-4" action="..\scripts\register.php" method="POST" enctype="multipart/form-data">
                <input type="text" class="bg-gray-100 p-4 rounded" placeholder="First Name" name="fname">
                <input type="text" class="bg-gray-100 p-4 rounded" placeholder="Last Name" name="lname">
                <input type="email" class="bg-gray-100 p-4 rounded" placeholder="your@email.com" name="email">
                <input type="password" class="bg-gray-100 p-4 rounded" placeholder="Password" name="password">
                <input type="password" class="bg-gray-100 p-4 rounded" placeholder="Confirm Password" name="confirmPassword">
                <button type="submit" class="bg-[#ff4400] text-white font-medium px-6 py-2 my-4 rounded">Create</button>
            </form>
        </div>
    </div>
</div>

<?php include '../layout/footer.php' ?>