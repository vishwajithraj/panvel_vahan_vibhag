<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export List / Ensuare</title>

    <link rel="shortcut icon" href="assets/images/image.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="./CRUD/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./CRUD/datatable/dataTable.bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/admin.css">
    <style>

        .height10 {
            height: 10px;
        }

        .mtop10 {
            margin-top: 10px;
        }

        .modal-label {
            position: relative;
            top: 7px;
        }

        table,
        th,
        td {
            background-color: white;
        }

        .table-box {
            background-color: #fff;
            border: 1px solid #808080;
            border-radius: 5px;
            padding: 40px;
            border-width: 2px;
        }

        .main-container .navcontainer .nav h4 a {
            color: #000000;
            text-decoration: none;
        }

    </style>
</head>

<body>
    <header>
        <div class="logosec">
            <img src="assets/images/image.png" class="nav-img larger-logo" alt="dashboard"
                style="width: 70px; margin-top: 5px ; height: 50px;">
            <div class="logo" style="font-weight: bold;">पनवेल वाहन विभाग</div>
            <img src="assets/images/menu.png" class="icn menuicn" id="menuicn" alt="menu-icon">
        </div>


        <div class="message">
            <div class="circle"></div>
            <img src="assets/images/notification.png" class="icn" alt="" id="notification">
            <div class="dp">
                <img src="https://shorturl.at/vIMV0" class="dpicn" alt="dp">
            </div>
        </div>
    </header>

    <div class="main-container">
        <div class="navcontainer">
            <nav class="nav">
                <div class="nav-upper-options">
                    <div class="nav-option option1">
                        <img src="assets/images/dashboard.png" class="nav-img" alt="articles">
                        <h4><a href="user.php">Dashboard</a></h4>
                    </div>

                    <!-- <div class="option2 nav-option">
                        <img src="assets/images/alert.png" class="nav-img" alt="articles">
                        <h4><a href="expiry.php">Expiry Alerts</a></h4>
                    </div> -->

                    <div class="nav-option option3">
                        <img src="assets/images/list.png" class="nav-img" alt="report">
                        <h4><a href="export.php">Export List</a></h4>
                    </div>

                    <div class="nav-option logout">
                        <img src="assets/images/logout.png" class="nav-img" alt="logout">
						<h4><a href="logout.php" onclick="return confirmLogout();">Logout</a></h4>
                    </div>
                </div>
            </nav>
        </div>
        <div class="main">


            <div class="table-box">
                <div class="row">
                    <!-- <a href="#addnew" data-toggle="modal" class="btn btn-primary" style="background-color: #088F8F ; border-color: #088F8F"><span class="glyphicon glyphicon-plus"></span> Add User</a> -->
                    <a href="#" class="btn btn-success pull-right" id="download-pdf"><span class="glyphicon glyphicon-print"></span> Download PDF</a></div>

                <br><br>

                <div class="height10"></div>
                <div class="row">
                    <div class="table-responsive">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <th>ID</th>
                                <th>Registration No.</th>
                                <th>Vehicle Class</th>
                                <th>Body Type</th>
                                <th>Manufacturer</th>
                                <th>Registration Date</th>
                                <th>Insurance Due </th>
                                <th>Tax Validity</th>
                                <th>Fitness Due</th>
                                <th>PUC Due</th>
                                <th>Annual Maintanence Due</th>
                            </thead>
                            <tbody>
                                <?php
                                include_once('./CRUD/connection.php');

                                $sql = "SELECT * FROM members";

                                $query = $conn->query($sql);
                                while ($row = $query->fetch_assoc()) {
                                        echo "<tr>
                                        <td>" . $row['id'] . "</td>
                                        <td>" . $row['registration_no'] . "</td>
                                        <td>" . $row['vehicle_class'] . "</td>
                                        <td>" . $row['body_type'] . "</td>
                                        <td>" . $row['manufacturer'] . "</td>
                                        <td>" . $row['registration_date'] . "</td>
                                        <td>" . $row['insurance_due'] . "</td>
                                        <td>" . $row['tax_validity'] . "</td>
                                        <td>" . $row['fitness_due'] . "</td>
                                        <td>" . $row['puc_due'] . "</td>
                                        <td>" . $row['registration_date'] . "</td>
                                    </tr>";
                                    }
                                    include('./CRUD/edit_delete_modal.php');
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('./CRUD/add_modal.php') ?>

    <script src="assets/js/admin.js"></script>
    <script src="./CRUD/jquery/jquery.min.js"></script>
    <script src="./CRUD/bootstrap/js/bootstrap.min.js"></script>
    <script src="./CRUD/datatable/jquery.dataTables.min.js"></script>
    <script src="./CRUD/datatable/dataTable.bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.66/vfs_fonts.js"></script>

    <script>
    $(document).ready(function () {
    $('#myTable').DataTable();
    $(document).on('click', '.close', function () {
        $('.alert').hide();
    });

    $('#download-pdf').click(function (e) {
        e.preventDefault();
        var headers = [];
        $('#myTable thead th').each(function () {
            headers.push({ text: $(this).text(), style: 'tableHeader' });
        });

        var data = [];
        $('#myTable tbody tr').each(function () {
            var row = [];
            $(this).find('td').each(function () {
                row.push($(this).text());
            });
            data.push(row);
        });

        var docDefinition = {
            content: [
                { text: 'Complete data of the users', style: 'header' },
                {
                    layout: 'lightHorizontalLines',
                    table: {
                        headerRows: 1,
                        widths: ['auto', 'auto', 'auto', 'auto', 'auto', 'auto', 'auto', 'auto', 'auto', 'auto'],
                        body: [
                            headers,
                            ...data
                        ]
                    }
                }
            ],
            styles: {
                header: {
                    fontSize: 18,
                    bold: true,
                    margin: [0, 0, 0, 10]
                },
                tableHeader: {
                    bold: true,
                    fillColor: '#CCCCCC',
                    alignment: 'center'
                }
            },
            pageSize: {
                width: 1200, 
                height: 550
            }
        };

        pdfMake.createPdf(docDefinition).download('User_Data.pdf');
    });
});

    </script>
</body>

</html>
