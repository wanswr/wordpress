/*!/wp-content/plugins/image-watermark/js/no-right-click.js*/
var IwNRCtargImg=null;var IwNRCtargSrc=null;var IwNRCinContext=!1;var IwNRCnotimage=new Image();var IwNRClimit=0;var IwNRCextra=iwArgsNoRightClick.rightclick;var IwNRCdrag=iwArgsNoRightClick.draganddrop;function IwNRCdragdropAll(event){try{var ev=event||window.event;var targ=ev.srcElement||ev.target;if(targ.tagName.toUpperCase()=="A"){var hr=targ.href;hr=hr.toUpperCase();if(hr.indexOf('.JPG')||hr.indexOf('.PNG')||hr.indexOf('.GIF')){ev.returnValue=!1;if(ev.preventDefault){ev.preventDefault()}
IwNRCinContext=!1;return!1}}
if(targ.tagName.toUpperCase()!="IMG")
return!0;ev.returnValue=!1;if(ev.preventDefault){ev.preventDefault()}
IwNRCinContext=!1;return!1}catch(er){}
return!0}
function IwNRCdragdrop(event){try{var ev=event||window.event;var targ=ev.srcElement||ev.target;ev.returnValue=!1;if(ev.preventDefault){ev.preventDefault()}
ev.returnValue=!1;IwNRCinContext=!1;return!1}catch(er){}
return!0}
function IwNRCcontext(event){try{IwNRCinContext=!0;var ev=event||window.event;var targ=ev.srcElement||ev.target;IwNRCreplace(targ);ev.returnValue=!1;if(ev.preventDefault){ev.preventDefault()}
ev.returnValue=!1;IwNRCtargImg=targ}catch(er){}
return!1}
function IwNRCcontextAll(event){try{if(IwNRCtargImg==null){return!0}
IwNRCinContext=!0;var ev=event||window.event;var targ=ev.srcElement||ev.target;if(targ.tagName.toUpperCase()=="IMG"){ev.returnValue=!1;if(ev.preventDefault){ev.preventDefault()}
ev.returnValue=!1;IwNRCreplace(targ);return!1}
return!0}catch(er){}
return!1}
function IwNRCmousedown(event){try{IwNRCinContext=!1;var ev=event||window.event;var targ=ev.srcElement||ev.target;if(ev.button==2){IwNRCreplace(targ);return!1}
IwNRCtargImg=targ;if(IwNRCdrag=='Y'){if(ev.preventDefault){ev.preventDefault()}}
return!0}catch(er){}
return!0}
function IwNRCmousedownAll(event){try{IwNRCinContext=!1;var ev=event||window.event;var targ=ev.srcElement||ev.target;if(targ.style.backgroundImage!=''&&ev.button==2){targ.oncontextmenu=function(event){return!1}}
if(targ.tagName.toUpperCase()=="IMG"){if(ev.button==2){IwNRCreplace(targ);return!1}
if(IwNRCdrag=='Y'){if(ev.preventDefault){ev.preventDefault()}}
IwNRCtargImg=targ}
return!0}catch(er){}
return!0}
function IwNRCreplace(targ){return!1;if(IwNRCtargImg!=null&&IwNRCtargImg.src==IwNRCnotimage.src){IwNRCtargImg.src=IwNRCtargSrc;IwNRCtargImg=null;IwNRCtargSrc=null}
IwNRCtargImg=targ;if(IwNRCextra!='Y')
return;var w=targ.width+'';var h=targ.height+'';if(w.indexOf('px')<=0)
w=w+'px';if(h.indexOf('px')<=0)
h=h+'px';IwNRCtargSrc=targ.src;targ.src=IwNRCnotimage.src;targ.style.width=w;targ.style.height=h;IwNRClimit=0;var t=setTimeout("IwNRCrestore()",500);return!1}
function IwNRCrestore(){if(IwNRCinContext){if(IwNRClimit<=20){IwNRClimit++;var t=setTimeout("IwNRCrestore()",500);return}}
IwNRClimit=0;if(IwNRCtargImg==null)
return;if(IwNRCtargSrc==null)
return;IwNRCtargImg.src=IwNRCtargSrc;IwNRCtargImg=null;IwNRCtargSrc=null;return}
function IwNRCaction(event){try{document.onmousedown=function(event){return IwNRCmousedownAll(event)}
document.oncontextmenu=function(event){return IwNRCcontextAll(event)}
document.oncopy=function(event){return IwNRCcontextAll(event)}
if(IwNRCdrag=='Y')
document.ondragstart=function(event){return IwNRCdragdropAll(event)}
var b=document.getElementsByTagName("IMG");for(var i=0;i<b.length;i++){b[i].oncontextmenu=function(event){return IwNRCcontext(event)}
b[i].oncopy=function(event){return IwNRCcontext(event)}
b[i].onmousedown=function(event){return IwNRCmousedown(event)}
if(IwNRCdrag=='Y')
b[i].ondragstart=function(event){return IwNRCdragdrop(event)}}}catch(er){return!1}}
if(document.addEventListener){document.addEventListener("DOMContentLoaded",function(event){IwNRCaction(event)},!1)}else if(window.attachEvent){window.attachEvent("onload",function(event){IwNRCaction(event)})}else{var oldFunc=window.onload;window.onload=function(){if(oldFunc){oldFunc()}
IwNRCaction('load')}}
;