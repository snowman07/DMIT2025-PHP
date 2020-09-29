<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Summer Vacation</title>
    <style type="text/css">
        body {
            background-color: lightgray;
        }
        .container {
            background-color: gray;
            padding-top: 10px;
        }
        h1 {
            color: blue;
            text-align: center;
            font-size: 40px;
            background-color: yellow;
            margin-left: 30px;
            margin-right: 30px;
        }
        h2 {
            text-shadow: 2px 2px 5px red;
        }
        p {
            padding-left: 20px;
            padding-right: 20px;
        }
    
    </style>
</head>
<body>
    
    <!--Start of PHP blocks-->
    <?php
    
        echo "<div class=\"container\">"; // use backslash \ for CSS

            echo "\n\t\t<h1>What I did on my summer vacation</h1>";
            echo "<br/>";
            echo "<br/>";

            echo "\n\t\t<h2>Work</h2>";
            echo "\n\t\t<p>Despite the pandemic we are currently facing, I got a chance find a work over the summer. This is a physically challenging job as I worked with the demolition team. The team basically demolished everything that is not needed in the modernization of the school building.</p>";
            echo "<br/>";

            echo "\n\t\t<h2>Study</h2>";
            echo "\n\t\t<p>Had to refresh my mind from the past programming lectures and did some advance study on the following programming language:</p>";
            echo "\n\t\t<ul>";
                echo "\n\t\t\t<li>JavaScript</li>";
                echo "\n\t\t\t<li>PHP</li>";
            echo "\t\t</ul>";
            echo "<br/>";

            echo "\n\t\t<h2>Relax</h2>";
            echo "\n\t\t<p>Despite being busy, I still manage to clear my mind from worries and stress. My family travelled to: </p>";
            echo "\n\t\t<ul>";
                echo "\n\t\t\t<li>Lake Loiuse</li>";
                echo "\n\t\t\t<li>Banff</li>";
                echo "\n\t\t\t<li>Calgary</li>";
            echo "\n\t\t</ul>";;
            echo "\n\t\t\t<img src=\"banff.jpg\" alt=\"beautiful place\">"; 
            echo "<br/>";
            echo "<br/>";

        echo "\n\t</div>";

    ?>
    <!--End of PHP blocks-->

</body>
</html>
