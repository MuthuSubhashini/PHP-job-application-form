<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

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

if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

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

if ($stmt->execute()) {
    echo "<h2>✅ Application submitted successfully</h2>";
} else {
    echo "❌ Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
