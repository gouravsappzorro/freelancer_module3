<?php
						     	/**================================================================================||
								||      *Developer : Green Cubes Solutions										   ||
								||      *Website   : www.greencubes.co.in										   ||
								||      *Date      : 25-11-2014													   ||
								||																				   ||
								||      *  NOTICE OF LICENSE  *													   ||
								|| 																				   ||
								|| 																				   ||
								||		   This source file is subject to the Company Copyright 				   ||
								||		   and its use by any other party without concern of Greencubes        	   ||
								||  	   or trying to sell this code will be considered illegal 				   ||
								||		   and any legal actions can be undertaken.								   ||
								||		   If you want to receive a copy of the license, please send an email      ||
								||  	   to info@greencubes.co.in, for further procedure						   ||
								||=================================================================================**/        ?>


<html lang="en">
<head>
    <title id='Description'>jQuery Chart Column Series Example</title>
    <link rel="stylesheet" href="../../jqwidgets/styles/jqx.base.css" type="text/css" />
    <script type="text/javascript" src="../../scripts/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="../../jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="../../jqwidgets/jqxchart.core.js"></script>
    <script type="text/javascript" src="../../jqwidgets/jqxdraw.js"></script>
    <script type="text/javascript" src="../../jqwidgets/jqxdata.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
		
            // prepare chart data
            var  sampleData = [
                    { Day:'Monday', Keith:30, Erica:15, George: 25},
                    { Day:'Tuesday', Keith:25, Erica:25, George: 30},
                    { Day:'Wednesday', Keith:30, Erica:20, George: 25},
                    { Day:'Thursday', Keith:35, Erica:25, George: 45},
                    { Day:'Friday', Keith:20, Erica:20, George: 25},
                    { Day:'Saturday', Keith:30, Erica:20, George: 30},
                    { Day:'Sunday', Keith:60, Erica:45, George: 90}
                ];
				
            // prepare jqxChart settings
            var settings = {
                title: "Fitness & exercise weekly scorecard",
                description: "Time spent in vigorous exercise",
                padding: { left: 5, top: 5, right: 5, bottom: 5 },
                titlePadding: { left: 90, top: 0, right: 0, bottom: 10 },
                source: sampleData,
                categoryAxis:
                    {
                        dataField: 'Day',
                        showGridLines: false
                    },
                colorScheme: 'scheme01',
                seriesGroups:
                    [
                        {
                            type: 'column',
                            columnsGapPercent: 30,
                            seriesGapPercent: 0,
                            valueAxis:
                            {
                                minValue: 0,
                                maxValue: 100,
                                unitInterval: 10,
                                description: 'Time in minutes'
                            },
                            series: [
                                    { dataField: 'Keith', displayText: 'Keith'},
                                    { dataField: 'Erica', displayText: 'Erica'},
                                    { dataField: 'George', displayText: 'George'}
                                ]
                        }
                    ]
            };
            
            // select the chartContainer DIV element and render the chart.
            $('#chartContainer').jqxChart(settings);
        });
    </script>
</head>
<body style="background:white;">
	<div id='chartContainer' style="width:600px; height: 400px"/>
</body>
</html>