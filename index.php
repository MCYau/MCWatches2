<?php
include("header.php");
?>
<html>
    <head>
        <title>Home</title>
        <style>
            .slideshow-container{
grid-column: 1 / 6;
grid-row: 1 / 2;
background-color: #A8B5E0;
text-align: center;
}

.fade{
animation-name: fade;
animation-duration: 1.5s;
}

@keyframes fade{
from {opacity: 0.4;}
to {opacity: 1;}
}
</style>
</head>
<body>
<?php
include("main.php");
?>
</body>
</html>
<?php
include("footer.php");
?>