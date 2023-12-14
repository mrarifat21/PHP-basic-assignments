<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <title>PHP Assignment</title>
</head>


<body class="bg-gray-200 p-6">
    <div class="max-w-md mx-auto bg-white p-8 border rounded-md shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Assignment Form</h2>

        <?php

            if($_SERVER["REQUEST_METHOD"] == "POST"){

                $name = !empty($_POST["username"]) ? htmlspecialchars($_POST["username"]) : "";
              
                $gender = !empty($_POST["gender"]) ? htmlspecialchars($_POST["gender"]) : "";

                $subscribe = !empty($_POST["check"]) ? "Yes" : "No";

                $datepicker = !empty($_POST["date"]) ? htmlspecialchars($_POST["date"]) : "";

                $timepicker = !empty($_POST["time"]) ? htmlspecialchars($_POST["time"]) : "";

                $options = !empty($_POST["options"]) ? $_POST["options"] : [];

                $multicheck = !empty($_POST["multicheckbox"]) ? $_POST["multicheckbox"] : [];

                $country = !empty($_POST["country"]) ? htmlspecialchars($_POST["country"]) : "";

                $option_string = implode(", ", $options);

                $checkbox_string = implode(", ", $multicheck);



                echo "<b>Name:</b> ". $name."<br>";
                echo "<b>Gender:</b> ". $gender."<br>";
                echo "<b>Subscribe:</b> ".$subscribe."<br>";
                echo "<b>Date:</b> ".$datepicker."<br>";
                echo "<b>Time:</b> ".$timepicker."<br>";
                echo "<b>Options:</b> ".$option_string."<br>";
                echo "<b>Checkbox:</b> ".$checkbox_string."<br>";
                echo "<b>Country:</b> ".$country;
                
            }



        ?>

        <form action="#" method="POST">
                    <!-- name -->

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-600">Name:</label>
                <input type="text" id="name" name="username" class="mt-1 p-2 w-full border rounded-md" value="<?php echo $name ?? '' ?>">
            </div>

                                                 <!-- radio -->

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-600">Gender</label>

                <div class="mt-1 space-x-4">
                    <input type="radio" name="gender" value="Male" class="form-radio text-indigo-600" id="male" <?php echo ($gender ?? '')  === 'Male' ? 'checked' : ''; ?>>
                    <label for="male" class="inline-flex items-center">Male</label>
                </div>

                <div class="mt-1 space-x-4">
                    <input type="radio" name="gender" value="Female" class="form-radio text-indigo-600" id="female" <?php echo ($gender ?? '') === 'Female' ? 'checked' : ''; ?>>
                    <label for="female" class="inline-flex items-center">Female</label>
                </div>
            </div>
            
                                                    <!-- checkbox -->
            <div class="mb-4">
                <label for="check" class=" text-sm font-medium test-gray-600">Subscribe</label>
                <input type="checkbox" name="check" id="check" class="form-checkbox text-indigo-600" <?php echo ($subscribe ?? '') === "Yes" ? 'checked' : ''; ?>>
            </div>

                                                  <!-- Date Picker -->
            <div class="mb-4">
            <label for="date" class="block text-sm font-medium text-gray-600">Pick a Date</label>
            <input type="text" id="date" name="date" class="mt-1 p-2 w-full border rounded-md" value="<?php echo $datepicker ?? '' ?>">
            </div>

                                                 <!-- Time Picker  -->
            <div class="mb-4">
                <label for="time" class="block text-sm font-medium text-gray-600">Pick a Time</label>
                <input type="text" id="time" name="time" class="mt-1 p-2 w-full border rounded-md" value="<?php echo $timepicker ?? '' ?>">
            </div>

                                              <!-- Multiselect Dropdown -->

            <div class="mb-4">
                <label for="options" class="block text-sm font-medium text-gray-600" >Select Options</label>
                <select name="options[]" id="options"  class="mt-1 p-2 w-full border rounded-md" multiple>
                    <option value="option1" <?php echo in_array('option1', $options ?? []) ? "selected" : ""  ?>>Option 1</option>
                    <option value="option2" <?php echo in_array('option2', $options ?? []) ? "selected" : ""  ?>>Option 2</option>
                    <option value="option3" <?php echo in_array('option3', $options ?? []) ? "selected" : ""  ?>>Option 3</option>
                </select>
            </div>
                                                     <!-- Multi-checkbox -->
            
            <div class="mb-4">
            <label class="block text-sm font-medium text-gray-600">Select Multiple Options</label>

                <div class="space-y-2">

                    <input type="checkbox" name="multicheckbox[]" value="checkbox1" class="form-checkbox text-indigo-600" id="check1" <?php echo in_array('checkbox1', $multicheck ?? []) ? "checked" : ""  ?>>
                    <label for="check1" class="inline-flex items-center ml-2">Checkbox 1</label><br>

                    <input type="checkbox" name="multicheckbox[]" value="checkbox2" class="form-checkbox text-indigo-600" id="check2" <?php echo in_array('checkbox2', $multicheck ?? []) ? "checked" : ""  ?>>
                    <label for="check2" class="inline-flex items-center ml-2">Checkbox 2</label><br>

                    <input type="checkbox" name="multicheckbox[]" value="checkbox3" class="form-checkbox text-indigo-600" id="check3" <?php echo in_array('checkbox2', $multicheck ?? []) ? "checked" : ""  ?>>
                    <label for="check3" class="inline-flex items-center ml-2">Checkbox 3</label><br>
                </div>

                                                      <!-- Select Dropdown -->

                 <div class="mb-4">
                    <label for="country" class="block text-sm font-medium text-gray-600">Country</label>
                    
                    <select name="country" id="country" class="mt-1 p-2 w-full border rounded-md">
                        <option value="Bangladesh" <?php echo ($country ?? '')=== 'Bangladesh' ? "selected" : "" ?>>Bangladesh</option>
                        <option value="Turkey"<?php echo ($country ?? '')=== 'Turkey' ? "selected" : "" ?>>Turkey</option>
                        <option value="U.S.A"<?php echo ($country ?? '')=== 'U.S.A' ? "selected" : "" ?>>U.S.A</option>
                    </select>
                 </div>
            </div>
                    <div class="mt-6">
                    <button type="submit" class="bg-indigo-600 text-white p-2 rounded-md">Submit</button>
             </div>
        </form>

    </div>


    <script>
    // Initialize Select2 for the multiselect dropdown
    $(document).ready(function() {
        $('#options').select2();
    });

    // Initialize Flatpickr for the date and time pickers
    flatpickr("#date", {
        enableTime: false,
        dateFormat: "Y-m-d",
    });

    flatpickr("#time", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
    });
</script>
  

</body>
</html>