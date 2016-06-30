
var chart;
var country = new Array('a','b','c','d','e');
var visits = new Array(1,2,3,4,5);
var url = "www.google.co.in";

var chartData = [{
		"country": "Advent",
		"visits": 252,
                "url":"www.google.co.in",
                "visits1": 100,
                "color":'#2b94dc'
	}, {
		"country": "Beladent",
		"visits": 386,
                "url":"www.google.co.in",
                "visits1": 1400,
                "color":'#7bcfff'
	}, {
		"country": "Clarity",
		"visits": 384,
                "url":"www.google.co.in",
                "visits1": 1500,
                "color":'#00cb71'
	}, {
		"country": "Dentate",
		"visits": 338,
                "url":"www.google.co.in",
                "visits1": 1600,
                "color":'#62d694'
	}, {
		"country": "Poland",
		"visits": 328,
                "url":"www.google.co.in",
                "visits1": 1700,
                "color":'#f2f7f9'
	}];

    AmCharts.ready(function() {

    chart = new AmCharts.AmPieChart();
    chart.valueField = "visits";
    chart.titleField = "country";
    chart.dataProvider = chartData;
    chart.labelsEnabled = false;
    chart.innerRadius = 60;
    chart.colors = [' #2b94dc','#7bcfff','#00cb71','#62d694','#f2f7f9'];
        /*var legend = new AmCharts.AmLegend();
        legend = new AmCharts.AmLegend();
        legend.position = "bottom";
        legend.align = "center";
        legend.markerType = "circle";
        legend.maxColumns = 10;
        chart.addLegend(legend);*/
    chart.write("piediv");
    
    
    
    var chart = new AmCharts.AmSerialChart();
    chart.dataProvider = chartData;
    chart.categoryField = "country";
    chart.categoryAxis = { "labelRotation": 45};
    chart.fontSize = 10;
    var graph = new AmCharts.AmGraph();
    graph.valueField = "visits";
    graph.type = "column";
    graph.fillAlphas = 0.8;
    graph.colorField = "color";
    graph.lineAlpha =0;
    graph.valueAxis = "v1";
    chart.addGraph(graph);
    
    var categoryAxis = chart.categoryAxis;
    categoryAxis.autoGridCount  = true;
    categoryAxis.gridCount = chartData.length;
    categoryAxis.gridPosition = "start";
    categoryAxis.gridAlpha = 0;

    chart.valueAxes = [{
        "id":"v1",
        "axisColor": "#aab5b8",
        "axisThickness": 1,
        "gridAlpha": 0,
        "axisAlpha": 1,
        "position": "left"
    }
];
    
    
    chart.write("bardiv");
    
    var chart = new AmCharts.AmSerialChart();
    chart.dataProvider = chartData;
    chart.categoryField = "country";
    
    var graph = new AmCharts.AmGraph();
    graph.valueField = "visits";
    graph.type = "column";
    graph.fillAlphas = 0.8;
    chart.addGraph(graph);
    chart.rotate = true;
    //chart.write("sideBardiv");
    
    var chart = new AmCharts.AmSerialChart();
    chart.dataProvider = chartData;
    chart.categoryField = "country";
    
    var graph = new AmCharts.AmGraph();
    graph.valueField = "visits";
    graph.type = "line";
    graph.bullet = "round";
    //graph.bulletBorderAlpha = 1;
    graph.bulletColor = "#FFFFFF";
    //graph.useLineColorForBulletBorder = false;
    graph.colorField = "color";
    chart.addGraph(graph);
        var categoryAxis = chart.categoryAxis;
        categoryAxis.autoGridCount  = true;
        categoryAxis.gridCount = chartData.length;
        categoryAxis.gridPosition = "start";
        categoryAxis.gridAlpha = 0;

        chart.valueAxes = [{
            "id":"v1",
            "axisColor": "#aab5b8",
            "axisThickness": 1,
            "gridAlpha": 0,
            "axisAlpha": 1,
            "position": "left"
        }];
        graph.valueAxis = "v1";
    chart.write("linediv");

    var chart = new AmCharts.AmSerialChart();
    chart.dataProvider = chartData;
    chart.categoryField = "country";
    chart.valueAxes = [{
        "id":"v1",
        "axisColor": "#FF6600",
        "axisThickness": 2,
        "gridAlpha": 0,
        "axisAlpha": 1,
        "position": "left"
    }, {
        "id":"v2",
        "axisColor": "red",
        "axisThickness": 2,
        "gridAlpha": 0,
        "axisAlpha": 1,
        "position": "right"
    }];

    var graph = new AmCharts.AmGraph();
    graph.valueAxis = "v1"
    graph.valueField = "visits";
    graph.type = "column";
    graph.fillAlphas = 0.8;
    chart.addGraph(graph);
    
    var graph = new AmCharts.AmGraph();
    graph.valueAxis = "v1"
    graph.valueField = "visits";
    graph.type = "line";
    graph.bullet = "round";
    graph.bulletBorderAlpha = 1;
    graph.lineColor = "#FF6600";
    graph.bulletColor = "#FF6600";
    graph.useLineColorForBulletBorder = true;
    chart.addGraph(graph);
    
    
    var graph = new AmCharts.AmGraph();
    graph.valueAxis = "v2"
    graph.valueField = "visits1";
    graph.type = "line";
    graph.bullet = "round";
    graph.bulletBorderAlpha = 1;
    graph.lineColor = "red";
    graph.bulletColor = "#FFFFFF";
    graph.useLineColorForBulletBorder = true;
    chart.addGraph(graph);
    
    
    var legend = new AmCharts.AmLegend();
    legend = new AmCharts.AmLegend();
    legend.position = "bottom";
    legend.align = "center";
    legend.markerType = "circle";
    legend.maxColumns = 10;
    chart.addLegend(legend);
    
    //chart.write("lineBardiv");
    
    
    
    
    
    var chartData1 = [{
        "brand": "Brand1",
        "health": 7,
        "freshness": 4,
        "cosmetic": 4,
        "total": 15
    }, {
        "brand": "Brand2",
        "health": 8,
        "freshness": 2,
        "cosmetic": 2,
        "total": 12
    }, {
        "brand": "Brand3",
        "health": 5,
        "freshness": 5,
        "cosmetic": 7,
        "total": 17
    }, {
        "brand": "Brand4",
        "health": 4,
        "freshness": 6,
        "cosmetic": 2,
        "total": 12
    }, {
        "brand": "Brand5",
        "health": 3,
        "freshness": 3,
        "cosmetic": 3,
        "total": 9
    }, {
        "brand": "Brand6",
        "health": 5,
        "freshness": 2,
        "cosmetic": 7,
        "total": 14
    }, {
        "brand": "Brand7",
        "health": 3,
        "freshness": 1,
        "cosmetic": 2,
        "total": 6
    }];
    
    var chart = new AmCharts.AmSerialChart();
    chart.dataProvider = chartData1;
    chart.categoryField = "brand";
    
    chart.valueAxes = [{
        "stackType": "regular",
        "axisAlpha": 1,
        "gridAlpha": 0,
        "position": "left"
    }];

    var graph = new AmCharts.AmGraph();
    graph.valueField = "health";
    graph.type = "column";
    graph.title = "Health";
    graph.fillAlphas = 0.8;
    graph.labelText = "[[value]]";
    graph.balloonText = "<b>[[category]]</b><br><span style='font-size:14px'>[[title]]: <b>[[value]]</b></span>";
    chart.addGraph(graph);
    
    var graph = new AmCharts.AmGraph();
    graph.valueField = "freshness";
    graph.type = "column";
    graph.title = "Freshness";
    graph.fillAlphas = 0.8;
    graph.labelText = "[[value]]";
    graph.balloonText = "<b>[[category]]</b><br><span style='font-size:14px'>[[title]]: <b>[[value]]</b></span>";
    chart.addGraph(graph);
    
    var graph = new AmCharts.AmGraph();
    graph.valueField = "cosmetic";
    graph.type = "column";
    graph.title = "Cosmetic";
    graph.fillAlphas = 0.8;
    graph.labelText = "[[value]]";
    graph.balloonText = "<b>[[category]]</b><br><span style='font-size:14px'>[[title]]: <b>[[value]]</b></span>";
    chart.addGraph(graph);
    
    var legend = new AmCharts.AmLegend();
    legend = new AmCharts.AmLegend();
    legend.position = "right";
    legend.align = "center";
    legend.horizontalGap = 10;
    legend.maxColumns = 1;
    legend.useGraphSettings = true;
    legend.markerSize = 10;
    chart.addLegend(legend);
    
    //chart.write("lineBarSegmentsdiv");
    
    var scatterData = [{
        "ax": 1,
        "ay": 0.5,
        "bx": 1,
        "by": 2.2
    }, {
        "ax": 2,
        "ay": 1.3,
        "bx": 2,
        "by": 4.9
    }, {
        "ax": 3,
        "ay": 2.3,
        "bx": 3,
        "by": 5.1
    }, {
        "ax": 4,
        "ay": 2.8,
        "bx": 4,
        "by": 5.3
    }, {
        "ax": 5,
        "ay": 3.5,
        "bx": 5,
        "by": 6.1
    }, {
        "ax": 6,
        "ay": 5.1,
        "bx": 6,
        "by": 8.3
    }, {
        "ax": 7,
        "ay": 6.7,
        "bx": 7,
        "by": 10.5
    }, {
        "ax": 8,
        "ay": 8,
        "bx": 8,
        "by": 12.3
    }, {
        "ax": 9,
        "ay": 8.9,
        "bx": 9,
        "by": 14.5
    }, {
        "ax": 10,
        "ay": 9.7,
        "bx": 10,
        "by": 15
    }, {
        "ax": 11,
        "ay": 10.4,
        "bx": 11,
        "by": 18.8
    }, {
        "ax": 12,
        "ay": 11.7,
        "bx": 12,
        "by": 19
    }];


    var chart = new AmCharts.AmXYChart();
    chart.dataProvider = scatterData;
    
    chart.valueAxes = [{
        "position":"bottom",
        "axisAlpha": 0,
        "dashLength": 1,
        "title": "X Axis"
    }, {
        "axisAlpha": 0,
        "dashLength": 1,
        "position": "left",
        "title": "Y Axis"
    }];

    chart.graphs = [{
        "balloonText": "x:[[x]] y:[[y]]",
        "bullet": "triangleUp",
        "lineAlpha": 0,
        "xField": "ax",
        "yField": "ay",
        "lineColor": "#FF6600",
        "fillAlphas": 0
    }, {
        "balloonText": "x:[[x]] y:[[y]]",
        "bullet": "triangleDown",
        "lineAlpha": 0,
        "xField": "bx",
        "yField": "by",
        "lineColor": "#FCD202",
        "fillAlphas": 0
    }];

    chart.trendLines = [{
        "finalValue": 11,
        "finalXValue": 12,
        "initialValue": 2,
        "initialXValue": 1,
        "lineColor": "#FF6600"
    }, {
        "finalValue": 19,
        "finalXValue": 12,
        "initialValue": 1,
        "initialXValue": 1,
        "lineColor": "#FCD202"
    }];
    
    var legend = new AmCharts.AmLegend();
    legend = new AmCharts.AmLegend();
    legend.position = "bottom";
    legend.align = "center";
    legend.markerType = "circle";
    legend.maxColumns = 10;
    chart.addLegend(legend);
    
    //chart.write("scatterdiv");

}); 

//    
//function handleClick(event)
//{   var chart = new AmCharts.AmPieChart();
//    chart.valueField = "visits";
//    chart.titleField = "country";
//    chart.dataProvider = chartData;
//    chart.write("chartdiv");
//    chart.addLegend("legend", "chartdiv")
//    alert(event.dataItem.dataContext.country + ": " + event.dataItem.dataContext.visits);
//}
