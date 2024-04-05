<?php
if (isset($_FILES['excel_file'])) {
    require_once 'config/database.php';
    $sql = "SELECT * FROM brand_names";
    $result = $conn->query($sql);

    // Prepare SQL statement for inserting data into the database
    $sql = "INSERT INTO worksheet (
        brand_name,
        case_type,
        date_attempted,
        region,
        city,
        case_number,
        vin_number,
        engineer_name,
        parts_taken_from,
        action_taken,
        final_status,
        remarks,
        location_type,
        from_location,
        customer_location,
        total_km,
        home_or_ec,
        jb_number,
        rectified_by_ecl,
        rectified_by_finance_team,
        note
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        'sssssssssssssssssssss',
        $brand_name,
        $case_type,
        $date_attempted,
        $region,
        $city,
        $case_number,
        $vin_number,
        $engineer_name,
        $parts_taken_from,
        $action_taken,
        $final_status,
        $remarks,
        $location_type,
        $from_location,
        $customer_location,
        $total_km,
        $home_or_ec,
        $jb_number,
        $rectified_by_ecl,
        $rectified_by_finance_team,
        $note
    );

    // Extract data from the uploaded Excel file and insert into the database
    $file = $_FILES['excel_file']['tmp_name'];
    require_once 'vendor/autoload.php';
    $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
    $spreadsheet = $reader->load($file);
    $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

    foreach ($sheetData as $row) {
        // Assign values to variables for binding
        $brand_name = $row['A'];
        $case_type = $row['B'];
        $date_attempted = $row['C'];
        $region = $row['D'];
        $city = $row['E'];
        $case_number = $row['F'];
        $vin_number = $row['G'];
        $engineer_name = $row['H'];
        $parts_taken_from = $row['I'];
        $action_taken = $row['J'];
        $final_status = $row['K'];
        $remarks = $row['L'];
        $location_type = $row['M'];
        $from_location = $row['N'];
        $customer_location = $row['O'];
        $total_km = $row['P'];
        $home_or_ec = $row['Q'];
        $jb_number = $row['R'];
        $rectified_by_ecl = $row['S'];
        $rectified_by_finance_team = $row['T'];
        $note = $row['U'];

        // Execute the prepared statement
        if (!$stmt->execute()) {
            // If insertion fails, return status 500
            http_response_code(500);
            exit("Error inserting data: " . $stmt->error);
        }
    }

    // Close statement and database connection
    $stmt->close();
    $conn->close();

    // If all data is inserted successfully, return status 200
    http_response_code(200);
    exit();
} else {
    // If file not received, return status 400
    http_response_code(400);
    exit("No file uploaded.");
}
?>
