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
    var glitches = results[1][2];
    
    var output = results[0] + " Total hits: " + results[1][1] + ", Raw results: " + results[2];    

    if (glitches >= (results[1][0] / 2) && results[1][1] === 0) {
        output += ", CRITICAL GLITCH!!";
    }
    else if (glitches >= (results[1][0] / 2)) {
        output += ", GLITCH!";    
    }
    
    

    $('#skillCheckResult').val(output);
};

function initiativeHandler()
{
    var bonus = $('#initiative_bonus').val();

    var results = initiativeRoll(bonus);

    $('#initiativeResult').val('Initiative: ' + results[0] + ' (' + results[1] + '+' + bonus + ')');
}