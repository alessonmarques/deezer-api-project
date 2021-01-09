/* |||||||||||||||||||||| */
/* GLOBAL VARIABLES SCOPE */

    /* Notifications */
    messageCount = 0;

/* |||||||||||||||||||||| */

let  requestPost = (request) =>
{
    var X_CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').attributes.content.value;
    let body = JSON.stringify(request.data);

    fetch(request.url, {
        method: 'POST',
        dataType: 'json',
        headers: {
                'X-CSRF-TOKEN': X_CSRF_TOKEN,
                'Content-Type': 'application/json',
        },
        body: body,
    })
    .then(function(response){ return response.json();})
    .then(function(json){
        if(json.hasOwnProperty('message')){clientMessage(json.message);}
        if(json.hasOwnProperty('validate')){document.querySelector('[name="form-reg"]').submit();}
        if(json.hasOwnProperty('redirect')){window.location.href = json.redirect;}
    })
    .catch((error) => {
        console.error('Error:', error);
    });
}

let clientMessage = (message) =>
{
    /* ------------------- */
    /* Adiciona o id na messageBox */
    let _id = 'client_message_'+(messageCount++);
    let html = htmlElement(message, _id);
    /* Cria span e adiciona o messageBox */
    let messageBox = document.createElement('span');
    messageBox.innerHTML = html;
    /* Adiciona o messageBox + span  */
    document.querySelector('.clientMessage').appendChild(messageBox);
    /* ------------------- */
    setTimeout(function(){
        document.getElementById(_id).parentNode.remove();
    }, 3000);
}


let htmlDecode = (input) => {

    var doc = new DOMParser().parseFromString(input, "text/html");
    return doc.documentElement.textContent;
}

let htmlElement = (input, id) => {
    var res = input.replace(" class=", (" id ='"+id+"' class="));
    return res;
}


