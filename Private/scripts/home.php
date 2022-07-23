<?php

/**
 * Copyright 2021, 2024 5 Mode
 *
 * This file is part of MacSwap.
 *
 * MacSwap is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * MacSwap is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.  
 * 
 * You should have received a copy of the GNU General Public License
 * along with MacSwap. If not, see <https://www.gnu.org/licenses/>.
 *
 * home.php
 * 
 * MacSwap home page.
 *
 * @author Daniele Bonini <my25mb@aol.com>
 * @copyrights (c) 2021, 2024, 5 Mode      
 */

$curLocale = APP_LOCALE;

$password = filter_input(INPUT_POST, "Password");
if ($password==PHP_STR) {
  $password = filter_input(INPUT_POST, "Password2");
}  

if ($password !== PHP_STR) {	
  $hash = hash("sha256", $password . APP_SALT, false);

  if ($hash !== APP_HASH) {
    $password=PHP_STR;	
  }	 
} 
?>

 <script>
<?PHP if ($password != PHP_STR): ?>
  password = 1; 
<?PHP else: ?> 
  password = 0; 
<?PHP endif ?> 
  businessType = "<?PHP echo(BUSINESS_TYPE)?>";
 </script>


<!DOCTYPE html>
<head>
	
  <meta charset="UTF-8"/>
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  
<!--
    Copyright 2021, 2024 5 Mode

    This file is part of MAcSwap.

    MacSwap is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    MacSwap is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with MacSwap. If not, see <https://www.gnu.org/licenses/>.
 -->
  
    
  <title>MacSwap: Swapping everything but burgers..</title>
	
  <link rel="shortcut icon" href="/favicon.ico?v=<?php echo(time()); ?>" />
    
  <meta name="description" content="Welcome to <?php echo(APP_NAME); ?>"/>
  <meta name="author" content="5 Mode"/> 
  <meta name="robots" content="index,follow"/>
  
  <script src="/js/jquery-3.6.0.min.js" type="text/javascript"></script>
  <script src="/js/common.js" type="text/javascript"></script>
  <script src="/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="/js/sha.js" type="text/javascript"></script>
  <script src="/js/serialize-javascript.js" type="text/javascript"></script>
  
  <script src="/js/cube-code.js" type="text/javascript"></script>
  <script src="/js/dragndrop-code.js" type="text/javascript"></script>
  
  <script src="/js/home.js?v=<?php echo(time()); ?>" type="text/javascript" defer></script>
  
  <link href="/css/bootstrap.min.css" type="text/css" rel="stylesheet">
  <link href="/css/style.css?v=<?php echo(time()); ?>" type="text/css" rel="stylesheet">
   
  <script>
 
 /*
  * Interaction code
  */
 
  timeoutId=0;
  var oldtthis; // Old cube

  var lineOldVal = ""; // Old value for a detail line
  var lineNewVal = ""; // New value for a detail line

  var dataChanged = false;

  /*
   * Select the given cube 
   * 
   * @param <interfaceEl> selected cube
   * @returns void
   */
  function selCube(tthis) {    

    <?PHP //if ($password != PHP_STR): ?>

      _selCube(tthis);

      // Clean the old selected..
      $(oldtthis).css("color","#d4b0dc");
      $(oldtthis).css("text-decoration","none");
      oldtthis = tthis;
      // Decore the selected one..
      $(tthis).css("color","#bd006e");
      $(tthis).css("text-decoration","underline");
      $("#cubezvname").html(curcube.getname());

      // Reset the detail view
      $("#detailtitle").html("");
      $("#detaildata").html("");
      $("#datadetail").hide(); 

      // Update ZOOMED VIEW interface..
      //$("#face1").html("<span id='facelet1'>" + curcube.getFace('h0') + "</span> &horbar;&horbar;&horbar;&horbar;&horbar;&xodot; ");
      //$("#face2").html("<span id='facelet2'>" + curcube.getFace('v1') + "</span>");
      //$("#face3").html("&xodot;&horbar;&horbar;&horbar;&horbar; <span id='facelet3'>" + curcube.getFace('h1') + "</span>");
      //$("#face1").attr("target", curcube.getFace('h0'));
      //$("#face2").attr("target", curcube.getFace('v1'));
      //$("#face3").attr("target", curcube.getFace('h1'));

      clearTimeout(timeoutId);

      // Update body background..
      //$(document.body).css("background","url('../res/bg.jpg')");
      //$(document.body).css("background-size","cover");

      // Display ZOOMED VIEW interface and controls 
      $("#cubeList").css("width", "80%");
      //$("#cubectrls").show();
      //$("#zoomedview").show();
      //$("#cubelinks").show();
      
    <?PHP //endif; ?>
      
  } 


  /*
   * Select the given offer cube 
   * 
   * @param <interfaceEl> selected cube
   * @returns void
   */
  function selOfferCube(tthis) {    

    <?PHP //if ($password != PHP_STR): ?>

      _selOfferCube(tthis);

      // Clean the old selected..
      $(oldtthis).css("color","#d4b0dc");
      $(oldtthis).css("text-decoration","none");
      oldtthis = tthis;
      // Decore the selected one..
      $(tthis).css("color","#bd006e");
      $(tthis).css("text-decoration","underline");
      $("#cubezvname").html(curcube.getname());

      // Reset the detail view
      $("#detailtitle").html("");
      $("#detaildata").html("");
      $("#datadetail").hide(); 

      // Update ZOOMED VIEW interface..
      //$("#face1").html("<span id='facelet1'>" + curcube.getFace('h0') + "</span> &horbar;&horbar;&horbar;&horbar;&horbar;&xodot; ");
      //$("#face2").html("<span id='facelet2'>" + curcube.getFace('v1') + "</span>");
      //$("#face3").html("&xodot;&horbar;&horbar;&horbar;&horbar; <span id='facelet3'>" + curcube.getFace('h1') + "</span>");
      //$("#face1").attr("target", curcube.getFace('h0'));
      //$("#face2").attr("target", curcube.getFace('v1'));
      //$("#face3").attr("target", curcube.getFace('h1'));

      clearTimeout(timeoutId);

      // Update body background..
      //$(document.body).css("background","url('../res/bg.jpg')");
      //$(document.body).css("background-size","cover");

      // Display ZOOMED VIEW interface and controls 
      $("#cubeList").css("width", "80%");
      //$("#cubectrls").show();
      //$("#zoomedview").show();
      //$("#cubelinks").show();
      
    <?PHP //endif; ?>
      
  } 

  /*
   * Display the debug info
   * 
   * @returns void
   */
  function visInfo() {
    $("#hcube").val(curcube.gethcube());
    $("#vcube").val(curcube.getvcube());
    $("#hcur").val(curcube.gethcur());
    $("#vcur").val(curcube.getvcur());
    $("#curcube").val(curcube.getname());
  }

  /*
  function eachNode(rootNode, callback) {
    if (!callback) {
      const nodes = []
      eachNode(rootNode, function(node) {
        nodes.push(node.nodeName)
        //nodes.push(node)
      })
      return nodes
    }

    if (false === callback(rootNode)) {
      return false
    }

    if (rootNode.hasChildNodes()) {
      const nodes = rootNode.childNodes
      for (let i = 0, l = nodes.length; i < l; ++i) {
        if (false === eachNode(nodes[i], callback)) {
          return
        }
      }
    }
  }
  */

  /*
   * Get the data for the given detail / face
   * 
   * @param string xmlStr, the current cube xml data
   * @param string detail, the requested detail
   * @returns string, the detail data 
   */
  function getDetailData(xmlStr, detail, isOffer) {

    var ret = "";
    var re;

    detail = detail.toLowerCase();

    xmlStr = xmlStr.replace('<?xml version="1.0" encoding="UTF-8"?>',"");
    xmlStr = xmlStr.replace('<details>',"");
    xmlStr = xmlStr.replace('</details>',"");
    xmlStr = xmlStr.replaceAll('\n',"");
    xmlStr = xmlStr.replaceAll(String.fromCharCode(9), "");
    xmlStr = xmlStr.replaceAll(String.fromCharCode(10), "");
    xmlStr = xmlStr.replaceAll(String.fromCharCode(13), "");
    xmlStr = xmlStr.replaceAll("   ", "");
    xmlStr = xmlStr.replaceAll("  ", "");
    xmlStr = escape(xmlStr);
    xmlStr = xmlStr.replaceAll("%0A", "");
    xmlStr = xmlStr.replaceAll("%20%20%20%20%20", "");
    xmlStr = xmlStr.replaceAll("%20%20%20%20%", "");
    xmlStr = xmlStr.replaceAll("%20%20%", "");
    //xmlStr = unescape(xmlStr);
    //alert(xmlStr);

    switch (detail) {
      case "swap":
        re = new RegExp("detail%20face%3D%22swap%22.+/country", "igsu");
        break;
      case "contacts":
        re = new RegExp("detail%20face%3D%22contacts%22.+/email", "igsu");
        break;
      case "other info":
        re = new RegExp("detail%20face%3D%22other%20info%22.+/guid", "igsu");
        break;
      case "password":
        re = new RegExp("detail%20face%3D%22password%22.+/password", "igsu");
        break;
    }        
    s = re.exec(xmlStr);
    if (!s || s.length===0) {
      ret = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Error! #1";
      return ret;
    }
    xmlStr = s[0];
    xmlStr = "<"+xmlStr+"></detail>";
    xmlStr = unescape(xmlStr);
    //alert(xmlStr);
    const parser = new DOMParser();
    const doc = parser.parseFromString(xmlStr, "text/xml");
    x = doc.getElementsByTagName("detail");
    if (x.length===0) {
      ret = "Error! #2";
      return ret;
    }
    ret += "<div style='padding:10px;'>";
    for (i = 0; i < x[0].childNodes.length; i++) {
      if (x[0].childNodes[i].nodeType === 1) {
        if (x[0].childNodes[i].getAttributeNode("type")) {
          mytype = x[0].childNodes[i].getAttributeNode("type");
          if (mytype.value==="pic") {
            ret += "<div style='float:left;width:35%;text-align:right;height:32px;vertical-align:middle;padding-top:3px;font-weight:900;white-space:nowrap;'>" + x[0].childNodes[i].nodeName + "&nbsp;&nbsp;</div><div style='float:right;width:65%;height:32px;'>" + "<input type='text' id='cube-detail-" + x[0].childNodes[i].nodeName + "' value='" + x[0].childNodes[i].textContent + "' placeholder='https://'  onkeyup='storePicData(this)'></div>";
          } else {
            ret += "<div style='float:left;width:35%;text-align:right;height:32px;vertical-align:middle;padding-top:3px;font-weight:900;white-space:nowrap;'>" + x[0].childNodes[i].nodeName + "&nbsp;&nbsp;</div><div style='float:right;width:65%;height:32px;'>" + "<input type='text' id='cube-detail-" + x[0].childNodes[i].nodeName + "' value='" + x[0].childNodes[i].textContent + "' onkeyup='storeData(this)'></div>";
          }  
        } else {  
        
          <?PHP if ($password != PHP_STR): ?>
          saveOnKeyUp = "onkeyup='storeData(this)'";
          <?PHP else: ?>
            if (isOffer) {
              saveOnKeyUp = "onkeyup='storeData(this)'";
            } else {
              saveOnKeyUp = "";
            }  
          <?PHP endif; ?>
          
          if (x[0].childNodes[i].nodeName === "business-type") {
            ret += "<div style='float:left;width:35%;text-align:right;height:32px;vertical-align:middle;padding-top:3px;font-weight:900;white-space:nowrap;'>" + x[0].childNodes[i].nodeName + "&nbsp;&nbsp;</div><div style='float:right;width:65%;height:32px;'>" + "<input type='text' id='cube-detail-" + x[0].childNodes[i].nodeName + "' value='" + x[0].childNodes[i].textContent + "' " + saveOnKeyUp + " style='color:green' readonly></div>";
          } else if (x[0].childNodes[i].nodeName === "guid") {
            ret += "<div style='float:left;width:35%;text-align:right;height:32px;vertical-align:middle;padding-top:3px;font-weight:900;white-space:nowrap;'>" + x[0].childNodes[i].nodeName + "&nbsp;&nbsp;</div><div style='float:right;width:65%;height:32px;'>" + "<input type='text' id='cube-detail-" + x[0].childNodes[i].nodeName + "' value='" + x[0].childNodes[i].textContent + "'  " + saveOnKeyUp + " style='color:green' readonly></div>";
          } else if (x[0].childNodes[i].nodeName === "password") {
            <?PHP if ($password != PHP_STR): ?>
              ret += "<div style='float:left;width:35%;text-align:right;height:32px;vertical-align:middle;padding-top:3px;font-weight:900;white-space:nowrap;'>" + x[0].childNodes[i].nodeName + "&nbsp;&nbsp;</div><div style='float:right;width:65%;height:32px;'>" + "<input type='text' id='cube-detail-" + x[0].childNodes[i].nodeName + "' value='" + x[0].childNodes[i].textContent + "'  " + saveOnKeyUp + " style='color:green' readonly></div>";
            <?PHP endif; ?>
          } else if (x[0].childNodes[i].nodeName === "city") {
            ret += "<div style='float:left;width:35%;text-align:right;height:32px;vertical-align:middle;padding-top:3px;font-weight:900;white-space:nowrap;'>" + x[0].childNodes[i].nodeName + "&nbsp;&nbsp;</div><div style='float:right;width:65%;height:32px;'>" + "<input type='text' id='cube-detail-" + x[0].childNodes[i].nodeName + "' value='" + x[0].childNodes[i].textContent + "'  " + saveOnKeyUp + "></div>";
          } else if (x[0].childNodes[i].nodeName === "country") {
            ret += "<div style='float:left;width:35%;text-align:right;height:32px;vertical-align:middle;padding-top:3px;font-weight:900;white-space:nowrap;'>" + x[0].childNodes[i].nodeName + "&nbsp;&nbsp;</div><div style='float:right;width:65%;height:32px;'>" + "<input type='text' id='cube-detail-" + x[0].childNodes[i].nodeName + "' value='" + x[0].childNodes[i].textContent + "'  " + saveOnKeyUp + "></div>";
          } else {
            ret += "<div style='float:left;width:35%;text-align:right;height:32px;vertical-align:middle;padding-top:3px;font-weight:900;white-space:nowrap;'>" + x[0].childNodes[i].nodeName + "&nbsp;&nbsp;</div><div style='float:right;width:65%;height:32px;'>" + "<input type='text' id='cube-detail-" + x[0].childNodes[i].nodeName + "' value='" + x[0].childNodes[i].textContent + "'  " + saveOnKeyUp + "></div>";  
          }  
        }  
      }  
    }
    //if ((detail==="pictures") || (detail==="menu")) {
    //  ret += "<div style='padding-left:80px;clear:both;'><br>you can use eg. Goolge Drive or Microsoft OneDrive to host your pictures.</div>"
    //}
    ret += "</div>";
    return ret;
  }  

  /*
   * Store the old data of the text control
   * 
   * @param {InterfaceEl} tthis, the text control under editing
   * @returns void     
   */ 
  /*function storeOldData(tthis) {
    //alert("keypress");

    lineOldVal = $(tthis).val();
  }*/

  /*
   * Store in the cube object the new data of the text control
   * 
   * @param {InterfaceEl} tthis, the text control under editing
   * @returns void     
   */ 
  function storeData(tthis) {

    lineNewVal = $(tthis).val();
    //alert(lineNewVal);

    nodeName = tthis.id;
    nodeName = nodeName.replace("cube-detail-","");
    //alert(nodeName);

    xmlStr = curcube.getxml();
    //$("#log").html($("#log").html() + "old=" + "/(\<" + nodeName + "\>).*(\<\/" + nodeName + "\>)/gs" + "\n");
    //$("#log").html($("#log").html() + "new=" + lineNewVal + "\n");
    //alert("<" + nodeName + ">" + lineNewVal + "</" + nodeName + ">");
    //re = "/(\<" + nodeName + "\>).*(\<\/" + nodeName + "\>)/gs";

    switch (nodeName) {
      case "name":
        re = /(\<name>).*(\<\/name>)/gs;
        break;
      case "description":
        re = /(\<description>).*(\<\/description>)/gs;
        break;      
      case "value":
        re = /(\<value>).*(\<\/value>)/gs;
        break;
      case "city":
        re = /(\<city>).*(\<\/city>)/gs;
        break;
      case "country":
        re = /(\<country>).*(\<\/country>)/gs;
        break;
      case "contact":
        re = /(\<contact>).*(\<\/contact>)/gs;
        break;
      case "tel":
        re = /(\<tel>).*(\<\/tel>)/gs;
        break;
      case "cell":
        re = /(\<cell>).*(\<\/cell>)/gs;
        break;
      case "email":
        re = /(\<email>).*(\<\/email>)/gs;
        break;
    }  

    xmlStr = xmlStr.replace(re, "$1" + lineNewVal + "$2");
    //xmlStr = xmlStr.replace("<" + nodeName + ">" + lineOldVal + "</" + nodeName + ">", "<" + nodeName + ">" + lineNewVal + "</" + nodeName + ">");
    //alert(xmlStr);

    curcube.xml = xmlStr;

    dataChanged = true;
  }

  /*
   * Store in the cube object the new pic data
   * 
   * @param {InterfaceEl} tthis, the text control under editing
   * @returns void     
   */ 
  function storePicData(tthis) {

  }

  function _saveData() {
    if (dataChanged) {
      curcube.savedata();
      //saveData();
      dataChanged = false;
    }  
  }  

  setInterval("_saveData()", 1500);

  /*
   * Display the given data detail
   * 
   * @param <interfaceEl> selected cube
   * @returns void
   */
  function openDetail(tthis) {
    //myhtml = getDetailData(curcube.getxml(), $(tthis).attr("target"));
    //$("#detailtitle").html("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + $(tthis).attr("target") + ":");
    <?PHP if ($password!=""): ?>
    myhtml = getDetailData(curcube.getxml(), "swap") + getDetailData(curcube.getxml(), "contacts") + getDetailData(curcube.getxml(), "other info") + getDetailData(curcube.getxml(), "password");
    <?PHP else: ?>
    myhtml = getDetailData(curcube.getxml(), "swap");
    <?PHP endif; ?>  
    $("#detailtitle").html("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Detail:");
    $("#detaildata").html(myhtml);
    $("#datadetail").show();      
    //alert(curcube.getxml());
  }

  /*
   * Display the given data detail
   * 
   * @param <interfaceEl> selected cube
   * @returns void
   */
  function openOfferDetail(tthis) {
    //myhtml = getDetailData(curcube.getxml(), $(tthis).attr("target"));
    //$("#detailtitle").html("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + $(tthis).attr("target") + ":");
    myhtml = getDetailData(curcube.getxml(), "swap") + getDetailData(curcube.getxml(), "contacts")  + getDetailData(curcube.getxml(), "other info") + getDetailData(curcube.getxml(), "password");
    $("#detailtitle").html("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Detail:");
    $("#detaildata").html(myhtml);
    $("#datadetail").show();      
    //alert(curcube.getxml());
  }

</script>
 
 <script>
 /*
  * Boot up code
  */

 //var fetchDataIntervalId;  

 /*
  * App starting proc
  * 
  * @returns void
  */
 function startApp() {

   window.name = encryptSha2(rnd(0,99999999)+"");

 <?php 

  if ($password!=PHP_STR) {
    $cubedisplay="inline";
  } else {
    $cubedisplay="none";
  }
 
  chdir(APP_DATA_PATH);

  foreach (glob("*-s.xml") as $filename) { 
    $s = substr(substr($filename, 0, strlen($filename)-6),6);
    
    $offerNum = count(glob("burger".$s."-o-*.xml"));
    
    ?>

    i = parseInt("<?php echo($s);?>");

    if (i<10) {
      newFormalName = "burger" + "00" + i;
    } else if (i<100) {
      newFormalName = "burger" + "0" + i;
    } else {
      newFormalName = "burger" + i;
    }    
  
    s = "";
    s = s + "<div id='cubelc" + i + "' style='width:99%;overflow-x: scroll;'><div id='cubel" + i + "' order='" + i + "' size='" + <?PHP echo($offerNum); ?> + "' guid='" + window.name + "' style='width:3800px;height:300px;border: 0px solid green;' ondragover='onDragOver(event);' ondrop='onDrop(this, event);'>";
    
    <?PHP if ($password!=""): ?>
    s = s + "<div id='cube" + i + "' class='cube' style='background:url(/res/1burger_" + parseInt(rnd(1,3)) + ".png);background-size:cover;border: 3px dashed white;' order='" + i + "' onclick='selCube(this);openDetail(this);' draggable='true' ondragstart='onDragStart(this, event);' onmouseover='onMouseOver();'><div id='cube" + i + "name' class='cubename'>" + businessType + "#" + i + "</div></div>";
    <?PHP else: ?>
    s = s + "<div id='cube" + i + "' class='cube' style='background:url(/res/1burger_" + parseInt(rnd(1,3)) + ".png);background-size:cover;border: 3px dashed white;' order='" + i + "' onclick='selCube(this);openDetail(this);'><div id='cube" + i + "name' class='cubename'>" + businessType + "#" + i + "</div></div>";
    <?PHP endif; ?>
      
    offers[i-1] = [];
    myoffer = [];
    <?PHP 
   
      $y = 1;    
      foreach (glob("burger".$s."-o-*.xml") as $filename2) { 
        $basename = substr($filename2, 0, strlen($filename2)-4);
        $ss = substr(substr($filename2, 0, strlen($filename2)-4),12);
        ?>
        y = <?PHP echo($y);?>;

        /*
        if (y<10) {
          newOfferFormalName = "burger" + "00" + y;
        } else if (y<100) {
          newOfferFormalName = "burger" + "0" + y;
        } else {
          newOfferFormalName = "burger" + y;
        } 
        */
        newOfferFormalName = "<?PHP echo($basename); ?>";

        s = s + "<div id='<?PHP echo($basename);?>' class='cube' style='display:<?PHP echo($cubedisplay); ?>;background:url(/res/1burgerg_" + parseInt(rnd(1,3)) + ".png);background-size:cover;border: 0px solid red;' cubeorder='" + i + "' order='" + y + "' onclick='selOfferCube(this);openOfferDetail(this);' draggable='true' ondragstart='onDropOff(event);' onmouseover='onMouseOver();'><div id='cube" + i + "offer" + y + "name' class='cubename'>offer#" + y + "</div></div>";  

        myoffer[y-1] = new myCube("Offer#" + y, newOfferFormalName, "<?php echo(APP_HOST)?>");
        myoffer[y-1].start();

      <?PHP 
        $y++;
      } 

    ?>
    
    offers[i-1] = myoffer;
    
    s = s + "</div></div>";
    $("#cubeList").html($("#cubeList").html() + s);
    //$("#cube" + i + "name").html(businessType + "#" + i);

    cubes[i-1] = new myCube(businessType + "#" + i, newFormalName, "<?php echo(APP_HOST)?>");
    cubes[i-1].start();
    totcubes = i;
    
 <?php
   }
 ?>

   $("#cubeList").show();

   $("#vplayer").get(0).pause();
   $("#HCsplash").css("display","none");
   $(".header").show();

   //fetchDataIntervalId = setInterval("_fetchData()", 2000);
 }			

 /*
  * call to startApp
  * 
  * @returns void
  */
 function _startApp() {
   setTimeout("startApp()", 1000);    
 }

 /*
  * Set the elements position
  */
 function setContentPos() {

   $("#cubeList").css("height", parseInt(window.innerHeight-20) + "px"); 

   mytop = parseInt(window.innerHeight - ($("#passworddisplay").height() + 60));
   $("#passworddisplay").css("top", mytop+"px");

 }

 function setFooterPos() {
   if (document.getElementById("footerCont")) {
     //if ($("#Password").val() === "") {  
     //    tollerance = 48;
     //  } else {
     //  tollerance = 15;
     //}
     tollerance = 22;  	  
     $("#footerCont").css("top", parseInt( window.innerHeight - $("#footerCont").height() - tollerance ) + "px");
     $("#footer").css("top", parseInt( window.innerHeight - $("#footer").height() - tollerance + 6) + "px");
   }
 }

 window.addEventListener("load", function() {

   setContentPos();

   if ($("#cubeList").css("display")==="none") {
     setTimeout("setFooterPos()", 9000);
   } else {
     setTimeout("setFooterPos()", 2000);  
   } 

   //Resetting secrets..
   //$("#_read_xml_cube1").val("");
   //$("#_read_xml_cube2").val("");
   //$("#_read_xml_cube3").val("");
   //$("#_read_xml_cube4").val("");
   //$("#_read_xml_cube5").val("");

   //Debug
   $("#hcube").val("");
   $("#vcube").val("");
   $("#hcur").val("");
   $("#vcur").val("");
   $("#curcube").val("");

   //Splash
   $("#HCsplash").show();	
   $("#vplayer").get(0).play();	

 }, true);


 window.addEventListener("load", function() {

   // Fisnished the Intro load the app..
   //document.getElementById("vplayer").onended=_startApp;
   setTimeout("_startApp()", 6000);
   
   // A bit of preload..

 });

 window.addEventListener("resize", function() {

   setTimeout("setContentPos()", 2000);  

   if ($("#cubeList").css("display")==="none") {
     setTimeout("setFooterPos()", 9000);
   } else {
     setTimeout("setFooterPos()", 2000);  
   } 

 });

// -- End Boot up code
</script>      
          
</head>
    
<body>

     <div id="HCsplash" style="padding-top: 40px; text-align:center;color:#d4b0dc;font-family:'Rampart One';display:none;">
         <div id="myh1" style="position:relative; top:80px;"><H1>MacSwap</H1></div><br><br>
         <video id="vplayer" loop="1">
            <source src="../res/macswap.mp4" type="video/mp4">
         </video>
         <div style="margin-bottom:80px;"><H3>Swapping everything but burgers..</H3></div><br><br>
     </div>
     
      <form id="frmHC" method="POST" action="/" target="_self" enctype="multipart/form-data">
      
          <div class="header" style="margin-top:18px; display:none;">
              &nbsp;&nbsp;<a href="http://macswap.5mode.com" target="_self" style="color:#d4b0dc; text-decoration: none;"><img src="/res/1burger_1.png" style="width:25px;">&nbsp;MacSwap</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://github.com/par7133/MacSwap" style="color:#d4b0dc;"><span style="color:#d4b0dc;">on</span> github</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="mailto:my25mb@aol.com" style="color:#d4b0dc;"><span style="color:#d4b0dc;">for</span> feedback</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="tel:+39-331-4029415" style="font-size:13px;background-color:#15c60b;border:2px solid #15c60b;color:#000000;height:27px;text-decoration:none;">&nbsp;&nbsp;get support&nbsp;&nbsp;</a>
         </div>
        
          <div id="debugdisplay" style="float:left;position:absolute;top:680px;left:450px;width:255px;display:none;">
               <input id="hcube" type="text"><br>
               <input id="vcube" type="text"><br>
               <input id="hcur" type="text"><br>
               <input id="vcur" type="text">
               <input id="curcube" type="text">
          </div>

         <div id="passworddisplay" style="float:left;position:fixed;top:680px;left:50px;width:255px;height:120px;background:black;text-align:left;white-space:nowrap; font-family:'Bungee Hairline'; color:#d4b0dc; font-weight:900;z-index:99999;">
               <br>  
                &nbsp;&nbsp;<input type="password" id="Password" name="Password" placeholder="password" style="font-size:18px;  background:transparent; width: 60%; border-radius:3px; font-weight:900;" value="<?php echo($password);?>" autocomplete="off">&nbsp;<input type="submit" value="<?php echo(getResource("Go", $curLocale));?>" style="text-align:left;width:25%;"><br>
                &nbsp;&nbsp;<input type="text" id="Salt" placeholder="salt" style="position:relative; top:+5px; font-size:18px; background:transparent; width: 90%; border-radius:3px; font-weight:900;" autocomplete="off"><br>
                <div style="text-align:center;">
                   <a href="#" onclick="showEncodedPassword();" style="position:relative; left:-2px; top:+5px; font-size:18px; font-weight:900; color:#d4b0dc;"><?php echo(getResource("Hash Me", $curLocale));?>!</a>
                </div>
                <!--<textarea id="log"></textarea>-->
         </div>

         <div id="cubeList" style="position:absolute; width:100%; min-height: 500px; display:none; color:#d4b0dc; border: 0px solid red;"> 
             &nbsp;
          </div>

          <map name="ctrls-map">
              <area target="" alt="" title="" href="#" onclick="turnLeft();" onmouseover="zoomviewOver()" coords="408,122,120,3" shape="rect">
              <area target="" alt="" title="" href="#" onclick="turnUp();" onmouseover="zoomviewOver()" coords="411,272,525,3" shape="rect">
              <area target="" alt="" title="" href="#" onclick="turnRight();" onmouseover="zoomviewOver()" coords="407,497,115,383,407,495" shape="rect">
              <area target="" alt="" title="" href="#" onclick="turnDown();" onmouseover="zoomviewOver()"  coords="176,347,66,411,2,295,0,144,62,142,106,238,105,243,63,144,109,237" shape="poly">
          </map>

         <div id="cubectrls" style="position:absolute;width:527px;height:497px;display:none;border:0px solid green; z-index:99998; transform: rotate(-63deg);" onmouseover="zoomviewOver()" onmouseout="zoomviewOut()">
           <img src="../res/ctrlbg.png" style="width:527px;height:497px;" usemap="#ctrls-map">
         </div>

         <div id="zoomedview" style="position:absolute;width:396px;height:477px;display:none;border:0px solid red; z-index:99997">
           <div id="cubezvname" style="position:relative; top:+30px;font-size:54px;color:#bd006e;width:400px;margin:auto;text-align:center;font-family:'Bungee Hairline';font-weight:900;"></div>

           <div id="cubezv" style="float:left;background:url(../res/1cube.png);background-size:cover;width:396px;height:477px;margin:50px;vertical-align:middle;text-align:center;">
           </div>
         </div>

         <div id="cubelinks" style="position:absolute;width:496px;height:7px;display:none;border:0px solid red; z-index:99999">
           <span id="face2" target="" onclick="openDetail(this)" onmouseover="zoomviewOver()" style="position:relative;top:160px;left:10px;background:transparent;border:0px;font-size:24px;color:#44ff00;width:450px;height:120px;margin:auto;text-align:center;font-family:'Bungee Hairline';font-weight:900;white-space:nowrap;cursor:pointer; transform: rotate(+63deg);"></span><br>
           <span id="face1" target="" onclick="openDetail(this)" onmouseover="zoomviewOver()" style="position:relative;top:+280px;left:-270px;background:transparent;border:0px solid red;font-size:24px;color:#44ff00;width:450px;height:120px;margin:auto;text-align:left;font-family:'Bungee Hairline';font-weight:900;white-space:nowrap;cursor:pointer; transform: rotate(+63deg);"></span><br>
           <span id="face3" target="" onclick="openDetail(this)" onmouseover="zoomviewOver()" style="position:relative;top:+160px;left:+240px;background:transparent;border:0px;font-size:24px;color:#44ff00;width:450px;height:80px;margin:auto;text-align:left;font-family:'Bungee Hairline';font-weight:900;transform: rotate(0deg); white-space:nowrap;cursor:pointer; transform: rotate(+63deg);"></span><br>
         </div>

         <div id="datadetail" style="float:right;background:#0d0d0d;border-left:1px solid white;width:380px;height:900px;display:none;color:#44ff00;" onmouseover="zoomviewOver()">
           <span id="detailtitle" style="color:#bd006e;font-size:20px;font-weight:900;"></span><br><br>
           <span id="detaildata"></span>
         </div>

        <!--
        <input type="hidden" id="_read_xml_cube1">
        <input type="hidden" id="_read_xml_cube2">
        <input type="hidden" id="_read_xml_cube3">
        <input type="hidden" id="_read_xml_cube4">
        <input type="hidden" id="_read_xml_cube5">
   -->
   
     </form>   

    <div class="footer">
    <div id="footerCont">&nbsp;</div>
    <div id="footer"><span style="background:#0d0d0d;color:#d4b0dc;opacity:1.0;margin-right:10px;">&nbsp;&nbsp;A <a href="http://5mode.com" style="color:#d4b0dc; text-decoration:underline;">5 Mode</a> project and <a href="http://demo.5mode.com" style="color:#d4b0dc; text-decoration:underline;">WYSIWYG</a> system. Some rights reserved.</span></div>	
    </div>
    
<?php if (file_exists(APP_PATH . DIRECTORY_SEPARATOR . "metrics.html")): ?>
<?php include(APP_PATH . DIRECTORY_SEPARATOR . "metrics.html"); ?> 
<?php endif; ?>
  
</body>
</html>
