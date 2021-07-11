<?php
include "Include/header.php";
?>
<?php
if (isset($_GET['delete'])) {
    $sql = "DELETE FROM `tbl_inventory` WHERE `tbl_inventory`.`STOCK_ID` = ".$_GET['delete'];
    $sqlresult = mysqli_query($conn, $sql);
}
?>
<body>
    <div class="dash" style="background-image: url('assets/img/main (6).jpg');">
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
                    <span class="ion-ios-analytics-outline"></span>
                    <span>Stock</span>
                    <a href="#" data-action="add" class="end">
                        <span style="font-size: 40px" class="ion-ios-plus"></span>
                    </a>
                </h4>
            </div>
            <div class="section-table">
                <table class="table-responsive">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>item</th>
                            <th>category</th>
                            <th>cost ($USD)</th>
                            <th>actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM `tbl_inventory` WHERE `TYPE` = 'STOCK' AND `USER_ID`= '".get_userid($user)."'";
                        $sqlresult = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($sqlresult) > 0) {
                            while ($row = mysqli_fetch_assoc($sqlresult)) :?>
                                <tr>
                                    <td>#<?php echo $row["STOCK_ID"]; ?></td>
                                    <td><?php echo $row["ITEM"]; ?></td>
                                    <td><?php echo $row["CATEGORY"]; ?></td>
                                    <td><?php echo $row["COST"]; ?></td>
                                    <td>
                                        <div class="ion-buttons">
                                            <a href="#" data-delete="<?php echo $row["STOCK_ID"]; ?>" class="ion-button danger">
                                                <i class="ion-ios-trash-outline"></i>
                                            </a>
                                            <a href="#" data-edit="<?php echo $row["STOCK_ID"]; ?>"  data-item="<?php echo $row["ITEM"]; ?>" data-category="<?php echo $row["CATEGORY"]; ?>" data-cost="<?php echo $row["COST"]; ?>" class="ion-button primary">
                                                <i class="ion-edit"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            endwhile;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
<?php
include "Include/footer.php";
?>
<script>
    let tblEdit = $("a[data-edit]");
    let tblDelete = $("a[data-delete]");
    let tblAdd = $("[data-action='add'");

    const alertTo = function (header, message, location) {
        const elem = `<div class="alert">
        <div class="alert-wrapper">
            <div class="alert-header">
                <h4>${header}</h4>
            </div>
            <div class="alert-body">
                <p>${message}</p>
            </div>
            <div class="alert-footer">
                <div class="alert-buttons">
                    <a class="alert-button danger" data-action='dismiss'>
                        <i class="ion-ios-close-outline"></i>
                        <span>Cancel</span>
                    </a>
                    <a class="alert-button primary" data-action='ok'>
                        <i class="ion-ios-checkmark-outline"></i>
                        <span>Ok</span>
                    </a>
                </div>
            </div>
        </div>
        </div>`;
        $('body').append(elem);

        $("[data-action='dismiss']").click(function () {
            $('.alert').remove();
        });

        if (location !== null) {
            $("[data-action='ok']").click(function () {
                window.location.href = `${location}`;
            });
        } else {
            $("[data-action='ok']").click(function () {
                $('.alert').remove();
            });
        }
    }
    
    const toastT = function (header, message, duration) {
        const elem = `<div class="toast">
        <div class="toast-wrapper">
            <div class="toast-header">
                <h4>${header}</h4>
            </div>
            <div class="toast-message">
                <p>${message}</p>
            </div>
        </div>
        </div>`;
        $('body').append(elem);

        setTimeout(() => {
            $('.toast').remove();
            window.location.href = "stock.php";
        }, duration);
    }

    const actionSheetStockAEdit = function (header, message, itemid, item, category, cost) {
        const elem = `<div class="alert stockaddd">
        <form class="alert-wrapper">
            <div class="alert-header">
                <h4>${header}</h4>
            </div>
            <div class="alert-body">
                <p>${message}</p>
                <div class="form-group">
                    <label for="item">item:</label>
                    <input id="item" type="text" placeholder="Your Item.." value="${item}" required>
                    <span class="form-response">
                        <span class="success">
                            <p>Looks good</p>
                        </span>
                    </span>
                </div>
                <div class="form-group">
                    <label for="category">Category:</label>
                    <input id="category" type="text" placeholder="Your Category.." value="${category}" required>
                    <span class="form-response">
                        <span class="success">
                            <p>Looks good</p>
                        </span>
                    </span>
                </div>
                <div class="form-group">
                    <label for="cost">Cost:</label>
                    <input id="cost" type="number" placeholder="Your Cost.." value="${cost}" required>
                    <span class="form-response">
                        <span class="success">
                            <p>Looks good</p>
                        </span>
                    </span>
                </div>
            </div>
            <div class="alert-footer">
                <div class="alert-buttons">
                    <a class="alert-button danger" data-action='dismiss'>
                        <i class="ion-ios-close-outline"></i>
                        <span>Cancel</span>
                    </a>
                    <a class="alert-button primary" data-action='submit'>
                        <i class="ion-ios-checkmark-outline"></i>
                        <span>Ok</span>
                    </a>
                </div>
            </div>
        </form>
        </div>
        `;

        $('body').append(elem);
        addEdit('.alert>.alert-wrapper', itemid);

        $("[data-action='dismiss']").click(function () {
            $('.alert.stockaddd').remove();
        });
    }

    const actionSheetStockTo = function (header, message) {
        const elem = `<div class="alert stockadd">
        <form class="alert-wrapper">
            <div class="alert-header">
                <h4>${header}</h4>
            </div>
            <div class="alert-body">
                <p>${message}</p>
                <div class="form-group">
                    <label for="item">item:</label>
                    <input id="item" type="text" placeholder="Your Item.." required>
                    <span class="form-response">
                        <span class="success">
                            <p>Looks good</p>
                        </span>
                    </span>
                </div>
                <div class="form-group">
                    <label for="category">Category:</label>
                    <input id="category" type="text" placeholder="Your Category.." required>
                    <span class="form-response">
                        <span class="success">
                            <p>Looks good</p>
                        </span>
                    </span>
                </div>
                <div class="form-group">
                    <label for="cost">Cost:</label>
                    <input id="cost" type="number" placeholder="Your Cost.." required>
                    <span class="form-response">
                        <span class="success">
                            <p>Looks good</p>
                        </span>
                    </span>
                </div>
            </div>
            <div class="alert-footer">
                <div class="alert-buttons">
                    <a class="alert-button danger" data-action='dismiss'>
                        <i class="ion-ios-close-outline"></i>
                        <span>Cancel</span>
                    </a>
                    <a class="alert-button primary" data-action='submit'>
                        <i class="ion-ios-checkmark-outline"></i>
                        <span>Ok</span>
                    </a>
                </div>
            </div>
        </form>
        </div>
        `;

        $('body').append(elem);
        addStock('.alert.stockadd>.alert-wrapper');

        $("[data-action='dismiss']").click(function () {
            $('.alert.stockadd').remove();
        });
        $("[data-action='submit']").click(function () {
            
        });

    }
        
    const addStock = function (formfield) {
        var check = false;

        $(`${formfield} a[data-action="submit"]`).on("click", function () {
            if (check === true) {
                var ajax = new ajaxRequest();

                ajax.onreadystatechange = function () {

                    console.log('OK');
                    if (ajax.readyState == 4 && ajax.status === 200) {
                        console.log(ajax.responseText);
                        if (ajax.responseText) {
                            toastT('Success!!', 'Success, item was added', 3000);
                        } else {
                            toastT('OOPS!!', 'Item is already in stock, please try again', 3000)
                        }
                    }

                }
                ajax.open("POST", "Config/stockconfig.php");

                ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                ajax.send("item=" + $(`${formfield} input#item`).val() + "&category=" + $(`${formfield} input#category`).val() + "&cost=" + $(`${formfield} input#cost`).val());
            }
            return check;
        });

        $(`${formfield} input`).each(function () {

            $(this).on("keyup", function () {

                if ($(this).attr("type") == "email") {

                    if ($(this).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                        $(this).next('.form-response').html("<span class='danger'>Invalid Entry, please try again</span>");
                        $(this).next('.form-response').attr('style', 'display: block');
                        check = false;
                    } else {
                        $(this).next('.form-response').html("<span class='success'>Looks good</span>");
                        $(this).next('.form-response').attr('style', 'display: block');
                        check = true;
                    }
                } else if ($(this).val().trim() == null || $(this).val().trim() == "" || $(this).val().trim().length == 0 || $(this).val().trim().length > Number($(this).attr("data-rule"))) {
                    $(this).next('.form-response').html("<span class='danger'>Invalid Entry, please try again</span>");
                    $(this).next('.form-response').attr('style', 'display: block');
                    check = false;
                } else {
                    $(this).next('.form-response').html("<span class='success'>Looks good</span>");
                    $(this).next('.form-response').attr('style', 'display: block');
                    check = true;
                }

            });
        });
    }
        
    const addEdit = function (formfield, itemid) {
        var check = false;

        $(`${formfield} a[data-action="submit"]`).on("click", function () {
            if (check === true) {
                var ajax = new ajaxRequest();

                ajax.onreadystatechange = function () {

                    console.log('OK');
                    if (ajax.readyState == 4 && ajax.status === 200) {
                        console.log(ajax.responseText);
                        if (ajax.responseText) {
                            toastT('Success!!', 'Success, item was updated', 3000);
                        } else {
                            toastT('OOPS!!', 'Something went wrong, please try again', 3000)
                        }
                    }

                }
                ajax.open("POST", "Config/stockedit.php");

                ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                ajax.send("id=" + `${itemid}` + "&item=" + $(`${formfield} input#item`).val() + "&category=" + $(`${formfield} input#category`).val() + "&cost=" + $(`${formfield} input#cost`).val());
            }
            return check;
        });

        $(`${formfield} input`).each(function () {

            $(this).on("keyup", function () {

                if ($(this).attr("type") == "email") {

                    if ($(this).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                        $(this).next('.form-response').html("<span class='danger'>Invalid Entry, please try again</span>");
                        $(this).next('.form-response').attr('style', 'display: block');
                        check = false;
                    } else {
                        $(this).next('.form-response').html("<span class='success'>Looks good</span>");
                        $(this).next('.form-response').attr('style', 'display: block');
                        check = true;
                    }
                } else if ($(this).val().trim() == null || $(this).val().trim() == "" || $(this).val().trim().length == 0 || $(this).val().trim().length > Number($(this).attr("data-rule"))) {
                    $(this).next('.form-response').html("<span class='danger'>Invalid Entry, please try again</span>");
                    $(this).next('.form-response').attr('style', 'display: block');
                    check = false;
                } else {
                    $(this).next('.form-response').html("<span class='success'>Looks good</span>");
                    $(this).next('.form-response').attr('style', 'display: block');
                    check = true;
                }

            });
        });
    }
    
    tblDelete.click(function(){
        alertTo("STOCK", `Are you sure you would like to delete item #${$(this).attr('data-delete')}`, `stock.php?delete=${$(this).attr('data-delete')}`);
    });

    tblEdit.click(function(){
        actionSheetStockAEdit("STOCK", `Are you sure you would like to edit item #${$(this).attr('data-edit')}`, `${$(this).attr('data-edit')}`, `${$(this).attr('data-item')}`, `${$(this).attr('data-category')}`, `${$(this).attr('data-cost')}`);
    });

    tblAdd.click(function(){
        actionSheetStockTo("STOCK", `Add a new item to your stock`);
    });
</script>

</body>