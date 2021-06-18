<!-- 
// 6Ld4UjgbAAAAACE8pkZi1L7DnGSiOX2IzcLQjlvy
// 6Ld4UjgbAAAAAExK-YaGzj0JWAoKy69_CNvgxIVV
 -->

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>reCapcha</title>
	<link rel="stylesheet" href="">
	<script src="https://www.google.com/recaptcha/api.js"></script>
	<script>
		function onSubmit(token) {
			document.getElementById("demo-form").submit();
		}
	</script>
</head>
<body>
	<button class="g-recaptcha" 
        data-sitekey="6Ld4UjgbAAAAACE8pkZi1L7DnGSiOX2IzcLQjlvy" 
        data-callback='onSubmit' 
        data-action='submit'>Submit</button>
</body>
</html>