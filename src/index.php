<?php
include 'db_connection.php';
include 'display_trip_ticket.php';
include 'display_control_no.php';
$currentDate = date('Y-m-d');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/title-logo.png">
    <title>Trip Ticket System</title>

    <link href="./output.css" rel="stylesheet">
    <!-- <link href="https://cdn.tailwindcss.com" rel="stylesheet"> -->
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="sweetalert2/dist/sweetalert2.min.css">
    <script src='sweetalert2/dist/sweetalert2.all.min.js'></script>
    <link href="./styles.css" rel="stylesheet">

</head>

<body class="bg-gray-100 flex justify-center items-center h-screen apple-font" style="background-image: url('images/bg.jpg')">

    <div class="container mx-auto p-4 lg:max-w-2xl">
        <div class="bg-white shadow-md rounded-lg p-4 flex flex-col items-center">
            <div class="tex t-xs italic font-bold mt-4">Republic of the Philippines</div>


            <div class="flex space-x-4">
                <p class="flex items-center text-xs">
                    <img src="images/philhealth-logo-1.png" style="height: 50px;">

                </p>

                <p class="flex items-center text-xs">
                <div class="text-base font-bold mt-6">Philippine Health Insurance Corporation</div>


                </p>

                <p class="flex items-center text-xs mb-4">
                    <img src="images/bagong-pilipinas-icon-1.png" style="height: 50px;">

                </p>
            </div>

            <div class="text-xl">RIZAL</div>
            <div class="text-sm font-bold mb-6">DATABASE MONITORING SYSTEM</div>
            <div class="text-sm font-bold mb-6">MAIN MENU</div>

            <div class="space-y-4 space-x-4 mb-4">
                <button class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded" onclick="openModal('trip-ticket-modal')">
                    <i class="bi bi-ticket-perforated"></i>&nbsp;&nbsp;TRIP TICKET
                </button>

                <button class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded" onclick="openModal('riv-modal')">
                    <i class="bi bi-receipt"></i>&nbsp;&nbsp;PURCHASE REQUEST
                </button>

                <!-- <button class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded" onclick="openModal('')">
                    GAS
                </button> -->

                <button class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded" onclick="openModal('settings-modal')">
                    <i class="bi bi-gear-wide-connected"></i>&nbsp;&nbsp;SETTINGS
                </button>

            </div>
        </div>
    </div>

    <div id="trip-ticket-modal" class="modal fixed inset-0 z-50 overflow-auto flex justify-center items-center bg-black bg-opacity-50">

        <div class="modal-content w-full md:w-auto">

            <form id="trip-ticket-form" action="insert_trip_ticket.php" method="post" class="p-4 md:p-8">
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
                        <p class="block text-sm font-bold">PhilHealth Regional Office Rizal Branch</p>

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
                <div>
                    <p class="text-lg text-center tracking-widest italic">DRIVER'S TRIP TICKET</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4 mt-2">
                    <div>
                        <label class="block font-bold text-sm">Trip Ticket Number:</label>
                        <input type="text" class="w-full border border-gray-300 p-2 h-8" name="trip_ticket_number" value="<?php echo 'NCRC-LR-' . $new_trip_ticket_number; ?>" disabled>
                    </div>
                    <div>
                        <label class="block font-bold text-sm">Date:</label>
                        <input type="text" class="w-full border border-gray-300 p-2 h-8" name="date" value="<?php echo $currentDate; ?>" readonly>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block font-bold text-sm">Driver:</label>
                        <select class="w-full border border-gray-300 p-2 h-9 text-sm" name="driver" id="driverSelect" required>
                            <?php foreach ($drivers as $driver) : ?>
                                <option value="<?php echo $driver; ?>"><?php echo $driver; ?></option>
                            <?php endforeach; ?>
                            <option value="">Add New Driver</option>
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
                        <input type="text" class="w-full border border-gray-300 p-2 h-8" name="obs_no" id="obs_no">
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
                            <option value="">Add New Vehicle</option>
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
                    <button type="button" class="bg-red-700 hover:bg-red-900 text-white font-bold py-2 px-4 rounded" onclick="clearTripTicketInput()"><i class="bi bi-trash3-fill"></i>&nbsp;&nbsp;Clear Inputs</button>
                    <button type="button" onclick="window.open('trip_ticket_records.php', '_blank')" class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded"><i class="bi bi-search"></i>&nbsp;&nbsp;Find Record</button>
                    <button type="submit" class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded"><i class="bi bi-cloud-download"></i>&nbsp;&nbsp;Submit</button>
                    <button type="button" class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded" onclick="previewTripTicket()"><i class="bi bi-eye"></i>&nbsp;&nbsp;Preview</button>
                </div>
            </form>
        </div>
    </div>


    <div id="riv-modal" class="modal fixed inset-0 z-50 overflow-auto flex justify-center items-center bg-black bg-opacity-50">
        <div class="modal-content-riv w-full md:w-3/4 lg:w-1/2">
            <form id="riv-form" action="insert_riv.php" method="post" class="p-4 md:p-8">
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
                        <span class="close w-6 h-2 ml-auto cursor-pointer" onclick="closeModal('riv-modal')">&times;</span>
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
                    <p class="text-lg text-center tracking-widest italic">PURCHASE REQUEST</p>
                </div>
                <div id="input-container">
                    <div class="flex input-set mb-4 justify-center mt-4">
                        <div class="md:col-span-1 mr-4">
                            <label class="block font-bold text-sm">Unit</label>
                            <select class="w-20 border border-gray-300 p-2 h-8 text-sm" name="unit[]" id="unitSelect" required>
                                <?php foreach ($prepared as $prepared) : ?>
                                    <option value="<?php echo $prepared; ?>"><?php echo $prepared; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="md:col-span-1 mr-4">
                            <label class="block font-bold text-sm">Item Description</label>
                            <input type="text" class="w-80 border border-gray-300 p-2 h-8" name="itemDescription[]" value="" id="itemDescription" required>
                        </div>
                        <div class="md:col-span-1 mr-4">
                            <label class="block font-bold text-sm">Quantity</label>
                            <input type="number" class="w-16 border border-gray-300 p-2 h-8" name="quantity[]" value="0" id="quantity" required>
                        </div>
                        <div class="md:col-span-1 mr-4">
                            <label class="block font-bold text-sm">Estimated Unit Cost</label>
                            <input type="number" class="w-32 border border-gray-300 p-2 h-8" name="estimatedUnitCost[]" value="0" id="estimatedUnitCost" required>
                        </div>
                        <div class="flex items-center md:w-auto mt-5 justify-center">
                            <button type="button" class="remove-btn bg-red-700 hover:bg-red-900 text-white rounded w-50 h-8 px-2">
                                <span class="bi bi-trash">&nbsp;&nbsp;DELETE INPUT</span>
                            </button>
                        </div>
                    </div>

                </div>
                <div class="space-x-4 flex justify-center mb-4">
                    <button type="button" onclick="addInputSet()" class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded">Add More Items</button>
                </div>


                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4 input-set">
                    <div>
                        <label class="block font-bold text-sm">Prepared By:</label>
                        <select class="w-full border border-gray-300 p-2 h-9 text-sm" name="prepared" id="preparedSelect" required>
                            <option value="">Select / Add New Person Prepared</option>
                            <?php foreach ($prepared as $person) : ?>
                                <option value="<?php echo $person; ?>"><?php echo $person; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div>
                        <label class="block font-bold text-sm">Recommending Approval:</label>
                        <select class="w-full border border-gray-300 p-2 h-9 text-sm" name="reco" id="recoSelect" required>
                            <?php foreach ($reco as $reco) : ?>
                                <option value="<?php echo $reco; ?>"><?php echo $reco; ?></option>
                            <?php endforeach; ?>
                            <option value="">Select / Add New Recommending Approval</option>
                        </select>
                    </div>
                    <div>
                        <label class="block font-bold text-sm">Approved By:</label>
                        <select class="w-full border border-gray-300 p-2 h-9 text-sm" name="approved" id="approvedSelect" required>
                            <?php foreach ($approved as $approved) : ?>
                                <option value="<?php echo $approved; ?>"><?php echo $approved; ?></option>
                            <?php endforeach; ?>
                            <option value="">Select / Add New Approved</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4 input-set">
                    <div>
                        <label class="block font-bold text-sm">Designation: (Prepared)</label>
                        <select class="w-full border border-gray-300 p-2 h-9 text-sm" name="preparedDesignation" id="preparedDesignation" required>
                            <?php foreach ($designation as $designation) : ?>
                                <option value="<?php echo $designation; ?>"><?php echo $designation; ?></option>
                            <?php endforeach; ?>
                            <option value="">Select / Add New Person Prepared</option>
                        </select>
                    </div>
                    <div>
                        <label class="block font-bold text-sm">Designation: (Recommending)</label>
                        <select class="w-full border border-gray-300 p-2 h-9 text-sm" name="recoDesignation" id="recommendingDesignation" required>
                            <?php foreach ($designation as $designation) : ?>
                                <option value="<?php echo $designation; ?>"><?php echo $designation; ?></option>
                            <?php endforeach; ?>
                            <option value="">Select / Add New Recommending Approval</option>
                        </select>
                    </div>
                    <div>
                        <label class="block font-bold text-sm">Designation: (Approved)</label>
                        <select class="w-full border border-gray-300 p-2 h-9 text-sm" name="approvedDesignation" id="approvedDesignation" required>
                            <?php foreach ($designation as $designation) : ?>
                                <option value="<?php echo $designation; ?>"><?php echo $designation; ?></option>
                            <?php endforeach; ?>
                            <option value="">Select / Add New Approved</option>
                        </select>
                    </div>
                </div>

                <input type="hidden" class="w-full border border-gray-300 p-2 h-8" name="control_no" value="<?php echo $new_control_no; ?>" readonly>


                <div class="space-x-4 flex justify-center">
                    <button type="button" class="bg-red-700 hover:bg-red-900 text-white font-bold py-2 px-4 rounded" onclick="clearPurchaseRequestInputs()"><i class="bi bi-trash3-fill"></i>&nbsp;&nbsp;Clear Inputs</button>
                    <button type="button" onclick="window.open('riv_records.php', '_blank')" class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded"><i class="bi bi-search"></i>&nbsp;&nbsp;Find Record</button>
                    <button type="submit" class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded"><i class="bi bi-cloud-download"></i>&nbsp;&nbsp;Submit</button>
                    <button type="button" class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded" onclick="previewRiv()"><i class="bi bi-eye"></i>&nbsp;&nbsp;Preview</button>
                </div>
            </form>
        </div>
    </div>

    <div id="add-driver-modal" class="modal">
        <div class="modal-content" style="width: 30rem; margin-top: 10rem;">
            <form id="add-driver-form" action="insert_driver.php" method="post">
                <span class="close h-2" onclick="closeDriverModal()">&times;</span>

                <label class="block font-bold text-sm text-center">ENTER DRIVER FULL NAME:</label>
                <input type="text" class=" w-64 border border-gray-300 p-2 h-8 mr-8" name="assigned_driver">
                <button class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded mt-4">
                    ADD DRIVER
                </button>
            </form>
        </div>
    </div>



    <div id="add-vehicle-modal" class="modal">
        <div class="modal-content" style="width: 30rem; margin-top: 10rem;">
            <form id="add-vehicle-form" action="insert_vehicle.php" method="post">
                <span class="close h-2" onclick="closeVehicleModal()">&times;</span>

                <label class="block font-bold text-sm mb-4">ENTER VEHICLE NAME AND PLATE NUMBER:</label>
                <input type="text" class="w-64 border border-gray-300 p-2 h-8 mr-8" name="new_vehicle">
                <button class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded">
                    ADD VEHICLE
                </button>
            </form>
        </div>

    </div>

    <div id="add-prepared-modal" class="modal">
        <div class="modal-content" style="width: 30rem; margin-top: 10rem;">
            <form id="add-prepared-form" action="insert_prepared.php" method="post">
                <span class="close h-2" onclick="closePreparedModal()">&times;</span>

                <label class="block font-bold text-sm mb-4 text-center">ENTER NEW PREPARED PERSON:</label>
                <input type="text" class="w-64 border border-gray-300 p-2 h-8 mr-8" name="new_prepared">
                <button class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded">
                    ADD NEW
                </button>
            </form>
        </div>
    </div>

    <div id="add-recommending-modal" class="modal">
        <div class="modal-content" style="width: 30rem; margin-top: 10rem;">
            <form id="add-recommending-form" action="insert_recommending.php" method="post">
                <span class="close h-2" onclick="closeRecommendingModal()">&times;</span>

                <label class="block font-bold text-sm mb-4 text-center">ENTER NEW RECOMMENDING PERSON:</label>
                <input type="text" class="w-64 border border-gray-300 p-2 h-8 mr-8" name="new_recommending">
                <button class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded">
                    ADD NEW
                </button>
            </form>
        </div>
    </div>

    <div id="add-approved-modal" class="modal">
        <div class="modal-content" style="width: 30rem; margin-top: 10rem;">
            <form id="add-approved-form" action="insert_approved.php" method="post">
                <span class="close h-2" onclick="closeApprovedModal()">&times;</span>

                <label class="block font-bold text-sm mb-4 text-center">ENTER NEW APPROVING PERSON:</label>
                <input type="text" class="w-64 border border-gray-300 p-2 h-8 mr-8" name="new_approved">
                <button class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded">
                    ADD NEW
                </button>
            </form>
        </div>
    </div>

    <div id="add-prepared-designation-modal" class="modal">
        <div class="modal-content" style="width: 30rem; margin-top: 10rem;">
            <form id="add-prepared-designation-form" action="insert_prepared_designation.php" method="post">
                <span class="close h-2" onclick="closePreparedDesignationModal()">&times;</span>

                <label class="block font-bold text-sm mb-4 text-center">ENTER NEW PREPARED DESIGNATION:</label>
                <input type="text" class="w-64 border border-gray-300 p-2 h-8 mr-8" name="new_prepared_designation">
                <button class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded">
                    ADD NEW
                </button>
            </form>
        </div>
    </div>

    <div id="add-recommending-designation-modal" class="modal">
        <div class="modal-content" style="width: 30rem; margin-top: 10rem;">
            <form id="add-recommending-designation-form" action="insert_recommending_designation.php" method="post">
                <span class="close h-2" onclick="closeRecommendingDesignationModal()">&times;</span>

                <label class="block font-bold text-sm mb-4 text-center">ENTER NEW RECOMMENDING DESIGNATION:</label>
                <input type="text" class="w-64 border border-gray-300 p-2 h-8 mr-8" name="new_recommending_designation">
                <button class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded">
                    ADD NEW
                </button>
            </form>
        </div>
    </div>

    <div id="add-approved-designation-modal" class="modal">
        <div class="modal-content" style="width: 30rem; margin-top: 10rem;">
            <form id="add-approved-designation-form" action="insert_approved_designation.php" method="post">
                <span class="close h-2" onclick="closeApprovedDesignationModal()">&times;</span>

                <label class="block font-bold text-sm mb-4 text-center">ENTER NEW APRROVE DESIGNATION:</label>
                <input type="text" class="w-64 border border-gray-300 p-2 h-8 mr-8" name="new_approved_designation">
                <button class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded">
                    ADD NEW
                </button>
            </form>
        </div>
    </div>


    <div id="settings-modal" class="modal">
        <div class="modal-content text-base" style="width: 24.5rem; margin-top: 14rem;">
            <div class="flex justify-between items-center space-x-4">
                <h1 class="text-base font-bold">Settings</h1>
                <span class="close w-6 h-6 ml-auto cursor-pointer" onclick="closeModal('settings-modal')">&times;</span>
            </div>
            <div class="space-y-4 mb-4">
                <button class="bg-red-700 hover:bg-red-900 text-white py-2 px-4 rounded" onclick="openModal('remove-driver-modal')">
                    REMOVE DRIVER
                </button>
                <button class="bg-red-700 hover:bg-red-900 text-white py-2 px-4 mx-auto rounded" onclick="openModal('remove-vehicle-modal')">
                    REMOVE VEHICLE
                </button>
            </div>
        </div>
    </div>


    <div id="remove-driver-modal" class="modal">
        <div class="modal-content text-base" style="width: 40rem;">
            <div class="flex justify-between items-center space-x-4">
                <h1 class="text-xl font-bold">Remove Driver</h1>
                <span class="close w-6 h-2 ml-auto cursor-pointer" onclick="closeModal('remove-driver-modal')">&times;</span>
            </div>
            <table class="driver-table" style="width: 100%; margin-top: 1rem;">
                <thead>
                    <tr>
                        <th>Driver Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="removeDriverTable">
                </tbody>
            </table>
        </div>
    </div>



    <div id="remove-vehicle-modal" class="modal">
        <div class="modal-content text-base" style="width: 40rem; margin-top: 5rem;">
            <div class="flex justify-between items-center space-x-4">
                <h1 class="text-xl font-bold">Remove Vehicle</h1>
                <span class="close w-6 h-2 ml-auto cursor-pointer" onclick="closeModal('remove-vehicle-modal')">&times;</span>
            </div>
            <table class="vehicle-table" style="width: 100%; margin-top: 1rem;">
                <thead>
                    <tr>
                        <th>Vehicle Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="removeVehicleTable">
                </tbody>
            </table>
        </div>
    </div>






    <script>
        function clearTripTicketInput() {
            Swal.fire({
                title: 'Are you sure?',
                text: 'This action will clear all input fields. Are you sure you want to proceed?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, clear it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Clear input fields
                    var driverInput = document.getElementById("driverSelect");
                    var passengerInput = document.getElementById("authorized_passenger");
                    var requestingInput = document.getElementById("requesting_official");
                    var obsInput = document.getElementById("obs_no");
                    var dateInput = document.getElementById("date");
                    var destinationInput = document.getElementById("destination");
                    var purposeInput = document.getElementById("purpose");
                    var vehicleInput = document.getElementById("vehicleSelect");
                    var timeInput = document.getElementById("datetimeInput");
                    var hiddenTimeInput = document.getElementById("departure_time");
                    var milageInput = document.getElementById("milage");
                    var prInput = document.getElementById("pr_no");

                    driverInput.value = "";
                    passengerInput.value = "";
                    requestingInput.value = "";
                    obsInput.value = "";
                    dateInput.value = "";
                    destinationInput.value = "";
                    purposeInput.value = "";
                    vehicleInput.value = "";
                    timeInput.value = "";
                    hiddenTimeInput.value = "";
                    milageInput.value = "";
                    prInput.value = "";

                    Swal.fire('Cleared!', 'All input fields have been cleared.', 'success');
                }
            });
        }


        function clearPurchaseRequestInputs() {
            Swal.fire({
                title: 'Are you sure?',
                text: 'This action will clear all input fields. Are you sure you want to proceed?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, clear it!'
            }).then((result) => {
                if (result.isConfirmed) {
            var unitInput = document.getElementById("unitSelect");
            var descriptionInput = document.getElementById("itemDescription");
            var quantityInput = document.getElementById("quantity");
            var estimatedCostInput = document.getElementById("estimatedUnitCost");
            var preparedInput = document.getElementById("preparedSelect");
            var recommendingInput = document.getElementById("recoSelect");
            var approvedInput = document.getElementById("approvedSelect");
            var preparedDesignationInput = document.getElementById("preparedDesignation");
            var recommendingDesignationInput = document.getElementById("recommendingDesignation");
            var approvedDesignationInput = document.getElementById("approvedDesignation");


            // unitInput.value = "";
            descriptionInput.value = "";
            quantityInput.value = "0";
            estimatedCostInput.value = "0";
            preparedInput.value = "";
            recommendingInput.value = "";
            approvedInput.value = "";
            preparedDesignationInput.value = "";
            recommendingDesignationInput.value = "";
            approvedDesignationInput.value = "";

            Swal.fire('Cleared!', 'All input fields have been cleared.', 'success');
                }
            });
        }


        function addInputSet() {
            const container = document.getElementById('input-container');
            const inputSet = document.querySelector('.input-set').cloneNode(true);

            // Clear the input values in the cloned set
            const inputs = inputSet.querySelectorAll('input');
            inputs.forEach(input => input.value = '0');

            // Add event listener to the remove button
            const removeBtn = inputSet.querySelector('.remove-btn');
            removeBtn.addEventListener('click', function() {
                // Clear the input values before removing the set
                inputs.forEach(input => input.value = '');
                container.removeChild(inputSet);
            });

            container.appendChild(inputSet);
        }


        function closeModal(id) {
            document.getElementById(id).style.display = 'none';
        }


        function fetchPrepared(callback) {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'fetch_prepared.php', true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var prepared = JSON.parse(xhr.responseText);
                    callback(prepared);
                }
            };
            xhr.send();
        }

        function fetchRecommending(callback) {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'fetch_recommending_approval.php', true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var reco = JSON.parse(xhr.responseText);
                    callback(reco);
                }
            };
            xhr.send();
        }

        function fetchApproved(callback) {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'fetch_approved.php', true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var approved = JSON.parse(xhr.responseText);
                    callback(approved);
                }
            };
            xhr.send();
        }

        function fetchDesignation(callback) {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'fetch_designation.php', true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var designation = JSON.parse(xhr.responseText);
                    callback(designation);
                }
            };
            xhr.send();
        }

        function fetchUnits(callback) {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'fetch_units.php', true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var units = JSON.parse(xhr.responseText);
                    callback(units);
                }
            };
            xhr.send();
        }

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

        function removeDriver(driver) {
            Swal.fire({
                title: 'Are you sure?',
                text: "Do you really want to remove the driver?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, remove it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch('delete_driver.php', {
                            method: 'DELETE',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                driver: driver
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire(
                                    'Deleted!',
                                    'The driver has been removed.',
                                    'success'
                                );
                                document.querySelector('option[value="' + driver + '"]').remove();
                                document.querySelector('button[onclick="removeDriver(\'' + driver + '\')"]').closest('tr').remove();
                            } else {
                                Swal.fire(
                                    'Error!',
                                    'There was an error removing the driver.',
                                    'error'
                                );
                            }
                        })
                        .catch(error => {
                            Swal.fire(
                                'Error!',
                                'There was an error removing the driver.',
                                'error'
                            );
                        });
                }
            });
        }

        fetchPrepared(function(prepared) {
            var select = document.getElementById('preparedSelect');
            prepared.forEach(function(prepared) {
                var option = document.createElement('option');
                option.value = prepared;
                option.textContent = prepared;
                select.appendChild(option);
            });
        });

        fetchRecommending(function(reco) {
            var select = document.getElementById('recoSelect');
            reco.forEach(function(reco) {
                var option = document.createElement('option');
                option.value = reco;
                option.textContent = reco;
                select.appendChild(option);
            });
        });

        fetchApproved(function(approved) {
            var select = document.getElementById('approvedSelect');
            approved.forEach(function(approved) {
                var option = document.createElement('option');
                option.value = approved;
                option.textContent = approved;
                select.appendChild(option);
            });
        });

        fetchDesignation(function(designation) {
            var select = document.getElementById('preparedDesignation');
            designation.forEach(function(designation) {
                var option = document.createElement('option');
                option.value = designation;
                option.textContent = designation;
                select.appendChild(option);
            });
        });


        fetchDesignation(function(designation) {
            var select = document.getElementById('recommendingDesignation');
            designation.forEach(function(designation) {
                var option = document.createElement('option');
                option.value = designation;
                option.textContent = designation;
                select.appendChild(option);
            });
        });

        fetchDesignation(function(designation) {
            var select = document.getElementById('approvedDesignation');
            designation.forEach(function(designation) {
                var option = document.createElement('option');
                option.value = designation;
                option.textContent = designation;
                select.appendChild(option);
            });
        });

        fetchUnits(function(unit) {
            var select = document.getElementById('unitSelect');
            unit.forEach(function(unit) {
                var option = document.createElement('option');
                option.value = unit;
                option.textContent = unit;
                select.appendChild(option);
            });
        });


        fetchDrivers(function(drivers) {
            var select = document.getElementById('driverSelect');
            drivers.forEach(function(driver) {
                var option = document.createElement('option');
                option.value = driver;
                option.textContent = driver;
                select.appendChild(option);
            });

            var tableBody = document.getElementById('removeDriverTable');
            tableBody.innerHTML = '';
            drivers.forEach(function(driver) {
                var row = tableBody.insertRow();
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                cell1.className = "border border-gray-400 px-18 text-center whitespace-nowrap";
                cell2.className = "border border-gray-400 px-18 text-center whitespace-nowrap";
                cell1.innerHTML = driver;
                cell2.innerHTML = '<button onclick="removeDriver(\'' + driver + '\')" class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 my-2 px-4 rounded">Remove</button>';
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

        function removeVehicle(vehicle) {
            Swal.fire({
                title: 'Are you sure?',
                text: "Do you really want to remove the vehicle?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, remove it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch('delete_vehicle.php', {
                            method: 'DELETE',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                vehicle: vehicle
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire(
                                    'Deleted!',
                                    'The vehicle has been removed.',
                                    'success'
                                );
                                document.querySelector('option[value="' + vehicle + '"]').remove();
                                document.querySelector('button[onclick="removeVehicle(\'' + vehicle + '\')"]').closest('tr').remove();
                            } else {
                                Swal.fire(
                                    'Error!',
                                    'There was an error removing the vehicle.',
                                    'error'
                                );
                            }
                        })
                        .catch(error => {
                            Swal.fire(
                                'Error!',
                                'There was an error removing the vehicle.',
                                'error'
                            );
                        });
                }
            });
        }

        fetchVehicles(function(vehicles) {
            var select = document.getElementById('vehicleSelect');
            vehicles.forEach(function(vehicle) {
                var option = document.createElement('option');
                option.value = vehicle;
                option.textContent = vehicle;
                select.appendChild(option);
            });

            var tableBody = document.getElementById('removeVehicleTable');
            tableBody.innerHTML = '';
            vehicles.forEach(function(vehicle) {
                var row = tableBody.insertRow();
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                cell1.className = "border border-gray-400 px-18 text-center whitespace-nowrap";
                cell2.className = "border border-gray-400 px-18 text-center whitespace-nowrap";
                cell1.innerHTML = vehicle;
                cell2.innerHTML = '<button onclick="removeVehicle(\'' + vehicle + '\')" class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 my-2 px-4 rounded">Remove</button>';
            });
        });




        function openModal(modalId) {
            document.getElementById(modalId).style.display = 'flex';
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }

        window.onclick = function(event) {
            const modals = document.getElementsByClassName('modal');
            for (let i = 0; i < modals.length; i++) {
                if (event.target == modals[i]) {
                    modals[i].style.display = 'none';
                }
            }
        }

        function previewTripTicket() {
            var formData = new FormData(document.getElementById('trip-ticket-form'));
            var queryString = new URLSearchParams(formData).toString();

            window.open('trip_ticket_report.php?' + queryString, '_blank');
        }

        function previewRiv() {
            var formData = new FormData(document.getElementById('riv-form'));
            var queryString = new URLSearchParams(formData).toString();

            window.open('riv_report.php?' + queryString, '_blank');
        }

        var datetimeInput = document.getElementById("datetimeInput");

        datetimeInput.addEventListener("change", function() {
            var datetimeValue = this.value;
            var newValue = datetimeValue.replace("T", " ");

            this.value = newValue;
        });

        function showAddNewVehicleModal() {
            document.getElementById('add-vehicle-modal').style.display = 'block';

            var select = document.getElementById('vehicleSelect');
            select.value = '';
        }

        function addNewVehicle() {
            var newVehicle = document.getElementById('newVehicleInput').value;

            var select = document.getElementById('vehicleSelect');
            var option = document.createElement("option");
            option.text = newVehicle;
            option.value = newVehicle;
            select.add(option);

            select.value = newVehicle;

            document.getElementById('add-vehicle-modal').style.display = 'none';
        }


        function closeVehicleModal() {
            document.getElementById('add-vehicle-modal').style.display = 'none';

            var select = document.getElementById('vehicleSelect');
            select.selectedIndex = 0;
        }

        document.getElementById('vehicleSelect').addEventListener('change', function() {
            if (this.value === '') {
                document.getElementById('add-vehicle-modal').style.display = 'block';
            } else {
                document.getElementById('add-vehicle-modal').style.display = 'none';
            }
        });

        function showAddNewPreparedModal() {
            document.getElementById('add-prepared-modal').style.display = 'block';

            var select = document.getElementById('preparedSelect');
            select.value = ''; // Set the default value to empty string
        }

        function addNewPrepared() {
            var newPrepared = document.getElementById('newPreparedInput').value;

            var select = document.getElementById('preparedSelect');
            var option = document.createElement("option");
            option.text = newPrepared;
            option.value = newPrepared;
            select.add(option);

            select.value = newPrepared;

            document.getElementById('add-prepared-modal').style.display = 'none';
        }

        function closePreparedModal() {
            document.getElementById('add-prepared-modal').style.display = 'none';

            var select = document.getElementById('preparedSelect');
            select.selectedIndex = 0;
        }

        document.getElementById('preparedSelect').addEventListener('change', function() {
            if (this.value === '') { // Check for empty string
                document.getElementById('add-prepared-modal').style.display = 'block';
            } else {
                document.getElementById('add-prepared-modal').style.display = 'none';
            }
        });


        function showAddNewRecommendingModal() {
            document.getElementById('add-recommending-modal').style.display = 'block';

            var select = document.getElementById('recoSelect');
            select.value = '';
        }

        function addNewRecommending() {
            var newRecommending = document.getElementById('newRecommendingInput').value;

            var select = document.getElementById('recoSelect');
            var option = document.createElement("option");
            option.text = newRecommending;
            option.value = newRecommending;
            select.add(option);

            select.value = newRecommending;

            document.getElementById('add-recommending-modal').style.display = 'none';
        }

        function closeRecommendingModal() {
            document.getElementById('add-recommending-modal').style.display = 'none';

            var select = document.getElementById('recoSelect');
            select.selectedIndex = 0;
        }

        document.getElementById('recoSelect').addEventListener('change', function() {
            if (this.value === '') {
                document.getElementById('add-recommending-modal').style.display = 'block';
            } else {
                document.getElementById('add-recommending-modal').style.display = 'none';
            }
        });





        function showAddNewPreparedDesignationModal() {
            document.getElementById('add-prepared-designation-modal').style.display = 'block';

            var select = document.getElementById('preparedDesignation');
            select.value = '';
        }

        function addNewPreparedDesignation() {
            var newPreparedDesignation = document.getElementById('newPreparedDesignationInput').value;

            var select = document.getElementById('preparedDesignation');
            var option = document.createElement("option");
            option.text = newPreparedDesignation;
            option.value = newPreparedDesignation;
            select.add(option);

            select.value = newPreparedDesignation;

            document.getElementById('add-prepared-designation-modal').style.display = 'none';
        }

        function closePreparedDesignationModal() {
            document.getElementById('add-prepared-designation-modal').style.display = 'none';

            var select = document.getElementById('preparedDesignation');
            select.selectedIndex = 0;
        }

        document.getElementById('preparedDesignation').addEventListener('change', function() {
            if (this.value === '') {
                document.getElementById('add-prepared-designation-modal').style.display = 'block';
            } else {
                document.getElementById('add-prepared-designation-modal').style.display = 'none';
            }
        });







        function showAddNewApprovedModal() {
            document.getElementById('add-approved-modal').style.display = 'block';

            var select = document.getElementById('approvedSelect');
            select.value = '';
        }

        function addNewApproved() {
            var newApproved = document.getElementById('newApprovedInput').value;

            var select = document.getElementById('approvedSelect');
            var option = document.createElement("option");
            option.text = newApproved;
            option.value = newApproved;
            select.add(option);

            select.value = newApproved;

            document.getElementById('add-approved-modal').style.display = 'none';
        }

        function closeApprovedModal() {
            document.getElementById('add-approved-modal').style.display = 'none';

            var select = document.getElementById('approvedSelect');
            select.selectedIndex = 0;
        }

        document.getElementById('approvedSelect').addEventListener('change', function() {
            if (this.value === '') {
                document.getElementById('add-approved-modal').style.display = 'block';
            } else {
                document.getElementById('add-approved-modal').style.display = 'none';
            }
        });




        function showAddNewPreparedDesignationModal() {
            document.getElementById('add-prepared-designation-modal').style.display = 'block';

            var select = document.getElementById('preparedDesignation');
            select.value = '';
        }

        function addNewPreparedDesignation() {
            var newPreparedDesignation = document.getElementById('newPreparedDesignationInput').value;

            var select = document.getElementById('preparedDesignation');
            var option = document.createElement("option");
            option.text = newPreparedDesignation;
            option.value = newPreparedDesignation;
            select.add(option);

            select.value = newPreparedDesignation;

            document.getElementById('add-prepared-designation-modal').style.display = 'none';
        }

        function closePreparedDesignationModal() {
            document.getElementById('add-prepared-designation-modal').style.display = 'none';

            var select = document.getElementById('preparedDesignation');
            select.selectedIndex = 0;
        }

        document.getElementById('preparedDesignation').addEventListener('change', function() {
            if (this.value === '') {
                document.getElementById('add-prepared-designation-modal').style.display = 'block';
            } else {
                document.getElementById('add-prepared-designation-modal').style.display = 'none';
            }
        });



        function showAddNewRecommendingDesignationModal() {
            document.getElementById('add-recommending-designation-modal').style.display = 'block';

            var select = document.getElementById('recommendingDesignation');
            select.value = '';
        }

        function addNewRecommendingDesignation() {
            var newRecommendingDesignation = document.getElementById('newRecommendingDesignationInput').value;

            var select = document.getElementById('recommendingDesignation');
            var option = document.createElement("option");
            option.text = newRecommendingDesignation;
            option.value = newRecommendingDesignation;
            select.add(option);

            select.value = newRecommendingDesignation;

            document.getElementById('add-recommending-designation-modal').style.display = 'none';
        }

        function closeRecommendingDesignationModal() {
            document.getElementById('add-recommending-designation-modal').style.display = 'none';

            var select = document.getElementById('recommendingDesignation');
            select.selectedIndex = 0;
        }

        document.getElementById('recommendingDesignation').addEventListener('change', function() {
            if (this.value === '') {
                document.getElementById('add-recommending-designation-modal').style.display = 'block';
            } else {
                document.getElementById('add-recommending-designation-modal').style.display = 'none';
            }
        });



        function showAddNewApprovedDesignationModal() {
            document.getElementById('add-approved-designation-modal').style.display = 'block';

            var select = document.getElementById('approvedDesignation');
            select.value = '';
        }

        function addNewApprovedDesignation() {
            var newApprovedDesignation = document.getElementById('newApprovedDesignationInput').value;

            var select = document.getElementById('approvedDesignation');
            var option = document.createElement("option");
            option.text = newApprovedDesignation;
            option.value = newApprovedDesignation;
            select.add(option);

            select.value = newApprovedDesignation;

            document.getElementById('add-approved-designation-modal').style.display = 'none';
        }

        function closeApprovedDesignationModal() {
            document.getElementById('add-approved-designation-modal').style.display = 'none';

            var select = document.getElementById('approvedDesignation');
            select.selectedIndex = 0;
        }

        document.getElementById('approvedDesignation').addEventListener('change', function() {
            if (this.value === '') {
                document.getElementById('add-approved-designation-modal').style.display = 'block';
            } else {
                document.getElementById('add-approved-designation-modal').style.display = 'none';
            }
        });










        function showAddNewDriverModal() {
            document.getElementById('add-driver-modal').style.display = 'block';

            var select = document.getElementById('driverSelect');
            select.value = '';
        }

        function addNewDriver() {
            var newDriver = document.getElementById('newDriverInput').value;

            var select = document.getElementById('driverSelect');
            var option = document.createElement("option");
            option.text = newDriver;
            option.value = newDriver;
            select.add(option);

            select.value = newDriver;

            document.getElementById('add-driver-modal').style.display = 'none';
        }


        function closeDriverModal() {
            document.getElementById('add-driver-modal').style.display = 'none';

            var select = document.getElementById('driverSelect');
            select.selectedIndex = 0;
        }

        function closeSettingsModal() {
            document.getElementById('settings-modal').style.display = 'none';
        }

        function closeRemoveDriverModal() {
            document.getElementById('remove-driver-modal').style.display = 'none';
        }

        function closeRemoveVehicleModal() {
            document.getElementById('remove-vehicle-modal').style.display = 'none';
        }

        document.getElementById('driverSelect').addEventListener('change', function() {
            if (this.value === '') {
                document.getElementById('add-driver-modal').style.display = 'block';
            } else {
                document.getElementById('add-driver-modal').style.display = 'none';
            }
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


        // var tomorrowManila = new Date(new Date().toLocaleString("en-US", {
        //     timeZone: "Asia/Manila"
        // }));
        // tomorrowManila.setDate(tomorrowManila.getDate());

        // var tomorrowISO = tomorrowManila.toISOString().split('T')[0];
        // document.getElementById('date').setAttribute('min', tomorrowISO);
        // document.getElementById('rivDate').setAttribute('min', tomorrowISO);
    </script>

</body>

</html>