$(document).ready(function(){

    $('.page1 .page_next').click(function () {
  		$('.page2').scrollView();
    });  
    $('.page2 .page_next').click(function () {
  		$('.page3').scrollView();
    }); 
    $('.page3 .page_prev').click(function () {
  		$('.page1').scrollView();
    }); 
});












