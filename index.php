<?php
session_start();

include "connection.php";



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">

</head>

<?php
if (isset($_SESSION['admin'])) {
    $indata = $_SESSION['admin'];


?>

    <body style="overflow-x: hidden;">
        <div class="row">
            <!-- left side -->
            <div class="col-2" style="height: 650px; ">
                <div class="ms-3" style=" height: 650px; border-right: .5px solid rgba(0,0,0,0.3);">
                    <h5 class="p-2 mt-4">Company Logo/Title</h5>
                    <ul class="form-label myul">
                        <li class="list-group-item mb-4 mt-5 "><a href="#" class="text-decoration-none text-secondary" onclick="dash();">Dashboard</a></li>
                        <li class="list-group-item mb-4  "><a href="#" class="text-decoration-none text-secondary" onclick="gallery_show();">Gallery Update</a></li>
                        <li class="list-group-item mb-4 "><a href="#" class="text-decoration-none text-secondary" onclick="student_show();">Students Attendens Update</a></li>
                        <li class="list-group-item mb-4 "><a href="#" class="text-decoration-none text-secondary" onclick="database_show();">Database View</a></li>
                        <li class="list-group-item mb-4 "><a href="#" class="text-decoration-none text-secondary" onclick="profile_show();">Online Registrations</a></li>
                        <li class="list-group-item mb-4 mt-5  "><a href="#" class="text-decoration-none text-secondary sinout " onclick="logout();"><i class="fas fa-arrow-left"></i> Sign Out</a></li>




                    </ul>


                </div>

            </div>
            <!-- right side -->
            <div class="col-10 " style="height: 100vh;">

                <div class="col-10 bg position-absolute d-block" style="height: 100vh; width: 99.3%;" id="prof">

                    <div class="mt-4">
                        <h4 class="text-secondary"><span class="text-secondary" style="font-size: 20px;"><i class="fas fa-bars"></i> </span> Online Registerd Students</h4>

                    </div>

                    <div class="col-10 mt-5">
                        <table class="table caption-top">
                            <thead>
                                <tr>
                                    <th scope="col">#id</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Contact</th>
                                    <th scope="col">Nic</th>
                                    <th scope="col">DOB</th>
                                    <th scope="col">R_Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $db3 = Database::serch("SELECT * FROM `onlstudents` ");
                                $num3 = $db3->num_rows;

                                for ($r = 0; $r < $num3; $r++) {
                                    $data3 = $db3->fetch_assoc();
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $data3["id"] ?></th>
                                        <td><?php echo $data3["fname"] ?></td>
                                        <td><?php echo $data3["lname"] ?></td>
                                        <td><?php echo $data3["address"] ?></td>
                                        <td><?php echo $data3["contact"] ?></td>
                                        <td><?php echo $data3["nic"] ?></td>
                                        <td><?php echo $data3["dob"] ?></td>
                                        <td><?php echo $data3["registerd_date"] ?></td>
                                    </tr>




                                <?php





                                }




                                ?>



                            </tbody>
                        </table>


                    </div>




                </div>
                <div class="col-10  position-absolute d-none" style="height: 100vh; width: 99.3%;" id="data">

                    <div class="mt-4">
                        <h4 class="text-secondary"><span class="text-secondary" style="font-size: 20px;"><i class="fas fa-bars"></i> </span> Database View</h4>

                    </div>
                    <div class="row d-flex">
                        <div class="col-6">
                            <div>
                                <h5 class="mt-4">Online Registerd Studentsa Table</h5>
                            </div>

                        </div>
                        <div class="col-4 mt-4">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Serch ex: Nimal/ Perera / 077XXXXX" id="search">
                                <button class="btn btn-danger"><i class="fas fa-arrow-rotate-right" onclick="refreshtab();"></i></button>
                                <button class="btn btn-primary" onclick="serchbtn();"><i class="fab fa-searchengin"></i></button>

                            </div>

                        </div>


                    </div>


                    <div class="col-10  h-25 me-4  mt-5 tb1">

                        <table class="table table-primary " id="tbonl">
                            <thead>
                                <tr>
                                    <th scope="col">#id</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Contact</th>
                                    <th scope="col">Nic</th>
                                    <th scope="col">DOB</th>
                                    <th scope="col">R_Date & Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php


                                if (isset($_SESSION['search'])) {
                                    $serchdata = $_SESSION['search'];




                                    $db5 = Database::serch("SELECT * FROM `onlstudents` WHERE `fname` = '" . $serchdata . "' OR `lname` = '" . $serchdata . "' OR `contact` = '" . $serchdata . "' OR `nic` = '" . $serchdata . "'");
                                    $num5 = $db5->num_rows;


                                    if ($num5 >= 1) {
                                        for ($j = 0; $j < $num5; $j++) {
                                            $data5 = $db5->fetch_assoc();
                                ?>
                                            <tr>
                                                <th scope="row"><?php echo $data5["id"] ?></th>
                                                <td><?php echo $data5["fname"] ?></td>
                                                <td><?php echo $data5["lname"] ?></td>
                                                <td><?php echo $data5["address"] ?></td>
                                                <td><?php echo $data5["contact"] ?></td>
                                                <td><?php echo $data5["nic"] ?></td>
                                                <td><?php echo $data5["dob"] ?></td>
                                                <td><?php echo $data5["registerd_date"] ?></td>
                                            </tr>




                                        <?php





                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <th scope="row"></th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>Not Founded Results</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>


                                    <?php
                                    }
                                } else {



                                    $db3 = Database::serch("SELECT * FROM `onlstudents` ");
                                    $num3 = $db3->num_rows;

                                    for ($r = 0; $r < $num3; $r++) {
                                        $data3 = $db3->fetch_assoc();
                                    ?>
                                        <tr>
                                            <th scope="row"><?php echo $data3["id"] ?></th>
                                            <td><?php echo $data3["fname"] ?></td>
                                            <td><?php echo $data3["lname"] ?></td>
                                            <td><?php echo $data3["address"] ?></td>
                                            <td><?php echo $data3["contact"] ?></td>
                                            <td><?php echo $data3["nic"] ?></td>
                                            <td><?php echo $data3["dob"] ?></td>
                                            <td><?php echo $data3["registerd_date"] ?></td>
                                        </tr>




                                <?php





                                    }
                                }









                                ?>



                            </tbody>
                        </table>


                    </div>
                    <h5 class="mt-5">Students Details Sheet</h5>
                    <div class="col-10  h-25 me-4  mt-4 tb2">

                        <table class="table caption-top">
                            <thead>
                                <tr>
                                    <th scope="col">#id</th>
                                    <th scope="col">Student ID</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Contact</th>
                                    <th scope="col">Nic</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $db4 = Database::serch("SELECT * FROM `students`");
                                $num4 = $db4->num_rows;

                                for ($r2 = 0; $r2 < $num4; $r2++) {
                                    $data4 = $db4->fetch_assoc();
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $data4["id"] ?></th>
                                        <td><?php echo $data4["stu_id"] ?></td>
                                        <td><?php echo $data4["f_name"] ?></td>
                                        <td><?php echo $data4["l_name"] ?></td>
                                        <td><?php echo $data4["address"] ?></td>
                                        <td><?php echo $data4["contact"] ?></td>
                                        <td><?php echo $data4["nic"] ?></td>

                                    </tr>




                                <?php





                                }




                                ?>



                            </tbody>
                        </table>


                    </div>
























                </div>

                <!-- student update  -->
                <div class="col-10 position-absolute d-none" style="height: 100vh; width: 99.3%;" id="stu">

                    <div class="mt-4">
                        <h4 class="text-secondary"><span class="text-secondary" style="font-size: 20px;"><i class="fas fa-bars"></i> </span> Studens Attendens Update</h4>

                    </div>

                    <div class="row">
                        <div class="col-10 mt-5 me-4">
                            <div class="row">
                                <div class="col-6">
                                    <label class="form-label">Branch : </label>
                                    <select name="br" id="branchoptions" class="form-control " disabled>
                                        <?php
                                        $rss = Database::serch("SELECT * FROM `branches` WHERE `branch_id` = '" . $indata["branches_branch_id"] . "'");
                                        $nums = $rss->fetch_assoc();




                                        ?>
                                        <option value="<?php echo $nums["branch_id"] ?>"><?php echo $nums["branch"] ?></option>



                                    </select>

                                </div>
                                <div class="col-6">
                                    <label class="form-label">User : </label>
                                    <select name="br" id="users" class="form-control" disabled>




                                        <option value="<?php echo $indata['id'] ?>"><?php echo $indata['fname'] ?> <?php echo $indata['lname'] ?></option>



                                    </select>

                                </div>



                            </div>


                            <div class="row">
                                <div class="mt-2 col-5">
                                    <label class="form-label">Student Id :</label>
                                    <input type="text" class="form-control" name="srch" list="data01" id="funame" placeholder="ex:- sanu/stu/xx/xxx">
                                    <datalist id="data01">
                                        <?php
                                        $re = Database::serch("SELECT * FROM `students` WHERE `branches_branch_id` = '" . $indata["id"] . "'");
                                        $numr = $re->num_rows;

                                        if ($numr >= 1) {

                                            for ($d = 0; $d < $numr; $d++) {
                                                $datash = $re->fetch_assoc();

                                        ?>
                                                <option value="<?php echo $datash["stu_id"]; ?>">




                                                <?php


                                            }
                                        } else {

                                                ?>
                                                <option value="">error</option>

                                            <?php
                                        }





                                            ?>



                                    </datalist>
                                    <!-- <select name="name" id="funame" class="form-control">
                                        <option value="none">-- Select Student --</option>
                                        

                                    </select> -->


                                </div>
                                <div class="mt-2 col-1">
                                    <label class="form-label">Marks :</label>
                                    <input type="text" class="form-control" id="marks" placeholder="ex:- xx">


                                </div>
                                <div class="mt-2 col-2">
                                    <label class="form-label">Date :</label>
                                    <input type="date" class="form-control" id="date">


                                </div>
                                <div class="mt-2 col-2">
                                    <label class="form-label">In Time :</label>
                                    <input type="time" class="form-control" id="intime">


                                </div>
                                <div class="mt-2 col-2">
                                    <label class="form-label">Out Time :</label>
                                    <input type="time" class="form-control" id="outtime">


                                </div>
                                <div class="col-12 mt-3 d-flex justify-content-end">
                                    <button class="btn btn-primary" onclick="submit2();">Submit</button>
                                </div>
                                <div id="dtab" class="tabdiv">
                                    <table class="table mt-5 table-responsive">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">id</th>
                                                <th scope="col">Stu id</th>
                                                <th scope="col">Stu. Name</th>
                                                <th scope="col">User</th>
                                                <th scope="col">In Time</th>
                                                <th scope="col">Out time</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Marks</th>
                                                <th scope="col">Submited Date</th>
                                            </tr>

                                        </thead>
                                        <tbody>
                                            <?php

                                            $db = Database::serch("SELECT * FROM `atends` WHERE `branches_branch_id` = '" . $indata["id"] . "'");
                                            $nu = $db->num_rows;

                                            for ($i = 0; $i < $nu; $i++) {
                                                $da = $db->fetch_assoc();

                                                $db2 = Database::serch("SELECT * FROM `students` WHERE `id`='" . $da["students_id"] . "'");
                                                $data2 = $db2->fetch_assoc();

                                            ?>
                                                <tr>
                                                    <th scope="row"><?php echo $da["at_id"]; ?> </th>
                                                    <td><?php echo $data2["stu_id"]; ?></td>
                                                    <td><?php echo $data2["f_name"]; ?> <?php echo $data2["l_name"]; ?></td>
                                                    <td><?php echo $indata["fname"]; ?> <?php echo $indata["lname"]; ?></td>
                                                    <td><?php echo $da["in_time"]; ?></td>
                                                    <td><?php echo $da["out_time"]; ?></td>
                                                    <td><?php echo $da["date"]; ?></td>
                                                    <td><?php echo $da["marks"]; ?></td>
                                                    <td><?php echo $da["submited_date"]; ?></td>
                                                </tr>








                                            <?php



                                            }













                                            ?>



                                        </tbody>
                                    </table>
                                </div>



                            </div>








                        </div>

                    </div>






                </div>


                <div class="col-10   position-absolute d-none" style="height: 100vh; width: 99.3%;" id="galle">
                    <div class="mt-4">
                        <h4 class="text-secondary"><span class="text-secondary" style="font-size: 20px;"><i class="fas fa-bars"></i> </span> Gallery Update</h4>

                    </div>
                </div>
                <div class="col-10 position-absolute d-none" style="height: 100vh; width: 99.3%;" id="dashb">
                    <div class="mt-4">
                        <h4 class="text-secondary"><span class="text-secondary" style="font-size: 20px;"><i class="fas fa-bars"></i> </span> Dashboard</h4>

                    </div>

                </div>


            </div>

        </div>















        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/script.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </body>
<?php


} else {

?>
    <script>
        window.location = "t_quizlogin.php";
    </script>



<?php








}





?>






</html>