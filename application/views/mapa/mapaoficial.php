<div style="height: 1000px; width: 100%" id="map"></div>
                        
                        <script>
                            var ubicaciones= <?php   echo $ubicaciones ; ?>;
                            
                            //alert(ubicaciones[0]["ubi_latitud"]);
                            //alert(ubicaciones);
                            console.log(ubicaciones[0]["ubi_latitud"]);
                            
                            
                            var marcadores = [['PARADA1',-17.77077715527456,-63.18213491422512,'Barcelona'],
                                                ['parada',-17.79599071402021 , -63.19365768451587    ,'BOL'],
                                                ['parada',-17.796450409562006,  -63.194022464941895   ,'BOL'],
                                                ['parada',-17.792353969784013,  -63.19414048213855   ,'BOL'],
                                                ['parada',-17.791843185165884,  -63.19467692394153   ,'BOL'],
                                                ['parada',-17.785611495173217,  -63.1953206541051   ,'BOL'],
                                                ['parada',-17.783670432566144,  -63.19471983928577   ,'BOL'],
                                                ['parada',-17.78181107913188 , -63.19422631282703   ,'BOL'],
                                                ['parada',-17.781933674459747,  -63.194805669974244   ,'BOL'],
                                                ['parada',-17.778480540539245,  -63.19308905620471   ,'BOL'],
                                                ['parada',-17.776437234603026,  -63.192531156729615   ,'BOL'],
                                                ['parada',-17.77664156624802 , -63.19321780223743   ,'BOL'],
                                                ['parada',-17.773024861604146,  -63.1904926778783   ,'BOL'],
                                                ['parada',-17.772044047730347,  -63.18933396358386     ,'BOL'],
                                                ['parada',-17.770961059492958,  -63.18598656673328   ,'BOL'],
                                                ['parada',-17.771431036326323,  -63.18570761699573    ,'BOL'],];




                        var map, infoWindow;
                        //-17.782291, -63.180598
                        function initMap() {
                            map = new google.maps.Map(document.getElementById('map'), {
                            center: {lat: -17.782291, lng: -63.180598},
                            zoom: 13
                            });
                            for (var i = 0; i < ubicaciones.length; i++) {
                                var latitude=ubicaciones[i]["ubi_latitud"];
                                var longitude=ubicaciones[i]["ubi_longitud"];
                                //var latilong={lat:latitude,lng:longitude}
                                console.log(latitude);
                                console.log(longitude);
                                var myLatLng = new google.maps.LatLng(latitude,longitude);
                                var marker = new google.maps.Marker({
                                position: myLatLng,
                                map: map
                              
                                });              
                            }

                        }

                       

                        </script>
                        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAfY0ZivhLSc_UvIab1HC09cdDlXCgcK0w&callback=initMap"
    async defer></script>