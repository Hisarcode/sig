let latsaya, longsaya;
let highlight;
let base_url = "http://localhost/eduponmaps/";
const loadingSidebar = $('#loading');
const judulDetail = $('.judul-detail');
const boxDetail = $('.box-detail');
// const sidebarTable = $('.sidebar-table');
const btnCari = $('#caribykeyword');
const required = $('.validasi-pencarian');
const noResult = $('.not-found');
const inputKeys = $('#keyword');
const liveSearch = $('.box-livesearch');
const judulData = $('.judul-data');
const boxData = $('.box-data');

let markers = [];
let allmarkers = [];
let warnLoadData;

let rute;
let petunjukArah = $('#petunjukArah');


let _hoverMarker = () => {
    marker.on('mousemove', function (e) {
        this.openPopup();
    });
}
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

warnLoadData = L.control({
    position: 'bottomright'
});
warnLoadData.onAdd = (map) => {
    let div = L.DomUtil.create('div', 'alert alert-ajax p-2');
    div.innerHTML += `Ada kesalahan saat memuat data`;
    return div;
}

// Inisialisasi atribut atribut loading 
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
    map = L.map('mapid', {
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

    /* let layarPenuh = L.control.fullscreen({
        position: 'topleft',
        title: 'Layar Penuh',
        titleCancel: 'Keluar Layar Penuh',
        content: null,
        forceSeparateButton: true
        // forcePseudoFullscreen: true
        // fullscreenElement: true
    }).addTo(map); */

    /*     let mouseControl = L.control.mousePosition({
            numDigits: 20,
            emptyString: 'Koordinat'
        }).addTo(map); */

    let mouseControl = L.control.coordinates({
        position: "bottomleft",
        decimals: 5,
        decimalSeperator: ",",
        labelTemplateLat: "Latitude: {y}",
        labelTemplateLng: "Longitude: {x}"
    }).addTo(map);

    let skala = L.control.scale({
        position: "bottomleft",
        maxWidth: 150,
        metric: true
    }).addTo(map);
    // getLocationLeaflet();
}
// load map
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

let _pushMarker = () => {
    allmarkers.push(marker);
}



function onLocationError() {
    $('.geolocation-error').modal({
        keyboard: false,
        backdrop: 'static'
    });
}

//layer 
let checkBtn = `<div class="bg-teal p-1 rounded-sm">
<span class="text-justify"><strong>Layer</strong></span>
<hr class="mt-0 mb-0">
<label>
<div>
<input type="checkbox" id="lyrKecamatan"> Kecamatan
</div>
</label>
<label>`;

$('.leaflet-control-layers-base').append(checkBtn);

map.createPane("paneKecamatan");


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


// layer kecamatan
let onLayerKecamatan = () => {
    layerkecamatan = new L.GeoJSON.AJAX([base_url + 'assets/geojson/map.geojson'], {
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
        fillColor: getColorKecamatan(feature.properties.id)
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

let getNamaKecamatan = (kode) => {
    return kode == 1 ? 'Pontianak Kota' :
        kode == 2 ? 'Pontianak Selatan' :
            kode == 3 ? 'Pontianak Timur' :
                kode == 4 ? 'Pontianak Barat' :
                    kode == 5 ? 'Pontianak Utara' :
                        'Pontianak Tenggara';
};

let onEachFeatureKecamatan = (feature, layer) => {
    text = `<i class="fas fa-caret-left mr-1" style="color:red"></i><span class="text-uppercase">${getNamaKecamatan(feature.properties.id)}</span>`;
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


let _detailLokasi = () => {
    let data = "id=" + id_marker;
    let url = 'home/detail_bangunan_json';
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

function _klikSpidol() {
    spidol.on('click', function (e) {
        nama = this.options.nama;
        // customClass = this.options.popupclass;
        id_marker = this.options.point_id;
        latitude = e.latlng.lat;
        longitude = e.latlng.lng;
        // jarakHaversine = floatjarak.toFixed(2);
        dlat = latitude;
        dlng = longitude;
        this.openPopup();
        $('#feature-list, #konten').empty();
        $('#features').hide();
        $('#kembali').hide();
        $('#tutup-aja').show();
        map.flyTo([latitude, longitude], 16, {
            animate: true,
            duration: 1
        });
        _detailLokasi();
        // highlight.clearLayers().addLayer(L.circleMarker([latitude, longitude], highlightStyle)).addTo(map);
    });

}

let katmarkers = [];
let markerCheck = [];
$(".perkategori").on('change', function (e) {
    if ($(this).is(":checked")) {
        let cekdata = $(this).val();

        let url = base_url + "home/bangunan_json";
        $.ajax({
            url: url,
            data: {
                cekdata: cekdata
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
                    point = new L.LatLng(parseFloat(msgdata.bangunan_lat), parseFloat(msgdata.bangunan_long));
                    ikon = L.icon({
                        iconUrl: base_url + `assets/images/${msgdata.kategori_icon}`,
                        iconSize: [20, 25],
                        iconAnchor: [10, 25],
                        popupAnchor: [0, -25]
                    });
                    markerOptions = {
                        icon: ikon,
                        point_id: msgdata.bangunan_id,
                        nama: msgdata.bangunan_nama,
                        custom: 'custom1',
                        IdCheck: $(this).val(),
                        IdKategori: msgdata.bangunan_kategori_id,
                        riseOnHover: true
                    }
                    spidol = new L.marker(point, markerOptions);
                    // katmarkers[spidol.options.point_id] = spidol;
                    katmarkers.push(spidol);
                    markerCheck.push(spidol);
                    map.addLayer(spidol);
                    spidol.bindPopup(`<div class="card border-light mb-3" style="max-width: 18rem;">
                    
                    <div class="card-body">
                      <h5 class="card-title">${msgdata.bangunan_nama}</h5>
                      <p class="card-text">${msgdata.bangunan_alamat}</p>
                      <p class="card-text">LAT : ${msgdata.bangunan_lat} , LONG : ${msgdata.bangunan_long}</p>
                      <a href="${base_url}bangunan/detail/${msgdata.bangunan_id}" class="btn btn-primary text-light detailBtn">Detail</a>
                    </div>
                  </div>`, {
                        maxWidth: 1000,
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
            console.log(isVal);
            if (isVal.IdCheck == $(this).val()) {
                map.removeLayer(katmarkers[x]);
            }
        }
    }
});


let offLayerKecamatan = () => {
    map.removeLayer(layerkecamatan);
}

function getLocationLeaflet() {
    map.on('locationfound', onLocationFound);
}

function onLocationFound(e) {
    $('.geolocation-error').modal('hide');
    let location = e.latlng;
    latsaya = location.lat;
    longsaya = location.lng;
}

$('#tutup-aja').on('click', function () {
    $('#features').fadeIn();
    map.setZoom(13);
    hapusRute();
    boxDetail.hide('fast');


});


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

let inputKosong = () => {
    required.show();
    required.html(`Harap isi bidang pencarian !`);
}


let cariByKeyword = () => {


    markerArray();
    let keyword = inputKeys.val();
    // let ambilLokasiUser = latsaya + "," + longsaya;
    let UrlCari = base_url + "home/cari_json";
    // let mydata = "position=" + encodeURI(ambilLokasiUser) + "&keyword=" + keyword;
    $.ajax({
        url: UrlCari,
        data: {
            keyword: keyword
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
            console.log(data);
            $('#feature-list, #konten').empty();
            $('#features').hide();
            warnLoadData.remove(map);
            judulDetail.hide();
            // sidebarTable.fadeIn('fast');
            map.setZoom(13);
            map.spin(false);
            let totaldata = data.length;
            let i = 0;
            if (totaldata == 0) {
                boxDetail.hide('fast');
                liveSearch.hide('fast');
                noResult.fadeIn('fast');
            } else {
                for (; i < totaldata; i++) {
                    boxDetail.hide('fast');
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
            loadingSidebar.hide();
        },
        error: () => {
            warnLoadData.addTo(map);
            map.spin(false);
            loadingSidebar.hide();
        }
    });
}

let markerArray = () => {
    for (let x = 0; x < allmarkers.length; x++) {
        map.removeLayer(allmarkers[x]);
    }
}

let delMarkerChecks = () => {
    $('.perkategori').prop('checked', false);
    for (let mc = 0; mc < markerCheck.length; mc++) {
        map.removeLayer(markerCheck[mc]);
    }
}

// FUNGSI TAMPIL MARKER
let _tampilMarker = () => {

    point = new L.LatLng(parseFloat(msgdata.bangunan_lat), parseFloat(msgdata.bangunan_long));
    ikon = L.icon({
        iconUrl: base_url + `assets/images/${msgdata.kategori_icon}`,
        iconSize: [20, 25],
        iconAnchor: [10, 25],
        popupAnchor: [0, -25]
    });

    markerOptions = {
        icon: ikon,
        point_id: msgdata.bangunan_id,
        nama: msgdata.bangunan_nama,
        custom: 'custom1',
        dist: parseFloat(msgdata.jarak),
        riseOnHover: true
    }
    let locationContent = `
		<div class="media p-2 rounded-sm" data-mark="${msgdata.bangunan_id}" lat="${msgdata.bangunan_lat}" lng="${msgdata.bangunan_long}" data-nama="${msgdata.bangunan_nama}">
		<div class="media-body pl-1">
        <a class="media-heading text-muted">${msgdata.bangunan_nama}</a>
        <br>
		<small>${msgdata.bangunan_alamat}</small><br>
		</div>
		<div class="media-right">
		<a href="javascript:void()">
		<img class="media-object rounded-sm" width=90 src="upload/bangunan/${msgdata.bangunan_gambar}" onError="this.onerror=null;this.src='upload/bangunan/default.jpg';"">
		</a>
		</div>
		</div>`;
    marker = new L.marker(point, markerOptions).addTo(map);
    marker.bindPopup(`${msgdata.bangunan_nama}`, {
        maxWidth: 500,
        className: `custom1`,
        closeButton: true
    });
    markers[marker.options.point_id] = marker;
    $("#feature-list").append(locationContent);
    $("#feature-list").pagify(4, ".media");
}

function _klikMarker() {
    marker.on('click', function (e) {
        nama = this.options.nama;
        customClass = this.options.popupclass;
        id_marker = this.options.point_id;
        latitude = e.latlng.lat;
        longitude = e.latlng.lng;
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
        // map.flyTo([latitude, longitude], 18, {
        //     animate: true,
        //     duration: 1
        // });
        $('#kembali').show();
        $('#tutup-aja').hide();
        boxData.hide();
        _detailLokasi();
        markerFunction($(this).attr('data-mark'));
        judul = markers[id_marker].bindPopup(`${name}`, { className: `${tipclass}`, closeButton: true });
        highlight.clearLayers().addLayer(L.circleMarker([latitude, longitude], highlightStyle)).addTo(map);
    });
}

petunjukArah.click(function () {
    hitungJarak();
});

let hitungJarak = () => {
    if (rute) {
        map.removeControl(rute);
    }

    let latme = latsaya;
    let lngme = longsaya;

    let latlngs = [
        [latme, lngme],
        [latitude, longitude]
    ];

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


    map.closePopup();
}