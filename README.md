# MacSwap
Swapping everything like burgers? Here your p2p, drag-n-drop solution - GPL License

Hello and welcome to MacSwap!<br>
	   
MacSwap is a light, simple, "peer-to-peer" software for swapping your own stuff with others, by drag-n-drop.<br>
	   
MacSwap is released under GPLv3 license, it is supplied AS-IS and we do not take any responsibility for its misusage.<br>

MacSwap got built behind some cool features like object drag-n-drop between browser windows, full object serialization and xml.

First step, use the left side panel password and salt fields to create the hash to insert in the config file. Remember to manually set there also the salt value.<br>
	   
As you are going to run MacSwap in the PHP process context, using a limited web server or phpfpm user, you must follow some simple directives for an optimal first setup:<br>
<ol>
  <li>Check the write permissions of your "data" folder in your web app private path; and set its path in the config file.</li>
  <li>Set the default Business Type, City and Country of the stuff your are going to swap.</li>
  <li>Set the MAX_BURGERS value stating the max number of burgers the app is going to manage.</li>
  <li>Set the Editor Password of your burgers. This will be important to confirm your burger upload by dropping it and saving it.</li>
  <li>In Public/js/cube-code.js, in mystart class method, check if you are using 'http' or 'https'.</li>	   
</ol>
	        
Hope you can enjoy it and let us know about any feedback: <a href="mailto:info@macswap.org" style="color:#e6d236;">info@macswap.org</a>
	   
