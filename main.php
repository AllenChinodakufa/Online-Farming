<?php
include "Include/header.php";
?>
<body>
    <div class="dash" style="background-image: url('assets/img/main (4).jpg');">
        <div class="dash-aside">
            <ul>
                <li>
                    <a href="main.php">
                        <span class="start ion-ios-speedometer-outline"></span>
                        <span>Dashboard</span>
                        <span class="end ion-ios-arrow-right"></span>
                    </a>
                </li>
                <li>
                    <a href="expenses.php">
                        <span class="start ion-ios-analytics-outline"></span>
                        <span>Stock</span>
                        <span class="end ion-ios-arrow-right"></span>
                    </a>
                </li>
                <li>
                    <a href="crops.php">
                        <span class="start ion-ios-nutrition-outline"></span>
                        <span>Crops</span>
                        <span class="end ion-ios-arrow-right"></span>
                    </a>
                </li>
                <li>
                    <a href="animals.php">
                        <span class="start ion-ios-sunny-outline"></span>
                        <span>Animals</span>
                        <span class="end ion-ios-arrow-right"></span>
                    </a>
                </li>
                <li>
                    <a href="expenses.php">
                        <span class="start ion-ios-analytics-outline"></span>
                        <span>Expenses</span>
                        <span class="end ion-ios-arrow-right"></span>
                    </a>
                </li>
                <li>
                    <a href="#" data-action="logout">
                        <span class="start ion-log-out"></span>
                        <span>Logout</span>
                        <span class="end ion-ios-arrow-right"></span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="dash-aside">
            <div class="section-header">
                <h4>
                    <span class="ion-ios-speedometer-outline"></span>
                    <span>Dashboard</span>
                </h4>
            </div>
            <div class="flex">
                <div class="card primary">
                    <div class="card-header">
                        <i class="ion-ios-speedometer-outline"></i>
                        <h4>Dashboard</h4>
                    </div>
                    <div class="card-body">
                        <p>This is your main dashboard page</p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="ion-button">
                            <span>learn more</span>
                            <span class="end ion-ios-arrow-right"></span>
                        </a>
                    </div>
                </div>
                <div class="card primary">
                    <div class="card-header">
                        <i class="ion-ios-analytics-outline"></i>
                        <h4>Stock</h4>
                    </div>
                    <div class="card-body">
                        <p>Add, delete stock and inventory here</p>
                    </div>
                    <div class="card-footer">
                        <a href="stock.php" class="ion-button">
                            <span>learn more</span>
                            <span class="end ion-ios-arrow-right"></span>
                        </a>
                    </div>
                </div>
                <div class="card primary">
                    <div class="card-header">
                        <i class="ion-ios-nutrition-outline"></i>
                        <h4>Crops</h4>
                    </div>
                    <div class="card-body">
                        <p>Browse your farm crops, read, and update fields.</p>
                    </div>
                    <div class="card-footer">
                        <a href="crops.php" class="ion-button">
                            <span>learn more</span>
                            <span class="end ion-ios-arrow-right"></span>
                        </a>
                    </div>
                </div>
                <div class="card primary">
                    <div class="card-header">
                        <i class="ion-ios-sunny-outline"></i>
                        <h4>Animals</h4>
                    </div>
                    <div class="card-body">
                        <p>Browse your farm crops, read, and update fields.</p>
                    </div>
                    <div class="card-footer">
                        <a href="animals.php" class="ion-button">
                            <span>learn more</span>
                            <span class="end ion-ios-arrow-right"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
include "Include/footer.php";
?>

</body>