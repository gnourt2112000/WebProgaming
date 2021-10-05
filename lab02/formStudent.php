<html>
    <head><title>Receving</title></head>
    <body>
        <?php
            $name = $_POST["name"];
            $class = $_POST["class"];
            $university = $_POST["university"];
            print ("Hello, $name<br>");
            print ("You are study at $class, $university <br>");
            print ("Your hobby is <br>");
            if (isset($_POST['vehicle'])) {
                foreach($_POST['vehicle'] as $value) {
                    //Xử lý các phần tử được chọn
                    echo $value."<br/>";
                }
            }
            ?>
    </body>
</html>