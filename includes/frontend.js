function submitForm() {
  var countries = document.getElementById("countries").selectedOptions[0].value;	
  var country_code = document.getElementById("countries").selectedOptions[0].value;
  var url = "https://api.droid.az/data/";
  
  // Clear previous results
  document.getElementById("results").innerHTML = "";
  
  var xhr = new XMLHttpRequest();
  xhr.open("POST", url, true);
  xhr.setRequestHeader("Content-Type", "application/json");
xhr.onreadystatechange = function () {
  if (xhr.readyState === 4 && xhr.status === 200) {
    var response = JSON.parse(xhr.responseText);
    var tableHTML = "<table id=\"results-table\"><tr><th>Image</th><th>Keywords</th><th>Traffic Weight</th><th>Top Article</th></tr>";
    // Assuming response is an array of objects where each object represents a row in the table
    response.forEach(function(row) {
	  let descriptionValue = row.Description[0] !== undefined ? row.Description[0] : "";
      tableHTML += "<tr>";
      // Accessing properties of the row object in the order you want
      tableHTML += "<td><img src=\" " + row.Image + " \"</td>";
      tableHTML += "<td>" + row.Title[0] + ", " + descriptionValue + "</td>";
	  tableHTML += "<td>" + row.Approx_Traffic[0] + "</td>";
	  tableHTML += "<td><a href=\" " + row.Top_News_URL[0] + " \" target=\"_blank\" >" + row.Top_News_Title[0] + "</a></td>";	
      tableHTML += "</tr>";
    });
    tableHTML += "</table>";
    document.getElementById("results").innerHTML = tableHTML;
  }
};
  var data = JSON.stringify({ countries: country_code, country_code: country_code });
  xhr.send(data);
}