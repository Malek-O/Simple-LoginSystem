<?php
include_once 'header.php';
?>


    <div class='container text-white py-5'>
        <div class="col-lg-12 my-3">
            <table class="table table-bordered ">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                    </tr>

                </thead>
                <tbody class="table-light">
                    <tr>
                       <?php
echo "<td>{$_SESSION['user_id']}</td>";
echo "<td>{$_SESSION['uid']}</td>";
echo "<td>{$_SESSION['email']}</td>";
?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
