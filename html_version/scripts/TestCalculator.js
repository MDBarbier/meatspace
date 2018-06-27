function getRandomInt(max) {
  return Math.floor(Math.random() * Math.floor(max));
}

function rollD6() {
    var rawResult = getRandomInt(6);
   return rawResult + 1;
}

function rollMultipleD6(numToRoll) {
    var results = [];
    for (i = 0; i < numToRoll; i++)
    {
        results.push(rollD6());
    }
    return results;
}

function calculateHits(resultArray) {

    var hits = 0;
    var glitches = 0;
    for (i = 0; i < resultArray.length; i++)
    {
        if (resultArray[i] === 5 || resultArray[i] === 6)
        {
            hits++;
        }
        else if (resultArray[i] === 1)
        {
            glitches++;
        }
    }

    var results = [];

    results.push(resultArray.length);
    results.push(hits);
    results.push(glitches);
    results.push(resultArray);
    
    return results;
}

function skillCheck(stat1, stat2, modifiers, threshold) {

    var stat1Parsed = 0; var stat2Parsed = 0; var modifiersParsed = 0; var thresholdParsed = 0;

    if (stat1) stat1Parsed = parseInt(stat1); 
    if (stat2) stat2Parsed = parseInt(stat2);
    if (modifiers) modifiersParsed = parseInt(modifiers);
    if (threshold) thresholdParsed = parseInt(threshold);

    var dicePool = stat1Parsed + stat2Parsed + modifiersParsed;
    var rawDice = rollMultipleD6(dicePool);
    var hits = calculateHits(rawDice);
    
    var results = [];

    if (hits[1] < thresholdParsed) {
        results.push("Failed!");
    }
    else {
        results.push("Succeeded!");
    }

    results.push(hits);
    results.push(rawDice);            

    return results;
}

function initiativeRoll(bonus, dice) {

    var rolls = rollMultipleD6(parseInt(dice));
    var cumulativeScore = 0;
    for (i=0;i<rolls.length;i++)
    {
        cumulativeScore += rolls[i];
    }

    var initiative = parseInt(cumulativeScore) + parseInt(bonus);

    var results = [];

    results.push(initiative);
    results.push(rolls);    
    
    return results;
}

function calculateDamage(netHits, dv, damageType, defenderAv, defenderBody, ap) {
    var modifiedDv = parseInt(dv) + parseInt(netHits);
    var modifiedAv = parseInt(defenderAv) + parseInt(defenderBody);
    var modifiedDamageType = damageType;
    var modifiedDicePool = modifiedAv - parseInt(ap);

    if (modifiedDv < modifiedAv)
    {
        modifiedDamageType = "Stun";
    }

    var rawRolls = rollMultipleD6(modifiedDicePool);
    var hits = calculateHits(rawRolls);
    var resistRollSuccesses = hits[1];

    var damageDone = modifiedDv - resistRollSuccesses;

    var results = [];

    results.push(damageDone);
    results.push(modifiedDamageType);
    
    return results;
}