//SELECTORES
const new_client = document.getElementById('new_client');
const fund_new_client = document.querySelector(".new_customer_fund");

const clouse_client = document.querySelector('.clouse_client');
const hide_font = document.querySelector(".new_customer_fund");

const add_waiter = document.querySelector(".add_waiter_to_event");
const hide_new_wait = document.querySelector('.new_waiter_background');

const clouse_client_wait = document.querySelector('.clouse_client_wait');

new_client.addEventListener("click", () => {
   fund_new_client.classList.remove('hide_font');
});

clouse_client.addEventListener('click', () => {
   hide_font.classList.add('hide_font');
   hide_new_wait.classList.add('hide_font')
});

add_waiter.addEventListener('click', () => {
   hide_new_wait.classList.remove('hide_font');
})

clouse_client_wait.addEventListener('click', () => {
   hide_new_wait.classList.add('hide_font')
})

const clouse_client_event = () => {
   const hide_font_event = document.querySelector(".new_waiter_background");

   hide_font_event.classList.add('hide_font');
}


const print = () => {
   window.print();
}
