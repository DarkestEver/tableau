var viz;
var vizUrl;
        function initViz(tableausheet) {
            var containerDiv = document.getElementById("vizContainer"),
                url = "http://public.tableau.com/views/RegionalSampleWorkbook/College",
                vizUrl = url;
				options = {
                
				onFirstInteractive: function () {
						 if (tableausheet === "") {          
							var sheet = viz.getWorkbook().getActiveSheet();
						 }
						 else
						 {
							var sheet = viz.getWorkbook().getActiveSheet().getWorksheets().get(tableausheet);
						 }
                }
                };
            vizUrl = url;
			viz = new tableau.Viz(containerDiv, url, options);
        }
        
		
		function initViz2(url,tableausheet) {
            var containerDiv = document.getElementById("vizContainer"),
                vizUrl = url;
				options = {
                
				onFirstInteractive: function () {
						 if (tableausheet === "") {          
							var sheet = viz.getWorkbook().getActiveSheet();
						 }
						 else
						 {
							var sheet = viz.getWorkbook().getActiveSheet().getWorksheets().get(tableausheet);
						 }
                }
                };
				 if (viz) { // If a viz object exists, delete it.
                viz.dispose();
            }
            vizUrl = url;
			viz = new tableau.Viz(containerDiv, url, options);
        }
		
		
		function startOver() {
          viz.revertAllAsync();
		}
		
		function tFilter(dimension, fvalue, tableausheet) {
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
			
            sheet.applyFilterAsync(dimension, fvalue, tableau.FilterUpdateType.REPLACE);
            }
        }
		
		var showFilter = function(tag) {
		  console.log(tag);
		}
		
		function tSelect(dimension, fvalue,tableausheet)
		{
		//activeSheet.getWorksheets()[1].selectMarksAsync('State', 'AK', tableauSoftware.FilterUpdateType.REPLACE); 
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
            sheet.selectMarksAsync(dimension, fvalue, tableau.FilterUpdateType.REPLACE);
            }
		}
		
		function tMultiSelectAdd(dimension, fvalue,tableausheet)
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
            
			sheet.applyFilterAsync(dimension, fvalue.split("and"), tableau.FilterUpdateType.ADD);
            }
		}
		
		function tMultiSelectAdd(dimension, fvalue,tableausheet)
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
             	sheet.applyFilterAsync(dimension, fvalue.split("and"), tableau.FilterUpdateType.Remove);
            }
		}
	
		
		function loadjs()
		{
			var script = document.createElement('script');
			script.setAttribute('type', 'text/javascript');
			script.setAttribute('src', 'voice.php');
			document.head.appendChild(script);

		}
		function model_popup_show(modelname)
		{
			$("#" + modelname).modal('show');
		}
		
		function model_popup_hide(modelname)
		{
			$("#" + modelname).modal('hide');
		}
		
		function model_div_show(modelname)
		{
			$("#" + modelname).show();
		}
		
		function model_div_hide(modelname)
		{
			$("#" + modelname).hide();
		}
		