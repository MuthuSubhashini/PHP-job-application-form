<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require('fpdf/fpdf.php');

/* ========= DB CONNECTION ========= */
$conn = new mysqli("localhost", "root", "", "job_application");
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

/* ========= FILE UPLOAD ========= */
$photoName = "";
$resumeName = "";

if (!empty($_FILES['photo']['name'])) {
    $photoName = time() . "_" . $_FILES['photo']['name'];
    move_uploaded_file($_FILES['photo']['tmp_name'], "uploads/" . $photoName);
}

if (!empty($_FILES['resume']['name'])) {
    $resumeName = time() . "_" . $_FILES['resume']['name'];
    move_uploaded_file($_FILES['resume']['tmp_name'], "uploads/" . $resumeName);
}

/* ========= JSON DATA ========= */
$education = json_encode([
    [
        "degree" => $_POST['eduDegree1'] ?? '',
        "institute" => $_POST['eduInstitute1'] ?? '',
        "year" => $_POST['eduYear1'] ?? '',
        "grade" => $_POST['eduGrade1'] ?? '',
        "city" => $_POST['eduCity1'] ?? ''
    ],
    [
        "degree" => $_POST['eduDegree2'] ?? '',
        "institute" => $_POST['eduInstitute2'] ?? '',
        "year" => $_POST['eduYear2'] ?? '',
        "grade" => $_POST['eduGrade2'] ?? '',
        "city" => $_POST['eduCity2'] ?? ''
    ]
]);

$employment = json_encode([
    [
        "company" => $_POST['empCompany1'] ?? '',
        "position" => $_POST['empPosition1'] ?? '',
        "year" => $_POST['empYear1'] ?? '',
        "reason" => $_POST['empReason1'] ?? ''
    ]
]);

$skills = json_encode([
    [
        "skill" => $_POST['skill1'] ?? '',
        "level" => $_POST['level1'] ?? '',
        "year" => $_POST['skillYear1'] ?? '',
        "institute" => $_POST['skillInstitute1'] ?? ''
    ]
]);

$family = json_encode([
    [
        "name" => $_POST['familyName1'] ?? '',
        "relation" => $_POST['familyRelation1'] ?? '',
        "occupation" => $_POST['familyOccupation1'] ?? ''
    ]
]);

$emergency = json_encode([
    [
        "name" => $_POST['emName1'] ?? '',
        "relation" => $_POST['emRelation1'] ?? '',
        "occupation" => $_POST['emOccupation1'] ?? '',
        "qualification" => $_POST['emQualification1'] ?? '',
        "city" => $_POST['emCity1'] ?? ''
    ]
]);

/* ========= SQL INSERT ========= */
$sql = "INSERT INTO applications 
(photo, resume, education, employment, skills, family, emergency)
VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param(
    "sssssss",
    $photoName,
    $resumeName,
    $education,
    $employment,
    $skills,
    $family,
    $emergency
);
$stmt->execute();

/* ========= PDF GENERATION ========= */
$pdf = new FPDF();
$pdf->AddPage();

/* Title */
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Job Application Form', 0, 1, 'C');
$pdf->Ln(5);

/* Basic Info */
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 8, "Photo File: $photoName", 0, 1);
$pdf->Cell(0, 8, "Resume File: $resumeName", 0, 1);
$pdf->Ln(4);

/* Education */
$pdf->SetFont('Arial', 'B', 13);
$pdf->Cell(0, 10, 'Education Details', 0, 1);
$pdf->SetFont('Arial', '', 11);

foreach (json_decode($education, true) as $edu) {
    $pdf->MultiCell(0, 8,
        "Degree: {$edu['degree']}\n".
        "Institute: {$edu['institute']}\n".
        "Year: {$edu['year']} | Grade: {$edu['grade']} | City: {$edu['city']}\n"
    );
    $pdf->Ln(2);
}

/* Employment */
$pdf->SetFont('Arial', 'B', 13);
$pdf->Cell(0, 10, 'Employment Details', 0, 1);
$pdf->SetFont('Arial', '', 11);

foreach (json_decode($employment, true) as $emp) {
    $pdf->MultiCell(0, 8,
        "Company: {$emp['company']}\n".
        "Position: {$emp['position']}\n".
        "Year: {$emp['year']}\n".
        "Reason: {$emp['reason']}\n"
    );
}

/* Skills */
$pdf->SetFont('Arial', 'B', 13);
$pdf->Cell(0, 10, 'Skills', 0, 1);
$pdf->SetFont('Arial', '', 11);

foreach (json_decode($skills, true) as $skill) {
    $pdf->MultiCell(0, 8,
        "Skill: {$skill['skill']} | Level: {$skill['level']} | Year: {$skill['year']}\n".
        "Institute: {$skill['institute']}\n"
    );
}

/* Family */
$pdf->SetFont('Arial', 'B', 13);
$pdf->Cell(0, 10, 'Family Details', 0, 1);
$pdf->SetFont('Arial', '', 11);

foreach (json_decode($family, true) as $fam) {
    $pdf->MultiCell(0, 8,
        "Name: {$fam['name']} | Relation: {$fam['relation']} | Occupation: {$fam['occupation']}\n"
    );
}

/* Emergency */
$pdf->SetFont('Arial', 'B', 13);
$pdf->Cell(0, 10, 'Emergency Contact', 0, 1);
$pdf->SetFont('Arial', '', 11);

foreach (json_decode($emergency, true) as $em) {
    $pdf->MultiCell(0, 8,
        "Name: {$em['name']}\n".
        "Relation: {$em['relation']} | Occupation: {$em['occupation']}\n".
        "Qualification: {$em['qualification']} | City: {$em['city']}\n"
    );
}

/* ========= FORCE DOWNLOAD ========= */
$fileName = "Job_Application_" . time() . ".pdf";
$pdf->Output('D', $fileName);

$stmt->close();
$conn->close();
exit;
