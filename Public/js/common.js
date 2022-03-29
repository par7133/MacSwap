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
 * common.js
 * 
 * common javascript
 *
 * @author Daniele Bonini <my25mb@aol.com>
 * @copyrights (c) 2016, 2024, 5 Mode
 */

/**
 * Encrypt the given string
 * 
 * @param {string} string - The string to encrypt
 * @returns {string} the encrypted string
 */
function encryptSha2(string) {
  var jsSHAo = new jsSHA("SHA-256", "TEXT", 1);
  jsSHAo.update(string);
  return jsSHAo.getHash("HEX");
}

/**
 * Open a link from any event handler
 * 
 * @param {string} href the link to open
 * @param {string} target the frame target
 * @returns {none}
 */
function openLink(href, target) {
  window.open(href, target);
}

function rnd(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min +1)) + min;
}

window.addEventListener("load", function(){

}, true);

window.addEventListener("resize", function(){

}, true);

// Global window load event handler..
window.addEventListener("scroll", function() {

}, true);