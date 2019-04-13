const init = () => {
	let menu = document.getElementById("menu");
	 close = document.getElementById("close");
	 
	 menu_background = document.getElementById("menu-background");
	
	 nav_wrapper = document.getElementById("nav-wrapper");
	 nav = document.getElementById("nav");
	 next = document.getElementById("questionaireBtn2");
	 prev = document.getElementById("questionaireBtn1");
	 tabs = document.querySelectorAll("div.tab");
	 counter = document.getElementById("counter");
	 qSubmit = document.getElementById("questionaire-submit-btn");
	 get_started = document.getElementsByClassName("get-started")[0];
	blog = document.getElementsByClassName("blog")[0];
	 blog_container = document.getElementsByClassName("blog-container")[0];
	 modal = document.getElementsByClassName("modal")[0];
	 questionaire = document.getElementsByClassName("questionaire")[0];
	 li = document.querySelectorAll("nav>ul>li");
	 li2 = document.getElementById("i");
	 about_wrapper = document.getElementsByClassName("about-wrapper")[0];
	 col = document.querySelectorAll(".modal>.col");
	 questionaire_form = document.getElementById("questionaire-form");




alert_msg = () => {

$(".confirmation-msg").addClass("confirmation-start-left");

	//div.style.left = "20%";
	//	div.style.transition = ".2"
  setTimeout(function(){
  $(".confirmation-msg").addClass("confirmation-start-width");
  //div.style.width = "250px";
  $(".msg").css("display", "block");
   }, 900);
   
   setTimeout(function(){
  $(".confirmation-msg").addClass("confirmation-end-width");
  //div.style.width = "60px";
   $(".msg").css("display", "none");
   }, 5000);
   
   setTimeout(function(){
   $(".confirmation-msg").addClass("confirmation-end-left");
  //div.style.left = "100%";
  //div.style.transition = ".1s";
   }, 6500);
	


 setTimeout(function(){
   $(".confirmation-msg").removeClass("confirmation-start-left confirmation-end-left confirmation-end-width confirmation-start-width");
   }, 7500);



}





	menu.onclick = () => {
		nav_wrapper.setAttribute("class", "open-modal");
		nav.style.display = "inline-block";
		close.style.display = "block";
		menu.style.display = "none";
	}

	

	close.onclick = () => {
		nav_wrapper.setAttribute("class", "close-modal");
		nav.style.display = "none";
		close.style.display = "none";
		menu.style.display = "block";
	}




	//var voteable = (age < 18) ? "Too young":"Old enough";
	let i = 0;
	tabs[0].style.display = "block";
	prev.style.display = "none";
	let tabsLength = tabs.length - 1;

	const none = () => {
		for (n = 0; n < tabs.length; n++) {
				tabs[n].style.display = "none";
		}
	}


	next.onclick = () => {



	 	
var arr =[];

for(y=0;y<8;y++) {
	arr.push(tabs[0].parentElement[y].checked);
}







if(arr.includes(true) != true) {

	$(".msg").html("please fill out required fields");
	$(".confirmation-msg").css("background-color", "#CC0000");
	$(".checkbox-container>img").attr("src", "assets/icons/danger_icon.svg");
	 		alert_msg();

	 		return false;

} else{
	console.log("good to go");
}




if(tabs[0].parentElement[7].checked == true && $("#other1").val() == "") {
	$("#other1").css("border", "1px solid #ff4444");
	return false;
} else {
	$("#other1").css("border", "1px solid #e7e7e7");
}



if (i == 1 && $("#start").val() == ""){$("#start").css("border", "1px solid #ff4444");}
if (i == 1 && $("#deadline").val() == ""){$("#deadline").css("border", "1px solid #ff4444");}
if(i == 1 && $("#deadline").val() == "" || i == 1 && $("#start").val() == ""){
return false;


}







		none();
		if (i < tabsLength ){
			i++;
		}
		if (i > 0) {
		    prev.style.display = "inline";
	    }
	    tabs[i].style.display = "block"; console.log(tabs[0]);
	    counter.innerHTML = i + 1;
	    if (i == tabsLength) {
	    	next.style.display = "none";
	    	qSubmit.style.display = "block";
	    }
	
}

	prev.onclick = () => {
		none();
		if (i > 0){
			i--;
		}
		if (i == 0) {
		    prev.style.display = "none";
	    }
		tabs[i].style.display = "block"; console.log(i);
		counter.innerHTML = i +1;

		 if (i < tabsLength) {
	    	next.style.display = "block";
	    	qSubmit.style.display = "none";
	    }
	}







function remove_border() {
	for (int=0; int<li.length; int++ ) {
		li[int].style.border = "none";
	}
}

function remove_col() {
	for (o=0; o<col.length; o++ ) {
		col[o].style.display = "none";
		console.log(col);
	}
}
console.log(col);




console.log(li[0]);
about_wrapper.style.display = "block";


//replace 0 with att value parse int
   li[0].onclick = () => {
   			remove_col();
	 col[0].style.display = "block";

   }








// This approach is called event delegation, 
// and it works by taking advantage of something called event bubbling.

document.addEventListener('click', function (event) {

	// If the clicked element doesn't have the right selector, bail
	if (!event.target.matches('.i')) return;
remove_border();
	// Don't follow the link
	event.preventDefault();

	// Log the clicked element in the console
	event.target.style.borderBottom = "2px solid #EC4D37";

}, false);




   


$("#questionaire-form").submit(function(e){
  e.preventDefault();
  var formdata = new FormData($('#questionaire-form')[0]);
  var formdata1 = new FormData($('#contact-form')[0]);
var patt = new RegExp("@");
  var patt2 = new RegExp(".com");///loook into!!


if (i == 2 && $("#email").val() == "") {
	$("#email").css("border", "1px solid #ff4444");
} else {
	$("#email").css("border", "1px solid #e7e7e7");
}

if (i == 2 && $("#name").val() == ""){
	$("#name").css("border", "1px solid #ff4444");
} else {
	$("#name").css("border", "1px solid #e7e7e7");
}

if (i == 2 && $("#name").val() == "" || i == 2 &&
 $("#email").val() == "" || i == 2 &&
 patt.test($("#email").val()) === false || i == 2 &&
 patt2.test($("#email").val()) === false ) {
	console.log("move forward");///no code runs after this point if true 
	console.log(i);
	
	return false;
	
}
	 		


  var xhttp = new XMLHttpRequest();
  xhttp.open("POST", "inc/mailer.php", true);

  if (xhttp.readyState !== 4){
    $(".loading-gif-wrapper").html("<img src='assets/images/loading_gif.gif'>");
    $(".loading-gif-wrapper").addClass("start-loading-gif");
  } console.log(xhttp.readyState);
  xhttp.onreadystatechange = function() {console.log(xhttp.status);

  	//if php error return false
  	
    if (this.readyState == 4 && this.status == 200) {console.log(xhttp.readyState);



      $(".loading-gif-wrapper").removeClass("start-loading-gif");
      $(".loading-gif-wrapper").html("");
      
      $(".msg").html(xhttp.responseText);
      none();
      i=0;
	 tabs[i].style.display = "block";
	 counter.innerHTML = 1;
	 next.style.display = "block";
	 qSubmit.style.display = "none";
$("#questionaire-form")[0].reset();
if(xhttp.responseText.includes("Message could not be sent.") == true) {
	$(".confirmation-msg").css("background-color", "#CC0000");
	$(".checkbox-container>img").attr("src", "assets/icons/danger_icon.svg");
	alert_msg();
	return false;
  	}
	 
$(".checkbox-container>img").attr("src", "assets/icons/check-icon.svg");
      alert_msg();

console.log(questionaire_form);
	 
    }console.log(xhttp.readyState);
  };console.log(xhttp.status);
  xhttp.send(formdata);


});

//$(".msg")













$("#contact-form").submit(function(e){
  e.preventDefault();
  var formdata1 = new FormData($('#contact-form')[0]);
var patt = new RegExp("@");
  var patt2 = new RegExp(".com");///loook into!!


if ($("#contact-email").val() == "") {
	$("#contact-email").css("border", "1px solid #ff4444");
} else {
	$("#contact-email").css("border", "1px solid #e7e7e7");
}

if ($("#contact-name").val() == ""){
	$("#contact-name").css("border", "1px solid #ff4444");
} else {
	$("#contact-name").css("border", "1px solid #e7e7e7");
}


if ($("#message").val() == ""){
	$("#message").css("border", "1px solid #ff4444");
} else {
	$("#message").css("border", "1px solid #e7e7e7");
}



if (
 patt.test($("#contact-email").val()) === false ||
 patt2.test($("#contact-email").val()) === false ) {
	console.log("move forward");///no code runs after this point if true 
	console.log(i);
	
	return false;
	
}
	 		


  var xhttp = new XMLHttpRequest();
  xhttp.open("POST", "inc/contact-mailer.php", true);

  if (xhttp.readyState !== 4){
    $(".loading-gif-wrapper").html("<img src='assets/images/loading_gif.gif'>");
    $(".loading-gif-wrapper").addClass("start-loading-gif");
  } console.log(xhttp.readyState);
  xhttp.onreadystatechange = function() {console.log(xhttp.status);

  	//if php error return false
  	
    if (this.readyState == 4 && this.status == 200) {console.log(xhttp.readyState);



      $(".loading-gif-wrapper").removeClass("start-loading-gif");
      $(".loading-gif-wrapper").html("");
      
      $(".msg").html(xhttp.responseText);

$(".checkbox-container>img").attr("src", "assets/icons/check-icon.svg");
      alert_msg();     

$("#contact-form")[0].reset();

if(xhttp.responseText.includes("Message could not be sent.") == true) {
	$(".confirmation-msg").css("background-color", "#CC0000");
	$(".checkbox-container>img").attr("src", "assets/icons/danger_icon.svg");
	alert_msg();
	return false;
  	}
	 


	 
    }console.log(xhttp.readyState);
  };console.log(xhttp.status);
  xhttp.send(formdata1);












});







$('a').click(function(){
    $('html, body').animate({
        scrollTop: $( $(this).attr('href') ).offset().top
    }, 700);
});







var div = document.getElementsByClassName("confirmation-msg")[0];
var header = document.getElementsByClassName("logo_mo")[0];





















}
	

init();





