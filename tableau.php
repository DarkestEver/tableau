<?php require_once ("Admin/functions.php"); 

$groupname= "";
$groupid = "";
$url = "";
$urlid = "";
if(isset($_GET['group']))
{
	$groupname= $_GET['group'];
	$row = getTDashboardgroupOnebyname($groupname);
	$groupid = $row['id'];
	if($groupid)
	{
		$rows = getdashboardsByGroupIdone($groupid);
		$url = $rows['url'];
		$urlid = $rows['id'];
	}
}
else
{

}

?>


// javascript variable declaration //
var wordSeprator = '<?php echo  $keyPairCongig['wordSeprator']; ?>';
var url = '<?php echo $url!=""?$url:$keyPairCongig['url']; ?>' ;
var TableauPlaceholderDiv = '<?php echo  $keyPairCongig['TableauPlaceholderDiv']; ?>';
var fvalue;
var tov=0; // tov off
var viz;
var vizUrl;

 // initaialize tableau dashboard ///
 function initViz(tableausheet) 
 {
            var containerDiv = document.getElementById(TableauPlaceholderDiv),
				options = {
				       <?php // echo  $keyPairCongig['twidth'] != ""?'width:'.$keyPairCongig['twidth'].',':""; ?>
					    <?php // echo  $keyPairCongig['theight'] != ""?'height:'.$keyPairCongig['theight'].',':""; ?>
					    
						hideTabs: true,
						hideToolbar: true,

                
						 onFirstInteractive: function () {
							
							  
						 if (tableausheet== "") {          
							var sheet =  viz.getWorkbook().getActiveSheet();	

						 }
						 else
						 {
							var sheet =  viz.getWorkbook().getActiveSheet().getWorksheets().get(tableausheet);
							
						 }
						 Speech('<?php echo  $keyPairCongig['startvoice']; ?>');
						 
						 $("#micIndicatorOff").show();
						 $("#micIndicator").hide();
						 
						 
                }
                };
			viz = new tableau.Viz(containerDiv, url, options);
			addDashboardScript('<?php echo  $urlid !=""?$urlid :$keyPairCongig['rirstloadurl']; ?>');
			
		
 }
 
 /// navigate to another dashboard //
 	function tNavigate(dashboardname,url) {
              var containerDiv = document.getElementById(TableauPlaceholderDiv),
				options = {
                hideTabs: true,
						hideToolbar: true,
				onFirstInteractive: function () {
						
							var sheet = viz.getWorkbook().getActiveSheet();
						
                }
                };
				 if (viz) { // If a viz object exists, delete it.
                viz.dispose();
            }
            //alert(TableauPlaceholderDiv);
            vizUrl = url;
			viz = new tableau.Viz(containerDiv, url, options);
			addDashboardScript(dashboardname);
			startTableau();
        }


//// reset current dashboard ///		
	function startOver(dimension, fvalue, tableausheet) {
	  viz.revertAllAsync();
	}

////  Charts selections or marks /////////

// select single mark
function tMarkSelection(dimension, fvalue,tableausheet)
	{
		if (tableausheet== "") {          
			var sheet =  viz.getWorkbook().getActiveSheet();
		 }
		 else
		 {
			var sheet =  viz.getWorkbook().getActiveSheet().getWorksheets().get(tableausheet);
		 }
		 if (fvalue === "") {
			sheet.clearFilterAsync(dimension);
		} else {
			sheet.selectMarksAsync(dimension, fvalue, tableau.FilterUpdateType.REPLACE);
		}
		console.log('dimension- ' +dimension + ' value - ' + fvalue + 'tableausheet - ' + tableausheet + ' type - tMarkSelection');
	}
// add  marks to existing selections
function addValuestMarkSelection(dimension, fvalue,tableausheet) {

	if (tableausheet== "") {          
			var sheet =  viz.getWorkbook().getActiveSheet();
		 }
		 else
		 {
			var sheet =  viz.getWorkbook().getActiveSheet().getWorksheets().get(tableausheet);
		 }
		sheet.selectMarksAsync(dimension, fvalue, tableau.FilterUpdateType.ADD);
		console.log('dimension- ' +dimension + ' value - ' + fvalue + 'tableausheet - ' + tableausheet + ' type - addValuestMarkSelection');
}

// rempove  marks to existing selections
function removeFromtMarkSelection() {
  // Remove all of the areas where the GDP is < 5000.
  if (tableausheet== "") {          
			var sheet =  viz.getWorkbook().getActiveSheet();
		 }
		 else
		 {
			var sheet =  viz.getWorkbook().getActiveSheet().getWorksheets().get(tableausheet);
		 }
		 if (fvalue != "") {
			sheetgetActiveSheet().selectMarksAsync(
													"AVG(F: GDP per capita (curr $))",
													{
													  max: 5000
													},
													tableau.SelectionUpdateType.REMOVE);
													}
	console.log('dimension- ' +dimension + ' value - ' + fvalue + 'tableausheet - ' + tableausheet + ' type - removeFromtMarkSelection');
}
///// clear all  marks to existing selections
function clearSelection(dimension, fvalue,tableausheet) {

		if (tableausheet== "") {          
			var sheet =  viz.getWorkbook().getActiveSheet();
		 }
		 else
		 {
			var sheet =  viz.getWorkbook().getActiveSheet().getWorksheets().get(tableausheet);
		 }
		
			sheet.clearSelectedMarksAsync();
	console.log('dimension- ' +dimension + ' value - ' + fvalue + 'tableausheet - ' + tableausheet + ' type clearSelection');
}

////// Single value selection on Radio button or Multibox 
function tFilter(dimension, fvalue, tableausheet) {
			 if (tableausheet== "") {          
				var sheet =  viz.getWorkbook().getActiveSheet();
			 }
			 else
			 {
				var sheet =  viz.getWorkbook().getActiveSheet().getWorksheets().get(tableausheet);
			 }	
	sheet.applyFilterAsync(dimension, fvalue, tableau.FilterUpdateType.REPLACE);
	console.log('dimension- ' +dimension + ' value - ' + fvalue + 'tableausheet - ' + tableausheet + ' type - tFilter');
}

// Filter - adding new filter
function tAddfilter(dimension, fvalue, tableausheet) {
			 if (tableausheet== "") {          
				var sheet =  viz.getWorkbook().getActiveSheet();
			 }
			 else
			 {
				var sheet =  viz.getWorkbook().getActiveSheet().getWorksheets().get(tableausheet);
				
			 }	
			 console.log(dimension +  fvalue + tableausheet);
	sheet.applyFilterAsync(dimension, fvalue, tableau.FilterUpdateType.ADD);
	console.log('dimension- ' +dimension + ' value - ' + fvalue + 'tableausheet - ' + tableausheet + ' type - tAddfilter');
}
// Filter - removing new filter
function tRemovefilter(dimension, fvalue, tableausheet) {
			 if (tableausheet== "") {          
				var sheet =  viz.getWorkbook().getActiveSheet();
			 }
			 else
			 {
				var sheet =  viz.getWorkbook().getActiveSheet().getWorksheets().get(tableausheet);
			 }	
			 console.log(sheet);
	sheet.applyFilterAsync(dimension, fvalue, tableau.FilterUpdateType.REMOVE);
	console.log('dimension- ' +dimension + ' value -  ' + fvalue + 'tableausheet - ' + tableausheet + ' type - tRemovefilter' );
}

// All values
function tAllfilter(dimension, fvalue, tableausheet) {
			 if (tableausheet== "") {          
				var sheet =  viz.getWorkbook().getActiveSheet();
			 }
			 else
			 {
				var sheet =  viz.getWorkbook().getActiveSheet().getWorksheets().get(tableausheet);
			 }	
	sheet.applyFilterAsync(dimension, "", tableau.FilterUpdateType.ALL);
	console.log('dimension- ' +dimension + ' value - '  + fvalue + 'tableausheet - ' + tableausheet + ' type - tAllfilter ');
}



// Clearing a Filter
function tClearfilter(dimension, fvalue, tableausheet) {
			 if (tableausheet== "") {          
				var sheet =  viz.getWorkbook().getActiveSheet();
			 }
			 else
			 {
				var sheet =  viz.getWorkbook().getActiveSheet().getWorksheets().get(tableausheet);
			 }	
	sheet.applyFilterAsync(dimension, "", tableau.FilterUpdateType.REPLACE);
	console.log('dimension- ' +dimension + ' value - ' + fvalue + 'tableausheet - ' + tableausheet + 'type - tClearfilter');
}

/// set parameter
function tSetParameter(dimension, fvalue, tableausheet) {
			 
	viz.getWorkbook().changeParameterValueAsync(dimension, fvalue);
	console.log('dimension- ' +dimension + ' value - ' + fvalue + 'tableausheet - ' + tableausheet + 'type - tClearfilter');
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





///////////// scroll ////////////
var scrollBypx = '<?php echo  $keyPairCongig['scrollBypx']; ?>';
//// other function 
function scrollLeft(dimension, fvalue, tableausheet)
{
	window.scrollBy(fvalue,0);
}
function scrollRight(dimension, fvalue, tableausheet)
{
	window.scrollBy(-fvalue,0);
}
function scrollUp(dimension, fvalue, tableausheet)
{
	window.scrollBy(0,-fvalue);
}
function scrollDown(dimension, fvalue, tableausheet)
{
	window.scrollBy(0,fvalue);
}
function scrolltop(dimension, fvalue, tableausheet)
{
	window.scrollTop	
}		
/////////////////////////////
function model_popup_show(dimension, fvalue, tableausheet)
		{
			$("#" + fvalue).modal('show');
		}
		
		function model_popup_hide(dimension, fvalue, tableausheet)
		{
			$("#" + fvalue).modal('hide');
		}
		
		function model_div_show(dimension, fvalue, tableausheet)
		{
			$("#" + fvalue).show();
		}
		
		function model_div_hide(dimension, fvalue, tableausheet)
		{
			$("#" + fvalue).hide();
		}


//// add javascript based on tableau dashboard to avoid command clash ////
function addDashboardScript(nameofdashboard)
{
$('#dynamicscript').remove();
var s = document.createElement("script");
s.type = "text/javascript";
s.src = "voice.php?id=" + nameofdashboard;
s.id = "dynamicscript"
$("head").append(s);

}
////// 1st alphabet of each word is capital////
function convert_case(str) {
  var lower = str.toLowerCase();
  return lower.replace(/(^| )(\w)/g, function(x) {
    return x.toUpperCase();
  });
}

// speak 
function Speech(fvalue)
{
	responsiveVoice.cancel();
	responsiveVoice.speak(fvalue,"UK English Male",{pitch: 0,rate: 0,volume: 1});

}