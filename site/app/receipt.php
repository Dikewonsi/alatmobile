<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta http-equiv="refresh" content="900;url=time-out.php">
    <meta name="theme-color" content="#000000">
    <title>Alat - Receipts</title>
    <meta name="description" content="Alat Mobile Bank">
    <meta name="keywords"
        content="bootstrap, wallet, banking, fintech mobile template, cordova, phonegap, mobile, html, responsive" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link rel="icon" type="image/png" href="assets/img/favicon.png" sizes="32x32">    
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/icon/192x192.png">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="manifest" href="__manifest.json">
</head>

<body>

    <!-- loader -->
    <div id="loader">
        <img src="assets/img/favicon.png" alt="icon" class="loading-icon">
    </div>
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader">
        <div class="left">
            <a href="#" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">Generate Receipt</div>
        <div class="right">
        </div>
    </div>
    <!-- * App Header -->


    <!-- App Capsule -->
    <div id="appCapsule">

        


        <div class="section mt-2">
            <div class="card">
                <ul class="listview flush transparent image-listview">
                    <li>
                        <a href="#" class="item" data-bs-toggle="modal" data-bs-target="#DialogIconedDanger">
                            <div class="icon-box bg-primary">
                                <i class="material-icons">task</i>
                            </div>
                            <div class="in">
                                Transfer Receipt
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="section mt-2">
            <div class="card">
                <ul class="listview flush transparent image-listview">
                    <li>
                        <a href="#" class="item" data-bs-toggle="modal" data-bs-target="#DialogIconedDanger2">
                            <div class="icon-box bg-primary">
                                <i class="material-icons">request_quote</i>
                            </div>
                            <div class="in">
                                Bill Payment & Mobile Receipt
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>     

        <!-- DialogIconedDanger -->
        <div class="modal fade dialogbox" id="DialogIconedDanger" data-bs-backdrop="static" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-icon text-danger">
                        <ion-icon name="close-circle"></ion-icon>
                    </div>
                    <div class="modal-header">
                        <h5 class="modal-title">Error</h5>
                    </div>
                    <div class="modal-body">
                        No Receipt Available
                    </div>
                    <div class="modal-footer">
                        <div class="btn-inline">
                            <a href="#" class="btn" data-bs-dismiss="modal">CLOSE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- * DialogIconedDanger -->

        <!-- DialogIconedDanger -->
        <div class="modal fade dialogbox" id="DialogIconedDanger2" data-bs-backdrop="static" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-icon text-danger">
                        <ion-icon name="close-circle"></ion-icon>
                    </div>
                    <div class="modal-header">
                        <h5 class="modal-title">Error</h5>
                    </div>
                    <div class="modal-body">
                        No Receipt Available
                    </div>
                    <div class="modal-footer">
                        <div class="btn-inline">
                            <a href="#" class="btn" data-bs-dismiss="modal">CLOSE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- * DialogIconedDanger -->       
        <br>                


    <?php include('app-bottom.php'); ?>

    <!-- App Sidebar -->
    <div class="modal fade panelbox panelbox-left" id="sidebarPanel" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <!-- profile box -->
                    <div class="profileBox pt-2 pb-2">
                        <div class="image-wrapper">
                            <img src="assets/img/sample/avatar/avatar1.jpg" alt="image" class="imaged  w36">
                        </div>
                        <div class="in">
                            <strong><?php echo $fname ?></strong>
                            <div class="text-muted"><?php echo $acc_num; ?></div>
                        </div>
                        <a href="#" class="btn btn-link btn-icon sidebar-close" data-bs-dismiss="modal">
                            <ion-icon name="close-outline"></ion-icon>
                        </a>
                    </div>
                    <!-- * profile box -->
                    <!-- balance -->
                    <div class="sidebar-balance">
                        <div class="listview-title">Balance</div>
                        <div class="in">
                            <h1 class="amount">$ <?php echo $new_balance; ?>.00</h1>
                        </div>
                    </div>
                    <!-- * balance -->

                    <!-- action group -->
                    <div class="action-group">
                        <a href="frequent-transactions.php" class="action-button">
                            <div class="in">
                                <div class="iconbox">
                                    <i class="material-icons">east</i>
                                </div>
                                Send
                            </div>
                        </a>
                        <a href="my-cards.php" class="action-button">
                            <div class="in">
                                <div class="iconbox">
                                    <i class="material-icons">credit_card</i>
                                </div>
                                Cards
                            </div>
                        </a>
                        <a href="loans.php" class="action-button">
                            <div class="in">
                                <div class="iconbox">
                                    <i class="material-icons">attach_money</i>
                                </div>
                                Loans
                            </div>
                        </a>                        
                        <a href="savings.php" class="action-button">
                            <div class="in">
                                <div class="iconbox">
                                    <i class="material-icons">savings</i>
                                </div>
                               Savings
                            </div>
                        </a>
                    </div>
                    <!-- * action group -->

                    <!-- menu -->
                    <div class="listview-title mt-1">Menu</div>
                    <ul class="listview flush transparent no-line image-listview">
                        <li>
                            <a href="index.php" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="person-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    My Account(s)
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="frequent-transactions.php" class="item">
                                <div class="icon-box bg-primary">
                                    <i class="material-icons">cached</i>
                                </div>
                                <div class="in">
                                    Frequent Transactions
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="beneficiary.php" class="item">
                                <div class="icon-box bg-primary">
                                    <i class="material-icons">group</i>
                                </div>
                                <div class="in">
                                    Beneficiary Management
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="my-cards.php" class="item">
                                <div class="icon-box bg-primary">
                                    <i class="material-icons">credit_card</i>
                                </div>
                                <div class="in">
                                    Card Services
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="self-service.php" class="item">
                                <div class="icon-box bg-primary">
                                    <i class="material-icons">info</i>
                                </div>
                                <div class="in">
                                    Self Service
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="loans.php" class="item">
                                <div class="icon-box bg-primary">
                                    <i class="material-icons">attach_money</i>
                                </div>
                                <div>
                                    Loans
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="lifestyle.php" class="item">
                                <div class="icon-box bg-primary">
                                    <i class="material-icons">nightlife</i>
                                </div>
                                <div class="in">
                                    Lifestyle
                                </div>
                            </a>
                        </li>
                    </ul>        
                    <div class="listview-title mt-1"><hr></div>        
                    <ul class="listview flush transparent no-line image-listview">
                        <li>
                            <a href="account-settings.php" class="item">
                                <div class="icon-box bg-primary">
                                    <i class="material-icons">settings</i>
                                </div>
                                <div class="in">
                                    Account Settings
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="support.php" class="item">
                                <div class="icon-box bg-primary">
                                    <i class="material-icons">contact_support</i>
                                </div>
                                <div class="in">
                                    Talk to Us
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="logout.php" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="log-out-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    Log out
                                </div>
                            </a>
                        </li>


                    </ul>
                    <!-- * others -->

                </div>
            </div>
        </div>
    </div>
    <!-- * App Sidebar -->

    <!-- ========= JS Files =========  -->
    <!-- Bootstrap -->
    <script src="assets/js/lib/bootstrap.bundle.min.js"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- Splide -->
    <script src="assets/js/plugins/splide/splide.min.js"></script>
    <!-- Base Js File -->
    <script src="assets/js/base.js"></script>

    <script>
        // Add to Home with 2 seconds delay.
        AddtoHome("2000", "once");
    </script>

</body>

</html>