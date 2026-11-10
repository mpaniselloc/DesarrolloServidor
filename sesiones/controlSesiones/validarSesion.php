<?php session_start(); ?>

<?php
   if (isset($_POST['usuario']) && isset($_POST['passw'])) {
	 if (($_POST['usuario']=="admin")&&($_POST['passw']=="abcdef") || ($_POST['usuario']=="user")&&($_POST['passw']=="123456") ) {
        session_id(md5('LIBROSPHERE'));
		$_SESSION['usuario']=$_POST['usuario'];
		$_SESSION['tiempo']=time(); 
	}  ?>
    <script>location.href="../../index.php"</script>;
<?php
}
else
	{
	?>
 <script>location.href="../../index.php"</script>;
	<?php
	}
?>
	</div>
</body>
</html>