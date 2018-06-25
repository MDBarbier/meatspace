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

 <div class="row">
        <div class="col-md-12">
            <div class="well voffset2">
                <p>Do a skill check:</p>                
                <input id="stat1" placeholder="Enter the Attribute here" class="form-control voffset1" />
                <input id="stat2" placeholder="Enter the Skill (or 2nd Attribute) here" class="form-control voffset1" />
                <input id="modifiers" placeholder="Enter sum total of modifiers to apply" class="form-control voffset1" />
                <input id="threshold" placeholder="Enter threshold" class="form-control voffset1" />
                <input id="skillCheckResult" placeholder="results will show here" class="form-control voffset1" />
                <input type="button" onclick="skillCheckHandler()" value="GO" class="btn btn-primary voffset1" />         
            </div>
        </div>
</div>
   

    <div class="row">
        <div class="col-md-12"></div>
    </div>
    
   
    
</div>

<script src="scripts\TestCalculator.js"></script>

<script>

        function clickHandler() {
            var value = $('#source').val();
            var resultsOfRoll = rollMultipleD6(value);
            $('#result').val(resultsOfRoll);
        };       

        function hitHandler() {
            var value = $('#sourceHitInfo').val();
            var resultsOfRoll = rollMultipleD6(value);
            var results = calculateHits(resultsOfRoll);

            var output = "Num hits: " + results[1] + ", Num misses: " + results[2] + ", Raw results: " + results[3];

            $('#resultHitInfo').val(output);
        };

        function skillCheckHandler() {        

            var stat1 = $('#stat1').val();
            var stat2 = $('#stat2').val();
            var mods = $('#modifiers').val();
            var threshold = $('#threshold').val();

            var results = skillCheck(stat1, stat2, mods, threshold);

            var output = results[0] + " Total hits: " + results[1][1] + ", Raw results: " + results[2];

            console.log(output);

            $('#skillCheckResult').val(output);
        };

</script>