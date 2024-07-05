<?php
include 'db_connection.php';
include 'display_control_no.php';
$currentDate = date("d/m/Y");
$currentYear = date("Y");
$currentMonth = date("m");

function monthToWord($monthNum)
{
    $months = array(
        1 => "January",
        2 => "February",
        3 => "March",
        4 => "April",
        5 => "May",
        6 => "June",
        7 => "July",
        8 => "August",
        9 => "September",
        10 => "October",
        11 => "November",
        12 => "December"
    );

    return $months[intval($monthNum)];
}
$month = monthToWord($currentMonth);

$itemNo = 0;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/title-logo.png">
    <title>PURCHASE REQUEST</title>
    <link href="./output.css" rel="stylesheet">
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->

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

            footer {
                position: fixed;
                bottom: 0;
                left: 0;
                width: 100%;
                background-color: white;
                text-align: center;
                padding: 1rem;
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

        .table-header-cell-height {
            height: 2.5rem;
        }

        .table-body-cell-height {
            height: 20rem;
        }
    </style>
</head>

<body class="py-5 px-10 text-base exclude-background">

    <div class="flex justify-end">
        <button onclick="window.print()" class="mt-4 px-4 py-2 bg-green-700 hover:bg-green-900 text-white rounded print-button ml-auto mb-12"><span class="bi bi-printer">&nbsp;&nbsp;Print</span></button>
    </div>

    <div class="grid grid-cols-2 gap-4 mb-4 ml-3">
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
                <span class="ml-0.5">RIZAL</span>
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

    <div class="p-6 text-base">
        <div class="text-center mb-6">
            <h1 class="text-xl font-bold">PURCHASE REQUEST</h1>
            <p class="text-lg">PhilHealth - NCR</p>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <p><span class="font-bold">Department/Office<span class="ml-1">&nbsp;:</span></span> <span class="underline ml-10">PRO NCR CENTRAL BRANCH</span></p>
                <p><span class="font-bold">Division<span class="ml-24">:</span></span> <span class="underline ml-10">ADMINISTRATIVE UNIT</span></p>
            </div>
            <div class="ml-56">
                <p><span class="font-bold mr-6">PR No:</span><span class="underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> </p>
                <p><span class="font-bold mr-4">Date </span><span class="mr-4">:</span><span class="underline">&nbsp;&nbsp;&nbsp;<?php echo $currentDate; ?>&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
            </div>
        </div>

        <table style="table-layout: fixed;">
            <thead>
                <tr>
                    <th class="border border-gray-900 py-2" style="width: 50px;">Item <br>No.</th>
                    <th class="border border-gray-900 py-2" style="width: 50px;">Unit</th>
                    <th class="border border-gray-900 px-4 py-2" colspan="4">Item Description</th>
                    <th class="border border-gray-900 py-2" style="width: 50px;">Qty</th>
                    <th class="border border-gray-900 px-1 py-2" style="width: 150px;">Estimated <br>Unit Cost</th>
                    <th class="border border-gray-900 px-1 py-2" style="width: 150px;">Estimated <br>Total Cost</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Check if the arrays are set and not empty
                if (isset($_GET['unit']) && isset($_GET['itemDescription']) && isset($_GET['quantity']) && isset($_GET['estimatedUnitCost'])) {
                    $unit = $_GET['unit'];
                    $itemDescriptions = $_GET['itemDescription'];
                    $quantities = $_GET['quantity'];
                    $estimatedUnitCosts = $_GET['estimatedUnitCost'];

                    // Determine the maximum count of all arrays
                    $maxCount = max(count($unit), count($itemDescriptions), count($quantities), count($estimatedUnitCosts));

                    // Initialize grand total
                    $grandTotal = 0;

                    // Loop through the maximum count to ensure each input set is displayed in a new row
                    for ($i = 0; $i < $maxCount; $i++) {
                        echo '<tr>';
                        $itemNo++; // Increment item number for the next row

                        echo '<td class="border border-gray-900 py-2 text-center">' . $itemNo . '</td>';




                        // Check if unit exists for current index
                        echo '<td class="border border-gray-900 py-2 px-2 text-center">';
                        if (isset($unit[$i])) {
                            echo $unit[$i];
                        }
                        echo '</td>';


                        // Check if item description exists for current index
                        echo '<td class="border border-gray-900 py-2 px-2 font-bold" colspan="4">';
                        if (isset($itemDescriptions[$i])) {
                            echo $itemDescriptions[$i];
                        }
                        echo '</td>';

                        // Check if quantity exists for current index
                        echo '<td class="border border-gray-900 py-2 text-center">';
                        if (isset($quantities[$i])) {
                            echo $quantities[$i];
                        }
                        echo '</td>';

                        // Check if estimated unit cost exists for current index
                        echo '<td class="border border-gray-900 py-2 text-center">';
                        if (isset($estimatedUnitCosts[$i])) {
                            echo '₱' . number_format($estimatedUnitCosts[$i]);
                        }
                        echo '</td>';

                        // // Calculate and display the estimated total cost
                        // echo '<td class="border border-gray-900 py-2 text-center font-bold">';
                        // if (isset($quantities[$i]) && isset($estimatedUnitCosts[$i])) {
                        //     $estimatedTotalCost = $quantities[$i] * $estimatedUnitCosts[$i];
                        //     echo $estimatedTotalCost;
                        // }
                        // echo '</td>';
                        //        // Calculate and display the estimated total cost
                        //        if (isset($quantities[$i]) && isset($estimatedUnitCosts[$i])) {
                        //            $estimatedTotalCost = $quantities[$i] * $estimatedUnitCosts[$i];
                        //            // Add to grand total
                        //            $grandTotal += $estimatedTotalCost;
                        //        }
                        //        echo '</td>';


                        // Calculate and display the estimated total cost
                        echo '<td class="border border-gray-900 py-2 text-center font-bold">';
                        if (isset($quantities[$i]) && isset($estimatedUnitCosts[$i])) {
                            // Check if both quantities are numeric
                            if (is_numeric($quantities[$i]) && is_numeric($estimatedUnitCosts[$i])) {
                                $estimatedTotalCost = $quantities[$i] * $estimatedUnitCosts[$i];
                                echo '₱' . number_format($estimatedTotalCost);
                            } else {
                                // Handle the case where one or both quantities are not numeric
                                echo "No Quantity and Estimated Cost Inputted";
                            }
                        } else {
                            // Handle the case where either $quantities[$i] or $estimatedUnitCosts[$i] is not set
                            echo "No value inputted";
                        }

                        // Calculate and display the estimated total cost
                        if (isset($quantities[$i]) && isset($estimatedUnitCosts[$i])) {
                            $estimatedTotalCost = $quantities[$i] * $estimatedUnitCosts[$i];
                            // Add to grand total
                            $grandTotal += $estimatedTotalCost;
                        }
                        echo '</td>';
                        echo '</td>';

                        echo '</tr>';
                    }
                }
                ?>



                <!-- <tr>
                    <td class="border border-gray-900  py-2"></td>
                    <td class="border border-gray-900  py-2"></td>
                    <td class="border border-gray-900  py-2 text-center font-bold" colspan="4">CHARGED TO PETTY CASH FUND</td>
                    <td class="border border-gray-900  py-2"></td>
                    <td class="border border-gray-900  py-2"></td>
                    <td class="border border-gray-900  py-2"></td>
                </tr>
                <tr>
                    <td class="border border-gray-900  py-2"></td>
                    <td class="border border-gray-900  py-2"></td>
                    <td class="border border-gray-900  py-2 text-center font-bold text-xl" colspan="4">Month of <?php echo $month . " " . $currentYear;  ?></td>
                    <td class="border border-gray-900  py-2"></td>
                    <td class="border border-gray-900  py-2"></td>
                    <td class="border border-gray-900  py-2"></td>
                </tr> -->
                <tr>
                    <td class="border border-gray-900  py-2"></td>
                    <td class="border border-gray-900  py-2"></td>
                    <td class="border border-gray-900  py-2 text-center text-sm" colspan="4">***** Nothing Follows *****</td>
                    <td class="border border-gray-900  py-2"></td>
                    <td class="border border-gray-900  py-2"></td>
                    <td class="border border-gray-900  py-2"></td>
                </tr>
                <tr>
                    <td class="border border-gray-900  py-2"></td>
                    <td class="border border-gray-900  py-2"></td>
                    <td class="border border-gray-900  py-2" colspan="4"></td>
                    <td class="border border-gray-900  py-2"></td>
                    <td class="border border-gray-900  py-2"></td>
                    <td class="border border-gray-900  py-2"></td>
                </tr>
                <tr>
                    <td class="border border-gray-900  py-2"></td>
                    <td class="border border-gray-900  py-2"></td>
                    <td class="border border-gray-900  py-2" colspan="4"></td>
                    <td class="border border-gray-900  py-2"></td>
                    <td class="border border-gray-900  py-2"></td>
                    <td class="border border-gray-900  py-2"></td>
                </tr>
                <tr>
                    <td class="border border-gray-900  py-2"></td>
                    <td class="border border-gray-900  py-2"></td>
                    <td class="border border-gray-900  py-2 px-2 font-bold text-xs" colspan="4">
                        C.O.B. / Trust&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :<br>
                        Expense Code&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<br>
                        Charge to&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<br>
                        Budget Limit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</td>
                    <td class="border border-gray-900  py-2"></td>
                    <td class="border border-gray-900  py-2"></td>
                    <td class="border border-gray-900  py-2"></td>
                </tr>
                <tr>
                    <td class="border border-gray-900  py-2"></td>
                    <td class="border border-gray-900  py-2"></td>
                    <td class="border border-gray-900  py-2" colspan="4"></td>
                    <td class="border border-gray-900  py-2 text-center font-bold" colspan="2">Grand Total: </td>
                    <td class="border border-gray-900 py-2 text-center font-bold"><?php echo '₱' . number_format($grandTotal); ?></td>
                </tr>
                <tr>
                    <td class="border border-gray-900  py-2 px-2" colspan="10">We certify that the items and the corresponding amount listed above are based on the CY <?php echo $currentYear; ?> COB and within the approved <?php echo $currentYear; ?> APP. All items requested under this PR SHALL NOT, hereinafter, be available for realignment, unless cancelled within the prescribed period.</td>
                </tr>
                <td class="border border-gray-900  py-2 px-2 font-bold" colspan="10">PURPOSE : </td>
                </tr>

                <tr>
                    <td class="border border-gray-900  py-1" colspan="2"></td>
                    <td class="border border-gray-900  py-1 text-center font-bold" colspan="3">Prepared By :</td>
                    <td class="border border-gray-900  py-1 text-center font-bold" colspan="2">Recommending Approval</td>
                    <td class="border border-gray-900  py-1 text-center font-bold" colspan="3">Approved By</td>
                </tr>
                <tr>
                    <td class="border border-gray-900 px-2 py-8 text-xs" colspan="2">Signature : </td>
                    <td class="border border-gray-900 px-4 py-1 " colspan="3"></td>
                    <td class="border border-gray-900 px-4 py-1 " colspan="2"></td>
                    <td class="border border-gray-900 px-4 py-1 " colspan="3"></td>
                </tr>

                <tr>
                    <td class="border border-gray-900  px-2 py-1 text-xs" colspan="2">Printed Name : </td>
                    <td class="border border-gray-900  py-1 font-bold text-center" colspan="3"><?php echo isset($_GET['prepared']) ? $_GET['prepared'] : ''; ?></td>
                    <td class="border border-gray-900  py-1 font-bold text-center" colspan="2"><?php echo isset($_GET['reco']) ? $_GET['reco'] : ''; ?></td>
                    <td class="border border-gray-900  py-1 font-bold text-center" colspan="3"><?php echo isset($_GET['approved']) ? $_GET['approved'] : ''; ?></td>
                </tr>

                <tr>
                    <td class="border border-gray-900  px-2 py-1 text-xs" colspan="2">Designation : </td>
                    <td class="border border-gray-900  py-1 text-center text-xs " colspan="3"><?php echo isset($_GET['preparedDesignation']) ? $_GET['preparedDesignation'] : ''; ?></td>
                    <td class="border border-gray-900  py-1 text-center text-xs" colspan="2"><?php echo isset($_GET['recoDesignation']) ? $_GET['recoDesignation'] : ''; ?></td>
                    <td class="border border-gray-900  py-1 text-center text-xs" colspan="3"><?php echo isset($_GET['approvedDesignation']) ? $_GET['approvedDesignation'] : ''; ?></td>
                </tr>
                <tr>
                    <td class="border border-gray-900  px-2 py-1 text-xs" colspan="2">Date : </td>
                    <td class="border border-gray-900  py-1 text-center text-xs font-bold" colspan="3"><?php echo $currentDate; ?></td>
                    <td class="border border-gray-900  py-1" colspan="2"></td>
                    <td class="border border-gray-900  py-1" colspan="3"></td>
                </tr>

            </tbody>
        </table>
    </div>

    <footer>
        <div class="flex items-center">
            <img src="images/socotec.png" class="w-20">
            <h1 class="ml-auto font-bold">Control No: &nbsp;</h1>
            <h1><?php echo $new_control_no ?></h1>
        </div>


    </footer>





</body>

</html>
