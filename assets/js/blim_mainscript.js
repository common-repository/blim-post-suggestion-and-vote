let suggestion = document.querySelector('input[name=showsuggestion]');
let vote = document.querySelector('input[name=vote]');
let last = document.querySelector('input#blim_options_check');
if (suggestion !== null) {
    suggestion.addEventListener('change', () => {
        if (last.value == 'vote' && vote.checked == true)
            last.value = 'both';
        else if (last.value == 'both' && vote.checked == true)
            last.value = 'vote';
        else if (last.value == 'none' && vote.checked == false)
            last.value = 'suggestion';
        else
            last.value = 'none';
    })
}
if (vote !== null) {
    vote.addEventListener('change', (e) => {
        if (last.value == 'suggestion' && suggestion.checked == true)
            last.value = 'both';
        else if (last.value == 'both' && suggestion.checked == true)
            last.value = 'suggestion';
        else if (last.value == 'none' && suggestion.checked == false)
            last.value = 'vote';
        else
            last.value = 'none';
    })
}

let vote_up = document.querySelector('input[name=voteup]');
let vote_down = document.querySelector('input[name=votedown]');

function get_uri() {
    return document.querySelector('input#ajax_vote_uri').value;
}

if (vote_up != null) {

    document.querySelector('div#vote-up').addEventListener('click', (e) => {
       
        send_fetch(parseInt(vote_up.value) + 1, vote_down.value); 
        wait_fetch(document.querySelector('div#vote-up'))
    })
}
if (vote_down != null) {
    document.querySelector('div#vote-down').addEventListener('click', (e) => {
      
        send_fetch(vote_up.value, (parseInt(vote_down.value) + 1));  
        wait_fetch(document.querySelector('div#vote-down'))
    })
}
function wait_fetch(target){
   
   target.querySelector('p').innerHTML =`<div class="spinner-load" role="status">
   <span class="sr-only">Loading...</span>
 </div>`
}
function send_fetch(vote_up, vote_down) {
    let form_data = new FormData();
    let body = {
        method:'post',
        action:'blim_update_vote_count',
        blim_vote_up:vote_up,
        blim_vote_down:vote_down,
        blim_post_id:parseInt(blim_vote_object.blim_post_id),
        blim_wp_nonce:blim_vote_object.blim_wp_nonce
    }
    for (i in body){
        form_data.append(i,body[i])
    }
    let request = new Request (blim_vote_object.blim_ajax_url,{
        method: 'POST',
        body: form_data,
      });

    fetch(request).then(response => {

        if (response.status === 200)
            return response.json();
        else
            throw new Error('Bad Request, try reloading!');

    }).then(response => {
        render_result(response.message)
    }).catch(error => {
        render_result(error.message)
    })
}
function render_result(message){
    document.querySelector('.voting-box').innerHTML = `<p class="vote-message">${message}</p>`;
}