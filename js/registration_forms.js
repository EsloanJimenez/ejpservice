const new_client = () => {
   const new_client = document.querySelector(".new_customer_fund");

   new_client.classList.remove('hide_font');
}

const clouse_client = () => {

   const hide_font = document.querySelector(".new_customer_fund");

   hide_font.classList.add('hide_font');

}

const add_waiter_to_event = () => {
   const new_client = document.querySelector(".new_waiter_background");

   new_client.classList.remove('hide_font');
}

const clouse_client_event = () => {
   const hide_font_event = document.querySelector(".new_waiter_background");

   hide_font_event.classList.add('hide_font');
}


const print = () => {
   window.print();
}
