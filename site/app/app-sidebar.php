<?php 
    include('../connect.php');

    include('welcome.php');

    if(!isset($_SESSION['id'])){
            header("location:../login.php");
            exit();
        }

    $id = $_SESSION['id'];
    $fname = $_SESSION['fname'];

     $sql = "SELECT * from users where id = $id";
    $result = $conn->query($sql);
    while ($rows=mysqli_fetch_assoc($result)){        
        $balance = $rows['balance'];
        $fname = $rows['fname'];
        $acc_num = $rows['acc_num'];        
    }
?>
<!-- App Sidebar -->
    <div class="modal fade panelbox panelbox-left" id="sidebarPanel" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <!-- profile box -->
                    <div class="profileBox pt-2 pb-2">
                        <div class="image-wrapper">
                            <img src="upload/<?=$_SESSION['image']?>" alt="image" class="imaged  w36">
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
                            <h1 class="amount">$ 2,562.50</h1>
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