$(function(){
	$(".login-button").click(function() {
		var login = $("[name='login']").val()
		var password = $("[name='password']").val()
		$.post("index.php?obj=Login", { login: login, password: password })
		.done(function(data) {
			$(".login").html(data)
		})
		.fail(function() {
			alert( "error" )
		})
	})
});