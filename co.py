from flask import Flask, render_template, request
import folium

app = Flask(__name__)

@app.route('/')
def index():
    return render_template('input_coordinates.html')

@app.route('/map', methods=['POST'])
def show_map():
    latitude = float(request.form['latitude'])
    longitude = float(request.form['longitude'])

    # Create a map centered at the user's coordinates
    m = folium.Map(location=[latitude, longitude], zoom_start=10)

    # Add a marker for the user's coordinates
    folium.Marker([latitude, longitude], popup='User Input').add_to(m)

    # Save the map to an HTML file
    m.save('user_location_map.html')

    return render_template('show_map.html')

if __name__ == '__main__':
    app.run(debug=True)