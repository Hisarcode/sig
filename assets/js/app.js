let map;
let baseMaps;
let marker;
let spidol;
let markercari;
let markers = [];
let allmarkers = [];
let latsaya, longsaya;
let latitude;
let longitude;
let id_marker;
let dlat;
let dlng;
let rute;
let lineHav;
let ling;
let layer;
let layerkecamatan, layerjalan, layersungai;
let cari;
let baseLayers;
let groupedLayers;
let layerControl;
let lk, lj, ls;
let cc;
let petunjukArah = $('#petunjukArah');
let ajax;
let formdata;
let msgdata;
let markerClusters;
let ikon;
let highlightStyle;
let highlight;
let markerOptions;
let zoom;
let point;
let name;
let judul;
let judulMarker;
let lyrControl;
let url, urlosm, key, osm;
let jarakHaversine;
let slider;
let warnLoadData;
if (document.body.clientWidth <= 767) {
	let isCollapsed = true;
} else {
	let isCollapsed = false;
}
let loadMap = () => {
	const levelZoom = 13;
	const setViewMap = [-0.0307911, 109.3368668];
	url = 'https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}';
	key = 'pk.eyJ1IjoiYWxpaG9sZGkiLCJhIjoiY2pvcmplZ25sMGc4bDN0cGl0dWF5dWVwcCJ9.UOd4AzMAJ4RmsIkh3Gi10w';
	OpenStreetMap_France = L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png');
	OpenStreetMap_Mapnik = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
	OpenStreetMap_DE = L.tileLayer('https://{s}.tile.openstreetmap.de/tiles/osmde/{z}/{x}/{y}.png');
	OpenStreetMap_HOT = L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png');
	OpenStreetMap_BZH = L.tileLayer('https://tile.openstreetmap.bzh/br/{z}/{x}/{y}.png');
	OpenTopoMap = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png');
	streets = L.tileLayer(url, {
		id: 'mapbox.streets',
		accessToken: key
	}),
		light = L.tileLayer(url, {
			id: 'mapbox.light',
			accessToken: key
		}),
		dark = L.tileLayer(url, {
			id: 'mapbox.dark',
			accessToken: key
		}),
		ss = L.tileLayer(url, {
			id: 'mapbox.streets-satellite',
			accessToken: key
		}),
		comic = L.tileLayer(url, {
			id: 'mapbox.comic',
			accessToken: key
		}),
		outdoors = L.tileLayer(url, {
			id: 'mapbox.outdoors',
			accessToken: key
		}),
		run = L.tileLayer(url, {
			id: 'mapbox.run-bike-hike',
			accessToken: key
		}),
		pencil = L.tileLayer(url, {
			id: 'mapbox.pencil',
			accessToken: key
		}),
		pirates = L.tileLayer(url, {
			id: 'mapbox.pirates',
			accessToken: key
		}),
		emerald = L.tileLayer(url, {
			id: 'mapbox.emerald',
			accessToken: key
		}),
		highcontrast = L.tileLayer(url, {
			id: 'mapbox.high-contrast',
			accessToken: key
		}),
		wheatpaste = L.tileLayer(url, {
			id: 'mapbox.wheatpaste',
			accessToken: key
		});
	map = L.map('map', {
		fullscreenControl: false,
		attributionControl: false,
		zoomControl: false,
		maxZoom: 18,
		minZoom: 8,
		zoom: levelZoom,
		updateWhen: false,
		center: setViewMap,
		layers: [OpenStreetMap_Mapnik],
		renderer: L.canvas(),
		preferCanvas: true
	});

	baseMaps = {
		"Streets": streets,
		"OpenStreetMap.Mapnik": OpenStreetMap_Mapnik,
		"OpenStreetMap.France": OpenStreetMap_France,
		"OpenStreetMap.DE": OpenStreetMap_DE,
		"OpenStreetMap.BZH": OpenStreetMap_BZH,
		"OpenStreetMap.HOT": OpenStreetMap_HOT,
		"OpenTopoMap": OpenTopoMap,
		"Light": light,
		"Dark": dark,
		"Streets-satellite": ss,
		"Comic": comic,
		"Outdoors": outdoors,
		"Run bike hike": run,
		"Pencil": pencil,
		"Pirates": pirates,
		"Emerald": emerald,
		"High Contrash": highcontrast,
		"Wheatpaste": wheatpaste
	};
	lyrControl = L.control.layers(baseMaps).addTo(map);
	// Fungsi untuk zoom out dan zoom in peta
	let zoomControl = L.Control.zoomHome({
		position: "topleft",
		zoomHomeTitle: "Center Map"
	}).addTo(map);

	let layarPenuh = L.control.fullscreen({
		position: 'topleft',
		title: 'Layar Penuh',
		titleCancel: 'Keluar Layar Penuh',
		content: null,
		forceSeparateButton: true
		// forcePseudoFullscreen: true
		// fullscreenElement: true
	}).addTo(map);
	let mouseControl = L.control.mousePosition({
		numDigits: 20,
		emptyString: 'Koordinat'
	}).addTo(map);
	let skala = L.control.scale({
		position: "bottomleft",
		maxWidth: 150,
		metric: true
	}).addTo(map);
	// getLocationLeaflet();
}

loadMap();

let lokasiSaya = L.control.locate({
	position: 'topleft',
	flyTo: true,
	strings: {
		title: "Tampilkan lokasi saya",
		popup: "Lokasi anda sekarang"
	},
	locateOptions: {
		maxZoom: 16,
		enableHighAccuracy: true,
		watch: false
	},
	icon: "fa fa-fw fa-location-arrow",
	clickBehavior: {
		outOfView: 'setView'
	},
	onLocationError: onLocationError
}).addTo(map);

lokasiSaya.start();
getLocationLeaflet();

let checkBtn = `<div class="bg-teal p-1 rounded-sm">
<span class="text-justify"><strong>Layer</strong></span>
<hr class="mt-0 mb-0">
<label>
<div>
<input type="checkbox" id="lyrKecamatan"> Kecamatan
</div>
</label>
<label>
<div>
<input type="checkbox" id="lyrJalan"> Jalan
</div>
</label>
<label>
<div>
<input type="checkbox" id="lyrSungai"> Sungai
</div>
</label>
</div>`;

$('.leaflet-control-layers-base').append(checkBtn);

map.createPane("paneKecamatan");
map.createPane("paneJalan");
// map.createPane("lyrSungai");

$('#lyrKecamatan').on('click', function (e) {
	let lc = $('#lc');
	if (this.checked) {
		$('#sldOpacity').val('0.3');
		$('#image-opacity').html('0.3');
		lc.fadeIn('fast');
		onLayerKecamatan();
	} else {
		lc.fadeOut('fast');
		offLayerKecamatan();
	};
});

$('#lyrJalan').on('click', function (e) {
	let lj = $('#lj');
	if (this.checked) {
		lj.fadeIn('fast');
		onLayerJalan();
	} else {
		lj.fadeOut('fast');
		offLayerJalan();
	};
});
$('#lyrSungai').on('click', function (e) {
	let ls = $('#ls');
	if (this.checked) {
		ls.fadeIn('fast');
		onLayerSungai();
	} else {
		ls.fadeOut('fast');
		offLayerSungai();
	};
});

$('#tutup-pencarian').on('click', function () {
	$('#features').show();
	map.setZoom(13);
	// semuaLokasi.prop('checked', false);
	divLegend.show();
	boxData.hide('fast');
	inputKeys.val("");
	inputJenis.val("");
	if (inputJenis.val("")) {
		inputJarak.val("");
		inputJarak.attr('disabled', true);
	}
	home();

});
$('#tutup-aja').on('click', function () {
	$('#features').fadeIn();
	map.setZoom(13);
	hapusRute();
	divLegend.fadeIn('slow');
	boxData.hide('fast');
	inputKeys.val("");
	inputJenis.val("");
	if (inputJenis.val("")) {
		inputJarak.val("");
		inputJarak.attr('disabled', true);
	}
	// home();

});

let home = () => {
	_cekMarkerClusters();
	markerArray();
	highlight.clearLayers();
}

let onLayerKecamatan = () => {
	layerkecamatan = new L.GeoJSON.AJAX(['data/adm_pontianak.geojson'], {
		style: getStyleKecamatan,
		onEachFeature: onEachFeatureKecamatan,
		pane: 'paneKecamatan'
	}).addTo(map);
}

let getStyleKecamatan = (feature) => {
	return {
		fillOpacity: 0.3,
		color: "white",
		dashArray: '3',
		weight: 1,
		opacity: 0.3,
		fillColor: getColorKecamatan(feature.properties.kode)
	};
}
let getColorKecamatan = (kode) => {
	return kode == 1 ? 'red' :
		kode == 2 ? 'orange' :
			kode == 3 ? 'blue' :
				kode == 4 ? 'yellow' :
					kode == 5 ? 'purple' :
						'green';
};

let onEachFeatureKecamatan = (feature, layer) => {
	text = `<i class="fas fa-caret-left mr-1" style="color:red"></i><span class="text-uppercase">${feature.properties.KECAMATAN}</span>`;
	layer.bindTooltip(text, {
		permanent: true,
		direction: "center",
		className: "kecamatan animated fadeIn"
	});
	let visible;
	map.on('zoomend', function (e) {
		if (map.getZoom() >= 13) {
			if (!visible) {
				layerkecamatan.eachLayer(function (layer) {
					// layer.showLabel();
					$(".leaflet-tooltip.kecamatan").css({
						"display": "block",
						"fontSize": "12px"
					});
					layer.openTooltip();

				});
				visible = true;
			}
		} else {
			if (visible) {
				layerkecamatan.eachLayer(function (layer) {
					$(".leaflet-tooltip.kecamatan").css({
						"display": "none",
						"transition": "0.3s"
					});
					// layer.hideLabel();
					layer.closeTooltip();
				});
				visible = false;
			}
		}
	});
}

let offLayerKecamatan = () => {
	map.removeLayer(layerkecamatan);
}


slider = L.control({
	position: 'topleft'
});
slider.onAdd = function (map) {

	let div = L.DomUtil.create('div', 'info-legend'); {
		div.innerHTML += `
		<div class="container-fluid" id="cf">
		<div class="row pt-2" id="lc" style="display:none">
		<div class="col-sm-12">
		<form>
		<div class="form-group form-opacity">
		<p>Set Opacity : <span class="font-italic" id="image-opacity">0.3</span></p>
		<input type="range" id="sldOpacity" class="slider" min="0" max="1" step="0.1" value="0.3">
		</div>
		</form>
		<div class="dropdown-divider"></div>
		<small class="card-title text-muted">Layer Kecamatan</small>
		<div class="mb-1"><i class="fas fa-square-full mr-2" style="color:red;opacity: 0.5"></i>Pontianak Barat</div>
		<div class="mb-1"><i class="fas fa-square-full mr-2" style="color:orange;opacity: 0.5"></i>Pontianak Kota</div>
		<div class="mb-1"><i class="fas fa-square-full mr-2" style="color:blue;opacity: 0.5"></i>Pontianak Selatan</div>
		<div class="mb-1"><i class="fas fa-square-full mr-2" style="color:yellow;opacity: 0.5"></i>Pontianak Tenggara</div>
		<div class="mb-1"><i class="fas fa-square-full mr-2" style="color:purple;opacity: 0.5"></i>Pontianak Timur</div>
		<div class="mb-1"><i class="fas fa-square-full mr-2" style="color:green;opacity: 0.5"></i>Pontianak Utara</div>
		</div>
		</div>
		<div class="row pt-2" id="lj" style="display:none">
		<div class="col-sm-12">
		<small class="card-title text-muted">Layer Jalan</small>
		<div class="mb-1"><i class="fas fa-minus mr-2" style="color:#d10209;opacity: 0.8"></i>Jalan Nasional</div>
		<div class="mb-1"><i class="fas fa-minus mr-2" style="color:#cc5c06;opacity: 0.8"></i>Jalan Provinsi</div>
		<div class="mb-1"><i class="fas fa-minus mr-2" style="color:#c9b904;opacity: 0.8"></i>Jalan Kota</div>
		<div class="mb-1"><i class="fas fa-minus mr-2" style="color:#158000;opacity: 0.8"></i>Tidak diketahui</div>
		</div>
		</div>
		<div class="row pt-2" id="ls" style="display:none">
		<div class="col-sm-12">
		<small class="card-title text-muted">Layer Jalan</small>
		<div class="mb-1"><i class="fas fa-square-full mr-2" style="color:#1ef1e4;opacity: 1"></i> Sungai Kapuas</div>
		</div>
		</div>
		</div>
		`;
	}
	return div;
};
slider.addTo(map);

warnLoadData = L.control({
	position: 'bottomright'
});
warnLoadData.onAdd = (map) => {
	let div = L.DomUtil.create('div', 'alert alert-ajax p-2');
	div.innerHTML += `Ada kesalahan saat memuat data`;
	return div;
}

let sentuh = L.DomUtil.get('cf');
if (!L.Browser.touch) {
	L.DomEvent.disableClickPropagation(sentuh);
	L.DomEvent.on(sentuh, 'mousewheel', L.DomEvent.stopPropagation);
} else {
	L.DomEvent.on(sentuh, 'click', L.DomEvent.stopPropagation);
}


$(document).on('change', '#sldOpacity', function (e) {
	$('#image-opacity').html(this.value);
	layerkecamatan.setStyle({
		fillOpacity: this.value,
		opacity: this.value
	})
});


let onLayerJalan = () => {
	layerjalan = new L.GeoJSON.AJAX(['data/road.geojson'], {
		style: getStyleJalan,
		onEachFeature: onEachFeatureJalan,
		pane: 'paneJalan'
	}).addTo(map);
}

let getStyleJalan = (feature) => {
	return {
		weight: 1.5,
		opacity: 1,
		color: getColorJalan(feature.properties.status_jal)
	};
}
let getColorJalan = (status_jal) => {
	return status_jal == 'Nasional' ? '#d10209' :
		status_jal == 'Provinsi' ? 'darkblue' :
			status_jal == 'Kota' ? 'orange' :
				'#fff';
}

let onEachFeatureJalan = (feature, layer) => {
	layer.on({
		mousemove: mousemove,
		mouseout: mouseout
	});
}

let popupJalan = new L.Popup({
	autoPan: false,
	className: 'pop-jalan'
});

let closeTooltip;

let mousemove = (e) => {
	let layer = e.target;
	popupJalan.setLatLng(e.latlng);
	popupJalan.setContent(`
		<span>${layer.feature.properties.nama_jalan}</span><br><span>Status jalan : ${layer.feature.properties.status_jal || `<em>Tidak ada</em>`}</span>
		`);

	if (!popupJalan._map) popupJalan.openOn(map);
	window.clearTimeout(closeTooltip);
	layer.setStyle({
		weight: 3,
		color: '#00ffff'
	});

	// if (!L.Browser.ie && !L.Browser.opera) {
	// 	layer.bringToFront();
	// }
}

let mouseout = (e) => {
	layerjalan.resetStyle(e.target);
	closeTooltip = window.setTimeout(function () {
		map.closePopup();
	}, 100);
}

let offLayerJalan = () => {
	map.removeLayer(layerjalan);
}

let onLayerSungai = () => {
	layersungai = new L.GeoJSON.AJAX('data/sungai.geojson', {
		style: getStyleSungai,
		onEachFeature: onEachFeatureSungai
	}).addTo(map);
}

let getStyleSungai = (feature) => {
	return {
		weight: 1,
		opacity: 1,
		dashArray: '2',
		fillOpacity: 4,
		color: '#1ef1e4'
	}
}

let onEachFeatureSungai = (feature, layer) => {
	let text = `<strong>` + feature.properties.Name + `</strong>`;
	let popupText = text.toUpperCase();

	layer.bindTooltip(popupText, {
		sticky: true,
	});

	layer.on('mouseover', function () {
		layer.openTooltip();
	});
}

let offLayerSungai = () => {
	map.removeLayer(layersungai);
}

petunjukArah.click(function () {
	hitungJarak();
});
let hitungJarak = () => {
	if (rute) {
		map.removeControl(rute);
	}
	if (lineHav) {
		map.removeControl(lineHav);
	}
	let latme = latsaya;
	let lngme = longsaya;
	let tampilJarak = `${jarakHaversine} KM`;
	let latlngs = [
		[latme, lngme],
		[latitude, longitude]
	];
	lineHav = L.polyline(latlngs, {
		color: 'blue',
		weight: 2,
		opacity: 1,
		dashArray: '4'
	}).addTo(map);
	lineHav.bindTooltip(`${tampilJarak}`, {
		permanent: true,
		direction: 'auto',
		opacity: 1,
		className: 'tooltip-jarak'
	});
	// lineHav.on('mouseover', function() { lineHav.openTooltip(); });
	rute = L.Routing.control({
		waypoints: [
			L.latLng(latme, lngme),
			L.latLng(latitude, longitude)
		],
		//  router: L.Routing.esri({
		//   liveTraffic: true,
		//   profile: 'Driving',
		//   serviceUrl: 'https://utility.arcgis.com/usrsvcs/appservices/MKOl7agcdgqphswv/rest/services/World/Route/NAServer/Route_World/solve'

		// }),
		containerClassName: 'fix',
		routeWhileDragging: false,
		reverseWaypoints: true,
		fitSelectedRoutes: false,
		waypointMode: 'snap',
		addWaypoints: false,
		draggableWaypoints: false,
		showAlternatives: true,
		collapsible: true,
		altLineOptions: {
			styles: [
				{ color: 'black', opacity: 0.15, weight: 9 },
				{ color: 'white', opacity: 0.8, weight: 6 },
				{ color: 'red', opacity: 1, weight: 2 }
			]

		},
		lineOptions: {
			styles: [
				{ color: 'black', opacity: 0.15, weight: 9 },
				{ color: 'white', opacity: 0.8, weight: 6 },
				{ color: 'darkblue', opacity: 1, weight: 2 }
			]
		},
		createMarker: function () {
			return null;
		},
		router: L.Routing.mapbox('pk.eyJ1IjoiYWxpaG9sZGkiLCJhIjoiY2pvcmplZ25sMGc4bDN0cGl0dWF5dWVwcCJ9.UOd4AzMAJ4RmsIkh3Gi10w')
	}).addTo(map);

}

let hapusRute = () => {
	if (rute) {
		map.removeControl(rute);
	}
	if (lineHav) {
		map.removeControl(lineHav);
	}
	if (ling) {
		map.removeLayer(ling);
	}
	highlight.clearLayers();
	map.closePopup();
}

$("#kembali").click(function (e) {
	hapusRute();
	map.setZoom(13);
	boxDetail.hide();
	boxData.show();
});

let inputKosong = () => {
	required.show();
	required.html(`Harap isi bidang pencarian !`);
}

const boxDetail = $('.box-detail');
const boxData = $('.box-data');
const btnCari = $('#caribykeyword');
const inputKeys = $('#keyword');
const required = $('.validasi-pencarian');
const loadingSidebar = $('#loading');
const judulDetail = $('.judul-detail');
const divLegend = $('.panel-legenda');
const liveSearch = $('.box-livesearch');
const noResult = $('.not-found');
const inputJenis = $('#jenis');
const inputJarak = $('#jarak');
const judulData = $('.judul-data');

btnCari.click(function () {
	if (inputKeys.val() == '') {
		inputKosong();
		setTimeout(function () {
			required.fadeOut('fast');
		}, 2000);
		return false;
	} else {
		boxDetail.hide();
		cariByKeyword();
	}
});

inputKeys.keypress(function (event) {
	if (event.which == 13) {
		if (inputKeys.val() == '') {
			inputKosong();
			setTimeout(function () {
				required.fadeOut('fast');
			}, 2000);
			return false;
		} else {
			event.preventDefault();
			cariByKeyword();
		}
	}
});

let cariByKeyword = () => {
	hapusRute();
	_cekMarkerClusters();
	markerArray();

	$('#jarak, #jenis').val("");
	if (inputJenis.val() == "") {
		inputJarak.attr('disabled', true);
	} else {
		inputJarak.attr('disabled', false);
	}

	let position = encodeURI(latsaya + "," + longsaya);
	let keyword = inputKeys.val();
	// let ambilLokasiUser = latsaya + "," + longsaya;
	let UrlCari = "source/cari_keyword.php";
	// let mydata = "position=" + encodeURI(ambilLokasiUser) + "&keyword=" + keyword;
	$.ajax({
		url: UrlCari,
		data: {
			keyword: keyword,
			position: position
		},
		dataType: 'json',
		cache: false,
		beforeSend: () => {
			delMarkerChecks();
			map.spin(true, { color: 'teal' });
			judulDetail.hide();
			loadingSidebar.show();
		},
		success: (data) => {
			$('#feature-list, #konten').empty();
			$('#features').hide();
			warnLoadData.remove(map);
			judulDetail.hide();
			divLegend.hide();
			map.setZoom(13);
			map.spin(false);
			let totaldata = data.length;
			let i = 0;
			if (totaldata == 0) {
				liveSearch.hide('fast');
				noResult.fadeIn('fast');
			} else {
				for (; i < totaldata; i++) {
					msgdata = data[i];
					_tampilMarker();
					_hoverMarker();
					_klikMarker();
					_pushMarker();
					noResult.fadeOut('fast');
					liveSearch.show('fast');

				}
				noResult.fadeOut('fast');
				liveSearch.show('fast');
			} //akhir dari looping
			_klikList();
			_hoverList();
			_onMouseOut();
			judulData.html(`${totaldata} Hasil pencarian dengan keyword <strong>${keyword}</strong>`);
			boxData.show();
			divLegend, loadingSidebar.hide();
		},
		error: () => {
			warnLoadData.addTo(map);
			map.spin(false);
			loadingSidebar.hide();
		}
	});
}

if (inputJenis.val("")) {
	inputJarak.attr('disabled', true);
}

// pilih jenis 
inputJenis.change(function () {
	inputJarak.val("");
	if (inputJenis.val() == "") {
		inputJarak.attr('disabled', true);
	} else {
		inputJarak.attr('disabled', false);
	}
});

// pilih radius
inputJarak.change(function () {
	cariByRadius();
});

let cariByRadius = () => {
	hapusRute();
	_cekMarkerClusters();
	markerArray();
	let kategori = inputJenis.val();
	let namaKategori = $("#jenis option:selected").text();
	let jarak = inputJarak.val();
	// let ambilLokasiUser = latsaya + "," + longsaya;
	let position = encodeURI(latsaya + "," + longsaya);
	let url = "source/cari_radius.php";
	// let mydata = "position=" + encodeURI(ambilLokasiUser) + "&id_kategori=" + jenis + "&jarak=" + jarak;
	$.ajax({
		url: url,
		data: {
			kategori: kategori,
			jarak: jarak,
			position: position
		},
		dataType: 'json',
		cache: true,
		beforeSend: () => {
			map.spin(true, { color: 'teal' });
			inputKeys.val("");
			judulDetail.hide();
			loadingSidebar.show();
		},
		success: (data) => {
			$('#feature-list, #konten').empty();
			$('#features').hide();
			warnLoadData.remove(map);
			map.setZoom(13);
			map.spin(false);
			let totaldata = data.length;
			if (totaldata == 0) {
				liveSearch.hide('fast');
				noResult.fadeIn('fast');
			} else {
				let i = 0;
				for (; i < totaldata; i++) {
					msgdata = data[i];
					_tampilMarker();
					_hoverMarker();
					_klikMarker();
					_pushMarker();
					noResult.fadeOut('fast');
					liveSearch.show('fast');

				}
			} //akhir dari looping
			_klikList();
			_hoverList();
			_onMouseOut();

			judulData.html(`${totaldata} lokasi <span class="text-lowercase">${namaKategori}<span> dengan radius ${jarak} Km`);
			boxData.show();
			divLegend.hide();
			loadingSidebar.hide();
		},
		error: () => {
			warnLoadData.addTo(map);
			map.spin(false);
			loadingSidebar.hide();
		}
	});
}


function onLocationFound(e) {
	$('.geolocation-error').modal('hide');
	let location = e.latlng;
	latsaya = location.lat;
	longsaya = location.lng;
	// let userIcon = L.icon({
	// 	iconUrl: `img/you-are-here.png`,
	// 	iconSize: [40, 45],
	// });
	// L.marker(e.latlng, {
	// 	icon: userIcon
	// }).addTo(map)
	// .bindTooltip("Lokasi anda", {
	// 	sticky: true,
	// 	opacity: 2,
	// 	direction: 'top'
	// })
}

function onLocationError() {
	$('.geolocation-error').modal({
		keyboard: false,
		backdrop: 'static'
	});
}


function getLocationLeaflet() {
	map.on('locationfound', onLocationFound);
	// map.on('locationerror', onLocationError);
	// map.locate({
	//     setView: true,
	//     maxZoom: 13,
	//     enableHighAccuracy: true
	// });
}

// FUNGSI TAMPIL MARKER
let _tampilMarker = () => {
	floatjarak = parseFloat(msgdata.jarak);
	point = new L.LatLng(parseFloat(msgdata.latitude), parseFloat(msgdata.longitude));
	ikon = L.icon({
		iconUrl: `admin/img/${msgdata.marker}`,
		iconSize: [20, 25],
		iconAnchor: [10, 25],
		popupAnchor: [0, -25]
	});
	let parseJarak = parseFloat(msgdata.jarak).toFixed(2);
	markerOptions = {
		icon: ikon,
		point_id: msgdata.id_lokasi,
		nama: msgdata.nama,
		custom: msgdata.popupclass,
		dist: parseFloat(msgdata.jarak),
		riseOnHover: true
	}
	let locationContent = `
		<div class="media p-2 rounded-sm" data-mark="${msgdata.id_lokasi}" lat="${msgdata.latitude}" lng="${msgdata.longitude}" data-nama="${msgdata.nama}" distance="${parseJarak}" tipclass="${msgdata.popupclass}">
		<div class="media-body pl-1">
		<h4 class="media-heading text-muted">${msgdata.nama}</h4>
		<small>${msgdata.alamat}</small><br>
		<small>${msgdata.jarak}</small><br>
		</div>
		<div class="media-right">
		<a href="javascript:void()">
		<img class="media-object rounded-sm" src="admin/img/${msgdata.gambar}" onError="this.onerror=null;this.src='admin/img/no-image/no-image.svg';"">
		</a>
		</div>
		</div>`;
	marker = new L.marker(point, markerOptions).addTo(map);
	marker.bindPopup(`${msgdata.nama}`, {
		maxWidth: 500,
		className: `${msgdata.popupclass}`,
		closeButton: true
	});
	markers[marker.options.point_id] = marker;
	$("#feature-list").append(locationContent);
	$("#feature-list").pagify(7, ".media");
}

function _klikMarker() {
	marker.on('click', function (e) {
		nama = this.options.nama;
		customClass = this.options.popupclass;
		id_marker = this.options.point_id;
		latitude = e.latlng.lat;
		longitude = e.latlng.lng;
		jarakHaversine = floatjarak.toFixed(2);
		dlat = latitude;
		dlng = longitude;
		this.openPopup();
		boxData.hide();
		$('#kembali').show();
		$('#tutup-aja').hide();
		map.flyTo([latitude, longitude], 18, {
			animate: true,
			duration: 1
		});
		_detailLokasi();
		highlight.clearLayers().addLayer(L.circleMarker([latitude, longitude], highlightStyle)).addTo(map);
	});
}

function _klikSpidol() {
	spidol.on('click', function (e) {
		nama = this.options.nama;
		customClass = this.options.popupclass;
		id_marker = this.options.point_id;
		latitude = e.latlng.lat;
		longitude = e.latlng.lng;
		jarakHaversine = floatjarak.toFixed(2);
		dlat = latitude;
		dlng = longitude;
		this.openPopup();
		$('#feature-list, #konten').empty();
		$('#features').hide();
		$('#kembali').hide();
		$('#tutup-aja').show();
		divLegend.hide();
		map.flyTo([latitude, longitude], 18, {
			animate: true,
			duration: 1
		});
		_detailLokasi();
		// highlight.clearLayers().addLayer(L.circleMarker([latitude, longitude], highlightStyle)).addTo(map);
	});

}

let _klikList = (e) => {
	$('#feature-list').on('click', '.media', function (e) {
		name = $(this).attr('data-nama');
		latitude = $(this).attr('lat');
		tipclass = $(this).attr('tipclass');
		id_marker = $(this).attr('data-mark');
		longitude = $(this).attr('lng');
		jarakHaversine = $(this).attr('distance');
		xpop(id_marker);
		// $(document).off("mouseout", "#feature-list", clearHighlight);
		map.flyTo([latitude, longitude], 18, {
			animate: true,
			duration: 1
		});
		$('#kembali').show();
		$('#tutup-aja').hide();
		boxData.hide();
		_detailLokasi();
		markerFunction($(this).attr('data-mark'));
		judul = markers[id_marker].bindPopup(`${name}`, { className: `${tipclass}`, closeButton: true });
		highlight.clearLayers().addLayer(L.circleMarker([latitude, longitude], highlightStyle)).addTo(map);
	});
}

let _cekMarkerClusters = () => {
	if (markerClusters) {
		map.removeLayer(markerClusters);
	}
}

let markerArray = () => {
	for (let x = 0; x < allmarkers.length; x++) {
		map.removeLayer(allmarkers[x]);
	}
}

highlight = L.geoJson(null);
highlightStyle = {
	stroke: false,
	fillColor: "#00FFFF",
	fillOpacity: 0.9,
	radius: 10,
	className: 'shadow-lg'
};

let _onMouseOut = (e) => {
	$('#feature-list').on('mouseout', '.media', function (e) {
		xpop($(this).attr('data-mark'));
		// highlight.clearLayers();
	});
}

function _hoverList() {
	$('#feature-list').on('mouseover', '.media', function (e) {
		console.log('oke')
		markerFunction($(this).attr('data-mark'));
		highlight.clearLayers().addLayer(L.circleMarker([$(this).attr("lat"), $(this).attr("lng")], highlightStyle)).addTo(map);
	});
}

function markerFunction(id) {
	markers[id].openPopup();
}

function xpop(id) {
	markers[id].closePopup();
}

function clearHighlight(e) {
	xpop($('#feature-list').attr('data-mark'));
	highlight.clearLayers();
}

let hideBoxData = () => {
	boxData.hide();
}

let _pushMarker = () => {
	allmarkers.push(marker);
}

let _hoverMarker = () => {
	marker.on('mousemove', function (e) {
		this.openPopup();
	});
}

let _detailLokasi = () => {
	let data = "id=" + id_marker;
	let url = 'source/detail_lokasi.php';
	$.ajax({
		url: url,
		type: 'POST',
		data: data,
		beforeSend: function () {
			loadingSidebar.show();
		},
		success: function (results) {
			loadingSidebar.hide();
			judulDetail.fadeIn('fast');
			boxDetail.fadeIn('fast');
			$("#konten").html(results);
			$('img.card-img-top').on('error', function () {
				$(this).attr('src', 'admin/img/no-image/no-image.svg');
			});
			$(".img-tabel").justlightbox();
		},
		error: function () {
			loadingSidebar.hide();

		}
	});

}

let container = $(".leaflet-control-layers")[0];
if (!L.Browser.touch) {
	L.DomEvent
		.disableClickPropagation(container)
		.disableScrollPropagation(container);
} else {
	L.DomEvent.disableClickPropagation(container);
}

let pagify = {
	items: {},
	container: null,
	totalPages: 1,
	perPage: 3,
	currentPage: 0,
	createNavigation: function () {
		this.totalPages = Math.ceil(this.items.length / this.perPage);
		$('.pagination', this.container.parent()).remove();
		let pagination = $('<ul class="pagination mb-5"></ul>').append(`<li class="tombol prev disabled" data-next="false"><a><i class="fas fa-angle-double-left"></i></a>
    					</li>`);

		// for (var i = 0; i < this.totalPages; i++) {
		// 	data = this.length;
		// 	console.log(data);
		// 	// var pageElClass = "page";
		// 	// if (!i)
		// 	// 	pageElClass = "page current";
		// 	// var pageEl = '<a class="' + pageElClass + '" data-page="' + (
		// 	// i + 1) + '">' + (
		// 	// i + 1) + "</a>";
		// 	// pagination.append(`<li>${pageEl}</li>`);
		// }
		pagination.append('<li class="tombol next" data-next="true"><a><i class="fas fa-angle-double-right"></i></a></li>');

		this.container.after(pagination);

		var that = this;
		$("body").off("click", ".tombol");
		this.navigator = $("body").on("click", ".tombol", function () {
			var el = $(this);
			that.navigate(el.data("next"));
		});

		$("body").off("click", ".page");
		this.pageNavigator = $("body").on("click", ".page", function () {
			var el = $(this);
			that.goToPage(el.data("page"));
		});
	},
	navigate: function (next) {
		// default perPage to 5
		if (isNaN(next) || next === undefined) {
			next = true;
		}
		$(".pagination .tombol").removeClass("disabled");
		if (next) {
			this.currentPage++;
			if (this.currentPage > (this.totalPages - 1))
				this.currentPage = (this.totalPages - 1);
			if (this.currentPage == (this.totalPages - 1))
				$(".pagination .tombol.next").addClass("disabled");
		} else {
			this.currentPage--;
			if (this.currentPage < 0)
				this.currentPage = 0;
			if (this.currentPage == 0)
				$(".pagination .tombol.prev").addClass("disabled");
		}

		this.showItems();
	},
	// updateNavigation: function() {

	// 	var pages = $(".pagination .page");
	// 	pages.removeClass("current");
	// 	$('.pagination .page[data-page="' + (
	// 	this.currentPage + 1) + '"]').addClass("current");
	// },
	goToPage: function (page) {

		this.currentPage = page - 1;

		$(".pagination .tombol").removeClass("disabled");
		if (this.currentPage == (this.totalPages - 1))
			$(".pagination .tombol.next").addClass("disabled");

		if (this.currentPage == 0)
			$(".pagination  .tombol.prev").addClass("disabled");
		this.showItems();
	},
	showItems: function () {
		this.items.hide();
		var base = this.perPage * this.currentPage;
		this.items.slice(base, base + this.perPage).show();

		// this.updateNavigation();
	},
	init: function (container, items, perPage) {
		this.container = container;
		this.currentPage = 0;
		this.totalPages = 1;
		this.perPage = perPage;
		this.items = items;
		this.createNavigation();
		this.showItems();
	}
};

// stuff it all into a jQuery method!
$.fn.pagify = function (perPage, itemSelector) {
	let el = $(this);
	let items = $(itemSelector, el);
	// default perPage to 5
	if (isNaN(perPage) || perPage === undefined) {
		perPage = 3;
	}
	// don't fire if fewer items than perPage
	if (items.length <= perPage) {
		return true;
	}
	pagify.init(el, items, perPage);
};


let katmarkers = [];
let markerCheck = [];
$(".perkategori").on('change', function (e) {
	if ($(this).is(":checked")) {
		let cekdata = $(this).val();
		let position = encodeURI(latsaya + "," + longsaya);
		let url = "source/tampil_perkategori.php";
		$.ajax({
			url: url,
			data: {
				cekdata: cekdata,
				position: position
			},
			dataType: 'json',
			cache: true,
			beforeSend: () => {
				map.spin(true, { color: 'teal' });
			},
			success: (data) => {
				map.spin(false);
				map.setZoom(13);
				let totaldata = data.length;
				let i = 0;
				for (; i < totaldata; i++) {
					msgdata = data[i];
					floatjarak = parseFloat(msgdata.jarak);
					point = new L.LatLng(parseFloat(msgdata.latitude), parseFloat(msgdata.longitude));
					ikon = L.icon({
						iconUrl: `admin/img/${msgdata.marker}`,
						iconSize: [20, 25],
						iconAnchor: [10, 25],
						popupAnchor: [0, -25]
					});
					markerOptions = {
						icon: ikon,
						point_id: msgdata.id_lokasi,
						nama: msgdata.nama,
						custom: msgdata.popupclass,
						dist: parseFloat(msgdata.jarak),
						IdKategori: msgdata.id_kategori,
						riseOnHover: true
					}
					spidol = new L.marker(point, markerOptions);
					// katmarkers[spidol.options.point_id] = spidol;
					katmarkers.push(spidol);
					markerCheck.push(spidol);
					map.addLayer(spidol);
					spidol.bindPopup(`${msgdata.nama}`, {
						maxWidth: 500,
						className: `${msgdata.popupclass}`,
						closeButton: true
					});
					_klikSpidol();

					spidol.on('mousemove', function (e) {
						this.openPopup();
					});
				}
				// boxData.show();
				loadingSidebar.hide();
			},
			error: () => {
				map.spin(false);
			}
		});
	} else if ($(this).is(":not(:checked)")) {
		for (let x = 0; x < katmarkers.length; x++) {
			let isVal = katmarkers[x].options;
			if (isVal.IdKategori == $(this).val()) {
				map.removeLayer(katmarkers[x]);
			}
		}
	}
});

let delMarkerChecks = () => {
	$('.perkategori').prop('checked', false);
	for (let mc = 0; mc < markerCheck.length; mc++) {
		map.removeLayer(markerCheck[mc]);
	}
}

window.onload = () => {
	let wh = document.querySelector('[alt="www.000webhost.com"]').parentNode.parentNode;
	wh.parentNode.removeChild(wh);
}