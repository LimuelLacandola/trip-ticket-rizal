function fetchDrivers(callback) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'fetch_drivers.php', true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var drivers = JSON.parse(xhr.responseText);
            callback(drivers);
        }
    };
    xhr.send();
}

fetchDrivers(function(drivers) {
    var select = document.getElementById('driverSelect');
    drivers.forEach(function(driver) {
        var option = document.createElement('option');
        option.value = driver;
        option.textContent = driver;
        select.appendChild(option);
    });
});


function fetchVehicles(callback) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'fetch_vehicles.php', true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var vehicles = JSON.parse(xhr.responseText);
            callback(vehicles);
        }
    };
    xhr.send();
}

fetchVehicles(function(vehicles) {
    var select = document.getElementById('vehicleSelect');
    vehicles.forEach(function(vehicle) {
        var option = document.createElement('option');
        option.value = vehicle;
        option.textContent = vehicle;
        select.appendChild(option);
    });
});

function convertTo12HourFormat(time24) {
    var timeParts = time24.split(":");
    var hours = parseInt(timeParts[0]);
    var minutes = parseInt(timeParts[1]);

    var suffix = hours >= 12 ? "PM" : "AM";
    hours = hours % 12 || 12;
    var formattedTime = hours + ":" + (minutes < 10 ? "0" : "") + minutes + " " + suffix;

    return formattedTime;
}
document.addEventListener("DOMContentLoaded", function() {
    var datetimeInput = document.getElementById('datetimeInput');

    datetimeInput.addEventListener('change', function() {
        var time24HourFormat = this.value;
        var time12HourFormat = convertTo12HourFormat(time24HourFormat);

        document.getElementById('departure_time').value = time12HourFormat;
    });
});

