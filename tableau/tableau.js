var viz;
        function initViz() {
            var containerDiv = document.getElementById("vizContainer"),
                url = "http://public.tableau.com/views/RegionalSampleWorkbook/College",
                options = {
                hideTabs: true,
				onFirstInteractive: function () {
                      sheet = viz.getWorkbook().getActiveSheet();
                }
                };
            
            viz = new tableau.Viz(containerDiv, url, options);
        }
        
        function collegeFilter(college) {
            var sheet = viz.getWorkbook().getActiveSheet();
            if (college === "") {
                sheet.clearFilterAsync("College");
            } else {
                sheet.applyFilterAsync("College", college, tableau.FilterUpdateType.REPLACE);
            }
        }
		
		function genderFilter(gender) {
            var sheet = viz.getWorkbook().getActiveSheet();
            if (gender === "") {
                sheet.clearFilterAsync("Gender");
            } else {
                sheet.applyFilterAsync("Gender", gender, tableau.FilterUpdateType.REPLACE);
            }
        }
		
        function yearFilter(year) {
            var sheet = viz.getWorkbook().getActiveSheet();
            if (year === "") {
                sheet.clearFilterAsync("Academic Year");
            } else {
                sheet.applyFilterAsync("Academic Year", year, tableau.FilterUpdateType.REPLACE);
            }
        }
		
		function tFilter(dimension, fvalue) {
            var sheet = viz.getWorkbook().getActiveSheet();
			 if (fvalue === "") {
                sheet.clearFilterAsync(dimension);
            } else {
            sheet.applyFilterAsync(dimension, fvalue, tableau.FilterUpdateType.REPLACE);
            }
        }