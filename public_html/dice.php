<html>
<head>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <link rel="stylesheet" type="text/css" href="content/meatspace.css"/>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script src="scripts\TestCalculator.js"></script>

    <script>

        function clickHandler() {
            var value = $('#source').val();
            var resultsOfRoll = rollMultipleD6(value);
            $('#result').val(resultsOfRoll);
        }

        function thresholdHandler() {
            var thresholdNumDice = $('#thresholdNumDice').val();
            var thresholdTarget = $('#thresholdTarget').val();
            var results = thresholdTest(thresholdNumDice, thresholdTarget);
            var output = "";

            if (results[0] === 1) {
                output += "Success!";
            }
            else {
                output += "Failed!"
            }

            if (results[1] === 1) {
                output += " (Glitched!)"
            }
            else if (results[1] === 2) {
                output += " (Critical glitch!)"
            }

            $('#thresholdResult').val(output);

        }

        function hitHandler() {
            var value = $('#sourceHitInfo').val();
            var resultsOfRoll = rollMultipleD6(value);
            var results = calculateHits(resultsOfRoll);

            var output = "Num hits: " + results[1] + ", Num misses: " + results[2] + ", Raw results: " + results[3];

            $('#resultHitInfo').val(output);
        }

    </script>
</head>


<body>
<div class="container">

    <div class="row">
        <div class="col-md-12">
            <div class="well voffset2">
            <p>Roll some D6:</p>
            <input id="source" placeholder="enter the number to roll here" class="form-control">
            <input id="result" placeholder="results will show here" class="form-control voffset1">
            <input type="button" value="roll" onclick="clickHandler()" class="btn btn-primary voffset1" style="width:100px;" />
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="well voffset2">
            <p>Roll some D6 and get number of hits (5s and 6s) and misses (1s):</p>
            <input id="sourceHitInfo" placeholder="enter the number to roll here" class="form-control">
            <input id="resultHitInfo" placeholder="results will show here" class="form-control voffset1">
            <input type="button" value="roll" onclick="hitHandler()" class="btn btn-primary voffset1" style="width:100px;" />
            </div>
        </div>
    </div>

   <!-- <div class="row">
        <div class="col-md-12">
            <div class="well voffset2">
            <p>Do a threshold test:</p>
            <input id="thresholdNumDice" placeholder="enter the number of d6 to roll here" class="form-control">
            <input id="thresholdTarget" placeholder="enter the target number of successes to get here" class="form-control">
            <input id="thresholdResult" placeholder="results will show here" class="form-control voffset1">
            <input type="button" value="roll" onclick="thresholdHandler()" class="btn btn-primary voffset1" style="width:100px;" />
            </div>
        </div>
    </div>-->

    <div class="row">
        <div class="col-md-12"></div>
    </div>
    

    
</div>
</body>
<html>