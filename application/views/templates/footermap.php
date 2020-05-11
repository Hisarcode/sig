</div>
<!-- ./wrapper -->
<!-- REQUIRED SCRIPTS -->
<!-- jQuery Wajib -->
<script src="<?= base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap  Wajib -->
<script src="<?= base_url('assets/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars Tidak Wajib -->
<script src="<?= base_url('assets/') ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App  Wajib -->
<script src="<?= base_url('assets/') ?>dist/js/adminlte.js"></script>

<!-- Leaflet  Wajib -->
<script src="<?= base_url('assets/') ?>plugins/leaflet/leaflet.js"></script>

<script type="text/javascript">
	var map = L.map('mapid').setView([-0.022292, 109.336463], 13);
	var base_url = "<?= base_url() ?>";

	var LayerKita = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
	});

	map.addLayer(LayerKita);

	var popup = L.popup();



	var myFeatureGroup = L.featureGroup().addTo(map).on("mousemove", groupClick);
	var bangunanMarker;

	let _hoverMarker = () => {
		bangunanMarker.on('mousemove', function(e) {
			this.openPopup();
		});
	}

	$.getJSON(base_url + "home/bangunan_json/", function(data) {
		$.each(data, function(i, field) {
			// alert(data[i].bangunan_nama);
			// $("div").append(field + " ");
			var lat = parseFloat(data[i].bangunan_lat);
			var long = parseFloat(data[i].bangunan_long);
			var nama_bg = data[i].bangunan_nama;
			var icon_bangunan = L.icon({
				iconUrl: base_url + 'assets/images/' + data[i].kategori_icon,
				iconSize: [30, 30]
			});

			bangunanMarker = L.marker([lat, long], {
					icon: icon_bangunan,
					riseOnHover: true
				}).addTo(myFeatureGroup)
				.bindPopup(nama_bg);
			_hoverMarker();
			bangunanMarker.nama = nama_bg;

		});
	});

	function groupClick(event) {

	}

	// geojson
	$.getJSON(base_url + "assets/geojson/map.geojson", function(data) {
		geoLayer = L.geoJson(data, {
			style: function(feature) {
				var id = feature.properties.id;
				console.log(feature.properties);
				if (id == 1) {
					return {
						fillOpacity: 0.5,
						weight: 1,
						opacity: 1,
						color: "#fc9d03"
					};
				} else if (id == 2) {
					return {
						fillOpacity: 0.8,
						weight: 1,
						opacity: 1,
						color: "#b5fc03"
					};
				} else if (id == 3) {
					return {
						fillOpacity: 0.5,
						weight: 1,
						opacity: 1,
						color: "#03fcca"
					};
				} else if (id == 4) {
					return {
						fillOpacity: 0.5,
						weight: 1,
						opacity: 1,
						color: "#2403fc"
					};
				} else if (id == 5) {
					return {
						fillOpacity: 0.5,
						weight: 1,
						opacity: 1,
						color: "#ce03fc"
					};
				} else {
					return {
						fillOpacity: 0.5,
						weight: 1,
						opacity: 1,
						color: "#fc1403"
					};
				}


			},
			onEachFeature: function(feature, layer) {
				var latt = parseFloat(feature.properties.latitude)
			}
		}).addTo(map);
	});

	// LEGEND
	function iconByName(name) {
		return '<i class="icon icon-' + name + '"></i>';
	}

	function featureToMarker(feature, latlng) {
		return L.marker(latlng, {
			icon: L.divIcon({
				className: 'marker-' + feature.properties.amenity,
				html: iconByName(feature.properties.amenity),
				iconUrl: '../images/markers/' + feature.properties.amenity + '.png',
				iconSize: [25, 41],
				iconAnchor: [12, 41],
				popupAnchor: [1, -34],
				shadowSize: [41, 41]
			})
		});
	}

	var baseLayers = [{
			name: "OpenStreetMap",
			layer: LayerKita
		},
		{
			name: "OpenCycleMap",
			layer: L.tileLayer('http://{s}.tile.opencyclemap.org/cycle/{z}/{x}/{y}.png')
		},
		{
			name: "Outdoors",
			layer: L.tileLayer('http://{s}.tile.thunderforest.com/outdoors/{z}/{x}/{y}.png')
		}
	];

	var overLayers = [{
		name: "Bar",
		icon: iconByName('bar'),
		layer: new L.geoJson.AJAX(Bar, {
			pointToLayer: featureToMarker
		})
	}];

	var panelLayers = new L.Control.PanelLayers(baseLayers, overLayers);

	map.addControl(panelLayers);
</script>
</body>

</html>