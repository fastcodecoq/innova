

( function($){

    $.fn.ini_mapa = function(params)
        {

       this.params = {

        lat : 10.420388866294658 ,
        lng : -75.5364627448746,
        mark : {
            image : "img/tema_2012/marker.png",
            size :  google.maps.Size(100, 42),
            point_or : google.maps.Point(0,0),
            point_ofs : new google.maps.Point(42, 50 ),
            titulo : "Innova"
         },
        mapa_id : $(this).attr("id"),
        zoom : 18

         };

   if(params)
     $.extend(this.params,params);

    var latlng = new google.maps.LatLng(this.params.lat,this.params.lng);

    img = new google.maps.MarkerImage(this.params.mark.image,

        this.params.mark.size,

        this.params.mark.point_or,

        this.params.mark.point_ofs  );

    var marca = new google.maps.Marker({
        position: latlng,
        title: this.params.mark.titulo,
        icon: img
    });

    ventana  = new google.maps.InfoWindow({ size: new google.maps.Size(300,400, null,null) });

    var Config = {
        zoom: this.params.zoom,
        center: marca.position,
        scrollWheel : false,
        mapTypeId: google.maps.MapTypeId.HYBRID,
        mapTypeControl: true,
        mapTypeControlOptions: {
            style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
            position: google.maps.ControlPosition.BOTTOM
        },
        navigationControl: true,
        navigationControlOptions: {
            style: google.maps.NavigationControlStyle.ZOOM_PAN,
            position: google.maps.ControlPosition.TOP_RIGHT
        },
        scaleControl: true,
        scaleControlOptions: {
            position: google.maps.ControlPosition.TOP_LEFT
        }
    };

    var map = new google.maps.Map(document.getElementById(this.params.mapa_id), Config);

    marca.setMap(map);


   }

})(jQuery);



var c = 0;

function amp_map(){

    $("div#mapa").hover(function(){

        if(c>0) return;

        ini_mapa()
        c++;

    },function(){
        c=0;
    });

}
