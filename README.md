# Introducing Smart Waste Management System

Tech Solution is a team of dedicated professionals committed to providing innovative solutions to meet the evolving needs of our clients. Our mission is to deliver exceptional services and products that enhance the user experience and drive success. 

# Live Tracking Acknowledgments using Google Maps API with JavaScript

## Overview

This project integrates the Google Maps API to provide live tracking acknowledgments for GitHub repositories. By utilizing the Google Maps API, users can visualize the geographical distribution of acknowledgments made in real-time within their GitHub repository.

## Setup

1. **Obtain Google Maps API Key**: Visit the [Google Cloud Console](https://console.cloud.google.com/), create a new project, and enable the Google Maps JavaScript API. Obtain the API key from the credentials section.

2. **Configure API Key**: Store the obtained API key securely. It will be used to authenticate requests made to the Google Maps API.

3. **GitHub Repository Integration**: Within your GitHub repository, create a new directory for this project (e.g., `live-tracking-acknowledgments`).

4. **Implementation**: Write JavaScript code to fetch acknowledgment data from GitHub and plot it on Google Maps.

5. **Authentication**: Ensure secure handling of authentication tokens and API keys to prevent unauthorized access.

6. **Testing**: Test the implementation thoroughly to ensure proper functionality.

## Example Code

```html
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realtime location tracker</title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

    <style>
        body {
            margin: 0;
            padding: 0;
        }

        #map {
            width: 100%;
            height: 100vh;
        }
    </style>
</head>

<body>
    <div id="map"></div>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>

        var map = L.map('map').setView([14.0860746, 100.608406], 6);


        var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        });
        osm.addTo(map);

        if (!navigator.geolocation) {
            console.log("Your browser doesn't support geolocation feature!")
        } else {
            setInterval(() => {
                navigator.geolocation.getCurrentPosition(getPosition)
            }, 5000);
        }

        var marker, circle;

        function getPosition(position) {

            var lat = position.coords.latitude
            var long = position.coords.longitude
            var accuracy = position.coords.accuracy

            if (marker) {
                map.removeLayer(marker)
            }

            if (circle) {
                map.removeLayer(circle)
            }

            marker = L.marker([lat, long])
            circle = L.circle([lat, long], { radius: accuracy })

            var featureGroup = L.featureGroup([marker, circle]).addTo(map)

            map.fitBounds(featureGroup.getBounds())

            console.log("Your coordinate is: Lat: " + lat + " Long: " + long + " Accuracy: " + accuracy)
        }

    </script>
</body>

</html>
```
