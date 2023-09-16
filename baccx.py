from geopy.geocoders import Nominatim

def reverse_geocode(latitude, longitude):
    geolocator = Nominatim(user_agent="reverse_geocoding")
    location = geolocator.reverse((latitude, longitude))
    return location

# Replace these coordinates with the ones you want to trace
latitude = 40.7128
longitude = -74.0060

location = reverse_geocode(latitude, longitude)
print(location.address)