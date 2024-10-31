<?php
//check for security

if (!defined('ABSPATH')) {
    exit('ABSPATH must be set before running');
}

// Function to output content for the SEOSurge menu page
function seosurge_dashboard() {
	?>
<div class="seosurge-settings-body">
		<img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz48IS0tIFVwbG9hZGVkIHRvOiBTVkcgUmVwbywgd3d3LnN2Z3JlcG8uY29tLCBHZW5lcmF0b3I6IFNWRyBSZXBvIE1peGVyIFRvb2xzIC0tPgo8c3ZnIHdpZHRoPSI4MDBweCIgaGVpZ2h0PSI4MDBweCIgdmlld0JveD0iMCAwIDEyOCAxMjgiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIGFyaWEtaGlkZGVuPSJ0cnVlIiByb2xlPSJpbWciIGNsYXNzPSJpY29uaWZ5IGljb25pZnktLW5vdG8iIHByZXNlcnZlQXNwZWN0UmF0aW89InhNaWRZTWlkIG1lZXQiPjxyYWRpYWxHcmFkaWVudCBpZD0iSWNvbmlmeUlkMTdlY2RiMjkwNGQxNzhlYWIyMTQzNiIgY3g9IjU5Ljg1MSIgY3k9Ii0xLjQwNSIgcj0iMTEzLjcwNyIgZ3JhZGllbnRVbml0cz0idXNlclNwYWNlT25Vc2UiPjxzdG9wIG9mZnNldD0iLjQyMyIgc3RvcC1jb2xvcj0iIzQ1ZDZmMCI+PC9zdG9wPjxzdG9wIG9mZnNldD0iLjUxOCIgc3RvcC1jb2xvcj0iIzQxY2RlOSI+PC9zdG9wPjxzdG9wIG9mZnNldD0iLjY3NCIgc3RvcC1jb2xvcj0iIzM3YjRkNyI+PC9zdG9wPjxzdG9wIG9mZnNldD0iLjg3IiBzdG9wLWNvbG9yPSIjMjc4YmJhIj48L3N0b3A+PHN0b3Agb2Zmc2V0PSIxIiBzdG9wLWNvbG9yPSIjMWI2ZGE0Ij48L3N0b3A+PC9yYWRpYWxHcmFkaWVudD48cGF0aCBkPSJNMTQuNjYgMTE1Ljc0YzEuMzcgMS4wNiA1LjMyLTUuNzcgMjAuMi02LjY4YzE1LjkzLS45OCAzMy41NiAxMS42OSA1Ny43MSAxMS42OWMyMS40MSAwIDMyLjUtMTAuNDggMzEuNzQtMTIuMTVjLS41MS0xLjExLTguOTYtMy4xNS0xOC42OC04LjJjLTExLjY5LTYuMDctMjQtMTIuMTUtMzMuNDEtMjUuODJjLTYuMDMtOC43NS0xMC4zMy0xOC44My00LjQtMjYuNzNjNS45Mi03LjkgMjAuOTYtNC4yNSAyMC45Ni00LjI1bC0yMC41LTIyLjE3bC0zOS4wMyAxMC42NEw5LjUgODEuNThsMi4xMyAyNS4yMWwzLjAzIDguOTV6IiBmaWxsPSJ1cmwoI0ljb25pZnlJZDE3ZWNkYjI5MDRkMTc4ZWFiMjE0MzYpIj48L3BhdGg+PHBhdGggZD0iTTU5LjI2IDM2LjExczQuNzcgMS41MiAxMS4xNiA0Ljg1YzEwLjYzIDUuNTUgMTcuMDcgMTQuMjggMjMuNjQgMTQuODJjNi44Mi41NSAxMC4zMS0zLjM4IDguODItMTEuNThjLTEuMzktNy42NS0xMi42OC0xNi42My0xMi42OC0xNi42M3MxMC4zMSAxLjk0IDEwLjMxLTMuOTdjMC02LjA3LTUuNTYtOC45OS0xNC4zMS0xMmMtNS44My0yLTIxLjUxLTYuNDQtNDIuNTMgMS41MmMtOS4wNCAzLjQyLTIwLjA4IDkuNzQtMjguNDYgMjEuODVDNC4yNSA1MC44MSAyLjAzIDcxLjQxIDQuMTEgODcuMDVjMi41MiAxOC44OSAxMC4zOCAyOC42MyAxMC41NyAyOC43MWMuMTkuMDggMS4yMi0yMi4yMSAxMC4wMS0zMS44OGM3LjQ5LTguMjQgMTUuMTUtNC44NiAyNC4yNS01LjMxYzEwLjczLS41MyAxNS41Mi0xMS42MSA3LjMzLTIwLjA2Yy03LjAzLTcuMjYtMTguNjgtNi42MS0xOC42OC02LjYxczMuODYtMS41NCAxMS4xOS0yLjJjOC40Mi0uNzcgMTAuMDgtNS42NiAxMC42OC03LjQ5YzEuMzMtNC4wNC0uMi02LjEtLjItNi4xeiIgZmlsbD0iIzFiNmRhNCI+PC9wYXRoPjxwYXRoIGQ9Ik0zOC4xNSAzNi4zYy0uNTYtMy4zIDkuMTYtNi4yOCAxOS4zNC00LjY4YzE1Ljg0IDIuNDkgMjguMzggMTYuOTQgMzMuNyAxOS4wNWM3Ljg0IDMuMTIgMTAuNi0zLjI5IDYuNjctMTAuMjNjLTQuMDUtNy4xNy0xNC43Ny0xMy4yNy0xNC4zNy0xNS42NGMuNzItNC4yMSAxMS43IDIuMiAxMi4zNy0yLjQ4Yy40NS0zLjEtNy43NS03LjU2LTE1LjU0LTkuNTVjLTYuMjctMS42LTE5LjQ0LTMuNTctMzcuNjQgNC4zNkMxOS4wMiAyNy40NiA4Ljc5IDQ4LjAxIDcuMSA2OS41NGMtMS42IDIwLjQyIDYuMiAzNS42NCA2LjIgMzUuNjRzLjUzLTE1LjI0IDguMTctMjMuNjNjNS41OC02LjEyIDEyLjc0LTguNDIgMjAuNTEtNi45NGMxMi45NiAyLjQ4IDE4LjYxLTYuODkgMTIuMzgtMTMuNjZjLTQuMDgtNC40My05LjMxLTUuODEtMTQuNzItNS45OWMtOS4zNS0uMy0xNC4zOCAyLjgzLTE0LjY1IDEuNzdjLS40LTEuNjEgNC42Ny01LjM0IDExLjEtOC4wMmM4LjQ2LTMuNTIgMTguNjctMS4xMSAyMC4yNy04LjE5Yy43OC0zLjQ1LTEuMTctNS4zNC02Ljc1LTUuNzVjLTcuMDUtLjUxLTExLjQyIDEuNzctMTEuNDYgMS41M3oiIGZpbGw9IiNmZmZmZmYiPjwvcGF0aD48L3N2Zz4=" height="48px" >
</div>
<div class="notice notice-error hide-if-js"><p>SEOSurge requires JavaScript.</p></div>
<div class="seosurge-info hide-if-no-js">
	<h2>SEO Intelligence</h2>
	<p>Knowledge is power. We collect, analyze and interpret data so that YOU can make informed decisions regarding the next blog post, news article or even a youtube video. SEOSurge sifts through vast amounts of data so that you can know which topics are viral at the moment and dominating the world wide web!	
	</p>
	<p>
	Our data sources are publicly available information from: Google, Bing (Yahoo Search), Yandex, DuckDuckGo	
	</p>
	<hr>
</div>
<div class="seosurge-selection hide-if-no-js">	
<div class="seosurge-container">	

  <div class="seosurge-form-group">
    <select id="countries">
    <option value="AU">Australia</option>
    <option value="AT">Austria</option>
	<option value="AT">Argentina</option>	
    <option value="BE">Belgium</option>
    <option value="BR">Brazil</option>
    <option value="CA">Canada</option>
    <option value="CL">Chile</option>
    <option value="CO">Colombia</option>
    <option value="CZ">Czech Republic</option>
    <option value="DK">Denmark</option>
    <option value="EG">Egypt</option>
    <option value="FI">Finland</option>
    <option value="FR">France</option>
    <option value="DE">Germany</option>
    <option value="GR">Greece</option>
    <option value="HK">Hong Kong</option>
    <option value="HU">Hungary</option>
    <option value="IN">India</option>
    <option value="ID">Indonesia</option>
    <option value="IE">Ireland</option>
    <option value="IL">Israel</option>
    <option value="IT">Italy</option>
    <option value="JP">Japan</option>
    <option value="KE">Kenya</option>
    <option value="KR">Korea, South</option>
    <option value="MY">Malaysia</option>
    <option value="MX">Mexico</option>
    <option value="NL">Netherlands</option>
    <option value="NZ">New Zealand</option>
    <option value="NG">Nigeria</option>
    <option value="NO">Norway</option>
    <option value="PE">Peru</option>		
    <option value="PH">Philippines</option>
    <option value="PL">Poland</option>
    <option value="PT">Portugal</option>
    <option value="RO">Romania</option>
    <option value="RU">Russian Federation</option>
    <option value="SA">Saudi Arabia</option>
    <option value="SG">Singapore</option>
    <option value="ZA">South Africa</option>
    <option value="ES">Spain</option>
    <option value="SE">Sweden</option>
    <option value="CH">Switzerland</option>
	<option value="TW">Taiwan</option>	
    <option value="TH">Thailand</option>
    <option value="TR">Turkey (Türkiye)</option>
    <option value="UA">Ukraine</option>
    <option value="GB">United Kingdom</option>
    <option value="US">United States</option>
    <option value="VN">Vietnam</option>	
    </select>
    <button onclick="submitForm()" class="button button-primary">Submit</button>
  </div>
  <div id="results"></div>
</div>
	
</div>	
	
    <?php
}