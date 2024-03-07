// "use strict";

// const data = [
//   // 1
//   {
//     sender: "Sadam",
//     date: "Dec, 12",
//     message:
//       " Lorem, ipsum dolor sit amet consectetur adipisicing elit. Autem libero delectus sint delectus sint adipisicing ...",
//   },
//   // 2
//   {
//     sender: "Twitter",
//     date: "Dec, 22",
//     message:
//       " Lorem, ipsum dolor sit amet consectetur adipisicing elit. Autem libero delectus sint delectus sint adipisicing ...",
//   },
//   //  3
//   {
//     sender: "Yahye",
//     date: "Dec, 14",
//     message:
//       " Lorem, ipsum dolor sit amet consectetur adipisicing elit. Autem libero delectus sint delectus sint adipisicing ...",
//   },
//   // 4
//   {
//     sender: "Sadam",
//     date: "Jan, 11",
//     message:
//       " Lorem, ipsum dolor sit amet consectetur adipisicing elit. Autem libero delectus sint delectus sint adipisicing ...",
//   },
//   // 5
//   {
//     sender: "Qadar",
//     date: "Dec, 12",
//     message:
//       " Lorem, ipsum dolor sit amet consectetur adipisicing elit. Autem libero delectus sint delectus sint adipisicing ...",
//   },
// ];

// const messages = document.querySelector(".messages_area");

// const render = function (data) {
//   messages.innerHTML = data
//     .map(
//       (d) => `<div class="messages">
//   <div class="messages_left">
//     <div class="check check_2">
//       <img src="./img/checkbox.png" alt="" />
//       <span> <ion-icon name="checkmark"></ion-icon> </span>
//     </div>
//     <ion-icon name="star-outline" class="hover star"></ion-icon>
//     <span>${d.sender}</span>
//   </div>
//   <div class="messages_content">${d.message}</div>
//   <div class="messages_date">${d.date}</div>
// </div>`
//     )
//     .join(" ");
// };

// render(data);
