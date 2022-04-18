// if document is finished loading, call ready() to listen for events 
if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready)
} else {
    ready();
}


function ready() {
    var hideDiv = document.getElementById('upD');
    hideDiv.style.visibility = 'hidden';
    
    var empEditButton = document.getElementByName('chooseEmployee');
    empEditButton.addEventListener('click', unHide);
}
function unHide() {
    var hideDiv = document.getElementById('upD');
    hideDiv.style.visibility = 'visible';
}