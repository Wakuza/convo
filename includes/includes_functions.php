<?php
    $resultPosition = mysql_query("SELECT * FROM position_type ORDER by position_name ASC");
    $resultDepartment = mysql_query("SELECT * FROM department ORDER by department_name ASC");
    $resultLocation = mysql_query("SELECT * FROM location ORDER BY convo_location ASC");

    // State Creation
	$states = array(
		"Alabama" => "AL",
    	"Alaska" => "AK",
    	"Arizona" => "AZ",
    	"Arkansas" => "AR",
    	"California" => "CA",
    	"Colorado" => "CO",
    	"Connecticut" => "CT",
    	"Delaware" => "DE",
    	"Florida" => "FL",
    	"Georgia" => "GA",
    	"Hawaii" => "HI",
    	"Idaho" => "ID",
    	"Illinois" => "IL",
        "Indiana" => "IN",
    	"Iowa" => "IA",
    	"Kansas" => "KS",
    	"Kentucky" => "KY",
    	"Louisana" => "LA",
    	"Maine" => "ME",
    	"Maryland" => "MD",
    	"Massachusetts" => "MA",
    	"Michigan" => "MI",
    	"Minnesota" => "MN",
    	"Mississippi" => "MS",
    	"Missouri" => "MO",
    	"Montana" => "MT",
    	"Nebraska" => "NE",
    	"Nevada" => "NV",
    	"New Hampshire" => "NH",
    	"New Jersey" => "NJ",
    	"New Mexico" => "NM",
    	"New York" => "NY",
    	"North Carolina" => "NC",
    	"North Dakota" => "ND",
    	"Ohio" => "OH",
    	"Oklahoma" => "OK",
    	"Oregon" => "OR",
    	"Pennsylvania" => "PA",
    	"Rhode Island" => "RI",
    	"South Carolina" => "SC",
    	"South Dakota" => "SD",
    	"Tennessee" => "TN",
    	"Texas" => "TX",
    	"Utah" => "UT",
    	"Vermont" => "VT",
    	"Virginia" => "VA",
    	"Washington" => "WA",
    	"West Virginia" => "WV",
    	"Wisconsin" => "WI",
    	"Wyoming" => "WY",
	);
    function create_option_list($data, $title) {
        $output = "<option value=''>Select a $title</option>";
        
        foreach($data as $name) {
            $output .= "<option value='$name'";
            if(isset($_POST["submit"]) && $_POST["res_state"] == $name){
                $output .= "selected='selected'";
            }
            $output .= ">$name</option>";
        }
        return $output;
    }	// End Create Option List Function

?>