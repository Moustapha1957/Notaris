
//======================= display clear search icon =============================/
let clearSearch = document.querySelector(".clear-search");
let inputEmail = document.querySelector("#Inputemail");
inputEmail.addEventListener("input",()=>{
    if(inputEmail.value.length > 0 ){
        clearSearch.style.display = "block";
    }else{
        clearSearch.style.display = "none";    
    }
});
clearSearch.addEventListener("click",()=>{
    inputEmail.value = "";
    inputEmail.focus();
    clearSearch.style.display = "none";
});

//======================= display side bar =============================/
let toggleMenu = document.querySelector(".toggle-menu");
let sidebar = document.querySelector(".sidebar");
let mail = document.querySelector(".mail-section");

toggleMenu.addEventListener("click",()=>{
    sidebar.classList.toggle("menu-open");
});

//=======================load email=============================/
// let mailSection = document.querySelector(".mail-section");
// mails.forEach((elem)=>{
//     mailSection.innerHTML += `<div class="mail">
//                                 <div class="mail-left-sec d-flex">
//                                     <input type="checkbox" name="" id="" class="selectmail">
//                                     <div class="mail-stared">
//                                         <i class="fa-regular fa-star"></i>
//                                     </div>
//                                     <div class="main-sender">
//                                         <p>${elem.sender}</p>
//                                     </div>
//                                 </div>
//                                 <div class="message">
//                                     <span class="message-subject">${elem.subject}</span>
//                                     <span class="message-content">${elem.message}</span>
//                                 </div>
//                                 <div >
//                                     <p class="date">${elem.date}</p>
//                                     <div class="mail-function d-flex">
//                                     <div class="archived">
//                                         <i class="fa-solid fa-folder-open"></i>
//                                     </div>
//                                     <div class="trash">
//                                         <i class="fa-solid fa-trash"></i>
//                                     </div>
//                                     <div class="add-mail">
//                                         <i class="fa-solid fa-envelope"></i>
//                                     </div>
//                                     <div class="clock">
//                                         <i class="fa-solid fa-clock"></i>
//                                     </div>
//                                 </div>
//                                 </div>
                                
//                             </div>`;
// });

//======================= display mail send box =============================/
let compose = document.querySelector(".compose");
let sendMail = document.querySelector(".send-mail");
compose.addEventListener("click",()=>{
    sendMail.style.display = "block";
});
let closeSendmail = document.querySelector(".close-sendmail");
closeSendmail.addEventListener("click",()=>{
    sendMail.style.display = "none";
});

//======================= send mail btn =============================/
let recipients = document.querySelector(".recipients");
let subject = document.querySelector(".subject");
let msgContent = document.querySelector("#msg-content");
let sendBtn = document.querySelector(".send-btn");
sendBtn.addEventListener("click",()=>{
    recipients.value = ""
    subject.value = ""
    msgContent.value = ""
})

