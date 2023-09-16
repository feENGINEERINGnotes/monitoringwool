import folium

# Function to get user input coordinates
def get_user_input():
    lat = float(input("Enter latitude: "))
    lon = float(input("Enter longitude: "))
    return lat, lon

# Get user input
latitude, longitude = get_user_input()

# Create a map centered at the user's coordinates
m = folium.Map(location=[latitude, longitude], zoom_start=10)

# Add a marker for the user's coordinates
folium.Marker([latitude, longitude], popup='User Input').add_to(m)

# Save the map to an HTML file
m.save('user_location_map.html')