<?php
include 'db_connection.php';
include 'display_trip_ticket.php';
$currentDate = date('l, F j, Y');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/title-logo.png">
    <title>Driver's Trip Ticket</title>
    <link href="./output.css" rel="stylesheet">
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.min.css">
    <link href="./styles.css" rel="stylesheet">

    <style>
        @media print {
            .print-button {
                display: none;
            }

            body {
                width: 270mm;
                /* height: 1000mm; */
                margin: 0;
                padding: 10mm;
                font-size: 12px;
            }
        }

        @page {
            size: A4;
            margin: 0;
        }

        .underline-text {
            display: flex;
            justify-content: space-between;
        }

        .underline-text span {
            flex-grow: 1;
            border-bottom: 1px solid black;
            margin-left: 4px;
        }
    </style>
</head>

<body class="py-5 px-10 text-base exclude-background">

    <div class="flex justify-end">
        <button onclick="window.print()" class="mt-4 px-4 py-2 bg-green-700 hover:bg-green-900 text-white rounded print-button ml-auto"><span class="bi bi-printer">&nbsp;&nbsp;Print</span></button>
    </div>

    <div>
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div class="flex items-center justify-between border-r border-black pr-2">
                <div>
                    <img class="custom-width-1 mt-6 ml-3" src="images/philhealth-logo.png">
                </div>
                <div class="text-center">
                    <img class="custom-width-2 mr-5" src="images/bagong-pilipinas-icon.png">
                </div>
            </div>
            <div>
                <p class="block text-xs">Republic of the Philippines</p>
                <p class="block text-sm font-bold">PHILIPPINE HEALTH INSURANCE CORPORATION</p>
                <p class="block text-sm font-bold">PhilHealth Regional Office NCR Central Branch</p>

                <p class="block text-xs">
                    <i class="bi bi-geo-alt-fill inline-block mr-1"></i>
                    <span class="ml-0.5">Corporate 145 Bldg. Mother Ignacia St. South Triangle, Quezon City</span>
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

        <div>
            <i>
                <p class="text-lg text-center font-bold tracking-widest">DRIVER'S TRIP TICKET</p>
            </i>
            <div class="grid grid-cols-2 gap-2">
                <div class="underline-text">
                    <strong>Trip Ticket Number:<p class="flex-grow ml-4"><?php echo isset($_GET['trip_ticket_number']) ? $_GET['trip_ticket_number']: ''; ?></strong></p>
                </div>
                <div class="underline-text">
                    Date: <strong>
                        <p class="flex-grow ml-4"><?php echo $currentDate; ?>
                    </strong></p>
                </div>
            </div>
            <h3 class="font-bold text-center mt-2 mb-2">(A) TO BE FILLED UP BY MOTORPOOL DISPATCHER</h3>
        </div>

        <div class="grid grid-cols-2 gap-2">

            <div class="underline-text">
                Driver: <span><strong><?php echo isset($_GET['driver']) ? $_GET['driver'] : ''; ?></span></strong>
            </div>
            <div class="underline-text">
                Vehicle: <span><strong><?php echo isset($_GET['vehicle']) ? $_GET['vehicle'] : ''; ?></span></strong>
            </div>
            <div class="underline-text">
                Authorized Passengers:<span><strong><?php echo isset($_GET['authorized_passenger']) ? $_GET['authorized_passenger'] : ''; ?></span></strong>
            </div>
            <div class="underline-text text-center">
                Time of Departure: <span><strong><?php echo isset($_GET['departure_time']) ? $_GET['departure_time'] : ''; ?></span></strong>
            </div>
            <div class="underline-text">
                Requesting Official: <span><strong><?php echo isset($_GET['requesting_official']) ? $_GET['requesting_official'] : ''; ?></span></strong>
            </div>
            <div class="underline-text text-center">
                Mileage Reading: <span><strong><?php echo isset($_GET['milage']) ? $_GET['milage'] : ''; ?></span></strong>
            </div>
            <div>
                <div class="underline-text mb-2">
                    Special Order/OBS No.: <span class="font-bold"><?php echo isset($_GET['obs_no']) ? $_GET['obs_no'] : ''; ?></span>
                </div>
                <div class="underline-text mb-2">
                    Period Covered: <span class="font-bold"><?php echo isset($_GET['period_covered']) ? $_GET['period_covered'] : ''; ?></span>
                </div>
                <div class="underline-text mb-2">
                    Destination: <span class="font-bold"><?php echo isset($_GET['destination']) ? $_GET['destination'] : ''; ?></span>
                </div>




            </div>
            <div>
                Fuel in Tank (Before Start-up):
                <img src="images/fuel.png" class="h-20 ml-56">
            </div>
            <div class="underline-text mb-2 text-center">
                Purpose: <span class="font-bold"><?php echo isset($_GET['purpose']) ? $_GET['purpose'] : ''; ?></span>
            </div>
            <div class="underline-text mb-2 text-center">
                New Fuel Regulation, PR No.: <span class="font-bold"><?php echo isset($_GET['pr_no']) ? $_GET['pr_no'] : ''; ?></span>
            </div>

        </div>

        <div class="w-1/3 mx-auto my-2">
            <div class="relative pt-1">
                <div class="overflow-hidden hidden h-2 mb-2 flex">
                    <div style="width: 50%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-emerald-600"></div>
                </div>
            </div>
        </div>


        <div class="grid grid-cols-2 gap-2 mt-4 underline-text">
            <div>
                <strong class="inline">Prepared by: <p class="inline ml-8 border-b border-black w-32 text-center"><?php echo isset($_GET['person_prepared']) ? $_GET['person_prepared'] : ''; ?></p></strong>
                <p class="ml-20">Motorpool Dispatcher - Designate</p>
            </div>
            <div>
                <strong class="inline">Approved by:<p class="inline ml-8 border-b border-black w-32 text-center">GABRIEL DANTE T. RODULFO</p></strong>
                <p class="ml-36">HEAD, ADMIN</p>

            </div>
            <div>
                <strong>Inspected before dispatch by:</strong><br>
                <p class="border-b border-black w-52 text-center">&nbsp</p>
                <p class="font-bold text-center">Guard-on-duty</p>
            </div>
        </div>


        <div class="">
            <h3 class="font-bold">(B) TO BE FILLED BY DRIVER</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full border-collapse border border-black">
                    <thead>
                        <tr>
                            <th rowspan="3" class="border border-black px-4 py-1 text-center">DATE</th>
                            <th colspan="4" class="border border-black px-72 py-1 text-center">PLACES VISITED</th>
                            <th rowspan="2" colspan="2" class="border border-black px-0.5 py-1 text-center">MILEAGE READING</th>
                        </tr>
                        <tr>
                            <th colspan="2" class="border border-black px-2 py-1 text-center">FROM</th>
                            <th colspan="2" class="border border-black px-2 py-1 text-center">TO</th>
                        </tr>
                        <tr>
                            <th class="border border-black px-16 py-1 text-center">PLACE</th>
                            <th class="border border-black px-0.5 py-1 text-center">TIME</th>
                            <th class="border border-black px-16 py-1 text-center">PLACE</th>
                            <th class="border border-black px-0.5 py-1 text-center">TIME</th>
                            <th class="border border-black px-2 py-1 text-center">FROM</th>
                            <th class="border border-black px-4 py-1 text-center">TO</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border border-black p-4"></td>
                            <td class="border border-black p-4"></td>
                            <td class="border border-black p-4"></td>
                            <td class="border border-black p-4"></td>
                            <td class="border border-black p-4"></td>
                            <td class="border border-black p-4"></td>
                            <td class="border border-black p-4"></td>

                        </tr>
                        <tr>
                            <td class="border border-black p-4"></td>
                            <td class="border border-black p-4"></td>
                            <td class="border border-black p-4"></td>
                            <td class="border border-black p-4"></td>
                            <td class="border border-black p-4"></td>
                            <td class="border border-black p-4"></td>
                            <td class="border border-black p-4"></td>

                        </tr>

                        <tr>
                            <td class="border border-black p-4"></td>
                            <td class="border border-black p-4"></td>
                            <td class="border border-black p-4"></td>
                            <td class="border border-black p-4"></td>
                            <td class="border border-black p-4"></td>
                            <td class="border border-black p-4"></td>
                            <td class="border border-black p-4"></td>
                        </tr>
                        <tr>
                            <td class="border border-black p-4"></td>
                            <td class="border border-black p-4"></td>
                            <td class="border border-black p-4"></td>
                            <td class="border border-black p-4"></td>
                            <td class="border border-black p-4"></td>
                            <td class="border border-black p-4"></td>
                            <td class="border border-black p-4"></td>
                        </tr>
                                                <tr>
                            <td class="border border-black p-4"></td>
                            <td class="border border-black p-4"></td>
                            <td class="border border-black p-4"></td>
                            <td class="border border-black p-4"></td>
                            <td class="border border-black p-4"></td>
                            <td class="border border-black p-4"></td>
                            <td class="border border-black p-4"></td>
                        </tr>

                    </tbody>
                </table>
            </div>

            <div class="overflow-x-auto">
                <div class="pt-2">
                    <div class="overflow-x-auto">
                        <table class="min-w-full border-collapse border border-black">
                            <thead>
                                <tr>
                                    <th rowspan="2" class="p-2 text-center w-1/4">CO-PASSENGER NAME</th>
                                    <th colspan="2" class="border border-black p-2 w-2/3 text-center">PLACES VISITED</th>
                                    <th rowspan="2" class="p-2 text-center px-10">SIGNATURE</th>
                                </tr>
                                <tr>
                                    <th class="border border-black p-2 text-center">FROM</th>
                                    <th class="border border-black px-4 text-center">TO</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="border border-black p-4"></td>
                                    <td class="border border-black p-4"></td>
                                    <td class="border border-black p-4"></td>
                                    <td class="border border-black p-4"></td>
                                </tr>
                                <tr>
                                    <td class="border border-black p-4"></td>
                                    <td class="border border-black p-4"></td>
                                    <td class="border border-black p-4"></td>
                                    <td class="border border-black p-4"></td>
                                </tr>
                                <tr>
                                    <td class="border border-black p-4"></td>
                                    <td class="border border-black p-4"></td>
                                    <td class="border border-black p-4"></td>
                                    <td class="border border-black p-4"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="grid grid-cols-2 gap-4">
                <div>
                    <p class="block mt-4 ml-8 font-bold text-sm">I certify the correction of the above record of my trip.</p>
                </div>
                <div>
                    <p class="block text-center mt-4 font-bold text-sm"><?php echo isset($_GET['driver']) ? $_GET['driver'] : ''; ?></p>
                    <p class="block font-bold text-center text-sm">Driver</p>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <p class="block font-bold text-sm">(C) TO BE FILLED UP UPON RETURN OF VEHICLE</p>
                    <p class="block font-bold text-sm">Time of arrival: </p>
                    <p class="block font-bold text-sm">Milleage reading: </p>
                    <p class="block font-bold text-sm">Fuel In Tank (upon arrival): </p>

                    <img src="images/fuel.png" class="h-20 ml-44">
                </div>
                <div>
                    <strong>
                        <p class="block mt-2 text-sm">(D)CERTIFICATION</p>
                    </strong>
                    <strong>
                        <p class="block mt-2 text-sm">I/We hereby certify that We are authorized to use this vehicle for this trip and We used it strictly on official business in accordance with the travel order/OBS.<br>I/We further certify to the correctness of the foregoing records of travel.</p>
                    </strong>
                </div>
            </div>


            <div class="grid grid-cols-2 gap-4 mt-4">
                <div>
                    <p class="block ml-20 text-sm">Noted: ____________________________</p>
                    <p class="block mt-2 text-center font-bold text-sm">Guard-on-duty</p>
                </div>
                <div>
                    <p class="block mt-2 ml-20 text-sm">__________________________________</p>
                    <p class="block mt-2 text-center font-bold text-sm">Name and Signature of passenger</p>
                </div>
            </div>



        </div>

        <footer>
            <div>
                <img src="images/socotec.png" class=" w-20">

            </div>
        </footer>

        <script>
            fetch('fetch_trip_ticket_records.php')
                .then(response => response.json())
                .then(data => {
                    const tripRecords = document.getElementById('tripRecords');

                    data.forEach(record => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                    <td class="border border-gray-400 py-2 whitespace-nowrap text-center">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded open-btn">Open</button>
                    </td>
                    <td class="border border-gray-400 px-18 text-center whitespace-nowrap">${record.trip_ticket_number}</td>
                    <td class="border border-gray-400 px-10 text-center whitespace-nowrap">${record.driver}</td>
                    <td class="border border-gray-400 px-10 text-center whitespace-nowrap">${record.authorized_passenger}</td>
                    <td class="border border-gray-400 px-10 text-center whitespace-nowrap">${record.requesting_official}</td>
                    <td class="border border-gray-400 px-10 text-center whitespace-nowrap">${record.obs_no}</td>
                    <td class="border border-gray-400 px-10 text-center whitespace-nowrap">${record.period_covered}</td>
                    <td class="border border-gray-400 px-10 text-center whitespace-nowrap">${record.destination}</td>
                    <td class="border border-gray-400 px-10 text-center whitespace-nowrap">${record.purpose}</td>
                    <td class="border border-gray-400 px-10 text-center whitespace-nowrap">${record.vehicle}</td>
                    <td class="border border-gray-400 px-10 text-center whitespace-nowrap">${record.departure_time}</td>
                    <td class="border border-gray-400 px-10 text-center whitespace-nowrap">${record.milage}</td>
                    <td class="border border-gray-400 px-10 text-center whitespace-nowrap">${record.pr_no}</td>
                `;
                        tripRecords.appendChild(row);

                        // Add event listener to the "Open" button
                        const openBtn = row.querySelector('.open-btn');
                        openBtn.addEventListener('click', function() {
                            // Extract data from the current row
                            const rowData = {
                                driver: record.driver,
                                vehicle: record.vehicle,
                                authorized_passenger: record.authorized_passenger,
                                time12HourFormat: record.departure_time,
                                requesting_official: record.requesting_official,
                                milage: record.milage,
                                obs_no: record.obs_no,
                                period_covered: record.period_covered,
                                destination: record.destination,
                                purpose: record.purpose,
                                pr_no: record.pr_no
                            };

                            // Encode the data as URL parameters
                            const params = new URLSearchParams(rowData).toString();

                            // Redirect to trip_ticket_report.php with the data as parameters
                            window.location.href = `trip_ticket_report.php?${params}`;
                        });
                    });
                })
                .catch(error => {
                    console.error('Error fetching trip records:', error);
                });
        </script>
</body>

</html>
