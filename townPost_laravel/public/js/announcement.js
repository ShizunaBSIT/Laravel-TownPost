//for weather
async function getWeather() {
    const city = document.getElementById('city').value;
    const apiKey ='f7062ed848a912a0f655cf26f1fff01e';
    const url = `https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apiKey}&units=metric`;

    try {
        const response =await fetch(url)
        if(!response.ok) throw new Error('City not found');
        const data = await response.json();
        const weatherInfo =`Temperature in ${data.name}: ${data.main.temp} °C, Weather: ${data.weather[0].description}`;
        document.getElementById('weatherInfo').innerText = weatherInfo;
    } catch (error) {
        document.getElementById('weatherInfo').innerText=error.message;
    }
}

//for sidebar
document.getElementById('sidebarCollapse').addEventListener('click', () => {
    document.getElementById('sidebar').classList.toggle('active');
});

//for buttons
function myButtons() {
    alert("Please create an account to comment😣");
}