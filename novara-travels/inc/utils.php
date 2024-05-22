<?php
function button($name) {
    echo"<button> $name</button>";
}

function redirect($url) {
    echo "<script>
        window.location.href='$url';
        </script>
    ";
}
?>