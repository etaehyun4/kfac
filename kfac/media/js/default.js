function newWindow(url,width,height)
{
    window.open(url,'_blank','width='+width+',height='+height+',toolbar=no,menubar=no');
}

function isHangul(val) { return val >= 12592 && val <= 12687; }
function isLower(val) { return val >= 97 && val <= 122; }
function isUpper(val) { return val >= 65 && val <= 90; }
function isAlphabet(val) { return isLower(val) || isUpper(val); }
function isNumber(val) { return val >= 48 && val <= 57; }
