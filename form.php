<?php
require "db.php";
$candidates = getCandidate();
if (isset($_POST['smb'])) {
    $form = $_POST;
    if (canVote($form['Id'])){
        setVoted($form['votes'],$form['Id']);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form dr.it</title>
    <link rel="stylesheet" href="css/simple-grid.css">
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
    <main class="w-100 h-m-100vw d-inline-flex align-items-center">
        <div class="container">
            <form method="POST" class="shadow rounded overflow-hidden my-3">
                <div class="row">
                    <div class="col-12 col-lg-4 m-0 bg-linear order-2 order-lg-1">
                        <div id="form-p2">
                            <h3 class="txt-center txt-white py-3">
                                اسامی کاندید ها
                            </h3>
                            <?php foreach ($candidates as $candidate) { ?>
                                <div class="py-1">
                                    <input type="checkbox" name="votes[<?php echo $candidate['id']; ?>]" id="candidate1" class="inputOnclick">
                                    <label for="candidate1" class="txt-white"><?php echo $candidate['name']; ?></label>
                                </div>
                           <?php } ?>
                            <!-- Up to n ... -->
                        </div>
                    </div>
                    <div class="col-12 col-lg-8 m-0 bg-white order-1">
                        <div id="form-p1">
                            <h3 class="txt-center py-3">
                                تکمیل مشخصات
                            </h3>
                            <label for="inputName" class="d-block d-none">اسم و اسم و فامیل</label>
                            <input type="text" name="name" class="d-block rounded-pill my-4" id="inputName" maxlength="100" placeholder="نام و نام خانوادگی"  required>

                            <label for="inputId" class="d-block d-none">کد ملی</label>
                            <input type="text" name="Id" class="d-block rounded-pill mt-4 mb-2" id="inputId" maxlength="20" placeholder="کد ملی"  required>
                            <span class="txt-danger font-size-sm pr-3 d-none">
                                کد ملی وجود ندارد
                            </span>

                            <button class="btn color-2 rounded-pill mt-4 d-block mx-auto" name="smb">
                                ارسال فرم
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
    <footer class="w-100 d-flex align-items-center justify-center bg-linear">
        <img src="dr logo.png" alt="dr.it">
        <span class="txt-white px-2">
            di.it
        </span>
        <span class="txt-white px-2">
            انجمن برنامه نویسان نوجوان
        </span>
    </footer>
    <script src="index.js"></script>
</body>

</html>