/*----------------------------Local storage -------------------------------*/

function testLocalStorage(type) {
    try {
        var storage = window[type],
            x = '__storage_test__';
        storage.setItem(x, x);
        storage.removeItem(x);
        return true;
    }
    catch(e) {
        return e instanceof DOMException && (
            // everything except Firefox
            e.code === 22 ||
            // Firefox
            e.code === 1014 ||
            // test name field too, because code might not be present
            // everything except Firefox
            e.name === 'QuotaExceededError' ||
            // Firefox
            e.name === 'NS_ERROR_DOM_QUOTA_REACHED') &&
            // acknowledge QuotaExceededError only if there's something already stored
            storage.length !== 0;
    }
}

//Set an item (either  new or updated)
function setLocalStorage(key, value) {

    if (!testLocalStorage('localStorage')) {
        return false;
    }
    
    localStorage.setItem(key, value);
    
    return true;
}

//Retrieve a value previously stored
function getLocalStorage(key) {

    if (!testLocalStorage) {
        return "Error local storage not enabled";
    }
    
    return localStorage.getItem(key);
    
}

//Remove a stored value
function removeLocalStorage(key) {

    if (!testLocalStorage) {
        return false;
    }
    
    localStorage.removeItem(key);

    return true;    
}


/*-------------------------------------- Session storage -------------------------*/

function testsessionStorage(type) {
    try {
        var storage = window[type],
            x = '__storage_test__';
        storage.setItem(x, x);
        storage.removeItem(x);
        return true;
    }
    catch(e) {
        return e instanceof DOMException && (
            // everything except Firefox
            e.code === 22 ||
            // Firefox
            e.code === 1014 ||
            // test name field too, because code might not be present
            // everything except Firefox
            e.name === 'QuotaExceededError' ||
            // Firefox
            e.name === 'NS_ERROR_DOM_QUOTA_REACHED') &&
            // acknowledge QuotaExceededError only if there's something already stored
            storage.length !== 0;
    }
}

//Set an item (either  new or updated)
function setsessionStorage(key, value) {

    if (!testsessionStorage('sessionStorage')) {
        return false;
    }
    
    sessionStorage.setItem(key, value);
    
    return true;
}

//Retrieve a value previously stored
function getsessionStorage(key) {

    if (!testsessionStorage) {
        return "Error session storage not enabled";
    }
    
    return sessionStorage.getItem(key);
    
}

//Remove a stored value
function removesessionStorage(key) {

    if (!testsessionStorage) {
        return false;
    }
    
    sessionStorage.removeItem(key);

    return true;    
}

