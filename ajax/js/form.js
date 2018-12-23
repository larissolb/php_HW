(function () {
    'use strict';
    
    function sendForm(event) {
        event.preventDefault();
        
        let form_data = new FormData(this);
        let xhr = new XMLHttpRequest();
        xhr.open("POST", this.action, true);
        xhr.send(form_data);
        
        xhr.onload = function (oEvent) {
            if (xhr.status === 200) {
                console.log('server(xhr) response', xhr.responseText);
                responseHandler(xhr.responseText);
            }
        };
            function responseHandler(response) {
            if (response === "sucess") {
                window.location.href = "auth-ajax.php";
            } else {
                console.log(response);
            }
       
        }

    }
    function addFormListener() {
        for (let i = 0; i < document.forms.length; i++){
            document.forms[i].addEventListener('submit', sendForm);
        }
    }
    
    addFormListener();
    
}());

    
