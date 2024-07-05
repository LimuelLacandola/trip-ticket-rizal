<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RIV Records</title>
    <link rel="icon" type="image/x-icon" href="images/title-logo.png">
    <link href="./output.css" rel="stylesheet">
    <!-- <link href="https://cdn.tailwindcss.com" rel="stylesheet"> -->

</head>

<body class="bg-gray-100 p-3">
    <div class="container">
        <h1 class="text-2xl font-bold mb-4">RIV Records</h1>
        <input type="text" id="search"
            class="search-input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block h-10 mb-6 px-4"
            placeholder="Search" />

        <div class="max-h-[600px] overflow-y-auto">
            <table class="w-full rivTable">
                <thead class="">
                    <tr class="bg-gray-200">
                        <th
                            class="border border-gray-400 px-6 py-1 whitespace-nowrap">Item Description</th>
                        <th
                            class="border border-gray-400 px-4 py-1 whitespace-nowrap">Quantity</th>
                        <th
                            class="border border-gray-400 px-4 py-1 whitespace-nowrap">Estimated Unit Cost</th>
                        <th
                            class="border border-gray-400 px-4 py-1 whitespace-nowrap">Estimated Total Cost</th>
                        <th
                            class="border border-gray-400 px-4 py-1 whitespace-nowrap">Date</th>
                    </tr>
                </thead>
                <tbody id="rivRecords">
                </tbody>
            </table>
        </div>
    </div>


        <script>
            fetch('fetch_riv_records.php')
                .then(response => response.json())
                .then(data => {
                    const tripRecords = document.getElementById('rivRecords');

                    data.forEach(record => {
                        const row = document.createElement('tr');

                        row.innerHTML = `
                            <td class="border border-gray-400 px-18 text-center whitespace-nowrap py-2">${record.item_description}</td>
                            <td class="border border-gray-400 px-18 text-center whitespace-nowrap">${record.quantity}</td>
                            <td class="border border-gray-400 px-10 text-center whitespace-nowrap">${record.estimated_unit_cost}</td>
                            <td class="border border-gray-400 px-10 text-center whitespace-nowrap">${record.estimated_total_cost}</td>
                            <td class="border border-gray-400 px-10 text-center whitespace-nowrap">${record.date}</td>
                        `;
                        tripRecords.appendChild(row);
                    });
                })
                .catch(error => {
                    console.error('Error fetching riv records:', error);
                });


            document.getElementById('search').addEventListener('input', function () {
                var input, filter, table, tr, td, i, j, txtValue;
                input = document.getElementById('search');
                filter = input.value.toUpperCase();
                table = document.querySelector('.rivTable');
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
