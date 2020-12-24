<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Encode+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= CSS_PATH ?>style.css">
    <title><?= $result["titrePage"] ?></title>
</head>
<body>
    <h4 class="message" style="color:red; background-color:#FFB6C1"><?= App\Session::getFlash("error") ?></h4>
    <h4 class="message" style="color: green; background-color: rgb(214, 250, 214)"><?= App\Session::getFlash("success") ?></h4>
    <main>
        <div id="page">
            <?= $page ?>
        </div>
    </main>

    <!-- ------------------ JS ------------------ -->
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function(){
        /* ------------------ MESSAGE FLASH ------------------*/
            $(".message").each(function(){
                if($(this).text().length > 0){
                    $(this).slideDown(500, function(){
                        $(this).delay(3000).slideUp(500)
                    })
                }
            })
        })
    </script>
</body>
</html>