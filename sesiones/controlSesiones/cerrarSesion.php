<?php session_start(); ?>
<head>
<title>WEBSITE INSTITUCIÓN PAU CASALS (Versión 6) - Gestión de preinscripciones - Cerrando sesión de usuario</title>
<meta charset="UTF-8">
</head>
<body>
<?php
session_unset();
session_destroy();
?>
<script>location.href="../../index.php"</script>;

</body>
</html>