<?php
include "../control/admin/control.php";
$ninomUser = new ninomUser;
$listProductData = new listProduct;
$read = $listProductData->selectListProduct();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Responsive Bootstrap Advance Admin Template</title>

  <!-- BOOTSTRAP STYLES-->
  <link href="assets/css/bootstrap.css" rel="stylesheet" />
  <!-- FONTAWESOME STYLES-->
  <link href="assets/css/font-awesome.css" rel="stylesheet" />
  <!--CUSTOM BASIC STYLES-->
  <link href="assets/css/basic.css" rel="stylesheet" />
  <!--CUSTOM MAIN STYLES-->
  <link href="assets/css/custom.css" rel="stylesheet" />
  <!-- GOOGLE FONTS-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
  <div id="wrapper">
    <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="_index.php">COMPANY NAME</a>
      </div>

      <div class="header-right">

        <a href="message-task.html" class="btn btn-info" title="New Message"><b>30 </b><i class="fa fa-envelope-o fa-2x"></i></a>
        <a href="message-task.html" class="btn btn-primary" title="New Task"><b>40 </b><i class="fa fa-bars fa-2x"></i></a>
        <a href="login.html" class="btn btn-danger" title="Logout"><i class="fa fa-exclamation-circle fa-2x"></i></a>


      </div>
    </nav>
    <!-- /. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">
      <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">


          <li>
            <a href="#"><i class="fa fa-flast "></i>Data Tables<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
              <li>
                <a href="listProduct_table.php"><i class="fa fa-list"></i>List Product</a>
              </li>
              <li>
                <a href="contact_table.php"><i class="fa fa-user"></i>List Contact</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="form-basic-product.php"><i class="fa fa-desktop "></i>Product Forms</a>
          </li>
          <li>
            <a href="../control/admin/action.php?action=logout"><i class="fa fa-sign-in "></i>Log Out</a>
          </li>
        </ul>
      </div>

    </nav>
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper">
      <div id="page-inner">
        <div class="row">
          <div class="col-md-12">
            <h1 class="page-head-line">Data Table</h1>
            <h1 class="page-subhead-line">This is dummy text , you can replace it with your original text. </h1>

          </div>
        </div>
        <!-- /. ROW  -->

        <div class="row">
          <div class="col-md-6">
            <!--   Kitchen Sink -->
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover">
                    <thead>
                      <tr>
                        <th> ID </th>
                        <th> Name</th>
                        <th> Qty </th>
                        <th> picture </th>
                        <th> category </th>
                        <th> date </th>
                        <th> price </th>
                        <th> description </th>
                        <th colspan="2"> Action </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if ($read->num_rows > 0) {
                        while ($row = $read->fetch_assoc()) {
                      ?>
                          <form method="POST" action="../control/admin/action.php?action=tableProduct">
                            <tr>
                              <td>
                                <?php echo $row["ID"] ?>
                              </td>
                              <td>
                                <?php echo $row["name"] ?>
                              </td>
                              <td>
                                <input type="number" placeholder="<?php echo $row["number"] ?>" name="productQty" />
                              </td>
                              <td>
                                <img style="width: 80px;height: 80px;" src="./uploaded/product/<?php echo $row["picture"] ?>">
                              </td>
                              <td>
                                <?php echo $row["categoryID"] ?>
                              </td>
                              <td>
                                <?php echo $row["date"] ?>
                              </td>
                              <td>
                                <?php echo $row["price"] ?>
                              </td>
                              <td>
                                <?php echo $row["description"] ?>
                              </td>

                              <td>
                                <button class="btn" type="submit" name="update" value="<?php echo $row["ID"] ?>" onclick="return confirm('Are you sure?')">Update</button>
                              </td>
                              <td>
                                <button class="btn" type="submit" name="delete" value="<?php echo $row["ID"] ?>" onclick="return confirm('Are you sure?')">Delete</button>
                              </td>
                          </form>
                      <?php
                        }
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- End  Kitchen Sink -->
          </div>
        </div>
        <!-- /. ROW  -->

      </div>
      <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
  </div>
  <!-- /. WRAPPER  -->
  <div id="footer-sec">
    &copy; 2014 YourCompany | Design By : <a href="http://www.binarytheme.com/" target="_blank">BinaryTheme.com</a>
  </div>
  <!-- /. FOOTER  -->
  <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
  <!-- JQUERY SCRIPTS -->
  <script src="assets/js/jquery-1.10.2.js"></script>
  <!-- BOOTSTRAP SCRIPTS -->
  <script src="assets/js/bootstrap.js"></script>
  <!-- METISMENU SCRIPTS -->
  <script src="assets/js/jquery.metisMenu.js"></script>
  <!-- CUSTOM SCRIPTS -->
  <script src="assets/js/custom.js"></script>
  <script>
    <?php
    switch ($_GET["status"]) {
      case 1: ?>
        <?php break; ?>
      <?php
      case 2: ?>
        alert("Check value before update!");
        <?php break; ?>
      <?php
      default: ?>
        <?php break; ?>
    <?php } ?>
  </script>


</body>

</html>
