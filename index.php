<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Job Application Form</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js" defer></script>
</head>
<body>

<form action="submit.php" method="POST" enctype="multipart/form-data">


<!-- ================================================= PAGE 1 ================================================= -->
<div class="a4">

  <!-- HEADER -->
  <table class="header-table">
    <tr>
      <td class="logo-cell">
        <img class="logo" src="logo.png" alt="Logo">
      </td>

      <td class="company-cell">
        <h1>7S IQ PRIVATE LIMITED</h1>
        <h2 class="title">Application Form</h2>
      </td>

      <td class="photo-cell">
        <div class="photo-upload">
          <div class="photo-box">
            Photo
          </div>
          <input type="file" name="photo" accept="image/*" required>
        </div>
      </td>
    </tr>
  </table>

  <!-- DATE / POSITION / EMP TYPE -->
  <table class="table">
    <tr>
      <td style="width:25%">
        <label>Date of Application</label> 
        <input type="date" name="applicationDate" required>
      </td>

      <td style="width:25%">
        <label>Position</label>
        <input type="text" name="position" placeholder="Enter position applied for" required>
      </td>

      <td style="width:50%">
        Employment Type
        <div class="radio-row">
          <label><input type="radio" name="empType" value="Full-Time" required> Full-Time</label>
          <label><input type="radio" name="empType" value="Course"> Course</label>
          <label><input type="radio" name="empType" value="Intern"> Intern</label>
        </div>
      </td>
    </tr>
  </table>

  <!-- PERSONAL INFORMATION -->
  <h3>Personal Information</h3>
  <table class="table">
    <tr>
      <td colspan="3">
        Full Name
        <input name="fullName" placeholder="Enter your full name" required>
      </td>
      <td>
        Nationality
        <input name="nationality" placeholder="Enter nationality">
      </td>
    </tr>

    <tr>
      <td colspan="4">
        Address
        <textarea name="address" placeholder="Enter full address" required></textarea>
      </td>
    </tr>

    <tr>
      <td>
        Phone
        <input name="phone" placeholder="10-digit mobile number" pattern="[0-9]{10}" required>
      </td>
      <td>
        Email
        <input type="email" name="email" placeholder="example@email.com" required>
      </td>
      <td colspan="2">
        Date of Birth
        <input type="date" name="dob" required>
      </td>
    </tr>

    <tr>
      <td>
        Blood Group
        <input name="bloodGroup" placeholder="Eg: O+">
      </td>
      <td colspan="2">
        Years of Work
        <input name="experience" placeholder="Total years of experience">
      </td>
      <td>
        Aadhar No
        <input name="aadhar" placeholder="12-digit Aadhar number" pattern="[0-9]{12}" required>
      </td>
    </tr>

    <tr>
      <td colspan="4">
        Marital Status
        <div class="radio-row">
          <label><input type="radio" name="marital" value="Single" required> Single</label>
          <label><input type="radio" name="marital" value="Married"> Married</label>
        </div>
      </td>
    </tr>
  </table>

  <!-- EDUCATIONAL BACKGROUND -->
  <h3>Educational Background</h3>
  <table class="table center">
    <tr>
      <th>Degree / Course</th>
      <th>University / Institute</th>
      <th>Year</th>
      <th>Grade</th>
      <th>City</th>
    </tr>
    <tr>
      <td><input name="eduDegree1" required></td>
      <td><input name="eduInstitute1" required></td>
      <td><input name="eduYear1" required></td>
      <td><input name="eduGrade1" required></td>
      <td><input name="eduCity1" required></td>
    </tr>
    <tr>
      <td><input name="eduDegree2"></td>
      <td><input name="eduInstitute2"></td>
      <td><input name="eduYear2"></td>
      <td><input name="eduGrade2"></td>
      <td><input name="eduCity2"></td>
    </tr>
    <tr>
      <td><input name="eduDegree3"></td>
      <td><input name="eduInstitute3"></td>
      <td><input name="eduYear3"></td>
      <td><input name="eduGrade3"></td>
      <td><input name="eduCity3"></td>
    </tr>
  </table>

  <!-- EMPLOYMENT HISTORY -->
  <h3>Employment History</h3>
  <table class="table center">
    <tr>
      <th>Company</th>
      <th>Position</th>
      <th>Year</th>
      <th>Reason for Leaving</th>
    </tr>
    <tr>
      <td><input name="empCompany1"></td>
      <td><input name="empPosition1"></td>
      <td><input name="empYear1"></td>
      <td><input name="empReason1"></td>
    </tr>
    <tr>
      <td><input name="empCompany2"></td>
      <td><input name="empPosition2"></td>
      <td><input name="empYear2"></td>
      <td><input name="empReason2"></td>
    </tr>
  </table>

  <!-- SKILLS -->
  <h3>Skills & Training</h3>
  <table class="table center">
    <tr>
      <th>Skill / Training</th>
      <th>Level</th>
      <th>Year</th>
      <th>Institute</th>
    </tr>
    <tr>
      <td><input name="skill1"></td>
      <td><input name="level1"></td>
      <td><input name="skillYear1"></td>
      <td><input name="skillInstitute1"></td>
    </tr>
    <tr>
      <td><input name="skill2"></td>
      <td><input name="level2"></td>
      <td><input name="skillYear2"></td>
      <td><input name="skillInstitute2"></td>
    </tr>
  </table>

  <div class="footer">
    Attach your resume and portfolio to this job application form.<br>
    No 20, 6<sup>th</sup> school street, Jafferkhanpet, Chennai-600083<br>
    +91 7397593704 | info@7siq.com | www.7siq.com
  </div>

</div>

<div class="page-break"></div>

<!-- ================================================= PAGE 2 ================================================= -->
<div class="a4">

  <table class="header-table">
    <tr>
      <td></td>
      <td class="company-cell">
        <h1>7S IQ PRIVATE LIMITED</h1>
        <h2 class="title">Application Form</h2>
      </td>
      <td class="logo-cell" style="text-align:right">
        <img class="logo" src="logo.png">
      </td>
    </tr>
  </table>

  <h3>Family Details</h3>
  <table class="table center">
    <tr><th>Name</th><th>Relationship</th><th>Occupation</th></tr>
    <tr>
      <td><input name="familyName1"></td>
      <td><input name="familyRelation1"></td>
      <td><input name="familyOccupation1"></td>
    </tr>
    <tr>
      <td><input name="familyName2"></td>
      <td><input name="familyRelation2"></td>
      <td><input name="familyOccupation2"></td>
    </tr>
  </table>

  <h3>Emergency Contact</h3>
  <table class="table center">
    <tr>
      <th>Name</th><th>Relationship</th><th>Occupation</th>
      <th>Qualification</th><th>City</th>
    </tr>
    <tr>
      <td><input name="emName1"></td>
      <td><input name="emRelation1"></td>
      <td><input name="emOccupation1"></td>
      <td><input name="emQualification1"></td>
      <td><input name="emCity1"></td>
    </tr>
    <tr>
      <td><input name="emName2"></td>
      <td><input name="emRelation2"></td>
      <td><input name="emOccupation2"></td>
      <td><input name="emQualification2"></td>
      <td><input name="emCity2"></td>
    </tr>
  </table>

  <h3>Joining Details</h3>
  <table class="table">
    <tr><td>Joining Date</td><td><input type="date" name="joiningDate"></td></tr>
    <tr><td>Fees</td><td><input name="fees"></td></tr>
    <tr><td>First Installment</td><td><input type="date" name="installment1"></td></tr>
    <tr><td>Second Installment</td><td><input type="date" name="installment2"></td></tr>
    <tr><td>Third Installment</td><td><input type="date" name="installment3"></td></tr>
  </table>

  <h3>Bank Details</h3>
  <table class="table">
    <tr><td>Bank Name</td><td><input name="bankName"></td></tr>
    <tr><td>IFSC</td><td><input name="ifsc"></td></tr>
    <tr><td>Branch</td><td><input name="branch"></td></tr>
    <tr><td>Account No</td><td><input name="accountNo"></td></tr>
  </table>

  <div class="resume-note">
    <p>Upload Resume (PDF only)</p>
    <input type="file" name="resume" accept="application/pdf" required>
  </div>

  <div class="submit-wrapper">
    <button type="submit">Submit Application</button>
  </div>

</div>

</form>
</body>
</html>
