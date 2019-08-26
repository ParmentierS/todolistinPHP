const sendButton = document.getElementById("add-item");
const itemInput = document.getElementById("list-item");

sendButton.addEventListener("click", ()=>
{
    const value = itemInput.value;
    console.log("SENDING ", value);
});

