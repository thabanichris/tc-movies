$(document).ready(()=>{
	$(#contactForm).on("submit",(e)=>{
		e.reventDefault();
		var spinner = '<div class"spinner-border" role="status"><span></span></div>' ;
		console.log("Submitted");
		$(#submitBtn).html(spinner)
		var formData = new FormData(document.getElementById(#contactForm));

		$.ajax({
			url : "../incl/contactSubmit.php",
			type : "POST",
			data: formData,
			processData : false,
			contentType : false
		}).done((response)=>{
			console.log(response);
		});
	})
})