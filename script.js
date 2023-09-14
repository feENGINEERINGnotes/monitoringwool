//*script.js* (JavaScript):

javascript
function initMap() {
    const map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: -34.397, lng: 150.644},
        zoom: 8
    });

    // Simulated GPS data (replace with real data)
    const gpsCoordinates = [
        {lat: -34.397, lng: 150.644},
        {lat: -34.297, lng: 150.744},
        // Add more coordinates as needed
    ];

    let currentIndex = 0;

    function updateMarker() {
        const coords = gpsCoordinates[currentIndex];
        const marker = new google.maps.Marker({
            position: coords,
            map: map,
            title: `Latitude: ${coords.lat}, Longitude: ${coords.lng}`
        });

        map.setCenter(coords);

        currentIndex++;
        if (currentIndex >= gpsCoordinates.length) {
            currentIndex = 0;
        }

        setTimeout(() => {
            marker.setMap(null);
            updateMarker();
        }, 2000); // Update every 2 seconds
    }

    updateMarker();
}

