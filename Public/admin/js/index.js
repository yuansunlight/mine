// var click = document.getElementById("click");
// var ul = document.getElementById("ul");
// 		console.log(click);
// 		var li=click.children;
// 		for(var i = 0;i < li.length;i++){
// 			li[i].onclick=function(){
// 				ul[i].style.display='block';
// 			}
// 		}
alert:function(msg){  
   this.show({buttons:{yes:'确认'},msg:msg,title:'消息'});  
 }
 confirm:function(msg,fn){  
   //fn为回调函数，参数和show方法的一致  
   this.show({buttons:{yes:'确认',no:'取消'},msg:msg,title:'提示',fn:fn});  
 }