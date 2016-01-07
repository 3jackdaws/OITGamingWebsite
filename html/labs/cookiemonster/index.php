<?php
	var_dump($_COOKIE);

?>
<html>
<script>
function cookie()
{
	document.cookie("test=123; path=/");
}

</script>

<body>
<button onclick="cookie()">Cookie</button>