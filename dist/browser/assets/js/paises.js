function Paises(series) {
    var dataset = {};

    var onlyValues = series.map(function(obj){ return obj[1]; });
	var minValue = Math.min.apply(null, onlyValues),
	    maxValue = Math.max.apply(null, onlyValues);

	var paletteScale = d3.scale.linear()
	    .domain([minValue,maxValue])
	    .range(["#EFEFFF","#02386F"]); // blue color

	series.forEach(function(item){ //
	    var iso = item[0],
	        value = item[1];
	    dataset[iso] = { numberOfThings: value, fillColor: paletteScale(value) };
	});

	new Datamap({
	    element: document.getElementById('paises'),
	    projection: 'mercator', // big world map
	        // countries don't listed in dataset will be painted with this color
	    fills: { defaultFill: '#F5F5F5' },
	    data: dataset,
	    geographyConfig: {
	        borderColor: '#DEDEDE',
	        highlightBorderWidth: 2,
	            // don't change color on mouse hover
	        highlightFillColor: function(geo) {
	            return geo['fillColor'] || '#F5F5F5';
	        },
	            // only change border
	        highlightBorderColor: '#B7B7B7',
	            // show desired information in tooltip
	        popupTemplate: function(geo, data) {
	                // don't show tooltip if country don't present in dataset
	            if (!data) { return ; }
	                // tooltip content
	            return ['<div class="hoverinfo">',
	                '<strong>', geo.properties.name, '</strong>',
	                '<br>Visitas: <strong>', data.numberOfThings, '</strong>',
	                '</div>'].join('');
	        }
	    }
	});
}