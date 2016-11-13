  $(function(){
  var x = 10;
  var y = 20;
  
  $("a.linkTip").mousemove(function(e){
   
   var linkTip = $("#linkTip");
   if(!linkTip.length){
     this.myTitle = this.title;
     this.title = "";
     linkTip = $("<div id='linkTip'>"+this.myTitle+"</div>");
     $("body").append(linkTip);
   }
   
   linkTip.css({
     "top": (e.pageY+y) + "px",
     "left": (e.pageX+x) + "px"
   }).show("fast");
   
  }).mouseout(function(){
     this.title = this.myTitle;
     $("#linkTip").remove();
   });
});