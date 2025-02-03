
const form = document.querySelector(".typing-area"),
  incoming_id = form.querySelector(".incoming_id").value,
  inputField = form.querySelector(".input-field"),
  imageInputField = form.querySelector("#imageInput"),
  videoInputField = form.querySelector("#videoInput"),
  fileInputField = form.querySelector("#fileInput"),
  sendBtn = form.querySelector("button"),
  chatBox = document.querySelector(".chat-box");

form.onsubmit = (e) => {
  e.preventDefault();
};

inputField.focus();
inputField.onkeyup = () => {
  checkFields();
};

// Add listeners for both file inputs
imageInputField.onchange = () => {
  checkFields();
};
fileInputField.onchange = () => {
  checkFields();
};

videoInputField.onchange = () => {
  checkFields();
};

// Function to check all fields and activate the button
function checkFields() {
  if (inputField.value !== "" || imageInputField.files.length > 0 || videoInputField.files.length > 0 || fileInputField.files.length > 0) {
    sendBtn.classList.add("active");
  } else {
    sendBtn.classList.remove("active");
  }
}
sendBtn.onclick = () => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/insert-chat.php", true);
  xhr.onprogress = () => {
    console.log("OnProgress....");
    loader.style.display = 'block';
  };
  xhr.onload = () => {
    loader.style.display = 'none';
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        fileInputField.value = "";
        inputField.value = "";
        imageInputField.value = "";
        videoInputField.value = "";

        checkFields();
        let data = xhr.responseText;
        if (data !== "Success") {
          alert(data);
        }
      }
    }
  };
  let formData = new FormData(form);
  xhr.send(formData);
};

chatBox.onmouseenter = () => {
  chatBox.classList.add("active");
};

chatBox.onmouseleave = () => {
  chatBox.classList.remove("active");
};

setInterval(() => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/get-chat.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        chatBox.innerHTML = data;
        if (!chatBox.classList.contains("active")) {
          scrollToBottom();
        }
      }
    }
  };
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("incoming_id=" + incoming_id);
}, 500);

function scrollToBottom() {
  chatBox.scrollTop = chatBox.scrollHeight;
}
