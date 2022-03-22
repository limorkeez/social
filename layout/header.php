<?php @session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social</title>

    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-[#f7f7f7]">

<nav class="bg-[#ffffff]">
    <div class="max-w-7xl mx-auto p-4">
        <div class="flex justify-between items-center">
            <div>
                <a href="http://localhost/bit/metaverse2/" class="font-bold text-3xl">
                    Social<span class="text-[#ff4400]">.</span>
                </a>
            </div>


            <!-- <div>
                <ul class="flex gap-4">
                    <li>
                        <a href="http://localhost/bit/metaverse2/" class="w-10 h-10 grid place-items-center text-[#c5d0e6] rounded hover:bg-[#ff4400] hover:text-white">
                            <i class="fa-solid fa-house"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="w-10 h-10 grid place-items-center text-[#c5d0e6] rounded hover:bg-[#ff4400] hover:text-white">
                            <i class="fa-solid fa-compass"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="w-10 h-10 grid place-items-center text-[#c5d0e6] rounded hover:bg-[#ff4400] hover:text-white">
                            <i class="fa-solid fa-user-group"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="w-10 h-10 grid place-items-center text-[#c5d0e6] rounded hover:bg-[#ff4400] hover:text-white">
                            <i class="fa-solid fa-comment-dots"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="w-10 h-10 grid place-items-center text-[#c5d0e6] rounded hover:bg-[#ff4400] hover:text-white">
                            <i class="fa-solid fa-heart"></i>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="flex w-2/6 h-10">
                <input class="pl-4 w-full h-full rounded bg-[#f5f7fc]" type="text" name="" id="" placeholder="Search...">
            </div> -->


            <div class="flex items-center">
                <ul class="flex gap-4 items-center">
                    <li>
                        <?php 
                            if(empty($_SESSION)){
                                echo '';
                            } else{
                                echo "Welcome, ".$_SESSION['userFname'];
                            }
                        ?>
                    </li>
                    <li>
                        <a href="<?php 
                            if(empty($_SESSION)){
                                echo './login.php';
                            } else{
                                echo './scripts/logout.php';
                            }
                             ?>"  class='bg-[#ff4400] text-white text-sm font-medium px-4 py-1 rounded'>
                            <?php 
                            if(empty($_SESSION)){
                                echo 'Log In';
                            } else{
                                echo 'Log Out';
                            }
                             ?>
                        </a>
                    </li>
                </ul>
            </div>
    </div>
</nav>
    
