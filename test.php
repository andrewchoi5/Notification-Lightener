<html>
<head>
	<title> 1- to 4-level Drop Down</title>
	<style type="text/css">
	.DDlist { display:none; }
	</style>
</head>
<body>
	<form action="" onsubmit="return false">
		<select name='List1' id="List1" onchange="fillSelect(this.value,this.form['List2'])">
			<option selected>Make a selection</option>
		</select> &nbsp;
		<select name='List2' id="List2" onchange="fillSelect(this.value,this.form['List3'])" class="DDlist">
			<option selected>Make a selection</option>
		</select> &nbsp;
		<select name='List3' id="List3" onchange="fillSelect(this.value,this.form['List4'])" class="DDlist">
			<option selected >Make a selection</option>
		</select> &nbsp;
		<select name='List4' id="List4" class="DDlist">
			<option selected >Make a selection</option>
		</select> &nbsp;
		<button onclick="getValues()">Show selections</button>
	</form>
</body>
<script type="text/javascript">
var categories = [];
categories["startList"] = ["Apparel","Books",'Radio','True','False'];        // Level 1  (True|False is 1 level only)

categories["Apparel"] = ["Men","Women"];                         // Level 2
categories["Men"] = ["Shirts","Ties","Belts"];                    // Level 3
categories['Shirts'] = ['Tux','Button-down','Polo',"T's"]         //  Level 4
categories['Ties'] = ['Silk','String','Bow']                      //  Level 4
categories['Belts'] = ['Leather','Cloth']                         //  Level 4

categories["Women"] = ["Blouses","Skirts","Scarves"];             // Level 3
categories["Blouses"] = ["Silk","Cotton","Polyester"];             // Level 4 only
categories["Skirts"] = ["Full","Pleated"];                         // Level 4 only
categories["Scarves"] = ["Head","Neck","Waist"];                   // Level 4 only

categories["Books"] = ["Biography","Fiction","Nonfiction"];      // Level 2
categories["Biography"] = ["Contemporary","Historical","Other"];  // Level 3 only
categories["Fiction"] = ["Science","Romance"];                    // Level 3 only
categories["Nonfiction"] = ["How-To","Travel","Cookbooks"];       // Level 3 only

categories['Radio'] = ['AM','FM','HD'];                          // Level 2 only
var nLists = 4; // number of lists in the set 
function fillSelect(currCat,currList){
	var step = Number(currList.name.replace(/\D/g,""));
	for (i=step; i<nLists+1; i++) {
		document.forms[0]['List'+i].length = 1;
		document.forms[0]['List'+i].selectedIndex = 0;
		document.getElementById('List'+i).style.display = 'none';
	}
	var nCat = categories[currCat];
	if (nCat != undefined) {
		document.getElementById('List'+step).style.display = 'inline';
		for (each in nCat) 	{
			var nOption = document.createElement('option');
			var nData = document.createTextNode(nCat[each]);
			nOption.setAttribute('value',nCat[each]);
			nOption.appendChild(nData);
			currList.appendChild(nOption);
		}
	} 
}
function getValues(){ 
	var str = '';
	str += document.getElementById('List1').value+'\n';
	for (var i=2; i<=nLists; i++) {
		if (document.getElementById('List'+i).selectedIndex != 0) {
			str += document.getElementById('List'+i).value+'\n'; }
		}
		alert(str); 
	}
	function init() { fillSelect('startList',document.forms[0]['List1']); }
	navigator.appName == "Microsoft Internet Explorer"
	? attachEvent('onload', init, false) 
	: addEventListener('load', init, false);	
	</script>
	</html>