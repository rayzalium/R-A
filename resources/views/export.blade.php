<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reports</title>
</head>
<body>
    <form action="/export" method="get">
        <label for="difference">Select Difference:</label>
        <select name="difference" id="difference">
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="15">15</option>
            <option value="20">20</option>
        </select>
        <button type="submit">Export to Excel</button>
    </form>

    <form action="/export-hours" method="get">
        <label for="hours_difference">Select Hours Difference:</label>
        <select name="difference" id="hours_difference">
            <option value="50">50</option>
            <option value="100">100</option>
            <option value="150">150</option>
            <option value="200">200</option>
        </select>
        <button type="submit">Export Hours to Excel</button>
    </form>
    <!-- Form for Dates Export -->
<form action="/export-dates" method="get">
    <label for="date_difference">Select Date Difference:</label>
    <select name="date_difference" id="date_difference">
        <option value="1_week">1 Week</option>
        <option value="2_weeks">2 Weeks</option>
        <option value="1_month">1 Month</option>
        <option value="2_months">2 Months</option>
    </select>
    <button type="submit">Export Dates to Excel</button>
</form>
<form action="{{ route('export.excel') }}" method="GET">
    <div>
        <label for="plane">Select Plane:</label>
        <select name="plane" id="plane" required>
            <option value="AFA">AFA</option>
            <option value="AFB">AFB</option>
            <option value="AFC">AFC</option>
        </select>
    </div>

    <div>
        <label for="filter">Select Filter:</label>
        <select name="filter" id="filter" required>
            <option value="Fresh">Fresh</option>
            <option value="Critical">Critical</option>
            <option value="Non-Critical">Non-Critical</option>
        </select>
    </div>

    <button type="submit">Export Excel</button>
</form>

</body>
</html>
