<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Page</title>
    <script>
        if (performance.navigation.type === 1) {
            window.location.href = 'http://localhost/demo/stockpage.PHP';
        }

        function handleSubmit() {
            document.getElementById("submitBtn").disabled = true;
            document.getElementById("stockForm").submit();
            document.getElementById("stockForm").reset();
        }


        function toggleFields() {
            var actionSelect = document.getElementById('action-select');
            var user_AmountLabel = document.getElementById('user-Amount-label');
            var user_AmountInput = document.getElementById('user_Amount');
            var amount_Filterlabel = document.getElementById('amount_Filter_label');
            var amount_Filterinput = document.getElementById('amount_Filter');
            var selected_optionlabel = document.getElementById('selected_option_label');
            var selected_optioninput = document.getElementById('selected_option');
            var itemidlabel = document.getElementById('item_id_label');
            var itemidinput = document.getElementById('item_id');
            var findproductlabel = document.getElementById('find_product_label');
            var findproductinput = document.getElementById('find_product');
            var rowlabel = document.getElementById('iteam_row_label');
            var rowinput = document.getElementById('iteam_row');
            var shelflabel = document.getElementById('iteam_shelf_label');
            var shelfinput = document.getElementById('iteam_shelf');

            if (actionSelect.value === 'null') {
                user_AmountLabel.style.display = 'none';
                user_AmountInput.style.display = 'none';
                amount_Filterlabel.style.display = 'none';
                amount_Filterinput.style.display = 'none';
                selected_optionlabel.style.display = 'none';
                selected_optioninput.style.display = 'none';
                findproductlabel.style.display = 'none';
                findproductinput.style.display = 'none';
                rowlabel.style.display = 'none';
                rowinput.style.display = 'none';
                shelflabel.style.display = 'none';
                shelfinput.style.display = 'none';
                itemidlabel.style.display = 'none';
                itemidinput.style.display = 'none';
            } else if (actionSelect.value === 'update') {
                user_AmountLabel.style.display = 'block';
                user_AmountInput.style.display = 'block';
                itemidlabel.style.display = 'block';
                itemidinput.style.display = 'block';
                amount_Filterlabel.style.display = 'none';
                amount_Filterinput.style.display = 'none';
                selected_optionlabel.style.display = 'block';
                selected_optioninput.style.display = 'block';
                findproductlabel.style.display = 'none';
                findproductinput.style.display = 'none';
                rowlabel.style.display = 'none';
                rowinput.style.display = 'none';
                shelflabel.style.display = 'none';
                shelfinput.style.display = 'none';
            } else if (actionSelect.value === 'filter') {
                user_AmountLabel.style.display = 'block';
                user_AmountInput.style.display = 'block';
                amount_Filterlabel.style.display = 'block';
                amount_Filterinput.style.display = 'block';
                selected_optionlabel.style.display = 'none';
                selected_optioninput.style.display = 'none';
                amount_Filterlabel.style.display = 'block';
                amount_Filterinput.style.display = 'block';
                rowlabel.style.display = 'block';
                rowinput.style.display = 'block';
                shelflabel.style.display = 'block';
                shelfinput.style.display = 'block';
                findproductlabel.style.display = 'block';
                findproductinput.style.display = 'block';
                itemidlabel.style.display = 'none';
                itemidinput.style.display = 'none';
            }
        }
    </script>
</head>
<body>

<form id="stockForm" method="post" action="" onsubmit="handleSubmit(); return false;">
    <select name="action" id="action-select" onchange="toggleFields();">
        <option value="null">null</option>
        <option value="update">update</option>
        <option value="filter">filter</option>
    </select><br><br>

    <label for="user_Amount" id="user-Amount-label" style="display:none;">Amount: </label>
    <input type="number" id="user_Amount" name="user_Amount" style="display:none;" min="0" step="1">

    <label for="amount_Filter" id="amount_Filter_label" style="display:none;">Amount Filter:</label>
    <select name="amount_Filter" id="amount_Filter" style="display:none;">
        <option value="">select</option>
        <option value="=">equal</option>
        <option value="<">less than</option>
        <option value=">">greater than</option>
    </select>

    <label for="item_id" id="item_id_label" style="display:none;">Item ID:</label>
    <input type="number" id="item_id" name="item_id" style="display:none;" min="0" step="1">

    <label for="selected_option" id="selected_option_label" style="display:none;">Selected Option:</label>
    <select name="selected_option" id="selected_option" style="display:none;">
        <option value="null">select</option>
        <option value="setto">set to</option>
        <option value="remove">remove</option>
    </select>

    <label for="find_product" id="find_product_label" style="display:none;">Product Name:</label>
    <input type="text" id="find_product" name="find_product" style="display:none;">

    <label for="iteam_shelf" id="iteam_shelf_label" style="display:none;">Shelf:</label>
    <input type="number" id="iteam_shelf" name="iteam_shelf" style="display:none;" min="0" step="1">

    <label for="iteam_row" id="iteam_row_label" style="display:none;">Row:</label>
    <input type="text" id="iteam_row" name="iteam_row" style="display:none;">

    <br>

    <input type="submit" id="submitBtn" name="submit" value="Submit">
<button onclick="window.location.reload();">Reset Table</button>
</form>
    <script>

   const actionSelect = document.getElementById('action-select');

    const user_AmountLabel = document.getElementById('user-Amount-label');
    const user_AmountInput = document.getElementById('user_Amount');

    const amount_Filterlabel = document.getElementById('amount_Filter_label');
    const amount_Filterinput = document.getElementById('amount_Filter');

    const selected_optionlabel = document.getElementById('selected_option_label');
    const selected_optioninput = document.getElementById('selected_option');

    const itemidlabel = document.getElementById('item_id_label'); 
    const itemidinput = document.getElementById('item_id'); 

    const rowlabel = document.getElementById('iteam_row_label');
    const rowinput = document.getElementById('iteam_row');


    const shelflabel = document.getElementById('iteam_shelf_label');
    const shelfinput = document.getElementById('iteam_shelf');


    const findproductlabel = document.getElementById('find_product_label');
    const findproductinput = document.getElementById('find_product');



    actionSelect.addEventListener('change', function() {
        if (actionSelect.value === 'null') {
            user_AmountLabel.style.display = 'none';
            user_AmountInput.style.display = 'none';

            amount_Filterlabel.style.display = 'none';
            amount_Filterinput.style.display = 'none';

           selected_optionlabel.style.display = 'none';
            selected_optioninput.style.display = 'none';

            amount_Filterlabel.style.display = 'none';
            amount_Filterinput.style.display = 'none';

            findproductlabel.style.display = 'none';
            findproductinput.style.display = 'none';

            rowlabel.style.display = 'none';
            rowinput.style.display = 'none';

            shelflabel.style.display = 'none';
            shelfinput.style.display = 'none';


            findproductlabel.style.display = 'none';
            findproductinput.style.display = 'none';

            itemidlabel.style.display = 'none';
            itemidinput.style.display = 'none';

        } else if (actionSelect.value === 'update') {
            user_AmountLabel.style.display = 'block';
            user_AmountInput.style.display = 'block';

            itemidlabel.style.display = 'block'; 
            itemidinput.style.display = 'block';

            amount_Filterlabel.style.display = 'none';
            amount_Filterinput.style.display = 'none';

           selected_optionlabel.style.display = 'block';
            selected_optioninput.style.display = 'block';


            findproductlabel.style.display = 'none';
            findproductinput.style.display = 'none';


            rowlabel.style.display = 'none';
            rowinput.style.display = 'none';

            shelflabel.style.display = 'none';
            shelfinput.style.display = 'none';


            findproductlabel.style.display = 'none';
            findproductinput.style.display = 'none';


        } else if (actionSelect.value === 'filter') {
            user_AmountLabel.style.display = 'block';
            user_AmountInput.style.display = 'block';

            amount_Filterlabel.style.display = 'block';
            amount_Filterinput.style.display = 'block';

           selected_optionlabel.style.display = 'none';
            selected_optioninput.style.display = 'none';

            amount_Filterlabel.style.display = 'block';
            amount_Filterinput.style.display = 'block';

            rowlabel.style.display = 'block';
            rowinput.style.display = 'block';

            shelflabel.style.display = 'block';
            shelfinput.style.display = 'block';


            findproductlabel.style.display = 'block';
            findproductinput.style.display = 'block';

            itemidlabel.style.display = 'none';
            itemidinput.style.display = 'none';

        }
    });
</script>



<table border="1">
    <tr>
        <th>Shelf</th>
        <th>Row</th>
	<th>product name</th>
	<th>item id</th>
        <th>BrandName</th>
        <th>Quantity</th>
    </tr>


    



<?php



$userAmount = $selectedOption = $itemID = "";
$Amount = $amountFilter = $shelf = $row = $action = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST["action"];
    $userAmount = $_POST["user_Amount"];
    $selectedOption = $_POST["selected_option"];
    $itemID = $_POST["item_id"];
    $product = $_POST["find_product"];
    $amountFilter = $_POST["amount_Filter"];
    $shelf = $_POST["iteam_shelf"];
    $row = $_POST["iteam_row"];


        if ($action == "update" && ($userAmount == "" || $itemID == "" || $selectedOption == "")) {
        echo "Please fill all required fields for updating.";
        exit; // Stop further execution
    }



    if ($action == "filter" && ($userAmount != "" || $amountFilter != "") && ($userAmount == "" || $amountFilter == "")) {
        echo "Please fill both amount and amount filter fields when one is used for filtering.";
        exit; // Stop further execution
    }



}
if ($action == "update"){
	if ($selectedOption == "setto") {
 	   $pdo = new PDO('sqlite:new.db');
 	   $statement = $pdo->query("
			UPDATE Item
			SET Quantity = '$userAmount'
			WHERE Item_ID = '$itemID';");



    			$pdo = new PDO('sqlite:new.db');
   			$statement = $pdo->query("SELECT
   			L.Shelf,
    			L.Row,
    			B.BrandName,
    			I.Item_ID,
    			I.ItemName,
    			I.Quantity
			FROM
    				Location L
			JOIN
    				Item I ON L.Location_ID = I.Location_ID
			JOIN
    				Brand B ON I.Item_ID = B.Item_ID;

			");
	}else if($selectedOption == "remove") {
	    $pdo = new PDO('sqlite:new.db');
	    $statement = $pdo->query("
			UPDATE Item
			SET Quantity = Quantity - '$userAmount'
			WHERE Item_ID = '$itemID';");

    		$pdo = new PDO('sqlite:new.db');
    		$statement = $pdo->query("SELECT
    		L.Shelf,
    		L.Row,
    		B.BrandName,
    		I.Item_ID,
    		I.ItemName,
    		I.Quantity
		FROM
    			Location L
		JOIN
 			Item I ON L.Location_ID = I.Location_ID
		JOIN
    			Brand B ON I.Item_ID = B.Item_ID;

		");
	}

}else if ($action == "filter") {
    $pdo = new PDO('sqlite:new.db');
    $query = "SELECT
        Location.Shelf,
        Location.Row,
        Item.ItemName,
	Item.Item_ID,
        Brand.BrandName,
        Item.Quantity
    FROM
        Item
    JOIN
        Location ON Item.Location_ID = Location.Location_ID
    LEFT JOIN
        Brand ON Item.Item_ID = Brand.Item_ID
    WHERE 1";

    if ($shelf != "") {
        $query .= " AND Location.Shelf = '$shelf'";
    }

    if ($row != "") {
        $query .= " AND Location.Row = '$row'";
    }

    if ($product != "") {
        $query .= " AND Item.ItemName = '$product'";
    }

    if ($amountFilter != "" && $userAmount != "") {
        $query .= " AND Item.Quantity $amountFilter '$userAmount'";
    }
    

    $query .= ";";

    $statement = $pdo->query($query);
    
	
}else{

    $pdo = new PDO('sqlite:new.db');
    $statement = $pdo->query("SELECT
    L.Shelf,
    L.Row,
    B.BrandName,
    I.Item_ID,
    I.ItemName,
    I.Quantity
FROM
    Location L
JOIN
    Item I ON L.Location_ID = I.Location_ID
JOIN
    Brand B ON I.Item_ID = B.Item_ID;

");
}


    foreach ($statement as $rows) {
        print "<td>" . $rows['Shelf'] . "</td>";
        print "<td>" . $rows['Row'] . "</td>";
	print "<td>" . $rows['ItemName'] . "</td>";
	print "<td>" . $rows['Item_ID'] . "</td>";
        print "<td>" . $rows['BrandName'] . "</td>";
        print "<td>" . $rows['Quantity'] . "</td><tr>";
    }
    ?>
</table>
</body>
</html>
