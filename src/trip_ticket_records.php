<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/title-logo.png">
    <title>Trip Ticket Records</title>
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.min.css">
    <link href="./output.css" rel="stylesheet">
    <link href="./styles.css" rel="stylesheet">
    <script src="./script.js"></script>

    <style>
        /* CSS for the modal */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        /* Modal content */
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            /* Could be more or less, depending on screen size */
        }

        /* Close button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>

<body class="bg-gray-100 p-3 exclude-background">
    <div class="mx-auto">
        <h1 class="text-2xl font-bold mb-4">Trip Ticket Records</h1>
        <input type="text" id="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-46 h-10 mb-6 ps-4" placeholder="Search" />


        <div class="overflow-x-auto" style="max-height: 600px;">

            <table class="trip-record">
                <thead class="">
                    <tr class="bg-gray-200">
                        <th class="border border-gray-400 px-6 py-1 whitespace-nowrap">Preview Report</th>
                        <th class="border border-gray-400 px-4 py-1 whitespace-nowrap">Trip Ticket Number</th>
                        <th class="border border-gray-400 px-4 py-1 whitespace-nowrap">Driver</th>
                        <th class="border border-gray-400 px-4 py-1 whitespace-nowrap">Authorized Passenger</th>
                        <th class="border border-gray-400 px-4 py-1 whitespace-nowrap">Requesting Official</th>
                        <th class="border border-gray-400 px-4 py-1 whitespace-nowrap">OBS No</th>
                        <th class="border border-gray-400 px-4 py-1 whitespace-nowrap">Period Covered</th>
                        <th class="border border-gray-400 px-4 py-1 whitespace-nowrap">Destination</th>
                        <th class="border border-gray-400 px-4 py-1 whitespace-nowrap">Purpose</th>
                        <th class="border border-gray-400 px-4 py-1 whitespace-nowrap">Vehicle</th>
                        <th class="border border-gray-400 px-4 py-1 whitespace-nowrap">Departure Time</th>
                        <th class="border border-gray-400 px-4 py-1 whitespace-nowrap">Person Prepared</th>
                        <!-- <th class="border border-gray-400 px-4 py-1 whitespace-nowrap">Milage</th>
                        <th class="border border-gray-400 px-4 py-1 whitespace-nowrap">PR_No</th> -->
                    </tr>
                </thead>
                <tbody id="tripRecords">
                </tbody>
            </table>
        </div>
    </div>

    <div id="trip-ticket-modal" class="modal fixed inset-0 z-50 overflow-auto flex justify-center items-center bg-black bg-opacity-50">

        <div class="top-modal w-full md:w-auto">

            <form id="trip-ticket-form" action="update_trip_ticket.php" method="post" class="p-4 md:p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div class="flex items-center justify-between border-r border-black pr-2">
                        <div>
                            <img class="mt-6 ml-3 w-32 h-auto" src="images/philhealth-logo.png">
                        </div>
                        <div class="text-center">
                            <img class="mr-5 w-20 h-auto" src="images/bagong-pilipinas-icon.png">
                        </div>

                    </div>
                    <div>
                        <span class="close w-6 h-2 ml-auto cursor-pointer" onclick="closeModal('trip-ticket-modal')">&times;</span>

                        <p class="block text-xs">Republic of the Philippines</p>
                        <p class="block text-sm font-bold">PHILIPPINE HEALTH INSURANCE CORPORATION</p>
                        <p class="block text-sm font-bold">PhilHealth Regional Office NCR Central Branch</p>

                        <p class="block text-xs">
                            <i class="bi bi-geo-alt-fill inline-block mr-1"></i>
                            <span class="ml-0.5">Rizal</span>
                        </p>

                        <div class="flex space-x-4">
                            <p class="flex items-center text-xs">
                                <i class="bi bi-facebook"></i>
                                <span class="ml-1">PhilHealthPRONCR</span>
                            </p>

                            <p class="flex items-center text-xs">
                                <i class="bi bi-twitter-x"></i>
                                <span class="ml-1">teamphilhealth</span>
                            </p>

                            <p class="flex items-center text-xs">
                                <i class="bi bi-globe"></i>
                                <span class="ml-1">www.philhealth.gov.ph</span>
                            </p>
                        </div>


                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block font-bold text-sm">Trip Ticket Number:</label>
                        <input type="text" class="w-full border border-gray-300 p-2 h-8" name="trip_ticket_number" id="trip_ticket_number_input" readonly>
                    </div>
                    <div>
                        <label class="block font-bold text-sm">Date:</label>
                        <input type="text" class="w-full border border-gray-300 p-2 h-8" name="date" id="date_input" disabled>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block font-bold text-sm">Driver:</label>
                        <select class="w-full border border-gray-300 p-2 h-9 text-sm" name="driver" id="driverSelect" required>
                            <?php foreach ($drivers as $driver) : ?>
                                <option value="<?php echo $driver; ?>"><?php echo $driver; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <label class="block font-bold text-sm">Authorized Passengers:</label>
                        <input type="text" class="w-full border border-gray-300 p-2 h-8" name="authorized_passenger" id="authorized_passenger" required>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block font-bold text-sm">Requesting Official:</label>
                        <input type="text" class="w-full border border-gray-300 p-2 h-8" name="requesting_official" id="requesting_official" required>
                    </div>
                    <div>
                        <label class="block font-bold text-sm">Special Order/OBS No.:</label>
                        <input type="text" class="w-full border border-gray-300 p-2 h-8" name="obs_no" id="obs_no" required>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block font-bold text-sm">Period Covered:</label>
                        <input type="date" class="w-full border border-gray-300 p-2 h-8" name="period_covered" id="date" required>
                    </div>
                    <div>
                        <label class="block font-bold text-sm">Destination:</label>
                        <input type="text" class="w-full border border-gray-300 p-2 h-8" name="destination" id="destination" required>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block font-bold text-sm">Purpose/S:</label>
                    <input type="text" class="w-full border border-gray-300 p-2 h-8" name="purpose" id="purpose" required>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block font-bold text-sm">Vehicle:</label>
                        <select class="w-full border border-gray-300 p-2 h-9 text-sm" name="vehicle" id="vehicleSelect" required>
                            <?php foreach ($vehicles as $vehicle) : ?>
                                <option value="<?php echo $vehicle; ?>"><?php echo $vehicle; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <label class="block font-bold text-sm">Time of Departure:</label>
                        <input type="time" class="w-full border border-gray-300 p-2 h-9" name="departure_time" id="datetimeInput" required>
                        <input type="hidden" id="departure_time" name="departure_time">

                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <!-- <label class="block font-bold text-sm">Milage Reading: (km/ml)</label> -->
                        <input type="number" class="w-full border border-gray-300 p-2 h-8" name="milage" id="milage" hidden>
                    </div>
                    <div>
                        <!-- <label class="block font-bold text-sm">New Fuel Requisition, PR#:</label> -->
                        <input type="text" class="w-full border border-gray-300 p-2 h-8" name="pr_no" id="pr_no" hidden>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block font-bold text-sm">Prepared by:</label>
                    <input type="text" class="w-full border border-gray-300 p-2 h-8" name="person_prepared" id="person_prepared">
                    <label class="block font-bold text-center text-xs">Motorpool Dispatcher - Designate</label>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block font-bold text-sm">Approved by:</label>
                        <input type="text" class="w-full border border-gray-300 p-2 h-8" name="approved_by" value="GABRIEL DANTE T. RODULFO" disabled>
                    </div>
                    <div>
                        <label class="block font-bold text-sm">Position:</label>
                        <input type="text" class="w-full border border-gray-300 p-2 h-8" name="position" value="HEAD, ADMIN" disabled>
                    </div>
                </div>
                <div class="space-x-4  flex justify-center">
                    <!-- <button type="button" class="bg-red-700 hover:bg-red-900 text-white font-bold py-2 px-4 rounded" onclick="clearTripTicketInput()"><i class="bi bi-trash3-fill"></i>&nbsp;&nbsp;Clear Inputs</button> -->
                    <!-- <button type="button" onclick="window.open('trip_ticket_records.php', '_blank')" class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded"><i class="bi bi-search"></i>&nbsp;&nbsp;Find Record</button> -->
                    <button type="submit" class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded"><i class="bi bi-cloud-download"></i>&nbsp;&nbsp;Update Record</button>
                    <!-- <button type="button" class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded" onclick="previewTripTicket()"><i class="bi bi-eye"></i>&nbsp;&nbsp;Preview</button> -->
                </div>
            </form>
        </div>
    </div>


    <script>
fetch('fetch_trip_ticket_records.php')
    .then(response => response.json())
    .then(data => {
        const tripRecords = document.getElementById('tripRecords');

        data.forEach(record => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td class="border border-gray-400 py-2 whitespace-nowrap text-center">
                    <button class="openButton bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded">Open</button>
                    <button class="editButton bg-red-700 hover:bg-red-900 text-white font-bold py-2 px-4 rounded">Edit</button>
                </td>
                <td class="border border-gray-400 px-18 text-center whitespace-nowrap">${record.trip_ticket_number}</td>
                <td class="border border-gray-400 px-18 text-center whitespace-nowrap hidden">${record.ticketdate}</td>
                <td class="border border-gray-400 px-10 text-center whitespace-nowrap">${record.driver}</td>
                <td class="border border-gray-400 px-10 text-center whitespace-nowrap">${record.authorized_passenger}</td>
                <td class="border border-gray-400 px-10 text-center whitespace-nowrap">${record.requesting_official}</td>
                <td class="border border-gray-400 px-10 text-center whitespace-nowrap">${record.obs_no}</td>
                <td class="border border-gray-400 px-10 text-center whitespace-nowrap">${record.period_covered}</td>
                <td class="border border-gray-400 px-10 text-center whitespace-nowrap">${record.destination}</td>
                <td class="border border-gray-400 px-10 text-center whitespace-nowrap">${record.purpose}</td>
                <td class="border border-gray-400 px-10 text-center whitespace-nowrap">${record.vehicle}</td>
                <td class="border border-gray-400 px-10 text-center whitespace-nowrap">${record.departure_time}</td>
                <td class="border border-gray-400 px-10 text-center whitespace-nowrap">${record.person_prepared}</td>

            `;
            
            tripRecords.appendChild(row);
        });
    })
    .catch(error => {
        console.error('Error fetching trip records:', error);
    });

    document.getElementById('tripRecords').addEventListener('click', function(event) {
    if (event.target.classList.contains('openButton')) {
        // Find the parent row of the clicked Open button
        const row = event.target.closest('tr');

        // Extract values from the row
        const tripTicketNumber = row.cells[1].textContent.trim();
        const date = row.cells[2].textContent.trim();
        const driver = row.cells[3].textContent.trim();
        const authorizedPassenger = row.cells[4].textContent.trim();
        const requestingOfficial = row.cells[5].textContent.trim();
        const obsNo = row.cells[6].textContent.trim();
        const periodCovered = row.cells[7].textContent.trim();
        const destination = row.cells[8].textContent.trim();
        const purpose = row.cells[9].textContent.trim();
        const vehicle = row.cells[10].textContent.trim();
        const departureTime = row.cells[11].textContent.trim();
        const personPrepared = row.cells[12].textContent.trim();
        const milage = ''; // Define or retrieve milage value if needed
        const prNo = ''; // Define or retrieve pr_no value if needed

        // Construct the URL with the extracted values
        const url = `trip_ticket_report.php?trip_ticket_number=${encodeURIComponent(tripTicketNumber)}&driver=${encodeURIComponent(driver)}&authorized_passenger=${encodeURIComponent(authorizedPassenger)}&requesting_official=${encodeURIComponent(requestingOfficial)}&obs_no=${encodeURIComponent(obsNo)}&period_covered=${encodeURIComponent(periodCovered)}&destination=${encodeURIComponent(destination)}&purpose=${encodeURIComponent(purpose)}&vehicle=${encodeURIComponent(vehicle)}&departure_time=${encodeURIComponent(departureTime)}&milage=${encodeURIComponent(milage)}&pr_no=${encodeURIComponent(prNo)}`;

        // Open the URL in a new tab/window
        window.open(url, '_blank');
    }
});




// Function to handle opening the modal for editing
document.getElementById('tripRecords').addEventListener('click', function(event) {
    if (event.target.classList.contains('editButton')) {
        const modal = document.getElementById('trip-ticket-modal');
        modal.style.display = 'block';

        // Find the parent row of the clicked Edit button
        const row = event.target.closest('tr');

        // Populate modal fields with data from the row
        document.getElementById('trip_ticket_number_input').value = row.cells[1].textContent.trim(); 
        document.getElementById('date_input').value = row.cells[2].textContent.trim(); 
        document.getElementById('driverSelect').value = row.cells[3].textContent.trim(); 
        document.getElementById('authorized_passenger').value = row.cells[4].textContent.trim(); 
        document.getElementById('requesting_official').value = row.cells[5].textContent.trim(); 
        document.getElementById('obs_no').value = row.cells[6].textContent.trim(); 
        document.getElementById('date').value = row.cells[7].textContent.trim(); 
        document.getElementById('destination').value = row.cells[8].textContent.trim(); 
        document.getElementById('purpose').value = row.cells[9].textContent.trim(); 
        document.getElementById('vehicleSelect').value = row.cells[10].textContent.trim(); 
        document.getElementById('datetimeInput').value = row.cells[11].textContent.trim(); 
        document.getElementById('person_prepared').value = row.cells[12].textContent.trim(); 
        // Handle closing the modal
        const closeSpan = modal.querySelector('.close');
        closeSpan.addEventListener('click', function() {
            modal.style.display = 'none';
        });

        window.addEventListener('click', function(event) {
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        });
    }
});



document.getElementById('search').addEventListener('input', function () {
                var input, filter, table, tr, td, i, j, txtValue;
                input = document.getElementById('search');
                filter = input.value.toUpperCase();
                table = document.querySelector('.trip-record');
                tbody = table.getElementsByTagName('tbody')[0];
                tr = tbody.getElementsByTagName('tr');

                for (i = 0; i < tr.length; i++) {
                    var found = false;
                    for (j = 0; j < tr[i].cells.length; j++) {
                        td = tr[i].cells[j];
                        if (td) {
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                found = true;
                            }
                        }
                    }
                    if (found) {
                        tr[i].style.display = '';
                    } else {
                        tr[i].style.display = 'none';
                    }
                }
            });



    </script>
</body>

</html>