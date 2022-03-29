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
 * dragndrop-code.js
 * 
 * Drg-n-drop Code for home.php.
 *
 * @author Daniele Bonini <my25mb@aol.com>
 * @copyrights (c) 2021, 2024, 5 Mode     
 */
gguid = "";

function onDragStart(tthis, e) {
  //e.preventDefault();
  tthisorder = parseInt($(tthis).attr("order"));
  //objName = document.getElementById("objName").value;
  //alert(objName);
  jsonData = serialize( cubes[tthisorder-1] ) + window.name;
  //alert(jsonData);
  e.dataTransfer.setData('text/plain', jsonData);
  document.body.style.cursor="move";
}

function onDragOver(e) {
  e.preventDefault();
  const id = e.dataTransfer.getData('text/plain');
  document.body.style.cursor="pointer";     
}  

function onDragOverOff(e) {
  e.preventDefault();
  document.body.style.cursor="not-allowed";     
}  

function onDrop(tthis, e) {
  e.preventDefault();
  mys=e.dataTransfer.getData('text/plain');
  gguid=mys.substr(mys.length-64); 
  mys=mys.substr(0,mys.length-64);
  //alert(mys);

  newcube = deserialize(mys);

  g = $(tthis).attr("guid");
  if (g === gguid) {
    alert("Operation not allowed in same window!");
    return;
  }
  
  o = parseInt($(tthis).attr("order"));
  n = parseInt($(tthis).attr("size")) + 1;

  bfound=false;
  for (i=0;i<(n-1);i++) {
    if (offers[o-1][i]) {
      if (offers[o-1][i].getguid() === newcube.getguid()) {
        bfound=i;
        break;
      }
    } else {
      break;
    }  
  }  

  if (bfound===false) {
    //n=totcubes+1;
    n = parseInt($(tthis).attr("size")) + 1;
    
    offers[o-1][n-1] = newcube;
    offers[o-1][n-1].name = "Offer" + "#" + n;
    if (o<10) {
      newFormalName = "burger" + "00" + o;
    } else if (n<100) {
      newFormalName = "burger" + "0" + o;
    } else {
      newFormalName = "burger" + o;
    }  
    if (n<10) {
      newFormalName += "-o-" + "00" + n;
    } else if (n<100) {
      newFormalName += "-o-" + "0" + n;
    } else {
      newFormalName += "-o-" + n;
    }  
    offers[o-1][n-1].formalName = newFormalName;
    //$("#cubeList").html($("#cubeList").html()+"<div id='cubelc" + n + "' style='width:99%;overflow-x: scroll;'><div id='cubel" + n + "' style='width:3800px;height:300px;border: 1px solid green;'><div id='cube" + n + "' class='cube' style='background:url(/res/1burgerg_" + rnd(1,3) + ".png);background-size:cover;border: 1px solid red;' order='" + n + "' onclick='selCube(this);openDetail(this);' draggable='true' ondragstart='onDragStart(this, event);' onmouseover='onMouseOver();'><div id='cube" + n + "name' class='cubename'>cube#" + n + "</div></div></div></div>");
    //$("#cubeList").html($("#cubeList").html()+"<div id='cube" + n + "' class='cube' order='" + n + "' onclick='selCube(this)'  draggable='true' ondragstart='onDragStart(this, event);' onmouseover='onMouseOver();'><div id='cube" + n + "name' class='cubename'>cube#" + n + "</div></div>");
    $(tthis).html($(tthis).html()+"<div id='" + newFormalName + "' class='cube' style='background:url(/res/1burgerg_" + parseInt(rnd(1,3)) + ".png);background-size:cover;border:0px solid red;' cubeorder='" + o + "' order='" + n + "' onclick='selOfferCube(this);openOfferDetail(this);'  draggable='true' ondragstart='onDropOff(event);' onmouseover='onMouseOver();'><div id='cube" + o + "offer" + n + "name' class='cubename'>offer#" + n + "</div></div>");
    //$("#cube"+n+"name").html(cubes[n-1].getname());
    $(tthis).attr("size", n);
  } else {

    if (offers[o-1][i].getpassword() === newcube.getpassword()) {
      pwd2 = prompt("password confirmation:");
      if (offers[o-1][i].getpassword() != pwd2) {
        $("#cubeList").html("<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Permission denied.");  
        return;
      }  
    } else {
      $("#cubeList").html("<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Permission denied.");  
      return;
    }  

    n=bfound+1;
    offers[o-1][n-1] = newcube;
    offers[o-1][n-1].name = "Offer" + "#" + n;
    if (o<10) {
      newFormalName = "burger" + "00" + o;
    } else if (n<100) {
      newFormalName = "burger" + "0" + o;
    } else {
      newFormalName = "burger" + o;
    }  
    if (n<10) {
      newFormalName += "-o-" + "00" + n;
    } else if (n<100) {
      newFormalName += "-o-" + "0" + n;
    } else {
      newFormalName += "-o-" + n;
    }  
    offers[o-1][n-1].formalName = newFormalName;
    //$("#cubeList").html($("#cubeList").html()+"<div id='cube" + n + "' class='cube' order='" + n + "' onclick='selCube(this)'><div id='cube" + n + "name' class='cubename'>cube#" + n + "</div></div>");
    //$("#cube"+n+"name").html(cubes[n-1].getname());
  }

  offers[o-1][n-1].savedata();

  document.body.style.cursor="normal";

}

function onDropOff(e) {
  e.preventDefault();
  document.body.style.cursor="not-allowed";
  e.stopPropagation();
}

function onMouseOver() {
  document.body.style.cursor="pointer";     
}
  

