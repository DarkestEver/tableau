<?php require_once ("Admin/functions.php"); 
?>

var wordSeprator = '<?php echo  $keyPairCongig['wordSeprator']; ?>';
var url = '<?php echo  $keyPairCongig['url']; ?>' ;
var twidth =  <?php echo  $keyPairCongig['twidth']; ?>;
var theight =  <?php echo  $keyPairCongig['theight']; ?>;
var TableauPlaceholderDiv = '<?php echo  $keyPairCongig['TableauPlaceholderDiv']; ?>';

var tov=0; // tov off
var viz;
var vizUrl;
        function initViz(tableausheet) {
            var containerDiv = document.getElementById(TableauPlaceholderDiv),
				options = {
					    width: twidth,
						height: theight,
						hideTabs: false,
						hideToolbar: false,
                
						 onFirstInteractive: function () {
						 if (tableausheet === "") {          
							var sheet = viz.getWorkbook().getActiveSheet();	
						 }
						 else
						 {
							var sheet = viz.getWorkbook().getActiveSheet().getWorksheets().get(tableausheet);
						 }
						 Speech('<?php echo  $keyPairCongig['startvoice']; ?>');
						 
						 $("#micIndicatorOff").show();
						 $("#micIndicator").hide();
						 
						 
                }
                };
			viz = new tableau.Viz(containerDiv, url, options);
			addDashboardScript('<?php echo  $keyPairCongig['rirstloadurl']; ?>');
			
		
        }
        
		
		function tNavigate(dashboardname,url) {
            var containerDiv = document.getElementById("vizContainer"),
				options = {
                
				onFirstInteractive: function () {
						
							var sheet = viz.getWorkbook().getActiveSheet();
						
                }
                };
				 if (viz) { // If a viz object exists, delete it.
                viz.dispose();
            }
            vizUrl = url;
			viz = new tableau.Viz(containerDiv, url, options);
			addDashboardScript(dashboardname);
			startTableau();
        }
		
		
		function startOver(dimension, fvalue, tableausheet) {
          viz.revertAllAsync();
		}
		
// 4 - Select

function tMarkSelection(dimension, fvalue,tableausheet)
	{
		if (tableausheet === "") {          
			var sheet = viz.getWorkbook().getActiveSheet();
		 }
		 else
		 {
			var sheet = viz.getWorkbook().getActiveSheet().getWorksheets().get(tableausheet);
		 }
		 if (fvalue === "") {
			sheet.clearFilterAsync(dimension);
		} else {
			sheet.selectMarksAsync(dimension, fvalue, tableau.FilterUpdateType.ADD);
		}
	}
		
function addValuestMarkSelection(dimension, fvalue,tableausheet) {

	if (tableausheet === "") {          
			var sheet = viz.getWorkbook().getActiveSheet();
		 }
		 else
		 {
			var sheet = viz.getWorkbook().getActiveSheet().getWorksheets().get(tableausheet);
		 }
		 if (fvalue != "") {
			sheet.selectMarksAsync(dimension, fvalue, tableau.FilterUpdateType.ADD);
		}
}

function removeFromtMarkSelection() {
  // Remove all of the areas where the GDP is < 5000.
  if (tableausheet === "") {          
			var sheet = viz.getWorkbook().getActiveSheet();
		 }
		 else
		 {
			var sheet = viz.getWorkbook().getActiveSheet().getWorksheets().get(tableausheet);
		 }
		 if (fvalue != "") {
			sheetgetActiveSheet().selectMarksAsync(
													"AVG(F: GDP per capita (curr $))",
													{
													  max: 5000
													},
													tableau.SelectionUpdateType.REMOVE);
													}

}

function clearSelection (dimension, fvalue,tableausheet) {

		if (tableausheet === "") {          
			var sheet = viz.getWorkbook().getActiveSheet();
		 }
		 else
		 {
			var sheet = viz.getWorkbook().getActiveSheet().getWorksheets().get(tableausheet);
		 }
		 if (fvalue != "") {
			sheet.clearSelectedMarksAsync();
		}
}
		
	
	
	
// Single value filter
function tFilter(dimension, fvalue, tableausheet) {
			 if (tableausheet === "") {          
				var sheet = viz.getWorkbook().getActiveSheet();
			 }
			 else
			 {
				var sheet = viz.getWorkbook().getActiveSheet().getWorksheets().get(tableausheet);
			 }	
	sheet.applyFilterAsync(dimension, fvalue, tableau.FilterUpdateType.REPLACE);
}


// Multiple values filter add
function tMultifilter(dimension, fvalue, tableausheet) {
			 if (tableausheet === "") {          
				var sheet = viz.getWorkbook().getActiveSheet();
			 }
			 else
			 {
				var sheet = viz.getWorkbook().getActiveSheet().getWorksheets().get(tableausheet);
			 }	
	sheet.applyFilterAsync(dimension, fvalue.split(wordSeprator), tableau.FilterUpdateType.REPLACE);
}

// Filter - adding new filter
function tAddfilter(dimension, fvalue, tableausheet) {
			 if (tableausheet === "") {          
				var sheet = viz.getWorkbook().getActiveSheet();
			 }
			 else
			 {
				var sheet = viz.getWorkbook().getActiveSheet().getWorksheets().get(tableausheet);
			 }	
	sheet.applyFilterAsync(dimension, fvalue, tableau.FilterUpdateType.ADD);
}
// Filter - removing new filter
function tRemovefilter(dimension, fvalue, tableausheet) {
			 if (tableausheet === "") {          
				var sheet = viz.getWorkbook().getActiveSheet();
			 }
			 else
			 {
				var sheet = viz.getWorkbook().getActiveSheet().getWorksheets().get(tableausheet);
			 }	
	sheet.applyFilterAsync(dimension, fvalue, tableau.FilterUpdateType.REMOVE);
}

// All values
function tAllfilter(dimension, fvalue, tableausheet) {
			 if (tableausheet === "") {          
				var sheet = viz.getWorkbook().getActiveSheet();
			 }
			 else
			 {
				var sheet = viz.getWorkbook().getActiveSheet().getWorksheets().get(tableausheet);
			 }	
	sheet.applyFilterAsync(dimension, "", tableau.FilterUpdateType.All);
}



// Clearing a Filter
function tClearfilter(dimension, fvalue, tableausheet) {
			 if (tableausheet === "") {          
				var sheet = viz.getWorkbook().getActiveSheet();
			 }
			 else
			 {
				var sheet = viz.getWorkbook().getActiveSheet().getWorksheets().get(tableausheet);
			 }	
	sheet.applyFilterAsync(dimension, "", tableau.FilterUpdateType.REPLACE);
	console.log(dimension);
}


// Date Range
function tDateRangefilter(dimension, fvalue, tableausheet) {
			 if (tableausheet === "") {          
				var sheet = viz.getWorkbook().getActiveSheet();
			 }
			 else
			 {
				var sheet = viz.getWorkbook().getActiveSheet().getWorksheets().get(tableausheet);
			 }	
	sheet.applyRangeFilterAsync(dimension, {
    min: new Date(Date.UTC(2010, 3, 1)),
    max: new Date(Date.UTC(2010, 12, 31))
  });
}


// Relative Date
function tRelativeDateRangefilter(dimension, fvalue,  tableausheet) {
			 if (tableausheet === "") {          
				var sheet = viz.getWorkbook().getActiveSheet();
			 }
			 else
			 {
				var sheet = viz.getWorkbook().getActiveSheet().getWorksheets().get(tableausheet);
			 }	
	sheet.applyRelativeDateFilterAsync(dimension, {
    anchorDate: new Date(Date.UTC(2011, 5, 1)),
    periodType: tableau.PeriodType.YEAR,
    rangeType: tableau.DateRangeType.LASTN,
    rangeN: 1
  });
}

// Quantitative Filters
// SUM(Sales) > 2000 and SUM(Sales) < 4000
function tAggRangefilter(dimension, fvalue, tableausheet) {
			 if (tableausheet === "") {          
				var sheet = viz.getWorkbook().getActiveSheet();
			 }
			 else
			 {
				var sheet = viz.getWorkbook().getActiveSheet().getWorksheets().get(tableausheet);
			 }	
	sheet.applyRangeFilterAsync(dimension, {
    min: 10,
    max: 20
  }, tableauSoftware.FilterUpdateType.REPLACE);
}

// SUM(Sales) > 1000
function tAggfilter(dimension, fvalue, tableausheet) {
			 if (tableausheet === "") {          
				var sheet = viz.getWorkbook().getActiveSheet();
			 }
			 else
			 {
				var sheet = viz.getWorkbook().getActiveSheet().getWorksheets().get(tableausheet);
			 }	
	sheet.applyRangeFilterAsync(dimension, {
    min: fvalue
  });
}


// // Hierarchical Filters - selecting all on a level
function tHierarchicalAllfilter(dimension, fvalue, tableausheet) {
			 if (tableausheet === "") {          
				var sheet = viz.getWorkbook().getActiveSheet();
			 }
			 else
			 {
				var sheet = viz.getWorkbook().getActiveSheet().getWorksheets().get(tableausheet);
			 }	
	sheet.applyHierarchicalFilterAsync(dimension, {
    levels: [fvalue]
  }, tableau.FilterUpdateType.ADD);
}

// // Hierarchical Filters - selecting all on a level
function tHierarchicalSinglefilter(dimension, fvalue, tableausheet) {
			 if (tableausheet === "") {          
				var sheet = viz.getWorkbook().getActiveSheet();
			 }
			 else
			 {
				var sheet = viz.getWorkbook().getActiveSheet().getWorksheets().get(tableausheet);
			 }	
	sheet.applyHierarchicalFilterAsync(dimension, {
    levels: [fvalue]
  }, tableau.FilterUpdateType.REPLACE);
}

// speak 
function Speech(fvalue)
{
	responsiveVoice.speak(fvalue);
}

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

function addDashboardScript(nameofdashboard)
{
$('#dynamicscript').remove();
var s = document.createElement("script");
s.type = "text/javascript";
s.src = "voice.php?id=" + nameofdashboard;
s.id = "dynamicscript"
$("head").append(s);

}