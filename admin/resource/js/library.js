/* Calendar */
function displayDatePicker(e,t,a,r){var i=document.getElementsByName(e).item(0);t||(t=i),dateSeparator=r?r:defaultDateSeparator,dateFormat=a?a:defaultDateFormat;for(var s=t.offsetLeft,d=t.offsetTop+t.offsetHeight,n=t;n.offsetParent;)n=n.offsetParent,s+=n.offsetLeft,d+=n.offsetTop;drawDatePicker(i,s,d)}function drawDatePicker(e,t,a){var r=getFieldDate(e.value);if(!document.getElementById(datePickerDivID)){var i=document.createElement("div");i.setAttribute("id",datePickerDivID),i.setAttribute("class","dpDiv"),i.setAttribute("style","visibility: hidden;"),document.body.appendChild(i)}var s=document.getElementById(datePickerDivID);s.style.position="absolute",s.style.left=t+"px",s.style.top=a+"px",s.style.visibility="visible"==s.style.visibility?"hidden":"visible",s.style.display="block"==s.style.display?"none":"block",s.style.zIndex=1e4,refreshDatePicker(e.name,r.getFullYear(),r.getMonth(),r.getDate())}function refreshDatePicker(e,t,a,r){var s=new Date;a>=0&&t>0?s=new Date(t,a,1):(r=s.getDate(),s.setDate(1));var d="\r\n",n="<table cols=7 class='dpTable'>"+d,o="</table>"+d,l="<tr class='dpTR'>",y="<tr class='dpTitleTR'>",u="<tr class='dpDayTR'>",c="<tr class='dpTodayButtonTR'>",D="</tr>"+d,p="<td class='dpTD' onMouseOut='this.className=\"dpTD\";' onMouseOver=' this.className=\"dpTDHover\";' ",m="<td colspan=5 class='dpTitleTD'>",g="<td class='dpButtonTD'>",f="<td colspan=7 class='dpTodayButtonTD'>",h="<td class='dpDayTD'>",v="<td class='dpDayHighlightTD' onMouseOut='this.className=\"dpDayHighlightTD\";' onMouseOver='this.className=\"dpTDHover\";' ",b="</td>"+d,T="<div class='dpTitleText'>",k="<div class='dpDayHighlight'>",F="</div>",A=n;for(A+=y,A+=g+getButtonCode(e,s,-1,"&lt;")+b,A+=m+T+monthArrayLong[s.getMonth()]+" "+s.getFullYear()+F+b,A+=g+getButtonCode(e,s,1,"&gt;")+b,A+=D,A+=u,i=0;i<dayArrayShort.length;i++)A+=h+dayArrayShort[i]+b;for(A+=D,A+=l,i=0;i<s.getDay();i++)A+=p+"&nbsp;"+b;do dayNum=s.getDate(),TD_onclick=" onclick=\"updateDateField('"+e+"', '"+getDateString(s)+"');\">",A+=dayNum==r?v+TD_onclick+k+dayNum+F+b:r>dayNum?p+TD_onclick+"<strike>"+dayNum+"</strike>"+b:p+TD_onclick+dayNum+b,6==s.getDay()&&(A+=D+l),s.setDate(s.getDate()+1);while(s.getDate()>1);if(s.getDay()>0)for(i=6;i>s.getDay();i--)A+=p+"&nbsp;"+b;A+=D;{var I=new Date;"Today is "+dayArrayMed[I.getDay()]+", "+monthArrayMed[I.getMonth()]+" "+I.getDate()}A+=c+f,A+="<button class='dpTodayButton' onClick='refreshDatePicker(\""+e+"\");'>this month</button> ",A+="<button class='dpTodayButton' onClick='updateDateField(\""+e+"\");'>close</button>",A+=b+D,A+=o,document.getElementById(datePickerDivID).innerHTML=A,adjustiFrame()}function getButtonCode(e,t,a,r){var i=(t.getMonth()+a)%12,s=t.getFullYear()+parseInt((t.getMonth()+a)/12);return 0>i&&(i+=12,s+=-1),"<button class='dpButton' onClick='refreshDatePicker(\""+e+'", '+s+", "+i+");'>"+r+"</button>"}function getDateString(e){var t="00"+e.getDate(),a="00"+(e.getMonth()+1);switch(t=t.substring(t.length-2),a=a.substring(a.length-2),dateFormat){case"dmy":return t+dateSeparator+a+dateSeparator+e.getFullYear();case"ymd":return e.getFullYear()+dateSeparator+a+dateSeparator+t;case"mdy":default:return a+dateSeparator+t+dateSeparator+e.getFullYear()}}function getFieldDate(e){var t,a,r,i,s;try{if(a=splitDateString(e)){switch(dateFormat){case"dmy":r=parseInt(a[0],10),i=parseInt(a[1],10)-1,s=parseInt(a[2],10);break;case"ymd":r=parseInt(a[2],10),i=parseInt(a[1],10)-1,s=parseInt(a[0],10);break;case"mdy":default:r=parseInt(a[1],10),i=parseInt(a[0],10)-1,s=parseInt(a[2],10)}t=new Date(s,i,r)}else t=e?new Date(e):new Date}catch(d){t=new Date}return t}function splitDateString(e){var t;return t=e.indexOf("/")>=0?e.split("/"):e.indexOf(".")>=0?e.split("."):e.indexOf("-")>=0?e.split("-"):e.indexOf("\\")>=0?e.split("\\"):!1}function updateDateField(e,t){var a=document.getElementsByName(e).item(0);t&&(a.value=t);var r=document.getElementById(datePickerDivID);r.style.visibility="hidden",r.style.display="none",adjustiFrame(),a.focus(),t&&"function"==typeof datePickerClosed&&datePickerClosed(a)}function adjustiFrame(e,t){var a=-1!=navigator.userAgent.toLowerCase().indexOf("opera");if(!a)try{if(!document.getElementById(iFrameDivID)){var r=document.createElement("iFrame");r.setAttribute("id",iFrameDivID),r.setAttribute("src","javascript:false;"),r.setAttribute("scrolling","no"),r.setAttribute("frameborder","0"),document.body.appendChild(r)}e||(e=document.getElementById(datePickerDivID)),t||(t=document.getElementById(iFrameDivID));try{t.style.position="absolute",t.style.width=e.offsetWidth,t.style.height=e.offsetHeight,t.style.top=e.style.top,t.style.left=e.style.left,t.style.zIndex=e.style.zIndex-1,t.style.visibility=e.style.visibility,t.style.display=e.style.display}catch(i){}}catch(s){}}var datePickerDivID="datepicker",iFrameDivID="datepickeriframe",dayArrayShort=new Array("Su","Mo","Tu","We","Th","Fr","Sa"),dayArrayMed=new Array("Sun","Mon","Tue","Wed","Thu","Fri","Sat"),dayArrayLong=new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"),monthArrayShort=new Array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"),monthArrayMed=new Array("Jan","Feb","Mar","Apr","May","June","July","Aug","Sept","Oct","Nov","Dec"),monthArrayLong=new Array("January","February","March","April","May","June","July","August","September","October","November","December"),defaultDateSeparator="/",defaultDateFormat="dmy",dateSeparator=defaultDateSeparator,dateFormat=defaultDateFormat;

function ShowFlash_swf(FlashIDName, FlashFileName, FlashWidth, FlashHeight, DNSSetting, WMODESetting, QSetting, FlashAlign)
{
	document.write('<OBJECT CLASSID="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"');
	document.write('CODEBASE="http://fpdownload.macromedia.com/get/flashplayer/current/swflash.cab#version=8,0,0,0" ');
	document.write(' ID="'+FlashIDName+'" WIDTH="' + FlashWidth + '" HEIGHT="' + FlashHeight + '" ALIGN="'+FlashAlign+'">');
	document.write('<PARAM NAME="movie" VALUE="'+ FlashFileName +'">');
	document.write('<PARAM NAME="quality" VALUE="'+QSetting+'">');
	//document.write('<PARAM NAME="bgcolor" VALUE="'+FlashBGColor+'">');  BGCOLOR="'+FlashBGColor+'"
	document.write('<PARAM NAME="wmode" VALUE="'+WMODESetting+'">');
	document.write('<PARAM NAME="allowScriptAccess" VALUE="'+DNSSetting+'">');
	document.write('<EMBED SRC="'+ FlashFileName +'"  NAME="'+FlashIDName+'"');
	document.write(' WIDTH="' + FlashWidth + '" HEIGHT="' + FlashHeight + '" QUALITY="'+QSetting+'" ');
	document.write(' ALLOWSCRIPTACCESS="'+DNSSetting+'" ALIGN="'+FlashAlign+'" WMODE="'+WMODESetting+'" TYPE="application/x-shockwave-flash" ');
	document.write(' PLUGINSPAGE="http://www.macromedia.com/go/getflashplayer" >');
	document.write('</EMBED>');
	document.write('</OBJECT>');
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_validateForm() { //v4.0
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
    if (val) {if (val.title!="") {nm=val.title;} else {nm=val.name;} if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.length-1)) errors+='- "'+nm+'" phải là một địa chỉ email.\n';
      } else if (test!='R') { num = parseFloat(val);
        if (isNaN(val)) errors+='- "'+nm+'" phải là một số.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- "'+nm+'" phải là số nằm giữa '+min+' và '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += '- Bạn chưa nhập "'+nm+'".\n'; }
  } if (errors) alert('Có những lỗi sau:\n'+errors);
  document.MM_returnValue = (errors == '');
}

function trim(sString) 
{
	while (sString.substring(0,1) == ' ')
	{
	sString = sString.substring(1, sString.length);
	}
	while (sString.substring(sString.length-1, sString.length) == ' ')
	{
	sString = sString.substring(0,sString.length-1);
	}
	return sString;
}
function checkblank(str)
{
	if (trim(str)=='')
		return true;
	else
		return false;
}
function ValidateForm(formobj)
{
	if (checkblank(formobj.pro_name.value)) { alert('Please enter the title!'); return false;}
	
	formobj.submit();
}
function checkAll(){
	if($('#check-all').attr('checked')==true){
		$('.item-element').attr('checked',true);	
	}else{
		$('.item-element').attr('checked',false);	
	}
}
function check_edit(idobj){
		document.getElementById(idobj).checked = true;
}
function loadactive(obj){	
	obj.innerHTML = 'load...';
	$(obj).load(obj.href + '&ajax=1');
	return false;
}
function creat_link(object){
	window.open("../link/selected.php?object=" + object, "","height=600,width=700,menubar=0,resizable=1,scrollbars=1,statusbar=0,titlebar=0,toolbar=0");
}
function changePriceText(id, value){
	formatCurrency(id, value);
	if(parseInt(value) > 0) $("#" + id).css("display", "block");
	else $("#" + id).css("display", "none");
}
function showliveprice(id,con){
	$("#pro_price_" + id).parent().find("div").text(addCommas($("#pro_price_" + id).val()) + " " + con);
}
function formatCurrency(div_id, str_number){
	document.getElementById(div_id).innerHTML = addCommas(str_number);
}
function addCommas(nStr){
	nStr += ''; x = nStr.split(',');	x1 = x[0]; x2 = ""; x2 = x.length > 1 ? ',' + x[1] : ''; var rgx = /(\d+)(\d{3})/; while (rgx.test(x1)) { x1 = x1.replace(rgx, '$1' + ',' + '$2'); } return x1 + x2;
}

/* Tooltip */
var offsetfromcursorX = 12;
var offsetfromcursorY = 10;
var offsetdivfrompointerX = 10;
var offsetdivfrompointerY = 14;

document.write('<div id="dhtmltooltip"></div>');
document.write('<img id="dhtmlpointer" src="../../resource/images/tooltiparrow.gif">');

var ie = document.all;
var ns6 = document.getElementById && ! document.all;
var enabletip = false;

if (ie || ns6) var tipobj = document.all ? document.all["dhtmltooltip"] : document.getElementById ? document.getElementById("dhtmltooltip") : "";

var pointerobj = document.all ? document.all["dhtmlpointer"] : document.getElementById ? document.getElementById("dhtmlpointer") : "";

function ietruebody() {
	return (document.compatMode && document.compatMode != "BackCompat") ? document.documentElement : document.body;
}

function showtip(thetext, thewidth, thecolor) {
	if (ns6 || ie) {
		if (typeof thewidth != "undefined")
			tipobj.style.width = thewidth + "px";
		if (typeof thecolor != "undefined" && thecolor != "")
			tipobj.style.backgroundColor = thecolor;
		tipobj.innerHTML = thetext;		
		enabletip = true;
		return false;
	}
}

function positiontip(e) {
	if (enabletip) {		
		var nondefaultpos = false;
		var curX = (ns6) ? e.pageX : event.clientX + ietruebody().scrollLeft;
		var curY = (ns6) ? e.pageY : event.clientY + ietruebody().scrollTop;
		
		var winwidth = ie && ! window.opera ? ietruebody().clientWidth : window.innerWidth - 20;
		var winheight = ie && ! window.opera ? ietruebody().clientHeight : window.innerHeight - 20;

		var rightedge = ie && ! window.opera ? winwidth - event.clientX - offsetfromcursorX : winwidth - e.clientX - offsetfromcursorX;
		var bottomedge = ie && ! window.opera ? winheight - event.clientY - offsetfromcursorY : winheight - e.clientY - offsetfromcursorY;

		var leftedge = (offsetfromcursorX < 0) ? offsetfromcursorX * (- 1) : - 1000;

		if (rightedge < tipobj.offsetWidth) {
			tipobj.style.left = curX - tipobj.offsetWidth + "px";
			nondefaultpos = true;
		}
		else if (curX < leftedge)
			tipobj.style.left = "5px";
		else {
			tipobj.style.left = curX + offsetfromcursorX - offsetdivfrompointerX + "px";
			pointerobj.style.left = curX + offsetfromcursorX + "px";
		}

		if (bottomedge < tipobj.offsetHeight) {
			tipobj.style.top = curY - tipobj.offsetHeight - offsetfromcursorY + "px";
			nondefaultpos = true;
		}
		else {
			tipobj.style.top = curY + offsetfromcursorY + offsetdivfrompointerY + "px";
			pointerobj.style.top = curY + offsetfromcursorY + "px";
		}

		tipobj.style.visibility = "visible";

		if (! nondefaultpos)
			pointerobj.style.visibility = "visible";
		else
			pointerobj.style.visibility = "hidden";
	}
}

function hidetip() {
	if (ns6 || ie) {
		enabletip = false;
		tipobj.style.visibility = "hidden";
		pointerobj.style.visibility = "hidden";
		tipobj.style.left = "-1000px";
		tipobj.style.backgroundColor = '';
		tipobj.style.width = '';
	}
}

document.onmousemove = positiontip;