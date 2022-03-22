<?php 
session_start();
if(empty($_SESSION)){
    header("Location: ./views/login.php");
    die;
}

require_once "./db_inc.php"; 
include 'layout/header.php';



try{
    $sql = "SELECT * FROM users";
    $query = $conn -> prepare($sql);
    $query-> execute();
    $result = $query -> fetchAll();
} catch(PDOException $e){
    echo "Failed to get users: ".$e->getMessage();
}

try{
    $sql1 = "SELECT p.id, u.id AS user_id, u.first_name, u.last_name, p.text, p.created FROM users u INNER JOIN posts p ON u.id=p.user_id ORDER BY p.created ASC;";
    $query1 = $conn -> prepare($sql1);
    $query1 -> execute();
    $result1 = $query1 -> fetchAll();
} catch(PDOException $e){
    echo "Failed to get posts: ".$e->getMessage();
}

?>


<div class="grid grid-cols-[1fr_5fr_2fr] gap-4 p-4">

        <div class="rounded-lg">
            <div class="bg-white shadow-md rounded-lg">
                <table class="bg-white w-full rounded-lg">
                        <tr class="border-b-2 border-gray-100">
                            <th class="py-3 px-6 text-sm font-medium tracking-wider text-left ">
                                Name
                            </th>
                            <th class="py-3 px-6 text-sm font-medium tracking-wider text-left ">
                                E-mail
                            </th>
                        </tr>
                        <?php
                            foreach($result as $user){
                                echo 
                                "<tr class='bg-white border-b-2 border-gray-100'>

                                    <td class='py-4 px-6 text-sm font-medium text-gray-500'>".$user['first_name']."</td>
                                    <td class='py-4 px-6 text-sm text-gray-500'>".$user['email']."</td>

                                    <td>
                                        <form action='./views/user_update.php' method='post'>
                                            <input type='hidden' name='userid' value='".$user['id']."'>
                                            <input type='hidden' name='fname' value='".$user['first_name']."'>
                                            <input type='hidden' name='lname' value='".$user['last_name']."'>
                                            <input type='hidden' name='email' value='".$user['email']."'>
                                            ".((($user['id'] == $_SESSION['user']) || ($_SESSION['user'] == 9) )?'<input class="text-blue-400 mx-4 cursor-pointer" type="submit" value="Edit">':'') ."
                                        </form>
                                    </td>
                                </tr>";
                            }
                        ?>
                </table>
            </div>
        </div>

        <div class="bg-white h-full shadow-md rounded-lg">
            <table class="bg-white w-full p-4 rounded-lg">
                    <tr>
                        <th colspan="2" class="border-b-2 border-gray-100">Posts</th>
                    </tr>
                    <?php


                        foreach($result1 as $post){
                            $id = $post['id'];
                            $sql2 = "SELECT COUNT(id) AS likes FROM post_likes WHERE post_id=$id";
                            $query2 = $conn -> prepare($sql2);
                            $query2 -> execute();
                            $result2 = $query2 -> fetch();
                            
                            echo "
                            <tr class='bg-white'>
                                <td class='px-4 text-sm font-medium text-gray-500'>".$post['first_name']." ".$post['last_name']."</td>
                            </tr>
                            <tr class='bg-white'>
                                <td class='px-4 text-sm text-gray-500'> Posted: ".$post['created']."</td>
                            </tr>
                            <tr class='bg-white flex items-center justify-between'>
                                <td colspan='2' class='py-4 px-6 text-sm text-gray-500 '>".$post['text']."</td>
                                <td colspan='2' class='mr-4 text-sm text-gray-500 flex flex-col items-center'>
                                    <p>".$result2['likes']." Likes</p>
                                    <a href='./scripts/like.php?post=".$post['id']."&user=".$_SESSION['user']."'>
                                        <i class='fa-regular fa-heart text-xl'></i>
                                    </a>
                                </td>
                            </tr>
                            <tr class='bg-white border-b-2 border-gray-100'>
                            ". ((($post['user_id'] == $_SESSION['user']) || ($_SESSION['user'] == 9))?'
                                <td class="flex px-4 text-sm font-medium text-gray-500">

                                    <form action="./views/update.php" method="post">
                                        <input type="hidden" name="id" value="'.$post['id'].'">
                                        <input type="hidden" name="text" value="'.$post['text'].'">
                                        <input class="my-2 text-blue-400 cursor-pointer" type="submit" value="Edit">
                                    </form>


                                    <form action="./scripts/delete.php" method="post">
                                        <input type="hidden" name="id" value="'.$post['id'].'">
                                        <input class="my-2 ml-4 text-red-400 cursor-pointer" type="submit" value="Delete">
                                    </form>

                                </td>':'') ."
                            </tr>
                            ";
                        }
                    ?>
            </table>
        </div>
    <div>
    <div class="bg-white shadow-md px-4 rounded-xl">
            <div class="py-4 text-center">
                <h1 class="font-bold">Enter your message below</h1>
            </div>
            <form action="./scripts/post.php" method="POST">
                <textarea name="postText" rows="10" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-100 rounded-lg border border-gray-300" placeholder="Send message..."></textarea>
                <button type="submit" class="bg-[#ff4400] text-white font-medium px-6 py-2 my-4 rounded">Send</button>
            </form>
        </div>
    </div>
<div class=""></div>

</div>


<?php include 'layout/footer.php' ?>
