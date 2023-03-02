<!--
* @file patients.php
* @author KUSHAGRA JAISWAL 
* @date 2022-07-02
* @copyright Copyright (c) 2022
-->

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <title>Patient Data</title>
</head>

<style>
    .para{
        margin-top: 28%;
    }
</style>

<body>
    <?php
    include 'partials/_dbConnect.php';
    include 'partials/_headerAdmin.php';

    if(isset($_GET['delete'])){
        $sno = $_GET['delete'];
        $delete = true;
        $sql = "DELETE FROM `users` WHERE `user_id` = $sno";
        $result = mysqli_query($conn, $sql);
    }
    ?>

    <?php 

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        echo '
    <!-- Button trigger modal -->
    <div class="text-center my-4">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add user
    </button>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add a new User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/appointmentApp/partials/handle_patients.php" method="post">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">User Name</label>
                            <input type="text" class="form-control" id="userName" name="userName" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">User Email address</label>
                            <input type="email" class="form-control" id="userEmail" name="userEmail" aria-describedby="emailHelp" required>
                            <div id="emailHelp" class="form-text">We will never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">User Phone No</label>
                            <input type="text" class="form-control" id="userPhno" maxlength="10" name="userPhno" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">User Date of Birth</label>
                            <input type="date" class="form-control" id="userDob" name="userDob" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">User Address</label>
                            <input type="text" class="form-control" id="userAdd" name="userAdd" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="userPass" name="userPass" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Conform Password</label>
                            <input type="password" class="form-control" id="usercPass" name="usercPass" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add user</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" name="editModal" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/appointmentApp/partials/handle_patients.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="snoEdit" id="snoEdit">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">User Name</label>
                            <input type="text" name="userNameEdit" class="form-control" id="userNameEdit" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">User Email address</label>
                            <input type="email" class="form-control" id="userEmailEdit" name="userEmailEdit" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">We will never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">User Phone No</label>
                            <input type="text" class="form-control" id="userPhnoEdit" maxlength="10" name="userPhnoEdit" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">User Date of Birth</label>
                            <input type="date" class="form-control" id="userDobEdit" name="userDobEdit" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">User Address</label>
                            <input type="text" class="form-control" id="userAddEdit" name="userAddEdit" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="modal-footer d-block mr-auto">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div> ';

    $sql = "SELECT * FROM `users`";
    $result = mysqli_query($conn, $sql);
    $sno = 0;
    if (mysqli_num_rows($result) > 0) {
        echo ' 
        <div class="container">
        <table class="table" id="myTable"> 
            <thead>
              <tr>
                <th scope="col">Sno</th>
                <th scope="col">Patient Name</th>
                <th scope="col">Patient Email</th>
                <th scope="col">Patient Phone No</th>
                <th scope="col">Patient Dob</th>
                <th scope="col">Patient Address</th>
                <th scope="col">Acton</th>
              </tr>
            </thead>
             <tbody> ';
        while ($row = mysqli_fetch_assoc($result)) {
            $sno = $sno + 1;
            echo ' 
              <tr>
                <th scope="row">' . $sno . '</th>
                <td>' . $row['user_name'] . '</td>
                <td>' . $row['user_email'] . '</td>
                <td>' . $row['user_phone'] . '</td>
                <td>' . $row['user_dob'] . '</td>
                <td>' . $row['user_address'] . '</td>
                <td><a class="edit btn btn-primary text-decoration-none" id=' . $row['user_id'] . '>Edit</a>
                <a class="delete btn btn-primary text-decoration-none" id=d'.$row['user_id'].'>Delete</a></td>
              </tr>';
        }
        echo '</tbody>
          </table>
          </div>
          <p class="para">`</p>';
    }
} else {
    header("Location: /appointmentApp/admin_login.php");
    
}
    ?>

    <?php include 'partials/_footer.php'; ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
    <script>
        var editModal = new bootstrap.Modal(document.getElementById('editModal'), {
            keyboard: false
        })
        edits = document.getElementsByClassName('edit');
        Array.from(edits).forEach((element) => {
            element.addEventListener("click", (e) => {
                console.log("edit", );
                tr = e.target.parentNode.parentNode;
                name = tr.getElementsByTagName("td")[0].innerText;
                email = tr.getElementsByTagName("td")[1].innerText;
                phno = tr.getElementsByTagName("td")[2].innerText;
                dob = tr.getElementsByTagName("td")[3].innerText;
                address = tr.getElementsByTagName("td")[4].innerText;
                console.log(name, email, phno, dob, address);
                userNameEdit.value = name;
                userEmailEdit.value = email;
                userPhnoEdit.value = phno;
                userDobEdit.value = dob;
                userAddEdit.value = address;
                snoEdit.value = e.target.id;
                console.log(e.target.id);
                editModal.toggle();
            })
        })

        delets = document.getElementsByClassName('delete');
        Array.from(delets).forEach((element) => {
            element.addEventListener("click", (e) => {
                console.log("delete", );
                sno = e.target.id.substr(1, );

                if (confirm("Are you sure you want to delete this record!")) {
                    console.log("yes");
                    window.location = `/appointmentApp/patients.php?delete=${sno}`;
                    // create a form and use post request to submit the form.
                } else {
                    console.log("no");
                }
            })
        })
    </script>
</body>

</html>